<?php
// Vérification des champs vide.
  $ok = champsVide($_POST);
  // Contrôle doublons boite mail
  $qualiter = new Controles();
  $sql = "SELECT `email` FROM `users` WHERE `email` = :email";
  $preparation = ':email';
  $valeur = filter($_POST['email']);
  $emailDoublon = $qualiter->doublon($sql, $preparation , $valeur);
  // On additionne les deux tests
  $ok = $emailDoublon + $ok;
  // Fin contrôle doublon boite mail
  if($ok == 0) {
    $idNav = filter($_POST['idNav']);
    array_pop($_POST);
    // génération du numéro d'adhérant
    $anne = date('y');
    $prenom = filter($_POST['prenom']);
    $nom = filter($_POST['nom']);
    $IP = substr($prenom,0,1);
    $IN = substr($nom,0,1);
    $aleatoire = genToken(8);
    $numAdherant = $anne.$IP.$IN.$aleatoire;
    //Intégration à $_POST
    $_POST['numeroAdherant'] = $numAdherant;
    // Génération d'une suite d'élement aléatoire de
    $preparation = new Preparation ();
    $param = $preparation->creationPrep($_POST);
    $insertSQL = "INSERT INTO `users`(`email`, `prenom`,`nom`, `numeroAdherant`)
    VALUES (:email, :prenom, :nom, :numeroAdherant)";
    $action = new RCUD($insertSQL, $param);
    $action->CUD();
    // A activé quand le site sera en ligne note = $valeur correspond à l'email de pré-inscription //24052022
    $select = "SELECT `url` FROM `dataSite`";
    $void = [];
    $urlSite = new RCUD($select, $void);
    $dataTraiter = $urlSite->READ();
    $to = $valeur;
    $subject = 'Votre pré-inscription à Roll the dice';
    $message = 'Vous vous êtes pré-inscrit à roll the dice le '.date('d-m-y').', rendez-vous à l\'adresse suivante : '.$dataTraiter[0]['url'].' pour confirmer votre adhésion. Votre numéro d\'adhérant unique est le '.$numAdherant;
    //$message = $numAdherant;
    $headers = 'From: no-reply@rtd.graines1901.fr';
    mail($to, $subject, $message, $headers);
    // A activé quand le site sera en ligne //24052022
    header('location:../../index.php?idNav='.$idNav.'&message=Pré-inscription rempli.');
  } else {
    header('location:../../index.php?message=Un champs ou plus est vide ou mail en doublons.');
  }
