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
<?php
if (isset($_SESSION['logat']) && $_SESSION['logat']=='1'){
?>
    <div class="span9">
      <ul class="breadcrumb">
      <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
      <li class="active"> Contul Meu</li>
      </ul>
      <div id=contulmeu>
        <table class="table" style="background-color:#D3D3D3;border: 1px solid grey;border-top:0px solid white;">
        <tr>
          <td style="padding:0px;border-top:1px solid grey;">
            <div class="pull-left" style="width:20%;height:470px;background-color:white;">
              <ul>
                <br /><li><a href="contulmeu.php?tab=1" style="color:black;text-decoration: none;">Date personale</a></li><br />
                <li><a href="contulmeu.php?tab=2" style="color:black;text-decoration: none;">Comenzile mele</a></li><br />
                <li><a href="contulmeu.php?tab=3" style="color:black;text-decoration: none;">Setari siguranta</a></li><br />
              </ul>
            </div>
            <?php
              if (!isset($_GET['tab'])){
                require 'continutcontulmeu.php';
              }else{
                if ($_GET['tab']=='1'){
                  require 'continutcontulmeu.php';
                }elseif ($_GET['tab']=='2'){
                  require 'continutistoriccomenzi.php';
                }elseif ($_GET['tab']=='3'){
                  require 'continutsetarisiguranta.php';
                }
              }
            ?>
          </td>
        </tr>
        </table>
    </div>
    </div>
<?php
}else{?>
  <h3><center>Te rog logheaza-te mai intai.</center></h3>
<?php }
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
  <script src="js/adaugacos.js"></script>
  <script src="js/editare.js"></script>
<!-- JS END ============================================= -->
</body>
</html>
