<?php
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ok = array();
  array_push($ok, champsVide($_POST));
  // Triple identification
  $tripleV= new Controles();
  array_push($ok, $tripleV->tripleCriteres($_POST));
  if($ok == [0, 1]) {
      $_POST['mdp'] = haschage(filter($_POST['mdp']));
      $parametre = new Preparation();
      $param = $parametre->creationPrep($_POST);
      $update = "UPDATE `users` SET `mdp`= :mdp WHERE `email` = :email AND `numeroAdherant` = :numeroAdherant AND `token`=:token";
      $action = new RCUD($update, $param);
      $action->CUD();
      header('location:../../index.php?message=Mot de passe mise à jour.');
  } else {
        header('location:../../index.php?message=Erreur.');
  }
} else {
    header('location:../../index.php?message=Il y a comme un lézard numérique.');
}
 ?>
