function adaugacos(var1, var2){
  if (var2 > 0) {
    var text = var1 + "&cateselectare=" + var2;
    for (i = 0; i < var2; i++) {
      text += "&" + "select" + i + "=" + document.getElementById("Select"+i).value;
    }
    var cos=new XMLHttpRequest();
    cos.open("GET","trimiteprodusecos.php?idproduscos="+text,false);
    cos.send(null);
    document.getElementById("detaliicos").innerHTML=cos.responseText;
  } else {
    var cos=new XMLHttpRequest();
    cos.open("GET","trimiteprodusecos.php?idproduscos="+var1,false);
    cos.send(null);
    document.getElementById("detaliicos").innerHTML=cos.responseText;
  }
}

function stergeprodus(var1,var2){
  var cos=new XMLHttpRequest();
  cos.open("GET","stergeproduscos.php?idproduscos="+var1+"&complement="+var2,false);
  cos.send(null);
  document.getElementById("detaliicos").innerHTML=cos.responseText;
}

function schimbaid(var2,var1){
  var schid=new XMLHttpRequest();
  schid.open("GET","schimbaid.php?careselect="+var1+"&valoarenoua="+document.getElementById("Select"+var1).value+"&idprodus="+var2,false);
  schid.send(null);
  document.getElementById("schimbator"+var2+"select"+var1).innerHTML=schid.responseText;
}

function adaugacoscomanda(var0, var1, var2){
  if (var2 > 0) {
    var text = var1 + "&cateselectare=" + var2;
    for (i = 0; i < var2; i++) {
      text += "&select" + i + "=" + document.getElementById("Select"+i).value;
    }
    text += "&cantitate="+document.getElementById("quantity_wanted").value;
    var adaugacoscomanda=new XMLHttpRequest();
    adaugacoscomanda.open("GET","trimiteprodusecomanda.php?idcomanda="+var0+"&idprodus="+text,false);
    adaugacoscomanda.send(null);
    document.getElementById("debugare").innerHTML=adaugacoscomanda.responseText;
    setTimeout(function() {
      document.getElementById("debugare").innerHTML="";
    }, 1000);
  } else {
    var adaugacoscomanda=new XMLHttpRequest();
    adaugacoscomanda.open("GET","trimiteprodusecomanda.php?idcomanda="+var0+"&idprodus="+var1+"&cantitate="+document.getElementById("quantity_wanted").value,false);
    adaugacoscomanda.send(null);
    document.getElementById("debugare").innerHTML=adaugacoscomanda.responseText;
    setTimeout(function() {
      document.getElementById("debugare").innerHTML="";
    }, 1000);
  }
}
