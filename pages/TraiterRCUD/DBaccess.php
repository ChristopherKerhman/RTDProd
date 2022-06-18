<?php
session_start();
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
$route = filter($_GET['route']);
$dataRoutage = getSecuriter($route);
$niveau = $dataRoutage[0]['securite'];
include '../../sources/securisation/securiter.php';
$idControle = new Controles();
if (($_SERVER['REQUEST_METHOD'] === 'POST') && ($idControle->controleId($_SESSION['connexionToken']) == 1)) {
  // Contrôle systèmatique
  $ok = array();
  array_push($ok, champsVide($_POST));
  // Fin contrôle systématique
  if($ok == [0]) {
      include '../../'.$dataRoutage[0]['chemin'];
  } else {
      header('location:../../index.php?message=Un champs est vide');
  }
} else {
  header('location:../../index.php?message=Erreur de traitement');
}
