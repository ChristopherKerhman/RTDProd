<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';
$listeType = new PrintEvenement();
$id = new Controles();
$age = $id->ageUtilisation($_SESSION['connexionToken']);
if($age <18) {
  echo '<h3 class="titrePage">Impossible de créer des événements</h3><p>
  Vous êtes mineur, il est impossible de créer des événements.
  </p>';
} else {
  ?>
  <h3 class="titrePage">Ajouter une séance</h3>
  <form class="flex-colonne" action="<?php echo encodeRoutage(26); ?>" method="post">
    <div>
      <label for="titre">Titre de votre événement</label>
      <input id="titre" type="text" name="titre" placeholder="Le titre de votre événement" size="40">
      <label for="date">Date de l'événement</label>
      <input id="date" type="date" name="dateEvenement" value="<?php echo date('Y-m-d'); ?>">
      <label for="heure">Heure du rendez-vous</label>
      <input id="heure" type="time" name="heure">
    </div>
    <label for="texteEvenement">Description de la séance</label>
    <textarea id="texteEvenement" name="texteEvenement" rows="16" cols="40"></textarea>
  <div>
    <label for="public">Type de public désiré sur la séance</label>
    <select id="public" name="public">
      <?php
        for ($i=0; $i < count($public) ; $i++) {
          echo '<option value="'.$i.'">'.$public[$i].'</option>';
        }
       ?>
    </select>

    <?php
    $lieux = new Lieux();
    $lieux->listeType();
    ?>
  </div>
  <?php   $lieux->affichageLieux($_SESSION['idUser']); ?>
  <label for="nombre">Nombre de joueurs max :</label>
  <select id="nombre" name="nombre">
    <?php
      for ($i=2; $i <=12 ; $i++) {
        if($i == 5) {
              echo '<option value="'.$i.'" selected>'.$i.' joueurs</option>';
        } else {
            echo '<option value="'.$i.'">'.$i.' joueurs</option>';
        }
      }
     ?>
  </select>
  <button type="submit" class="buttonForm">Créer séance</button>
  </form>

  <?php }  ?>
