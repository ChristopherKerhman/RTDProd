<?php
    $idNav = filter($_POST['idNav']);
    array_pop($_POST);
    $_POST['targetRoute'] = IntToken(16);
    $preparer = new Preparation();
    $param = $preparer->creationPrep($_POST);
    $sqlInsert = "INSERT INTO `navigation`(`nomNav`, `cheminNav`, `menuVisible`, `ordre`, `zoneMenu`,  `niveau`, `targetRoute`)
    VALUES (:nomNav, :cheminNav, :menuVisible, :ordre, :zoneMenu, :niveau, :targetRoute)";
    $action = new RCUD($sqlInsert, $param);
    $action->CUD();
    header('location:../../index.php?idNav='.$idNav.'&message=Nouveau menu enregistré.');
