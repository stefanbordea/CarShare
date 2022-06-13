<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Models\Listing;
use App\Models\Vehicle;
use Core\View;

class Profile extends Authenticated
{



    public function profileAction(){
        $profile = ProfileModel::getAll();
        $listings = Listing::getAll();
        $license = ProfileModel::getLicense();
        $vehicles = array();
        foreach ($listings as $listing) {
            $vehicles[$listing['vehicleID']] = Vehicle::getVehicleByID($listing['vehicleID']);
        }
        View::render('Profile/profile.php',['listings' => $listings
                                                    ,'profile'=>$profile,
                                                        'license' => $license,
                                                            'vehicles'=>$vehicles

        ]
    );
    }

    public function changePasswordAction(){

    }
}