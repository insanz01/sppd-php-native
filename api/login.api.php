<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$username = validate_input($connection, $_POST["username"]);
$password = $_POST["password"];

$query = "SELECT id, username, role_id, password FROM users WHERE username = '$username'";

$result = mysqli_query($connection, $query);

$data = null;

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  if(password_verify($password, $row['password'])) {
    $_SESSION['SESS_SPPD_USERNAME'] = $username;
    $_SESSION['SESS_SPPD_LOGIN'] = true;
    $_SESSION['SESS_SPPD_USER_ID'] = $row['id'];
    $_SESSION['SESS_SPPD_ROLE_ID'] = $row['role_id'];
    $_SESSION['SESS_SPPD_ROLE'] = ($row['role_id'] == 1) ? "Administrator" : "Pegawai";
  
    $data['username'] = $username;
    $data['role_id'] = ($row['role_id'] == 1) ? "Administrator" : "Pegawai";
    
    to_json($data);
    return;
  }
  // output data of each row
}

to_json($data, false, "invalid username and password");

