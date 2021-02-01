<?php 
    include_once('includes/DB_connect.php');
    include('includes/register_inc.php');
?>
<div class="form-container">

<h1>Register</h1>

<div class="form-container__register">
  
  <form method="post" id="register-form" class="col-6">

  <div class="input-group">
    <label for="username">Username</label>
    <input type="text" name="username" value="">
  </div>

  <div class="input-group">
    <label for="vardas">Vardas</label>
    <input type="text" name="vardas" value="">
  </div>

  <div class="input-group">
    <label for="pavarde">Pavarde</label>
    <input type="text" name="pavarde" value="">
  </div>

  <div class="input-group">
    <label for="email">E-Mail</label>
    <input type="email" name="email" value=" ">
  </div>

  <div class="input-group">
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>

  <div class="input-group">
    <label for="repeat_password">Repeat Password</label>
    <input type="password" name="repeat_password">
  </div>

  <button type="submit" name="register" class="btn-blue">Register</button>
  
  </form>

</div>

</div>
