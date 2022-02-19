<?php
require 'conectarebazadate.php';
session_start();
$idcomanda=$connect->escape_string($_GET['idcomanda']);
$idprodus=$connect->escape_string($_GET['idprodus']);
$cantitate=$connect->escape_string($_GET['cantitate']);

$queryprodus = $connect->query("SELECT * FROM produse WHERE id='$idprodus'");
$detaliiprodus = $queryprodus->fetch_assoc();

if (isset($_GET['cateselectare']) && $_GET['cateselectare']){
    $cateselectare=$_GET['cateselectare'];
    $rezultatextras="";
    $rezultatextras2="";
    $explo1=explode("|", $detaliiprodus['infoextra']);
    for ($i=0; $i < $cateselectare; $i++) {
      $careselect="select".$i;
      $carediv=$_GET[$careselect]-1;
      $explo2=explode(":", $explo1[$i]);
      $explo3=explode(",", $explo2[1]);
      if ($i < ($cateselectare-1) ){
        $rezultatextras .= $explo3[$carediv] . ",";
        $rezultatextras2 .= $_GET[$careselect];
      }else{
        $rezultatextras .= $explo3[$carediv];
        $rezultatextras2 .= $_GET[$careselect];
      }
    }
    $idprodus .= "_".$rezultatextras2."&".$rezultatextras;
}

$noulprodus = $cantitate."&".$idprodus;
$querycomanda = $connect->query("SELECT * FROM comenzi WHERE id='$idcomanda'");
$detaliicomanda = $querycomanda->fetch_assoc();

$explodarecos=explode("|",$detaliicomanda['cosproduse']);
$numarproduse=count($explodarecos)-1;
$k=0;
$noulcos="";
for ($i=0; $i < $numarproduse; $i++) {
  $explodareprodus=explode("&",$explodarecos[$i]);
  if (isset($explodareprodus[2])){
    $prodfaracant=$explodareprodus[1]."&".$explodareprodus[2];
  }else{
    $prodfaracant=$explodareprodus[1];
  }
  if ($prodfaracant == $idprodus) {
    $k=1;
    $nouacantitate = $explodareprodus[0]+$cantitate;
    $noulcos.= $nouacantitate."&".$idprodus."|";
  }else{
    $noulcos.=$explodarecos[$i]."|";
  }
}
if ($k==0) {
  $noulcos=$detaliicomanda['cosproduse'].$noulprodus."|";
}

$sql = "UPDATE `comenzi` SET `cosproduse` = '$noulcos' WHERE `comenzi`.`id` = '$idcomanda'";
if ($connect->query($sql)){ ?>
  <div class='alert alert-block alert-error fade in' style="background-color:green;border-color:green;"><button type='button' class='close' data-dismiss='alert'>×</button>Succes: Produsul a fost adaugat in comanda <?php echo $idcomanda; ?>.</div>
<?php }else{ ?>
  <div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Eroare: Produsul n-a putut fii adaugat.</div>
<?php } ?>
