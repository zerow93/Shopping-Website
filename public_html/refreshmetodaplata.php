<?php
require 'conectarebazadate.php';
session_start();
 ?>

<h3>3. Metoda plata</h3>
<hr class="soft"/>
<br />
<div id="eroare"></div>
<?php if (isset($_SESSION['guest'])){ ?>
  <a class="btn" style="width:99%;height:40px;padding-top:3%;" onclick="trimitecomanda()"><img src="theme/img/iconofficial.ico"></img> Plateste in sistem ramburs (Veti plati produsele la livrare)</a>
<?php }elseif(isset($_SESSION['logat']) && $_SESSION['logat'] == 1){ ?>
  <a class="btn" style="width:99%;height:40px;padding-top:3%;" onclick="trimitecomanda()"><img src="theme/img/iconofficial.ico"></img> Plateste in sistem ramburs (Veti plati produsele la livrare)</a>
<?php }else{ ?>
  <div class="alert alert-block alert-error fade in">Trebuie sa te autentifici pentru a vedea metodele de plata</div>
<?php } ?>
