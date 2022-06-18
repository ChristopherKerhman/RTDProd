<?php
class GetArticle {
  public function lastArticle () {
    $param = [];
    $select = "SELECT `idArticle`, `titre`, `texte`, `date`, `nom`, `prenom`
    FROM `articles`
    INNER JOIN `users` ON `idUser` = `auteur`
    WHERE `articles`.`valide` = 1
    ORDER BY `idArticle` DESC LIMIT 1";
    $select = new RCUD($select, $param);
    return $select->READ();
  }
  public function listeArticle ($valide) {
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    $select = "SELECT `idArticle`, `titre`,`date`, `nom`, `prenom`
    FROM `articles`
    INNER JOIN `users` ON `idUser` = `auteur`
    WHERE `articles`.`valide` = :valide
    ORDER BY `date` DESC LIMIT 5";
    $select = new RCUD($select, $param);
    return $select->READ();
  }
  public function getOneArticle($id) {
    $param = [['prep'=>':idArticle', 'variable'=>$id]];
    $select = "SELECT `idArticle`, `titre`, `texte`, `date`, `nom`, `prenom`, `articles`.`valide`
    FROM `articles`
    INNER JOIN `users` ON `idUser` = `auteur`
    WHERE `idArticle` = :idArticle";
    $select = new RCUD($select, $param);
    return $select->READ();
  }
}
