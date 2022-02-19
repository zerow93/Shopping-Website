<?php
require 'conectarebazadate.php';
if (isset($_GET["p"]) ){
    $pager=$connect->escape_string($_GET["p"]);
    if ($pager=="" || $pager=="1"){
      $page=0;
    }else{
      $page=($pager*$cateprodusepepagina)-$cateprodusepepagina;
    }
}else{
  $page=0;
  $pager=1;
}

if (isset($_POST['Sortare'])){
  if($_POST['Sortare']==1){
    $ordine="nume";
    $ordine2="ASC";
  }elseif($_POST['Sortare']==2){
    $ordine="nume";
    $ordine2="DESC";
  }elseif($_POST['Sortare']==3){
    $ordine="pret";
    $ordine2="ASC";
  }elseif($_POST['Sortare']==4){
    $ordine="pret";
    $ordine2="DESC";
  }elseif($_POST['Sortare']==0 && isset($_GET['search'])){
    $ordine="relevance";
    $ordine2="DESC";
  }
}else{
  if (isset($_GET['Sortare'])){
    if($_GET['Sortare']==1){
      $ordine="nume";
      $ordine2="ASC";
    }elseif($_GET['Sortare']==2){
      $ordine="nume";
      $ordine2="DESC";
    }elseif($_GET['Sortare']==3){
      $ordine="pret";
      $ordine2="ASC";
    }elseif($_GET['Sortare']==4){
      $ordine="pret";
      $ordine2="DESC";
    }elseif($_POST['Sortare']==0 && isset($_GET['search'])){
    $ordine="relevance";
    $ordine2="DESC";
    }
  }else{
    if(isset($_GET['search'])){
        $ordine="relevance";
        $ordine2="DESC";
    }else{
        $ordine="nume";
        $ordine2="ASC";
    }
  }
}

if (isset($_SESSION['listblock'])){
  if ($_SESSION['listblock']==0){
    $activat="";
    $activat2="";
    $activatt="btn-primary";
    $activatt2="active";
  }else{
    $activat="btn-primary";
    $activat2="active";
    $activatt="";
    $activatt2="";
  }
}else{
  $activat="btn-primary";
  $activat2="active";
  $activatt="";
  $activatt2="";
}

if (!isset($_GET['search'])){
  $cat=$connect->escape_string($_GET['cat']);
  $subcat=$connect->escape_string($_GET['subcat']);
  $citireproduse = $connect->query("SELECT * FROM produse WHERE categorie='$cat' AND subcategorie='$subcat' ORDER BY $ordine $ordine2 limit $page,$cateprodusepepagina");
  $citireprodusenum = $connect->query("SELECT * FROM produse WHERE categorie='$cat' AND subcategorie='$subcat' ORDER BY $ordine $ordine2");
  $cateproduse = mysqli_num_rows($citireprodusenum);
  $citireproduse2 = $connect->query("SELECT * FROM produse WHERE categorie='$cat' AND subcategorie='$subcat' ORDER BY $ordine $ordine2 limit $page,$cateprodusepepagina");
  $citireprodusenum2 = $connect->query("SELECT * FROM produse WHERE categorie='$cat' AND subcategorie='$subcat' ORDER BY $ordine $ordine2");
  $cateproduse2 = mysqli_num_rows($citireprodusenum2);
}else{
  $search=$connect->escape_string($_GET['search']);
  $what=$connect->escape_string($_GET['what']);
  if ($what == "0"){
    $citireproduse = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2  limit $page,$cateprodusepepagina");
    $citireprodusenum = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2");
    $cateproduse = mysqli_num_rows($citireprodusenum);
    $citireproduse2 = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2 limit $page,$cateprodusepepagina");
    $citireprodusenum2 = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2");
    $cateproduse2 = mysqli_num_rows($citireprodusenum2);
  }else{
    $citireproduse = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE categorie='$what' AND MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2 limit $page,$cateprodusepepagina");
    $citireprodusenum = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE categorie='$what' AND MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2");
    $cateproduse = mysqli_num_rows($citireprodusenum);
    $citireproduse2 = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE categorie='$what' AND MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2 limit $page,$cateprodusepepagina");
    $citireprodusenum2 = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE categorie='$what' AND MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) ORDER BY $ordine $ordine2");
    $cateproduse2 = mysqli_num_rows($citireprodusenum2);
  }
}

