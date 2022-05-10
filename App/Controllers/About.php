<?php

namespace App\Controllers;

use \Core\View;


class About extends \Core\Controller
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

    public function aboutAction(){
        //echo "Hello from the index action in the Home controller";
        View::render('About/about.php');
    }
}