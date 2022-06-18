<?php
$ok = array();
//Controle
array_push($ok, champsVide($_POST));
$idNav =  filter($_POST['idNav']);
array_pop($_POST);
$size = [60, 200, 60, 5, 1];
$post_buffer = array();
foreach ($_POST as $key => $value) {
  array_push($post_buffer, filter($value));
}
for ($i=0; $i < count($size) ; $i++) {
array_push($ok, sizePost($post_buffer[$i], $size[$i]));
}
if($ok == [0, 0, 0, 0, 0, 0]) {
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $insert = "INSERT INTO `lieuxSceances`(`nomLieu`, `rue`, `ville`, `CP`, `lieuVirtuel`)
  VALUES (:nomLieu, :rue, :ville, :CP, :lieuVirtuel)";
  $action = new RCUD($insert, $param);
  $action->CUD();
  header('location:../../index.php?idNav='.$idNav.'&message=Lieu enregistré.');
} else {
  header('location:../../index.php?idNav='.$idNav.'&message=Un champs est vide ou incorrecte.');
}
