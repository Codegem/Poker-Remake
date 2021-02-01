<?php

  $conn = dbconnect();

  if(isset($_POST['poke'])){
  
      $user_from = $_SESSION['user_id'];

      $user_to = $_POST['poke'];
  
      $date = date(DATE_RFC822);

      $status = 1;

      
      if(user_liked($user_from, $user_to) == false){
      $query = "INSERT INTO pokes (usr_from, usr_to, date, status) VALUES ('$user_from', '$user_to', '$date', '$status')";
      
      $stmt = $conn->prepare($query);
  
      $stmt->execute();
      }else
        echo json_encode(true);
    }
  $conn = null;
    
  function user_liked ($usr_from, $usr_to)
    {
      $connect = dbconnect();

      $query = "SELECT * from pokes WHERE usr_from = '$usr_from' AND usr_to = '$usr_to' ";

      $stmt = $connect->prepare($query);
      $stmt ->execute();

      $total_rows = $stmt->rowCount();

      if($total_rows > 0)
      {
        return true;
        
      }else
      {
        return false;
      }
  }