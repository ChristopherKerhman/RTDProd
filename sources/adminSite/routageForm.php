<?php
$niveau = 4;
include 'sources/securisation/securiter.php';
include 'array/zoneMenu.php';
if($dev) { ?>
<h3 class="titrePage">Routage - traitement des formulaires</h3>
<form class="flex-colonne" action="sources/adminSite/createPost.php" method="post">
  <label for="cheminNav">Chemin nav</label>
  <input id="cheminNav" type="text" name="chemin" size="60">
  <label for="niveau">Niveau d'administration</label>
  <select id="niveau" name="securite">
    <?php
    for ($i=0; $i < count($niveauAdministration) ; $i++) {
      echo '<option value="'.$i.'">'.$niveauAdministration[$i].'</option>';
    }
     ?>
  </select>

  <button type="submit" class="buttonForm" value="<?=$idNav?>" name="idNav">Ajouter</button>
</form>
<h3>Liste des routes form existante</h3>
<?php
$void = [];
$select = "SELECT `idTarget`, `chemin`, `valide`, `securite`, `routageToken`
FROM `targetRCUD`
WHERE `valide` = 1
ORDER BY `idTarget` DESC, `securite`";
$readForm = new RCUD($select, $void);
$dataTraiter = $readForm->READ();
echo '<ul class="listeUser">';
foreach ($dataTraiter as $key => $value) {
  echo '<li>'.$niveauAdministration[$value['securite']].' - chemin : '.$value['chemin'].' / Adressage dans le formulaire -> encodeRoutage('.$value['idTarget'].') </li>';
}
echo'</ul>';
 ?>


<?php } else {
  echo 'Pas de nouveau routage possible.';
} ?>
