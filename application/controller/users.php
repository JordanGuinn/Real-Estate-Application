<?php

/**
 * Class Users
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Users extends Controller
{    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/users/index
     */
    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $users_model = $this->loadModel('UsersModel');
        $users = $users_model->getAllUsers();     
        
        
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/user/index.php';
        require 'application/views/_templates/footer.php';
    }  
    
    public function createUser() {        
        // if we have POST data to create a new user entry
        if (isset($_POST["submit_create_user"])) {
            // load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->createUser($_POST["first_name"], $_POST["last_name"],  $_POST["email"], $_POST["password"]);
        }
        // return views to index
        header('location: ' . URL . 'users/index');
    }
    
    public function deleteUser() {
        if (isset($_POST["submit_delete_user"])) {
            // load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->deleteUserByEmail($_POST["email"]);
        }
        // return views to index
        header('location: ' . URL . 'users/index');
    }
    
    // Still needs work
    private function updateUser() {
        // return views to index
        header('location: ' . URL . 'users/index');
    }
    
    
}
