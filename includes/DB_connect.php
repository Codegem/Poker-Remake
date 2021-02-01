<?php

  function dbconnect(){
  // $DATABASE_HOST = 'localhost';
  // $DATABASE_USER = 'root';
  // $DATABASE_PASS = 'Evaldas-123';
  // $DATABASE_NAME = 'pokeris';

  // $connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

  // if ( mysqli_connect_errno() ) {

  //   exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  // }
  // return $connect;

  // }
  
  $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
  ];
  $conn = null;
  $host = '127.0.0.1';
  $user = 'root';
  $password = 'Evaldas-123';
  $db = 'pokeris';
  
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return $conn;
  }

?>