<?php
  class Product{
      public $id;
      public $name;
      public $discription;
      public $price;
      public $url;
    }
  try {
      $connString = "mysql:host=localhost;dbname=slsmobiles";
      $user = "root";
      $pass = "root";
      $pdo = new PDO($connString,$user,$pass);
    }
  catch (PDOException $e) {
      die($e->getMessage());
  }
?>