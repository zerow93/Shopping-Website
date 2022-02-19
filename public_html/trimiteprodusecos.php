<?php
require 'conectarebazadate.php';
session_start();
$produsdeadaugat=$_GET['idproduscos'];
$intrebnume = $connect->query("SELECT * FROM produse WHERE id='$produsdeadaugat'");
$detaliiprodus = $intrebnume->fetch_assoc();
if (isset($_GET['cateselectare']) && $_GET['cateselectare']){
    $cateselectare=$_GET['cateselectare'];
    $arrayselect = array($cateselectare);
    $rezultatextras="";
    $rezultatextras2="";
    $explo1=explode("|", $detaliiprodus['infoextra']);
    for ($i=0; $i < $cateselectare; $i++) {
      $careselect="select".$i;
      $careselect2=$_GET[$careselect]-1;
      $explo2=explode(":", $explo1[$i]);
      $explo3=explode(",", $explo2[1]);
      if ($i < ($cateselectare-1) ){
        $rezultatextras=$rezultatextras . $explo3[$careselect2] . ", ";
        $rezultatextras2=$rezultatextras2 . $_GET[$careselect];
      }else{
        $rezultatextras=$rezultatextras . $explo3[$careselect2];
        $rezultatextras2=$rezultatextras2 . $_GET[$careselect];
      }
    }
    $numeprod=$detaliiprodus['nume']."(".$rezultatextras.")";
    $id=$detaliiprodus['id']."_".$rezultatextras2;
}else{
  $numeprod=$detaliiprodus['nume'];
  $id=$detaliiprodus['id'];
}
$_SESSION['idprodusecos'][$id]=$id;
$_SESSION['produsecos'][$id]=$numeprod;
$_SESSION['pozeprodusecos'][$id]=$detaliiprodus['poza'];
$_SESSION['preturi'][$id]=$detaliiprodus['pret'];
$_SESSION['instock'][$id]=$detaliiprodus['stock'];
if (!isset($_SESSION['catebuc'][$id])){
  $_SESSION['catebuc'][$id]=0;
}
if (!isset($_SESSION['cantitateadaugare'])){
  $_SESSION['cantitateadaugare']=1;
}
$_SESSION['catebuc'][$id]=$_SESSION['catebuc'][$id]+$_SESSION['cantitateadaugare'];
require 'refreshcos.php';
?>
