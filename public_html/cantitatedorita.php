<?php
session_start();
unset($_SESSION['cantitateadaugare']);
$_SESSION['cantitateadaugare']=$_GET['cantitate'];
$produspret=$_SESSION['produsactual'];
$pretpret=$_SESSION['cantitateadaugare']*$produspret;
$pretpretfinisat = number_format($pretpret, 2, '.', '');
?>
<hr class="soft"/><li><a id="faraunderline">Pret</a> <?php echo $pretpretfinisat; ?> lei</li>
<li><a id="faraunderline">Cantitate</a> <?php echo $_SESSION['cantitateadaugare'] ?></li>
