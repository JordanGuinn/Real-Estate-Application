<?php
namespace Listed\Model;

require_once(dirname(__FILE__).'/basemodel.php');

class UserPreferencesModel extends BaseModel {
   /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
   function __construct($db) {
       parent::__construct($db);
   }
   
   public function createUserPreference($user_id, $price, $num_room, $city) {
       $sql = "INSERT INTO user_preference (user_id, price, num_room, city) ".
               "VALUES (:user_id, :price, :num_room, :city)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, 
                              ':price' => $price,
                              ':num_room' => $num_room,
                              ':city' => $city));
       return $this->db->lastInsertId();
   }
   
   public function getUserPreferenceByUserId($user_id) {
        $sql = "SELECT * FROM user_preference WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));
        return $query->fetch();
   }
    public function getUserPreferenceById($id) {
        $sql = "SELECT * FROM user_preference WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetch();
   }
   /**
    * This method returns all the user preferences which includes the 
    * user preferneces created by all user.
    */
   public function getAllUsersPrefernce() {
        $sql = "SELECT * FROM user_preference order by id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
   }
   
   public function deleteUserPreferenceByUserId($user_id) {
        $sql = "DELETE FROM user_preference WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));
   }
   
    public function deleteUserPreferenceById($id) {
        $sql = "DELETE FROM user_preference WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
   }
}
?>
