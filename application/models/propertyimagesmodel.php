<?php
namespace Listed\Model;

require_once(dirname(__FILE__).'/basemodel.php');
require_once(dirname(__FILE__).'/imagesmodel.php');

class PropertyImagesWrapper {
}

class PropertyImagesModel extends BaseModel {
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    public function __construct($db) {
       parent::__construct($db);
       $this->image_model = new ImagesModel($db);
    }
    
    /**
     * This method creates a PropertyImage entry. The caller of this 
     * method should make sure that the provided property_id and image_id 
     * should exist. 
     */
    public function createPropertyImageEntry($property_id, $image_id) {
        $sql = "INSERT INTO property_image (property_id, image_id) ".
               "VALUES (:property_id, :image_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id, 
                              ':image_id' => $image_id));
       return $this->db->lastInsertId();
    }
    
    
    /**
     * This method first creates image entry, returns image_id so that there is
     * link between image and property
     **/
    public function createImageAndPropertyImageEntry($property_id,
                                                     $image_name, 
                                                     $image_type, 
                                                     $image_blob) {
                                                        
         $image_id = $this->image_model->createImage($image_name,
                                                     $image_type,
                                                     $image_blob);
                                                     
         $this->createPropertyImageEntry($property_id, $image_id);
         return $image_id;
   }
    
    /**
     * This method provides all the image records associated with a 
     * property
     */
    public function getAllImagesOfProperty($property_id) {
        $sql = "SELECT im.* FROM property_image AS pi INNER JOIN image AS im ".
               "ON pi.image_id = im.id WHERE pi.property_id = :property_id ORDER BY im.id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
        return $query->fetchAll(\PDO::FETCH_NUM);
    }
    
    public function getPropertyImageRecordByImageId($image_id)
    {
        $sql = "SELECT * FROM property_image WHERE image_id = :image_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':image_id' => $image_id));
        return $query->fetch();
    }
    
    /**
     * This method deletes the PropertyImage entry as well as the image 
     * record from the Image table.
     */
    public function deleteImageAndPropertyImageEntry($image_id) {
        $sql = "DELETE FROM property_image WHERE image_id = :image_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':image_id' => $image_id));
        $this->image_model->deleteImageById($image_id);
    }
    
    /**
     * This method deletes the images associated with the given property_id
     * it also deletes the entry from property_image tables.
     */
    public function deleteAllImagesOfProperty($property_id) {
       //Delete property_image records first.
         $sql = "DELETE FROM property_image ".
                " WHERE property_id = :property_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
        
        //Now, delete image records.
        $sql = "DELETE FROM image WHERE id IN ".
                "(SELECT image_id AS id FROM property_image ".
                " WHERE property_id = :property_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
    }
}
?>