<?php
namespace Listed\Model;

class AboutModel
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
    
    // User can view the information about the company and realtors
    // What are some fields this model should have?
}