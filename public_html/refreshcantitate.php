<?php
require 'conectarebazadate.php';
session_start();
$idprelucrat = str_replace('qty', '', $_GET['field']);
$numeprodusdemodificat=$_SESSION['produsecos'][$idprelucrat];
$_SESSION['catebuc'][$idprelucrat]=$_GET['cant'];
require 'refreshcos.php';
?>
