<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active">Formular recuperare parola</li>
  </ul>
<h3> Ti-ai uitat parola?</h3>
<div class="well">
<div id="continutforgot" class="control-group">
<form class="form-horizontal" action="forgot.php" method="post" autocomplete="off">
  <h4>Te rugam introdu adresa de e-mail</h4>
  <hr/>
  <div class="control-group">
  <label class="control-label">E-mail</label>
  <div class="controls">
    <input type="text" id="mailforgot" name="forgotmail" placeholder="e-mail">
  </div>
  </div>

  <div id="checkforgot">
  </div>

  <div class="control-group">
      <div class="controls">
        <button type="button" class="btn btn-success" name="ForgotBut" onclick="checkerrorforgot()">Trimite mail recuperare</button>
      </div>
    </div>

</form>
</div>
</div>
</div>
