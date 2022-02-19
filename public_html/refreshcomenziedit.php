<?php
require 'conectarebazadate.php';
if (isset($_GET['id'])){
  $idcomanda=$connect->escape_string($_GET['id']);
}
if (isset($_GET['idprodus'])){
  $idprodusdesters=$connect->escape_string($_GET['idprodus']);
  $extraidprodus=$connect->escape_string($_GET['extraprodus']);
  if ($extraidprodus<>"0"){
    $idprodusdesters=$idprodusdesters."_".$extraidprodus;
  }
  $querycomanda = $connect->query("SELECT * FROM comenzi WHERE id='$idcomanda'");
  $detaliicomanda=$querycomanda->fetch_assoc();
  $explodcos=explode("|",$detaliicomanda['cosproduse']);
  $cateprodusecos=count($explodcos)-1;
  $noulcos="";
  $noulsubtotal=0.00;
  for ($i=0; $i < $cateprodusecos; $i++) {
    $explodcos2=explode("&", $explodcos[$i]);
    $idprodus=explode("_",$explodcos2[1]);
    $queryprodus = $connect->query("SELECT * FROM produse WHERE id='$idprodus[0]'");
    $detaliiproduss=$queryprodus->fetch_assoc();
    if ($explodcos2[1] <> $idprodusdesters){
        $noulsubtotal = $noulsubtotal + ($explodcos2[0]*$detaliiproduss['pret']);
        $noulcos .= $explodcos[$i]."|";
      }
  }
  $sql = "UPDATE `comenzi` SET `cosproduse` = '$noulcos', `subtotal` = '$noulsubtotal' WHERE `comenzi`.`id` = '$idcomanda'";
  if ($connect->query($sql)){
  }else{
    echo "EROARE LA CONEXIUNEA CU BAZA DE DATE";
  }
}
if (isset($_GET['nume'])) {
  $nume=$connect->escape_string($_GET['nume']);
  $prenume=$connect->escape_string($_GET['prenume']);
  $email=$connect->escape_string($_GET['email']);
  $judet2=$connect->escape_string($_GET['judet']);
  $oras2=$connect->escape_string($_GET['oras']);
  $adresa=$connect->escape_string($_GET['adresa']);
  $telefon=$connect->escape_string($_GET['telefon']);
  $modlivrare=$connect->escape_string($_GET['modlivrare']);
  $costlivrare=$connect->escape_string($_GET['costlivrare']);

  $queryjudet = $connect->query("SELECT * FROM localizare_judete WHERE id='$judet2'");
  $detaliijudet=$queryjudet->fetch_assoc();
  $judet=$detaliijudet['nume'];

  $queryoras = $connect->query("SELECT * FROM localizare_localitati WHERE id='$oras2' AND parinte='$judet2'");
  $detaliioras=$queryoras->fetch_assoc();
  $oras=$detaliioras['nume'];

  $noulcos2="";
  $querycomanda = $connect->query("SELECT * FROM comenzi WHERE id='$idcomanda'");
  $detaliicomanda=$querycomanda->fetch_assoc();
  $cosvechi=$detaliicomanda['cosproduse'];
  $cosproduse=explode("|",$cosvechi);
  $cateprodusecos=count($cosproduse)-1;
  $noulsubtotal2=0.00;
  for ($i=0; $i < $cateprodusecos; $i++) {
    $detaliiproduscos=explode("&",$cosproduse[$i]);
    $ceget="cantitate".$idcomanda."prod".$i;
    $idprodus2=explode("_",$detaliiproduscos[1]);
    $queryprodus2 = $connect->query("SELECT * FROM produse WHERE id='$idprodus2[0]'");
    $detaliiproduss2=$queryprodus2->fetch_assoc();
    $noulsubtotal2=$noulsubtotal2+($_GET[$ceget]*$detaliiproduss2['pret']);
    if (isset($detaliiproduscos[2])) {
      $noulcos2.= $_GET[$ceget]."&".$detaliiproduscos[1]."&".$detaliiproduscos[2]."|";
    }else{
      $noulcos2.= $_GET[$ceget]."&".$detaliiproduscos[1]."|";
    }
  }

  $sql="UPDATE `comenzi` SET `status` = '0', `nume` = '$nume', `prenume` = '$prenume', `email` = '$email', `judet` = '$judet', `oras` = '$oras', `adresa` = '$adresa', `telefon` = '$telefon', `modlivrare` = '$modlivrare', `cosproduse` = '$noulcos2', `pretlivrare` = '$costlivrare', `subtotal` = '$noulsubtotal2'  WHERE `comenzi`.`id` = '$idcomanda'";
  if ($connect->query($sql)){
  }else{
    echo "EROARE LA CONEXIUNEA CU BAZA DE DATE";
  }
}

if (isset($_GET['comanda'])){
  $comanda=$connect->escape_string($_GET['comanda']);
  $sql = "UPDATE `comenzi` SET `status` = '$comanda' WHERE `comenzi`.`id` = '$idcomanda'";
  if ($connect->query($sql)){
  }else{
    echo "EROARE LA CONEXIUNEA CU BAZA DE DATE";
  }
}

