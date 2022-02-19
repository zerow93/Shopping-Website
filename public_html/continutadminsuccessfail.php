<?php
$nume=$connect->escape_string($_POST['prodnume']);
$cat2=$connect->escape_string($_POST['prodcat']);
$subcat2=$connect->escape_string($_POST['prodsubcat']);
$cod=$connect->escape_string($_POST['prodcod']);
$pret=$connect->escape_string($_POST['prodpret']);
$stoc=$connect->escape_string($_POST['prodstoc']);
$poza=$connect->escape_string($_POST['prodpoza']);
$desc1=$connect->escape_string($_POST['proddesc1']);
$titlu=$connect->escape_string($_POST['prodtitlu']);
$desc2=$connect->escape_string($_POST['proddesc2']);
$tabel1=$connect->escape_string($_POST['tabel1']);
$tabel2=$connect->escape_string($_POST['tabel2']);
$tabel3=$connect->escape_string($_POST['tabel3']);
$tabel4=$connect->escape_string($_POST['tabel4']);
$tabel5=$connect->escape_string($_POST['tabel5']);
$tabela=$connect->escape_string($_POST['tabela']);
$tabelb=$connect->escape_string($_POST['tabelb']);
$tabelc=$connect->escape_string($_POST['tabelc']);
$tabeld=$connect->escape_string($_POST['tabeld']);
$tabele=$connect->escape_string($_POST['tabele']);
$cateprodextra=$connect->escape_string($_POST['prodextra']);
$extraproddetalii="";
if ($cateprodextra>0){
  for ($i=1; $i <= $cateprodextra; $i++) {
    $catedivextra=$connect->escape_string($_POST['Extra' . $i]);
    $extraproddetalii=$extraproddetalii . $connect->escape_string($_POST['extraname' . $i]) .":";
    for ($j=1; $j <= $catedivextra ; $j++) {
      $extraproddetalii=$extraproddetalii . $connect->escape_string($_POST['extra'.$i.'div'.$j]);
      if ($j<$catedivextra) {
        $extraproddetalii=$extraproddetalii . ",";
      }
    }
    if ($i<$cateprodextra){
      $extraproddetalii=$extraproddetalii . "|";
    }
  }
}
if (isset($_GET['adauga']) && $_GET['adauga']=='2'){
  $cat=$connect->escape_string($_GET['cat']);
  $subcat=$connect->escape_string($_GET['subcat']);
?>
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Adaugare produs</li>
  </ul>
<?php $sql = "INSERT INTO produse (cod,categorie,subcategorie,nume,pret,stock,poza,vanzari,descrieresumar,tabel1,tabel2,tabel3,tabel4,tabel5,tabela,tabelb,tabelc,tabeld,tabele,titlucomplet,descrierecomplet,extra,infoextra)
                          VALUES ('$cod','$cat','$subcat','$nume','$pret','$stoc','$poza','0','$desc1','$tabel1','$tabel2','$tabel3','$tabel4','$tabel5','$tabela','$tabelb','$tabelc','$tabeld','$tabele','$titlu','$desc2','$cateprodextra','$extraproddetalii')";
if ($connect->query($sql)){
?>
    <div class="well">
    <center><h4 style="color:green;">Succes</h4><br />Noul tau produs a fost adaugat. </center>
    </div>
<?php }else{ ?>
    <div class="well">
    <center><h4 style="color:red;">Esuat</h4><br />Produsul n-a fost adaugat . Eroare este cel mai probabil de la conexiunea catre baza de date. </center>
    </div>
<?php } ?>
</div>
<?php }elseif (isset($_GET['editare']) && $_GET['editare']=='2'){
  $prodid=$connect->escape_string($_GET['id']);
?>
  <div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
    <li class="active"> Adaugare produs</li>
    </ul>
  <?php $sql = "UPDATE `produse` SET `cod` = '$cod', `categorie` = '$cat2', `subcategorie` = '$subcat2', `nume` = '$nume', `pret` = '$pret', `stock` = '$stoc', `poza` = '$poza', `descrieresumar` = '$desc1', `tabel1` = '$tabel1', `tabel2` = '$tabel2', `tabel3` = '$tabel3', `tabel4` = '$tabel4', `tabel5` = '$tabel5', `tabela` = '$tabela', `tabelb` = '$tabelb', `tabelc` = '$tabelc', `tabeld` = '$tabeld', `tabele` = '$tabele', `titlucomplet` = '$titlu', `descrierecomplet` = '$desc2', `extra` = '$cateprodextra', `infoextra` = '$extraproddetalii' WHERE `produse`.`id` = '$prodid'";
    if ($connect->query($sql)){
  ?>
      <div class="well">
      <center><h4 style="color:green;">Succes</h4><br />Produsul a fost modificat dupa cerinte. </center>
      </div>
  <?php }else{ ?>
      <div class="well">
      <center><h4 style="color:red;">Esuat</h4><br />Produsul n-a fost modificat . Eroare este cel mai probabil de la conexiunea catre baza de date. </center>
      </div>
  <?php } ?>
  </div>
<?php } ?>
