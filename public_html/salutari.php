<!DOCTYPE html>
<?php
require 'conectarebazadate.php';
session_start();
?>

<!-- TITLU+STILURI====================================================================== -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sport Extrem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="callCss" rel="stylesheet" href="css/principal.css" media="screen"/>
    <link href="css/baza.css" rel="stylesheet" media="screen"/>
	<link href="css/animatie.css" rel="stylesheet"/>
	<link href="css/font/font.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="theme/img/iconofficial.ico">
	<style type="text/css" id="enject"></style>
</head>
<body>
<!-- TITLU+STILURI FINAL====================================================================== -->


<!-- HEADER ====================================================================== -->
<?php require 'header.php'; ?>
<!-- HEADER FINAL====================================================================== -->




<!-- CARUSEL====================================================================== -->
<?php require 'carousel.php'; ?>
<!-- CARUSEL FINAL====================================================================== -->



<div id="mainBody">
	<div class="container">
	<div class="row">




<!-- MENIU STANGA DROPDOWN ================================================== -->
<?php require 'dropdownleft.php'; ?>
<!-- MENIU STANGA DROPDOWN END =============================================== -->




<!-- CONTINUT=============================================== -->

<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Plasarea comenzii</li>
  </ul>

  <div class="well">
    <ul>
      <li style="color:green;"><h4><center>Ai trimis comanda cu succes.</center></h4></li>
      <li><center>Curand vei primi un e-mail cu toate informatiile suplimentare legate de comanda.</center></li>
      <li><center>Multumim pentru comanda, Echipa Sport-Extrem.</center></li>
      <li><center><a href="index.php">Inapoi la pagina principala.</a></center></li>
    </ul>
  </div>

</div>

<!-- CONTINUT FINAL=============================================== -->

</div>
</div>
</div>

<!-- Footer ================================================================== -->

<?php require 'footer.php'; ?>

<!-- Footer END ================================================================== -->
<!-- JS ============================================= -->
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
	<script src="js/bootshop.js"></script>
  <script src="js/jquery.lightbox-0.5.js"></script>

  <script src="js/logincheck.js"></script>
  <script src="js/whenpressenter.js"></script>
  <script src="js/adaugacos.js"></script>
<!-- JS END ============================================= -->
</body>
</html>
