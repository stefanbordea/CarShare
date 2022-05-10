<?php

namespace App\Controllers\Admin;

use Core\View;

class Signup extends \Core\Controller
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

    public function signupAction(){
        //echo "Hello from the index action in the Home controller";
        View::render('Signup/signup.php');
    }

}