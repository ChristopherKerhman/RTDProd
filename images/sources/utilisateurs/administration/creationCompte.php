<?php
$niveau = 3;
include 'sources/securisation/securiter.php';
?>
<h3 class="titrePage">Création d'une pré-inscription</h3>
<article>
  <form class="flex-colonne" action=" <?php echo encodeRoutage(9); ?> " method="post">
    <label for="email">Email</label>
    <input id="email" type="text" name="email" placeholder="Le mail du nouvelle inscrit">
    <label for="prenom">Prenom</label>
    <input id="prenom" type="text" name="prenom">
    <label for="nom">Nom</label>
    <input id="nom" type="text" name="nom">
    <button class="buttonForm" type="submit" name="idNav" value="<?=$idNav?>">Nouvelle inscription</button>
  </form>
</article>
