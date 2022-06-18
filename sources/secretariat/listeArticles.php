<?php
require 'sources/secretariat/objets/getArticle.php';
require 'sources/secretariat/objets/printArticle.php';
$article = new PrintArticle();
$dataListeArticleValide = $article->listeArticle(1);
$dataListeArticleInvalide = $article->listeArticle(0);
echo '<h3 class="titrePage">Article actuellement affiché</h3>';
$dataLastArticle = $article->lastArticle ();
  $article->listeArticleAdmin ($dataLastArticle);


echo '<h3 class="titrePage">Liste des articles d\'index anciens</h3>';

  $article->listeArticleAdmin ($dataListeArticleValide);
  if ($dataListeArticleInvalide != []){
  echo '<h3 class="titrePage">Liste des articles d\'index invalide</h3>';

    $article->listeArticleAdmin ($dataListeArticleInvalide);
}
