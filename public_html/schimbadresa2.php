<?php
require 'conectarebazadate.php';
session_start();
$inume=$connect->escape_string($_GET['nume']);
$iprenume=$connect->escape_string($_GET['prenume']);
$iadresa=$connect->escape_string($_GET['adresa']);
$ijudetf=$connect->escape_string($_GET['judet']);
$iorasf=$connect->escape_string($_GET['oras']);
$itelefon=$connect->escape_string($_GET['telefon']);

$query = $connect->query("SELECT * FROM localizare_judete WHERE id=$ijudetf");
$judetulreal = $query->fetch_assoc();
$ijudet = $judetulreal["nume"];

$query2 = $connect->query("SELECT * FROM localizare_localitati WHERE id=$iorasf");
$orasulreal = $query2->fetch_assoc();
$ioras = $orasulreal["nume"];

$iduseractual=$_SESSION['usernameid'];
$cerere=$connect->query("SELECT * FROM users WHERE id='$iduseractual'");
$emailuseractual2 = $cerere->fetch_assoc();
$emailuseractual = $emailuseractual2['email'];


if (preg_match("/^[a-zA-Z ]*$/",$inume) && ($inume!="")){
  if (preg_match("/^[a-zA-Z ]*$/",$iprenume) && ($iprenume!="")){
    if ( ($ijudetf!="") && ($iorasf!="") ){
      if($iadresa!=""){
        if (preg_match("/^[0-9]{10}$/", $itelefon)){
          $sqll = "UPDATE `usersdeliverydetails` SET `nume` = '$inume', `prenume` = '$iprenume', `adresa` = '$iadresa', `judet` = '$ijudet', `oras` = '$ioras', `telefon` = '$itelefon'  WHERE `usersdeliverydetails`.`email` = '$emailuseractual'";
          if ($connect->query($sqll)){
            $mesajul = "1. Adrese";
          }else{
            $mesajul = "EROARE: N-am putut schimba adresa!";
          }

          $detaliiuser=$connect->query("SELECT * FROM usersdeliverydetails WHERE email='$emailuseractual'");
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
                        <li><a class="btn" onclick="schimbareadresa()">Actualizeaza <i class="icon-arrow-right"></i></a></li>
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
