<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active">Formular inregistrare</li>
  </ul>
<h3> Inregistrare</h3>
<div class="well">
<div id="continutid" class="control-group">
<form class="form-horizontal" action="Inregistrare.php" method="post" autocomplete="off">
  <h4>Informatii personale</h4>
  <div class="control-group">
  <label class="control-label">Titlu</label>
  <div class="controls">
  <select class="span1" name="Titlul">
    <option value="">-</option>
    <option value="1">Dl.</option>
    <option value="2">Dna.</option>
  </select>
  </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFname1">Nume <sup>*</sup></label>
    <div class="controls">
      <input type="text" id="nume" name="numereg" placeholder="Nume">
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="inputLnam">Prenume <sup>*</sup></label>
    <div class="controls">
      <input type="text" id="prenume" name="prenumereg" placeholder="Prenume">
    </div>
   </div>
  <div class="control-group">
  <label class="control-label" for="input_email">Email <sup>*</sup></label>
  <div class="controls">
    <input type="text" id="email" name="emailreg" placeholder="Email">
  </div>
  </div>
<div class="control-group">
  <label class="control-label" for="inputPassword1">Parola <sup>*</sup></label>
  <div class="controls">
    <input type="password" id="pass1" name="parolareg1" placeholder="Parola">
  </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputPassword1">Repeta parola <sup>*</sup></label>
    <div class="controls">
      <input type="password" id="pass2" name="parolareg2" placeholder="Repeta parola">
    </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="nrtell">Numar telefon<sup>*</sup></label>
      <div class="controls">
        <input type="text" id="nrtel" name="nrtelreg" placeholder="Numar Telefon"/>
      </div>
    </div>

  <div class="control-group">
  <label class="control-label">Data nasterii <sup>*</sup></label>
  <div class="controls">
    <select id="ziua" class="span1" name="ziuareg">
      <option value="">ziua</option>
        <option value="01">1&nbsp;&nbsp;</option>
        <option value="02">2&nbsp;&nbsp;</option>
        <option value="03">3&nbsp;&nbsp;</option>
        <option value="04">4&nbsp;&nbsp;</option>
        <option value="05">5&nbsp;&nbsp;</option>
        <option value="06">6&nbsp;&nbsp;</option>
        <option value="07">7&nbsp;&nbsp;</option>
        <option value="08">8&nbsp;&nbsp;</option>
        <option value="09">9&nbsp;&nbsp;</option>
        <option value="10">10&nbsp;&nbsp;</option>
        <option value="11">11&nbsp;&nbsp;</option>
        <option value="12">12&nbsp;&nbsp;</option>
        <option value="13">13&nbsp;&nbsp;</option>
        <option value="14">14&nbsp;&nbsp;</option>
        <option value="15">15&nbsp;&nbsp;</option>
        <option value="16">16&nbsp;&nbsp;</option>
        <option value="17">17&nbsp;&nbsp;</option>
        <option value="18">18&nbsp;&nbsp;</option>
        <option value="19">19&nbsp;&nbsp;</option>
        <option value="20">20&nbsp;&nbsp;</option>
        <option value="21">21&nbsp;&nbsp;</option>
        <option value="22">22&nbsp;&nbsp;</option>
        <option value="23">23&nbsp;&nbsp;</option>
        <option value="24">24&nbsp;&nbsp;</option>
        <option value="25">25&nbsp;&nbsp;</option>
        <option value="26">26&nbsp;&nbsp;</option>
        <option value="27">27&nbsp;&nbsp;</option>
        <option value="28">28&nbsp;&nbsp;</option>
        <option value="29">29&nbsp;&nbsp;</option>
        <option value="30">30&nbsp;&nbsp;</option>
        <option value="31">31&nbsp;&nbsp;</option>
    </select>
    <select id="luna" class="" name="lunareg">
        <option value="">luna</option>
        <option value="01">ianuarie&nbsp;&nbsp;</option>
        <option value="02">februarie&nbsp;&nbsp;</option>
        <option value="03">martie&nbsp;&nbsp;</option>
        <option value="04">aprilie&nbsp;&nbsp;</option>
        <option value="05">mai&nbsp;&nbsp;</option>
        <option value="06">iunie&nbsp;&nbsp;</option>
        <option value="07">iulie&nbsp;&nbsp;</option>
        <option value="08">august&nbsp;&nbsp;</option>
        <option value="09">septembrie&nbsp;&nbsp;</option>
        <option value="10">octombrie&nbsp;&nbsp;</option>
        <option value="11">noiembrie&nbsp;&nbsp;</option>
        <option value="12">decembrie&nbsp;&nbsp;</option>
    </select>
    <select id="anul" class="span1" name="anulreg">
      <option value="">anul</option>
      <option value="2000">2000</option>
      <option value="1999">1999</option>
      <option value="1998">1998</option>
      <option value="1997">1997</option>
      <option value="1996">1996</option>
      <option value="1995">1995</option>
      <option value="1994">1994</option>
      <option value="1993">1993</option>
      <option value="1992">1992</option>
      <option value="1991">1991</option>
      <option value="1990">1990</option>
      <option value="1989">1989</option>
      <option value="1988">1988</option>
      <option value="1987">1987</option>
      <option value="1986">1986</option>
      <option value="1985">1985</option>
      <option value="1984">1984</option>
      <option value="1983">1983</option>
      <option value="1982">1982</option>
      <option value="1981">1981</option>
      <option value="1980">1980</option>
      <option value="1979">1979</option>
      <option value="1978">1978</option>
      <option value="1977">1977</option>
      <option value="1976">1976</option>
      <option value="1975">1975</option>
      <option value="1974">1974</option>
      <option value="1973">1973</option>
      <option value="1972">1972</option>
      <option value="1971">1971</option>
      <option value="1970">1970</option>
      <option value="1969">1969</option>
      <option value="1968">1968</option>
      <option value="1967">1967</option>
      <option value="1966">1966</option>
      <option value="1965">1965</option>
      <option value="1964">1964</option>
      <option value="1963">1963</option>
      <option value="1962">1962</option>
      <option value="1961">1961</option>
      <option value="1960">1960</option>
      <option value="1959">1959</option>
      <option value="1958">1958</option>
      <option value="1957">1957</option>
      <option value="1956">1956</option>
      <option value="1955">1955</option>
      <option value="1954">1954</option>
      <option value="1953">1953</option>
      <option value="1952">1952</option>
      <option value="1951">1951</option>
      <option value="1950">1950</option>
    </select>
  </div>
  </div>

  <div id="checkreg">
  </div>

  <h4>Adresa ta</h4>

  <div class="control-group">
    <label class="control-label" for="judet">Judet<sup>*</sup></label>
    <div class="controls">
      <select onchange="schimba_judet()" class="" id="judett" name="judetreg">
        <option value="">Alege judetul</option>
        <?php require 'judet.php'; ?>
      </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="oras">Oras/Sat<sup>*</sup></label>
    <div id="orasdd" class="controls">
    <select id="oras" class="" name="orasreg">
      <option value="">Alege Localitatea</option>
    </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="adresa">Adresa<sup>*</sup></label>
    <div class="controls">
      <input id="adresa" type="text" name="adresareg" placeholder="Adresa"/>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="codpostalreg">Cod Postal</label>
    <div class="controls">
      <input id="postcode" type="text" name="postcodereg" placeholder="Cod Postal"/>
    </div>
  </div>

<p><sup>*</sup>Completare necesara!	</p>

<div class="control-group">
    <div class="controls">
      <input type="hidden" name="email_create" value="1">
      <input type="hidden" name="is_new_customer" value="1">
      <button type="button" class="btn btn-large btn-success" name="Inregistrarebut" onclick="checkerrorsreg()">Inregistrare</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
