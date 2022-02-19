<?php
require 'conectarebazadate.php';
session_start();
$useremail=$_SESSION['useremail'];
$query=$connect->query("SELECT * FROM usersdeliverydetails WHERE email='$useremail'");
$detaliiuser2=$query->fetch_assoc();
?>
<div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
  <table style="width:96%;margin:2% 2% 2% 2%;">
    <tr>
      <td style="width:15%;border-top:0px solid white;">
        <center><img src="theme/img/delivery.png" style="width:100%"></center>
      </td>
      <td style="width:25%;border-top:0px solid white;">
        <ul>
          <li style="margin: 0 0 21px 0;">Nume: </li>
          <li style="margin: 0 0 21px 0;">Prenume: </li>
          <li style="margin: 0 0 21px 0;">Telefon: </li>
          <li style="margin: 0 0 21px 0;">Adresa: </li>
          <li style="margin: 0 0 21px 0;">Judet: </li>
          <li style="margin: 0 0 21px 0;">Oras: </li>
        </ul>
      </td>
      <td style="width:40%;border-top:0px solid white;">
        <ul>
          <li style="margin: 0 0 0 0;"><input type="text" id="nume" value="<?php echo $detaliiuser2['nume']; ?>"></li>
          <li style="margin: 0 0 0 0;"><input type="text" id="prenume" value="<?php echo $detaliiuser2['prenume']; ?>"></li>
          <li style="margin: 0 0 0 0;"><input type="text" id="telefon" value="<?php echo $detaliiuser2['telefon']; ?>"></li>
          <li style="margin: 0 0 0 0;"><input type="text" id="adresa" value="<?php echo $detaliiuser2['adresa']; ?>"></li>
          <li style="margin: 0 0 0 0;">
            <select id="judet" onchange="schimba_judet3()" class="" name="">
            <?php
              $query2 = $connect->query("SELECT * FROM localizare_judete ORDER BY id ASC");
              while($line = mysqli_fetch_assoc($query2)){?>
                <option value="<?php echo $line['id']; ?>" <?php if ($line["nume"]==$detaliiuser2['judet']){?>selected="selected"<?php } ?>><?php echo $line['nume']; ?></option>
              <?php } ?>
            </select>
          </li>

          <li style="margin: 0 0 0 0;">
            <select id="oras" class="" name="">
              <?php
                $numejudet=$detaliiuser2['judet'];
                $query3 = $connect->query("SELECT * FROM localizare_judete WHERE nume='$numejudet'");
                $judet=$query3->fetch_assoc();
                $judetuldorit=$judet['id'];
                $cerere3=$connect->query("SELECT * FROM localizare_localitati WHERE parinte='$judetuldorit' ORDER BY nume ASC");
                while($orase=mysqli_fetch_assoc($cerere3)){?>
                  <option value="<?php echo $orase["id"]; ?>" <?php if ($orase["nume"]==$detaliiuser2['oras']){?>selected="selected"<?php } ?>><?php echo $orase["nume"]; ?></option>
                <?php } ?>
            </select>
          </li>
        </ul>
      </td>
      <td style="width:20%;border-top:0px solid white;">
        <div class="pull-right">
          <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="salvareadresalivrare()">Salvare</a>
        </div>
      </td>
    </tr>
  </table>
  <div id="eroare"></div>
</div>
