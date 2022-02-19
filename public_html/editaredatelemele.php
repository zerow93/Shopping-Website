<?php
require 'conectarebazadate.php';
session_start();
$userid=$_SESSION['usernameid'];
$query=$connect->query("SELECT * FROM users WHERE id='$userid'");
$detaliiuser=$query->fetch_assoc();
$datanastere=$detaliiuser['datanastere'];
$impartit = explode(".", $datanastere);
$zile = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
$ani = array('1950','1951','1952','1953','1954','1955','1956','1957','1958','1959','1960','1961','1962','1963','1964','1965','1966','1967','1968','1969','1970','1971','1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','2000');
$luni = array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
$luna=$luni[(intval($impartit[1]))-1];
$datanasterii=$impartit[0] . " " . $luna . " " . $impartit[2];
?>
<div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
  <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
    <tr>
      <td style="width:15%;border-top:0px solid white;">
        <center><img src="theme/img/cont2.png" style="width:100%"></center>
      </td>
      <td style="width:25%;border-top:0px solid white;">
        <ul>
          <li style="margin: 0 0 21px 0;">Nume:</li>
          <li style="margin: 0 0 21px 0;">Prenume:</li>
          <li style="margin: 0 0 21px 0;">Telefon:</li>
          <li style="margin: 0 0 21px 0;">Data nasterii:</li>
        </ul>
      </td>

<td style="width:40%;border-top:0px solid white;">
  <ul>
    <li style="margin: 0 0 0 0;"><input type="text" id="nume" value="<?php echo $detaliiuser['nume']; ?>"></li>
    <li style="margin: 0 0 0 0;"><input type="text" id="prenume" value="<?php echo $detaliiuser['prenume']; ?>"></li>
    <li style="margin: 0 0 0 0;"><input type="text" id="telefon" value="<?php echo $detaliiuser['telefon']; ?>"></li>
    <li style="margin: 0 0 0 0;">
      <select id="ziua" class="span1" name="">
        <?php foreach ($zile as $zi){ ?>
            <option value="<?php echo $zi; ?>" <?php if ($zi==$impartit[0]){ echo "selected"; } ?>><?php echo $zi; ?>&nbsp;&nbsp;</option>
        <?php } ?>
      </select>
      <select id="luna" class="span1" name="">
        <?php $j=1; foreach ($luni as $lunaa){ ?>
            <option value="<?php if (strlen((string)$j)>1) { echo $j; }else{ echo "0".$j; } ?>" <?php if ($lunaa==$luna){ echo "selected"; } ?>><?php echo $lunaa; ?>&nbsp;&nbsp;</option>
        <?php $j=$j+1; } ?>
      </select>
      <select id="anul" class="span1" name="">
        <?php foreach ($ani as $an){ ?>
            <option value="<?php echo $an; ?>" <?php if ($an==$impartit[2]){ echo "selected"; } ?>><?php echo $an; ?>&nbsp;&nbsp;</option>
        <?php } ?>
      </select>
    </li>
  </ul>
</td>
<td style="width:20%;border-top:0px solid white;">
  <div class="pull-right">
    <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="salvaredatelemele()">Salvare</a>
  </div>
</td>
</tr>
</table>
<div id="eroare"></div>
</div>
