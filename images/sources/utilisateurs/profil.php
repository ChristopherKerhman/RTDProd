<?php
$niveau = 1;
include 'sources/securisation/securiter.php';
require 'sources/utilisateurs/objets/getUser.php';
require 'sources/utilisateurs/objets/printUser.php';
include 'sources/evenements/objets/evenementCommun.php';
$user = new PrintUser();
$dataTraiter = $user->oneUser($_SESSION['idUser']);

 ?>
 <article class="profilFlex">
<aside class="bloc">
  <h4 class="titrePage">Profil de <?=$_SESSION['login']?></h4>
    <?php
      $user->profilUser($dataTraiter);
      $user->demission($dataTraiter, $idNav);
    ?>
</aside>
<aside class="bloc">
  <h4 class="titrePage">Administrer votre profil</h4>
  <?php $user->updateProfil($dataTraiter, $idNav); ?>
</aside>
<aside class="bloc">
  <?php
    $addLieux = new Lieux ();
    $addLieux->addlieu($idNav, $_SESSION['role']);
    //print_r($_SESSION);
    $addLieux->lieuPerso($idNav, $_SESSION['idUser']);
  ?>
</aside>
</article>
