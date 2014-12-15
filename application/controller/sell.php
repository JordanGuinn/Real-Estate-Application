<?php

/**
 * Class Sell
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Sell extends Controller
{    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/contact/index
     */
    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $sell_model =  $this->loadModel('SellsModel');
            
        
        
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/sell/index.php';
        require 'application/views/_templates/footer.php';
    } 
}