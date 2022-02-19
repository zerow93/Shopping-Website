<?php
require 'conectarebazadate.php';
session_start();
$produsdestersss=$_GET['idproduscos'];
if ($_GET['complement']<>"" && $_GET['complement']>0){
  $produsdesterss=$_GET['complement'];
  $produsdesters=$produsdestersss."_".$produsdesterss;
}else{
  $produsdesters=$produsdestersss;
}
$numeprodussters=$_SESSION['produsecos'][$produsdesters];
unset($_SESSION['idprodusecos'][$produsdesters]);
unset($_SESSION['pozeprodusecos'][$produsdesters]);
unset($_SESSION['preturi'][$produsdesters]);
unset($_SESSION['catebuc'][$produsdesters]);
unset($_SESSION['produsecos'][$produsdesters]);
unset($_SESSION['instock'][$produsdesters]);
require 'refreshcos.php';
?>
