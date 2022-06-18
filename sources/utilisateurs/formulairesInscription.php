<?php
function genSpeudo ($size) {
    $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alphaM = 'abcdefghijklmnopqrstuvwxyz';
    $num = '1234567890';
    for ($i=0; $i < 3 ; $i++) {
        $alpha = str_shuffle($alpha).$alpha;
        $alphaM = str_shuffle($alphaM).$alphaM;
        $num = str_shuffle($num).$num;
    }
    $token = NULL;
    $number = rand(0, strlen($alpha));
    $letter = substr($alpha, $number, 1);
    $token = $token.$letter;
    for ($i=0 ; $i < $size  ; $i++ ) {
      $number = rand(0, strlen($alphaM));
      $letter = substr($alphaM, $number, 1);
      $token = $token.$letter;
      //$token =  $token.substr($alpha, rand(0,strlen($alpha)));
    }
    for ($i=0; $i < 2 ; $i++) {
      $number = rand(0, strlen($num));
      $letter = substr($num, $number, 1);
      $token = $token.$letter;
    }
    return $token;
}
$fake = genToken(10);
$speudo = genSpeudo(4);
$mdp = genToken(10);
 ?>
<form class="flex-colonne" action="sources/utilisateurs/CUD/Update/updateInscription.php" method="post">
  <label for="login">Votre pseudo</label>
  <input id="login" type="text" name="login" placeholder="Suggestion : <?=$speudo?>" required>
  <label for="mdp">Mot de passe (pensez à le noter)</label>
  <input type="text" name="mdp" value="<?=$mdp?>">
  <label for="adresse">Votre adresse</label>
  <input id="adresse" type="text" name="adresse" placeholder="numéro et rue" required>
  <label for="codePostal">Code postal</label>
  <input id="codePostal" type="text" name="codePostal" placeholder="CP" required>
  <label for="ville">Ville</label>
  <input type="text" name="ville" placeholder="Ville" required>
  <label for="bornYear">Année de naissance :</label>
  <input id="bornYear" type="number" name="bornYear" min="<?php echo (date('Y') - 110); ?>" max="<?php echo (date('Y') - 13); ?>" value="<?php echo (date('Y') - 25); ?>" required>
  <label for="numeroAdherant">Votre numéro d'adhérent</label>
  <input id="numeroAdherant" type="text" name="numeroAdherant" size="12" placeholder="<?php echo date('y').$fake; ?>" required>

  <div>
    <label for="CGU">Acceptez-vous les CGU du site ?</label>
    <input id="CGU" type="checkbox" name="CGU">
    <a class="lienNav" href="index.php?idNav=43">Voir les CGU du site <?=$title?></a>
  </div>
  <button type="submit" class="buttonForm">Confirmer l'inscription</button>
</form>
