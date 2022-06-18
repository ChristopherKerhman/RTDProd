<?php
$niveau = 2;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';
include 'functions/functionPagination.php';
$moderationE = new PrintEvenement();
$idEvenement = filter($_GET['idFiche']);
$dataTraiter = $moderationE->getOnEvenement($idEvenement);

 ?>
<section>
<h3 class="titrePage">Modération des événements</h3>

<?php $moderationE->moderationFiche($dataTraiter, $idNav); ?>

</section>
