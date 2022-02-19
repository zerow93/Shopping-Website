<?php
require 'conectarebazadate.php';
session_start();
$userid=$_SESSION['usernameid'];
$inume=$connect->escape_string($_GET['nume']);
$iprenume=$connect->escape_string($_GET['prenume']);
$itelefon=$connect->escape_string($_GET['telefon']);
$iziua=$connect->escape_string($_GET['ziua']);
$iluna=$connect->escape_string($_GET['luna']);
$ianul=$connect->escape_string($_GET['anul']);
$idatanastere=$iziua . "." . $iluna . "." . $ianul;

if (preg_match("/^[a-zA-Z ]*$/",$inume) && ($inume!="") && preg_match("/^[a-zA-Z ]*$/",$iprenume) && ($iprenume!="") && preg_match("/^[0-9]{10}$/", $itelefon)){
        $sql = "UPDATE `users` SET `nume` = '$inume', `prenume` = '$iprenume', `telefon` = '$itelefon', `datanastere` = '$idatanastere' WHERE `users`.`id` = '$userid'";
        if ($connect->query($sql)){
          $query=$connect->query("SELECT * FROM users WHERE id='$userid'");
          $detaliiuser=$query->fetch_assoc();
          $datanastere=$detaliiuser['datanastere'];
          $impartit = explode(".", $datanastere);
          $luni= array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
          $luna=$luni[(intval($impartit[1]))-1];
          $datanasterii=$impartit[0] . " " . $luna . " " . $impartit[2];
          ?>

          <div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
            <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
              <tr>
                <td style="width:15%;border-top:0px solid white;">
                  <center><img src="theme/img/cont2.png" style="width:100%"></center>
                </td>
                <td style="width:25%;border-top:0px solid white;">
                  <ul>
                    <li style="margin: 0 0 10px 0;">Nume:</li>
                    <li style="margin: 0 0 10px 0;">Prenume:</li>
                    <li style="margin: 0 0 10px 0;">Telefon:</li>
                    <li style="margin: 0 0 10px 0;">Data nasterii:</li>
                  </ul>
                </td>

                <td style="width:40%;border-top:0px solid white;">
                  <ul>
                    <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser['nume']; ?></li>
                    <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser['prenume']; ?></li>
                    <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser['telefon']; ?></li>
                    <li style="margin: 0 0 10px 0;"><?php echo $datanasterii; ?></li>
                  </ul>
                </td>
                <td style="width:20%;border-top:0px solid white;">
                  <div class="pull-right">
                    <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="editaredatelemele()">Editeaza datele</a>
                  </div>
                </td>

              </tr>
            </table>
          </div>
        <?php }
}else{
  echo "1";
} ?>
