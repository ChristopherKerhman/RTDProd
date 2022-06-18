<?php

    // Construction de la ligne comptable
    $_POST['auteurDel'] = $_SESSION['idUser'];
    $preparation = new Preparation ();
    $param = $preparation->creationPrep($_POST);
    $insert = "UPDATE `compta` SET `valide` = 1, `auteurDel` = :auteurDel WHERE `idActe` = :idActe";
    $action = new RCUD($insert, $param);
    $action->CUD();
    header('location:../../index.php?message=Acte comptable Restauré');
