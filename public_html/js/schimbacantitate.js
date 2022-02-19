function actualizeaza(var1, var2){
    var refreshed=new XMLHttpRequest();
    refreshed.open("GET","refreshcantitate.php?field="+var1+"&cant="+var2,false);
    refreshed.send(null);
    document.getElementById("detaliicos").innerHTML=refreshed.responseText;

    var refreshedcos=new XMLHttpRequest();
    refreshedcos.open("GET","refreshcantitate2.php?field="+var1+"&cant="+var2,false);
    refreshedcos.send(null);
    document.getElementById("refreshcoss").innerHTML=refreshedcos.responseText;
}
