<?php
  $page = "";
  $action = "";
  if(isset($_GET["page"])) {
    $page = $_GET["page"];
  }

  if(isset($_GET["action"])) {
    $action = $_GET["action"];
  }

  switch($page) {
    case "dashboard":
      if(empty($_SESSION["SESS_SPPD_LOGIN"])) {
        include "pages/auth/login.php";
      } else {
        include "pages/admin/index.php";
      }
      break;
    case "pegawai":
      if($action == "tambah") {
        include "pages/admin/pegawai/tambah.php";
      } else {
        include "pages/admin/pegawai/index.php";
      }
      break;
    default:
      if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
        include "pages/auth/login.php";
      } else {
        include "pages/admin/index.php";
      }
  }

?>