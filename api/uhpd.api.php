<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
require "../database/db.php";

function get_all_uhpd($connection) {
  $query = "SELECT * FROM uang_harian_perjalanan_dinas";

  $result = mysqli_query($connection, $query);

  $data = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      array_push($data, $row);
    }
  }

  to_json($data);
}

function get_all_uhpd_dki($connection) {
  $query = "SELECT * FROM uang_harian_perjalanan_dinas_dki";

  $result = mysqli_query($connection, $query);

  $data = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      array_push($data, $row);
    }
  }

  to_json($data);
}

function insert_uhpd($connection, $insertData) {
  $hash_id = base64_encode(password_hash(time(), PASSWORD_DEFAULT));

  $query = "INSERT INTO uang_harian_perjalanan_dinas (nama_provinsi, satuan, besaran) VALUES ('$insertData[nama_provinsi]', '$insertData[satuan]', $insertData[besaran])";

  $result = mysqli_query($connection, $query);

  $data = null;

  if($result) {
    $data["nama_provinsi"] = $insertData['nama_provinsi'];
    $data["satuan"] = $insertData['satuan'];
    $data["besaran"] = $insertData['besaran'];

    to_json($data);
    return;
  }
}

function insert_uhpd_dki($connection, $insertData) {
  $hash_id = base64_encode(password_hash(time(), PASSWORD_DEFAULT));

  $query = "INSERT INTO uang_harian_perjalanan_dinas_dki (uraian, walikota, dprd, sekda, asisten_sekda, administrator, pengawas, pelaksana, keterangan) VALUES ('$insertData[uraian]', '$insertData[walikota]', $insertData[dprd], $insertData[sekda], $insertData[asisten_sekda], $insertData[administrator], $insertData[pengawas], $insertData[pelaksana], $insertData[keterangan])";

  $result = mysqli_query($connection, $query);

  $data = null;

  if($result) {
    $data = $insertData;

    to_json($data);
    return;
  }
}

if(isset($_GET["todo"])) {
  $todo = $_GET["todo"];

  switch($todo) {
    case "find_all":
      get_all_uhpd($connection);
      break;
    case "find_all_dki":
      get_all_uhpd_dki($connection);
    case "save":
      $insertData = [
        "nama_provinsi" => validate_input($connection, $_POST["nama_provinsi"]),
        "satuan" => validate_input($connection, $_POST["satuan"]),
        "besaran" => validate_input($connection, $_POST["besaran"])
      ];

      insert_uhpd($connection, $insertData);
      break;
    case "save_dki":
      $insertData = [
        "uraian" => validate_input($connection, $_POST["uraian"]),
        "walikota" => validate_input($connection, $_POST["walikota"]),
        "dprd" => validate_input($connection, $_POST["dprd"]),
        "sekda" => validate_input($connection, $_POST["sekda"]),
        "asisten_sekda" => validate_input($connection, $_POST["asisten_sekda"]),
        "administrator" => validate_input($connection, $_POST["administrator"]),
        "pengawas" => validate_input($connection, $_POST["pengawas"]),
        "pelaksana" => validate_input($connection, $_POST["pelaksana"]),
        "keterangan" => validate_input($connection, $_POST["keterangan"])
      ];

      insert_uhpd_dki($connection, $insertData);
      break;
    default:
      get_all_uhpd($connection);
      break;
  }
}

?>