<?php

namespace App\Model;

use App\Model\DataBase;

class ColorsUsers extends DataBase
{
   public static function save(array $data)
   {
       $pdo = self::getConnection();
       $stmt = $pdo->prepare("
       INSERT INTO ColorsUser (userId, colorId) VALUES (?,?)");
       $stmt->execute([
           $data['userId'],
           $data['colorId']
       ]);

       return $pdo->lastInsertId() > 0 ? true : false;
   }

   public static function all()
   {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM ColorsUser");
        $stmt->execute();
        return $stmt->fetchAll();
   } 

    public static function find(int $id)
    {
         $pdo = self::getConnection();
         $stmt = $pdo->prepare("SELECT * FROM ColorsUser WHERE id = ?");
         $stmt->execute([$id]);
         return $stmt->fetch();
    }

    public static function update(array $data)
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare("UPDATE ColorsUser SET userId = ?, colorId = ? WHERE id = ?");
        $stmt->execute([
            $data['userId'],
            $data['colorId'],
            $data['id']
        ]);
        return $stmt->rowCount() > 0 ? true : false;
    }

    public static function delete(int $id)
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare("DELETE FROM ColorsUser WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0 ? true : false;
    }
}