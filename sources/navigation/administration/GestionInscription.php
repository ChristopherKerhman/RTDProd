<?php

  include '../../sources/navigation/objets/getNav.php';
  $ok = array();
  $idNav = filter($_POST['idNav']);
  array_push($ok, champsVide($_POST));
  // Vérification de l'identité
  $idControle = new Controles();
  array_push($ok, $idControle->controleId($_SESSION['connexionToken']));
  if($ok ==[0, 1]) {
    $statut = new GetNav();
    $dataTraiter = $statut->getStatutInscription ();
    if($dataTraiter[0]['valide'] > 0) {
      $update = "UPDATE `navigation` SET `menuVisible` = 0, `valide` = 0 WHERE `idNav` = 8";
    } else {
      $update = "UPDATE `navigation` SET `menuVisible` = 1, `valide` = 1 WHERE `idNav` = 8";
    }
    $void = [];
    $action = new RCUD($update, $void);
    $action->CUD();
    header('location:../../index.php?idNav='.$idNav.'&message=Action prise en compte.');
  } else {
    //session_destroy();
    //header('location:../../index.php?message=Deconnexion effectuée');
  }
