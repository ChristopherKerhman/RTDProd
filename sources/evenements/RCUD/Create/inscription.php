<?php
$ok = array();
  $id = new Controles();
  $age = $id->age($_SESSION['connexionToken']);
  if($age >= 18) {
    $_POST['public'] = 3;
  }
  if(($age < 18) && ($age >=16)) {
        $_POST['public'] = 2;
  }
  if($age < 16) {
        $_POST['public'] = 1;
  }
  if($age < 13) {
        $_POST['public'] = 0;
  }
  array_push($ok, $id->publicEvenement($_POST['public'], filter($_POST['idSeance'])));
  array_push($ok, champsVide($_POST));
  // Contrôle pour connaitre le nombre maximal de personne enregistré
  array_push($ok, $id->maxInscription (filter($_POST['idSeance'])));
  array_push($ok,$id->dejaInscrit(filter($_POST['idSeance']), $_SESSION['idUser']));
  print_r($ok);
if($ok == [1, 0, 1, 0]) {
  $param = [['prep'=>':idMembre', 'variable'=>$_SESSION['idUser']], ['prep'=>':idSeance', 'variable'=>filter($_POST['idSeance'])]];
  $insert = "INSERT INTO `participants`(`idMembre`, `idSeance`) VALUES (:idMembre, :idSeance)";
  $action = new RCUD($insert, $param);
  $action->CUD();
  header('location:../../index.php?message=Participation enregistré.');
} else {
  header('location:../../index.php?message=Plus d\'inscription possible.');
}
