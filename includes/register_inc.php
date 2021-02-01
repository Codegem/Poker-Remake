<?php

  include_once('includes/DB_connect.php');
  
  $conn = dbconnect();

  $errors = array();  

  if(isset($_POST['register'])){

    $username = ($_POST['username']);
    $vardas = !empty($_POST['vardas']) ? $_POST['vardas'] : array_push($errors, "Iveskite Varda.");
    $pavarde = !empty($_POST['pavarde']) ? $_POST['pavarde'] : array_push($errors, "Iveskite Pavarde.");
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $repeat_password = ($_POST['repeat_password']);

    // Tikrinam ar uzimti email / username

    $sql_user = "SELECT * FROM users WHERE username = '$username' ";
    $result_user = $conn->prepare($sql_user);
    $result_user->execute();
    $user = $result_user->fetch(PDO::FETCH_ASSOC);

    $sql_email = "SELECT * FROM users WHERE email = '$email' ";
    $result_email = $conn->prepare($sql_email);
    $result_email->execute();
    $emailres = $result_email->fetch(PDO::FETCH_ASSOC);
    // validation

    if (empty($username)){
      array_push($errors, "Username yra privalomas");
    }
    else if(($user) > 0){
      array_push($errors, "Vartotojo vardas yra uzimtas");
    }

    if (empty($email)){
      array_push($errors, "Email yra privalomas");
    }
    else if(($emailres) > 0){
      array_push($errors, "Email adresas yra uzimtas");
    }

    //password strenght

    $didziosios = preg_match('@[A-Z]@', $password);
    $skaiciai = preg_match('@[0-9]@', $password);
    $special = preg_match('@[^\w]@', $password);

    if (empty($password)){
      array_push($errors, "Password yra privalomas");
    }
    else if(!$didziosios || !$skaiciai || strlen($password) < 4 || $special != 0)
    {
      array_push($errors, "Slaptazodis per silpnas | Neturi didziosios raides arba skaiciaus Min 4 simboliai");
    }

    if ($password != $repeat_password){
      array_push($errors, "Passwordai turi sutapti");
    }

    // saugojimas database

    if(count($errors) == 0){
      // encryptinamas password
      // $password = md5($password);
      $password = $password;

      // postinu i database users table
      $sql = "INSERT INTO users (username, email, password, vardas, pavarde) 
              VALUES ('$username', '$email', '$password', '$vardas', '$pavarde')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      header('location: ?p=login'); // redirect login
    }
  }
?>