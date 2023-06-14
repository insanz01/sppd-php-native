<?php

function to_json($data, $is_success = true, $msg = "success") {
  $response = [
    "status" => $is_success,
    "message" => $msg,
    "data" => $data
  ];
  
  echo json_encode($response, JSON_PRETTY_PRINT);
}