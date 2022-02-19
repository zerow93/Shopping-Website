<?php
$userid=$_SESSION['usernameid'];
$query=$connect->query("SELECT * FROM users WHERE id='$userid'");
$detaliiuser=$query->fetch_assoc();
$datanastere=$detaliiuser['datanastere'];
$impartit = explode(".", $datanastere);
$luni= array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
$luna=$luni[(intval($impartit[1]))-1];
$datanasterii=$impartit[0] . " " . $luna . " " . $impartit[2];
$useremail=$_SESSION['useremail'];
$query2=$connect->query("SELECT * FROM usersdeliverydetails WHERE email='$useremail'");
$detaliiuser2=$query2->fetch_assoc();
 ?>
        <div class="pull-right" style="width:80%;">
          <div>
            <ul style="margin:0 0 0 0;">
              <li><br /></li>
              <li style="margin:0 0 0 5%;"><h3>Datele mele</h3></li>
              <div id="datelemele">

              <div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
                <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
                  <tr>
                    <td style="width:15%;border-top:0px solid white;">
                      <center><img src="theme/img/cont2.png" style="width:100%"></center>
                    </td>
                    <td style="width:25%;border-top:0px solid white;">
                      <ul>
                        <li style="margin: 0 0 10px 0;">Nume:</li>
                        <li style="margin: 0 0 10px 0;">Prenume:</li>
                        <li style="margin: 0 0 10px 0;">Telefon:</li>
                        <li style="margin: 0 0 10px 0;">Data nasterii:</li>
                      </ul>
                    </td>

                    <td style="width:40%;border-top:0px solid white;">
                      <ul>
                        <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser['nume']; ?></li>
                        <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser['prenume']; ?></li>
                        <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser['telefon']; ?></li>
                        <li style="margin: 0 0 10px 0;"><?php echo $datanasterii; ?></li>
                      </ul>
                    </td>
                    <td style="width:20%;border-top:0px solid white;">
                      <div class="pull-right">
                        <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="editaredatelemele()">Editeaza datele</a>
                      </div>
                    </td>

                  </tr>
                </table>
              </div>
            </div>
            </ul>
          </div>
          <div>
            <ul style="margin:0 0 5% 0;">
              <li><br /></li>
              <li style="margin:0 0 0 5%;"><h3>Adresa de livrare</h3></li>
              <div id="adresalivrare">

              <div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
                <table style="width:96%;margin:2% 2% 2% 2%;">
                  <tr>
                    <td style="width:15%;border-top:0px solid white;">
                      <center><img src="theme/img/delivery.png" style="width:100%"></center>
                    </td>
                    <td style="width:65%;border-top:0px solid white;">
                      <ul>
                        <li style="margin: 0 0 10px 0;"><strong><?php echo $detaliiuser2['nume']; ?> <?php echo $detaliiuser2['prenume']; ?> - <?php echo $detaliiuser2['telefon']; ?></strong></li>
                        <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser2['adresa']; ?></li>
                        <li style="margin: 0 0 10px 0;"><?php echo $detaliiuser2['judet']; ?>, <?php echo $detaliiuser2['oras']; ?></li>
                      </ul>
                    </td>
                    <td style="width:20%;border-top:0px solid white;">
                      <div class="pull-right">
                        <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="editareadresalivrare()">modifica</a>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              
            </div>
            </ul>
          </div>
        </div>
