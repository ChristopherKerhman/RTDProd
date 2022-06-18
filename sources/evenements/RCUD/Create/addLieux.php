<?php
$idNav =  filter($_POST['idNav']);
array_pop($_POST);
// Contrôle taille des champs.
$data = ['nomLieu'=>60, 'rue'=>200, 'ville'=> 60, 'CP'=>10];
foreach ($data as $key => $value) {
  array_push($ok, sizePost(filter($_POST[$key]), $value));
}
print_r($ok);
if($ok == [0, 0, 0, 0, 0]){
$parametre = new Preparation();
$param = $parametre->creationPrepIdUser ($_POST);
$insert = "INSERT INTO `lieuxSceances`(`nomLieu`, `rue`, `ville`, `CP`, `proprietaire`)
VALUES (:nomLieu, :rue, :ville, :CP, :idUser)";
$action = new RCUD($insert, $param);
$action->CUD();
header('location:../../index.php?idNav='.$idNav.'&message=Lieu enregistré.');
} else {
  header('location:../../index.php?idNav='.$idNav.'&message=Un champs est trop long.');
}
