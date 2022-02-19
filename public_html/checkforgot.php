<?php
require 'conectarebazadate.php';
session_start();
$emailforgot = $connect->escape_string($_GET["email"]);
$citesteuser = $connect->query("SELECT * FROM users WHERE email='$emailforgot'");
if ($citesteuser->num_rows === 1){
  echo "1";
  $user = $citesteuser->fetch_assoc();
  require 'trimitemailforgot.php';
}
?>
