<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Listing;


class Browse extends \Core\Controller
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

    public function browseAction(){
        //echo "Hello from the index action in the Home controller";
        View::render('Browse/browse.php');

//        $listings = Listing::getAll();
//
//        View::renderTemplate('Browse/browse.php', [
//            'listings' => $listings
//        ]);
    }

}