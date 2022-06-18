<?php
Class GetEvenement extends Types {
  public function getSeance($idUser, $valide, $archive) {
    $param = [['prep'=>':idUser', 'variable'=>$idUser],
              ['prep'=>':valide', 'variable'=>$valide],
              ['prep'=>':archive', 'variable'=>$archive]];
    $select = "SELECT `idEvenement`, `login`, `titre`, `dateCreation`, `dateEvenement`, `heure`, `texteEvenement`, `public`, `type`,
    `nombre`, `nomLieu`, `lieuxSceances`.`rue`, `lieuxSceances`.`ville`, `lieuxSceances`.`CP`, `evenements`.`valide`, `archive`, `lieuVirtuel`, `valideLieu`
    FROM `evenements`
    INNER JOIN `users` ON `idCreateur` = `idUser`
    INNER JOIN `typeE` ON `idTypeE` = `typeEvenement`
    INNER JOIN `lieuxSceances` ON `idLieux` = `lieu`
    WHERE `idCreateur` = :idUser AND `evenements`.`valide` = :valide AND `archive` = :archive
    ORDER BY `dateEvenement`, `heure`";
    $readEvenement = new RCUD($select, $param);
    return $readEvenement->READ();
  }
  public function getAllSeance($valide, $archive) {
    $param = [['prep'=>':valide', 'variable'=>$valide],
              ['prep'=>':archive', 'variable'=>$archive]];
    $select = "SELECT `idEvenement`, `login`, `titre`, `dateCreation`, `dateEvenement`, `heure`, `texteEvenement`,
    `public`, `type`, `nombre`, `nomLieu`, `lieuxSceances`.`rue`, `lieuxSceances`.`ville`, `lieuxSceances`.`CP`,
    `proprietaire`, `lieuVirtuel`
    FROM `evenements`
    INNER JOIN `users` ON `idCreateur` = `idUser`
    INNER JOIN `typeE` ON `idTypeE` = `typeEvenement`
    INNER JOIN `lieuxSceances` ON `idLieux` = `lieu`
    WHERE  `evenements`.`valide` = :valide AND `archive` = :archive
    ORDER BY `dateEvenement`, `heure`
    LIMIT 6";
    $readEvenement = new RCUD($select, $param);
    return $readEvenement->READ();
  }
  public function inscrit($idSeance) {
    $select = "SELECT  COUNT(`idMembre`) AS `nbrJoueur` FROM `participants` WHERE `idSeance` = :idSeance";
    $param = [['prep'=>':idSeance', 'variable'=>$idSeance]];
    $nbr = new RCUD($select, $param);
    return $nbr->READ();
  }
  public function idInscrit($idSeance) {
    $select = "SELECT `idMembre`, `login`
              FROM `participants`
              INNER JOIN `users` ON `idMembre` = `idUser`
              WHERE `idSeance` = :idSeance";
    $param = [['prep'=>':idSeance', 'variable'=>$idSeance]];
    $idInscrit = new RCUD($select, $param);
    return $idInscrit->READ();
  }
  public function getOneEvenement($id, $idUser) {
    $select = "SELECT `idEvenement`, `titre`, `dateCreation`, `dateEvenement`, `heure`, `texteEvenement`, `public`, `typeEvenement`, `lieu`, `nombre`
    FROM `evenements`
    WHERE `idEvenement` = :idEvenement AND `idCreateur` = :idCreateur";
    $param = [['prep'=>':idEvenement', 'variable'=>$id],
              ['prep'=>':idCreateur', 'variable'=>$idUser]];
    $data = new RCUD($select, $param);
    return $data->READ();
  }
  public function getMoteur ($param) {
    $select = "SELECT `idEvenement`, `login`, `titre`, `dateCreation`, `dateEvenement`, `heure`, `texteEvenement`, `public`, `type`,
    `nombre`, `nomLieu`, `lieuxSceances`.`rue`, `lieuxSceances`.`ville`, `lieuxSceances`.`CP`,
    `proprietaire`, `lieuVirtuel`
    FROM `evenements`
    INNER JOIN `users` ON `idCreateur` = `idUser`
    INNER JOIN `typeE` ON `idTypeE` = `typeEvenement`
    INNER JOIN `lieuxSceances` ON `idLieux` = `lieu`
    WHERE `dateEvenement` >= :dateEvenement
    AND `public` = :public
    AND `typeEvenement` = :typeEvenement
    AND `evenements`.`valide` = 1
    AND `archive` = 0";
    $liste = new RCUD($select, $param);
    return $liste->READ();
  }
  public function getMySeance($idUser) {
    $sql = "SELECT `idEvenement`, `login`, `titre`, `dateCreation`, `dateEvenement`, `heure`, `texteEvenement`,
    `public`, `type`, `nombre`, `nomLieu`, `lieuxSceances`.`rue`, `lieuxSceances`.`ville`, `lieuxSceances`.`CP`,
    `proprietaire`, `lieuVirtuel`, `valideLieu`
    FROM `participants`
    INNER JOIN `evenements` ON `idEvenement` = `idSeance`
    INNER JOIN `users` ON `idCreateur` = `idUser`
    INNER JOIN `typeE` ON `idTypeE` = `typeEvenement`
    INNER JOIN `lieuxSceances` ON `idLieux` = `lieu`
    WHERE `idMembre` = :idUser AND `evenements`.`archive` = 0 AND `evenements`.`valide` = 1
    ORDER BY `dateEvenement`, `heure`";
    $param = [['prep'=>':idUser', 'variable'=>$idUser]];
    $reading = new RCUD($sql, $param);
    return $reading->READ();
  }
  public function getOnEvenement($id) {
    $sql = "SELECT `idEvenement`, `idCreateur`, `titre`, `dateCreation`, `dateEvenement`,
    `heure`, `texteEvenement`, `public`, `typeEvenement`, `nombre`, `evenements`.`valide`, `archive`,
    `idLieux`, `nomLieu`, `lieuxSceances`.`rue`, `lieuxSceances`.`ville`, `lieuxSceances`.`CP`, `valideLieu`, `login`, `proprietaire`, `type`, `lieuVirtuel`
    FROM `evenements`
    INNER JOIN `users` ON `idCreateur` = `idUser`
    INNER JOIN `typeE` ON `idTypeE` = `typeEvenement`
    INNER JOIN `lieuxSceances` ON `idLieux` = `lieu`
    WHERE `idEvenement` = :idEvenement";
    $param = [['prep'=>':idEvenement', 'variable'=>$id]];
    $reading = new RCUD($sql, $param);
    return $reading->READ();
  }

}
