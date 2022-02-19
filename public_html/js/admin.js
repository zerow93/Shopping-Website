function schimbacat(){
  var schimbacat=new XMLHttpRequest();
  schimbacat.open("GET","schimbacat.php?cat="+document.getElementById("categorie").value,false);
  schimbacat.send(null);
  document.getElementById("onchangecat").innerHTML=schimbacat.responseText;
}

function adaugaextra(){
  var adaugaextra=new XMLHttpRequest();
  adaugaextra.open("GET","adaugaextra.php?cate="+document.getElementById("detaliiextra").value,false);
  adaugaextra.send(null);
  document.getElementById("extraa").innerHTML=adaugaextra.responseText;
}

function adaugaextra1(number){
  var adaugaextra1=new XMLHttpRequest();
  adaugaextra1.open("GET","adaugaextra1.php?cate="+document.getElementById("Extra"+number).value+"&care="+number,false);
  adaugaextra1.send(null);
  document.getElementById("exxtra"+number).innerHTML=adaugaextra1.responseText;
}
function schimba_judet4(var1){
  var judet=new XMLHttpRequest();
  judet.open("GET","ajax3.php?judet="+document.getElementById("judet"+var1).value,false);
  judet.send(null);
  document.getElementById("oras"+var1).innerHTML=judet.responseText;
}
function stergeproduscomanda(var1,var2,var3){
  var stergeproduscomanda=new XMLHttpRequest();
  stergeproduscomanda.open("GET","refreshcomenziedit.php?id="+var1+"&idprodus="+var2+"&extraprodus="+var3,false);
  stergeproduscomanda.send(null);
  document.getElementById("refreshcomenzi").innerHTML=stergeproduscomanda.responseText;
}
function salveazacomandaeditata(var1,var2,var3){
  if (var3 == 0) {
    var text2="0";
  }else{
    var text2=document.getElementById("costlivrare"+var1).value;
  }
  var text = "";
  if (var2 > 0) {
    for (i = 0; i < var2; i++) {
      text += "&cantitate" + var1 + "prod" + i + "=" + document.getElementById("cantitate"+var1+"prod"+i).value;
    }
  }
  var salveazacomandaeditata=new XMLHttpRequest();
  salveazacomandaeditata.open("GET","refreshcomenziedit.php?id="+var1+"&nume="+document.getElementById("numecomanda"+var1).value+"&prenume="+document.getElementById("prenumecomanda"+var1).value+"&email="+document.getElementById("emailcomanda"+var1).value+"&judet="+document.getElementById("judet"+var1).value+"&oras="+document.getElementById("oras"+var1).value+"&adresa="+document.getElementById("adresacomanda"+var1).value+"&telefon="+document.getElementById("telefoncomanda"+var1).value+"&modlivrare="+document.getElementById("modlivrare"+var1).value+"&costlivrare="+text2+text,false);
  salveazacomandaeditata.send(null);
  document.getElementById("refreshcomenzi").innerHTML=salveazacomandaeditata.responseText;
}
function functiebutoanecomenzi(var1,var2){
  var functiebutoanecomenzi=new XMLHttpRequest();
  functiebutoanecomenzi.open("GET","refreshcomenziedit.php?comanda="+var1+"&id="+var2,false);
  functiebutoanecomenzi.send(null);
  document.getElementById("refreshcomenzi").innerHTML=functiebutoanecomenzi.responseText;
}
function schimba_modlivrare(var1){
  var schimba_modlivrare=new XMLHttpRequest();
  schimba_modlivrare.open("GET","refreshcomenziedit.php?id="+var1+"&modnoulivrare="+document.getElementById("modlivrare"+var1).value,false);
  schimba_modlivrare.send(null);
  document.getElementById("refreshcomenzi").innerHTML=schimba_modlivrare.responseText;
}
function trimitemailcomanda(var1,var2){
  var trimitemailcomanda=new XMLHttpRequest();
  trimitemailcomanda.open("GET","trimitemailcomanda.php?id="+var1+"&status="+var2,false);
  trimitemailcomanda.send(null);
  document.getElementById("refreshcomenzi").innerHTML=trimitemailcomanda.responseText;
}
function trimitemailcomanda2(var1,var2){
  var text=var1+"&status="+var2;
  if (var2==2) {
    text += "&motiv="+document.getElementById("motivanulare").value;
  }
  var trimitemailcomanda2=new XMLHttpRequest();
  trimitemailcomanda2.open("GET","trimitemailcomanda2.php?id="+text,false);
  trimitemailcomanda2.send(null);
  document.getElementById("refreshcomenzi").innerHTML=trimitemailcomanda2.responseText;
}
