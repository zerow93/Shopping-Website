<?php
require 'conectarebazadate.php';
$judet = $connect->escape_string($_GET["judet"]);
?>
<select id="oras" class="" name="orasreg">
<option value="">Alege Localitatea</option>
<?php
if($judet!=""){
$res = $connect->query("SELECT * FROM localizare_localitati WHERE parinte=$judet ORDER BY nume ASC");
while($orase = mysqli_fetch_assoc($res)){
?>
<option value="<?php echo $orase["id"]; ?>"><?php echo $orase["nume"]; ?></option>
<?php
}
}
echo "</select>";
?>
