<?php
require 'conectarebazadate.php';
$judet = $connect->escape_string($_GET["judet"]);
$cerere3=$connect->query("SELECT * FROM localizare_localitati WHERE parinte='$judet' ORDER BY nume ASC");
while($orase=mysqli_fetch_assoc($cerere3)){?>
    <option value="<?php echo $orase["id"]; ?>"><?php echo $orase["nume"]; ?></option>
<?php } ?>
