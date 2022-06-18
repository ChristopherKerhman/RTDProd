<?php
Class PrintCompta extends GetCompta {
  public function printCompteTresorier($data) {
    $formeBancaire = ['Liquide', 'Chéque', 'Carte bleu', 'Virement bancaire'];
    $routeDelForm = encodeRoutage(15);
    echo '<table class="compta">
      <tr>
        <th>n°transaction</th>
        <th>date transaction</th>
        <th>identification Transaction</th>
        <th>Objet</th>
        <th>Recette</th>
        <th>Depense</th>
        <th>Identité</th>
        <th>Forme bancaire</th>
        <th>Corriger</th>
      </tr>';
      foreach ($data as $key => $value) {
        echo'<tr>
              <td>'.$value['anneeExercice'].'-'.$value['idActe'].'</td>
              <td>'.dateHeure($value['dateActe']).'</td>
              <td>'.$value['numeroTransaction'].'</td>
              <td>'.$value['objet'].'</td>';
              if($value['type'] == 0){
                echo'<td id="number">0</td>
                    <td id="number">'.$value['montant'].' €</td>';
              } else {
                echo'<td id="number">'.$value['montant'].' €</td>
                    <td id="number">0 €</td>';
              }
        echo '<td>'.$value['prenom'].' '.$value['nom'].'</td>
              <td>'.$formeBancaire[$value['formeBanquaire']].'</td>
              <td>';
              if($value['bilan'] == 0) {
                echo'<form action="'.$routeDelForm.'" method="post">
                  <input type="hidden" name="idActe" value="'.$value['idActe'].'">
                  <button type="submit" class="buttonForm">Del</button>
                </form>';
              }
              '</td>
            </tr>';
      }
          echo'</table>';
  }
  public function printActeDel($data) {
    $routeForm = encodeRoutage(16);
    $formeBancaire = ['Liquide', 'Chéque', 'Carte bleu', 'Virement bancaire'];
    echo '<table class="compta">
      <tr>
        <th>n°transaction</th>
        <th>date transaction</th>
        <th>identification Transaction</th>
        <th>Objet</th>
        <th>Recette</th>
        <th>Depense</th>
        <th>Identité</th>
        <th>Forme bancaire</th>
        <th>Corriger</th>
      </tr>';
      foreach ($data as $key => $value) {
        echo'<tr>
              <td>'.$value['anneeExercice'].'-'.$value['idActe'].'</td>
              <td>'.dateHeure($value['dateActe']).'</td>
              <td>'.$value['numeroTransaction'].'</td>
              <td>'.$value['objet'].'</td>';
              if($value['type'] == 0){
                echo'<td id="number">0</td>
                    <td id="number">'.$value['montant'].' €</td>';
              } else {
                echo'<td id="number">'.$value['montant'].' €</td>
                    <td id="number">0 €</td>';
              }
        echo '<td>'.$value['prenom'].' '.$value['nom'].'</td>
              <td>'.$formeBancaire[$value['formeBanquaire']].'</td>
              <td><form action="'.$routeForm.'" method="post">
                <input type="hidden" name="idActe" value="'.$value['idActe'].'">
                <button type="submit" class="buttonForm">Restaurer</button>
              </form></td>
            </tr>';
      }
          echo'</table>';
  }
  public function printCompte($data) {
    $formeBancaire = ['Liquide', 'Chéque', 'Carte bleu', 'Virement bancaire'];
    echo '<table class="compta">
      <tr>
        <th>n°transaction</th>
        <th>date transaction</th>
        <th>identification Transaction</th>
        <th>Objet</th>
        <th>Recette</th>
        <th>Depense</th>
        <th>Identité</th>
        <th>Forme bancaire</th>
      </tr>';
      foreach ($data as $key => $value) {
        echo'<tr>
              <td>'.$value['anneeExercice'].'-'.$value['idActe'].'</td>
              <td>'.dateHeure($value['dateActe']).'</td>
              <td>'.$value['numeroTransaction'].'</td>
              <td>'.$value['objet'].'</td>';
              if($value['type'] == 0){
                echo'<td id="number">0</td>
                    <td id="number">'.$value['montant'].' €</td>';
              } else {
                echo'<td id="number">'.$value['montant'].' €</td>
                    <td id="number">0 €</td>';
              }
        echo '<td>'.$value['prenom'].' '.$value['nom'].'</td>
              <td>'.$formeBancaire[$value['formeBanquaire']].'</td>
            </tr>';
      }
          echo'</table>';
  }
  public function printComptePublic($data) {
    $formeBancaire = ['Liquide', 'Chéque', 'Carte bleu', 'Virement bancaire'];
    echo '<table class="compta">
      <tr>
        <th>n°transaction</th>
        <th>date transaction</th>
        <th>identification Transaction</th>
        <th>Objet</th>
        <th>Recette</th>
        <th>Depense</th>
        <th>Forme bancaire</th>
      </tr>';
      foreach ($data as $key => $value) {
        $objet = substr($value['objet'],0,34);
        if($objet == "Cotisation de 20 € pour l'année") {
          $objet = substr($value['objet'],0,47).' ***membre anonymisé***';
          $transaction = '*********';
          $type = '********';
        } else {
          $objet = $value['objet'];
            $transaction = '*********';
          $type = $formeBancaire[$value['formeBanquaire']];
        }
        echo'<tr>
              <td>'.$value['anneeExercice'].'-'.$value['idActe'].'</td>
              <td>'.dateHeure($value['dateActe']).'</td>
              <td>'.$transaction.'</td>';
              echo'<td>'.$objet.'</td>';
              if($value['type'] == 0){
                echo'<td id="number">0</td>
                    <td id="number">'.$value['montant'].' €</td>';
              } else {
                echo'<td id="number">'.$value['montant'].' €</td>
                    <td id="number">0 €</td>';
              }
        echo '<td>'.$type.'</td>
            </tr>';
      }
          echo'</table>';
  }
  public function balanceComptable($data) {
    $recette = $data[1];
    if($data[0] == '') {
      $depense = 0;
    } else {
      $depense = $data[0];
    }
    $balance = $recette - $depense;
    if ($balance > 0) {
      $balance = '+'.$balance;
    }
  echo '<table class="compta">
      <tr>
        <th>Somme recette</th>
        <th>Somme dépense</th>
        <th>Balance</th>
      </tr>
      <tr>
        <td id="number">'.round($recette, 2).' €</td>
        <td id="number">'.round($depense, 2).' €</td>
        <td id="number">'.round($balance, 2).' €</td>
      </tr>
      </table>';
  }
}
