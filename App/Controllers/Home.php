<?php

namespace App\Controllers;

use App\Mail;
use \Core\View;

class Home extends \Core\Controller

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

    public function indexAction(){
        //echo "Hello from the index action in the Home controller";
        View::render('Home/index.php');
    }
}