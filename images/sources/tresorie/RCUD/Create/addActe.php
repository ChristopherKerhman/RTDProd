<?php
  // Vérification qu'aucun champs
  array_push($ok, sizePost(filter($_POST['numeroTransaction']), 60));
  array_push($ok, sizePost(filter($_POST['objet']), 255));
    if($ok > [0, 0, 0]) {
      header('location:../../../../index.php?message=Un champs est vide dans votre formulaire.');
    } else {
      // Construction de la ligne comptable
      $sql = "SELECT `anneeCour` FROM `dataSite` WHERE `idDataSite` = 1";
      $param = [];
      $exercice = new RCUD($sql, $param);
      $dataExercice = $exercice->READ();
      $_POST['anneeExercice'] = $dataExercice[0]['anneeCour'];
      $_POST['auteurActes'] = $_SESSION['idUser'];
      $preparation = new Preparation ();
      $param = $preparation->creationPrep($_POST);
      $insert = "INSERT INTO `compta`(`numeroTransaction`,`type`, `objet`, `montant`, `formeBanquaire`, `anneeExercice`, `auteurActes`)
      VALUES (:numeroTransaction, :type, :objet, :montant, :formeBanquaire, :anneeExercice, :auteurActes)";
      $action = new RCUD($insert, $param);
      $action->CUD();
      header('location:../../index.php?message=Acte comptable ajouté');
    }
