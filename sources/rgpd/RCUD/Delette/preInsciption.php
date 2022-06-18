<?php
include '../../../../objets/objetsGeneraux.php';
include '../../../../functions/fonctionsDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ok = champsVide($_POST);
  $parametre = new Preparation();
  $param = $parametre->creationPrep($_POST);
  $select = "SELECT `idUser`FROM `users` WHERE `valide` = 0 AND `role` = 0 AND `numeroAdherant` = :numeroAdherant";
  $readIdUser = new RCUD($select, $param);
  $idUser = $readIdUser->READ();
  if($idUser != []) {
    $delete = "DELETE FROM `users` WHERE `numeroAdherant` = :numeroAdherant AND `role`= 0 AND `valide` = 0";
    $action = new RCUD($delete, $param);
    $action->CUD();
    header('location:../../../../index.php?message=Votre pré-inscription a définitivement disparu.');
  } else {
      header('location:../../../../index.php?message=Erreur de traitement.');
  }
} else {
  header('location:../../../../index.php?message=Il y a comme un lézard numérique.');
}

 ?>
