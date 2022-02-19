<li><hr class="soft"/></li>
<?php
$totalpret=0.00;
if (isset($_SESSION['idprodusecos']) && $_SESSION['idprodusecos']){
  foreach ($_SESSION['idprodusecos'] as $idd) {
  $produss=$_SESSION['produsecos'][$idd];
  $pretbrut=$_SESSION['preturi'][$idd]*$_SESSION['catebuc'][$idd];
  $pretcorect = number_format($pretbrut, 2, '.', '');

  $totalpret=$totalpret+$pretbrut;
  $numartotalzecimat = number_format($totalpret, 2, '.', '');
  if (strlen($produss) > 23){
    $out = substr($produss,0,23)."...";
  }else{
    $out = $produss;
  }
    $idadevarat=explode("_",$idd);
    $idcuvirgula=str_replace("_",",",$idd);
?>

<div id="Produs<?php echo $idd; ?>"><li><button type="button" class="close" onclick="stergeprodus(<?php echo $idcuvirgula; ?>)">×&nbsp;&nbsp;&nbsp;</button><img float="left" width="80" height="80" src="theme/Produse/<?php echo $_SESSION['pozeprodusecos'][$idd]; ?>"/>&nbsp;<div>&nbsp;<?php echo $_SESSION['catebuc'][$idd]; ?> x <a href="detaliiprodus.php?id=<?php echo $idadevarat[0]; ?>" title="<?php echo $produss; ?>"><?php echo $out; ?></a></div><p align="right"><?php echo $pretcorect;?> lei&nbsp;&nbsp;&nbsp;</p></li><hr class="soft"/></div>

<?php
}
?>
<li><br /><div><center>Total : <?php echo $numartotalzecimat ?> lei</center></div></li>
<hr class="soft"/><li><center><a id="butonlung" href="cos.php">Finalizeaza comanda ></a></center></li>
<li><br /></li>
<?php
}else{
?>
  <li>Cosul tau este gol.</li>
  <li><hr class="soft"/></li>
<?php
}
?>
