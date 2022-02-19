<?php
$idprodus=$_GET['id'];
require 'conectarebazadate.php';
$citesteprodus = $connect->query("SELECT * FROM produse WHERE id='$idprodus'");
$produs = $citesteprodus->fetch_assoc();
?>


<div class="span9" style="background-color:white;">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina Principala</a> <span class="divider">/</span></li>
  <li class="active">Detalii produs</li>
  </ul>

<div class="row">
    <div id="gallery" class="span3">
      <?php
        $directory='theme/Produse/large/'.$produs['cod'];
        if ( file_exists($directory.'/1.jpg') ){
          $pozaprofil='theme/Produse/large/'.$produs['cod'].'/1.jpg';
        }else{
          $pozaprofil='theme/Produse/large/no-image.png';
        }
        $restuldepoze=glob($directory . "/*.jpg");
      ?>
          <a href="<?php echo $pozaprofil; ?>" title="<?php echo $produs['nume']; ?>">
      <img src="<?php echo $pozaprofil; ?>" style="width:100%" alt="<?php echo $produs['nume']; ?>"/>
          </a>
    <div id="differentview" class="moreOptopm carousel slide">
              <div class="carousel-inner">
                <center><div class="item active">
                <?php foreach ($restuldepoze as $pozacurenta) {
                  if ($pozaprofil<>$pozacurenta){
                ?>
                  <a href="<?php echo $pozacurenta; ?>"> <img style="width:29%" src="<?php echo $pozacurenta; ?>" alt=""/></a>
                <?php }} ?>
               </div></center>
            </div>
    </div>

    </div>
    <div class="span6">
      <h3 style="padding-right:10px;"><?php echo $produs['nume']; ?></h3>
      <hr class="soft"/>
      <form class="form-horizontal qtyFrm" style="padding-right:10px;">
        <div class="control-group">
        <label class="control-label pull-left" style="text-align: left;"><span>Pret: <?php echo $produs['pret']; ?> Lei</span></label>
        <div class="controls">
        <?php $variabilaaiurea=$produs['stock'];?>
        <?php
          if ($variabilaaiurea > 0){?>
            <input name="qty" type="number" id="quantity_wanted" style="border: 1px solid rgb(189, 194, 201); border-image: none;" class="span1" min="1" value="1"/>
            <a class="btn product_quantity_down" href="#" data-field-qty="qty"> <span><i class="icon-minus"></i></span> </a>
            <a class="btn product_quantity_up" href="#" data-field-qty="qty"> <span><i class="icon-plus"></i></span> </a>
            <a type="button" class="btn btn-large btn-primary pull-right" href="#produs<?php echo $produs['id']; ?>" data-toggle="modal" onclick="adaugacos(<?php echo $produs['id']; ?>, <?php if ($produs['extra']>0){ echo $produs['extra']; }else{ echo "0"; } ?>)"> Adauga in cos <i class=" icon-shopping-cart"></i></a>
            <?php require 'confirmareadaugarecos.php'; }?>
        </div>
        <hr style="border-bottom: 0px;">

      <?php
      if ($produs['extra']>0){
        $numearray=array($produs['extra']-1);
        $explode1 = explode("|", $produs['infoextra']);
        for ($i=0; $i < $produs['extra']; $i++) {
          $explode2 = explode(":", $explode1[$i]);
          $explode3 = explode(",", $explode2[1]);
          $cateDiv = count($explode3);
          $numearray[$i]=$explode2[0]; ?>
          <div class="control-group">
            <label class="control-label" for="Select<?php echo $i; ?>"><?php echo $numearray[$i]; ?>:</label>
            <div class="controls">
              <select class="span1" onchange="schimbaid(<?php echo $produs['id']; ?> ,<?php echo $i; ?>)" name="Select<?php echo $i; ?>" id="Select<?php echo $i; ?>"> <?php
          for ($j=0; $j < $cateDiv ; $j++) { ?>
            <option value="<?php echo ($j+1); ?>"><?php echo $explode3[$j]; ?></option> <?php
          }?>
              </select>
            </div>
          </div><?php
        }}
       ?>
       <?php if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){
           $querycom = $connect->query("SELECT * FROM comenzi WHERE status='-1'");?>
           <table class="pull-right">
           <?php while ($comandaedit = mysqli_fetch_assoc($querycom)) {?>
               <tr><td><a type="button" class="btn btn-primary pull-right" onclick="adaugacoscomanda(<?php echo $comandaedit['id']; ?>,<?php echo $produs['id']; ?>,<?php if ($produs['extra']>0){ echo $produs['extra']; }else{ echo "0"; } ?>)" style="backgroud-color:red;"> Adauga in comanda <?php echo $comandaedit['id']; ?> <i class=" icon-shopping-cart"></i></a></td></tr>
           <?php } ?>
           <tr>
             <td id="debugare"></td>
           </tr>
          </table>
       <?php } ?>
        </div>
      </form>

      <hr class="soft"/>
      <?php
        $intreabastock=$produs['stock'];
        if ($intreabastock=='0'){?>
          <h4>Produsul nu este in stoc momentan.</h4><?php
        }else {?>
          <h4>In stoc: <?php echo $intreabastock; ?></h4><?php
        }
      ?>

      <hr class="soft clr"/>
      <p style="padding-right:10px;">
        <?php echo $produs['descrieresumar']; ?>
      </p>
      <?php if($produs['tabel1']<>"" && $produs['tabela']<>""){ ?>
        <div style="padding-right:10px;">
            <a class="btn btn-small pull-right" href="#detail">Mai multe detalii</a>
        </div>
      <?php }; ?>
      <br class="clr"/>
    <a href="#" name="detail"></a>
    <hr class="soft"/>
    </div>
    <div class="span9">
      <div id="myTabContent" class="tab-content" style="padding-right:10px;padding-left:10px;">
        <div class="tab-pane fade active in" id="home">
          <?php if($produs['tabel1']<>"" && $produs['tabela']<>""){ ?>
          <h4>Informatii Produs</h4>
         <table class="table table-bordered">
          <tbody>
          <tr class="techSpecRow"><th colspan="2">Detalii</th></tr>
          <tr class="techSpecRow"><td class="techSpecTD1"><?php echo $produs['tabel1']; ?></td><td class="techSpecTD2"><?php echo $produs['tabela']; ?></td></tr>
          <?php if($produs['tabel2']<>"" && $produs['tabelb']<>""){ ?>
          <tr class="techSpecRow"><td class="techSpecTD1"><?php echo $produs['tabel2']; ?></td><td class="techSpecTD2"><?php echo $produs['tabelb']; ?></td></tr>
          <?php } ?>
          <?php if($produs['tabel3']<>"" && $produs['tabelc']<>""){ ?>
          <tr class="techSpecRow"><td class="techSpecTD1"><?php echo $produs['tabel3']; ?></td><td class="techSpecTD2"><?php echo $produs['tabelc']; ?></td></tr>
          <?php } ?>
          <?php if($produs['tabel4']<>"" && $produs['tabeld']<>""){ ?>
          <tr class="techSpecRow"><td class="techSpecTD1"><?php echo $produs['tabel4']; ?></td><td class="techSpecTD2"><?php echo $produs['tabeld']; ?></td></tr>
          <?php } ?>
          <?php if($produs['tabel5']<>"" && $produs['tabele']<>""){ ?>
          <tr class="techSpecRow"><td class="techSpecTD1"><?php echo $produs['tabel5']; ?></td><td class="techSpecTD2"><?php echo $produs['tabele']; ?></td></tr>
          <?php } ?>
          </tbody>
          </table>
           <?php }; ?>

          <h5><?php echo $produs['titlucomplet']; ?></h5>
          <p><?php echo $produs['descrierecomplet']; ?></p>
          <?php if (isset($_SESSION['useremail']) && $_SESSION['useremail']==$admin){ ?>
          <hr class="soft"/>
          <a href="admin.php?editare=1&id=<?php echo $produs['id']; ?>" class="btn pull-right">Editare Produs</a>
          <?php } ?>
          </div>



    </div>
  </div>
</div>
</div>
