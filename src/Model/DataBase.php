<?php

namespace App\Model;

use PDO;

class DataBase
{
    public static function getConnection()
    {
        $pdo = new PDO('sqlite:sqlite.db');

        return $pdo;
    }
}
