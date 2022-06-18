<?php
  $idNav = filter($_POST['idNav']);
  array_pop($_POST);
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  // Récupération du statuts du type
  $sql = "SELECT`valideLieu` FROM `lieuxSceances` WHERE `idLieux` = :idLieux";
  $statut = new RCUD($sql, $param);
  $dataTraiter = $statut->READ();
  if($dataTraiter[0]['valideLieu'] == 1) {
    $update = "UPDATE `lieuxSceances` SET `valideLieu`= 0 WHERE `idLieux` = :idLieux";
  } else {
        $update = "UPDATE `lieuxSceances` SET `valideLieu`= 1 WHERE `idLieux` = :idLieux";
  }
  $action = new RCUD($update, $param);
  $action->CUD();
  header('location:../../index.php?idNav='.$idNav.'&message=Lieu modifié.');
