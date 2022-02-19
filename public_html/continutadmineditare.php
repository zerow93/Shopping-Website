<?php
require 'conectarebazadate.php';
$idprod=$connect->escape_string($_GET['id']);
$query=$connect->query("SELECT * FROM produse WHERE id='$idprod'");
$produs=$query->fetch_assoc();
$subcat=array(array('Camping','Fitness','Role,Trotinete,Skateboard,Longboard','Sporturi cu racheta','Fotbal','Sporturi de apa','Pescuit','Box si arte martiale','Balet','Basket,Volei,Handbal,Baseball','Snowboarding,Schi,Patinaj pe gheata','Altele'),array('Scuter','ATV','Scuter Electric','Bicicleta Electrica','Piese','Accesorii'),array('Biciclete','Piese','Accesorii'));
$count=count($subcat[($produs['categorie']-1)])
?>
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Editare produs</li>
  </ul>
  <div class="well">
    <div class="control-group">
      <form class="form-horizontal" action="admin.php?editare=2&id=<?php echo $idprod; ?>" method="post" autocomplete="off">
        <h4>Date produs:</h4>
        <div class="control-group">
          <label class="control-label" for="prodnume">Nume:</label>
          <div class="controls">
            <input type="text" name="prodnume" value="<?php echo $produs['nume']; ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodcod">Cod:</label>
          <div class="controls">
            <input type="text" name="prodcod" value="<?php echo $produs['cod']; ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodcat">Categorie:</label>
          <div class="controls">
            <select onchange="schimbacat()" id="categorie" class="span1" name="prodcat">
              <option value="1" <?php if ($produs['categorie']=='1'){ echo "selected"; }?>>Sport</option>
              <option value="2" <?php if ($produs['categorie']=='2'){ echo "selected"; }?>>Moto</option>
              <option value="3" <?php if ($produs['categorie']=='3'){ echo "selected"; }?>>Biciclete</option>
            </select>
          </div>
        </div>

        <div id="onchangecat" class="control-group">
          <label class="control-label" for="prodsubcat">Subcategorie:</label>
          <div class="controls">
            <select class="span1" name="prodsubcat">
              <?php for ($i=0; $i<$count; $i++){  ?>
                <option value="<?php echo ($i+1); ?>" <?php if ($produs['subcategorie']==($i+1)){ echo "selected"; }?>><?php echo $subcat[($produs['categorie']-1)][$i]; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodpret">Pret:</label>
          <div class="controls">
            <input type="text" name="prodpret" value="<?php echo $produs['pret']; ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodstoc">Stoc:</label>
          <div class="controls">
            <input type="text" name="prodstoc" value="<?php echo $produs['stock']; ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodpoza">Poza:</label>
          <div class="controls">
            <input type="text" name="prodpoza" value="<?php echo $produs['poza']; ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="proddesc1">Descriere Sumar:</label>
          <div class="controls">
            <textarea style="width:60%;height:100px;" name="proddesc1"><?php echo $produs['descrieresumar']; ?></textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodtitlu">Titlu Descriere Completa:</label>
          <div class="controls">
            <input type="text" name="prodtitlu" value="<?php echo $produs['titlucomplet']; ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="proddesc2">Descriere Completa:</label>
          <div class="controls">
            <textarea style="width:60%;height:150px;" name="proddesc2"><?php echo $produs['descrierecomplet']; ?></textarea>
          </div>
        </div>

        <h4>Tabel date tehnice:</h4>
          <table>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel1" value="<?php echo $produs['tabel1']; ?>">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabela" value="<?php echo $produs['tabela']; ?>">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel2" value="<?php echo $produs['tabel2']; ?>">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabelb" value="<?php echo $produs['tabelb']; ?>">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel3" value="<?php echo $produs['tabel3']; ?>">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabelc" value="<?php echo $produs['tabelc']; ?>">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel4" value="<?php echo $produs['tabel4']; ?>">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabeld" value="<?php echo $produs['tabeld']; ?>">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel5" value="<?php echo $produs['tabel5']; ?>">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabele" value="<?php echo $produs['tabele']; ?>">
                </div>
              </td>
            </tr>
          </table>
          <?php if ($produs['extra']>0){?>
            <div class="control-group">
              <label class="control-label" for="prodextra">Extra: </label>
              <div class="controls">
                <select onchange="adaugaextra()" id="detaliiextra" class="span1" name="prodextra">
                  <option value="0">0</option>
                  <option value="1" <?php if ($produs['extra']==1){?> selected <?php } ?>>1</option>
                  <option value="2" <?php if ($produs['extra']==2){?> selected <?php } ?>>2</option>
                  <option value="3" <?php if ($produs['extra']==3){?> selected <?php } ?>>3</option>
                </select>
              </div>
            </div>
            <div id="extraa">
            <?php
            $explozie1 = explode("|", $produs['infoextra']);
            for ($i=1; $i <= $produs['extra'] ; $i++) {
              $explozie2 = explode(":", $explozie1[($i-1)]);
              $explozie3 = explode(",", $explozie2[1]);
              $catedivs = count($explozie3);
            ?>
              <hr>
              <div class="control-group">
                <label class="control-label" for="extraname<?php echo $i; ?>">Nume extra <?php echo $i; ?> :</label>
                <div class="controls">
                  <input type="text" name="extraname<?php echo $i; ?>" value="<?php echo $explozie2[0]; ?>">
                </div>
              </div>
                <label class="control-label" for="Extra<?php echo $i; ?>">Cate Extra <?php echo $i; ?>:</label>
                <div class="controls">
                  <select onchange="adaugaextra1(<?php echo $i; ?>)" id="Extra<?php echo $i; ?>" class="span1" name="Extra<?php echo $i; ?>">
                    <?php
                      for ($k=1; $k <= 30; $k++) {?>
                        <option value="<?php echo $k; ?>" <?php if ($catedivs==$k){?> selected <?php } ?>><?php echo $k; ?></option>
                     <?php } ?>
                  </select>
                </div>
                <div id="exxtra<?php echo $i; ?>">
                  <?php for ($j=1; $j <= $catedivs ; $j++) { ?>
                    <div class="controls">
                      <input type="text" name="extra<?php echo $i; ?>div<?php echo $j; ?>" value="<?php echo $explozie3[($j-1)]; ?>">
                    </div>
                  <?php } ?>
                </div>
          <?php } ?>
          </div>
          <?php }else{ ?>
          <div class="control-group">
            <label class="control-label" for="prodextra">Extra: </label>
            <div class="controls">
              <select onchange="adaugaextra()" id="detaliiextra" class="span1" name="prodextra">
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
          </div>
          <div id="extraa">
          </div>
        <?php } ?>
        <center><button type="submit" class="btn btn-large btn-success" name="salveazaprodus">Salveaza Modificarile</button></center>
      </form>
    </div>
  </div>
</div>
