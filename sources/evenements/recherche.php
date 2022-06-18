<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';
$search = new PrintEvenement();
?>
<h3 class="titrePage">Recherche d'événements</h3>
<form class="flex-colonne" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?idNav='.$idNav; ?>" method="post">
    <label for="date">Date de l'événement</label>
    <input id="date" type="date" name="dateEvenement" value="<?php echo date('Y-m-d'); ?>">
    <?php
    // Contrôle sur l'âge de l'utilisateur et impact sur le moteur de recherche
    $autorisation = new Controles();
    $age = $autorisation->age($_SESSION['connexionToken']);
    // Filtre en fonction de l'age des utilisateurs.
    include 'array/public.php';
    if($age >= 18) {
      $tour = count($public);
    }
    if(($age < 18) && ($age >=16)) {
      $tour = (count($public)-1);
    }
    if($age < 16) {
        $tour = (count($public)-2);
    }
    if($age < 13) {
        $tour = (count($public)-3);
    }
    // Fin du filtre

// Fin module
     ?>
    <label for="public">Type de public</label>
    <select id="public" name="public">
      <?php
        for ($i=0; $i < $tour  ; $i++) {
          echo '<option value="'.$i.'">'.$public[$i].'</option>';
        }
       ?>
    </select>

    <?php
    $lieux = new Lieux();
    $lieux->listeType();
    ?>
    <button type="submit" class="buttonForm">Rechercher</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $dataTraiter = $search->getMoteur ($param);

  ?>
  <article>
    <h3 class="titrePage">Les séances trouvées</h3>
    <?php   $search->InscriptionEvenement($dataTraiter, $_SESSION['idUser']); ?>
  </article>
<?php } else { ?>
<article>
  <h4>Pas encore de recherche</h4>
</article>
<?php } ?>
