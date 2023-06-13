<?php

include "../database/db.php";

$query = "SELECT id_produsen, harga_produsen, tanggal_produsen FROM tb_harga_produsen";

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id_produsen'],
      "harga" => $row['harga_produsen'],
      "tanggal" => $row['tanggal_produsen']
    ];

    array_push($data, $temp_data);
  }
}

$response = [
  "status" => true,
  "message" => "success",
  "data" => $data
];

echo json_encode($response, JSON_PRETTY_PRINT);
