<?php
require 'conectarebazadate.php';
session_start();
$id = $connect->escape_string($_GET["id"]);
$_SESSION['incercarinereusite']=0;
?>
<div style="background-color:white;margin:0 5% 0 5%;border: 1px solid grey;">
  <table style="width:96%;margin:2% 2% 2% 2%;border-top:0px solid white;">
    <tr>
      <td style="width:80%;border-top:0px solid white;">
        <ul>
          <li style="margin: 0 0 5px 0;color:DimGray;font-weight: 900;font-size: large;">Parola</li>
          <li>
            <table>
              <tr>
                <td style="border-top:0px solid white;text-align:right;">Parola actuala:</td>
                <td style="border-top:0px solid white;"><input type="password" id="schparolaactuala" name="schparolaactuala"></td>
              </tr>
              <tr>
                <td style="border-top:0px solid white;text-align:right;">Parola noua:</td>
                <td style="border-top:0px solid white;"><input type="password" id="schparolanoua" name="schparolanoua"></td>
              </tr>
              <tr>
                <td style="border-top:0px solid white;text-align:right;">Repeta parola noua:</td>
                <td style="border-top:0px solid white;"><input type="password" id="schparolarnoua" name="schparolarnoua"></td>
              </tr>
            </table>
          </li>
        </ul>
      </td>
      <td style="width:20%;border-top:0px solid white;">
        <div class="pull-right">
          <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="salveazaparola(<?php echo $id; ?>)">salveaza parola</a>
        </div>
      </td>
    </tr>
    <tr>
      <td style="width:80%;border-top:0px solid white;" id="eroareparola" colspan="2"></td>
    </tr>
  </table>
</div><br />
