<?php
require 'conectarebazadate.php';
$numereg = $connect->escape_string($_GET["numereg"]);
$prenumereg = $connect->escape_string($_GET["prenumereg"]);
$emailreg = $connect->escape_string($_GET["emailreg"]);
$parolareal1 = $connect->escape_string($_GET["parolareg1"]);
$parolareal2 = $connect->escape_string($_GET["parolareg2"]);
$parolareg1 = $connect->escape_string(password_hash($_GET["parolareg1"], PASSWORD_BCRYPT));
$parolareg2 = $connect->escape_string(password_hash($_GET["parolareg2"], PASSWORD_BCRYPT));
$ziuareg = $connect->escape_string($_GET["ziuareg"]);
$lunareg = $connect->escape_string($_GET["lunareg"]);
$anulreg = $connect->escape_string($_GET["anulreg"]);
$judetregf = $connect->escape_string($_GET["judetreg"]);
$orasregf = $connect->escape_string($_GET["orasreg"]);
$adresareg = $connect->escape_string($_GET["adresareg"]);
$postcodereg = $connect->escape_string($_GET["postcodereg"]);
$nrtelreg = $connect->escape_string($_GET["nrtelreg"]);
$datanastere = $ziuareg . '.' . $lunareg . '.' . $anulreg;
$hash = $connect->escape_string(md5(rand(0,1000)));
if ($judetregf!=""){
$query = $connect->query("SELECT * FROM localizare_judete WHERE id=$judetregf");
while($judetulreal = mysqli_fetch_assoc($query)){
 $judetreg = $judetulreal["nume"];
}
}

if ($orasregf!=""){
$query2 = $connect->query("SELECT * FROM localizare_localitati WHERE id=$orasregf");
while($orasulreal = mysqli_fetch_assoc($query2)){
 $orasreg = $orasulreal["nume"];
}
}

$verificare = $connect->query("SELECT * FROM users WHERE email='$emailreg'") or die($connect->error());

if (preg_match("/^[a-zA-Z ]*$/",$numereg) && ($numereg!="")){
  if (preg_match("/^[a-zA-Z ]*$/",$prenumereg) && ($prenumereg!="")){
    if (filter_var($emailreg, FILTER_VALIDATE_EMAIL) && ($emailreg!="")){
      if( ($parolareal1!="") && ($parolareal1==$parolareal2) && (strlen($parolareal1) >= '6') ){
        if (preg_match("/^[0-9]{10}$/", $nrtelreg)){
          if( ($ziuareg!="") && ($lunareg!="") && ($anulreg!="") ){
            if ( ($judetregf!="") && ($orasregf!="") ){
                if($adresareg!=""){
                  if ($verificare->num_rows > 0){
                    $mesajeroare = "User deja existent!";
                  }else{
                    $sql = "INSERT INTO users (email,password,nume,prenume,datanastere,adresa,oras,judet,codpostal,telefon,verified,active,hash) VALUES ('$emailreg','$parolareg1','$numereg','$prenumereg','$datanastere','$adresareg','$orasreg','$judetreg','$postcodereg','$nrtelreg','0','1','$hash')";
                    $sql2 = "INSERT INTO usersdeliverydetails (email,nume,prenume,adresa,judet,oras,telefon) VALUES ('$emailreg','$numereg','$prenumereg','$adresareg','$judetreg','$orasreg','$nrtelreg')";
                    if ($connect->query($sql) && $connect->query($sql2)){
                      $mesajeroare = "Succes";
                    }else{
                      $mesajeroare = "S-a produs o eroare.";
                    }
                  }
                }else{
                  $mesajeroare = "Va rog sa introduceti o adresa.";
                }
            }else{
              $mesajeroare = "Va rog sa alegeti un judet si-o localitate. Daca localitatea dumneavoastra nu se afla in lista, va rog selectati localitatea mama si notati adresa completa la adresa.";
            }
          }else{
            $mesajeroare = "Data nasterii incompleta.";
          }
        }else{
          $mesajeroare = "Numar de telefon invalid. Asigurati-va ca acesta are numai 10 caractere.";
        }
      }else{
        $mesajeroare = "<p>Parola trebuie:</p>
<p>-sa fie unica;</p>
<p>-sa fie diferita de numele de utilizator;</p>
<p>-sa contina cel putin o cifra;</p>
<p>-sa nu contina 3 caractere identice succesive, de exemplu, aaa, 111;</p>
<p>-sa contina cel putin 6 caractere.</p>";
      }
    }else{
      $mesajeroare = "Specificati o adresa de e-mail valabila si corecta";
    }
  }else{
    $mesajeroare = "<p>Preumele de utilizator trebuie să contina:</p><p>-intre 3 şi 20 de caractere;</p><p>-caractere din alfabetul latin.</p>";
  }
}else{
  $mesajeroare = "<p>Numele de utilizator trebuie să contina:</p><p>-intre 3 si 20 de caractere;</p><p>-caractere din alfabetul latin.</p>";
}

?>
<?php
if (isset($mesajeroare) && !empty($mesajeroare) && $mesajeroare!="Succes") {
?>
<div class="alert alert-block alert-error fade in">
<button type="button" class="close" data-dismiss="alert">×</button>
<?php Echo $mesajeroare;?>
  <?php
  if ($mesajeroare=="User deja existent!"){
    ?>
    <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-mini btn-primary"> Logheaza-te</span></a>
    <a href="forgot.php"><span class="btn btn-mini btn-primary"> Ti-ai uitat parola?</span> </a>
    <?php
  }
  ?>
</div>
<?php
}elseif ($mesajeroare="Succes"){
  require 'trimitemail.php';
}
$mesajeroare="";
?>
