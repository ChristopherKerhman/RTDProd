<?php
  $niveau = 3;
  include 'sources/securisation/securiter.php';
 ?>
<section>
<article class="article">
  <h3 class="titrePage">Ajouter un acte comptable</h3>
  <h4>Attention</h4>
  <p>Vous pouvez ici, ajouter un acte comptable sortant de l'ordinaire. Noter que lorsque vous validerez, l'enregistrement est définitif.
Vous pourrez toutefois effacer celui-ci en cas d'erreur. Toutefois, il laissera une trace dans la base de donnée et ceux, même si il devient invisible.<br />
Vérifier donc, si votre enregistrement est bien valide avant de le faire, afin d'éviter de rendre le comptabilité sujette à caution.
Enfin, noter que l'identité de la personne qui valide l'acte est noté dans la base, afin d'assurer une traçabilité des actes comptable.
<br />
<h4 class="titrePage">Cloture des comptes en fin d'exercice</h4>
<p>A la fin de l'exercice comptable, fin aout / début septembre. Prenez contact avec l'administrateur du site pour qu'ils vous ouvre la cloture des comptes.</p>
<strong>Note :</strong>
<ul>
  <li>Toujours noter le montant de l'acte en valeur positive.</li>
  <li>Dépense => Débit sur le compte</li>
  <li>Recette => Entrée sur le compte</li>
</ul>
</p>
</article>
<article>
  <form class="flex-colonne" action="<?php echo encodeRoutage(14); ?>" method="post">
      <label for="type">Type d'acte ?</label>
      <select id="type" name="type">
        <option value="0">Dépense</option>
        <option value="1">Recette</option>
      </select>
      <label for="numeroTransaction">Numero du moyen de payement</label>
      <input id="numeroTransaction" name="numeroTransaction" required />
      <label for="objet">Objet de la dépense</label>
      <textarea id="objet" name="objet" rows="8" cols="40" placeholder="255 caractères maximum.."></textarea>
      <label for="montant">Montant en €</label>
      <input id="montant" type="number" name="montant" min="0" step="0.01" size="6" placeholder="Montant en €" required>
      <label for="type">Moyen de payement ?</label>
      <select id="type" name="formeBanquaire">
        <option value="0">Liquide</option>
        <option value="1">Chéque</option>
        <option value="2">Carte bleu</option>
        <option value="3">Virement bancaire</option>
      </select>
      <button type="submit" class="buttonForm">Add actes</button>
  </form>
</article>
</section>
