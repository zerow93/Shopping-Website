<?php
require 'conectarebazadate.php';
session_start();
$useremail=$_SESSION['useremail'];
$query=$connect->query("SELECT * FROM comenzi WHERE email='$useremail' ORDER BY data DESC");
$catecomenzi=mysqli_num_rows($query);
$opened=$connect->escape_string($_GET['opened']);
if ($catecomenzi>0){
  while($detaliicomanda = mysqli_fetch_assoc($query)){
    $datatimp=explode(" ", $detaliicomanda['data']);
    $data=explode("-", $datatimp[0]);
    $timp=explode(":", $datatimp[1]);
    $luni= array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
    $luna = $luni[(intval($data[1]))-1];
    if ($detaliicomanda['status']=='0' or $detaliicomanda['status']=='-1'){
      $statustext="In asteptare..";
      $statuscolor="Grey";
    }elseif ($detaliicomanda['status']=='1'){
      $statustext="Comanda efectuata";
      $statuscolor="DodgerBlue";
    }elseif ($detaliicomanda['status']=='2'){
      $statustext="Comanda anulata";
      $statuscolor="DarkRed";
    }
?>

<div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
  <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
    <tr>
      <td style="width:15%;border-top:0px solid white;">
        <center><img src="theme/img/comanda.png" style="width:100%"></center>
      </td>
      <td style="width:65%;border-top:0px solid white;">
        <ul>
          <li style="margin: 0 0 5px 0;color:DimGray;font-weight: 900;font-size: large;">Comanda nr. <?php echo $detaliicomanda['id']; ?></li>
          <li style="margin: 0 0 10px 0;">Plasata pe: <?php echo $data[2]; ?> <?php echo $luna; ?> <?php echo $data[0]; ?>, <?php echo $timp[0]; ?>:<?php echo $timp[1]; ?></li><hr class="soft"/>
          <li style="margin: 10px 0 2px 0;">Subtotal: <?php echo $detaliicomanda['subtotal']; ?> lei</li>
          <li style="margin: 0 0 0 0;color:<?php echo $statuscolor; ?>;font-weight: 700;font-size: medium;"><?php echo $statustext; ?></li>
        </ul>
      </td>
    <?php if ($detaliicomanda['id']==$opened){ ?>
      <td style="width:20%;border-top:0px solid white;">
        <div class="pull-right">
          <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="ascundedetaliicomanda()">ascunde detalii</a>
        </div>
      </td>
    </tr>
      <tr>
        <table class="table-bordered" style="margin-left:10%;margin-right:10%;margin-bottom:5%;">
          <tr>
            <td style="width:15%;border-top:0px solid white;text-align: center;">Poza</td>
            <td style="width:25%;border-top:0px solid white;text-align: center;">Nume</td>
            <td style="width:10%;border-top:0px solid white;text-align: center;">Cantitate</td>
            <td style="width:15%;border-top:0px solid white;text-align: center;">Pret Unitar</td>
            <td style="width:20%;border-top:0px solid white;text-align: center;">Total</td>
          </tr>
        <?php
          $produse=explode("|",$detaliicomanda['cosproduse']);
          $cateproduse=count($produse)-1;
          for ($i = 0; $i < $cateproduse; $i++) {
            $produs01 = explode("&", $produse[$i]);
            $cantitateprod=$produs01[0];
            $idprod=explode("_", $produs01[1]);
            $cereredetaliiprodus=$connect->query("SELECT * FROM produse WHERE id=$idprod[0]");
            $detaliiprodus = $cereredetaliiprodus->fetch_assoc();
            if (isset($produs01[2])){
              $numeprodusfinal = $detaliiprodus['nume']."(".$produs01[2].")";
            }else{
              $numeprodusfinal = $detaliiprodus['nume'];
            }
        ?>
          <tr>
            <td style="width:15%;border-top:0px solid white;text-align: center;"><img width="40" src="theme/Produse/<?php echo $detaliiprodus['poza']; ?>"/></td>
            <td style="width:25%;border-top:0px solid white;text-align: center;"><?php echo $numeprodusfinal; ?></td>
            <td style="width:10%;border-top:0px solid white;text-align: center;"><?php echo $cantitateprod; ?></td>
            <td style="width:15%;border-top:0px solid white;text-align: center;"><?php echo $detaliiprodus['pret']; ?> Lei</td>
            <td style="width:20%;border-top:0px solid white;text-align: center;"><?php echo number_format(($cantitateprod*$detaliiprodus['pret']), 2, '.', ''); ?> Lei</td>
          </tr>
        <?php  } ?>
        </table>
      </tr>
    <?php }else{ ?>
      <td style="width:20%;border-top:0px solid white;">
        <div class="pull-right">
          <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="vezidetaliicomanda(<?php echo intval($detaliicomanda['id']); ?>)">detalii</a>
        </div>
      </td>
    </tr>
  <?php } ?>
  </table>
</div>
<br />

<?php
 }
}else{
?>
  <br /><br /><h4><center>Nu ai efectuat nicio comanda.</center></h4>
<?php } ?>
