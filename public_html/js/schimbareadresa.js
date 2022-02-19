function schimbareadresa(){
  var schimbaresa=new XMLHttpRequest();
  schimbaresa.open("GET","schimbadresa.php",false);
  schimbaresa.send(null);
  document.getElementById("adrese").innerHTML=schimbaresa.responseText;
}
function schimbareadresa2(){
  var schimbaresa2=new XMLHttpRequest();
  schimbaresa2.open("GET","schimbadresa2.php?nume="+document.getElementById("inume").value+"&prenume="+document.getElementById("iprenume").value+"&adresa="+document.getElementById("iadresa").value+"&judet="+document.getElementById("ijudet").value+"&oras="+document.getElementById("ioras").value+"&telefon="+document.getElementById("itelefon").value,false);
  schimbaresa2.send(null);
  if (schimbaresa2.responseText === "0"){
    document.getElementById("eroareee").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Eroare: Imi pare rau dar ceva nu este completat bine! Verifica daca:<br />-S-a introdus un nume;<br />-S-a introdus un prenume;<br />-S-a introdus o adresa, un judet si un oras/sat;<br />-Numarul de telefon trebuie sa contina 10 cifre.</div>";
  }else{
    document.getElementById("adrese").innerHTML=schimbaresa2.responseText;
  }
}
function metodarapida(){
  var metodarapida=new XMLHttpRequest();
  metodarapida.open("GET","metodarapida.php",false);
  metodarapida.send(null);
  document.getElementById("adrese").innerHTML=metodarapida.responseText;
}
function metodarapida2(){
  var metodarapidaa=new XMLHttpRequest();
  metodarapidaa.open("GET","metodarapida2.php?email="+document.getElementById("zemail").value+"&nume="+document.getElementById("znume").value+"&prenume="+document.getElementById("zprenume").value+"&judet="+document.getElementById("judett").value+"&oras="+document.getElementById("oras").value+"&adresa="+document.getElementById("zadresa").value+"&telefon="+document.getElementById("znrtel").value,false);
  metodarapidaa.send(null);
  if (metodarapidaa.responseText === "0"){
    document.getElementById("eroare").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Eroare: Imi pare rau dar ceva nu este completat bine! Verifica daca:<br />-S-a introdus un nume;<br />-S-a introdus un prenume;<br />-Emailul are formatul bun;<br />-S-a introdus o adresa, un judet si un oras/sat;<br />-Numarul de telefon trebuie sa contina 10 cifre.</div>";
  }else{
    refreshmetodaplata();
    document.getElementById("ajaxed").innerHTML=metodarapidaa.responseText;
  }
}
function schimbareadresa3(){
  var schimbareadresa3=new XMLHttpRequest();
  schimbareadresa3.open("GET","schimbadresa3.php",false);
  schimbareadresa3.send(null);
  document.getElementById("adrese").innerHTML=schimbareadresa3.responseText;
}
function schimbadresa4(){
  var schimbadresa4=new XMLHttpRequest();
  schimbadresa4.open("GET","metodarapida3.php?nume="+document.getElementById("inume").value+"&prenume="+document.getElementById("iprenume").value+"&adresa="+document.getElementById("iadresa").value+"&judet="+document.getElementById("ijudet").value+"&oras="+document.getElementById("ioras").value+"&telefon="+document.getElementById("itelefon").value,false);
  schimbadresa4.send(null);
  if (schimbadresa4.responseText === "0"){
    document.getElementById("eroaree").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Eroare: Imi pare rau dar ceva nu este completat bine! Verifica daca:<br />-S-a introdus un nume;<br />-S-a introdus un prenume;<br />-S-a introdus o adresa, un judet si un oras/sat;<br />-Numarul de telefon trebuie sa contina 10 cifre.</div>";
  }else{
    document.getElementById("adrese").innerHTML=schimbadresa4.responseText;
  }
}

function refreshmetodaplata(){
  var refreshmetodaplata=new XMLHttpRequest();
  refreshmetodaplata.open("GET","refreshmetodaplata.php",false);
  refreshmetodaplata.send(null);
  document.getElementById("metodaplata").innerHTML=refreshmetodaplata.responseText;
}
