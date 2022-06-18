<?php
require 'sources/secretariat/objets/getArticle.php';
require 'sources/secretariat/objets/printArticle.php';
$article = new PrintArticle();
$dataLastArticle = $article->lastArticle ();
$dataListeArticleValide = $article->listeArticle(1);
?>
<div class="container">

  <div class="articleGrid"><?php $article->affichageLastArticle($dataLastArticle); ?></div>
  <div class="archive"><?php $article->listeArticles($dataListeArticleValide); ?></div>
  <?php  include 'sources/evenements/indexCom.php'; ?>
</div>
