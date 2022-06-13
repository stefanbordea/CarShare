<?php

namespace App\Controllers;

use App\Models\Vehicle;
use \Core\View;
use App\Models\Listing;

class Vehicles extends Authenticated
{



    public function vehicleFormAction() {
        View::render('Listings/vehicleForm.php');
    }

    public function addNewAction(){
        $vehicle = new Vehicle($_POST);
        View::render('Listings/listingForm.php', ['vehicleID' => $vehicle->save()]);
    }



}