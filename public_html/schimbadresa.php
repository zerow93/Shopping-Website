<?php
require 'conectarebazadate.php';
session_start();
$iduseractual=$_SESSION['usernameid'];
$cererea=$connect->query("SELECT * FROM users WHERE id='$iduseractual'");
$emailuseractual2 = $cererea->fetch_assoc();
$emailuseractual = $emailuseractual2['email'];
$detaliiuser=$connect->query("SELECT * FROM usersdeliverydetails WHERE email='$emailuseractual'");
$useractual = $detaliiuser->fetch_assoc();
$judetdecautat=$useractual['judet'];
$cerere=$connect->query("SELECT * FROM localizare_judete WHERE nume='$judetdecautat'");
$judetactual = $cerere->fetch_assoc();
$orasdecautat=$useractual['oras'];
$cerere2=$connect->query("SELECT * FROM localizare_localitati WHERE nume='$orasdecautat'");
$orasactual = $cerere2->fetch_assoc();
?>

<h3>1. Adrese</h3>
<hr class="soft"/>
<table class="table table-bordered">
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
      </ul>
    </td>
    <td>
      <table>
        <tbody>
          <tr>
              <td>Nume</td>
              <td><input id="inume" type="text" value="<?php echo $useractual['nume']; ?>"></td>
          </tr>
          <tr>
              <td>Prenume</td>
              <td><input id="iprenume" type="text" value="<?php echo $useractual['prenume']; ?>"></td>
          </tr>
          <tr>
              <td>Adresa</td>
              <td><input id="iadresa" type="text" value="<?php echo $useractual['adresa']; ?>"></td>
          </tr>
          <tr>
              <td>Judet</td>
              <td>
                <select id="ijudet" onchange="schimba_judet2()" class="" name="judetreg">
                <?php
                  $query = $connect->query("SELECT * FROM localizare_judete ORDER BY id ASC");
                  while($line = mysqli_fetch_assoc($query)){?>
                    <option value="<?php echo $line['id']; ?>" <?php if ($line["id"]==$judetactual['id']){?>selected="selected"<?php } ?>><?php echo $line['nume']; ?></option>
                  <?php } ?>
                </select>
              </td>
          </tr>
          <tr>
              <td>Oras/Localitate</td>
              <td>
                <select id="ioras" class="" name="orasreg">
                  <?php
                    $judetuldorit=$judetactual['id'];
                    $cerere3=$connect->query("SELECT * FROM localizare_localitati WHERE parinte='$judetuldorit' ORDER BY nume ASC");
                    while($orase=mysqli_fetch_assoc($cerere3)){?>
                      <option value="<?php echo $orase["id"]; ?>" <?php if ($orase["id"]==$orasactual['id']){?>selected="selected"<?php } ?>><?php echo $orase["nume"]; ?></option>
                    <?php } ?>
                </select>
              </td>
          </tr>
          <tr>
              <td>Telefon</td>
              <td><input id="itelefon" type="text" value="<?php echo $useractual['telefon']; ?>"></td>
          </tr>
        </tbody>
        </table>
        <br />
        <div id="eroareee"></div>
        <li><a class="btn" onclick="schimbareadresa2()"><i class="icon-arrow-left"></i> Salveaza</a></li>
    </td>
    </tr>
  </tbody>
</table>
