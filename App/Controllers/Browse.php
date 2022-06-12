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

    public function browseAction($listings = null, $query = null){

        //if the function is called from the navigation no parameter is provided, so default value is applied
        //and all listings should be shown
        if ($listings == null) {
            $listings = Listing::getAll();
        }

        $vehicles = array();
        //if the function is called from searchListings() then $listings is equal to the results of the search
        if ($listings != -1) {
            foreach ($listings as $listing) {
                $vehicles[$listing['vehicleID']] = Vehicle::getVehicleByID($listing['vehicleID']);
            }
        } else { //if no matching listing was found, listings is equal to -1
            $listings = [];
            $vehicles = [];
        }

        View::render('Browse/browse.php', [
            'listings' => $listings,
            'vehicles' => $vehicles,
            'qry' => $query
        ]);
    }

    public function searchListingsAction() {
        $query = $_GET['query'];
        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;
        $listings = Listing::searchListing($query);
        if ($listings == null) {
            $listings = -1;
        }
        //The query is passed to browseAction for pagination of results
        $this->browseAction($listings, $query);

    }

}