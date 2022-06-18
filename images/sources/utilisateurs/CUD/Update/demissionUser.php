<?php
  array_pop($_POST);
  //Contrôle d'identité
  $idUser = $_SESSION['idUser'];
  $login = $_SESSION['login'];
  $token = $_SESSION['connexionToken'];
  $numeroAdherant = filter($_POST['numeroAdherant']);
  $dataID = [['prep'=>':idUser', 'variable'=>$idUser],
            ['prep'=>':login', 'variable'=>$login],
            ['prep'=>':token', 'variable'=>  $token],
            ['prep'=>':numeroAdherant', 'variable'=>  $numeroAdherant]];

    // Passage en compte "non valide" par le membre qui vaut pour demission + Invalidation des lieux du membre - A suivre : invalidation de ces événements
    $demission = "UPDATE `users` SET `valide` = 0
    WHERE `idUser` = :idUser AND `login`= :login AND `token` = :token AND `numeroAdherant` = :numeroAdherant;
    UPDATE `lieuxSceances` SET `valideLieu` = 0 WHERE `proprietaire` = :idUser;
    DELETE FROM `participants` WHERE `idMembre` = :idUser;
    UPDATE `evenements` SET `valide` = 0, `archive` = 1 WHERE `idCreateur` = :idUser";
    $leave = new RCUD ($demission, $dataID);
    $leave->CUD();
    session_destroy();
    header('location:../../index.php?message=Suppression de votre compte effectuée');
