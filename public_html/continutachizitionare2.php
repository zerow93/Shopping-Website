<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Plasarea comenzii</li>
  </ul>
  <div id="cumparaflex">


    <div id="adrese">
      <h3>1. Adrese</h3>
      <hr class="soft"/>
<?php if (isset($_SESSION['guest'])){
  $emailuseractual=$_SESSION['guest'];
  $telefonguest=$_SESSION['telefonguest'];
  $query=$connect->query("SELECT * FROM guesttempo WHERE email='$emailuseractual' AND telefon='$telefonguest'");
  $useractual = $query->fetch_assoc();
?>
  <table class="table table-bordered" style="width:50%;">
    <tbody>
      <tr>
      <td>
        <ul class="item box">
          <li><h4>Adresa ta de livrare</h4></li>
          <hr class="soft"/>
          <li><?php echo $useractual['nume']." ".$useractual['prenume']; ?> </li>
          <li><?php echo $useractual['adresa']; ?></li>
          <li><?php echo $useractual['judet']; ?></li>
          <li><?php echo $useractual['oras']; ?></li>
          <li><?php echo $useractual['telefon']; ?></li>
          <br />
          <li><a class="btn" onclick="schimbareadresa3()">Actualizeaza <i class="icon-arrow-right"></i></a></li>
        </ul>
      </td>
      </tr>
    </tbody>
  </table>
<?php }else{ ?>
  <table style="width:99%;">
    <tbody>
      <tr>
      <td style="width:60%;"><strong>Comanda instant</strong></td>
      <td><strong>Creeaza-ti acum un cont si profita de:</strong></td>
      </tr>
      <tr>
        <td><br /><a class="btn btn-large" onclick="metodarapida()">Plasarea comenzii fara cont</a></td>
        <td>- Acces sigur si personalizat<br />- Plasarea comenzii rapid si usor</td>
      </tr>
      <tr>
        <td></td>
        <td><a class="btn btn-large" href="Inregistrare.php"><img src="theme/img/cont.png">Creeaza un cont</a></td>
      </tr>
    </tbody>
  </table>
<?php } ?>
    </div>


    <div id="metodalivrare">
      <h3>2. Metoda Livrare</h3>
      <hr class="soft"/>
<table class="table table-bordered">
  <tbody>
    <tr>
      <td>
      <table class="table table-bordered">
        <tbody>
        <tr>
          <td width="20px"><center><input type="radio" name="metodalivrare" id="metodalivrare1"></input></center></td>
          <td width="50px"><center><img src="theme/img/iconofficial.ico"></img></center></td>
          <td width="600px">
            <strong>Livrare la domiciliu</strong>
            <br />
              Costul transportului va fi comunicat telefonic de catre departamentul de vanzari. Descarcarea este responsabilitatea clientului.
            <br />
          </td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <tbody>
      <tr>
        <td width="20px"><center><input type="radio" name="metodalivrare" id="metodalivrare2"></center></input></td>
        <td width="50px"><center><img src="theme/img/iconofficial.ico"></img></center></center></td>
        <td width="600px">
          <strong>Ridicare din magazin</strong>
          <br />
            Ridicare din ADRESA (plata cash/card la locatie)
          <br />
        </td>
      </tr>
    </tbody>
  </table>
  <strong>Lasa un mesaj</strong>
  <div>Daca doresti sa adaugi si alte informatii referitoare la comanda, te rugam sa le scrieti mai jos.
    <textarea style="width:99%;" name="mesaj" id="mesaj" rows="2" cols="120"></textarea>
  </div>
</td>
</tr>
</tbody>
</table>
    </div>

    <div id="metodaplata">
      <h3>3. Metoda plata</h3>
      <hr class="soft"/>
      <br />
        <div id="eroare"></div>
      <?php if (isset($_SESSION['guest'])){ ?>
        <a class="btn" style="width:99%;height:40px;padding-top:3%;" onclick="trimitecomanda()"><img src="theme/img/iconofficial.ico"></img> Plateste in sistem ramburs (Veti plati produsele la livrare)</a>
      <?php }elseif(isset($_SESSION['logat']) && $_SESSION['logat'] == 1){ ?>
        <a class="btn" style="width:99%;height:40px;padding-top:3%;" onclick="trimitecomanda()"><img src="theme/img/iconofficial.ico"></img> Plateste in sistem ramburs (Veti plati produsele la livrare)</a>
      <?php }else{ ?>
        <div class="alert alert-block alert-error fade in">Trebuie sa te autentifici pentru a vedea metodele de plata</div>
      <?php } ?>
    </div>

  </div>
</div>
