<?php

function getUsers(){
    $connection = dbconnect();

  try {
    if($connection) {
        $users = $connection->query("SELECT * FROM users");
    }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return $users;
  }

  function getUser($user){
    
      $connection = dbconnect();
      $summary = [];
      try {
          if($connection) {
              $query = "SELECT * FROM users WHERE id = :user";
              $statement = $connection->prepare($query);
              $statement->bindParam(":user", $user, PDO::PARAM_INT); 
              $statement->execute();
              $summary = $statement->fetchAll();
          }
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
      $connection = null;
      return $summary;
    }

  function update($user_id, $vardas, $pavarde, $email)
  {

    $conn = dbconnect();

    try
    {
      if($conn)
      {
        $query = "UPDATE users SET vardas = :vardas, pavarde = :pavarde, email = :email WHERE id = :user_id ";

        $update = $conn->prepare($query);
        $update->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $update->bindParam(":vardas", $vardas, PDO::PARAM_INT); 
        $update->bindParam(":pavarde", $pavarde, PDO::PARAM_INT); 
        $update->bindParam(":email", $email, PDO::PARAM_INT); 
        $update->execute();
        header('location: ?p=user');
      }
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
