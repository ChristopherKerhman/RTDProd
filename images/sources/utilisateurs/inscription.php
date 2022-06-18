<?php
$fake = genToken(10);
 ?>
<form class="flex-colonne" action="sources/utilisateurs/traitement.php" method="post">
  <label for="numeroAdherant">Votre numéro d'adhérant</label>
  <input id="numeroAdherant" type="text" name="numeroAdherant" size="12" placeholder="<?php echo date('y').$fake; ?>" required>
  <button type="submit" class="buttonForm">S'identifier</button>
</form>
<?php include 'sources/rgpd/effacer.php'; ?>
