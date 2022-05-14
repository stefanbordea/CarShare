<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;

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

    public function createAction()
    {
        $user = new User($_POST);

        if($user->save()){
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/signup/success', true, 303);
            exit;
        } else{
            View::render('Signup/signup.php', [
               'user' => $user
            ]);
        }
    }

    public function successAction(){
        View::render('Signup/success.php');
    }
}