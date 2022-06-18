<?php
$niveau = 4;
include 'sources/securisation/securiter.php';
require 'sources/tresorie/objets/getCompta.php';
require 'sources/tresorie/objets/printCompta.php';
$dataExercice = new PrintCompta();
$dataExo = $dataExercice->exercice();
 ?>
<h3 class="titrePage">Comptabilité de l'association</h3>
<form class="flex-colonne"  action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="anneeExercice">Année de l'exercice</label>
  <select id="anneeExercice" name="anneeExercice">
    <?php
      foreach ($dataExo as $key => $value) {
        echo '<option value="'.$value['anneeExercice'].'">
        '.$value['anneeExercice'].'
        </option>';
      }
     ?>
  </select>
    <button type="submit" class="buttonForm">Afficher</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dataCompta = $dataExercice->compta(filter($_POST['anneeExercice']));
  $dataBlackCompta = $dataExercice->blackCompta(filter($_POST['anneeExercice']));
  $balance = $dataExercice->bilan(filter($_POST['anneeExercice']));
  $dataExercice->printCompte($dataCompta);
  $dataExercice->balanceComptable($balance);
  echo '<h3 class="titrePage">Actes comptable effacé</h3>';
  $dataExercice->printActeDel($dataBlackCompta);
}
  ?>
<?php
$sql ="SELECT `clotureCompta` FROM `dataSite` WHERE `idDataSite` = 1";
$void = [];
$cloture = new RCUD($sql,$void);
$dataCloture = $cloture->READ();
 ?>

  <form class="flex-colonne" action="<?php echo encodeRoutage(6); ?>" method="post">
    <?php if($dataCloture[0]['clotureCompta'] == 0) { ?>
      <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Ouvrir la cloture</button>
    <?php  } else { ?>
      <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Fermer la cloture</button>
    <?php } ?>


  </form>
