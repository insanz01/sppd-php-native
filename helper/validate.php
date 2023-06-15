<?php

function validate_input($conn, $data) {
  $str = mysqli_real_escape_string($conn, $data);
  $str = addslashes($str);

  return $str;
}

function validate_email($email) {
  // Regular expression for a valid email address
  $regex = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}$/';

  // Check if the email address matches the regular expression
  if (preg_match($regex, $email)) {
    return true;
  } else {
    return false;
  }
}