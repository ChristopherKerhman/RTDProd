<?php
$niveau = 3;
include 'sources/securisation/securiter.php';
//Objet lier à user
require 'sources/utilisateurs/objets/getUser.php';
require 'sources/utilisateurs/objets/printUser.php';
$traitement = new PrintUser();
$dataTraiter = $traitement->listeUser(0, 0);
echo '<h3 class="titrePage">Les préinsciptions</h3>';
echo '<h3 id="message">Tourner votre portable</h3>';
$traitement->printPreInscrit($dataTraiter, $idNav);
