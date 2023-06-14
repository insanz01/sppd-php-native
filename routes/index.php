<?php
  session_start();
  if(isset($_GET["page"])) {
    if($_GET["page"] == "logout") {
      session_destroy();
      header("location:index.php?page=login");
    }
  }

  if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
    // include "pages/auth/login.php";
    include "partials/header.php";
    include "partials/topbar.php";
    include "partials/sidebar.php";
    include "routes.php";
    include "partials/footer.php";
  } else {
    if($_SESSION["SESS_HARPAN_LOGIN"] == true) {
      include "partials/header.php";
      include "partials/topbar.php";
      include "partials/sidebar.php";
      include "routes.php";
      include "partials/footer.php";
    }
  }
?>