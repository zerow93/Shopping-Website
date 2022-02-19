<?php
require 'conectarebazadate.php';
session_start();
$careextra=$connect->escape_string($_GET['care']);
$catextra=$connect->escape_string($_GET['cate']);
for ($i=1; $i<=$catextra; $i++){
?>
<div class="controls">
  <input type="text" name="extra<?php echo $careextra; ?>div<?php echo $i; ?>">
</div>
<?php } ?>
