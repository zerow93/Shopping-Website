function trimitecomanda(){
  var trimite=new XMLHttpRequest();
  trimite.open("GET","trimitecomanda.php?radio1="+document.getElementById("metodalivrare1").checked+"&radio2="+document.getElementById("metodalivrare2").checked+"&mesaj="+document.getElementById("mesaj").value,false);
  trimite.send(null);
  if (trimite.responseText === "0"){
    document.getElementById("eroare").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Te rog bifeaza una dintre Metodele de livrare.</div>";
  }else{
    if (trimite.responseText === "1"){
      document.getElementById("eroare").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>Nu ai niciun produs in cos! Te rog sa-ti revizuiesti cosul de cumparaturi.</div>";
    }else{
      if (trimite.responseText === "2"){
        document.getElementById("eroare").innerHTML="<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button>S-a produs o eroare in data de baze. Ne cerem scuze. Te rugam sa ne contactezi telefonic.</div>";
      }else{
        document.getElementById("cumparaflex").innerHTML=trimite.responseText;
        refreshcos()
      }
    }
  }
}
