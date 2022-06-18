<?php
//Securiter
$niveau = 4;
include 'sources/securisation/securiter.php';
include 'array/zoneMenu.php';
 if($dev) { ?>
<h3 class="titrePage">Ajouter un lien</h3>
<form class="flex-colonne" action="<?php echo encodeRoutage(2); ?>" method="post">
  <label for="nomNav">Nom du lien</label>
  <input id="nomNav" type="text" name="nomNav">
  <label for="cheminNav">Chemin nav</label>
  <input id="cheminNav" type="text" name="cheminNav" size="60">
<div>
  <label for="menuVisible">Visible ?</label>
  <select id="menuVisible" name="menuVisible">
    <option value="0">Non</option>
    <option value="1" selected>Oui</option>
  </select>
  <label for="ordre">Ordre apparition</label>
  <select id="ordre" name="ordre">
    <?php
    for ($i=0; $i <= 10 ; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';
    }
     ?>
  </select>
  </div>
  <div>
      <label for="zoneMenu">Zone du menu</label>
  <select id="zoneMenu" name="zoneMenu">
    <?php

    for ($i=0; $i < count($zoneMenu) ; $i++) {
      echo '<option value="'.$i.'">'.$zoneMenu[$i].'</option>';
    }
     ?>
  </select>
  <label for="niveau">Niveau d'administration</label>
  <select id="niveau" name="niveau">
    <?php

    for ($i=0; $i < count($niveauAdministration) ; $i++) {
      echo '<option value="'.$i.'">'.$niveauAdministration[$i].'</option>';
    }
     ?>
  </select>
</div>
  <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Add Nav</button>
</form>
<?php
//include 'sources/navigation/administration/zoneMenu.php';
 }
$inscription = new PrintNav();
$statut = $inscription->getStatutInscription();
$valide = $statut[0]['valide'];
$inscription->interupteurInscription($valide, $idNav);
?>

<article class="flex-colonne blackBox">
  <h3 class="titrePage">Les lien actuellement disponible sur le site.</h3>
  <?php
  for ($i=0; $i < count($niveauAdministration) ; $i++) {
    echo ' <h3 class="titrePage">Bandeau '.$niveauAdministration[$i].' actuel</h3>';
    $dataNav = $navigation->getMenuNav($i,0);
    $navigation->printNavigationBandeau($dataNav);
  }
   ?>
</article>
