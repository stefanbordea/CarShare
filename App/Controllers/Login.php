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
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user->ID;
            $this->redirect('/');
        } else{
            View::render('Login/login.php');
        }
    }

    public function destroyAction()
    {
        // Unset all of the session variables
        $_SESSION = [];

        // Delete the session cookie
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        // Finally destroy the session
        session_destroy();

        $this->redirect('/');
    }


}