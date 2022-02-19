<?php
require 'conectarebazadate.php';
$subcatarray=array(array('Camping','Fitness','Role,Trotinete,Skateboard,Longboard','Sporturi cu racheta','Fotbal','Sporturi de apa','Pescuit','Box si arte martiale','Balet','Basket,Volei,Handbal,Baseball','Snowboarding,Schi,Patinaj pe gheata','Altele'),array('Scuter','ATV','Scuter Electric','Bicicleta Electrica','Piese','Accesorii'),array('Biciclete','Piese','Accesorii'));
$cat=$connect->escape_string($_GET['cat']);
$subcat=$connect->escape_string($_GET['subcat']);
$count=count($subcatarray[($cat-1)]);
?>
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Adaugare produs</li>
  </ul>
  <div class="well">
    <div class="control-group">
      <form class="form-horizontal" action="admin.php?adauga=2&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>" method="post" autocomplete="off">
        <h4>Date produs:</h4>
        <div class="control-group">
          <label class="control-label" for="prodnume">Nume:</label>
          <div class="controls">
            <input type="text" name="prodnume">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodcod">Cod:</label>
          <div class="controls">
            <input type="text" name="prodcod">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodcat">Categorie:</label>
          <div class="controls">
            <select onchange="schimbacat()" id="categorie" class="span1" name="prodcat">
              <option value="1" <?php if ($cat=='1'){ echo "selected"; } ?>>Sport</option>
              <option value="2" <?php if ($cat=='2'){ echo "selected"; } ?>>Moto</option>
              <option value="3" <?php if ($cat=='3'){ echo "selected"; } ?>>Biciclete</option>
            </select>
          </div>
        </div>

        <div id="onchangecat" class="control-group">
          <label class="control-label" for="prodsubcat">Subcategorie:</label>
          <div class="controls">
            <select class="span1" name="prodsubcat">
              <?php for ($i=0; $i<$count; $i++){  ?>
                <option value="<?php echo ($i+1); ?>" <?php if ($subcat==$i+1){ echo "selected"; }?>><?php echo $subcatarray[($cat-1)][$i]; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodpret">Pret:</label>
          <div class="controls">
            <input type="text" name="prodpret">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodstoc">Stoc:</label>
          <div class="controls">
            <input type="text" name="prodstoc">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodpoza">Poza:</label>
          <div class="controls">
            <input type="text" name="prodpoza">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="proddesc1">Descriere Sumar:</label>
          <div class="controls">
            <textarea style="width:60%;height:100px;" name="proddesc1"></textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="prodtitlu">Titlu Descriere Completa:</label>
          <div class="controls">
            <input type="text" name="prodtitlu">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="proddesc2">Descriere Completa:</label>
          <div class="controls">
            <textarea style="width:60%;height:150px;" name="proddesc2"></textarea>
          </div>
        </div>

        <h4>Tabel date tehnice:</h4>
          <table>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel1">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabela">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel2">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabelb">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel3">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabelc">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel4">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabeld">
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="control-group">
                  <div class="controls">
                    <input type="text" name="tabel5">
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                    <input type="text" name="tabele">
                </div>
              </td>
            </tr>
          </table>
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

        <center><button type="submit" class="btn btn-large btn-success" name="adaugaprodus">Adauga Produsul</button></center>
      </form>
    </div>
  </div>
</div>
