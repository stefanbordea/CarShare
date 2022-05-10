<?php

namespace App\Controllers;

use Core\View;

class Login extends \Core\Controller
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

    public function loginAction(){
        //echo "Hello from the index action in the Home controller";
        View::render('Login/login.php');
    }



}