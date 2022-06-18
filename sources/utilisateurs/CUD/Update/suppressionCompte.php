<?php

    $ok = champsVide($_POST);
    if($ok == 0) {
    $idNav = filter($_POST['idNav']);
    array_pop($_POST);
    $preparation = new Preparation ();
    $param = $preparation->creationPrep($_POST);
      $insertSQL = "UPDATE `users` SET `valide` = :valide WHERE `idUser` = :idUser;
      UPDATE `lieuxSceances` SET `valideLieu` = 0 WHERE `proprietaire` = :idUser";
    $action = new RCUD($insertSQL, $param);
    $action->CUD();
  // A activé quand le site sera en ligne
  header('location:../../index.php?idNav='.$idNav.'&message=Compte supprimer et inactif.');
  } else {
      header('location:../../index.php?message=Un champs vide.');
  }
