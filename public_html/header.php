<div id="header">
<div class="container">
<div id="logoArea" class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="theme/img/logosportextrem.png" alt="SportExtrem"/></a>
		<form class="form-inline navbar-search" method="get" action="produse.php">
		<input id="srchFld" name="search" class="srchTxt" type="text" />
		  <select name="what" class="srchTxt">
			<option value="0">Toate</option>
			<option value="2">Moto</option>
			<option value="3">Biciclete</option>
			<option value="1">Sport</option>
		</select>
		  <button type="submit" id="submitButton" class="btn btn-primary">Cauta</button>
    </form>
    <ul id="topMenu" class="nav pull-right">

      <div class="nav pull-right afisaremeniu">
        <li class=""><a href="cos.php"><img src="theme/img/carut.png"> Cosul Meu</a></li>
        <div class="afisareiteme cumvreaueu ellipsis">
          <ul>
            <ul id="detaliicos" class="unstyled">
								<?php require 'refreshcos.php'; ?>
            </ul>
        </ul>
        </div>
      </div>

      <div class="nav pull-right afisaremeniu">
        <li class=""><a href="contulmeu.php"><img src="theme/img/cont.png">Contul Meu</a></li>
        <div class="afisareiteme">
          <ul>
          <?php require 'headercheck.php' ?>
        </ul>
        </div>
      </div>

    </ul>
    <?php require 'loginform.php'; ?>
  </div>
</div>
</div>
</div>
