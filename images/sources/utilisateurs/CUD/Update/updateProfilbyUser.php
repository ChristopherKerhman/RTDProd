<?php

  $idNav = filter($_POST['idNav']);
  array_pop($_POST);
  $data = ['adresse'=>255, 'codePostal'=>10, 'ville'=> 255, 'email'=> 60];
  foreach ($data as $key => $value) {
    array_push($ok, sizePost(filter($_POST[$key]), $value));
  }
  //Contrôle Doublon de mail
  $doublonMail = new Controles();
  $valeur = filter($_POST['email']);
  $preparation = ':email';
  $sql = "SELECT `email` FROM `users` WHERE `email` = :email";
  array_push($ok, $doublonMail->doublon($sql, $preparation , $valeur));
  //Fin de contrôle
  if($ok == [0, 0, 0, 0, 0, 0]){
$parametre = new Preparation();
  $param = $parametre->creationPrepIdUser($_POST);
  $updateUser = "UPDATE `users` SET `adresse` = :adresse, `ville` = :ville, `codePostal` = :codePostal, `email` = :email WHERE `idUser` = :idUser";
  //print_r($param);
  $action = new RCUD($updateUser, $param);
  $action->CUD();
 header('location:../../index.php?idNav='.$idNav.'&message=Eléments du compte modifié.');
} else {
  header('location:../../index.php?message=Doublon de mail ou erreur.');
}
