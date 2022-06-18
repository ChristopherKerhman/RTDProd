<?php

$titre = filter($_POST['titre']);
$texte = filter($_POST['texteEvenement']);
array_push($ok, sizePost($titre, 60));
array_push($ok, sizePost($texte, 255));
//Time controle ?
if(filter($_POST['dateEvenement']< date('Y-m-d'))) {
  array_push($ok, 1);
} else {
  array_push($ok, 0);
}
$selectIDListe = "SELECT `idTypeE` FROM `typeE` WHERE `valide` = 1";
$valeur = filter($_POST['typeEvenement']);
array_push($ok, $idControle->SelectDynamique($selectIDListe, $valeur));
$select = 'SELECT `idLieux` FROM `lieuxSceances` WHERE  (`proprietaire` = 0 OR `proprietaire` = '.$_SESSION['idUser'].') AND `valideLieu` = 1';
$valeur = filter($_POST['lieu']);
array_push($ok, $idControle->SelectDynamique($select, $valeur));
array_push($ok, borneSelect($_POST['nombre'], 12));
// Concatenation des contrôle
if($ok == [0, 0, 0, 0, 0, 0, 0]) {
  // Création de l'événement
  $parametre = new Preparation();
  $param = $parametre->creationPrepIdUser ($_POST);
  $insert = "UPDATE `evenements` SET `titre`=:titre, `dateEvenement`=:dateEvenement,`heure`=:heure, `texteEvenement`=:texteEvenement,
  `typeEvenement`=:typeEvenement,`lieu`=:lieu,`nombre`=:nombre, `archive` = 0 WHERE `idEvenement` = :idEvenement AND `idCreateur` = :idUser";
  print_r($param);
  $action = new RCUD($insert, $param);
  $action->CUD();
  header('location:../../index.php?message=Modification prise en compte.');
} else {
    header('location:../../index.php?message=Un champs est vide ou le titre ou le texte est trop long ou la date est passé.');
}
