<?php
namespace Listed\Model;
require_once(dirname(__FILE__).'/basemodel.php');
class ImagesModel extends BaseModel {
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
   function __construct($db) {
       parent::__construct($db);
    } 
    
    public function createImage($image_name, $image_type, $image_blob) {
        $sql = "INSERT INTO image (name, type, image_blob) ".
               "VALUES (:image_name, :image_type, :image_blob)";
        $this->db->beginTransaction();
        $query = $this->db->prepare($sql);
        $query->bindParam(':image_name', $image_name);
        $query->bindParam(':image_type', $image_type);
        $query->bindParam(':image_blob', $image_blob, \PDO::PARAM_LOB);
        $query->execute();
        //Return the last inserted record id                      
        $result = $this->db->lastInsertId();
        $this->db->commit();
       return $result;
    }
    
    public function getImageById($image_id) {
        $sql = "SELECT * FROM image WHERE id = :image_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':image_id' => $image_id));
        return $query->fetch();
    }
   public function getAllImages() {
        $sql = "SELECT * FROM image";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getAllByType($image_type) {
        $sql = "SELECT * FROM image WHERE type = :image_type ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':image_type' => $image_type));
        return $query->fetchAll();
    }
    
    public function getAllRegularImages() {
       return $this->getAllByType('REGULAR');
    }
    
    public function getAllThumbnailImages() {
       return $this->getAllByType('THUMBNAIL');
    }
    
    public function updateImage($image_id, 
                                $image_name, 
                                $image_type, 
                                $image_blob) {
        
        $sql = "UPDATE image SET name=:image_name, type=:image_type,  image_blob=:image_blob ".
               " WHERE id = :image_id";
        $this->db->beginTransaction();
        $query = $this->db->prepare($sql);
        $query->bindParam(':image_id', $image_id);
        $query->bindParam(':image_name', $image_name);
        $query->bindParam(':image_type', $image_type);
        $query->bindParam(':image_blob', $image_blob, \PDO::PARAM_LOB);
        $query->execute();
        $this->db->commit();
    }
    
    public function deleteImageById($image_id) {
        $sql = "DELETE FROM image WHERE id = :image_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':image_id' => $image_id));
    }
}
?>