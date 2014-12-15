<?php
namespace Listed\Model;

class ContactsModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    // CRUD methods here
    
    // User enters some contact information from the contacts view, so a realtor can contact them
    // What are some fields this model should have?
}