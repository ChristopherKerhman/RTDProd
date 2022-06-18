<?php
    $idNav = filter($_POST['idNav']);
    $idFiche = filter($_POST['idEvenement']);
    array_pop($_POST);
    // Récupération du statut de l'événement
    $id = new Preparation();
    $param = $id->creationPrep($_POST);
    $select = "SELECT`valide` FROM `evenements` WHERE `idEvenement` = :idEvenement";
    $readDB = new RCUD($select, $param);
    $valide = $readDB->READ();
    if($valide[0]['valide'] >0) {
      $update = "UPDATE `evenements` SET `valide`= 0 WHERE `idEvenement` = :idEvenement";
    } else {
      $update = "UPDATE `evenements` SET `valide`=1 WHERE `idEvenement` = :idEvenement";
    }
    $param = $id->creationPrep($_POST);
    $action = new RCUD($update, $param);
    $action->CUD();
    header('location:../../index.php?idNav='.$idNav.'&idFiche='.$idFiche.'&message=Administration effectué');
