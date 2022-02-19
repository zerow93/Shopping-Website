<?php
require 'conectarebazadate.php';
session_start();
$email = $connect->escape_string($_GET['email']);
$password = $connect->escape_string($_GET['p']);
$rezultat = $connect->query("SELECT * FROM users WHERE email='$email'");

if ($email != ""){
 if ($password != ""){
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $eroare ="Formatul e-mailului este invalid.";
}else{
if ($rezultat->num_rows == 0) {
  $eroare ="Utilizator inexistent";
}else{
  $user = $rezultat->fetch_assoc();
  if ( password_verify($password, $user['password']) ){
    $_SESSION['logat']=1;
    $_SESSION['usernameid']=$user['id'];
    $_SESSION['useremail']=$user['email'];
    $_SESSION['numeuserlogat']=$user['nume']." ".$user['prenume'];
    $eroare = 1;
  }else{
    $eroare = "E-mail sau parola gresita.";
  }
}
}
}else{
  $eroare= "Introdu o parola!";
}
}else{
  $eroare= "Introdu e-mail!";
}
if(isset($eroare)){
if ($eroare!=1 && !empty($eroare)){
?>
<div class="alert alert-block alert-error fade in">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>Eroare : </strong><?php Echo $eroare; ?>
</div>
<?php
}else{
  echo $eroare;
}
}
unset($eroare);
?>
