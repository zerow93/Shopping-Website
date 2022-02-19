<?php
require 'conectarebazadate.php';
session_start();
$emailforgot = $_SESSION['emailforgot'];
$passf1 = $connect->escape_string($_GET["passf1"]);
$passf2 = $connect->escape_string($_GET["passf2"]);
$citesteuser = $connect->query("SELECT * FROM users WHERE email='$emailforgot'");
$hash = $connect->escape_string(md5(rand(0,1000)));
if ($citesteuser->num_rows === 0){
  echo "Acest cont este inexistent";
}else{
  if($passf1!=""){
    if ($passf1==$passf2){
      if (strlen($passf1) >= '6'){
        $user = $citesteuser->fetch_assoc();
        $parolanoua = $connect->escape_string(password_hash($passf1, PASSWORD_BCRYPT));
        $sql = "UPDATE `users` SET `password` = '$parolanoua', `hash` = '$hash' WHERE `users`.`email` = '$emailforgot'";
        if ($connect->query($sql)){
          echo "0";
          unset($_SESSION['emailforgot']);
        }else{
          echo "A intervenit o eroare, incearca mai tarziu.";
        }
      }else{
        echo "Parola trebuie sa contina minum 6 caractere.";
      }
    }else{
      echo "Parolele nu coincid.";
    }
  }else{
    echo "Introduceti o parola.";
  }
}
?>
