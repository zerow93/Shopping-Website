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
require 'continutdetaliiprodus.php';
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
  <script src="js/preventkey.js"></script>
  <script>var stockvalabil = <?php Print($variabilaaiurea); ?>;
  $(document).on('click', '.product_quantity_up', function(e){
          e.preventDefault();
          fieldName = $(this).data('field-qty');
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          if (currentVal < stockvalabil)
            $('input[name='+fieldName+']').val(currentVal + 1).trigger('keyup');
          else
            $('input[name='+fieldName+']').val(stockvalabil);

          $('#quantity_wanted').change();
          var currentVal2 = parseInt($('input[name='+fieldName+']').val());
          var getquantity=new XMLHttpRequest();
          getquantity.open("GET","cantitatedorita.php?cantitate="+currentVal2,false);
          getquantity.send(null);
          document.getElementById("aiciseschimba").innerHTML=getquantity.responseText;
  });
   // The button to decrement the product value
  $(document).on('click', '.product_quantity_down', function(e){
          e.preventDefault();
          fieldName = $(this).data('field-qty');
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          if (!isNaN(currentVal) && currentVal > 1)
                  $('input[name='+fieldName+']').val(currentVal - 1).trigger('keyup');
          else
                  $('input[name='+fieldName+']').val(1);

          $('#quantity_wanted').change();
          var currentVal2 = parseInt($('input[name='+fieldName+']').val());
          var getquantity=new XMLHttpRequest();
          getquantity.open("GET","cantitatedorita.php?cantitate="+currentVal2,false);
          getquantity.send(null);
          document.getElementById("aiciseschimba").innerHTML=getquantity.responseText;
  });
</script>
<!-- JS END ============================================= -->
</body>
</html>
