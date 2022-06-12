<?php

namespace App\Controllers;

use App\Models\Vehicle;
use \Core\View;
use App\Models\Listing;


class Browse extends \Core\Controller
{

    //Before filter
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    //After filter
    protected function after()
    {
        //echo " (after)";
    }

    public function browseAction($listings = null){

        if ($listings == null) {
            $listings = Listing::getAll();
        }

        $vehicles = array();
        foreach ($listings as $listing) {
            $vehicles[$listing['vehicleID']] = Vehicle::getVehicleByID($listing['vehicleID']);
        }
        View::render('Browse/browse.php', [
            'listings' => $listings,
            'vehicles' => $vehicles
        ]);
    }

    public function searchListings() {
        $query = $_GET['query'];
        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;
        $listings = Listing::searchListing($query);
        $this->browseAction($listings);

    }

}