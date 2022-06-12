<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Listing;

class Listings extends Authenticated
{
    #Show the index page
    public function indexAction(){
        //echo "Hello from the index action in the Listings controller";
        //echo "<p>Query string parameters: <pre></pre>" . htmlspecialchars(print_r($_GET, true)) . "</pre></p>";
        $listings = Listing::getAll();

        View::render('Listings/index.php', [
            'listings' => $listings
        ]);
    }

    public function listingFormAction() {
        View::render('Listings/listingForm.php');
    }

    #Show the add new listing page
    public function addNewAction(){
    //        echo "Hello from the addNew action in the Listings controller";
        $data = $_POST;
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                $data['photoLink'] = $_FILES['fileToUpload']['name'];
                $listing = new Listing($data);

                if($listing->save()) {
                    //also car needs to be available
                    $this->redirect('/listings/successfulListing');
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


    }

    public function successfulListingAction() {
        View::render('Listings/successfulListing.php');
    }

    public function editAction(){
        echo "Hello from the edit action in the Listings controller";
        echo '<p>Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }

}