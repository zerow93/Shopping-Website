<?php
require 'conectarebazadate.php';
session_start();
$radio1=$connect->escape_string($_GET['radio1']);
$radio2=$connect->escape_string($_GET['radio2']);
$mesaj=$connect->escape_string($_GET['mesaj']);

if ($radio1=='true'){
  $modlivrare="livrare la domiciliu";
}elseif ($radio2=='true'){
  $modlivrare="ridicare din magazin";
}

if ($radio1 == 'false' && $radio2 == 'false'){
  echo "0";
}else{
  if ($_SESSION['produsecos']){
    if (isset($_SESSION['logat']) && $_SESSION['logat'] == 1){
      $var=2;
      $email=$_SESSION['useremail'];
      $query=$connect->query("SELECT * FROM usersdeliverydetails WHERE email='$email'");
      $detaliiuser=$query->fetch_assoc();
    }else{
      if (isset($_SESSION['guest'])){
        $var=1;
        $email=$_SESSION['guest'];
        $telefonguest=$_SESSION['telefonguest'];
        $query=$connect->query("SELECT * FROM guesttempo WHERE email='$email' AND telefon='$telefonguest'");
        $detaliiuser=$query->fetch_assoc();
      }else{
        $var=0;
        echo "2";
      }
    }

    if ($var == 1 or $var == 2){
      $nume=$detaliiuser['nume'];
      $prenume=$detaliiuser['prenume'];
      $judet=$detaliiuser['judet'];
      $oras=$detaliiuser['oras'];
      $adresa=$detaliiuser['adresa'];
      $telefon=$detaliiuser['telefon'];
      $cosproduse="";
      $subtotalbrut=0.00;
      $detaliidefolos="";
      foreach ($_SESSION['idprodusecos'] as $produs) {
        $numecomplet=$_SESSION['produsecos'][$produs];
        $extra3=str_replace(")","",$numecomplet);
        $extra2=explode("(",$extra3);
        if (isset($extra2[1])){
          $cosproduse=$cosproduse.$_SESSION['catebuc'][$produs]."&".$produs."&".$extra2[1]."|";
        }else{
          $cosproduse=$cosproduse.$_SESSION['catebuc'][$produs]."&".$produs."|";
        }
        $pretbrut=$_SESSION['preturi'][$produs]*$_SESSION['catebuc'][$produs];
        $pretdeachitat=number_format($pretbrut, 2, '.', '');
        $subtotalbrut=$subtotalbrut+$pretbrut;
        $subtotal = number_format($subtotalbrut, 2, '.', '');
        $subtotalfaratva = number_format(((($subtotalbrut)*100)/119), 2, '.', '');
        $subtotaltva = number_format(((($subtotalbrut)*19)/119), 2, '.', '');
        $idreal=explode("_",$produs);
        $idreall=$idreal[0];
        $detaliidefolos .= '
        <tr>
          <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:left;padding:7px;"><a href=http://sport-moto-bike.ro/detaliiprodus.php?id='.$idreall.'>'.$_SESSION['produsecos'][$produs].'</a></td>
          <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$_SESSION['catebuc'][$produs].'</td>
        </tr>';
      }

      $sql = "INSERT INTO comenzi (email,nume,prenume,judet,oras,adresa,telefon,modlivrare,mesaj,cosproduse,subtotal) VALUES ('$email','$nume','$prenume','$judet','$oras','$adresa','$telefon','$modlivrare','$mesaj','$cosproduse','$subtotal')";
      if ($connect->query($sql)){
        ?>
        <div class="well">
          <ul>
            <li style="color:green;"><h4><center>Ai trimis comanda cu succes.</center></h4></li>
            <li><center>Curand vei primi un e-mail cu toate informatiile suplimentare legate de comanda.</center></li>
            <li><center>Multumim pentru comanda, Echipa Sport-Extrem.</center></li>
            <li><center><a href="index.php">Inapoi la pagina principala.</a></center></li>
          </ul>
        </div>
        <?php
          require 'trimiteEMAILcomanda.php';
          unset($_SESSION['idprodusecos']);
          unset($_SESSION['pozeprodusecos']);
          unset($_SESSION['preturi']);
          unset($_SESSION['catebuc']);
          unset($_SESSION['produsecos']);
          unset($_SESSION['instock']);
          if ($var == 1){
            $sql2 = "DELETE FROM guesttempo WHERE email='$email' AND telefon='$telefonguest'";
            if ($connect->query($sql2)){
              unset($_SESSION['guest']);
              unset($_SESSION['telefonguest']);
            }
          }
       }else{
        echo "2"; }
      }
  }else{
    echo "1";
  }
}
?>
