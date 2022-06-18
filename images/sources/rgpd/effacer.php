<article >
  <h3 class="titrePage">Effacer votre pré-inscription</h3>
  <p>Vous n'avez plus l'intention d'adhérer au club et l'un de nos membres vous a pré-inscrint. Vous pouvez supprimer ce pré-compte de nos bases de données librement, conformément à la RGPD.</p>
  <form class="flex-colonne" action="sources/rgpd/RCUD/Delette/preInsciption.php" method="post">
    <label for="numeroAdherant">Votre numéro d'adhérant</label>
    <input id="numeroAdherant" type="text" name="numeroAdherant" size="12" placeholder="<?php echo date('y').$fake; ?>" required>
    <button type="submit" class="buttonForm">Effacer mon compte de pré-inscription</button>
  </form>
</article>
