<?php
class GetUser {
  public function listeUser ($role, $valide) {
  $select = "SELECT `idUser`, `login`, `nom`, `prenom`, `role`, `valide`, `cotisation`, `dateInscription`, `dateCotisation`, `numeroAdherant`, `bornYear`
    FROM `users`
    WHERE `role` = :role AND `valide` = :valide
    ORDER BY `nom`, `prenom`";
    $param = [['prep'=>':role', 'variable'=> $role], ['prep'=>':valide', 'variable'=>$valide]];
    $readDB = new RCUD($select, $param);
    return $readDB->READ();
  }
  public function listeUserAdmin() {
    $select = "SELECT `idUser`, `login`, `nom`, `prenom`, `role`, `valide`, `numeroAdherant` FROM `users`";
    $param = [];
    $readDB = new RCUD($select, $param);
    return $readDB->READ();
  }
  public function oneUser($idUser) {
    $select = "SELECT `login`, `email`, `nom`, `prenom`, `adresse`, `ville`, `codePostal`, `bornYear`,
    `cotisation`, `dateInscription`, `dateCotisation`,
    `telephone`, `numeroAdherant`, `valide`
    FROM `users` WHERE `idUser`= :idUser";
    $param = [['prep'=>':idUser', 'variable'=>$idUser]];
    $readDB = new RCUD($select, $param);
    return $readDB->READ();
  }
}
