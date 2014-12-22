<?php

namespace Listed\Model;

require_once(dirname(__FILE__) . '/basemodel.php');

class MessagesWrapper {

    public $id, $name, $number, $email_address, $message;

}

class MessagesModel extends BaseModel {

    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        parent::__construct($db);
    }

    public function createMessage($name, $number, $email, $message) {
        $sql = "INSERT INTO message (name, number, email, message) " .
                "VALUES (:name, :number, :email, :message)";
        $this->db->beginTransaction();
        $query = $this->db->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':number', $number);
        $query->bindParam(':email', $email);
        $query->bindParam(':message', $message);
        $query->execute();
        //Return the last inserted record id                      
        $result = $this->db->lastInsertId();
        $this->db->commit();
        return $result;
    }

    public function getMessageById($message_id) {
        $sql = "SELECT * FROM message WHERE id = :message_id";
        $query = $this->db->prepare($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, '\Listed\Model\MessagesWrapper');
        $query->execute(array(':message_id' => $message_id));
        return $query->fetch();
    }

    public function getAllMessages() {
        $sql = "SELECT * FROM message";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, '\Listed\Model\MessagesWrapper');
    }

    public function deleteMessageById($message_id) {
        $sql = "DELETE FROM message WHERE id = :message_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':message_id' => $message_id));
    }

}

?>