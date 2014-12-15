<?php
namespace Listed\Model;

require_once(dirname(__FILE__).'/basemodel.php');

class UserLikesModel extends BaseModel {
   /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
   public function __construct($db) {
       parent::__construct($db);
   }
   
   public function createUserLike($user_id, $listing_id) {
        $sql = "INSERT INTO user_like (user_id, listing_id) ".
               "VALUES (:user_id, :listing_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, 
                              ':listing_id' => $listing_id));
   }
   
   public function getUserlikeByUserId($user_id) {
        $sql = "SELECT * FROM user_like WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));
        return $query->fetchAll();
   }
   public function getUserLikeByUserIdAndListingId($user_id, $listing_id) {
        $sql = "SELECT * FROM user_like WHERE user_id = :user_id AND listing_id = :listing_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id,
                              ':listing_id' => $listing_id));
        return $query->fetch();
   }
   
   public function getUserLikeByListingId($listing_id) {
        $sql = "SELECT * FROM user_like WHERE listing_id = :listing_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':listing_id' => $listing_id));
        return $query->fetchAll();
   }
   public function getAllUserLike() {
        $sql = "SELECT * FROM user_like";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
   }
   public function deleteUserLikeByUserId($user_id) {
        $sql = "DELETE FROM user_like WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));
   }
   public function deleteUserLikeByListingId($listing_id) {
        $sql = "DELETE FROM user_like WHERE listing_id = :listing_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':listing_id' => $listing_id));
   }
   public function deleteUserLikeByUserIdAndListingId($user_id, $listing_id) {
        $sql = "DELETE FROM user_like WHERE user_id = :user_id AND listing_id = :listing_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id,
                              ':listing_id' => $listing_id));
   }
}
?>
