function schimba_judet(){
  var judet=new XMLHttpRequest();
  judet.open("GET","ajax.php?judet="+document.getElementById("judett").value,false);
  judet.send(null);
  document.getElementById("orasdd").innerHTML=judet.responseText;
}

function schimba_judet2(){
  var judet=new XMLHttpRequest();
  judet.open("GET","ajax2.php?judet="+document.getElementById("ijudet").value,false);
  judet.send(null);
  document.getElementById("ioras").innerHTML=judet.responseText;
}
