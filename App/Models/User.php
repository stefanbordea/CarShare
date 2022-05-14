<?php

namespace App\Models;

use PDO;

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
        if($this->emailExists($this->email)){
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

    public static function emailExists($email){
        return static::findByEmail($email) !== false;
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



}