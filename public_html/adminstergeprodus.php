<?php
require 'conectarebazadate.php';
session_start();
if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){
    $produs=$connect->escape_string($_GET['produs']);
    $cat=$connect->escape_string($_GET['cat']);
    $subcat=$connect->escape_string($_GET['subcat']);
    $p=$connect->escape_string($_GET['p']);
    $sortare=$connect->escape_string($_GET['Sortare']);
    $sql="DELETE FROM `produse` WHERE `produse`.`id` = $produs";
    if($connect->query($sql)){?>
      <meta http-equiv="refresh" content="0; URL='produse.php?cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=<?php echo $p; ?>&Sortare=<?php echo $sortare; ?>'" />
    <?php }else{ ?>
      <h4>EROARE: S-a produs o eroare. Produsul n-a putut fii sters.</h4>
    <?php }
}else{?>
      <h4>EROARE: Nu ai accesul necesar.</h4>
<?php } ?>