if(!isset($_GET['search'])){
  $disponibil="Aceasta categorie contine ";
  if ($cat==1){
    $titlu1="Sport";
    if ($subcat==1){
      $titlu2="Camping";
    }elseif ($subcat==2){
      $titlu2="Fitness";
    }elseif ($subcat==3){
      $titlu2="Role,Trotinete,Skateboard,Longboard";
    }elseif ($subcat==4){
      $titlu2="Sporturi cu racheta";
    }elseif ($subcat==5){
      $titlu2="Fotbal";
    }elseif ($subcat==6){
      $titlu2="Sporturi de apa";
    }elseif ($subcat==7){
      $titlu2="Pescuit";
    }elseif ($subcat==8){
      $titlu2="Box si arte martiale";
    }elseif ($subcat==9){
      $titlu2="Balet";
    }elseif ($subcat==10){
      $titlu2="Basket,Volei,Handbal,Baseball";
    }elseif ($subcat==11){
      $titlu2="Snowboarding,Schi,Patinaj pe gheata";
    }elseif ($subcat==12){
      $titlu2="Altele";
    }
  }elseif ($cat==2){
    $titlu1="Moto";
    if ($subcat==1){
      $titlu2="Scuter";
    }elseif ($subcat==2){
      $titlu2="ATV";
    }elseif ($subcat==3){
      $titlu2="Scuter Electric";
    }elseif ($subcat==4){
      $titlu2="Bicicleta Electrica";
    }elseif ($subcat==5){
      $titlu2="Piese";
    }elseif ($subcat==6){
      $titlu2="Accesorii";
    }
  }elseif ($cat==3){
    $titlu1="Biciclete";
    if ($subcat==1){
      $titlu2="Biciclete";
    }elseif ($subcat==2){
      $titlu2="Piese";
    }elseif ($subcat==3){
      $titlu2="Accesorii";
    }
  }
}else{
  $titlu1="Cautare";

  if ($what==0){
    $what2="Toate";
  }elseif($what==1){
    $what2="Sport";
  }elseif($what==2){
    $what2="Moto";
  }elseif($what==3){
    $what2="Biciclete";
  }

  $titlu2="Rezultatul cautarii pentru: " . $search . " in: " . $what2;
  $disponibil="Au fost gasite ";
}
?>

<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina Principala</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $titlu1; ?></li>
  </ul>
<h3><?php echo $titlu2; ?><small class="pull-right"><?php echo $disponibil; ?><?php echo $cateproduse; ?> produse</small></h3>

<?php
if (!isset($_GET['search'])){?>
  <form action="produse.php?cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>" method="post" class="form-horizontal span6">
<?php }else{?>
  <form action="produse.php?search=<?php echo $search; ?>&what=<?php echo $what; ?>" method="post" class="form-horizontal span6">
<?php } ?>
  <div class="control-group">
    <label class="control-label">Sorteaza dupa:</label>
          <select style="width:220px;" name="Sortare" onchange="this.form.submit();">
            <?php if (!isset($_POST['Sortare']) && !isset($_GET['Sortare'])){ ?>
            <?php if (isset($_GET['search'])){ ?> <option value="0">Relevanta</option> <?php } ?>
                <option value="1">Ordine alfabetica A - Z</option>
                <option value="2">Ordine alfabetica Z - A</option>
                <option value="3">Pret crescator</option>
                <option value="4">Pret descrescator</option>
            <?php }else{ ?>
                <?php if (isset($_GET['Sortare'])){ ?>
                  <?php if (isset($_GET['search'])){ ?> <option <?php if ($_GET['Sortare'] == '0') { ?>selected="true" <?php }; ?>value="0">Relevanta</option> <?php } ?>
                  <option <?php if ($_GET['Sortare'] == '1') { ?>selected="true" <?php }; ?>value="1">Ordine alfabetica A - Z</option>
                  <option <?php if ($_GET['Sortare'] == '2') { ?>selected="true" <?php }; ?>value="2">Ordine alfabetica Z - A</option>
                  <option <?php if ($_GET['Sortare'] == '3') { ?>selected="true" <?php }; ?>value="3">Pret crescator</option>
                  <option <?php if ($_GET['Sortare'] == '4') { ?>selected="true" <?php }; ?>value="4">Pret descrescator</option>
                <?php }else{ ?>
                  <?php if (isset($_GET['search'])){ ?> <option <?php if ($_GET['Sortare'] == '0') { ?>selected="true" <?php }; ?>value="0">Relevanta</option> <?php } ?>
                  <option <?php if ($_POST['Sortare'] == '1') { ?>selected="true" <?php }; ?>value="1">Ordine alfabetica A - Z</option>
                  <option <?php if ($_POST['Sortare'] == '2') { ?>selected="true" <?php }; ?>value="2">Ordine alfabetica Z - A</option>
                  <option <?php if ($_POST['Sortare'] == '3') { ?>selected="true" <?php }; ?>value="3">Pret crescator</option>
                  <option <?php if ($_POST['Sortare'] == '4') { ?>selected="true" <?php }; ?>value="4">Pret descrescator</option>
            <?php }} ?>
          </select>
  </div>
  </form>

