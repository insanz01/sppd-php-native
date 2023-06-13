<?php
  $page = "";
  if(isset($_GET["page"])) {
    $page = $_GET["page"];
  }

  // if($page == "logout") {
  //   session_destroy();
  //   header("location:index.php?page=login");
  // }

  switch($page) {
    case "dashboard":
      include "pages/admin/index.php";
      break;
    case "login":
      include "pages/auth/login.php";
      break;
    default:
      include "pages/admin/index.php";
  }

?>