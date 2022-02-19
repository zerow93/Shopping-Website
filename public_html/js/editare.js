function editaredatelemele(){
  var editaredatelemele=new XMLHttpRequest();
  editaredatelemele.open("GET","editaredatelemele.php",false);
  editaredatelemele.send(null);
  document.getElementById("datelemele").innerHTML=editaredatelemele.responseText;
}
function salvaredatelemele(){
  var salvaredatelemele=new XMLHttpRequest();
  salvaredatelemele.open("GET","salvaredatelemele.php?nume="+document.getElementById('nume').value+"&prenume="+document.getElementById('prenume').value+"&telefon="+document.getElementById('telefon').value+"&ziua="+document.getElementById('ziua').value+"&luna="+document.getElementById('luna').value+"&anul="+document.getElementById('anul').value,false);
  salvaredatelemele.send(null);
  if (salvaredatelemele.responseText === "1"){
    document.getElementById("eroare").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Eroare: Imi pare rau dar ceva nu este completat bine! Verifica daca:<br />-S-a introdus un nume;<br />-S-a introdus un prenume;<br />-Numarul de telefon trebuie sa contina 10 cifre.</div>";
  }else{
    document.getElementById("datelemele").innerHTML=salvaredatelemele.responseText;
  }
}
function editareadresalivrare(){
  var editareadresalivrare=new XMLHttpRequest();
  editareadresalivrare.open("GET","editareadresalivrare.php",false);
  editareadresalivrare.send(null);
  document.getElementById("adresalivrare").innerHTML=editareadresalivrare.responseText;
}
function salvareadresalivrare(){
  var salvareadresalivrare=new XMLHttpRequest();
  salvareadresalivrare.open("GET","salvareadresalivrare.php?nume="+document.getElementById('nume').value+"&prenume="+document.getElementById('prenume').value+"&telefon="+document.getElementById('telefon').value+"&adresa="+document.getElementById('adresa').value+"&judet="+document.getElementById('judet').value+"&oras="+document.getElementById('oras').value,false);
  salvareadresalivrare.send(null);
  if (salvareadresalivrare.responseText === "1"){
    document.getElementById("eroare").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Eroare: Imi pare rau dar ceva nu este completat bine! Verifica daca:<br />-S-a introdus un nume;<br />-S-a introdus un prenume;<br />-S-a introdus o adresa;<br />-Numarul de telefon trebuie sa contina 10 cifre.</div>";
  }else{
    document.getElementById("adresalivrare").innerHTML=salvareadresalivrare.responseText;
  }
}
function schimba_judet3(){
  var judet=new XMLHttpRequest();
  judet.open("GET","ajax3.php?judet="+document.getElementById("judet").value,false);
  judet.send(null);
  document.getElementById("oras").innerHTML=judet.responseText;
}
function vezidetaliicomanda(var1){
  var vezidetaliicomanda=new XMLHttpRequest();
  vezidetaliicomanda.open("GET","vezidetaliicomanda.php?opened="+var1,false);
  vezidetaliicomanda.send(null);
  document.getElementById("comenzilemele").innerHTML=vezidetaliicomanda.responseText;
}
function ascundedetaliicomanda(){
  var ascundedetaliicomanda=new XMLHttpRequest();
  ascundedetaliicomanda.open("GET","ascundedetaliicomanda.php",false);
  ascundedetaliicomanda.send(null);
  document.getElementById("comenzilemele").innerHTML=ascundedetaliicomanda.responseText;
}
function schimbaparola(varid){
  var schimbaparola=new XMLHttpRequest();
  schimbaparola.open("GET","schimbaparola.php?id="+varid,false);
  schimbaparola.send(null);
  document.getElementById("setarisiguranta").innerHTML=schimbaparola.responseText;
}
function salveazaparola(varid){
  var salveazaparola=new XMLHttpRequest();
  salveazaparola.open("GET","salveazaparola.php?id="+varid+"&passact="+document.getElementById('schparolaactuala').value+"&schpass1="+document.getElementById('schparolanoua').value+"&schpass2="+document.getElementById('schparolarnoua').value,false);
  salveazaparola.send(null);
  if (salveazaparola.responseText === "1") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Parola actuala gresita, Mai ai 2 incercari.</div>";
  }else if (salveazaparola.responseText === "11") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Parola actuala gresita, Mai ai 1 incercare.</div>";
  }else if (salveazaparola.responseText === "12") {
    document.getElementById("eroareparola").innerHTML="<form id=submite3 method=post action=index.php><div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Este a 3-a oara cand gresesti parola. Din motive de securitate, vei fii delogat si trimis pe pagina principala.</div></form>";
    setTimeout(function() {
      document.getElementById("submite3").submit();
    }, 2000);
  }else if (salveazaparola.responseText === "2") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Toate campurile sunt obligatorii.</div>";
  }else if (salveazaparola.responseText === "3") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Noua parola trebuie sa contina cel putin 6 caractere.</div>";
  }else if (salveazaparola.responseText === "4") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Parola nu coincide.</div>";
  }else if (salveazaparola.responseText === "5") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Eroare necunoscuta, Contacteaza un operator.</div>";
  }else if (salveazaparola.responseText === "6") {
    document.getElementById("eroareparola").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>EROARE: Parola este identica cu cea actuala.</div>";
  }else{
    document.getElementById("setarisiguranta").innerHTML=salveazaparola.responseText;
  }
}
