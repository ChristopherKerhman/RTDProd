<?php
    $preparation = new Preparation();
    $param = $preparation->creationPrep($_POST);
    $update = "DELETE FROM `articles` WHERE `idArticle` = :idArticle AND `valide` = 0";
    $insertDB = new RCUD($update , $param);
    $write = $insertDB->CUD();
    header('location:../../index.php?message=Article supprimé définitivement');
