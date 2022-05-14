<?php

namespace App\Controllers;

use Core\View;
use \App\Models\User;

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


    public function createAction(){
        $user = User::authenticate($_POST['email'], $_POST['password']);
        if($user){
            $_SESSION['user_id'] = $user->ID;
            $this->redirect('/');
        } else{
            View::render('Login/login.php');
        }
    }


}