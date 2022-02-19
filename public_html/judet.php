<?php
$query = $connect->query("SELECT * FROM localizare_judete ORDER BY id ASC");
$matrice = array();
while($line = mysqli_fetch_assoc($query))
{
?>
<option value="<?php echo $line["id"]; ?>"><?php echo $line["nume"]; ?></option>
<?php
}
?>
