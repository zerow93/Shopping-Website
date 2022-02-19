<?php
require 'conectarebazadate.php';
$id=$connect->escape_string($_GET['id']);
$status=$connect->escape_string($_GET['status']);
?>
  <ul class="breadcrumb">
  <li><a href="admin.php">Admin</a> <span class="divider">/</span></li>
  <li class="active"> Administrare comanda</li>
  </ul>
  <div class="well">
      <center><h4 style="color:green;">Esti sigur ca vrei sa trimiti e-mailul?</h4>
        <?php if ($status==2){ ?>
          <p>Motiv:<input type="text" id="motivanulare" style="width:90%;"></p>
        <?php } ?>
        <br />
        <a class="btn pull-right" href="admin.php">Nu</a>
        <a class="btn pull-right" onclick="trimitemailcomanda2(<?php echo $id; ?>,<?php echo $status; ?>)">Da</a>
      </center>
  </div>
