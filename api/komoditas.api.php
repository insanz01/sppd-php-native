<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT komoditas.id, komoditas.nama, satuan.nama as satuan, komoditas.created_at, komoditas.updated_at FROM komoditas JOIN satuan ON komoditas.id_satuan = satuan.id";

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "nama" => $row['nama'],
      "satuan" => $row['satuan'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
