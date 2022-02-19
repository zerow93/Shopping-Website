<?php
$id=$connect->escape_string($_GET['id']);
$querycomanda=$connect->query("SELECT * FROM comenzi WHERE id='$id'");
$detaliicomanda=$querycomanda->fetch_assoc();

$to = $detaliicomanda['email'];
$subject = 'Sport-moto-bike - Comanda '.$detaliicomanda['id'].' Anulata';
$headers = 'From: SportExtrem <vanzari@sport-moto-bike.ro>' . "\r\n";
$message = 'Buna ziua,

Comanda dumneavoastra cu nr. '.$id.' a fost anulata!

';
if (isset($_GET['motiv']) && $_GET['motiv']<>"") {
$message .= 'Motiv anulare: '.$_GET['motiv'].'

';
}

$message .= 'Va multumim pentru intelegere!';

mail($to,$subject,$message,$headers);
?>
