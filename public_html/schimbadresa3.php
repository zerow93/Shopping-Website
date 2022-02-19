<?php
require 'conectarebazadate.php';
session_start();
$guest=$_SESSION['guest'];
$telefonguest=$_SESSION['telefonguest'];
$query=$connect->query("SELECT * FROM guesttempo WHERE email='$guest' AND telefon='$telefonguest'");
$useractual = $query->fetch_assoc();
$judetnume = $useractual['judet'];
$queryy=$connect->query("SELECT * FROM localizare_judete WHERE nume='$judetnume'");
$judetdetalii = $queryy->fetch_assoc();
$judetid=$judetdetalii['id'];
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
                <select id="ijudet" onchange="schimba_judet2()">
                <?php
                  $query2 = $connect->query("SELECT * FROM localizare_judete ORDER BY id ASC");
                  while($line = mysqli_fetch_assoc($query2)){?>
                    <option value="<?php echo $line['id']; ?>" <?php if ($line["nume"]==$useractual['judet']){?>selected="selected"<?php } ?>><?php echo $line['nume']; ?></option>
                  <?php } ?>
                </select>
              </td>
          </tr>
          <tr>
              <td>Oras/Localitate</td>
              <td>
                <select id="ioras" class="" name="orasreg">
                  <?php
                    $query3=$connect->query("SELECT * FROM localizare_localitati WHERE parinte='$judetid' ORDER BY nume ASC");
                    while($orase=mysqli_fetch_assoc($query3)){?>
                      <option value="<?php echo $orase["id"]; ?>" <?php if ($orase["nume"]==$useractual['oras']){?>selected="selected"<?php } ?>><?php echo $orase["nume"]; ?></option>
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
        <div id="eroaree"></div>
        <li><a class="btn" onclick="schimbadresa4()"><i class="icon-arrow-left"></i> Salveaza</a></li>
    </td>
    </tr>
  </tbody>
</table>
