$(function(){
 $("#login2 input").keypress(function (e) {
    if (e.keyCode == 13) {
      logincheck();
      event.preventDefault();
      return false;
    }
 });
});

$("#srchFld").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#submitButton").click();
    }
});
