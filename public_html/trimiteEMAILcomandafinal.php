<?php
$id=$connect->escape_string($_GET['id']);

$querycomanda=$connect->query("SELECT * FROM comenzi WHERE id='$id'");
$detaliicomanda=$querycomanda->fetch_assoc();
$cosproduse=$detaliicomanda['cosproduse'];

$produsedincos=explode("|",$cosproduse);
$cateprodusecos=count($produsedincos)-1;
$detaliidefolos="";
$subtotal=0.00;
$costlivrare=number_format($detaliicomanda['pretlivrare'], 2, '.', '');
for ($i=0; $i < $cateprodusecos; $i++) {
  $partiprodus=explode("&",$produsedincos[$i]);
  $cantitate=$partiprodus[0];
  $idreal=explode("_",$partiprodus[1]);
  $idreall=$idreal[0];
  $queryprodus=$connect->query("SELECT * FROM produse WHERE id='$idreall'");
  $detaliiprodus=$queryprodus->fetch_assoc();
  $totnumele=$detaliiprodus['nume'];
  $pretdeachitat=$partiprodus[0]*$detaliiprodus['pret'];
  $subtotal+=$pretdeachitat;
  if (isset($partiprodus[2])){
    $totnumele.= "( ".$partiprodus[2]." )";
  }
  $pretfrumos=number_format($pretdeachitat, 2, '.', '');
  $detaliidefolos .= '<tr>
    <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:left;padding:7px;"><a href=http://sport-moto-bike.ro/detaliiprodus.php?id='.$idreall.'>'.$totnumele.'</a></td>
    <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$cantitate.'</td>
    <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$detaliiprodus['pret'].' Lei</td>
    <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$pretfrumos.' Lei</td>
  </tr>';
}

$subtotalfaratva=number_format((($subtotal*100)/119), 2, '.', '');
$subtotaltva=number_format((($subtotal*19)/119), 2, '.', '');

if ($detaliicomanda['modlivrare'] == "livrare la domiciliu") {
  $subtotal2=number_format(($subtotal+$costlivrare), 2, '.', '');
}else{
  $subtotal2=number_format($subtotal, 2, '.', '');
}

$to = $detaliicomanda['email'];
$subject = 'Sport-moto-bike - Comanda '.$detaliicomanda['id'].' Confirmata';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: SportExtrem <vanzari@sport-moto-bike.ro>' . "\r\n";

$message = '<html><body>';
$message .= '
<p>Va multumim pentru interesul acordat produselor noastre. Comanda ta a fost confirmata.</p>
';

if ($detaliicomanda['modlivrare'] == "livrare la domiciliu") {
$message .= '
<p>Produsele vor fi trimise catre adresa ta prin curierat in cel mai scurt timp posibil.</p>
';
}else{
$message .= '
<p>Produsele vor fi pregatite pentru colectare la magazinul nostru de pe Bd. Mircea cel batran, H3, parter(vis-a-vis de Mitropolie) in cel mai scurt timp posibil.</p>
';
}

$message .='
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
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:right;padding:7px;color:#222222;">Pret unitar</td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#EFEFEF;font-weight:bold;text-align:right;padding:7px;color:#222222;">Valoare totala</td>
    </tr>
  </thead>
  <tbody>'.$detaliidefolos.'</tbody>
  <tfoot>
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;" colspan="3"><b>Subtotal:</b></td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$subtotalfaratva.' Lei</td>
    </tr>
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;" colspan="3"><b>TVA (19%):</b></td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$subtotaltva.' Lei</td>
    </tr>';

if ($detaliicomanda['modlivrare']=="livrare la domiciliu") {
$message .='
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;" colspan="3"><b>Cost livrare:</b></td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$costlivrare.' Lei</td>
    </tr>';
}

$message .='
    <tr>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;" colspan="3"><b>Total:</b></td>
      <td style="font-size:12px;border-right:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;text-align:right;padding:7px;">'.$subtotal2.' Lei</td>
    </tr>
  </tfoot>
</table>';

$message .= '
<p>Va rugam sa raspundeti la acest e-mail dacă aveti vreo intrebare.</p>
<p>Continua cumparaturile pe <a href="http://sport-moto-bike.ro">SITE</a>.</p>
';

$message .= '</body></html>';

mail($to,$subject,$message,$headers);
?>
