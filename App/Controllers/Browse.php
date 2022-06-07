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


        $listings = Listing::getAll();

        View::render('Browse/browse.php', [
            'listings' => $listings
        ]);
    }

}