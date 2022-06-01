<?php

namespace App\Controllers;

use Core\View;

class Profile extends Authenticated
{



    public function profileAction(){

        View::render('Profile/profile.php');
    }

    public function changePasswordAction(){

    }
}