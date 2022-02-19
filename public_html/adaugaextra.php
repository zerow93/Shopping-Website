<?php
require 'conectarebazadate.php';
session_start();
$catextra=$connect->escape_string($_GET['cate']);
if ($catextra>0){
  for ($i=1; $i<=$catextra; $i++){
?>
<hr>
<div class="control-group">
  <label class="control-label" for="extraname<?php echo $i; ?>">Nume extra <?php echo $i; ?> :</label>
  <div class="controls">
    <input type="text" name="extraname<?php echo $i; ?>">
  </div>
</div>
  <label class="control-label" for="Extra<?php echo $i; ?>">Cate Extra <?php echo $i; ?>:</label>
  <div class="controls">
    <select onchange="adaugaextra1(<?php echo $i; ?>)" id="Extra<?php echo $i; ?>" class="span1" name="Extra<?php echo $i; ?>">
      <?php
      for ($j=1; $j <=30 ; $j++) {
      ?>
        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <div id="exxtra<?php echo $i; ?>">
    <div class="controls">
      <input type="text" name="extra<?php echo $i; ?>div1">
    </div>
  </div>
<?php }} ?>
