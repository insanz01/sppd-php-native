<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$username = validate_input($connection, $_POST["username"]);
$password = validate_input($connection, $_POST["password"]);

$password = password_hash($password, PASSWORD_DEFAULT);

$query = "SELECT id_admin, username, id_role FROM tb_admin WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($connection, $query);

$data = null;

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // output data of each row
  $_SESSION['SESS_HARPAN_USERNAME'] = $username;
  $_SESSION['SESS_HARPAN_LOGIN'] = true;
  $_SESSION['SESS_HARPAN_ROLE_ID'] = $row['id_role'];
  $_SESSION['SESS_HARPAN_ROLE'] = ($row['id_role'] == 1) ? "Pimpinan" : "Administrator";

  $data['username'] = $username;
  $data['role_id'] = ($row['id_role'] == 1) ? "Pimpinan" : "Administrator";
  
  to_json($data);
  return;
}

to_json($data, false, "invalid username and password");

