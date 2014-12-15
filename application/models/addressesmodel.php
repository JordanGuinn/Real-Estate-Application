<?php
namespace Listed\Model;
require_once(dirname(__FILE__).'/basemodel.php');

class AddressesModel extends BaseModel {
   /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
   function __construct($db) {
       parent::__construct($db);
    }
    public function createAddress($street_address,
                                  $apt_num,
                                  $city,
                                  $state_code,
                                  $zipcode) {
       $sql = "INSERT INTO address (street_address, apt_num, city, state_code,  zipcode) ". 
               "VALUES (:street_address, :apt_num, :city, :state_code, :zipcode)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':street_address' => $street_address,
                              ':apt_num' => $apt_num,
                              ':city' => $city,
                              ':state_code' => $state_code,
                              ':zipcode' => $zipcode));
        return $this->db->lastInsertId();
    }
    
    public function getAddressById($address_id) {
        $sql = "SELECT * FROM address WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $address_id));
        return $query->fetch();
    }
    public function getAddressByCity($city){
        
        //Using COLLATE UTF8_GENERAL_CI for case insensitve search 
        $sql = "SELECT * FROM address WHERE city COLLATE UTF8_GENERAL_CI LIKE :city";
        $query = $this->db->prepare($sql);
        $query->execute(array(':city' => '%'.$city.'%'));
        return $query->fetchAll();
    }
    
    public function getAddressByZipcode($zipcode){
        
        //Using COLLATE UTF8_GENERAL_CI for case insensitve search 
        $sql = "SELECT * FROM address WHERE zipcode = :zipcode";
        $query = $this->db->prepare($sql);
        $query->execute(array(':zipcode' => $zipcode));
        return $query->fetchAll();
    }
    
    public function getAddressByStreet($street_address) {
        //Using COLLATE UTF8_GENERAL_CI for case insensitve search
        $sql = "SELECT * FROM address WHERE street_address COLLATE UTF8_GENERAL_CI LIKE :street_address";
        $query = $this->db->prepare($sql);
        $query->execute(array(':street_address' => '%'.$street_address.'%'));
        return $query->fetchAll();
    }
    
    public function deleteAddressById($address_id) {
        $sql = "DELETE FROM address WHERE id = :address_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':address_id' => $address_id));
    }
    
    public function getAllAddress() {
        $sql = "SELECT * FROM address";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    

}
?>
