<?php

class PrintArticle extends GetArticle {
  public function affichageLastArticle($data){
    if($data != []){
    echo '<section class="articleIndex"><article>';
      echo '<h3 class="titrePage">'.$data[0]['titre'].'</h3>';
      echo '<p>'.$data[0]['texte'].'</p>';
      echo '<p>le '.brassageDate($data[0]['date']).'</p>';
      echo '<p>'.$data[0]['prenom'].' '.$data[0]['nom'].'</p>';

    echo'</article></section>';
  } else {
        echo '<section class="articleIndex"><article>
        <p>Pas encore d\'article posté.</p>
        </article></section>';
  }
  }
  public function listeArticleAdmin ($data) {
    echo '<ul class="listeUser">';
    foreach ($data as $key => $value) {
      echo
        '<li><a class="lienNav" href="index.php?idNav='.findTargetRoute(25).'&idArticle='.$value['idArticle'].'">Voir l\'article</a>
        '.$value['titre'].' - '.brassageDate($value['date']).' - '.$value['prenom'].' '.$value['nom'].'
        </li>';
    }
    echo'</ul>';
  }
  public function listeArticles($data) {
      if($data != []){
    echo '<ul class="listeUser">';
    foreach ($data as $key => $value) {
      echo
        '<li><a class="lienNav" href="index.php?idNav='.findTargetRoute(25).'&idArticle='.$value['idArticle'].'">'.$value['titre'].'</a></li>';
    }
    echo'</ul>';
  } else {
        echo
        '<ul class="listeUser">
          <li>Pas de liste d\'article.</li>
        </ul>';

  }
  }
}
