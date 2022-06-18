<?php
  // Récupération de l'idNav
    $idNav = filter($_POST['idNav']);
    array_pop($_POST);
  // Création de la date du jour
  $_POST['dateCotisation'] = date('Y-m-d');
  // Vérification de l'identité
  $parametre = [['prep' => ':token', 'variable'=>$_SESSION['connexionToken']]];
  $sql ="SELECT `idUser` FROM `users` WHERE `token` = :token";
  $action = new RCUD($sql,$parametre);
  $dataTraiter = $action->READ();
  if ($dataTraiter[0]['idUser'] == $_SESSION['idUser']) {
    //Construction pour le comptabilité
    // Lecture du montant de la cotisation et de l'année d'exercice
    $select = "SELECT `anneeCour`, `cotisation` FROM `dataSite` WHERE `idDataSite` = 1";
    $parametre = [];
    $readDB = new RCUD($select, $parametre);
    $dataCotisation = $readDB->READ();
    $_POST['montant'] = $dataCotisation[0]['cotisation'];
    $_POST['anneeExercice'] = $dataCotisation[0]['anneeCour'];
    $select ="SELECT `nom`, `prenom`, `numeroAdherant` FROM `users` WHERE `idUser` = :idUser";
    $parametre = [['prep'=>':idUser', 'variable'=>filter($_POST['idUser'])]];
    $readDB = new RCUD($select, $parametre);
    $dataID = $readDB->READ();
    $_POST['objet'] = 'Cotisation de '.$dataCotisation[0]['cotisation'].' € pour l\'année '.$dataCotisation[0]['anneeCour'].' de '.$dataID[0]['prenom'].' '.$dataID[0]['nom'].' n°'.$dataID[0]['numeroAdherant'];
    $_POST['montant'] = $dataCotisation[0]['cotisation'];
    $_POST['anneeExercice'] = $dataCotisation[0]['anneeCour'];
    $_POST['auteurActes'] = $dataTraiter[0]['idUser'];
    //Fin de construction
    $preparation = new Preparation ();
    $param = $preparation->creationPrep($_POST);
    print_r($param);
    $update = "UPDATE `users` SET `dateCotisation` = :dateCotisation, `cotisation` = 1 WHERE `idUser` = :idUser;
    INSERT INTO `compta`(`numeroTransaction`,`type`, `objet`, `montant`, `formeBanquaire`, `anneeExercice`, `auteurActes`)
    VALUES (:numeroTransaction, 1, :objet, :montant, :formeBanquaire, :anneeExercice, :auteurActes)";
    $action = new RCUD($update,$param);
    $action->CUD();
    header('location:../../index.php?message=Cotisation prise en compte&idNav='.$idNav);
  } else {
      header('location:../../index.php?message=Erreur&idNav=6');
  }
