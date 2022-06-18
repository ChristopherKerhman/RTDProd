<?php
    $idNav = filter($_POST['idNav']);
    // Détection de l'état de la cloture
    $sql ="SELECT `clotureCompta` FROM `dataSite` WHERE `idDataSite` = 1";
    $void = [];
    $cloture = new RCUD($sql,$void);
    $dataCloture = $cloture->READ();
    if($dataCloture[0]['clotureCompta'] == 0) {
      $update = "UPDATE `dataSite` SET `clotureCompta` = 1 WHERE `idDataSite` = 1";
      $message = 'et ouvert';
    } else {
      $update = "UPDATE `dataSite` SET `clotureCompta` = 0 WHERE `idDataSite` = 1";
      $message = 'et fermé';
    }
    $cloture = new RCUD($update, $void);
    $cloture->CUD();
    header('location:../../index.php?message=Cloture manipulé '.$message.'&idNav='.$idNav);
