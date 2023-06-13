<?php
  $page = "";
  if(isset($_GET["page"])) {
    $page = $_GET["page"];
  }

  switch($page) {
    case "dashboard":
      include "pages/admin/index.php";
      break;
    default:
      include "pages/admin/index.php";
  }

?>