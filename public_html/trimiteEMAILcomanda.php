<?php
$querycomanda=$connect->query("SELECT * FROM comenzi WHERE email='$email' ORDER BY id DESC LIMIT 1");
$detaliicomanda=$querycomanda->fetch_assoc();

$to = $email;
$subject = 'Sport-Moto-Bike - Comanda '.$detaliicomanda['id'].'';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: SportExtrem <vanzari@sport-moto-bike.ro>' . "\r\n";

$message = '<html><body>';
$message .= '
<p>Va multumim pentru interesul acordat produselor noastre. Comanda ta a fost primita si va fi preluata de un administrator in cel mai scurt timp.</p>
<table style="border-collapse:collapse;width:100%;border-top:1px solid #DDDDDD;border-left:1px solid #DDDDDD;margin-bottom:20px;">
  <thead>
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:left;padding:7px;color:#222222;" colspan="2">Detaliile comenzii:</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:left;padding:7px;">
        <b>ID Comandă:</b>&nbsp;'.$detaliicomanda['id'].'
        <br>
        <b>Adaugată la:</b>&nbsp;'.$detaliicomanda['data'].'
        <br>
        <b>Metoda de livrare:</b>&nbsp;'.$detaliicomanda['modlivrare'].'
      </td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:left;padding:7px;">
        <b>E-mail:</b>&nbsp;'.$detaliicomanda['email'].'
        <br>
        <b>Telefon:</b>&nbsp;'.$detaliicomanda['telefon'].'
      </td>
    </tr>
  </tbody>
</table>
';
if ($detaliicomanda['modlivrare'] == "livrare la domiciliu") {
  $message .= '
  <br>
  <table style="border-collapse:collapse;width:100%;border-top:1px solid #DDDDDD;border-left:1px solid #DDDDDD;margin-bottom:20px;">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:left;padding:7px;color:#222222;">Adresa de livrare:</td>
        <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:left;padding:7px;color:#222222;">Adresa de facturare:</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:left;padding:7px;">
          '.$detaliicomanda['prenume'].' '.$detaliicomanda['nume'].'
          <br>
          '.$detaliicomanda['judet'].', '.$detaliicomanda['oras'].'
          <br>
          '.$detaliicomanda['adresa'].'
        </td>
        <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:left;padding:7px;">
          '.$detaliicomanda['prenume'].' '.$detaliicomanda['nume'].'
          <br>
          '.$detaliicomanda['judet'].', '.$detaliicomanda['oras'].'
          <br>
          '.$detaliicomanda['adresa'].'
        </td>
      </tr>
    </tbody>
  </table>
  ';
}

$message .= '
<table style="border-collapse:collapse;width:100%;border-top:1px solid #DDDDDD;border-left:1px solid #DDDDDD;margin-bottom:20px;">
  <thead>
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:left;padding:7px;color:#222222;">Produs</td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:right;padding:7px;color:#222222;">Cantitate</td>
    </tr>
  </thead>
  <tbody>'.$detaliidefolos.'</tbody>
</table>
';

$message .= '
<p>Va rugam sa raspundeti la acest e-mail dacă aveti vreo intrebare.</p>
<p>Continua cumparaturile pe <a href="http://sport-moto-bike.ro">SITE</a>.</p>
';

$message .= '</body></html>';

mail($to,$subject,$message,$headers);
?>
