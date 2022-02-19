<?php
require 'conectarebazadate.php';
session_start();
 ?>
<h3>1. Adrese</h3>
<hr class="soft"/>

<div id="ajaxed" class="form-horizontal">
<h4>COMANDA RAPIDA</h4>
  <div class="control-group ">
   <label class="control-label">Email</label>
   <div class="controls">
     <input type="text" id="zemail" name="" placeholder="">
   </div>
  </div>

  <div class="control-group">
    <label class="control-label">Nume</label>
    <div class="controls">
      <input type="text" id="znume" name="" placeholder="">
    </div>
   </div>

   <div class="control-group">
    <label class="control-label">Prenume</label>
    <div class="controls">
      <input type="text" id="zprenume" name="" placeholder="">
    </div>
   </div>

   <div class="control-group">
     <label class="control-label" for="judet">Judet</label>
     <div class="controls">
       <select onchange="schimba_judet()" class="" id="judett" name="judetreg">
         <option value="">-</option>
         <?php require 'judet.php'; ?>
       </select>
     </div>
   </div>

   <div class="control-group">
     <label class="control-label" for="oras">Oras/Sat</label>
     <div id="orasdd" class="controls">
     <select id="oras" class="" name="orasreg">
       <option value="">-</option>
     </select>
     </div>
   </div>

   <div class="control-group">
     <label class="control-label">Adresa</label>
     <div class="controls">
       <input id="zadresa" type="text" name="" placeholder=""/>
     </div>
   </div>

   <div class="control-group">
    <label class="control-label">Telefon Mobil</label>
    <div class="controls">
      <input type="text" id="znrtel" name="" placeholder="">
    </div>
   </div>

   <div id="eroare">
   </div>

   <div class="control-group">
    <div class="controls">
      <a class="btn" onclick="metodarapida2()"><i class="icon-arrow-left"></i> Salveaza</a>
    </div>
   </div>
</div>
