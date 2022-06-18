<?php $fake = genToken(12); ?>
<h3 class="titrePage">Connexion</h3>
<form class="flex-colonne" action="sources/connexion/updateMDP.php" method="post">
  <label for="email">Votre email :</label>
  <input id="email" type="text" name="email" required>
  <label for="numeroAdherant">Votre numéro d'adhérant :</label>
  <input id="numeroAdherant" type="text" name="numeroAdherant" required>
  <label for="token">Votre token de sécurité :</label>
  <input id="token" type="text" name="token" required>
  <label for="mdp">Nouveau mot de passe :</label>
  <input id="mdp" type="text" name="mdp" value="<?=$fake?>" required>
  <button type="submit" class="buttonForm">Connexion</button>
</form>
