<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Models\Listing;
use Core\View;

class Profile extends Authenticated
{



    public function profileAction(){
        $profile = ProfileModel::getAll();
        $listing = Listing::getAll();
        $license = ProfileModel::getLicense();
        View::render('Profile/profile.php',['listings' => $listing
                                                    ,'profile'=>$profile,
                                                        'license' => $license

        ]
    );
    }

    public function changePasswordAction(){

    }
}