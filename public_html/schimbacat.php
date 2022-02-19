<?php
require 'conectarebazadate.php';
session_start();
$categorie=$connect->escape_string($_GET['cat']);
$subcat=array(array('Camping','Fitness','Role,Trotinete,Skateboard,Longboard','Sporturi cu racheta','Fotbal','Sporturi de apa','Pescuit','Box si arte martiale','Balet','Basket,Volei,Handbal,Baseball','Snowboarding,Schi,Patinaj pe gheata','Altele'),array('Scuter','ATV','Scuter Electric','Bicicleta Electrica','Piese','Accesorii'),array('Biciclete','Piese','Accesorii'));
$count=count($subcat[($categorie-1)])
?>

<label class="control-label" for="prodsubcat">Subcategorie:</label>
<div class="controls">
  <select class="span1" name="prodsubcat">
    <?php for ($i=0; $i<$count; $i++){  ?>
      <option value="<?php echo ($i+1); ?>"><?php echo $subcat[($categorie-1)][$i]; ?></option>
    <?php } ?>
  </select>
</div>
