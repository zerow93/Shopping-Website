<?php
require 'conectarebazadate.php';
session_start();
$emailuseractual=$_SESSION['guest'];
$telefonguest=$_SESSION['telefonguest'];
$nume=$connect->escape_string($_GET['nume']);
$prenume=$connect->escape_string($_GET['prenume']);
$judett=$connect->escape_string($_GET['judet']);
$orass=$connect->escape_string($_GET['oras']);
$adresa=$connect->escape_string($_GET['adresa']);
$telefon=$connect->escape_string($_GET['telefon']);
$query = $connect->query("SELECT * FROM localizare_judete WHERE id=$judett");
$judetulreal = $query->fetch_assoc();
$judet = $judetulreal["nume"];
$query2 = $connect->query("SELECT * FROM localizare_localitati WHERE id=$orass");
$orasulreal = $query2->fetch_assoc();
$oras = $orasulreal["nume"];

if (preg_match("/^[a-zA-Z ]*$/",$nume) && ($nume!="")){
  if (preg_match("/^[a-zA-Z ]*$/",$prenume) && ($prenume!="")){
    if ( ($judett!="") && ($orass!="") ){
      if($adresa!=""){
        if (preg_match("/^[0-9]{10}$/", $telefon)){
          $sql = "UPDATE `guesttempo` SET `nume` = '$nume', `prenume` = '$prenume', `judet` = '$judet', `oras` = '$oras', `adresa` = '$adresa', `telefon` = '$telefon'  WHERE `guesttempo`.`email` = '$emailuseractual'";
          if ($connect->query($sql)){
            $mesajul = "1. Adrese";
          }else{
            $mesajul = "EROARE: N-am putut schimba adresa!";
          }
          $detaliiuser=$connect->query("SELECT * FROM guesttempo WHERE email='$emailuseractual' AND telefon='$telefonguest'");
          $useractual = $detaliiuser->fetch_assoc();
          ?>
                <h3><?php echo $mesajul; ?></h3>
                <hr class="soft"/>
                <table class="table table-bordered" style="width:50%;">
                  <tbody>
                    <tr>
                    <td>
                      <ul class="item box">
                        <li><h4>Adresa ta de livrare</h4></li>
                        <hr class="soft"/>
                        <li><?php echo $useractual['nume']." ".$useractual['prenume']; ?> </li>
                        <li><?php echo $useractual['adresa']; ?></li>
                        <li><?php echo $useractual['judet']; ?></li>
                        <li><?php echo $useractual['oras']; ?></li>
                        <li><?php echo $useractual['telefon']; ?></li>
                        <br />
                        <li><a class="btn" onclick="schimbareadresa3()">Actualizeaza <i class="icon-arrow-right"></i></a></li>
                      </ul>
                    </td>
                    </tr>
                  </tbody>
                </table><?php
        }else{
          echo "0";
        }
      }else{
        echo "0";
      }
    }else{
      echo "0";
    }
  }else{
    echo "0";
  }
}else{
  echo "0";
}
?>
