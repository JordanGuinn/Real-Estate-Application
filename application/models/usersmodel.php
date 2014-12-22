<?php
namespace Listed\Model;

require_once(dirname(__FILE__) . '/basemodel.php');

class UsersModel extends BaseModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
       parent::__construct($db);
    }   
    
    
    public function createUser($first_name, $last_name, $email, $user_type, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT,  array('cost' => 10));
        $sql = "INSERT INTO user (first_name, last_name, email, type, password) ".
               "VALUES (:first_name, :last_name, :email, :user_type, :password)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':first_name' => $first_name, 
                               ':last_name' => $last_name,
                               ':email' => $email, 
                               ':user_type' => $user_type,
                               ':password' => $hashed_password));
      
       //Return the last inserted record id                        
       return $this->db->lastInsertId();
     }
     
     public function createRegisteredUser($first_name, $last_name, $email, $password) {
        return $this->createUser($first_name, $last_name, $email, 'REGISTERED_USER', $password);
     }
     
           
     public function createAdminUser($first_name, $last_name, $email, $password) {
        return $this->createUser($first_name, $last_name, $email, 'ADMIN', $password);
     }
     
    
    public function getUserById($id) {
        $sql = "SELECT * FROM user WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetch();
    }
    
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(array(':email' => $email));
        return $query->fetch();
    }
    
    /**
     * This method would compare the given password with hash password.
     * If it matches, then return true otherwise false.
     * */
    public function verifyPassword($email, $password){
        $sql = "SELECT password FROM user WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(array(':email' => $email));
        $result = $query->fetch();
        if (!$result) {
           return false;
        }
        return password_verify($password, $result['password']);
    }
    
    /**
     * This method updates the password associated with the provided email.
     * If it successfully updtes the password it returns non-zero value,
     * otherwize it returns '0'.
     */ 
    public function updatePassword($email, $newPassword){
       $hashed_password = password_hash($newPassword, PASSWORD_BCRYPT,  array("cost" => 10));
       //error_log(" Hased password : ".$hashed_password. ", New password : ".$newPassword);
       $sql = "UPDATE user SET password = :password WHERE email = :email";
       $query = $this->db->prepare($sql);
       return $query->execute(array(':email' => $email,
                                    ':password' => $hashed_password));
    }
    
    
    public function updateUserImageId($user_id, $image_id) {
        $sql = "UPDATE user SET image_id = :image_id  WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':image_id' => $image_id,
                              ':id' => $user_id));
    }
    
    public function updateUserAddressId($user_id, $address_id) {
        $sql = "UPDATE user SET address_id = :address_id  WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':address_id' => $address_id,
                              ':id' => $user_id));
    }

    public function isAdmin($email) {
       $sql = "SELECT * FROM user WHERE type = 'ADMIN' and email = :email";
       $query = $this->db->prepare($sql);
       $query->execute(array(':email' => $email));
       $result = $query->fetch();
       if($result) {
          return TRUE;
       } else {
          return FALSE;
       }
    }
    public function isRealtor($email) {
       $sql = "SELECT * FROM user WHERE type = 'REALTOR' and email = :email";
       $query = $this->db->prepare($sql);
       $query->execute(array(':email' => $email));
       $result = $query->fetch();
       if($result) {
          return TRUE;
       } else {
          return FALSE;
       }
    }
    public function isRegisteredUser($email) {
       $sql = "SELECT * FROM user WHERE type = 'REGISTERED_USER' and email = :email";
       $query = $this->db->prepare($sql);
       $query->execute(array(':email' => $email));
       $result = $query->fetch();
       if($result) {
          return TRUE;
       } else {
          return FALSE;
       }
    }

    public function deleteUserByEmail($email) {
        $sql = "DELETE FROM user WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(array(':email' => $email));
    }
    
    public function deleteUserById($id) {
        $sql = "DELETE FROM user WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }   
    
    public function getAllUsers() {
        $sql = "SELECT * FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
?>
