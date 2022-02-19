function schimbalista(var1){
  if (var1 == '0') {
      document.getElementById("listviews").classList.add("btn-primary");
      document.getElementById("blockviews").classList.remove("btn-primary");
      document.getElementById("listView").classList.add("active");
      document.getElementById("blockView").classList.remove("active");

      var solutie=new XMLHttpRequest();
      solutie.open("GET","schimbare.php?view="+var1,false);
      solutie.send(null);
  }else{
      document.getElementById("blockviews").classList.add("btn-primary");
      document.getElementById("listviews").classList.remove("btn-primary");
      document.getElementById("blockView").classList.add("active");
      document.getElementById("listView").classList.remove("active");

      var solutie=new XMLHttpRequest();
      solutie.open("GET","schimbare.php?view="+var1,false);
      solutie.send(null);
  }
}
