<?php
session_start();
include '../../../objets/objetsGeneraux.php';
include '../../../functions/fonctionsDB.php';
// Sécurité
$niveau = 4;
include '../../securisation/securiter.php';
// Fin sécurité
$idControle = new Controles();
if (($_SERVER['REQUEST_METHOD'] === 'POST') && ($idControle->controleId($_SESSION['connexionToken']) == 1)) {
// Vérification des champs vide.
  $ok = champsVide($_POST);
  if($ok == 0) {
    $preparation = new Preparation ();
    $param = $preparation->creationPrep($_POST);
    $insertSQL = "DELETE FROM `users` WHERE `numeroAdherant` = :numeroAdherant AND `valide` = 0 AND `role` = 3";
    $action = new RCUD($insertSQL, $param);
    $action->CUD();
  header('location:../../../index.php?&message=Compte supprimer et inactif.');
  } else {
      header('location:../../../index.php?message=Un champs vide.');
  }

} else {
  header('location:../../../index.php?message=Il y a comme un lézard numérique.');
}
