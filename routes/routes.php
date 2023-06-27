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
    case "uang-harian":
      if($action == "tambah") {
        include "pages/admin/dana/uang-harian/tambah.php";
      } else {
        include "pages/admin/dana/uang-harian/index.php";
      }
      break;
    case "uang-harian-dki":
      if($action == "tambah") {
        include "pages/admin/dana/uang-harian-dki/tambah.php";
      } else {
        include "pages/admin/dana/uang-harian-dki/index.php";
      }
      break;
    case "uang-taxi":
      if($action == "tambah") {
        include "pages/admin/dana/uang-taxi/tambah.php";
      } else {
        include "pages/admin/dana/uang-taxi/index.php";
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
    case "statistik-perjalanan":
      include "pages/admin/statistik/pegawai-dinas/index.php";
      break;
    default:
      if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
        include "pages/auth/login.php";
      } else {
        include "pages/admin/index.php";
      }
  }

?>