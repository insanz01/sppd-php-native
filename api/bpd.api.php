<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
require "../database/db.php";

function get_all_bpd($connection) {
  $query = "SELECT * FROM biaya_perjalanan_dinas";

  $result = mysqli_query($connection, $query);

  $data = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $temp_data = [
        "id" => $row["id"],
        "hash_id" => $row["hash_id"],
        "file_dokumen" => $row["file_dokumen"],
        "user_id" => $row["user_id"],
        "status" => $row["status"],
        "nomor_SPPD" => $row["nomor_SPPD"],
        "tanggal" => $row["tanggal"],
        "perincian_biaya" => $row["perincian_biaya"],
        "jumlah_biaya" => $row["jumlah_biaya"],
        "keterangan" => $row["keterangan"],
        "nama_bendaharawan" => $row["nama_bendaharawan"],
        "NIP_bendaharawan" => $row["NIP_bendaharawan"],
        "NIP_karyawan" => $row["NIP_karyawan"],
        "nama_karyawan" => $row["nama_karyawan"]
      ];

      array_push($data, $temp_data);
    }
  }

  to_json($data);
}

function insert_bpd($connection, $iData) {
  $hash_id = base64_encode(password_hash(time(), PASSWORD_DEFAULT));
  $user_id = $_SESSION['SESS_SPPD_USER_ID'];

  $query = "INSERT INTO biaya_perjalanan_dinas (hash_id, user_id, status, nomor_SPPD, tanggal, perincian_biaya, jumlah_biaya, keterangan, nama_bendaharawan, NIP_bendaharawan, NIP_karyawan, nama_karyawan) VALUES ('$hash_id', $user_id, '$iData[status]', '$iData[nomor_SPPD]', '$iData[tanggal]', '$iData[perincian_biaya]', '$iData[jumlah_biaya]', '$iData[keterangan]', '$iData[nama_bendaharawan]', $iData[NIP_bendaharawan], '$iData[NIP_karyawan]', '$iData[nama_karyawan]')";

  $result = mysqli_query($connection, $query);

  $data = null;

  if($result) {
    $data["hash_id"] = $iData['hash_id'];
    $data["user_id"] = $iData['user_id'];
    $data["status"] = $iData['status'];
    $data["nomor_SPPD"] = $iData['nomor_SPPD'];
    $data["tanggal"] = $iData['tanggal'];
    $data["perincian_biaya"] = $iData['perincian_biaya'];
    $data["jumlah_biaya"] = $iData['jumlah_biaya'];
    $data["keterangan"] = $iData['keterangan'];
    $data["nama_bendaharawan"] = $iData['nama_bendaharawan'];
    $data["NIP_bendaharawan"] = $iData['NIP_bendaharawan'];
    $data["NIP_karyawan"] = $iData['NIP_karyawan'];
    $data["nama_karyawan"] = $iData['nama_karyawan'];

    to_json($data);
    return;
  }
}

if(isset($_GET["todo"])) {
  $todo = $_GET["todo"];

  switch($todo) {
    case "find_all":
      get_all_bpd($connection);
      break;
    case "save":
      $insertData = [
        "status" => validate_input($connection, $_POST["status"]),
        "nomo_SPPD" => validate_input($connection, $_POST["nomo_SPPD"]),
        "tanggal" => validate_input($connection, $_POST["tanggal"]),
        "perincian_biaya" => validate_input($connection, $_POST["perincian_biaya"]),
        "jumlah_biaya" => validate_input($connection, $_POST["jumlah_biaya"]),
        "keterangan" => validate_input($connection, $_POST["keterangan"]),
        "nama_bendaharawan" => validate_input($connection, $_POST["nama_bendaharawan"]),
        "NIP_bendaharawan" => validate_input($connection, $_POST["NIP_bendaharawan"]),
        "NIP_karyawan" => validate_input($connection, $_POST["NIP_karyawan"]),
        "nama_karyawan" => validate_input($connection, $_POST["nama_karyawan"])
      ];

      insert_bpd($connection, $insertData);
      break;
    default:
      get_all_bpd($connection);
      break;
  }
}

?>