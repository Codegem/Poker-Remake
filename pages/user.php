<?php include('includes/issetSession.php'); ?>

<?php if(isset($_POST['update'])){
  update(($_SESSION['user_id']), ($_POST['vardas']), ($_POST['pavarde']), ($_POST['email']));
} ?>

<div class="header">
  <h2>User <?php echo $_SESSION['username']; ?> info Edit</h2>
</div>

<form method="post" class="user-forma">

  <?php foreach( getUser($_SESSION['user_id']) as $info) :?>

    <div class="input-group">
      <label for="username">Username</label>
      <input type="text" name="username" value="<?=$info['username']; ?> " disabled>
    </div>

    <div class="input-group">
      <label for="vardas">Vardas</label>
      <input type="text" name="vardas" value="<?=$info['vardas']; ?> ">
    </div>

    <div class="input-group">
      <label for="pavarde">Pavarde</label>
      <input type="text" name="pavarde" value="<?=$info['pavarde']; ?> ">
    </div>

    <div class="input-group">
      <label for="email">E-Mail</label>
      <input type="email" name="email" value="<?=$info['email']; ?>">
    </div>

    <div class="input-group">
      <button type="submit" name="update" class="btn">Update</button>
    </div>

  <?php endforeach ?>

</form>

