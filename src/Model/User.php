<?php

namespace App\Model;

use App\Model\DataBase;

class User extends DataBase
{
  public static function save(array $data)
  {
   
    $pdo = self::getConnection();
    $stmt = $pdo->prepare("
       INSERT INTO users (name, email, password) VALUES (?,?,?)");
    $stmt->execute([
      $data['name'],
      $data['email'],
      $data['password']
    ]);
    return $stmt->rowCount() > 0 ? true : false;
  }

  public static function all()
  {
    $pdo = self::getConnection();
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public static function find(int $id)
  {
    $pdo = self::getConnection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
  }

  public static function update(array $data)
  {
    $pdo = self::getConnection();
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
    $stmt->execute([
      $data['name'],
      $data['email'],
      $data['password'],
      $data['id']
    ]);
    return $stmt->rowCount() > 0 ? true : false;
  }

  public static function delete(int $id)
  {
    $pdo = self::getConnection();
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->rowCount() > 0 ? true : false;
  }
}
