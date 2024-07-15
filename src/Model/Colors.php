<?php

namespace App\Model;

use App\Model\DataBase;

class Colors extends DataBase
{
   public static function save(array $data)
   {
       $pdo = self::getConnection();
       $stmt = $pdo->prepare("
       INSERT INTO colors (name) VALUES (?)");
       $stmt->execute([
           $data['name'],
         ]);

       return $pdo->lastInsertId() > 0 ? true : false;
   }

    public static function all()
    {
         $pdo = self::getConnection();
         $stmt = $pdo->prepare("SELECT * FROM colors");
         $stmt->execute();
         return $stmt->fetchAll();
    }

    public static function find(int $id)
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM colors WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function update(array $data)
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare("UPDATE colors SET name = ? WHERE id = ?");
        $stmt->execute([
            $data['name'],
            $data['id']
        ]);
        return $stmt->rowCount() > 0 ? true : false;
    }

    public static function delete(int $id)
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare("DELETE FROM colors WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0 ? true : false;
    }
}