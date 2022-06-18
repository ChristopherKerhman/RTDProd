<?php
// size Texte et Titre
$titre = filter($_POST['titre']);
$texte = filter($_POST['texteEvenement']);
array_push($ok, sizePost($titre, 60));
array_push($ok, sizePost($texte, 255));
//Time controle ?
if(filter($_POST['dateEvenement']< date('Y-m-d'))) {
  array_push($ok, 1);
} else {
  array_push($ok, 0);
}
array_push($ok, borneSelect($_POST['public'], 3));
array_push($ok, borneSelect($_POST['nombre'], 12));
  $selectIDListe = "SELECT `idTypeE` FROM `typeE` WHERE `valide` = 1";
  $valeur = filter($_POST['typeEvenement']);
array_push($ok, $idControle->SelectDynamique($selectIDListe, $valeur));
$select = 'SELECT `idLieux` FROM `lieuxSceances` WHERE  (`proprietaire` = 0 OR `proprietaire` = '.$_SESSION['idUser'].') AND `valideLieu` = 1';
$valeur = filter($_POST['lieu']);
array_push($ok, $idControle->SelectDynamique($select, $valeur));
// Concatenation des contrôle
if($ok == [0, 0, 0, 0, 0, 0, 0, 0]) {
  // Création de l'événement
  $parametre = new Preparation();
  $param = $parametre->creationPrepIdUser ($_POST);
  $insert = "INSERT INTO `evenements`(`titre`, `dateEvenement`, `heure`, `texteEvenement`, `public`, `typeEvenement`, `lieu`, `nombre`, `idCreateur`)
  VALUES (:titre, :dateEvenement, :heure, :texteEvenement, :public, :typeEvenement, :lieu, :nombre, :idUser)";
  $action = new RCUD($insert, $param);
  $action->CUD();
  // Récupération de idEvenement
  $select = "SELECT `idEvenement`FROM `evenements` ORDER BY `idEvenement` DESC LIMIT 1";
  $void = [];
  $readLastId = new RCUD($select, $void);
  $dataIdEvenement = $readLastId->READ();
  $data = [['prep'=>':idSeance', 'variable'=>$dataIdEvenement[0]['idEvenement']], ['prep'=>':idUser', 'variable'=>$_SESSION['idUser']]];
  $sql = "INSERT INTO `participants`(`idSeance`, `idMembre`) VALUES (:idSeance, :idUser)";
  $record = new RCUD($sql, $data);
  $record->CUD();
  header('location:../../index.php?message=Nouvel événement enregistré.');
} else {
   header('location:../../index.php?message=Une erreur est apparus, un champs vide ou un soucis de choix dans la date.');
}
