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
      if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
        include "pages/public/index.php";
      } else {
        include "pages/admin/index.php";
      }
      break;
    case "harga-publik":
      include "pages/public/index.php";
      break;
    case "harga-eceran-publik":
      include "pages/public/harga/eceran.php";
      break;
    case "harga-grosir-publik":
      include "pages/public/harga/grosir.php";
      break;
    case "harga-nasional/publik":
      include "pages/public/harga/nasional.php";
      break;
    case "stok-publik":
      include "pages/public/stok.php";
      break;
    case "agenda-publik":
      include "pages/public/agenda.php";
      break;
    case "komoditas":
      if($action == "tambah") {
        include "pages/admin/komoditas/tambah.php";
      } else {
        include "pages/admin/komoditas/index.php";
      }
      break;
    case "eceran":
      if($action == "tambah") {
        include "pages/admin/harga/eceran/tambah.php";
      } else {
        include "pages/admin/harga/eceran/index.php";
      }
      break;
    case "grosir":
      if($action == "tambah") {
        include "pages/admin/harga/grosir/tambah.php";
      } else {
        include "pages/admin/harga/grosir/index.php";
      }
      break;
    case "nasional":
      if($action == "tambah") {
        include "pages/admin/harga/nasional/tambah.php";
      } else {
        include "pages/admin/harga/nasional/index.php";
      }
      break;
    case "distributor":
      if($action == "tambah") {
        include "pages/admin/harga/distributor/tambah.php";
      } else {
        include "pages/admin/harga/distributor/index.php";
      }
      break;
    case "produsen":
      if($action == "tambah") {
        include "pages/admin/harga/produsen/tambah.php";
      } else {
        include "pages/admin/harga/produsen/index.php";
      }
      break;
    default:
      if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
        include "pages/public/index.php";
      } else {
        include "pages/admin/index.php";
      }
  }

?>