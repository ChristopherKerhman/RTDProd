<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';
$listeType = new PrintEvenement();
?>
<h3 class="titrePage">Evénement en ligne</h3>
<?php
$valide = 1;
$archive = 0;
$dataTraiter = $listeType->getSeance($_SESSION['idUser'], $valide, $archive);
$listeType->AdminEvenement($dataTraiter, $idNav);
?>
<h3 class="titrePage">Evénement non valide</h3>
<?php
$valide = 0;
$archive = 0;
$dataTraiter = $listeType->getSeance($_SESSION['idUser'], $valide, $archive);
if($dataTraiter == []) {
  echo '<p>Pas encore d\'élements invalide.</p>';
} else {
$listeType->AdminEvenement($dataTraiter, $idNav);
}
?>
<h3 class="titrePage">Evénement passé</h3>
<?php
$valide = 1;
$archive = 1;
$dataTraiter = $listeType->getSeance($_SESSION['idUser'], $valide, $archive);
if($dataTraiter == []) {
  echo '<p>Pas encore d\'élements archivés.</p>';
} else {
$listeType->AdminEvenement($dataTraiter, $idNav);
}

?>
