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



<div id="mainBody">
	<div class="container">
	<div class="row">



    <!-- MENIU STANGA DROPDOWN ================================================== -->
    <?php require 'dropdownleft.php'; ?>
    <!-- MENIU STANGA DROPDOWN END =============================================== -->




<!-- CONTINUT=============================================== -->

<h4>&nbsp;&nbsp;ASISTENTA PENTRU CLIENTI - CONTACTEAZA-NE</h4>
<hr class="soft">
<b>&nbsp;&nbsp;<?php echo $firma; ?></b>
<br />
<?php if ($telefon2==""){ ?>
  <b>&nbsp;&nbsp;Contact: <?php echo $telefon1 ?>, <?php echo $emailvanzari; ?></b>
<?php }else{ ?>
  <b>&nbsp;&nbsp;Contact: <?php echo $telefon1 ?>, <?php echo $telefon2 ?>, <?php echo $emailvanzari; ?></b>
<?php } ?>
<br />
<b>&nbsp;&nbsp;<?php echo $adresasrl; ?></b>
<br />
<p>
<center>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2824.9101359433!2d25.45903493748297!3d44.92516297313763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b2f69c0193fa29%3A0x12b72f51e91a6b57!2zQnVsZXZhcmR1bCBNaXJjZWEgY2VsIELEg3Ryw6JuIEgzLCBUw6JyZ292aciZdGU!5e0!3m2!1sro!2sro!4v1540219321652" width="70%" height="200px" frameborder="0" style="border:0" allowfullscreen></iframe>
</center>
</p>

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
  <script src="js/admin.js"></script>
<!-- JS END ============================================= -->
</body>
</html>
