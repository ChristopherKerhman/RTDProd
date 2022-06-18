<?php
$idNav = filter($_POST['idNav']);
array_pop($_POST);
    if(filter($_POST['valide']>0)) {
      $_POST['valide'] = 0;
    } else {
        $_POST['valide'] = 1;
    }
    $preparation = new Preparation();
    $param = $preparation->creationPrep($_POST);
    $update = "UPDATE `articles` SET `valide`= :valide WHERE `idArticle` = :idArticle";
    $insertDB = new RCUD($update , $param);
    $write = $insertDB->CUD();
    header('location:../../index.php?idNav='.$idNav.'&idArticle='.filter($_POST['idArticle']).'&message=Article modifié');
