<?php

namespace App\Models;

use PDO;

class Listing
{
    #Get all the listings as an associative array
    public static function getAll(){
        $host = "localhost";
        $db_name = "carShare";
        $user = "stefan";
        $password = "secret";

        try{
            $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",
            $user, $password
            );

            $stmt = $db->query('SELECT * from User');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
        }


    }

}