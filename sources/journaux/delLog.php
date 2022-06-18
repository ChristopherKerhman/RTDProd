<?php
$idNav = filter($_POST['idNav']);
$requetteSQL = "TRUNCATE TABLE `journaux`";
$action = new RCUD($requetteSQL, $prepare);
$action->CUD();
// Changement automatique du trousseau de clés
$select = "SELECT `idTarget`  FROM `targetRCUD` WHERE `valide` = 1";
$param = [];
$readCle = new RCUD($select, $param);
$dataTraiter = $readCle->READ();
foreach ($dataTraiter as $key => $value) {
  $valeur = IntToken(random_int(10,12));
  $param = [['prep'=>':idTarget', 'variable'=>$value['idTarget']], ['prep'=>':routageToken', 'variable'=>$valeur]];
  $update = "UPDATE `targetRCUD` SET `routageToken`= :routageToken WHERE `idTarget` = :idTarget";
  $updateRoute = new RCUD($update, $param);
  $updateRoute->CUD();
}
$select = "SELECT `idNav` FROM `navigation` WHERE `valide` = 1";
$param = [];
$readCle = new RCUD($select, $param);
$dataTraiter = $readCle->READ();
foreach ($dataTraiter as $key => $value) {
  $valeur = IntToken(random_int(10,12));
  $param = [['prep'=>':idNav', 'variable'=>$value['idNav']], ['prep'=>':targetRoute', 'variable'=>$valeur]];
  $update = "UPDATE `navigation` SET `targetRoute`= :targetRoute WHERE `idNav` = :idNav";
  $updateRoute = new RCUD($update, $param);
  $updateRoute->CUD();
}
header('location:../../index.php?idNav='.$idNav.'&message=Journeaux vidé.');
