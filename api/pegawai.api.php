<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
require "../database/db.php";

function get_all_karyawan($connection) {
  $query = "SELECT * FROM karyawan";

  $result = mysqli_query($connection, $query);

  $data = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $temp_data = [
        "id" => $row["id"],
        "NIP" => $row["NIP"],
        "nama" => $row["nama"],
        "alamat" => $row["alamat"],
        "email" => $row["email"],
        "jabatan" => $row["jabatan"]
      ];

      array_push($data, $temp_data);
    }
  }

  to_json($data);
}

function insert_karyawan($connection, $insertData) {
  $user_id = $_SESSION['SESS_SPPD_USER_ID'];

  $query = "INSERT INTO karyawan (user_id, NIP, nama, email, nomor_hp, alamat, jabatan) VALUES ($user_id, '$insertData[NIP]', '$insertData[nama]', '$insertData[email]', '$insertData[nomor_hp]', '$insertData[alamat]', '$insertData[jabatan]')";

  $result = mysqli_query($connection, $query);

  $data = null;

  if($result) {
    $data["NIP"] = $insertData['NIP'];
    $data["nama"] = $insertData['nama'];
    $data["email"] = $insertData['email'];
    $data["nomor_hp"] = $insertData['nomor_hp'];
    $data["alamat"] = $insertData['alamat'];
    $data["jabatan"] = $insertData['jabatan'];

    to_json($data);
    return;
  }
}

if(isset($_GET["todo"])) {
  $todo = $_GET["todo"];

  switch($todo) {
    case "find_all":
      get_all_karyawan($connection);
      break;
    case "save":
      $insertData = [
        "nama" => validate_input($connection, $_POST["nama"]),
        "NIP" => validate_input($connection, $_POST["NIP"]),
        "alamat" => validate_input($connection, $_POST["alamat"]),
        "email" => validate_input($connection, $_POST["email"]),
        "nomor_hp" => validate_input($connection, $_POST["nomor_hp"]),
        "jabatan" => validate_input($connection, $_POST["jabatan"])
      ];

      insert_karyawan($connection, $insertData);
      break;
    default:
      get_all_karyawan($connection);
      break;
  }
}

?>