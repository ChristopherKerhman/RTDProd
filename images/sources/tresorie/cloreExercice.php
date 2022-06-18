<?php
$niveau = 3;
include 'sources/securisation/securiter.php';
require 'sources/tresorie/objets/getCompta.php';
require 'sources/tresorie/objets/printCompta.php';
$closeCompta = new PrintCompta();
$dataExo = $closeCompta->exerciceEncours();
$yes = ['Non', 'Oui'];
 ?>
<section>
<h3 class="titrePage">Fermer la comptabilité en cours</h3>
<ul>
  <li>L'année en cours : <?=$dataExo[0]['anneeCour']?></li>
  <li id="messagePrint">Fermer la comptabilité pour l'exercice en cours ? <?=$yes[$dataExo[0]['clotureCompta']]?> </li>
</ul>
<?php
 echo '<h3 id="message">Tourner votre portable</h3>';
  $dataCompta = $closeCompta->compta($dataExo[0]['anneeCour']);
  $balance = $closeCompta->bilan(filter($dataExo[0]['anneeCour']));
    $closeCompta->printCompte($dataCompta);
    $closeCompta->balanceComptable($balance);
 ?>
<?php if($dataExo[0]['clotureCompta'] == 1) {  ?>
  <form class="flex-colonne" action="<?php echo encodeRoutage(17); ?>" method="post">
    <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Clore la comptabilité pour l'exercice <?=$dataExo[0]['anneeCour']?></button>
  </form>
<?php } ?>
</section>
