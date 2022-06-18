<?php
$niveau = 2;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
$listeType = new PrintEvenement();
$dataTraiter = $listeType->listeTypeAdmin(); ?>
<h3 class="titrePage">Ajouter Type d'événement</h3>
<form class="flex-colonne " action="<?php echo encodeRoutage(21); ?>" method="post">
    <label for="type">Nouveau type d'événement</label>
    <input id="type" type="text" name="type" required>
    <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Add nouveau type d'événement</button>
</form>
<h3 class="titrePage">Administrer les types d'événements</h3>
<?php
// Tri des types d'événements existants :
if(empty($dataTraiter)) {
  echo 'Pas encore de type d\'événement enregistré dans la base.';
} else {
  $listeType->AdminPrintType($dataTraiter, $idNav);
  }
