<?php
require 'conectarebazadate.php';
session_start();
$sselect=$connect->escape_string($_GET['careselect']);
$valueselect=$connect->escape_string($_GET['valoarenoua']);
$idprodus=$connect->escape_string($_GET['idprodus']);
$newvalueselect=$valueselect-1;

$citesteprodus = $connect->query("SELECT * FROM produse WHERE id='$idprodus'");
$produs = $citesteprodus->fetch_assoc();

$explod=explode("|",$produs['infoextra']);
for ($i=0; $i < $produs['extra'] ; $i++) {
  $explodd=explode(":",$explod[$i]);
  $exploddd=explode(",",$explodd[1]);
  if ($i==$sselect) { ?>
      <a id="faraunderline"><?php echo $explodd[0]; ?></a> <?php
      echo $exploddd[$newvalueselect];
  }
}

?>
