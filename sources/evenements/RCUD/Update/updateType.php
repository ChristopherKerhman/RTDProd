<?php
  $idNav = filter($_POST['idNav']);
  array_pop($_POST);
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  // Récupération du statuts du type
  $sql = "SELECT `valide` FROM `typeE` WHERE `idTypeE` = :idTypeE";
  $statut = new RCUD($sql, $param);
  $dataTraiter = $statut->READ();
  if($dataTraiter[0]['valide'] == 1) {
    $update = "UPDATE `typeE` SET `valide`= 0 WHERE `idTypeE` = :idTypeE";
  } else {
        $update = "UPDATE `typeE` SET `valide`= 1 WHERE `idTypeE` = :idTypeE";
  }
  $action = new RCUD($update, $param);
  $action->CUD();
  header('location:../../index.php?idNav='.$idNav.'&message=Nouveau type enregistré.');
