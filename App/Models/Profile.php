<?php

namespace App\Models;

use PDO;

class Profile extends \Core\Model
{

    public function __construct($data = [])
    {
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

//get all the data from the user table
    public static function getAll(){

        try{
            $db = static::getDB();
            $stmt = $db->query('SELECT * from user ');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
        }


    }
    //get all the data from the listing table of the user that is logged in
    //its commented because i used the Listing model to get the data instead of this function
//    public static function getListings(){
//
//        try{
//            $db = static::getDB();
//            $stmt = $db->query('SELECT * from listing ');
//            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            return $result;
//        } catch(PDOException $e){
//            echo $e->getMessage();
//        }
//
//
//    }
    //get all the data from the license table of the user that is logged in
    public static function getLicense(){

        try{
            $db = static::getDB();
            $stmt = $db->query('SELECT * from license WHERE userID = '.$_SESSION['user_id']);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
        }


    }


}