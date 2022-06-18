<?php
session_start();
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
$niveau = 4;
include '../../sources/securisation/securiter.php';
$idControle = new Controles();
if (($_SERVER['REQUEST_METHOD'] === 'POST') && ($idControle->controleId($_SESSION['connexionToken']) == 1)) {
  $ok = array();
  array_push($ok, champsVide($_POST));
  $idNav = filter($_POST['idNav']);
  array_pop($_POST);
  // Contrôle longueur des champs
  if($ok = [0]) {
    $sql = "SELECT `routageToken` FROM `targetRCUD` WHERE `routageToken` = :routageToken";
    $preparation = ':routageToken';
      $valeur = IntToken (12);
      $a = $idControle->doublon($sql, $preparation , $valeur);
    if($a == 1) {
      header('location:../../index.php?message=Erreur de traitement interne.');
    } else {
      $_POST['routageToken'] = $valeur;
      $parametre = new Preparation();
      $param = $parametre->creationPrep ($_POST);
      $insert = "INSERT INTO `targetRCUD`( `chemin`, `securite`, `routageToken`) VALUES (:chemin, :securite, :routageToken)";
      print_r($param);
      $action = new RCUD($insert, $param);
      $action->CUD();
      header('location:../../index.php?idNav='.$idNav.'&message=Traitement effecté');
    }
  } else {
    header('location:../../index.php?message=Au moins un champs est vide.');
  }

} else {
    header('location:../../index.php?message=Il y a comme un lézard numérique.');
}
