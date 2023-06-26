<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
require "../database/db.php";

function generate_nomor_SPPD($connection) {
  $query = "SELECT id FROM surat_perintah_perjalanan_dinas ORDER BY id DESC LIMIT 1";

  $result = mysqli_query($connection, $query);

  $exist_sppd = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $exist_sppd["id"] = $row["id"];
    }
  }

  $nomor_id = 0;
  if($exist_sppd) {
    $nomor_id = $exist_sppd['id'];
  }

  $tahun = date("Y", time());
  $bulan = date("m", time());

  $bulan_romawi = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
  $next_number = (string)($nomor_id + 1);
  strlen($next_number);
  
  $nomor = "";
  for($i = 0; $i < (3 - $next_number); $i++) {
    $nomor += "0";
  }

  $nomor += $next_number;

  return "12.$nomor/DKP3-KB/$bulan_rowawi[$bulan]/$tahun";
}

function get_all_sppd($connection) {
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

function insert_pengajuan_sppd($connection, $insertData) {
  $hash_id = password_hash(time(), PASSWORD_DEFAULT);
  $hash_id = base64_encode($hash_id);
  
  $nomor_SPPD = generate_nomor_SPPD($connection);


  $query = "INSERT INTO karyawan (user_id, NIP, nama, email, nomor_hp, alamat, jabatan) VALUES ()";
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

      insert_pengajuan_sppd($connection, $insertData);
      break;
    default:
      get_all_karyawan($connection);
      break;
  }
}

?>