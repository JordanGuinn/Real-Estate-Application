<?php
namespace Listed\Model;

require_once(dirname(__FILE__).'/basemodel.php');
require_once(dirname(__FILE__).'/propertyimagesmodel.php');

class PropertiesModel extends BaseModel {
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
   function __construct($db) {
       parent::__construct($db);
       $this->property_image_model = new PropertyImagesModel($db);
    }   
    
   public function createProperty($name, 
                            $price, 
                            $school_district, 
                            $size, 
                            $num_room, 
                            $unit_type, 
                            $date_built, 
                            $address_id, 
                            $latitude, 
                            $longitude) 
  {
        $sql = "INSERT INTO property (name, price, school_district, size, num_room, unit_type, date_built, address_id, latitude, longitude ) ". 
               "VALUES (:name, :price, :school_district, :size, :num_room, :unit_type, :date_built, :address_id, :latitude, :longitude  )";
        $query = $this->db->prepare($sql);
        $query->bindParam(':name',$name);
        $query->bindParam(':price', $price);
        $query->bindParam(':school_district', $school_district, \PDO::PARAM_BOOL);
        $query->bindParam(':size', $size);
        $query->bindParam(':num_room', $num_room);
        $query->bindParam(':unit_type', $unit_type);
        $query->bindParam(':date_built', $date_built);
        $query->bindParam(':address_id', $address_id);
        $query->bindParam(':latitude', $latitude);
        $query->bindParam(':longitude', $longitude);
        $query->execute();
        //Return the last inserted record id                        
        return $this->db->lastInsertId();
     }
     
     /**
      * A property can have multiple images. So when setPropertyImage is 
      * called it will add the new image in the list. 
      * This method assumes that property_id is correct. It's caller 
      * responsibility to provide the right property_id.
      */
     public function createPropertyImage($property_id, 
                                      $image_name, 
                                      $image_type, 
                                      $image_blob) {
        $this->property_image_model->createImageAndPropertyImageEntry($property_id, 
                                                                      $image_name, 
                                                                      $image_type, 
                                                                      $image_blob);
     }
    
     
    public function getPropertyById($id) {
        $sql = "SELECT * FROM property WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetch();
    }
    
   public function getPropertyByAddressId($address_id) {
        $sql = "SELECT * FROM property WHERE address_id = :address_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':address_id' => $address_id));
        return $query->fetchAll();
    }
    
    public function getPropertyByZipcode($zipcode) {
        $sql = "SELECT p.* FROM property p INNER JOIN address a ON p.address_id = a.id WHERE a.zipcode = :zipcode";
        $query = $this->db->prepare($sql);
        $query->execute(array(':zipcode' => $zipcode));
        return $query->fetchAll();
    }
    
     public function getPropertyByCity($city) {
        $sql = "SELECT p.* FROM property p INNER JOIN address a ON p.address_id = a.id WHERE a.city = :city";
        $query = $this->db->prepare($sql);
        $query->execute(array(':city' => $city));
        return $query->fetchAll();
    }
    
    
     /**
     * This method returns all the image records associated with the
     * given property id.
     */
    public function getAllImagesOfProperty($property_id) {
       return $this->property_image_model->getAllImagesOfProperty($property_id);
    }
    
    public function getAllProperty() {
        $sql = "SELECT * FROM property";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
      
   
    public function updateProperty($id,
                                   $name, 
                                   $price, 
                                   $school_district, 
                                   $size, 
                                   $num_room, 
                                   $unit_type, 
                                   $date_built, 
                                   $address_id, 
                                   $latitude, 
                                   $longitude) {
        $sql = "UPDATE property SET name = :name, price = :price, ".
               "school_district = :school_district, size = :size, ".
               "num_room = :num_room, unit_type = :unit_type, ".
               "date_built = :date_built, address_id = :address_id, ".
               "latitude = :latitude, longitude = :longitude  ".
               " WHERE id = :id"; 
        //print_r($sql);
        $query = $this->db->prepare($sql);
        $query->bindParam(':id',$id);
        $query->bindParam(':name',$name);
        $query->bindParam(':price', $price);
        $query->bindParam(':school_district', $school_district, \PDO::PARAM_BOOL);
        $query->bindParam(':size', $size);
        $query->bindParam(':num_room', $num_room);
        $query->bindParam(':unit_type', $unit_type);
        $query->bindParam(':date_built', $date_built);
        $query->bindParam(':address_id', $address_id);
        $query->bindParam(':latitude', $latitude);
        $query->bindParam(':longitude', $longitude);
        return $query->execute();
     }
    
    /**
     * This method deletes the property and the associated images.
     */
    public function deletePropertyById($property_id) {
        //First, delete all associated image and property_image entries.
        $this->property_image_model->deleteAllImagesOfProperty($property_id);
        //Then, delete the property.
        $sql = "DELETE FROM property WHERE id = :property_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
    }
}
?>
