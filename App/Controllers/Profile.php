<?php

namespace App\Controllers;
use App\Authentication;
use App\Models\User;
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

        View::render('Profile/profile.php', [
            'listings' => $listing,
            'profile'=>$profile,
            'license' => $license,
            'vehicles'=>$vehicles,
            'user' => Authentication::getUser()


        ]
    );
    }

    public function updatePasswordAction(){
        $user = Authentication::getUser();

        if(!$user->updatePassword($_POST)){
            $this->redirect('/Profile/profile');
        } else{
            View::render('Profile/edit.php', [
                'user' => $user
            ]);
        }
    }

    public function editAction(){
        View::render('Profile/edit.php', [
            'user' => Authentication::getUser()
        ]);
    }
}