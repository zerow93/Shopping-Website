<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
   <div id="login2" class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

   <div id="loginsuccess">
   <h3>Introdu adresa de e-mail si parola</h3>
   <div class="modal-body">

   <form action="index.php" method="post" autocomplete="off" class="form-horizontal loginFrm">
     <div class="control-group">
     <input type="text" id="emaillogin" name="email" placeholder="e-mail" autofocus="true">
     </div>
     <div class="control-group">
     <input type="password" id="pass" name="parola" placeholder="parola">
     </div>
     <div class="control-group">
     <label class="checkbox">
     <input type="checkbox"> Tine-ma minte
     </label>
     </div>

     <div class="control-group" id="loginerror">
     </div>

   <button type="button" class="btn btn-success" name="Logare" onclick="logincheck()">Logheaza-te</button>
   <button class="btn" data-dismiss="modal" aria-hidden="true">Inchide</button>
   <a href="forgot.php" class="btn-small">Ti-ai uitat parola?</a>
   </form>
 </div>
 </div>
</div>
</div>
