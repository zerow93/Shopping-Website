<?php
$to = $emailreg;
$subject = 'Bine ati venit pe site-ul nostru!';
$message_body = '
Buna ziua, '.$prenumereg.',

Iti multumim pentru contul creat pe site-ul nostru!';

$headers = 'From: SportExtrem <info@sport-moto-bike.ro>' . "\r\n";
mail($to,$subject,$message_body,$headers);
?>
