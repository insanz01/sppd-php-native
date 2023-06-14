<?php

function validate_input($conn, $data) {
  $str = mysqli_real_escape_string($conn, $data);
  $str = addslashes($str);

  return $str;
}