<?php
$niveau = 2;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';
include 'functions/functionPagination.php';
$moderationE = new PrintEvenement();
 ?>
<section>
<h3 class="titrePage">Modération des événements</h3>
<?php
// Paramètre de pagination
if(isset($_GET['page']) && (!empty($_GET['page']))) {
  $currentPage = filter($_GET['page']);
} else {
$currentPage = 1;
}
$parPage = 8;
// Déclaration de paramètre vide :
$param = [];
// Recherche du nombre d'événement en ligne total
$requetteSQL = "SELECT COUNT(`idEvenement`) AS `nbr` FROM `evenements` ";
$nrbC = new RCUD($requetteSQL, $param);
$dataNbrC = $nrbC->READ();
$nbrArticle = $dataNbrC[0]['nbr'];
// nombre de page total arrondit au chiffre suppérieur.
$pages = ceil($nbrArticle/$parPage);
// Calcul du premier article dans la page.
$premier = ($currentPage * $parPage) - $parPage;
$requetteSQL = "SELECT `idEvenement`, `idCreateur`, `titre`, `dateCreation`, `dateEvenement`, `heure`,
 `public`, `typeEvenement`, `lieu`, `nombre`, `evenements`.`valide`, `archive`,
`login`, `bornYear`, `nom`, `prenom`, `type`
FROM `evenements`
INNER JOIN `users` ON `idCreateur` = `idUser`
INNER JOIN `typeE` ON `typeEvenement` = `idTypeE`
ORDER BY `dateEvenement` DESC
LIMIT {$premier}, {$parPage}";
$traitement = new RCUD($requetteSQL, $param);
$dataTraiter = $traitement->READ();
echo '<h3 id="message">Tourner votre portable</h3>';
if($dataTraiter !=[]){
$moderationE->moderationEvenements($dataTraiter);
} else {
  echo '<p>Pas encore d\'événements à traiter.</p>';
}

for ($page=1; $page <= $pages ; $page++ ) {
  echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
}
 ?>
</section>
