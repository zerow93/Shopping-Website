xmlhttp=new XMLHttpRequest();
  function checkerrorsreg(){
    xmlhttp.onreadystatechange = function(){
      if (xmlhttp.readyState == 4 && xmlhttp.status==200){
        if (xmlhttp.responseText != ""){
          document.getElementById('checkreg').innerHTML = xmlhttp.responseText;
       }else{
         document.getElementById('continutid').innerHTML = "<strong><center><p>CONTUL DUMNEAVOASTRA A FOST CREAT!</p></center></strong><div><center><p>Felicitari! Noul dumneavoastra cont a fost creat cu succes! </p><p>Inapoi catre <a href=index.php>Pagina Principala</a></p></center></div>";
       }
      }else{
        document.getElementById('checkreg').innerHTML = "<strong>Waiting for server..</strong>";
      }
    }
    xmlhttp.open("GET","register.php?numereg="+document.getElementById("nume").value+"&prenumereg="+document.getElementById("prenume").value+"&emailreg="+document.getElementById("email").value+"&parolareg1="+document.getElementById("pass1").value+"&parolareg2="+document.getElementById("pass2").value+"&ziuareg="+document.getElementById("ziua").value
    +"&lunareg="+document.getElementById("luna").value+"&anulreg="+document.getElementById("anul").value+"&judetreg="+document.getElementById("judett").value+"&orasreg="+document.getElementById("oras").value+"&adresareg="+document.getElementById("adresa").value+"&postcodereg="+document.getElementById("postcode").value
    +"&nrtelreg="+document.getElementById("nrtel").value,false);
    xmlhttp.send(null);
  }

function checkerrorforgot(){
  var checkforgot=new XMLHttpRequest();
  checkforgot.open("GET","checkforgot.php?email="+document.getElementById("mailforgot").value,false);
  checkforgot.send(null);
  if (checkforgot.responseText === "1"){
    document.getElementById('continutforgot').innerHTML = "<form id=submite2 method=post action=index.php><strong><center><p>  </p><p>Succes!</p><p>Verifica-ti e-mailul pentru schimbarea parolei.</p><p>Te vom redirectiona automat catre pagina principala.</p><p><a href=index.php> Inapoi la pagina principala</a></p></center></strong></form>";
    setTimeout(function() {
      document.getElementById("submite2").submit();
    }, 4000);
  }else{
    document.getElementById('checkforgot').innerHTML = "<div class='alert alert-block alert-error fade in'><button type=button class=close data-dismiss=alert>×</button><p>User inexistent sau formatul e-mail gresit.</p>";
  }
}

function checkerrorforgot2(){
  var checkforgot2=new XMLHttpRequest();
  checkforgot2.open("GET","checkforgot2.php?passf1="+document.getElementById("passf1").value+"&passf2="+document.getElementById("passf2").value,false);
  checkforgot2.send(null);
  if (checkforgot2.responseText === "0"){
    document.getElementById('continutforgot2').innerHTML = "<strong><center><p>  </p><p>Succes!</p><p>Ti-ai resetat parola cu succes. Acum te poti <a href=#login role=button data-toggle=modal style=padding-right:0>loga</a>.</p><p><a href=index.php> Inapoi la pagina principala</a></p></center></strong>";
  }else{
    document.getElementById('checkforgot2').innerHTML = "<div class='alert alert-block alert-error fade in'><button type=button class=close data-dismiss=alert>×</button><p>"+checkforgot2.responseText+"</p>";
  }
}
