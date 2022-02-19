<?php
require 'conectarebazadate.php';
session_start();
$useremail=$_SESSION['useremail'];

$inume=$connect->escape_string($_GET['nume']);
$iprenume=$connect->escape_string($_GET['prenume']);
$itelefon=$connect->escape_string($_GET['telefon']);
$iadresa=$connect->escape_string($_GET['adresa']);
$judet=$connect->escape_string($_GET['judet']);
$oras=$connect->escape_string($_GET['oras']);
$queryjudet=$connect->query("SELECT * FROM localizare_judete WHERE id='$judet'");
$rezultatjudet=$queryjudet->fetch_assoc();
$ijudet=$rezultatjudet['nume'];
$queryoras=$connect->query("SELECT * FROM localizare_localitati WHERE id='$oras'");
$rezultatoras=$queryoras->fetch_assoc();
$ioras=$rezultatoras['nume'];

if (preg_match("/^[a-zA-Z ]*$/",$inume) && ($inume!="") && preg_match("/^[a-zA-Z ]*$/",$iprenume) && ($iprenume!="") && preg_match("/^[0-9]{10}$/", $itelefon) && $iadresa!=""){
    $sql = "UPDATE `usersdeliverydetails` SET `nume` = '$inume', `prenume` = '$iprenume', `telefon` = '$itelefon', `adresa` = '$iadresa', `judet` = '$ijudet', `oras` = '$ioras' WHERE `usersdeliverydetails`.`email` = '$useremail'";
    if ($connect->query($sql)){
      $query=$connect->query("SELECT * FROM usersdeliverydetails WHERE email='$useremail'");
      $detaliiuser2=$query->fetch_assoc();
    ?>

    <div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
      <table style="width:96%;margin:2% 2% 2% 2%;">
        <tr>
          <td style="width:15%;border-top:0px solid white;">
            <center><img src="theme/img/delivery.png" style="width:100%"></center>
          </td>
          <td style="width:65%;border-top:0px solid white;">
            <ul>
              <li style="margin: 0 0 10px 0;"><strong><?php echo $detaliiuser2['nume']; ?> <?php echo $detaliiuser2['prenume']; ?> - <?php echo $detaliiuser2['telefon']; ?></strong></li>
              <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser2['adresa']; ?></li>
              <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser2['judet']; ?>, <?php echo $detaliiuser2['oras']; ?></li>
            </ul>
          </td>
          <td style="width:20%;border-top:0px solid white;">
            <div class="pull-right">
              <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="editareadresalivrare()">modifica</a>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <?php }
}else{
  echo "1";
}?>
