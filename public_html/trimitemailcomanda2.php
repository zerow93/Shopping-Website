<?php
require 'conectarebazadate.php';
$status=$connect->escape_string($_GET['status']);
if ($status==1){
  require 'trimiteEMAILcomandafinal.php';
}else{
  require 'trimiteEMAILcomandafinalanulare.php';
}
?>
  <ul class="breadcrumb">
  <li><a href="admin.php">Admin</a> <span class="divider">/</span></li>
  <li class="active"> Administrare comanda</li>
  </ul>
  <div class="well">
      <center><h4 style="color:green;">Succes</h4><br />Ai trimis e-mailul cu succes. </center>
  </div>
