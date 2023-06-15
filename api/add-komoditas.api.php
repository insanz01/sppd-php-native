<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$nama = validate_input($connection, $_POST["nama"]);
$id_satuan = validate_input($connection, $_POST["id_satuan"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO komoditas (nama, id_satuan) VALUES ('$nama', $id_satuan)";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['id_satuan'] = $id_satuan;
  $data['created_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

