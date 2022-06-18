<?php

    // Récupération du statut de l'événement
    $update = "DELETE FROM `evenements` WHERE `idEvenement` = :idEvenement AND `valide` = 0";
    $id = new Preparation();
    $param = $id->creationPrep($_POST);
    $action = new RCUD($update, $param);
    $action->CUD();
    header('location:../../index.php?message=Evenement effacé définitivement');
