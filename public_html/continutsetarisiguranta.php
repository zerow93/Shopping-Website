<?php
$useremail=$_SESSION['useremail'];
$ceredetaliiuser=$connect->query("SELECT * FROM users WHERE email='$useremail'");
$user = $ceredetaliiuser->fetch_assoc();
?>
        <div class="pull-right" style="width:80%;">
            <ul style="margin:0 0 0 0;">
              <li><br /></li>
              <div>
              <div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
                <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
                  <tr>
                    <td style="width:80%;border-top:0px solid white;">
                      <ul>
                        <li style="margin: 0 0 5px 0;color:DimGray;font-weight: 900;font-size: large;">Adresa de email</li>
                        <li style="margin: 0 0 10px 0;">adresa email actuala: <?php echo $useremail; ?></li>
                      </ul>
                    </td>
                  </tr>
                </table>
              </div><br />
              <div id="setarisiguranta">
              <div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
                <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
                  <tr>
                    <td style="width:80%;border-top:0px solid white;">
                      <ul>
                        <li style="margin: 0 0 5px 0;color:DimGray;font-weight: 900;font-size: large;">Parola</li>
                        <li style="margin: 0 0 10px 0;">Parola actuala: *******</li>
                      </ul>
                    </td>
                    <td style="width:20%;border-top:0px solid white;">
                      <div class="pull-right">
                        <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="schimbaparola(<?php echo $user['id']; ?>)">schimba parola</a>
                      </div>
                    </td>
                  </tr>
                </table>
              </div><br />
            </div>
            </div>
            </ul>
        </div>
