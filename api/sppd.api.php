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
  $query = "SELECT * FROM surat_perintah_perjalanan_dinas";

  $result = mysqli_query($connection, $query);

  $data = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $temp_data = [
        "id" => $row["id"],
        "hash_id" => $row["hash_id"],
        "nomor_SPPD" => $row["nomor_SPPD"],
        "author" => $row["author"],
        "nip_karyawan" => $row["nip_karyawan"],
        "nama_karyawan" => $row["nama_karyawan"],
        "pangkat" => $row["pangkat"],
        "golongan" => $row["golongan"],
        "jabatan" => $row["jabatan"],
        "instansi" => $row["instansi"],
        "tingkat_perjalanan_dinas" => $row["tingkat_perjalanan_dinas"],
        "alat_angkutan" => $row["alat_angkutan"],
        "tempat_berangkat" => $row["tempat_berangkat"],
        "tempat_tujuan" => $row["tempat_tujuan"],
        "lama_dinas" => $row["lama_dinas"],
        "tanggal_berangkat" => $row["tanggal_berangkat"],
        "tanggal_kembali" => $row["tanggal_kembali"],
        "beban_anggaran_instansi" => $row["beban_anggaran_instansi"],
        "beban_anggaran_mata_anggaran" => $row["beban_anggaran_mata_anggaran"],
        "NIP_kepala_dinas" => $row["NIP_kepala_dinas"],
        "nama_kepala_dinas" => $row["keterangan"],
        "keterangan" => $row["nama_kepala_dinas"],
        "berangkat_dari" => $row["berangkat_dari"],
        "tujuan_satu" => $row["tujuan_satu"],
        "tujuan_dua" => $row["tujuan_dua"],
        "tanggal_berangkat_tujuan_dua" => $row["tanggal_berangkat_tujuan_dua"],
        "tujuan_tiga" => $row["tujuan_tiga"],
        "tanggal_berangkat_tujuan_tiga" => $row["tanggal_berangkat_tujuan_tiga"]
      ];

      array_push($data, $temp_data);
    }
  }

  to_json($data);
}

function insert_pengajuan_sppd($connection, $iData) {
  $hash_id = password_hash(time(), PASSWORD_DEFAULT);
  $hash_id = base64_encode($hash_id);

  $nomor_SPPD = generate_nomor_SPPD($connection);

  $query = "INSERT INTO surat_perintah_perjalanan_dinas (hash_id, nomor_SPPD, author, nip_karyawan, nama_karyawan, pangkat, golongan, jabatan, instansi, tingkat_perjalanan_dinas, maksud_perjalanan_dinas, alat_angkutan, tempat_berangkat, tempat_tujuan, lama_dinas, tanggal_berangkat, tanggal_kembali, beban_anggaran_instansi, beban_anggaran_mata_anggaran, NIP_kepala_dinas, nama_kepala_dinas, keterangan, berangkat_dari, tujuan_satu, tujuan_dua, tanggal_berangkat_tujuan_dua, tujuan_tiga, tanggal_berangkat_tujuan_tiga) VALUES ('$hash_id', '$nomor_SPPD', '$iData[author]', '$iData[nip_karyawan]', '$iData[nama_karyawan]', '$iData[pangkat]', '$iData[golongan]', '$iData[jabatan]', '$iData[instansi]', '$iData[tingkat_perjalanan_dinas]', '$iData[maksud_perjalanan_dinas]', '$iData[alat_angkutan]', '$iData[tempat_berakat]', '$iData[tempat_tujuan]', '$iData[lama_dinas]', '$iData[tanggal_berangkat]', '$iData[tanggal_kembali]', '$iData[beban_anggaran_instansi]', '$iData[beban_anggaran_mata_anggaran]', '$iData[NIP_kepala_dinas]', '$iData[nama_kepala_dinas]', '$iData[keterangan]', '$iData[berangkat_dari]', '$iData[tujuan_satu]', '$iData[tujuan_dua]', '$iData[tanggal_berangkat_tujuan_dua]', '$iData[tujuan_tiga]', '$iData[tangal_berangkat_tujuan_tiga]')";
}

if(isset($_GET["todo"])) {
  $todo = $_GET["todo"];

  switch($todo) {
    case "find_all":
      get_all_sppd($connection);
      break;
    case "save-pengajuan":
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
      get_all_sppd($connection);
      break;
  }
}

?>