<div id="myTab" class="pull-right">
<?php if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin && !isset($_GET['search'])){ ?>
    <a href="admin.php?adauga=1&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>"><span class="btn btn-large" style="background:green;"> + </span></a>
<?php } ?>
<a href="#listView" data-toggle="tab" onClick="schimbalista(0);"><span id="listviews" class="btn btn-large <?php echo $activatt; ?>"><i class="icon-list"></i></span></a>
<a href="#blockView" data-toggle="tab" onClick="schimbalista(1);"><span id="blockviews" class="btn btn-large <?php echo $activat; ?>"><i class="icon-th-large"></i></span></a>
</div>

<br class="clr"/>
<div class="tab-content">
<div class="tab-pane <?php echo $activatt2; ?>" id="listView">

  <?php
      if ($cateproduse>0){
      while($produs2 = mysqli_fetch_assoc($citireproduse)){?>
        <div class="row">

          <div class="span2">
            <a href="detaliiprodus.php?id=<?php echo $produs2['id']; ?>"><img src="theme/Produse/<?php echo $produs2['poza']; ?>" alt=""/></a>
          </div>

          <div class="span4">
            <h3><?php echo $produs2['nume']; ?></h3>
            <hr class="soft"/>
            <h5>Descriere: </h5>
            <p><?php echo $produs2['descrieresumar']; ?></p>
            <a class="btn btn-small pull-right" href="detaliiprodus.php?id=<?php echo $produs2['id']; ?>">Mai multe detalii</a>
            <br class="clr"/>
          </div>

          <div class="span3 alignR">
          <form class="form-horizontal qtyFrm">
          <h3><?php echo $produs2['pret']; ?> Lei</h3>
          <br/>
            <?php if($produs2['stock'] > 0){ ?>
            <a class="btn btn-large btn-primary" <?php if ($produs2['extra']>0){ ?> href="detaliiprodus.php?id=<?php echo $produs2['id']; ?>" <?php }else{ ?> href="#pprodus<?php echo $produs2['id']; ?>" data-toggle="modal" onclick="adaugacos(<?php echo $produs2['id']; ?>, <?php if ($produs2['extra']>0){ echo $produs2['extra']; }else{ echo "0"; } ?>)" <?php } ?> >Adauga in cos <i class=" icon-shopping-cart"></i></a>
            <?php }else{ ?>
            <h4>Nu este in stoc.<h4>
            <?php } ?>
            <?php require 'confirmareadaugarecos.php'; ?>
            <a href="detaliiprodus.php?id=<?php echo $produs2['id']; ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a><?php if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){ ?><a class="btn btn-large btn-primary" style="background:red;" <?php if (!isset($_GET['search'])){ ?> href="adminstergeprodus.php?produs=<?php echo $produs2['id']; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=<?php if(isset($_GET['p'])){ echo $_GET['p']; }else{ echo "1"; } ?>&Sortare=<?php if(isset($_GET['Sortare'])){ echo $_GET['Sortare']; }elseif (isset($_POST['Sortare'])) { echo $_POST['Sortare']; }else{ echo "1"; } ?>" <?php }else{ ?> href="adminstergeprodus2.php?produs=<?php echo $produs2['id']; ?>&search=<?php echo $search; ?>&what=<?php echo $what; ?>&p=<?php if(isset($_GET['p'])){ echo $_GET['p']; }else{ echo "1"; } ?>&Sortare=<?php if(isset($_GET['Sortare'])){ echo $_GET['Sortare']; }elseif (isset($_POST['Sortare'])) { echo $_POST['Sortare']; }else{ echo "1"; } ?>" <?php } ?>>DEL</a><?php } ?>
            </form>
          </div>

        </div>
      <hr class="soft"/>
    <?php }
      }else{?>
      <h5><center>Imi pare rau dar nu am gasit niciun produs in aceasta categorie.</center></h5>
      <?php }
    ?>
