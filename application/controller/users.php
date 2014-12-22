<?php

/**
 * Class Users
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Users extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/users/index
     */
    public function index() {
// load a model, perform an action, pass the returned data to a variable
// NOTE: please write the name of the model "LikeThis"
        $users_model = $this->loadModel('UsersModel');
        $users = $users_model->getAllUsers();

// messages model for querying the messages table
        $messages_model = $this->loadModel('MessagesModel');
        $messages = $messages_model->getAllMessages();

// debug message to show where you are, just for the demo
//echo 'Message from Controller: You are in the controller home, using the method index()';
// load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/user/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function login() {
// debug message to show where you are, just for the demo
//echo 'Message from Controller: You are in the controller home, using the method index()';
// load views. within the views we can echo out $songs and $amount_of_songs easily
        if (isset($_POST['email']) && isset($_POST['password'])) {
            header('location: ' . URL . 'home/');
        }

        require 'application/views/_templates/header.php';
        require 'application/views/user/login.php';
        require 'application/views/_templates/footer.php';
    }

    public function logout() {
// debug message to show where you are, just for the demo
//echo 'Message from Controller: You are in the controller home, using the method index()';
// load views. within the views we can echo out $songs and $amount_of_songs easily
        if (isset($_POST['logout'])) {
            header('location: ' . URL . 'home/');
        }
        require 'application/views/_templates/header.php';
        require 'application/views/user/logout.php';
        require 'application/views/_templates/footer.php';
    }

    public function createUser() {
// if we have POST data to create a new user entry
        if (isset($_POST["submit_create_user"])) {
// load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->createRegisteredUser($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"]);
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

    public function verifyPassword() {
        if (isset($_POST["submit_login_user"])) {
// load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->verifyPassword($_POST["email"], $_POST["password"]);
        }
// return views to index
        header('location: ' . URL . 'users/index');
    }

// Still needs work
    private function updateUser() {
// return views to index
        header('location: ' . URL . 'users/index');
    }

    public function deleteMessage() {
        if (isset($_POST["submit_delete_message"])) {
// load model, perform an action on the model
            $messages_model = $this->loadModel('MessagesModel');
//$messages_model->deleteMessageById($_POST["message_id"]);
            $messages_model->deleteMessageById($_POST["message_id"]);
        }
// return views to index
        header('location: ' . URL . 'users/messagedeleted');
    }

    public function createMessage() {
        if (isset($_POST["submit_create_message"])) {
// assumes 'name', 'number', 'email', and 'message' 
// POST form fields
// load messages model
            $messages_model = $this->loadModel('MessagesModel');
            $messages_model->createMessage($_POST['name'], $_POST['number'], $_POST['email'], $_POST['message']);
            header('location: ' . URL . 'users/messagesent');
        }
// return views to index
    }

    public function viewMessage() {
        $messages_model = $this->loadModel('MessagesModel');
        $messages = $messages_model->getAllMessages();
// return views to index
        require 'application/views/_templates/header.php';
        require 'application/views/user/messages.php';
        require 'application/views/_templates/footer.php';
    }

    public function messagesent() {
        require 'application/views/_templates/header.php';
        require 'application/views/user/messagesent.php';
        require 'application/views/_templates/footer.php';
    }

    public function messagedeleted() {
        require 'application/views/_templates/header.php';
        require 'application/views/user/messagedeleted.php';
        require 'application/views/_templates/footer.php';
    }

}
