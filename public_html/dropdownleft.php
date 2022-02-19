<?php
$item1="subMenu open";
$item2="subMenu";
$item3="subMenu";
$viz1="";
$viz2="display:none";
$viz3="display:none";
if (isset($_GET['cat'])) {
    if ($_GET['cat']=='1'){
      $item1="subMenu open";
      $item2="subMenu";
      $item3="subMenu";
      $viz1="";
      $viz2="display:none";
      $viz3="display:none";
    }elseif ($_GET['cat']=='2'){
      $item1="subMenu";
      $item2="subMenu open";
      $item3="subMenu";
      $viz2="";
      $viz1="display:none";
      $viz3="display:none";
    }elseif ($_GET['cat']=='3'){
      $item1="subMenu";
      $item2="subMenu";
      $item3="subMenu open";
      $viz3="";
      $viz2="display:none";
      $viz1="display:none";
    }
}
?>

<div id="sidebar" class="span3">
  <ul id="sideManu" class="nav nav-tabs nav-stacked">
    <li class="<?php echo $item1; ?>"><a>Sport</a>
      <ul style="<?php echo $viz1; ?>">
      <li><a href="produse.php?cat=1&subcat=1"><i class="icon-chevron-right"></i>Camping</a></li>
      <li><a href="produse.php?cat=1&subcat=2"><i class="icon-chevron-right"></i>Fitness</a></li>
      <li><a href="produse.php?cat=1&subcat=3"><i class="icon-chevron-right"></i>Role,Trotinete,Skateboard,Longboard</a></li>
      <li><a href="produse.php?cat=1&subcat=4"><i class="icon-chevron-right"></i>Sporturi cu racheta</a></li>
      <li><a href="produse.php?cat=1&subcat=5"><i class="icon-chevron-right"></i>Fotbal</a></li>
      <li><a href="produse.php?cat=1&subcat=6"><i class="icon-chevron-right"></i>Sporturi de apa</a></li>
      <li><a href="produse.php?cat=1&subcat=7"><i class="icon-chevron-right"></i>Pescuit</a></li>
      <li><a href="produse.php?cat=1&subcat=8"><i class="icon-chevron-right"></i>Box si arte martiale</a></li>
      <li><a href="produse.php?cat=1&subcat=9"><i class="icon-chevron-right"></i>Balet</a></li>
      <li><a href="produse.php?cat=1&subcat=10"><i class="icon-chevron-right"></i>Basket,Volei,Handbal,Baseball</a></li>
      <li><a href="produse.php?cat=1&subcat=11"><i class="icon-chevron-right"></i>Snowboarding,Schi,Patinaj pe gheata</a></li>
      <li><a href="produse.php?cat=1&subcat=12"><i class="icon-chevron-right"></i>Altele</a></li>
      </ul>
    </li>
    <li class="<?php echo $item2; ?>"><a>Moto</a>
    <ul style="<?php echo $viz2; ?>">
      <li><a href="produse.php?cat=2&subcat=1"><i class="icon-chevron-right"></i>Scuter</a></li>
      <li><a href="produse.php?cat=2&subcat=2"><i class="icon-chevron-right"></i>ATV</a></li>
      <li><a href="produse.php?cat=2&subcat=3"><i class="icon-chevron-right"></i>Scuter Electric</a></li>
      <li><a href="produse.php?cat=2&subcat=4"><i class="icon-chevron-right"></i>Bicicleta Electrica</a></li>
      <li><a href="produse.php?cat=2&subcat=5"><i class="icon-chevron-right"></i>Piese</a></li>
      <li><a href="produse.php?cat=2&subcat=6"><i class="icon-chevron-right"></i>Accesorii</a></li>
    </ul>
    </li>
    <li class="<?php echo $item3; ?>"><a>Biciclete</a>
      <ul style="<?php echo $viz3; ?>">
      <li><a href="produse.php?cat=3&subcat=1"><i class="icon-chevron-right"></i>Biciclete</a></li>
      <li><a href="produse.php?cat=3&subcat=2"><i class="icon-chevron-right"></i>Piese</a></li>
      <li><a href="produse.php?cat=3&subcat=3"><i class="icon-chevron-right"></i>Accesorii</a></li>
    </ul>
    </li>
  </ul>
</div>
