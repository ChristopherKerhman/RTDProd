<?php
Class Types {
  public function __construct() {
    $this->yes = ['Non', 'Oui'];
    $this->public = ['Tous public', '13+', '16+', '18+'];
  }

  public function listeTypeAdmin() {
    $select = "SELECT `idTypeE`, `type`, `valide` FROM `typeE`";
    $param = [];
    $liste = new RCUD($select, $param);
    return $liste->READ();
  }
  public function listeType() {
    $select = "SELECT `idTypeE`, `type` FROM `typeE` WHERE `valide` = 1";
    $param = [];
    $liste = new RCUD($select, $param);
    $variable = $liste->READ();
    echo '<label for="typeEvenement">Activité : </label>';
    echo '<select id="typeEvenement" name="typeEvenement">';
    foreach ($variable as $key => $value) {
      echo '<option value="'.$value['idTypeE'].'">'.$value['type'].'</option>';
    }
    echo'</select>';
  }
  public function listeTypeUpdate($type) {
    $select = "SELECT `idTypeE`, `type` FROM `typeE` WHERE `valide` = 1";
    $param = [];
    $liste = new RCUD($select, $param);
    $variable = $liste->READ();
    echo '<label for="typeEvenement">Activité : </label>';
    echo '<select id="typeEvenement" name="typeEvenement">';
    foreach ($variable as $key => $value) {
      if($value['idTypeE'] == $type) {
            echo '<option value="'.$value['idTypeE'].'" selected>'.$value['type'].'</option>';
      } else {
            echo '<option value="'.$value['idTypeE'].'">'.$value['type'].'</option>';
      }

    }
    echo'</select>';
  }

  public function AdminPrintType($variable, $idNav) {
    $routeForm = encodeRoutage(22);
    echo '<ul>';
    foreach ($variable as $key => $value) {
      if($value['valide'] == 0) {
        $message = 'Valide';
      } else {
        $message = 'Invalide';
      }
      echo '<li class="line">  <form action="'.$routeForm.'" method="post">
            <input type="hidden" name="idTypeE" value="'.$value['idTypeE'].'" />
            <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'.$message.'</button>
        </form>
      '.$value['type'].' - valide : '.$this->yes[$value['valide']].'

      </li>';
    }
    echo'</ul>';
  }

}
