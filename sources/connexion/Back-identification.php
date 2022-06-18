<?php
session_start();
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sécurité champs vide
  $ok = champsVide($_POST);
  if($ok == 0) {
    $mdp = filter($_POST['mdp']);
    array_pop($_POST);
    $preparation = new Preparation ();
    $param = $preparation->creationPrep($_POST);
    $readUsers = "SELECT `idUser`, `login`, `mdp`, `role`, `valide`
    FROM `users`
    WHERE `login` = :login AND `valide` = 1";
    $user = new RCUD($readUsers, $param);
    $dataUser = $user->READ();
    if ((password_verify($mdp, $dataUser[0]['mdp']))&&($dataUser[0]['valide'] == 1)) {
      // Créer un token de session + enregistrement
        $token = genToken(10);
        $_SESSION['connexionToken'] = $token;
        $param = [['prep'=>':dateConnexion', 'variable'=>date('Y-m-d H:i:s')],
                  ['prep'=>':token', 'variable'=>$token],
                  ['prep'=>':idUser', 'variable'=>$dataUser[0]['idUser']]];
        $sql = "UPDATE `users` SET `dateConnexion` = :dateConnexion, `token` = :token
        WHERE `idUser` = :idUser";
        $updateToken = new RCUD($sql, $param);
        $updateToken->CUD();
      // Fin enregistrement du token et de la date de connexion.
      $_SESSION['login'] = $dataUser[0]['login'];
      $_SESSION['role'] = $dataUser[0]['role'];
      $_SESSION['idUser'] = $dataUser[0]['idUser'];
      header('location:../../index.php?message=Bienvenus '.$_SESSION['login']);
    } else {
      header('location:../../index.php?message=Login ou mot de passe incorrecte.');
    }
  } else {
      header('location:../../index.php?message=Un champs ou plus est vide.');
  }
  // Fin sécurité champs vide


} else {
  header('location:../../index.php?message=Il y a comme un lézard numérique.');
}
