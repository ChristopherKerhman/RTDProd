<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
$mySeance = new PrintEvenement();
$idSeance = $mySeance->getMySeance($_SESSION['idUser']);
echo '<h3 class="titrePage">Les séances aux quelles vous êtes inscrit</h3>';
$mySeance->GestionEvenement($idSeance, $_SESSION['idUser']);
