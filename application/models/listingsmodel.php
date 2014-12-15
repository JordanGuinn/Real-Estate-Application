<?php
namespace Listed\Model;

require_once(dirname(__FILE__).'/basemodel.php');
require_once(dirname(__FILE__) . '/propertyimagesmodel.php' );

// Used to return a Listings class that can access properties of a Listing
class ListingsWrapper {
    public $id, $dateCreated, $realtor_id, $seller_id, $property_id,
            $validity, $special_offer, $name, $price, $school_district, $size,
            $num_room, $unit_type, $date_built, $address_id, $latitude, $longitude, 
            $street_address, $apt_num, $city, $state_code, $zipcode;
    
    public $images; // the associated image(s) from $property_id 
}

class ListingsModel extends BaseModel {
   /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
   function __construct($db) {
       parent::__construct($db);
       $this->property_image_model = new PropertyImagesModel($db);
   }
   
   public function createListing($realtor_id, $seller_id, $property_id, $validity, $special_offer) {
        $sql = "INSERT INTO listing (dateCreated, realtor_id, seller_id, property_id,  validity, special_offer) ". 
               "VALUES (NOW(), :realtor_id, :seller_id, :property_id, :validity, :special_offer)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':realtor_id' => $realtor_id,
                              ':seller_id' => $seller_id,
                              ':property_id' => $property_id,
                              ':validity' => $validity,
                              ':special_offer' => $special_offer));
        return $this->db->lastInsertId();
   }
   
   /**
    * This method returns all the listing with the matching property id 
    * in desc of its date created.
    */ 
   public function getListingByPropertyId($property_id) {
        $sql = "SELECT * FROM listing WHERE property_id = :property_id ORDER BY dateCreated DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
        return $query->fetchAll();
   }
   /**
    * This method provide only one record if it finds otherwise returns boolean value 'false'.
    * 
    */
   public function getListingById($listing_id) 
   {
       //$listing_id = (int)$listing_id;
       $int_listing_id = intval($listing_id);
       //$sql = "SELECT * FROM listing WHERE id = :id ORDER BY dateCreated DESC";
       $sql = "SELECT * FROM listing AS l INNER JOIN property AS p ON p.id = l.property_id ".
             " INNER JOIN address AS a ON a.id = p.address_id WHERE l.id = :id";
       $query = $this->db->prepare($sql);
       $query->setFetchMode(\PDO::FETCH_CLASS, '\Listed\Model\ListingsWrapper');
       $query->execute(array(':id' => $int_listing_id));
       return $query->fetch();
       //return $query->fetch();
   }
   
   public function getListingValidityBetweenDates($start_date, $end_date) {
        $sql = "SELECT * FROM listing WHERE validity BETWEEN :start_date AND :end_date ORDER BY dateCreated DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':start_date' => $start_date,
                              ':end_date' => $end_date));
        return $query->fetchAll();
   }
   
   public function getListingCreatedDateBetweenDates($start_date, $end_date) {
        $sql = "SELECT * FROM listing WHERE dateCreated BETWEEN :start_date AND :end_date ORDER BY dateCreated DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':start_date' => $start_date,
                              ':end_date' => $end_date));
        return $query->fetchAll();
   }
   
   /**
    * This method returns all listing records in desc of its date created.
    */ 
   public function getAllListing() {
        $sql = "SELECT * FROM listing ORDER BY dateCreated DESC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
   }
   
   public function getAllListingByRealtorId($realtor_id) {
       $sql = "SELECT * FROM listing WHERE realtor_id = :realtor_id ORDER BY dateCreated DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':realtor_id' => $realtor_id));
        return $query->fetchAll();
   }
   
   public function getAllListingBySellerId($seller_id) {
       $sql = "SELECT * FROM listing WHERE seller_id = :seller_id ORDER BY dateCreated DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':seller_id' => $seller_id));
        return $query->fetchAll();
   }
   
   public function deleteListingByPropertyId($property_id) {
        $sql = "DELETE FROM listing WHERE property_id = :property_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
   }
   
   public function deleteListingById($listing_id) {
        $sql = "DELETE FROM listing WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $listing_id));
   }
   
   public function getListingByZipcode($zipcode)
   {
      $sql = "SELECT * FROM listing AS l INNER JOIN property AS p ON p.id = l.property_id ".
             " INNER JOIN address AS a ON a.id = p.address_id WHERE a.zipcode = :zipcode";
      $query = $this->db->prepare($sql);
      $query->execute(array(':zipcode' => $zipcode));
      //return $query->fetchAll();
      return $query->fetchAll(\PDO::FETCH_CLASS, "\Listed\Model\ListingsWrapper");
   }
   
   public function getListingByCity($city)
   {
       $sql = "SELECT * FROM listing AS l INNER JOIN property AS p ON p.id = l.property_id ".
             " INNER JOIN address AS a ON a.id = p.address_id WHERE a.city COLLATE UTF8_GENERAL_CI LIKE :city";
      $query = $this->db->prepare($sql);
      $query->execute(array(':city' => '%'.$city.'%'));
      //return $query->fetchAll();
      return $query->fetchAll(\PDO::FETCH_CLASS, "\Listed\Model\ListingsWrapper");
   }
   
   public function getListingIDByPropertyID($property_id) {
        $sql = "SELECT id FROM listing WHERE property_id = :property_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':property_id' => $property_id));
        //return $query->fetchAll();
        $array = $query->fetchAll();
        return current(current($array));
    }
}

?>