</div>



<div class="tab-pane <?php echo $activat2; ?>" id="blockView">
  <ul class="thumbnails">

    <?php
      if ($cateproduse>0){
      while($produs = mysqli_fetch_assoc($citireproduse2)){?>
        <li class="span3">
          <div class="thumbnail" style="background-color:white;">
          <a href="detaliiprodus.php?id=<?php echo $produs['id']; ?>"><img src="theme/Produse/<?php echo $produs['poza']; ?>" alt=""/></a>
          <div class="caption">
            <?php
                $arraynume = explode(" ", $produs['nume']);
                $cateparti = count($arraynume)-1;
                $numenefinisatfinal = $arraynume[0];
                $dincateprimulrand = "1";
                $cateranduldoi="0";
                for ($i = 1; $i <= $cateparti; $i++) {
                   $numenefinisatfinal = $numenefinisatfinal . " " . $arraynume[$i];
                   if (strlen($numenefinisatfinal) < 26){
                    $dincateprimulrand = $dincateprimulrand + 1;
                   }else{
                    $cateranduldoi = $cateranduldoi + 1;
                   }
                }
                $numefinall="";
                $numefinall2="";
                for ($i = 0; $i <= ($dincateprimulrand-1); $i++) {
                    $numefinall=$numefinall . " " . $arraynume[$i];
                }
                if ($cateranduldoi>0){
                    for ($i = ($dincateprimulrand); $i < ($dincateprimulrand+$cateranduldoi); $i++){
                        $numefinall2=$numefinall2 . " " . $arraynume[$i];
                    }
                }
            ?>
            <h5 title="<?php echo $produs['nume']; ?>"><?php echo $numefinall; ?></h5>
            <h5>&nbsp;<?php echo $numefinall2 ?></h5>
            <p><?php echo $produs['pret']; ?> Lei</p>
             <h4 style="text-align:center"><a class="btn" href="detaliiprodus.php?id=<?php echo $produs['id']; ?>"> <i class="icon-zoom-in"></i></a><?php if($produs['stock'] > 0){ ?> <a class="btn" <?php if ($produs['extra']>0){ ?> href="detaliiprodus.php?id=<?php echo $produs['id']; ?>" <?php }else{ ?> href="#produs<?php echo $produs['id']; ?>" data-toggle="modal" onclick="adaugacos(<?php echo $produs['id']; ?>, <?php if ($produs['extra']>0){ echo $produs['extra']; }else{ echo "0"; } ?>)" <?php } ?>>Adauga in cos <i class="icon-shopping-cart"></i></a><?php }else{ ?> Nu este in stoc<?php } ?> <?php if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){ ?><a class="btn" style="background:red;" <?php if (!isset($_GET['search'])){ ?> href="adminstergeprodus.php?produs=<?php echo $produs['id']; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=<?php if(isset($_GET['p'])){ echo $_GET['p']; }else{ echo "1"; } ?>&Sortare=<?php if(isset($_GET['Sortare'])){ echo $_GET['Sortare']; }elseif (isset($_POST['Sortare'])) { echo $_POST['Sortare']; }else{ echo "1"; } ?>" <?php }else{ ?> href="adminstergeprodus2.php?produs=<?php echo $produs['id']; ?>&search=<?php echo $search; ?>&what=<?php echo $what; ?>&p=<?php if(isset($_GET['p'])){ echo $_GET['p']; }else{ echo "1"; } ?>&Sortare=<?php if(isset($_GET['Sortare'])){ echo $_GET['Sortare']; }elseif (isset($_POST['Sortare'])) { echo $_POST['Sortare']; }else{ echo "1"; } ?>" <?php } ?>>DEL</a><?php } ?></h4>
             <?php require 'confirmareadaugarecos.php'; ?>
          </div>
          </div>
        </li>
      <?php
      }
    }else{?>
      <h5><center>Imi pare rau dar nu am gasit niciun produs in aceasta categorie.</center></h5>
    <?php   }
     ?>
    </ul>
