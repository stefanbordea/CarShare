<?php

namespace App\Controllers;

abstract class Authenticated extends \Core\Controller
{
    //Require the user to be authenticated in order to access any method of a child controller
    protected function before(){
        $this->requireLogin();
    }
}