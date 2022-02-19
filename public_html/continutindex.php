<div class="span9">
  <div class="well well-small">
  <h4>Produse populare<small class="pull-right"></small></h4>
  <div class="row-fluid">
  <div id="featured" class="carousel slide">
  <div class="carousel-inner">

    <?php
      require 'conectarebazadate.php';
        for($b=1;$b<=3;$b++){
          $cate=($b*4)-4;
          $res2 = $connect->query("SELECT * FROM produse ORDER BY vanzari DESC limit $cate,4");
          if ($b==1){
            ?>
            <div class="item active">
            <ul class="thumbnails">
            <?php
          }else{
            ?>
            <div class="item">
            <ul class="thumbnails">
            <?php
          }
              while($produs2 = mysqli_fetch_assoc($res2)){?>
                <li class="span3">
                  <div class="thumbnail">
                  <i class="tag"></i>
                  <a href="detaliiprodus.php?id=<?php echo $produs2['id']; ?>"><img src="theme/Produse/<?php echo $produs2['poza']; ?>" alt=""></a>
                  <div class="caption">
            <?php
                $arraynume = explode(" ", $produs2['nume']);
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
                $numefinal="";
                $numefinal2="";
                for ($i = 0; $i <= ($dincateprimulrand-1); $i++) {
                    $numefinal=$numefinal . " " . $arraynume[$i];
                }
                if ($cateranduldoi>0){
                    for ($i = ($dincateprimulrand); $i < ($dincateprimulrand+$cateranduldoi); $i++){
                        $numefinal2=$numefinal2 . " " . $arraynume[$i];
                    }
                }
            ?>
            <h5 title="<?php echo $produs2['nume']; ?>"><?php echo $numefinal; ?></h5>
            <h5>&nbsp;<?php echo $numefinal2 ?></h5>
                    <h5><a class="btn" href="detaliiprodus.php?id=<?php echo $produs2['id']; ?>">Vizualizare</a> <span class="pull-right"><?php echo $produs2['pret']; ?> Lei</span></h5>
                  </div>
                  </div>
                </li>
              <?php
              }
          ?>
          </ul>
          </div>
          <?php
        }
     ?>

    </div>
    <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
    <a class="right carousel-control" href="#featured" data-slide="next">›</a>
    </div>
    </div>
</div>


<h4>Produse nou adaugate</h4>
    <ul class="thumbnails">

      <?php
      require 'conectarebazadate.php';
      $queryproduse = $connect->query("SELECT * FROM produse ORDER BY id DESC limit 0,9");
      while($produs = mysqli_fetch_assoc($queryproduse)){?>
        <li class="span3">
          <div class="thumbnail" style="background-color:white;">
          <a  href="detaliiprodus.php?id=<?php echo $produs['id']; ?>"><img src="theme/Produse/<?php Echo $produs['poza']; ?>"/></a>
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
            <p><?php Echo $produs['pret']; ?> Lei</p>
            <h4 style="text-align:center"><a class="btn" href="detaliiprodus.php?id=<?php echo $produs['id']; ?>"> <i class="icon-zoom-in"></i></a><?php if($produs['stock'] > 0){ ?><a class="btn" <?php if ($produs['extra']>0){ ?> href="detaliiprodus.php?id=<?php echo $produs['id']; ?>" <?php }else{ ?>href="#produs<?php echo $produs['id']; ?>" data-toggle="modal" onclick="adaugacos(<?php echo $produs['id']; ?>, <?php if ($produs['extra']>0){ echo $produs['extra']; }else{ echo "0"; } ?>)"<?php } ?>>Adauga in cos<i class="icon-shopping-cart"></i></a><?php }else{ ?>Nu este in stoc.<?php } ?></h4>
            <?php require 'confirmareadaugarecos.php'; ?>
          </div>
          </div>
        </li>

      <?php
      }
      ?>

    </ul>
   </div>
</div>
