<?php

namespace Core;

use PDO;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = DB_HOST;
            $dbname = DB_NAME;
            $username = DB_USER;
            $password = DB_PASS;


            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
                $username, $password);

            //Throw an exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
    }
}