<?php
if (isset($_SESSION['logat']) and $_SESSION['logat'] != ''){
  require 'header1.php';
}else{
  $_SESSION['logat']='';
  require 'header2.php';
}
?>
