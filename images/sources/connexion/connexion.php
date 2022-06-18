<h3 class="titrePage">Connexion</h3>
<form class="flex-colonne" action="sources/connexion/identification.php" method="post">
  <label for="login">Login</label>
  <input id="login" type="text" name="login" required>
  <label for="mdp">Mot de passe</label>
  <input id="mdp" type="password" name="mdp" required>
  <button type="submit" class="buttonForm">Connexion</button>
</form>
<h3 class="titrePage">Mot de passe oublié ?</h3>
<form class="flex-colonne" action="sources/securisation/marcel.php" method="post">
  <label for="email">Votre email d'inscription</label>
  <input id="numeroAdherant" type="text" name="email" size="12" placeholder="Votre mail ?" required>
  <button type="submit" class="buttonForm" name="idNav" value="<?=$idNav?>">Retrouver son mot de passe</button>
</form>