if (isset($_GET['modnoulivrare'])) {
  $modnoulivrare=$connect->escape_string($_GET['modnoulivrare']);
  $sql = "UPDATE `comenzi` SET `modlivrare` = '$modnoulivrare' WHERE `comenzi`.`id` = '$idcomanda'";
  if ($connect->query($sql)){
  }else{
    echo "EROARE LA CONEXIUNEA CU BAZA DE DATE";
  }
}

$query = $connect->query("SELECT * FROM comenzi ORDER BY id DESC");
$catecomenzi = mysqli_num_rows($query);
 ?>
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Administrare comenzi</li>
  </ul>
<?php
 if ($catecomenzi > 0){
 while($comanda = mysqli_fetch_assoc($query)){
   if ($comanda['status']=='0'){
     $culoare="Orange";
     $text="In asteptare";
  }elseif ($comanda['status']=='1') {
    $culoare="Green";
    $text="Comanda finalizata";
  }elseif ($comanda['status']=='2') {
    $culoare="Red";
    $text="Comanda anulata";
  }elseif ($comanda['status']=='-1') {
    $culoare="Yellow";
    $text="In curs de editare..";
  }
   ?>
  <div class="well">
    <div class="pull-right"><?php echo $comanda['data']; ?></div>
    <center><h4>Comanda nr. <?php echo $comanda['id']; ?> - <b style="color:<?php echo $culoare; ?>;"><?php echo $text; ?></b><?php if ($comanda['status']=='1' OR $comanda['status']=='2') { ?><a onclick="trimitemailcomanda(<?php echo $comanda['id']; ?>,<?php echo $comanda['status']; ?>)"><img src="theme/img/sendmail.png" alt="Trimite e-mail" height="100" width="100"></a><?php } ?></h4></center><br />
    <?php if ($comanda['status']=="-1"){ ?>
      <input type="text" id="numecomanda<?php echo $comanda['id']; ?>" value="<?php echo $comanda['nume']; ?>"> <input type="text" id="prenumecomanda<?php echo $comanda['id']; ?>" value="<?php echo $comanda['prenume']; ?>"> - <input type="text" id="emailcomanda<?php echo $comanda['id']; ?>" value="<?php echo $comanda['email']; ?>"><br />
      <select id="judet<?php echo $comanda['id']; ?>" onchange="schimba_judet4(<?php echo $comanda['id']; ?>)" class="" name="">
      <?php
        $queryjud = $connect->query("SELECT * FROM localizare_judete ORDER BY id ASC");
        while($line = mysqli_fetch_assoc($queryjud)){?>
          <option value="<?php echo $line['id']; ?>" <?php if ($line["nume"]==$comanda['judet']){?>selected="selected"<?php } ?>><?php echo $line['nume']; ?></option>
        <?php } ?>
      </select>, <select id="oras<?php echo $comanda['id']; ?>" class="" name="">
        <?php
          $numejudet=$comanda['judet'];
          $query3 = $connect->query("SELECT * FROM localizare_judete WHERE nume='$numejudet'");
          $judet=$query3->fetch_assoc();
          $judetuldorit=$judet['id'];
          $cerere3=$connect->query("SELECT * FROM localizare_localitati WHERE parinte='$judetuldorit' ORDER BY nume ASC");
          while($orase=mysqli_fetch_assoc($cerere3)){?>
            <option value="<?php echo $orase["id"]; ?>" <?php if ($orase["nume"]==$comanda['oras']){?>selected="selected"<?php } ?>><?php echo $orase["nume"]; ?></option>
          <?php } ?>
      </select><br />
      <input type="text" id="adresacomanda<?php echo $comanda['id']; ?>" value="<?php echo $comanda['adresa']; ?>"><br />
      <input type="text" id="telefoncomanda<?php echo $comanda['id']; ?>" value="<?php echo $comanda['telefon']; ?>"><br />
      <select id="modlivrare<?php echo $comanda['id']; ?>" onchange="schimba_modlivrare(<?php echo $comanda['id']; ?>)" class="" name="">
        <option value="livrare la domiciliu" <?php if ($comanda['modlivrare'] == "livrare la domiciliu"){ ?> selected <?php } ?> >livrare la domiciliu</option>
        <option value="ridicare din magazin" <?php if ($comanda['modlivrare'] == "ridicare din magazin"){ ?> selected <?php } ?> >ridicare din magazin</option>
      </select><br /><br />
      <table class="table">
        <tr>
          <td style="color:yellow;">Nume</td>
          <td style="color:yellow;">Stergere</td>
          <td style="width:10%;color:yellow;">Cantitate</td>
        </tr><?php
          $produse=explode("|",$comanda['cosproduse']);
          $cateproduse=count($produse)-1;
          for ($i = 0; $i < $cateproduse; $i++) {
            $produs01 = explode("&", $produse[$i]);
            $cantitateprod=$produs01[0];
            $idprod=explode("_",$produs01[1]);
            $cereredetaliiprodus=$connect->query("SELECT * FROM produse WHERE id=$idprod[0]");
            $detaliiprodus = $cereredetaliiprodus->fetch_assoc();
            if (isset($produs01[2])){
              $numeprodusfinal = $detaliiprodus['nume']."(".$produs01[2].")";
              $idprodcomanda=str_replace("_",",",$produs01[1]);
            }else{
              $numeprodusfinal = $detaliiprodus['nume'];
              $idprodcomanda=$produs01[1].",0";
            }
              ?>
                <tr>
                  <td><?php echo $numeprodusfinal; ?></td>
                  <td><button class="btn btn-danger" type="button" onclick="stergeproduscomanda(<?php echo $comanda['id']; ?>,<?php echo $idprodcomanda; ?>)"><i class="icon-trash"></i></button>	</td>
                  <td><input type="text" name="" value="<?php echo $cantitateprod; ?>" id="cantitate<?php echo $comanda['id']; ?>prod<?php echo $i; ?>" style="width:40%;"></td>
                </tr>
      <?php } ?>
      <?php if ($comanda['modlivrare'] == "livrare la domiciliu"){ ?>
        <tr>
          <td style="color:yellow;">Cost Livrare</td>
          <td colspan="2" style="text-align:right;"><input type="text" id="costlivrare<?php echo $comanda['id']; ?>" value="<?php echo $comanda['pretlivrare']; ?>" style="width:15%;">&nbsp;&nbsp;Lei</td>
        </tr>
      <?php } ?>
      </table>
      <?php if($comanda['modlivrare']=="ridicare din magazin"){
          $celivrare=0;
      }else{
          $celivrare=1;
      } ?>
        <a class="btn pull-right" style="color:yellow;" onclick="salveazacomandaeditata(<?php echo $comanda['id']; ?>,<?php echo $cateproduse; ?>,<?php echo $celivrare; ?>)">Salveaza</a>


    <?php }else{ ?>

    <?php echo $comanda['nume']; ?> <?php echo $comanda['prenume']; ?> - <?php echo $comanda['email']; ?><br />
    <?php echo $comanda['judet']; ?>, <?php echo $comanda['oras']; ?><br />
    <?php echo $comanda['adresa']; ?><br />
    <?php echo $comanda['telefon']; ?><br />
    <?php echo $comanda['modlivrare']; ?><br />
    <?php if ($comanda['mesaj']==""){
      $mesajj="-niciun mesaj-";
    }else{
      $mesajj=$comanda['mesaj'];
    } ?>
    <?php echo $mesajj; ?><br /><br />
    <table class="table">
      <tr>
        <td style="color:yellow;">Nume</td>
        <td style="width:10%;color:yellow;">Cantitate</td>
      </tr><?php
        $produse=explode("|",$comanda['cosproduse']);
        $cateproduse=count($produse)-1;
        for ($i = 0; $i < $cateproduse; $i++) {
          $produs01 = explode("&", $produse[$i]);
          $cantitateprod=$produs01[0];
          $idprod=explode("_",$produs01[1]);
          $cereredetaliiprodus=$connect->query("SELECT * FROM produse WHERE id=$idprod[0]");
          $detaliiprodus = $cereredetaliiprodus->fetch_assoc();
          if (isset($produs01[2])){
            $numeprodusfinal = $detaliiprodus['nume']."(".$produs01[2].")";
          }else{
            $numeprodusfinal = $detaliiprodus['nume'];
          }
            ?>
              <tr>
                <td><?php echo $numeprodusfinal; ?></td>
                <td><?php echo $cantitateprod; ?></td>
              </tr>
    <?php } ?>
      <tr>
        <td style="color:yellow;">Subtotal</td>
        <td style="color:yellow;"><?php echo $comanda['subtotal']; ?> Lei</td>
      </tr>
      <?php if ($comanda['modlivrare'] == "livrare la domiciliu"){ ?>
      <tr>
        <td style="color:yellow;">Cost Livrare</td>
        <td style="color:yellow;"><?php echo $comanda['pretlivrare']; ?> Lei</td>
      </tr>
      <?php } ?>
    </table>
    <?php if ($comanda['status']=='0'){ ?>
      <a class="btn pull-right" style="color:yellow;" onclick="functiebutoanecomenzi(-1,<?php echo $comanda['id']; ?>)">Editeaza</a><a class="btn pull-right" style="color:red;" onclick="functiebutoanecomenzi(2,<?php echo $comanda['id']; ?>)">Anuleaza</a><a class="btn pull-right" style="color:green;" onclick="functiebutoanecomenzi(1,<?php echo $comanda['id']; ?>)">Confirma</a>
    <?php }else{ ?>
      <a class="btn pull-right" style="color:orange;" onclick="functiebutoanecomenzi(0,<?php echo $comanda['id']; ?>)">Redeschide comanda</a>
    <?php }} ?>
  </div>
<?php }
}else{ ?>
  <h4>Nu avem nicio comanda.</h4>
<?php } ?>
