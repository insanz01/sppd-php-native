<?php
  session_start();

  include "config/config.php";
  
  $is_login = false;

  if(isset($_GET["page"])) {
    if($_GET["page"] == "logout") {
      session_destroy();
      header("location:index.php");
    }

    if($_GET["page"] == "login") {
      include "pages/auth/login.php";
      $is_login = true;
    }
  }
  
  if(!$is_login) {
    if(empty($_SESSION["SESS_SPPD_LOGIN"])) {
      include "pages/auth/login.php";
    } else {
      if($_SESSION["SESS_SPPD_LOGIN"] == true) {
        include "partials/header.php";
        include "partials/topbar.php";
        include "partials/sidebar.php";
        include "routes.php";
        include "partials/footer.php";
      }
    }
  }

?>