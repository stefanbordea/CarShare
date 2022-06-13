<?php

namespace App\Controllers;

use \Core\View;

class Terms extends \Core\Controller
{


    public function termsAction()
    {
        //echo "Hello from the index action in the Home controller";
        View::render('Terms/terms.php');
    }
}
