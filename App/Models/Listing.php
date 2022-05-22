<?php

namespace App\Models;

use PDO;

class Listing extends \Core\Model
{

    public function __construct($data = [])
    {
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

    public function save() {
        $userID = $_SESSION['user_id'];
        $sql = 'INSERT INTO listing (userID, vehicleID, description, pricePerDay, pickupLocation, returnLocation)
                VALUES (:userID, :vehicleID, :description, :pricePerDay, :pickupLocation, :returnLocation)';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindValue(':vehicleID', $this->vehicleID, PDO::PARAM_INT);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':pricePerDay', $this->pricePerDay, PDO::PARAM_INT);
        $stmt->bindValue(':pickupLocation', $this->pickupLocation, PDO::PARAM_STR);
        $stmt->bindValue(':returnLocation', $this->returnLocation, PDO::PARAM_STR);

        return $stmt->execute();
    }

    #Get all the listings as an associative array
    public static function getAll(){

        try{
            $db = static::getDB();
            $stmt = $db->query('SELECT * from Listing');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
        }


    }

}