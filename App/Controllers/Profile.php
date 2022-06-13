<?php

namespace App\Controllers;
use App\Authentication;
use App\Models\User;
use App\Models\ProfileModel;
use App\Models\Listing;
use Core\View;

class Profile extends Authenticated
{



    public function profileAction(){
        $profile = ProfileModel::getAll();
        $listing = Listing::getAll();
        $license = ProfileModel::getLicense();
        View::render('Profile/profile.php', [
            'listings' => $listing,
            'profile'=>$profile,
            'license' => $license,
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