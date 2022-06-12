<?php

namespace App\Models;

use PDO;

class Vehicle extends \Core\Model
{

    public function __construct($data = [])
    {
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

    public static function getVehicleByID($vehicleID) {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM Vehicle WHERE ID = '.$vehicleID);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}