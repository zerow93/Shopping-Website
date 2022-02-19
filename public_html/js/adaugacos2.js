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

  var coss=new XMLHttpRequest();
  coss.open("GET","stergeproduscos2.php?idproduscos="+var1,false);
  coss.send(null);
  document.getElementById("refreshcoss").innerHTML=coss.responseText;
}
