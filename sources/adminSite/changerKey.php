<?php
$niveau = 4;
include 'sources/securisation/securiter.php';
function doublon ($select) {
  $void = [];
  $controle = new RCUD($select, $void);
  $doublon = $controle->READ();
  if(!empty($doublon)) {
    echo '<p>Doublon détecté dans le clés. Changer le trousseau.</p>';
    echo '<ul>';
    foreach ($doublon as $key => $value) {
      echo '<li>nombre de doublon :'.$value['nbr_doublon'].' Doublon pointé :'.$value['routageToken'].'</li>';
    }
    echo'</ul>';
  } else {
    echo '<p>Série de clés sans doublon.</p>';
  }
}
 ?>
<h3 class="titrePage">Changer les serrures et les clés du site.</h3>
<p>Cette manipulation permet de changer l'ensemble de l'adressage des routes permettant d'accéder à la base de donnéees via les formulaires. Effectuer cette manipulation permet d'augementer la sécurité du site.</p>
<form class="flex-colonne" id="messagePrint"  action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
  <button type="submit" class="buttonForm" name="verif" value="1">Changer les clés des formulaires</button>
</form>
<?php
if (($_SERVER['REQUEST_METHOD'] === 'POST')&&(filter($_POST['verif'] == 0))) {
  $select = "SELECT `idTarget`  FROM `targetRCUD` WHERE `valide` = 1";
  $param = [];
  $readCle = new RCUD($select, $param);
  $dataTraiter = $readCle->READ();
  foreach ($dataTraiter as $key => $value) {
    $valeur = IntToken(random_int(4,6));
    $param = [['prep'=>':idTarget', 'variable'=>$value['idTarget']], ['prep'=>':routageToken', 'variable'=>$valeur]];
    $update = "UPDATE `targetRCUD` SET `routageToken`= :routageToken WHERE `idTarget` = :idTarget";
    $updateRoute = new RCUD($update, $param);
    $updateRoute->CUD();
  }
  //Controle des doublons sur la série :
  echo '<p>La série de clés vient d\'être modifié.</p>';
  $select = "SELECT COUNT(`routageToken`) AS `nbr_doublon`, `routageToken` FROM `targetRCUD` GROUP BY `routageToken` HAVING COUNT(`routageToken`) > 1";
  doublon($select);
}

?>
<form class="flex-colonne" id="messagePrint"  action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
  <button type="submit" class="buttonForm" name="verif" value="2">Vérifier les doublons des formulaires</button>
</form>
<?php
if (($_SERVER['REQUEST_METHOD'] === 'POST')&&(filter($_POST['verif'] == 2))) {
    $select = "SELECT COUNT(`routageToken`) AS `nbr_doublon`, `routageToken` FROM `targetRCUD` GROUP BY `routageToken` HAVING COUNT(`routageToken`) > 1";
  doublon($select);
}
?>
<form class="flex-colonne" id="messagePrint"  action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
  <button type="submit" class="buttonForm" name="verif" value="3">Changer les clés de la navigation</button>
</form>
<?php
if (($_SERVER['REQUEST_METHOD'] === 'POST')&&(filter($_POST['verif'] == 3))) {
  $select = "SELECT `idNav` FROM `navigation` WHERE `valide` = 1";
  $param = [];
  $readCle = new RCUD($select, $param);
  $dataTraiter = $readCle->READ();
  foreach ($dataTraiter as $key => $value) {
    $valeur = IntToken(random_int(4,6));
    $param = [['prep'=>':idNav', 'variable'=>$value['idNav']], ['prep'=>':targetRoute', 'variable'=>$valeur]];
    $update = "UPDATE `navigation` SET `targetRoute`= :targetRoute WHERE `idNav` = :idNav";
    $updateRoute = new RCUD($update, $param);
    $updateRoute->CUD();
  }
  //Controle des doublons sur la série :
  echo '<p>La série de clés vient d\'être modifié.</p>';
  $select = "SELECT COUNT(`targetRoute`) AS `nbr_doublon`, `targetRoute` FROM `navigation` GROUP BY `targetRoute` HAVING COUNT(`targetRoute`) > 1";
  doublon($select);
}

?>
<form class="flex-colonne" id="messagePrint"  action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
  <button type="submit" class="buttonForm" name="verif" value="4">Vérifier les doublons de la navigation</button>
</form>
<?php
if (($_SERVER['REQUEST_METHOD'] === 'POST')&&(filter($_POST['verif'] == 4))) {
  $select = "SELECT COUNT(`targetRoute`) AS `nbr_doublon`, `targetRoute` FROM `navigation` GROUP BY `targetRoute` HAVING COUNT(`targetRoute`) > 1";
  doublon($select);
}
?>
