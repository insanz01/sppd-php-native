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
    case "pengajuan-sppd":
      include "pages/admin/pengajuan/sppd/index.php";
      break;
    case "pengajuan-spt":
      include "pages/admin/pengajuan/spt/index.php";
      break;
    case "laporan-spt":
      include "pages/admin/laporan/spt/index.php";
      break;
    case "laporan-sppd":
      include "pages/admin/laporan/sppd/index.php";
      break;
    case "laporan-bpd":
      include "pages/admin/laporan/bpd/index.php";
      break;
    case "laporan-lpd":
      include "pages/admin/laporan/lpd/index.php";
      break;
    case "penyerahan-bpd":
      include "pages/admin/penyerahan/bpd/index.php";
      break;
    default:
      if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
        include "pages/auth/login.php";
      } else {
        include "pages/admin/index.php";
      }
  }

?>