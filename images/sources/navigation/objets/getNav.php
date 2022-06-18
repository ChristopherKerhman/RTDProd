<?php
class GetNav {
  public function getMenuNav($niveau,  $zone) {
    $sql = "SELECT `idNav`, `nomNav`, `deroulant`, `zoneMenu`, `niveau`, `targetRoute`
    FROM `navigation`
    WHERE `niveau` = :niveau AND `zoneMenu` = :zoneMenu AND `menuVisible`= 1 AND `valide` = 1
    ORDER BY `ordre`";
    $param = [['prep'=>':niveau', 'variable'=>$niveau], ['prep'=>':zoneMenu', 'variable'=>$zone]];
    $data = new RCUD($sql, $param);
    return $data->READ();
  }
  public function getContenus ($idNav) {
    $sql = "SELECT  `cheminNav` FROM `navigation` WHERE `valide` = 1 AND `targetRoute` = :idNav";
    $param = [['prep'=>':idNav', 'variable'=>$idNav]];
    $data = new RCUD($sql, $param);
    return $data->READ();
  }

  public function getStatutInscription (){
    $select = "SELECT `valide` FROM `navigation` WHERE `cheminNav` = 'sources/utilisateurs/inscription.php'";
    $param = [];
    $getStatut = new RCUD($select, $param);
    return $getStatut->READ();
  }
}
