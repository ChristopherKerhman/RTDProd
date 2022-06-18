<?php
Class Lieux extends Types {
  public function addlieu($idNav, $role) {
    if($role == 1) {
      $action = encodeRoutage(33);
    }
    if($role >= 2) {
      $action = encodeRoutage(1);
    }
    echo '<h3 class="titrePage">Ajouter un lieu</h3>';
    echo '<form class="flex-colonne" action="'.$action.'" method="post">
      <label for="nomLieu">Nom du lieu</label>
      <input id="nomLieu" type="text" name="nomLieu">
      <label for="rue">N° et adresse</label>
      <input id="rue" type="text" name="rue">
      <label for="ville">Ville</label>
      <input id="ville" type="text" name="ville">
      <label for="CP">Code postale</label>
      <input id="CP" type="text" name="CP">';
      if($role>=2) {
        echo '<label for="lieuVirtuel">Lieu virtuel ?</label>
        <select id="lieuVirtuel" name="lieuVirtuel">
        <option value="0" selected>Non</option>
        <option value="1">Oui</option>
        </select>';
      }
  echo'<button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">Add</button>
    </form>';
  }
  public function adminLieu($idNav) {
    $select = "SELECT `idLieux`, `nomLieu`, `rue`, `ville`, `CP`, `valideLieu`, `lieuVirtuel`
    FROM `lieuxSceances`
    WHERE `proprietaire` = 0
    ORDER BY `proprietaire` DESC, `nomLieu`";
    $param = [];
    $listeLieu = new RCUD($select, $param);
    $variable = $listeLieu->READ();
    // Print
    echo '<ul>';
    $routeForm = encodeRoutage(23);
    foreach ($variable as $key => $value) {
      if($value['valideLieu'] == 0) {
        $message = 'Valide';
      } else {
        $message = 'Invalide';
      }
      echo '<li class="line">  <form action="'.$routeForm.'" method="post">
            <input type="hidden" name="idLieux" value="'.$value['idLieux'].'" />
            <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'.$message.'</button>
        </form>';
        if($value['lieuVirtuel']>0) {
          echo $value['nomLieu'].'- valide : '.$this->yes[$value['valideLieu']].' Lieux virtuel';
        } else {
          echo $value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'].' - valide : '.$this->yes[$value['valideLieu']];
        }
        echo '</li>';
          }
          echo'</ul>';
  }
  public function lieuPerso($idNav, $idUser) {
    $routeLieuPerso = encodeRoutage(34);
    $select = "SELECT `idLieux`, `nomLieu`, `rue`, `ville`, `CP`, `valideLieu`
    FROM `lieuxSceances`
    WHERE `proprietaire` = :idUser
    ORDER BY `proprietaire` DESC, `nomLieu`";
    $param = [['prep'=>':idUser', 'variable'=>$idUser]];
    $listeLieu = new RCUD($select, $param);
    $variable = $listeLieu->READ();
    // Print
    echo '<ul>';
    foreach ($variable as $key => $value) {
      if($value['valideLieu'] == 0) {
        $message = 'Valide';
      } else {
        $message = 'Invalide';
      }
      echo '<li class="line">  <form action="'.$routeLieuPerso.'" method="post">
            <input type="hidden" name="idLieux" value="'.$value['idLieux'].'" />
            <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'.$message.'</button>
        </form>
      '.$value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'].' - valide : '.$this->yes[$value['valideLieu']].'
        </li>';
          }
          echo'</ul>';
  }
  public function affichageLieux($idUser){
    $select = "SELECT `idLieux`, `nomLieu`, `rue`, `ville`, `CP`, `valideLieu`, `proprietaire`, `lieuVirtuel`
    FROM `lieuxSceances`
    WHERE  (`proprietaire` = 0 OR `proprietaire` = :idUser) AND `valideLieu` = 1 ";
    $param = [['prep'=>':idUser', 'variable'=>$idUser]];
    $liste = new RCUD($select, $param);
    $variable = $liste->READ();
    echo '<label for="lieu">Lieux de la séance : </label>';
    echo '<select id="lieu" name="lieu">';
    foreach ($variable as $key => $value) {
      if($value['lieuVirtuel'] > 0){
        echo '<option value="'.$value['idLieux'].'">
        '.$value['nomLieu'].' Lieux virtuel
        </option>';
      }
        else {
      echo '<option value="'.$value['idLieux'].'">
      '.$value['nomLieu'].' '.$value['rue'].' '.$value['ville'].' '.$value['CP'].'
      </option>';
      }
    }
    echo'</select>';
  }
  public function affichageLieuxUpdate($idUser, $id){
    $select = "SELECT `idLieux`, `nomLieu`, `rue`, `ville`, `CP`, `valideLieu`, `proprietaire`
    FROM `lieuxSceances`
    WHERE  (`proprietaire` = 0 OR `proprietaire` = :idUser) AND `valideLieu` = 1 ";
    $param = [['prep'=>':idUser', 'variable'=>$idUser]];
    $liste = new RCUD($select, $param);
    $variable = $liste->READ();
    echo '<label for="lieu">Lieux de la séance : </label>';
    echo '<select id="lieu" name="lieu">';
    foreach ($variable as $key => $value) {
        if($value['idLieux'] == $id) {
          echo '<option value="'.$value['idLieux'].'" selected>
          '.$value['nomLieu'].' '.$value['rue'].' '.$value['ville'].' '.$value['CP'].'
          </option>';
        } else {
          echo '<option value="'.$value['idLieux'].'">
          '.$value['nomLieu'].' '.$value['rue'].' '.$value['ville'].' '.$value['CP'].'
          </option>';
        }
    }
    echo'</select>';
  }
}
