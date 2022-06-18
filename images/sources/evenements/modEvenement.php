<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
include 'array/public.php';
$idEvenement = filter($_GET['idEvenement']);
$Evenement = new PrintEvenement();
$dataTraiter = $Evenement->getOneEvenement($idEvenement, $_SESSION['idUser']);
 ?>
 <h3 class="titrePage">Modifier cette séance ?</h3>
 <form class="flex-colonne" action="<?php echo encodeRoutage(28); ?>" method="post">
   <p><strong>Type de public désiré sur la séance : <?php echo $public[$dataTraiter[0]['public']]; ?></strong></p>
   <div>
     <label for="titre">Titre de votre événement</label>
     <input id="titre" type="text" name="titre" value="<?=$dataTraiter[0]['titre']?>" size="40">
     <label for="date">Date de l'événement</label>
     <input id="date" type="date" name="dateEvenement" value="<?php echo date('Y-m-d'); ?>">
     <label for="heure">Heure du rendez-vous</label>
     <input id="heure" type="time" name="heure" value="<?=$dataTraiter[0]['heure']?>">
   </div>
   <label for="texteEvenement">Description de la séance</label>
   <textarea id="texteEvenement" name="texteEvenement" rows="8" cols="80">
  <?=$dataTraiter[0]['texteEvenement']?>
   </textarea>
 <div>

   <?php
     $lieux = new Lieux();
     $lieux->listeTypeUpdate($dataTraiter[0]['typeEvenement']);
   ?>
 </div>
   <?php
    $lieux->affichageLieuxUpdate($_SESSION['idUser'], $dataTraiter[0]['lieu']);
   ?>
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
 <button type="submit" class="buttonForm" name="idEvenement" value="<?=$idEvenement?>">Modifier séance</button>
 </form>
