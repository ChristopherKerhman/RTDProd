<?php
$idNav = filter($_POST['idNav']);
array_pop($_POST);
array_push($ok, sizePost(filter($_POST['type']), 60));
if($ok == [0, 0]) {
$parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $insert = "INSERT INTO `typeE`(`type`) VALUES (:type)";
  $action = new RCUD($insert, $param);
  $action->CUD();
  header('location:../../index.php?idNav='.$idNav.'&message=Nouveau type enregistré.');
} else {
  header('location:../../index.php?message=Un champs est vide.');
}
