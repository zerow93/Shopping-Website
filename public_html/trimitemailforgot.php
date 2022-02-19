<?php
$to = $user['email'];
$subject = 'Recuperarea parolei pe site-ul sport-moto-bike.ro';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: SportExtrem <info@sport-moto-bike.ro>' . "\r\n";

$message = '<html><body>';
$message .= '
<p>Pentru a initia procesul de resetare a parolei pentru Contul SportExtrem '.$user['email'].', faceti clic pe link-ul de mai jos:</p>
<p><a href=http://www.sport-moto-bike.ro/forgot.php?hash='.$user['hash'].'>Reseteaza parola</a></p>
<p>Daca link-ul nu functioneaza, copiati si inserati adresa URL intr-o noua fereastra a browser-ului:</p>
<p><a href=http://www.sport-moto-bike.ro/forgot.php?hash='.$user['hash'].'>http://www.sport-moto-bike.ro/forgot.php?hash='.$user['hash'].'</a></p>
<p>Daca ati primit acest mesaj din greseala, este posibil ca un alt utilizator sa fi introdus adresa dvs. de e-mail din greseala, in timp ce incerca sa reseteze o parola.</p>
<p>Daca nu ati initiat solicitarea, nu este necesara nicio actiune din partea dvs. si puteti ignora acest e-mail.</p>
<p>Cu stima,</p>
<p>Echipa conturi sport-moto-bike</p>
';
$message .= '</body></html>';

mail($to,$subject,$message,$headers);
?>
