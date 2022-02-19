<?php if (isset($_SESSION['idprodusecos']) && $_SESSION['idprodusecos']){ ?>
        <h3>  Sumar Cos </h3>
        <hr class="soft"/>


        <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Produs</th>
                        <th>Descriere</th>
                        <th>Cantitate</th>
                        <th></th>
                        <th>Pret unitar fara TVA</th>
                        <th>TVA</th>
                        <th>Total</th>
                      </tr>
                    </thead>

                    <tbody>

                    <?php
                    $totalpret=0.00;
                        foreach ($_SESSION['idprodusecos'] as $idd) {
                          $produss=$_SESSION['produsecos'][$idd];
                          $pretbrut=$_SESSION['preturi'][$idd]*$_SESSION['catebuc'][$idd];
                          $pretcorect = number_format($pretbrut, 2, '.', '');
                          $pretunitar = number_format(((($_SESSION['preturi'][$idd])*100)/119), 2, '.', '');
                          $TotalProdus = number_format(($_SESSION['preturi'][$idd]*$_SESSION['catebuc'][$idd]), 2, '.', '');
                          $TVA = number_format((($TotalProdus*19)/119), 2, '.', '');

                          $totalpret=$totalpret+$pretbrut;
                          $numartotalzecimat = number_format($totalpret, 2, '.', '');
                          $numartotalzecimat2 = number_format((($totalpret*100)/119), 2, '.', '');
                          $totalTVAdecimat = number_format((($totalpret*19)/119), 2, '.', '');
                          if (strlen($produss) > 23){
                            $out = substr($produss,0,23)."...";
                          }else{
                            $out = $produss;
                          }
                          $idcuvirgula=str_replace("_",",",$idd);
                          ?>
                          <tr>
                              <td> <img width="60" src="theme/Produse/<?php echo $_SESSION['pozeprodusecos'][$idd]; ?>" alt=""/></td>
                              <td><?php echo $produss; ?></td>
                              <td><div class="input-append"><input name="qty<?php Echo $idd; ?>" id="quantity_wanted<?php Echo $idd; ?>" class="span1 farasusjos" style="max-width:34px" value="<?php echo $_SESSION['catebuc'][$idd]; ?>" type="number" min="1" onkeydown="return false"><a class="btn minus_produs<?php Echo $idd; ?>" href="#" data-field-qty="qty<?php Echo $idd; ?>"><i class="icon-minus"></i></a><a class="btn plus_produs<?php Echo $idd; ?>" href="#" data-field-qty="qty<?php Echo $idd; ?>"><i class="icon-plus"></i></a></div></td>
                              <td><button class="btn btn-danger" type="button" onclick="stergeprodus(<?php echo $idcuvirgula; ?>)"><i class="icon-trash"></i></button>	</td>
                              <td class="ellipsis"><?php echo $pretunitar; ?> lei</td>
                              <td class="ellipsis"><?php echo $TVA; ?> lei</td>
                              <td class="ellipsis"><?php echo $TotalProdus; ?></td>
                          </tr>
                        <?php
                      }
                    ?>
                    <tr>
                        <td colspan="6" style="text-align:right">Total fara TVA:	</td>
                        <td> <?php echo $numartotalzecimat2; ?> lei</td>
                      </tr>
                       <tr>
                        <td colspan="6" style="text-align:right">TVA(19%)</td>
                        <td> <?php echo $totalTVAdecimat; ?> lei</td>
                      </tr>
                      <tr>
                        <td colspan="6" style="text-align:right"><strong>TOTAL</strong></td>
                        <td class="label label-important" style="display:block;"> <strong style="font-size:150%;"> <?php echo $numartotalzecimat; ?> lei </strong></td>
                      </tr>
                    </tbody>

                  </table>


        <a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continua cumparaturile </a>
        <a href="achizitionare.php" class="btn btn-large pull-right">Finalizeaza comanda <i class="icon-arrow-right"></i></a>
<?php }else{ ?>
      <h3>Nu ai niciun produs in cos.</h3>
<?php } ?>
