<?php

function json($data, $msg = "success") {
  $response = [
    "status" => true,
    "message" => $msg,
    "data" => $data
  ];
  
  echo json_encode($response, JSON_PRETTY_PRINT);
}