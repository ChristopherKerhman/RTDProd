<?php
class PrintNav extends GetNav {

  public function printNavigationBandeau($variable) {
    echo '<nav>
    <ul class="navigationBandeau">';
    echo '<li><a href="index.php?idNav=0" class="lienNav">Index</a></li>';
    foreach ($variable as $key => $value) {
      if($value['deroulant'] > 0) {
        $dataDeroulant = new GetNav();
        $dataTraiter = $dataDeroulant->getMenuNav($value['niveau'],  $value['deroulant']);
        //print_r($dataTraiter);
        echo '<div class="dropdown">';
        echo '<button class="buttonForm">'.utf8_encode($value['nomNav']).'</button>';
        echo ' <div class="dropdown-child">';
        foreach ($dataTraiter as $key => $value) {
          echo '<div>
          <a href="index.php?idNav='.$value['targetRoute'].'" class="lienNav">'.utf8_encode($value['nomNav']).'</a>
          </div>';
        }
        echo '</div>';
        echo '</div>';

        } else {
        echo '<li><a href="index.php?idNav='.$value['targetRoute'].'" class="lienNav">'.utf8_encode($value['nomNav']).'</a></li>';
      }
    }
    echo '</ul>
    </nav>';
  }

  public function printNavigationMenu($variable) {
    echo '<nav>
    <ul class="navigationBandeau">';
    foreach ($variable as $key => $value) {
      echo '<li><a href="index.php?idNav='.$value['targetRoute'].'" class="lienNav">'.utf8_encode($value['nomNav']).'</a></li>';
    }
    echo '</ul>
    </nav>';
  }
  public function interupteurInscription($data, $idNav) {
    if($data > 0) {
        echo '<h3 class="titrePage">Fermeture des inscriptions</h3>';
      echo '<form class="flex-colonne" action="'.encodeRoutage(3).'" method="post">
        <button type="submit" name="idNav"value="'.$idNav.'" class="buttonForm">Fermer Inscription</button>
      </form>';
    } else {
            echo '<h3 class="titrePage">Ouverture des inscriptions</h3>';
      echo '<form class="flex-colonne" action="'.encodeRoutage(3).'" method="post">
        <button type="submit" name="idNav" value="'.$idNav.'" class="buttonForm">Ouvrir Inscription</button>
      </form>';
    }
  }

}
