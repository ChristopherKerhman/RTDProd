<?php
session_start();
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Contrôle d'identification
$preInscit = new Controles();
$sql = "SELECT `numeroAdherant` FROM `users` WHERE `numeroAdherant` = :numeroAdherant AND `valide` = 0";
$valeur = filter($_POST['numeroAdherant']);
$preparation = ':numeroAdherant';
$ok = $preInscit->doublon($sql, $preparation , $valeur);
if($ok == 1) {
    header('location:../../index.php?idNav='.findTargetRoute(9));
} else {
  header('location:../../index.php?message=Pré-inscription non valide.');
}
} else {
    header('location:../../index.php?message=Il y a comme un lézard numérique.');
}
