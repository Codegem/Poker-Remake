<?php 

  include_once('includes/DB_connect.php');

  $conn = dbconnect();

  $errors = array();  

  if (isset($_POST['login'])){

  // $username = $_POST['username'];
  // $password = $_POST['password'];

  $username = !empty($_POST['username']) ? trim($_POST['username']) : array_push($errors, 'Iveskite Login.');
  $password = !empty($_POST['password']) ? trim($_POST['password']) : array_push($errors, 'Iveskite Password.');
  
  //Retrieve the user account information for the given username.
  $sql = "SELECT id, username, password FROM users WHERE username = :username";
  $stmt = $conn->prepare($sql);
  
  //Bind value.
  $stmt->bindValue(':username', $username);
  
  //Execute.
  $stmt->execute();
  
  //Fetch row.
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
  //If $row is FALSE.
  if($user === false OR empty($user)){

      array_push($errors, 'Neteisingas Username / Password!');
      
  } else{

    $validPassword = ($password == $user['password']);
      
      if($validPassword){
          
          $_SESSION['username'] = $user['username'];
          $_SESSION['user_id'] = $user['id'];
          header('location: ?p=main');
          
      } else{
          //$validPassword was FALSE. Passwords do not match.
          array_push($errors, 'Neteisingas Username / Password!');
      }
  }
}