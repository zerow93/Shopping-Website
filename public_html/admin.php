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

<?php
if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){
  if (isset($_GET['editare']) && $_GET['editare']=='1'){
    require 'continutadmineditare.php';
  }elseif (isset($_GET['adauga']) && $_GET['adauga']=='1'){
    require 'continutadminadauga.php';
  }elseif (isset($_GET['adauga']) && $_GET['adauga']=='2'){
    require 'continutadminsuccessfail.php';
  }elseif (isset($_GET['editare']) && $_GET['editare']=='2'){
    require 'continutadminsuccessfail.php';
  }elseif (isset($_GET['comanda'])){
    require 'continutadmincomanda.php';
  }else{
    require 'continutadmin.php';
  }
}else{ ?>
  <div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
    <li class="active"> Admin</li>
    </ul>
      <div class="well">
      <center><h4 style="color:red;">Esuat</h4><br />Nu ai acces catre aceasta pagina. </center>
      </div>
  </div>
<?php } ?>

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
