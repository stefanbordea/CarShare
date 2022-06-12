<?php

namespace App\Controllers;
use App\Models\Profile;
use App\Models\Listing;
use Core\View;

class Profiles extends Authenticated
{



    public function profileAction(){
        $profile = Profile::getAll();
        $listing = Listing::getAll();
        $license = Profile::getLicense();
        View::render('Profiles/profile.php',['listings' => $listing
                                                    ,'profile'=>$profile,
                                                        'license' => $license

        ]
    );
    }

    public function changePasswordAction(){

    }
}