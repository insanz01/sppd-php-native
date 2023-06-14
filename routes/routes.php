<?php
  $page = "";
  if(isset($_GET["page"])) {
    $page = $_GET["page"];
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
    case "stok-publik":
      include "pages/public/stok.php";
      break;
    case "agenda-publik":
      include "pages/public/agenda.php";
      break;
    case "eceran":
      include "pages/admin/harga/eceran.php";
      break;
    case "eceran-tambah":
      include "pages/admin/harga/eceran_tambah.php";
      break;
    default:
      if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
        include "pages/public/index.php";
      } else {
        include "pages/admin/index.php";
      }
  }

?>