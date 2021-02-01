<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Main</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" /> 

  <link rel="stylesheet" href="assets/scss/style.css">

</head>
<body>
  
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  session_start();

    require_once ('pages/header.php');

    include ('includes/functions.php');

?>

<div class="content-container">
  <?php require $_SERVER['DOCUMENT_ROOT'].'/Baksnius/router.php'; ?>
</div>


  <script src="assets/JS/jquery.js"></script>
  <script type="text/javascript" src="assets/JS/Main.js"></script>
  <script src="assets/JS/hamburger.js"></script>
</body>

</html>