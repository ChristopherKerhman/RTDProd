<?php

$data = ['titre'=>100, 'texte'=>1900, 'valide'=> 1, 'idNav'=>16];
foreach ($data as $key => $value) {
  array_push($ok, sizePost(filter($_POST[$key]), $value));
}
if($ok == [0, 0, 0, 0, 0]) {
  $idNav = filter($_POST['idNav']);
  array_pop($_POST);
  $preparation = new Preparation();
  $param = $preparation->creationPrepIdUser($_POST);
  $insert = "INSERT INTO `articles`(`titre`, `texte`, `valide`,`auteur`)
  VALUES (:titre, :texte, :valide, :idUser)";
$insertDB = new RCUD($insert, $param);
  $write = $insertDB->CUD();
  header('location:../../index.php?message=Texte enregistré&idNav='.$idNav);
} else {
  header('location:../../index.php?message=Un champs est vide.');
}
