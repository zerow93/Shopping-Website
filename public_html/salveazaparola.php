<?php
require 'conectarebazadate.php';
session_start();
$id = $connect->escape_string($_GET["id"]);
$passact = $connect->escape_string($_GET["passact"]);
$passnoua = $connect->escape_string($_GET["schpass1"]);
$passnoua2 = $connect->escape_string($_GET["schpass2"]);
$passnoua3 = $connect->escape_string(password_hash($_GET["schpass1"], PASSWORD_BCRYPT));
$ceredetaliiuser=$connect->query("SELECT * FROM users WHERE id='$id'");
$user = $ceredetaliiuser->fetch_assoc();
if (password_verify($passact,$user['password'])){
  if ($passnoua != "") {
    if (strlen($passnoua) > 5){
      if ($passnoua === $passnoua2){
        if (!password_verify($passnoua,$user['password'])){
          $sql = "UPDATE `users` SET `password` = '$passnoua3'";
          if ($connect->query($sql)){
            unset($_SESSION['incercarinereusite']);?>
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
                      <a style="color:grey;text-decoration: none;border:1px solid grey;padding:5px 5px 5px 5px;" onclick="schimbaparola(<?php echo $id; ?>)">schimba parola</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="width:80%;border-top:0px solid white;" colspan="2">
                    <div class='alert alert-block alert-error fade in' style="background-color:green;border-color:green;">
                      <button type='button' class='close' data-dismiss='alert'>×</button>
                        SUCCES! Ai reusit sa-ti schimbi parola.
                    </div>
                  </td>
                </tr>
              </table>
            </div><br /><?php
            }else{
              echo "5";
            }
        }else{
          echo "6";
        }
      }else{
        echo "4";
      }
    }else{
      echo "3";
    }
  }else{
    echo "2";
  }
}else{
  $_SESSION['incercarinereusite']=$_SESSION['incercarinereusite']+1;
  if ($_SESSION['incercarinereusite']==1){
    echo "1";
  }elseif ($_SESSION['incercarinereusite']==2){
    echo "11";
  }elseif ($_SESSION['incercarinereusite']==3){
    echo "12";
    unset($_SESSION['logat']);
    unset($_SESSION['usernameid']);
    unset($_SESSION['useremail']);
    unset($_SESSION['numeuserlogat']);
    unset($_SESSION['incercarinereusite']);
  }
}
?>
