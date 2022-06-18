<h3 class="titrePage">Gestion des utilisateurs</h3>
<?php
$niveau = 4;
include 'sources/securisation/securiter.php';
require 'sources/utilisateurs/objets/getUser.php';
require 'sources/utilisateurs/objets/printUser.php';
include 'functions/functionPagination.php';
// Tri des users :
$liste = new PrintUser();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
  $currentPage = filter($_GET['page']);
} else {
$currentPage = 1;
}
$parPage = 10;
// Recherche du nombre d'users
$param = [];
$requetteSQL = "SELECT COUNT(`idUser`) AS `nbr` FROM `users`";
$pages = parametrePagination ($parPage, $requetteSQL, $param );
// Calcul du premier article dans la page.
$premier = ($currentPage * $parPage) - $parPage;
// Traitement des données a affiché.
$requetteSQL = 'SELECT `idUser`, `login`, `nom`, `prenom`, `role`, `valide`, `numeroAdherant`
FROM `users`
ORDER BY `numeroAdherant`
LIMIT '.$premier.', '.$parPage.'';
$dataTraiter = affichageData($requetteSQL, $param);

$liste->tableauUser($dataTraiter, $idNav);
//print_r($dataTraiter);

navPagination($pages, $idNav);
?>
