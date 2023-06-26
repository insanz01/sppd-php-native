<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
require "../database/db.php";

function get_all_lpd($connection) {
  $query = "SELECT * FROM laporan_perjalanan_dinas";

  $result = mysqli_query($connection, $query);

  $data = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      // var_dump($row); die;

      // $temp_data = [
      //   "id" => $row["id"],
      //   "hash_id" => $row["hash_id"],
      //   "user_id" => $row["user_id"],
      //   "penerima_surat" => $row["penerima_surat"],
      //   "pengirim_surat" => $row["pengirim_surat"],
      //   "tanggal_kegiatan" => $row["tanggal_kegiatan"],
      //   "perihal" => $row["perihal"],
      //   "kegiatan" => $row["kegiatan"],
      //   "waktu_pelaksanaan" => $row["waktu_pelaksanaan"],
      //   "tempat_pelaksanaan" => $row["tempat_pelaksanaan"],
      //   "poin_dasar" => $row["poin_dasar"],
      //   "poin_hasil_kegiatan" => $row["poin_hasil_kegiatan"],
      //   "poin_kesimpulan_saran" => $row["poin_kesimpulan_saran"]
      // ];

      array_push($data, $row);
    }
  }

  to_json($data);
}

function insert_pengajuan_lpd($connection, $insertData) {
  $hash_id = base64_encode(password_hash(time(), PASSWORD_DEFAULT));

  $query = "INSERT INTO laporan_perjalanan_dinas (hash_id, nomor_sppd, nip_karyawan, nama_karyawan, pangkat, golongan, jabatan, rangka_acara, tujuan, tanggal_kegiatan, atas_beban) VALUES ('$hash_id', '$insertData[nomor_sppd]', '$insertData[nip_karyawan]', '$insertData[nama_karyawan]', '$insertData[pangkat]', '$insertData[golongan]', '$insertData[jabatan]', '$insertData[rangka_acara]', '$insertData[tujuan]', $insertData[tanggal_kegiatan], '$insertData[atas_beban]')";

  $result = mysqli_query($connection, $query);

  $data = null;

  if($result) {
    $data["nomor_sppd"] = $insertData['nomor_sppd'];
    $data["nip_karyawan"] = $insertData['nip_karyawan'];
    $data["nip_karyawan"] = $insertData['nip_karyawan'];
    $data["nama_karyawan"] = $insertData['nama_karyawan'];
    $data["pangkat"] = $insertData['pangkat'];
    $data["golongan"] = $insertData['golongan'];
    $data["jabatan"] = $insertData['jabatan'];
    $data["rangka_acara"] = $insertData['rangka_acara'];
    $data["tujuan"] = $insertData['tujuan'];
    $data["tanggal_kegiatan"] = $insertData['tanggal_kegiatan'];
    $data["atas_beban"] = $insertData['atas_beban'];

    to_json($data);
    return;
  }
}

if(isset($_GET["todo"])) {
  $todo = $_GET["todo"];

  switch($todo) {
    case "find_all":
      get_all_lpd($connection);
      break;
    case "save-pengajuan":
      $insertData = [
        "nomor_sppd" => validate_input($connection, $_POST["nomor_sppd"]),
        "nip_karyawan" => validate_input($connection, $_POST["nip_karyawan"]),
        "nama_karyawan" => validate_input($connection, $_POST["nama_karyawan"]),
        "pangkat" => validate_input($connection, $_POST["pangkat"]),
        "golongan" => validate_input($connection, $_POST["golongan"]),
        "jabatan" => validate_input($connection, $_POST["jabatan"]),
        "rangka_acara" => validate_input($connection, $_POST["rangka_acara"]),
        "tujuan" => validate_input($connection, $_POST["tujuan"]),
        "tanggal_kegiatan" => validate_input($connection, $_POST["tanggal_kegiatan"]),
        "atas_beban" => validate_input($connection, $_POST["atas_beban"])
      ];

      insert_pengajuan_lpd($connection, $insertData);
      break;
    default:
      get_all_lpd($connection);
      break;
  }
}

?>