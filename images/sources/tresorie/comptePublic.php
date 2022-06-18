<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
require 'sources/tresorie/objets/getCompta.php';
require 'sources/tresorie/objets/printCompta.php';
$dataExercice = new PrintCompta();
$dataExo = $dataExercice->exercice();
 ?>
<h3 class="titrePage">Comptabilité de l'association</h3>
<?php if($dataExo != []) { ?>
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
<?php } ?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo '<h3 id="message">Tourner votre portable</h3>';
  $dataCompta = $dataExercice->compta (filter($_POST['anneeExercice']));
  $balance = $dataExercice->bilan(filter($_POST['anneeExercice']));
  $dataExercice->printComptePublic($dataCompta);
  $dataExercice->balanceComptable($balance);
}
