<?php
// Niveau de sécurité : 4
$niveau = 4;
include 'sources/securisation/securiter.php';
// Fin sécurité
$sql = "SELECT `idDataSite`, `titre`, `sousTitre`, `description`, `cotisation`, `anneeCour`, `emailContact`, `url`, `adresse`, `clotureCompta` FROM `dataSite`";
$param = [];
$read = new RCUD($sql, $param);
$dataTraiter = $read->READ();
$annee = date('Y').'-'.(date('Y') + 1);
 ?>
<h3 class="titrePage">Administration du site</h3>
<form class="flex-colonne" action="<?php echo encodeRoutage(4); ?>" method="post">
    <label for="titre">Titre du site</label>
    <input id="titre" type="text" name="titre" value="<?=$dataTraiter[0]['titre']?>">
    <label for="soustitre">Sous-titre du site</label>
    <input id="soustitre" type="text" size="60" name="sousTitre" value="<?=$dataTraiter[0]['sousTitre']?>">
    <label for="description">Description META</label>
    <textarea name="description" rows="8" cols="40">
      <?=$dataTraiter[0]['description']?>
    </textarea>
    <p>Année comptable actuel en exercice :<?=$dataTraiter[0]['anneeCour']?><br /></p>
    <?php if($dataTraiter[0]['clotureCompta']>0) { ?>
<label for="anneeCour">Année comptable actuel : <?=$dataTraiter[0]['anneeCour']?> / Année année comptable suivante : <?=$annee?> </label>
      <select id="anneeCour" name="anneeCour">
        <?php
          echo '<option value="'.$dataTraiter[0]['anneeCour'].'" selected>'.$dataTraiter[0]['anneeCour'].'</option>';
          if($annee != $dataTraiter[0]['anneeCour']) {
          echo '<option value="'.$annee.'">'.$annee.'</option>';
        }
         ?>
      </select>
    <?php } ?>
      <div>
        <label for="cotisation">Cotisation</label>
      <input id="cotisation" size="4" type="texte" name="cotisation" value="<?=$dataTraiter[0]['cotisation']?>"> €
    </div>
    <label for="emailContact">Mail de contact CGU :</label>
    <input di="emailContact" type="text" name="emailContact" value="<?=$dataTraiter[0]['emailContact']?>">
    <label for="url">URL du site :</label>
    <input id="url" type="text" name="url" value="<?=$dataTraiter[0]['url']?>">
    <label for="adresse">Adresse physique de l'association</label>
    <input id="adresse" type="text" name="adresse" value="<?=$dataTraiter[0]['adresse']?>"  size="100">
    <button type="submit" class="buttonForm" value="<?=$idNav?>" name="idNav">Modifier</button>
</form>
