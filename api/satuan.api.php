<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT id, nama FROM satuan";

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "nama" => $row['nama']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
