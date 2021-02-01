<?php include('includes/login_inc.php'); ?>

<header class="header">

  <div class="overlay has-fade"></div>

  <nav class="flex flex-jc-sb flex-ai-c container-p">
    <a href="<?php if(isset($_SESSION['username'])) {echo ('?p=main');} else
      {echo ('?p=login');} ?>"
      class="header__name">
      BAKSNOTOJAS 2000
    </a>
    <?php if(!empty($_SESSION['username'])) : ?>
    <a id="burger-btn" href="#" class="header__toggle hide-for-desktop">
      <span></span>
      <span></span>
      <span></span>
    </a>
      <div class="header__links hide-for-mobile">
        <a><?php echo $_SESSION['username']; ?></a>
        <a href="?p=import"><i class="fas fa-file-import"></i></a>
        <a><i class="fas fa-hand-point-right" id="notification">
          <span class="badge"></span>
            <div class="dropdown-wrap">
              <div class="triangle"></div>
                <div class="pokes-dropdown">
                
                </div>
            </div>
        </i></a>
        <a href="?p=user"><i class="fas fa-user"></i></a>
        <a href="?p=logout"><i class="fas fa-sign-out-alt"></i></a>
      </div>

  </nav>

  <div class="header__menu has-fade">
      <a><?php echo $_SESSION['username']; ?></a>
      <a href="#"><i class="fas fa-file-import">Import</i></a>
      <a ><i class="fas fa-hand-point-right" id="notification">Pokes</i></a>
      <a href="?p=user"><i class="fas fa-user">User Info</i></a>
      <a href="?p=logout"><i class="fas fa-sign-out-alt">Logout</i></a>
  </div>
  <?php endif ?>
</header>
