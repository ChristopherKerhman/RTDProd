<?php
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idNav = filter($_POST['idNav']);
    array_pop($_POST);
    $ok = array();
    array_push($ok, champsVide($_POST));
    $emailValide = new Controles();
    $sql = "SELECT `email` FROM `users` WHERE `email` = :email";
    $preparation = ':email';
    $valeur = filter($_POST['email']);
    array_push($ok,$emailValide->doublon($sql, $preparation , $valeur));
    if($ok == [0, 1]) {
      // Récupération du token et du numéro d'adhérant.
      $parametre = new Preparation();
      $param = $parametre->creationPrep($_POST);
      $select = "SELECT `token`, `numeroAdherant`, `email` FROM `users` WHERE `email` = :email";
      $readData = new RCUD($select, $param);
      $dataTraiter = $readData->READ();
        $to =   $dataTraiter[0]['email'];
        $subject = 'Procédure pour retrouver votre mot de passe.';
        $select = "SELECT `url`FROM `dataSite`";
        $void = [];
        $urlSite = new RCUD($select, $void);
        $dataURL = $urlSite->READ();
        $message = 'Vous pouvez changer votre mot de passe avec ces deux éléments d\'identification:
        <ul>
          <li>Token :'.$dataTraiter[0]['token'].'</li>
          <li>Numéro d\'adhérant : '.$dataTraiter[0]['numeroAdherant'].'</li>
          <li>Le lien suivant :<a href="'.$dataURL[0]['url'].'/index.php?idNav='.findTargetRoute(40).'">Lien pour changer votre mot de passe.</a></li>
        </ul>';
      $sendMail = mail($to, $subject, $message);
      if($sendMail) {
          header('location:../../index.php?message=Procédure en cours.');
      } else {
          header('location:../../index.php?message=Erreur.');
      }
    } else {
      header('location:../../index.php?message=Erreur.');
    }
} else {
  header('location:../../index.php?message=Il y a comme un lézard numérique.');
}


 ?>
