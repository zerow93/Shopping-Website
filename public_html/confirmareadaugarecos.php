<div id="produs<?php echo $produs['id']; ?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-hidden="false">
   <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

   <div class="cumvreaueu">
   <h4 class="title"><center><i class="icon-check"></i>Produs adaugat cu succes in cos.</center></h4>
   <div class=modal-body>
   <div class="pull-left"><img src="theme/Produse/<?php Echo $produs['poza']; ?>"/></div>
   <div class="pull-left">
     <ul class="farapuncte">
       <br />
       <?php
        $catelitere=strlen($produs['nume']);
        $cateranduri=($catelitere/45);
        $cateranduri=ceil($cateranduri);
        for ($i=0; $i < $cateranduri; $i++) {
        ?>
          <li><?php echo substr($produs['nume'],$i*45,45); ?></li>
        <?php } ?>
        <div id="aiciseschimba">
          <?php
          unset($_SESSION['produsactual']);
          $_SESSION['produsactual']=$produs['pret'];
          $pretpretfinisat = number_format($produs['pret'], 2, '.', '');
          ?>
          <hr class="soft"/><li><a id="faraunderline">Pret</a> <?php echo $pretpretfinisat; ?> lei</li>
          <li><a id="faraunderline">Cantitate</a> 1</li>
        </div>
          <?php if ($produs['extra']>0) {
            $explod=explode("|",$produs['infoextra']);
            for ($i=0; $i < $produs['extra'] ; $i++) {
              $explodd=explode(":",$explod[$i]);
              $exploddd=explode(",",$explodd[1]);?>
              <li id="schimbator<?php echo $produs['id']; ?>select<?php echo $i; ?>"><a id="faraunderline"><?php echo $explodd[0]; ?></a> <?php echo $exploddd[0]; ?></li>
            <?php }
          } ?>
      </ul>
   </div>
  </div>
   <div class="modal-footer"><a class="pull-left close" id="butonlung3" data-dismiss="modal" aria-hidden="true"><i class="icon-arrow-left"></i>Continua cumparaturile</a><a class="pull-right" id="butonlung2" href="cos.php">Finalizeaza comanda<i class="icon-arrow-right"></i></a></div>
   </div>
  </div>
</div>

<div id="pprodus<?php echo $produs2['id']; ?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-hidden="false">
   <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

   <div class="cumvreaueu">
   <h4 class="title"><center><i class="icon-check"></i>Produs adaugat cu succes in cos.</center></h4>
   <div class="modal-body">
   <div class="pull-left"><img src="theme/Produse/<?php Echo $produs2['poza']; ?>"/></div>
   <div class="pull-left">
     <ul class="farapuncte">
       <br />
       <?php
        $catelitere=strlen($produs2['nume']);
        $cateranduri=($catelitere/45);
        $cateranduri=ceil($cateranduri);
        for ($i=0; $i < $cateranduri; $i++) {
        ?>
          <li><?php echo substr($produs2['nume'],$i*45,45); ?></li>
        <?php

        }
        if (isset($_SESSION['cantitateadaugare'])){
          $cantitate=$_SESSION['cantitateadaugare'];
          unset($_SESSION['cantitateadaugare']);
        }else{
          $cantitate=1;
        }
        $pretpret=$cantitate*$produs2['pret'];
        $pretpretfinisat = number_format($pretpret, 2, '.', '');
        ?>
        <div class="pull-left">
        <hr class="soft"/><li><a id="faraunderline">Pret</a> <?php echo $pretpretfinisat; ?> lei</li>
        <li class="pull-left"><a id="faraunderline">Cantitate</a> <?php echo $cantitate; ?></li></div>
      </ul>
   </div>
   </div>
   <div class="modal-footer"><a class="pull-left close" id="butonlung3" data-dismiss="modal" aria-hidden="true">< Continua cumparaturile</a><a class="pull-right" id="butonlung2" href="index.php">Finalizeaza comanda ></a></div>
   </div>
   </div>
</div>
