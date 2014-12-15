<?php
namespace Listed\Model;
require_once(dirname(__FILE__).'/usersmodel.php');

class RealtorsModel extends UsersModel {
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
       parent::__construct($db);
    }
    
    function createRealtorUser($first_name, $last_name, $email, $password) {
        return $this->createUser($first_name, $last_name, $email, 'REALTOR', $password);
     }
        
    function isRealtor($user_id) {
       $sql = "SELECT * FROM user WHERE type = 'REALTOR' and id = :user_id";
       $query = $this->db->prepare($sql);
       $query->execute(array(':user_id' => $user_id));
       $result = $query->fetch();
       if($result) {
          return true;
       } else {
          return false;
       }
    }
    
    function getAllRealtors() {
        $sql = "SELECT * FROM user where type = 'REALTOR'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
?>
