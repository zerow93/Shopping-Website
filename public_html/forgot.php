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
if (isset($_SESSION['logat']) and $_SESSION['logat'] != ''){
  require 'continutindex.php';
}else{
  $_SESSION['logat']='';
  if ( isset($_GET['hash']) ){
    $hash=$_GET['hash'];
    $citesteuser = $connect->query("SELECT * FROM users WHERE hash='$hash'");
    if ($citesteuser->num_rows === 0){
      require 'continutindex.php';
    }else{
      $user = $citesteuser->fetch_assoc();
      $_SESSION['emailforgot']=$user['email'];
      require 'continutforgot2.php';
    }
  }else{
    require 'continutforgot.php';
  }
}
?>


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
  <script src="js/Judet.js"></script>
  <script src="js/checkreg.js"></script>
  <script src="js/adaugacos.js"></script>
<!-- JS END ============================================= -->
</body>
</html>
