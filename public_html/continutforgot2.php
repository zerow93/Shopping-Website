<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active">Formular resetare parola</li>
  </ul>
<h3> Reseteaza-ti parola</h3>
<div class="well">
<div id="continutforgot2" class="control-group">
<form class="form-horizontal" action="forgot.php" method="post" autocomplete="off">
  <h4>Introdu noua parola:</h4>
  <hr/>

  <div class="control-group">
    <label class="control-label" for="parolaf1">Parola </label>
    <div class="controls">
      <input type="password" id="passf1" name="parolaf1" placeholder="Parola">
    </div>
  </div>

  <div class="control-group">
      <label class="control-label" for="parolaf2">Repeta parola </label>
      <div class="controls">
        <input type="password" id="passf2" name="parolaf2" placeholder="Repeta parola">
      </div>
  </div>

  <div id="checkforgot2">
  </div>

  <div class="control-group">
      <div class="controls">
        <button type="button" class="btn btn-success" name="ForgotBut2" onclick="checkerrorforgot2()">Salveaza noua parola</button>
      </div>
    </div>

</form>
</div>
</div>
</div>
