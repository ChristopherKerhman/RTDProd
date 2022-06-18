<?php
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';

$listeType = new PrintEvenement();
$valide = 1;
$archive = 0;
$dataTraiter = $listeType->getAllSeance($valide, $archive);
if(isset($_SESSION['login'])) {
  $listeType->blocEvenement($dataTraiter);
} else {
  $listeType->blocEvenementPublic($dataTraiter);
}
