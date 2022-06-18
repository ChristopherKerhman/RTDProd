<?php
// Controle taille des champs
$data = ['titre'=>50, 'sousTitre'=>100, 'description'=> 150, 'emailContact'=>60, 'url'=>255, 'adresse'=>255];
foreach ($data as $key => $value) {
  array_push($ok, sizePost(filter($_POST[$key]), $value));
}
// Fin controle taille des champs
if(!empty($_POST['anneeCour'])) {
  array_push($ok, sizePost(filter($_POST['anneeCour']), 12));
  $sql = "UPDATE `dataSite` SET
  `titre`=:titre,`sousTitre`=:sousTitre,`description`=:description,`anneeCour`= :anneeCour,`cotisation`=:cotisation, `emailContact` = :emailContact, `url` = :url, `adresse`= :adresse
  WHERE `idDataSite`= 1";
  $test = [0, 0, 0, 0, 0, 0, 0, 0];
} else {
  $sql = "UPDATE `dataSite` SET
  `titre`=:titre,`sousTitre`=:sousTitre,`description`=:description, `cotisation`=:cotisation, `emailContact` = :emailContact, `url` = :url, `adresse`= :adresse
  WHERE `idDataSite`= 1";
  $test = [0, 0, 0, 0, 0, 0, 0];
}
if($ok == $test) {
  $idNav = filter($_POST['idNav']);
  array_pop($_POST);
  $preparer = new Preparation();
  $param = $preparer->creationPrep($_POST);
  $action = new RCUD($sql, $param);
  $action->CUD();
  header('location:../../index.php?idNav='.$idNav.'&message=Modification enregistré.');
} else {
  header('location:../../index.php?message=Au moins un champs est vide ou trop long.');
}
