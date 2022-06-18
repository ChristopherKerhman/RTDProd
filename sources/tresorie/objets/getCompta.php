<?php
class GetCompta {
public function exerciceEncours(){
  $sql ="SELECT `anneeCour`, `clotureCompta` FROM `dataSite` WHERE `idDataSite` = 1";
  $param = [];
  $read = new RCUD($sql, $param);
  return $read->READ();
}

 public function exercice () {
   $sql ="SELECT DISTINCT `anneeExercice` FROM `compta` ORDER BY `anneeExercice` DESC";
   $param = [];
   $read = new RCUD($sql, $param);
   return $read->READ();
 }
 public function compta ($annee) {
   $sql ="SELECT `idActe`, `dateActe`, `type`, `numeroTransaction`, `objet`, `montant`, `formeBanquaire`, `anneeExercice`, `auteurActes`, `nom`, `prenom`, `role`, `bilan`
   FROM `compta`
   INNER JOIN `users` ON `auteurActes` = `idUser`
   WHERE `anneeExercice` = :anneeExercice AND `compta`.`valide`=1";
   $param = [['prep'=>':anneeExercice', 'variable'=>$annee]];
   $read = new RCUD($sql, $param);
   return $read->READ();
 }
 public function blackCompta ($annee) {
   $sql ="SELECT `idActe`, `dateActe`, `type`, `numeroTransaction`, `objet`, `montant`, `formeBanquaire`, `anneeExercice`, `auteurActes`, `nom`, `prenom`, `role`, `bilan`
   FROM `compta`
   INNER JOIN `users` ON `auteurActes` = `idUser`
   WHERE `anneeExercice` = :anneeExercice AND `compta`.`valide`=0";
   $param = [['prep'=>':anneeExercice', 'variable'=>$annee]];
   $read = new RCUD($sql, $param);
   return $read->READ();
 }
 public function bilan ($annee) {
      $sqlS ="SELECT SUM(`montant`) AS `sortie` FROM `compta` WHERE `valide` = 1 AND `anneeExercice` = :anneeExercice AND `type` = 0";
      $sqlE ="SELECT SUM(`montant`) AS `entree` FROM `compta` WHERE `valide` = 1 AND `anneeExercice` = :anneeExercice AND `type` = 1";
      $param = [['prep'=>':anneeExercice', 'variable'=>$annee]];
      $S= new RCUD($sqlS, $param);
      $dataSortie = $S->READ();
      $E = new RCUD($sqlE, $param);
      $dataEntrer = $E->READ();
      $balance = array();
      array_push($balance, $dataSortie[0]['sortie']);
      array_push($balance, $dataEntrer[0]['entree']);
      return $balance;
 }
}
