<!DOCTYPE html>
<?php
require 'conectarebazadate.php';
session_start();
?>

<!-- TITLU+STILURI====================================================================== -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sport Extrem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="callCss" rel="stylesheet" href="css/principal.css" media="screen"/>
    <link href="css/baza.css" rel="stylesheet" media="screen"/>
	<link href="css/animatie.css" rel="stylesheet"/>
	<link href="css/font/font.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="theme/img/iconofficial.ico">
	<style type="text/css" id="enject"></style>
</head>
<body>
<!-- TITLU+STILURI FINAL====================================================================== -->


<!-- HEADER ====================================================================== -->
<?php require 'header.php'; ?>
<!-- HEADER FINAL====================================================================== -->




<!-- CARUSEL====================================================================== -->
<?php require 'carousel.php'; ?>
<!-- CARUSEL FINAL====================================================================== -->



<div id="mainBody">
	<div class="container">
	<div class="row">




<!-- MENIU STANGA DROPDOWN ================================================== -->
<?php require 'dropdownleft.php'; ?>
<!-- MENIU STANGA DROPDOWN END =============================================== -->




<!-- CONTINUT=============================================== -->

<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.php">Pagina principala</a> <span class="divider">/</span></li>
  <li class="active"> Termeni si conditii</li>
  </ul>
  <h2>Termeni si conditii</h2>
  <p>Accesarea, vizitarea, folosirea sau cumpararea produselor prezentate pe site-ul <?php echo $site; ?> implica acceptarea termenilor si conditiilor mai jos enumerati. Pentru a fi informat despre toate conditiile de utilizare ale acestui site, va rugam sa
    parcurgeti toate sectiunile urmatoare. <?php echo $site; ?> isi rezerva dreptul de a face modificari si actualizari ale acestor termeni si conditii, precum si ale ofertei, fara o notificare prealabila si fara precizarea motivelor.</p>

  <p><?php echo $site; ?> isi rezerva dreptul de a corecta eventuale omisiuni si erori in afisare care pot surveni in urma unor greseli de dactilografiere, sau erori ale produselor software utilizate pentru functionarea site-ului. Va rugam sa cititi cu
    atentie termenii si conditiile, de fiecare data cand folositi acest site. Continuarea folosirii site-ului implica acceptarea modificarilor efectuate.</p>

  <p><?php echo $site; ?> este operat de <?php echo $firma; ?> si este aparat de legea pentru protectia drepturilor de autor. Folosirea fara acordul scris al <?php echo $firma; ?> a oricaror elemente regasite in site, chiar daca aceste elemente
    poarta marcaje de protectie, atrage dupa sine consecintele prevazute de legislatia in vigoare.</p>

  <p>Efectuarea unei comenzi pe site-ul www.<?php echo $site; ?> reprezinta acordul dumneavoastra cu termenii si conditiile de mai jos.</p>

  <p>O data lansata comanda online cumparatorul este de acord cu forma de comunicare ulterioara (telefonic sau electronic) precum si cu modul de operare al vanzatorului.&nbsp;</p>

  <p>Orice comanda confirmata implica vanzatorul si consumatorul persoana fizica intr-un contract la distanţă.</p>

  <p>Contractul de furnizare de produse sau servicii încheiat între <?php echo $firma; ?>, in calitate de vanzator şi un consumator - cumparator, în cadrul prezentului sistem de vânzare organizat de către <?php echo $firma; ?>,&nbsp;
    utilizand în mod exclusiv, înainte şi la încheierea acestui contract, tehnica de comunicaţie la distanţă cuprinsa in magazinul virtual;</p>

  <p>Momentul încheierii contractului la distanţă cu persoana fizica, respectiv, al incheierii contractului de vanzare cu persoana juridica, îl constituie momentul primirii mesajului de confirmare de către consumator, referitor la comanda sa.</p>

  <p>Vanzatorul pune la dispozitia cumparatorului, in mod gratuit, informatii profesionale cu privire la produsele si serviciile sale pentru a atinge finalitatea mentionata in comanda online.</p>

  <p>Continutul publicat in magazinul virtual <?php echo $site; ?> are caracter orientativ si sunt&nbsp; informatii despre produsele comercializate de acesta cat si alte date considerate de <?php echo $site; ?> ca fiind de interes pentru CUMPARATORI.</p>

  <p>La solicitarea si cu acordul consumatorului, &nbsp;<?php echo $firma; ?>&nbsp;poate recomanda cumparatorului achizitionarea altui produs de o calitate şi la un preţ echivalente cu cele solicitate in prima comanda. Comanda initiala se considera anulata la data
    confirmarii comenzii produsului/produselor ce inlocuiesc produsul initial.</p>

  <p><?php echo $firma; ?>&nbsp;nu poate fi facut responsabil pentru prejudiciile create de informatiile publicate in magazinul virtual din erori ce nu-i apartin.</p>

  <p><?php echo $firma; ?>&nbsp;isi rezerva dreptul de a completa si/sau modifica orice informatie din magazinul virtual fara a anunta in prealabil utilizatorii site-ului.</p>

  <p>Vanzatorul isi rezerva dreptul a folosi informatiile furnizate de catre cumparator in vederea realizarii contractului la distanta. &nbsp;De asemenea cumparatorul nu va face publice niciunei terte parti nicio informatie cu privire la comanda fara acordul
     scris al Vanzatorului.</p>

  <p><?php echo $firma; ?> nu raspunde pentru prejudiciile create, din cauze ce exclud culpa sa,&nbsp; de nefunctionarea magazinului virtual precum si pentru cele rezultand din imposibilitatea accesarii paginilor magazinului virtual (ex. defectiuni la reteaua de internet).</p>

  <p>Vanzatorul isi asuma responsabilitatea livrarii produselor comandate de cumparator. </p>

  <p>In cazul platii prin OP sau card, cumparatorul va intra in proprietatea marfii dupa confirmarea platii.&nbsp;</p>

  <p>In cazul livrarii bunurilor prin curier, cu plata ramburs, cumparatorul va intra in proprietatea marfii si va avea dreptul sa deschida coletul dupa semnarea documentului de transport si efectuarea platii.</p>

  <p>Termenul maxim de livrare a produselor este de 30 de zile.</p>

  <p>Forta majora, (eveniment imprevizibil, incontrolabil si inevitabil ce afecteaza derularea contractului), exonereaza de raspundere partea care o invoca.</p>

  <p></p><p><strong>Politica de Retur</strong></p>

  <p>Conform OUG 34/2014 privind drepturile consumatorilor in cadrul contractelor incheiate cu profesionistii, consumatorul benficiaza de 14 zile pentru a se retrage (perioada de retragere) din contract fara a fi nevoit sa justifice decizia de retragere
    si fara a suporta alte costuri decat costurile suplimentare.</p>

  <p>Termenul de 14 zile intra in vigoare in momentul in care consumatorul intra in posesia fizica a produselor. Consumatorul va trebui sa suporte costul aferent returnarii produselor in caz de retragere. Costurile suplimentare reprezinta orice costuri
    (transport, livrare, diminuare a valorii produselor care rezulta din manipulari, altele decat cele necesare pentru determinarea naturii calitatilor si functionarii produselor, taxe postale sau de orice alta natura) care urmeaza a fi suportate de
    consumator cu ocazia exercitarii dreptului de retragere.</p>

  <p></p><p><strong>Politica prelucrarii datelor cu caracter personal</strong></p>

  <p>In conformitate cu dispozitiile Legii nr. 677/2001 pentru protectia persoanelor cu privire la prelucrarea datelor cu caracter personal si libera circulatie a acestor date si ale Legii nr. 506/2004 privind prelucrarea datelor cu caracter personal si
    protectia vietii private, <?php echo $firma; ?>&nbsp;are obligatia de a administra in conditii de siguranta si numai pentru scopurile prezentate mai jos, datele personale care ii sunt furnizate.&nbsp;<?php echo $firma; ?>&nbsp;se obliga sa pastreze confidentialitatea datelor
    personale furnizate prin intermediul site-ului <?php echo $site; ?>, asa cum prevad dispozitiile legii 677/2001 cu modificarile ulterioare privind protectia datelor personale.</p>

  <p>In conformitate cu dispozitiile Legii nr. 677/2001, persoanele inregistrate, in caliatate de persoane vizate, au urmatoarele drepturi:<br />- Dreptul la informare (art.12): dreptul de a obtine de la <?php echo $firma; ?>, la cerere si in mod gratuit, confirmarea
     faptului ca datele care o privesc sunt sau nu prelucrate;<br />- Dreptul de acces la date cu caracter personal (art.13): dreptul de a obtine de la <?php echo $firma; ?>, la cerere si in mod gratuit rectificarea sau actualizarea in special a datelor incomplete
      sau inexacte, pe baza actelor doveditoare;<br />- Dreptul de interventie asupra datelor cu caracter personal (art.14): dreptul de a obtine, la cerere si in mod gratuit transformarea in date anonime a datelor a caror prelucrare nu este conforma cu
       Legea nr. 677/2001;<br />- Dreptul de opozitie (art.15): dreptul de a se opune in orice moment, din motive intemeiate si legitime, ca datele care o vizeaza sa faca obiectul unei prelucrari, cu exceptia cazurilor in care exista dispozitii legale
        contrare;<br />- Dreptul de a nu fi supus unei decizii individuale (art.17)<br />- Dreptul de a se adresa justitiei (art.18): dreptul de a va adresa justitiei pentru apararea oricaror drepturi garantate de prezenta lege, care au fost incalcate.</p>

  <p>Orice informatie furnizata de catre dumneavoastra va fi considerata si va reprezenta consimtamintul dumneavoastra expres ca datele dumneavoastra personale sa fie folosite in conformitate cu scopurile mentionate mai jos. Daca doriti ca datele
     dumneavoastra personale sa fie actualizate sau scoase din baza de date, ori aveti intrebari legate de confidentialitatea datelor, ne puteti contacta / notifica oricand utilizand datele de contact existente pe site.</p>

  <p>Daca nu doriti ca datele dumneavoastra sa fie colectate, va rugam sa nu ni le furnizati.<br />De asemenea, pentru a reclama nerespectarea drepturilor garantate de Legea nr. 677/2001 persoana vizata se poate adresa Autoritatii Nationale de Supraveghere
     a Prelucrarii Datelor cu Caracter Personal sau/si instantelor de judecata.</p>

  <p><?php echo $firma; ?>&nbsp;prelucreaza datele cu caracter personal care ii sunt furnizate, in vederea promovarii actiunilor si proiectelor sale. Datele cu caracter personal (date de identitate, adresa, cod numeric personal, numar de telefon, varsta sau orice alte
     asemenea date care au fost furnizate) pot fi prelucrate si utilizate doar in scopuri de promovare.</p>

  <p><?php echo $firma; ?>&nbsp;nu va dezvalui unei terte parti niciuna dintre datele dumneavoastra (informatii personale sau informatii optionale) fara acordul dumneavoastra, cu exceptia cazului in care avem convingerea, de buna credinta, ca legislatia ne
    impune acest lucru sau ca acest lucru este necesar pentru protejarea drepturilor sau a proprietatii societatii noastre.</p>

  <p>Relatiile contractuale dintre parti sunt guvernate de legea romana. Orice litigiu care nu poate fi rezolvat pe cale amiabila va fi trimis spre solutionare instantelor competente.</p>
</div>

<!-- CONTINUT FINAL=============================================== -->

</div>
</div>
</div>

<!-- Footer ================================================================== -->

<?php require 'footer.php'; ?>

<!-- Footer END ================================================================== -->
<!-- JS ============================================= -->
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
	<script src="js/bootshop.js"></script>
  <script src="js/jquery.lightbox-0.5.js"></script>

  <script src="js/logincheck.js"></script>
  <script src="js/whenpressenter.js"></script>
  <script src="js/adaugacos.js"></script>
<!-- JS END ============================================= -->
</body>
</html>