</div>



</div>
<div class="pagination pull-right">
    <ul>
      <?php
        if (!isset($_GET['search'])){
            require 'conectarebazadate.php';
            $res = $connect->query("SELECT * FROM produse WHERE categorie='$cat' AND subcategorie='$subcat'");
            $count=mysqli_num_rows($res);
            $a=$count/$cateprodusepepagina;
            $a=ceil($a);
            if ($a>1){
            if (isset($_GET["p"]) && ($_GET["p"]>1)){
              $valoare=$pager-1;
            ?>
              <li><a href="produse.php?cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=<?php echo $valoare; ?>&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "1";}?>">&lsaquo;</a></li>
            <?php
            }

            for($b=1;$b<=$a;$b++){?>

              <li><a <?php if (isset($_GET['p']) && $_GET['p'] == $b) { ?>id="disabler" <?php }else{ if(!isset($_GET['p']) && $b == 1){?>id="disabler"<?php }else{ ?>href="produse.php?cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=<?php echo $b; ?>&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "1";}?>"<?php }}; ?>><?php echo $b;?></a></li>

            <?php } ?>
            <?php
                if (!isset($_GET["p"])){?>
                  <li><a href="produse.php?cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=2&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "1";}?>">&rsaquo;</a></li><?php
                }elseif (isset($_GET["p"]) && ($_GET['p']<$a)) {
                  $valoare2=$pager+1;?>
                  <li><a href="produse.php?cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&p=<?php echo $valoare2; ?>&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "1";}?>">&rsaquo;</a></li><?php
                }
              }
            }else{
              require 'conectarebazadate.php';
              if ($what == "0"){
                $res = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' )");
              }else{
                $res = $connect->query("SELECT *, MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' ) AS relevance FROM produse WHERE categorie='$what' AND MATCH ( nume,cod,descrieresumar ) AGAINST ( '$search' )");
              }
              $count=mysqli_num_rows($res);
              $a=$count/$cateprodusepepagina;
              $a=ceil($a);
              if ($a>1){
              if (isset($_GET["p"]) && ($_GET["p"]>1)){
                $valoare=$pager-1;
              ?>
                <li><a href="produse.php?search=<?php echo $search; ?>&what=<?php echo $what; ?>&p=<?php echo $valoare; ?>"&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "0";}?>>&lsaquo;</a></li>
              <?php
              }

              for($b=1;$b<=$a;$b++){
                ?><li><a <?php if (isset($_GET['p']) && $_GET['p'] == $b) { ?>id="disabler" <?php }else{ if(!isset($_GET['p']) && $b == 1){?>id="disabler"<?php }else{ ?>href="produse.php?search=<?php echo $search; ?>&what=<?php echo $what; ?>&p=<?php echo $b; ?>&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "0";}?>"<?php }}; ?>><?php echo $b;?></a></li> <?php
              }
              ?>
              <?php
                  if (!isset($_GET["p"])){?>
                    <li><a href="produse.php?search=<?php echo $search; ?>&what=<?php echo $what; ?>&p=2&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "0";}?>">&rsaquo;</a></li><?php
                  }elseif (isset($_GET["p"]) && ($_GET['p']<$a)) {
                    $valoare2=$pager+1;?>
                    <li><a href="produse.php?search=<?php echo $search; ?>&what=<?php echo $what; ?>&p=<?php echo $valoare2; ?>&Sortare=<?php if (isset($_POST['Sortare'])){ echo $_POST['Sortare'];}elseif(isset($_GET['Sortare'])){echo $_GET['Sortare'];}else{echo "0";}?>">&rsaquo;</a></li><?php
                  }
                }
            }
         ?>
    </ul>
</div>

    <br class="clr"/>
</div>
