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

    public function save() {
        $sql = 'INSERT INTO Vehicle (brand, model, year, typeOfFuel, ABS, ParkingSensor, CruiseControl, GPS, Turbo,
                     RearCamera, Bluetooth, AirCondition)
                VALUES (:brand, :model, :year, :typeOfFuel, :abs, :parkingSensor, :cruiseControl, :gps, :turbo, 
                        :rearCamera, :bluetooth, :airCondition)';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $booleanFeatures = array();
        for ($i = 0; $i < 8; $i++) {
            $booleanFeatures[$i] = false;
        }
        if (!empty($this->features)) {
            foreach ($this->features as $feature) {
                switch ($feature) {
                    case 'ABS':
                        $booleanFeatures[0] = true;
                        break;
                    case 'ParkingSensor':
                        $booleanFeatures[1] = true;
                        break;
                    case 'CruiseControl':
                        $booleanFeatures[2] = true;
                        break;
                    case 'GPS':
                        $booleanFeatures[3] = true;
                        break;
                    case 'Turbo':
                        $booleanFeatures[4] = true;
                        break;
                    case 'RearCamera':
                        $booleanFeatures[5] = true;
                        break;
                    case 'Bluetooth':
                        $booleanFeatures[6] = true;
                        break;
                    case 'AirCondition':
                        $booleanFeatures[7] = true;
                        break;
                }
            }
        }

        $stmt->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        $stmt->bindValue(':model', $this->model, PDO::PARAM_STR);
        $stmt->bindValue(':year', $this->year, PDO::PARAM_INT);
        $stmt->bindValue(':typeOfFuel', $this->typeOfFuel, PDO::PARAM_STR);
        $stmt->bindValue(':abs', $booleanFeatures[0], PDO::PARAM_BOOL);
        $stmt->bindValue(':parkingSensor', $booleanFeatures[1], PDO::PARAM_BOOL);
        $stmt->bindValue(':cruiseControl', $booleanFeatures[2], PDO::PARAM_BOOL);
        $stmt->bindValue(':gps', $booleanFeatures[3], PDO::PARAM_BOOL);
        $stmt->bindValue(':turbo', $booleanFeatures[4], PDO::PARAM_BOOL);
        $stmt->bindValue(':rearCamera', $booleanFeatures[5], PDO::PARAM_BOOL);
        $stmt->bindValue(':bluetooth', $booleanFeatures[6], PDO::PARAM_BOOL);
        $stmt->bindValue(':airCondition', $booleanFeatures[7], PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            return $db->lastInsertId();
        } else {
            return false;
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

    public static function deleteVehicle($vehicleID) {
        try {
            $db = static::getDB();
            $sql = 'DELETE FROM Vehicle WHERE ID = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $vehicleID, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}