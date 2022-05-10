<?php

namespace App\Controllers;

use \Core\View;

class Privacy extends \Core\Controller
{


    public function privacyAction(){
        //echo "Hello from the index action in the Home controller";
        View::render('Privacy/privacy.php');
    }
}