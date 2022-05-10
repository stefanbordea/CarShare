<?php

namespace App\Controllers;

class Listings extends \Core\Controller
{
    #Show the index page
    public function indexAction(){
        echo "Hello from the index action in the Listings controller";
        echo "<p>Query string parameters: <pre></pre>" . htmlspecialchars(print_r($_GET, true)) . "</pre></p>";
    }

    #Show the add new listing page
    public function addNewAction(){
        echo "Hello from the addNew action in the Listings controller";
    }

    public function editAction(){
        echo "Hello from the edit action in the Listings controller";
        echo '<p>Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }

}