<?php
session_start();
include '../../../../objets/objetsGeneraux.php';
include '../../../../functions/fonctionsDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ok = array();
// Vérifier que le mot de passe est le bon ?
$mdpA = filter($_POST['mdp']);
$mdpB = filter($_POST['verif']);
  if($mdpA === $mdpB) {
      array_push($ok, 0);
      array_shift($_POST);
  } else {
       array_push($ok, 1);
  }
// Vérification que tout les champs sont plein
array_push($ok, champsVide($_POST));
print_r($ok);
if($ok == [0, 0]) {
  array_pop($_POST);
  //Doublon sur le login
  $sql = "SELECT `login`FROM `users` WHERE `login` = :login";
  $preparation = ':login';
  $valeur = filter($_POST['login']);
  $doublonHunt = new Controles();
  $ok = $doublonHunt->doublon($sql, $preparation , $valeur);
    if($ok == 0){
      // Traitement des données et update
      // Hachage du mot de passe
      $_POST['mdp'] = haschage(filter($_POST['mdp']));
      $_POST['token'] = genToken(12);
      $preparation =  new Preparation();
      $param = $preparation->creationPrep($_POST);
      $update = "UPDATE `users`
      SET `login` = :login, `mdp` = :mdp, `token`=:token, `adresse` = :adresse, `codePostal` = :codePostal, `ville` = :ville, `bornYear`= :bornYear, `valide` = 1, `role` = 1
      WHERE `numeroAdherant` = :numeroAdherant AND `valide` = 0";
      $updateCompte = new RCUD($update, $param);
      $updateCompte->CUD();
      header('location:../../../../index.php?message=Compte validé.');
    } else {
      header('location:../../../../index.php?message=Login déjà utilisé.');
    }
} else {
    header('location:../../../../index.php?message=Erreur de mot de passe.');
}

} else {
    header('location:../../index.php?message=Il y a comme un lézard numérique.');
}


 ?>
