<?php

namespace App\Controllers\Admin;

class Users extends \Core\Controller
{
    //Before filter
    protected function before(){
        //Make sure an admin user is logged in
        //return false;
    }

    public function indexAction(){
        echo "User admin index";
    }
}