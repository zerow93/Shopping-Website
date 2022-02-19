<?php
require 'conectarebazadate.php';
session_start();
$_SESSION['guest']=$connect->escape_string($_GET['email']);
$email=$connect->escape_string($_GET['email']);
$nume=$connect->escape_string($_GET['nume']);
$prenume=$connect->escape_string($_GET['prenume']);
$judett=$connect->escape_string($_GET['judet']);
$orass=$connect->escape_string($_GET['oras']);
$adresa=$connect->escape_string($_GET['adresa']);
$telefon=$connect->escape_string($_GET['telefon']);
$_SESSION['telefonguest']=$telefon;

if (preg_match("/^[a-zA-Z ]*$/",$nume) && ($nume!="")){
  if (preg_match("/^[a-zA-Z ]*$/",$prenume) && ($prenume!="")){
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && ($email!="")){
      if ( ($judett!="") && ($orass!="") ){
        $query = $connect->query("SELECT * FROM localizare_judete WHERE id=$judett");
        $judetulreal = $query->fetch_assoc();
        $judet = $judetulreal["nume"];

        $query2 = $connect->query("SELECT * FROM localizare_localitati WHERE id=$orass");
        $orasulreal = $query2->fetch_assoc();
        $oras = $orasulreal["nume"];
        if($adresa!=""){
          if (preg_match("/^[0-9]{10}$/", $telefon)){
              $sql = "INSERT INTO guesttempo (email,nume,prenume,judet,oras,adresa,telefon) VALUES ('$email','$nume','$prenume','$judet','$oras','$adresa','$telefon')";
              if ($connect->query($sql)){
                ?>
                <div id=adresee>
                <table class="table table-bordered" style="width:50%;">
                  <tbody>
                    <tr>
                    <td>
                      <ul class="item box">
                        <li><h4>Adresa ta de livrare</h4></li>
                        <hr class="soft"/>
                        <li><?php echo $nume." ".$prenume; ?> </li>
                        <li><?php echo $adresa; ?></li>
                        <li><?php echo $judet; ?></li>
                        <li><?php echo $oras; ?></li>
                        <li><?php echo $telefon; ?></li>
                        <br />
                        <li><a class="btn" onclick="schimbareadresa3()">Actualizeaza <i class="icon-arrow-right"></i></a></li>
                      </ul>
                    </td>
                    </tr>
                  </tbody>
                </table>
                </div>
                <?php }
          }else{
            echo "0";
          }
        }else{
          echo "0";
        }
      }else{
        echo "0";
      }
    }else{
      echo "0";
    }
  }else{
    echo "0";
  }
}else{
  echo "0";
}
