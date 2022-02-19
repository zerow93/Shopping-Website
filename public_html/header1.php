<strong style="color:DodgerBlue;"><?php echo $_SESSION['numeuserlogat']; ?></strong>
<li class=""><a href="contulmeu.php">Contul Meu</a></li>
<li class=""><a href="contulmeu.php?tab=2">Comenzile mele</a></li>
<li class=""><a href="contulmeu.php?tab=1">Date personale</a></li>
<li class=""><a href="contulmeu.php?tab=3">Setari siguranta</a></li>
<?php if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){ ?>
  <li class=""><a href="admin.php" style="color:green;">Administrare Comenzi</a></li>
<?php } ?>
<li class=""><a href="clear.php" style="color:red;">Delogare</a></li>
