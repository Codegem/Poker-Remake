<?php 

switch (htmlspecialchars($_GET['p'] ?? 'home')){

    case 'home';
      include "pages/login.php";
    break;

    case 'register';
      include "pages/register.php";
    break;

    case 'login';
      include "pages/login.php";
    break;
    
    case 'user';
      include "pages/user.php";
    break;

    case 'main';
      include "pages/main.php";
    break;
    
    case 'logout';
      include "includes/logout_inc.php";
    break;

    case 'import';
      include "pages/imports.php";
    break;

    case 'poke';
      include "includes/poke.php";
    break;

    case 'fetch';
      require "includes/fetch.php";
    break;

    case 'pagination';
      require_once "includes/pagination.php";
    break;

    case 'notification';
      require "includes/notification.php";
    break;
    
    default:
        http_response_code(404);
        require "pages/error.php";
    break;
}
