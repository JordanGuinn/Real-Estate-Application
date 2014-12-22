<?php

/**
 * Class Listings
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Listings extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/listings/index
     */
    public function index() {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $listings_model = $this->loadModel('ListingsModel');
        $property_model = $this->loadModel('PropertiesModel');
        $address_model = $this->loadModel('AddressesModel');
        $property_image_model = $this->loadModel('PropertyImagesModel');


        $listings = $listings_model->getListingByCity('');
        $listing_ids = array(sizeof($listings));
        foreach ($listings as $listing) {
            $listing->images = $property_image_model->getAllImagesOfProperty($listing->property_id);
            array_push($listing_ids, $listings_model->getListingIDByPropertyID($listing->property_id));
        }
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/listing/index.php';
        require 'application/views/_templates/footer.php';
    }

    // Used to catch links like 
    public function l() {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $listings_model = $this->loadModel('ListingsModel');
        $property_model = $this->loadModel('PropertiesModel');
        $address_model = $this->loadModel('AddressesModel');
        $property_image_model = $this->loadModel('PropertyImagesModel');

        if (func_num_args() > 0) {
            $listing_id = func_get_arg(0);
            $listing = $listings_model->getListingById($listing_id);
            $listing->images = $property_image_model->getAllImagesOfProperty($listing->property_id);

            // load views. within the views we can echo out $songs and $amount_of_songs easily
            require 'application/views/_templates/header.php';
            require 'application/views/listing/l.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function createpropertyListing() {

        if (isset($_POST["submit_create_property"])) {
            $property_model = $this->loadModel('PropertiesModel');
            $property_id = $property_model->createProperty($_POST["name"], $_POST["price"], $_POST["school_district"], $_POST["size"], $_POST["num_room"], $_POST["unit_type"], $_POST["date_built"], $_POST["address_id"], NULL, NULL
            );
            header('location: ' . URL . 'listings/createpropertyimages?property_id=' . $property_id);
        }

        require 'application/views/_templates/header.php';
        require 'application/views/listing/createpropertyListing.php';
        require 'application/views/_templates/footer.php';
    }

    public function createaddressListing() {
        if (isset($_POST["submit_create_address"])) {
            $address_model = $this->loadModel('AddressesModel');
            $address_id = $address_model->createAddress($_POST["street_address"], $_POST["apt_num"], $_POST["city"], $_POST["state_code"], $_POST["zipcode"]);
            header('location: ' . URL . 'listings/createpropertyListing?address_id=' . $address_id);
        }
        require 'application/views/_templates/header.php';
        require 'application/views/listing/createaddressListing.php';
        require 'application/views/_templates/footer.php';
    }

    public function createpropertyimages() {

        $propertyimages_model = $this->loadModel('PropertiesModel');

        if (isset($_POST["submit_create_image"])) {
            $blob = file_get_contents($_FILES["image_blob"]["tmp_name"]);

            $propertyimages_model->createPropertyImage($_POST["property_id"], $_POST["image_name"], $_POST["image_type"], $blob);

            $property_id = $_POST["property_id"];

            header('location: ' . URL . 'listings/createpropertyimages?property_id=' . $property_id);
        } elseif (isset($_POST["submit_done"])) {
            $blob = file_get_contents($_FILES["image_blob"]["tmp_name"]);
            $propertyimages_model->createPropertyImage($_POST["property_id"], $_POST["image_name"], $_POST["image_type"], $blob);
            $listings_model = $this->loadModel('ListingsModel');
            $listings_model->createListing(1, 1, $_POST["property_id"], '2014-4-4 23:44:06', 2);

            header('location: ' . URL . 'listings/listingcomplete');
        }
        require 'application/views/_templates/header.php';
        require 'application/views/listing/createpropertyimages.php';
        require 'application/views/_templates/footer.php';
    }

    public function editproperties() {

        $property_model = $this->loadModel('PropertiesModel');

        if (isset($_POST["submit_edit_properties"])) {

            $property_model->updateProperty($_POST["id"], $_POST["name"], $_POST["price"], $_POST["school_district"], $_POST["size"], $_POST["num_room"], $_POST["unit_type"], $_POST["date_built"], $_POST["address_id"], NULL, NULL
            );
        }

        $property = $property_model->getAllProperty();

        require 'application/views/_templates/header.php';
        require 'application/views/listing/editproperties.php';
        require 'application/views/_templates/footer.php';
    }

    public function deleteproperties() {
        // load model, perform an action on the model
        $property_model = $this->loadModel('PropertiesModel');

        if (isset($_POST["submit_delete_property"])) {

            $property_model->deletePropertyById($_POST["property_id"]);

            header('location: ' . URL . 'listings/deleteaddresses');
        }

        $property = $property_model->getAllProperty();

        require 'application/views/_templates/header.php';
        require 'application/views/listing/deleteproperties.php';
        require 'application/views/_templates/footer.php';
    }

    public function deleteaddresses() {
        // load model, perform an action on the model
        $address_model = $this->loadModel('AddressesModel');

        if (isset($_POST["submit_delete_address"])) {

            $address_model->deleteAddressById($_POST["address_id"]);

            header('location: ' . URL . 'listings/index');
        }

        $address = $address_model->getAllAddress();

        require 'application/views/_templates/header.php';
        require 'application/views/listing/deleteaddresses.php';
        require 'application/views/_templates/footer.php';
    }

    // Using the POST method 
    // Consider using the '/listings/search/94114 san francisco' MVC way
    public function search() {
        /*
         * select property.name, 
         *        property.price, 
         *        property.size, 
         *        property.num_room, 
         *        property.unit_type, 
         *        address.street_address, 
         *        address.city, 
         *        address.zipcode 
         * from `listing` 
         * left join `property` on listing.property_id = property.id 
         * left join `address` on property.address_id = address.id;
         */
        // check for cases where people search using sfsuswe.com/~f14g04/Listed/listings/search/94112
        if (func_num_args()) {
            $search_string = func_get_arg(0);
        }

        if (isset($_GET["submit_search"])) {
            $search_string = ($_GET["search_listings"]);
        }

        $listings_model = $this->loadModel('ListingsModel');
        $property_image_model = $this->loadModel('PropertyImagesModel');
        $listings_search_results = $this->getResults($listings_model, $search_string);
        $listing_ids = array(sizeof($listings_search_results));

        foreach ($listings_search_results as $listing) {
            $listing->images = $property_image_model->getAllImagesOfProperty($listing->property_id);
            array_push($listing_ids, $listings_model->getListingIDByPropertyID($listing->property_id));
        }
        require 'application/views/_templates/header.php';
        require 'application/views/listing/search.php';
        require 'application/views/_templates/footer.php';
    }

    // Take user input search string and either search by zip code or
    // search by city, depending on user input
    private function getResults($model, $search_string) {
        $pattern_zip_codes = "/(\040*)(\d{5})(\040*)/"; // Five digits with 0 or more spaces trailing
        $pattern_words = "/[^a-zA-Z\040]*/"; // Get any spaces and alpha characters 
        if (preg_match($pattern_zip_codes, $search_string)) {
            preg_match_all($pattern_zip_codes, $search_string, $zip_code);
            $results = $model->getListingByZipcode($zip_code[0][0]);
            $this->removeColumns($results);
            //var_dump($results);
            return $results;
        } elseif (preg_match($pattern_words, $search_string)) {
            // remove all non-word characters except spaces
            $filtered_string = preg_replace("/^[\W\040\d]*/", "", trim($search_string));
            //echo "Filtered search string: " . $filtered_string;
            if (empty($filtered_string)) {
                return array();
            }
            $results = $model->getListingByCity($filtered_string);
            //$this->removeColumns($results);
            return $results;
        } else {
            return array();
        }
    }

    // remove unnecessary columns from a search result
    private function removeColumns(&$search_results) {
        //echo get_class($search_results[0]);
        foreach ($search_results as $key => $row) {
            //echo get_class($key);
            //echo "key: " . $key; 
            //echo "key stuff: " . $search_results[0]['id'];//["dateCreated"];
            //unset($search_results[1]);
            //unset($search_results[2]);
            //unset($search_results['id']);
            //unset($search_results['realtor_id']); 
            //unset($search_results[$key]);
        }
        foreach ($search_results as $row) {
            foreach ($row as $key => $val) {
                //echo "key: " . $key . "\n";
                //echo "val: " . $val . "\n";
            }
        }
    }

    public function listingcomplete() {
        // load model, perform an action on the model
        require 'application/views/_templates/header.php';
        require 'application/views/listing/listingcomplete.php';
        require 'application/views/_templates/footer.php';
    }

    public function morelistinginfo() {
        $listings_model = $this->loadModel('ListingsModel');
        $property_model = $this->loadModel('PropertiesModel');
        $address_model = $this->loadModel('AddressesModel');
        $property_image_model = $this->loadModel('PropertyImagesModel');

        if (isset($_POST['listing_id'])) {
            $listing_id = $_POST['listing_id'];
            $listing = $listings_model->getListingById($listing_id);
            $listing->images = $property_image_model->getAllImagesOfProperty($listing->property_id);
        }
            // load model, perform an action on the model
            require 'application/views/_templates/header.php';
            require 'application/views/listing/morelistinginfo.php';
            require 'application/views/_templates/footer.php';
        }
    }
    