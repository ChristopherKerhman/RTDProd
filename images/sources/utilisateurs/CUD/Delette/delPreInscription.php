<?php
  // Récupération de l'idNav
    $idNav = filter($_POST['idNav']);
    array_pop($_POST);
    //Effacer les pré-inscrit.
    $delete = "DELETE FROM `users` WHERE `role` = 0 AND `valide` = 0 AND `cotisation` = 0";
    $param = [];
    $action = new RCUD($delete, $param);
    $action->CUD();
    header('location:../../index.php?message=Préinscription nettoyé &idNav='.$idNav);
