xmlhttp = new XMLHttpRequest();
function logincheck(){
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4 && xmlhttp.status==200){
      if (xmlhttp.responseText === "1"){
        document.getElementById('loginsuccess').innerHTML = "<form id=submite method=post action=index.php><strong><center><p>  </p><p>Autentificat cu succes!</p><p>Bine ai revenit, "+document.getElementById("emaillogin").value+"</p><p>Te vom redirectiona automat catre pagina principala.</p><p><a href=index.php> Inapoi la pagina principala</a></p></center></strong></form>";
        setTimeout(function() {
          document.getElementById("submite").submit();
        }, 2000);
      }else{
        document.getElementById('loginerror').innerHTML = xmlhttp.responseText;
      }
    }else{
        document.getElementById('loginerror').innerHTML = "<strong>Waiting for server..</strong>";
    }
  }
  xmlhttp.open("GET","login.php?email="+document.getElementById("emaillogin").value+"&p="+document.getElementById("pass").value,false);
  xmlhttp.send(null);
}
