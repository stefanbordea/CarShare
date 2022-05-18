<?php

namespace App\Models;

use App\Mail;
use PDO;
use App\Token;

class User extends \Core\Model
{

    public $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

    public function save(){

        $this->validate();

        if(empty($this->errors)){
            $passwordhash = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO User (email, passwordhash)
                VALUES (:email, :passwordhash)';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':passwordhash', $passwordhash, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;

    }

    public function validate(){

        if(filter_var($this->email, FILTER_VALIDATE_EMAIL) === false){
            $this->errors[] = 'Invalid email';
        }

        //check if a user with this email already exists
        if($this->emailExists($this->email, $this->ID ?? null)){
            $this->errors[] = 'Email already taken';
        }

        if($this->password != $this->passwordConfirmation){
            $this->errors[] = 'Passwords must match';
        }

        if(strlen($this->password) < 8){
            $this->errors[] = 'Please enter at least 8 characters for the password';
        }

        if(preg_match('/.*[a-z]+.*/i', $this->password) == 0){
            $this->errors[] = 'Password needs at least one letter';
        }

        if(preg_match('/.*\d+.*/i', $this->password) == 0){
            $this->errors[] = 'Password needs at least one number';
        }
    }

    public static function emailExists($email, $ignore_id = null){
        $user = static::findByEmail($email);

        if($user){
            if($user->ID != $ignore_id){
                return true;
            }
        }
        return false;
    }

    public static function findByEmail($email){
        $sql = 'SELECT * FROM User WHERE email= :email';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }

    public static function authenticate($email, $password){
        $user = static::findByEmail($email);

        if($user){
            if(password_verify($password, $user->passwordhash)){
                return $user;
            }
        }
        return false;
    }


    public static function sendPasswordReset($email){
        $user = static::findByEmail($email);

        if($user){
            if($user->startPasswordReset()){
                $user->sendPasswordResetEmail();
            }
        }
    }

    protected function startPasswordReset(){
        $token = new Token();
        $hashed_token = $token->getHash();

        $this->password_reset_token = $token->getValue();

        //2 hours from now
        $expiry_timestamp = time() + 60 * 60 * 2;

        $sql = 'UPDATE User
                SET passwordResetHash = :token_hash,
                    passwordResetExp = :expires_at
                WHERE ID = :id';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $expiry_timestamp), PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->ID, PDO::PARAM_INT);

        return $stmt->execute();
    }

    protected function sendPasswordResetEmail(){
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/password/reset/' . $this->password_reset_token;
        $text = "Please click on the following URL to reset your password: $url";
        $html = "Please click on <a href=\"$url\">here</a> to reset your password.";

        Mail::send($this->email, 'Password reset', $text, $html);
    }

    public static function findByPasswordReset($token)
    {
        $token = new Token($token);
        $hashed_token = $token->getHash();

        $sql = 'SELECT * FROM User 
                WHERE passwordResetHash = :token_hash';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        $user = $stmt->fetch();

        if($user){
            if(strtotime($user->passwordResetExp) >= time()){
                return $user;
            }
        }
    }

    public function resetPassword($password)
    {
        $this->password = $password;
        $this->validate();
        if (empty($this->errors)){
            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = 'UPDATE User
                    SET passwordhash = :password_hash,
                        passwordResetHash = NULL,
                        passwordResetExp = NULL,
                    WHERE ID = :id';

            $db = static::getDB();

            $stmt = $db->prepare($sql);

            $stmt->bindValue(':id', $this->ID, PDO::PARAM_INT);
            $stmt->bindValue(':password_hash', $this->passwordhash, PDO::PARAM_STR);

            return $stmt->execute();
        }
        return false;
    }
}