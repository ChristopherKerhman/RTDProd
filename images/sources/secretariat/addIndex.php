<?php
$niveau = 3;
include 'sources/securisation/securiter.php';
 ?>
<h3 class="titrePage">Ajouter un article sur la page d'acceuil du site</h3>
<form class="flex-colonne" action="<?php echo encodeRoutage(18); ?>" method="post">
<label for="titre">Titre de votre article</label>
<input id="titre" type="text" name="titre">
<label for="texte">Article :</label>
<textarea id="texte" name="texte" rows="8" cols="40"></textarea>
<label for="valide">Publication sur la page d'acceuil du site ?</label>
<select id="valide" name="valide">
  <option value="0">Non</option>
  <option value="1" selected>Oui</option>
</select>
  <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Ajouter</button>
</form>
