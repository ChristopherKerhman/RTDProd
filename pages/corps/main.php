<main class="main">
  <?php
    if(isset($_SESSION['login'])) {
      echo '<h3>Session de '.$_SESSION['login'].'</h3>';
    } else {
      echo '<h3>Bienvenus</h3>';
    }
  // Mode dev true / false - Affiche le chemin des pages + Ajout de menus / page dans le site.
  $dev = false;
  // Affichage message
  if (isset($_GET['message'])) {echo '<h3>'.filter($_GET['message']).'</h3>';}
  // Affichage elements
  if(isset($_GET['idNav'])) {
    $idNav = filter($_GET['idNav']);
    $chemin = $navigation->getContenus($idNav);
    if($chemin == []) {
        include 'sources/secretariat/articleDeGarde.php';

    } else {
      if($dev) {
        echo $chemin[0]['cheminNav'];
      }
        include $chemin[0]['cheminNav'];
    }
  } else {
    $idNav = 0;
    include 'sources/secretariat/articleDeGarde.php';
  }
?>
</main>
