<?php

namespace App\Controllers;

use App\Authentication;
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
            Authentication::login($user);
            $this->redirect(Authentication::getReturnPage());
        } else{
            View::render('Login/login.php');
        }
    }

    public function destroyAction()
    {
        Authentication::logout();
        $this->redirect('/');
    }


}