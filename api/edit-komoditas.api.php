<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$nama = validate_input($connection, $_POST["nama"]);
$id_satuan = validate_input($connection, $_POST["id_satuan"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE komoditas SET nama = '$nama', id_satuan = $id_satuan, updated_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['id_satuan'] = $id_satuan;
  $data['updated_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

