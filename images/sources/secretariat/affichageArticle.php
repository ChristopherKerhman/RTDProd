<?php
require 'sources/secretariat/objets/getArticle.php';
require 'sources/secretariat/objets/printArticle.php';
$article = new PrintArticle();
if(empty($_GET['idArticle'])) {
  session_destroy();
  header('location:index.php?message=Deconnexion effectuée');
}
$idArticle = filter($_GET['idArticle']);
$dataTraiter = $article->getOneArticle($idArticle);
if($dataTraiter == []) {
  echo '<h4>Article inexistant</h4>';
} else {
  $article->affichageLastArticle($dataTraiter);
  if($dataTraiter[0]['valide'] >0) {
    $message = 'Invalider';
  } else {
      $message = 'Valider';
      $del = 'Supprimer';
  }
  if((isset($_SESSION['role']))&&($_SESSION['role'] == 3)) {

    echo '<form class="flex-colonne" action="'.encodeRoutage(19).'" method="post">
      <input type="hidden" name="idArticle" value="'.$idArticle.'">
      <input type="hidden" name="valide" value="'.$dataTraiter[0]['valide'].'">
      <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'.$message.'</button>
    </form>';
    if($dataTraiter[0]['valide'] == 0){
    echo '<form class="flex-colonne" action="'.encodeRoutage(20).'" method="post">
      <input type="hidden" name="idArticle" value="'.$idArticle.'">
      <button type="submit" class="buttonForm">'.$del.'</button>
    </form>';}
  }
}



?>
