<?php
class PrintUser extends GetUser {
  private $role;
  private $yes;
  public function __construct() {
    $this->role = $role = ['Preinscrit', 'Membre', 'Moderateur', 'Membre du bureau', 'administrateur'];
    $this->yes = $role = ['Non', 'Oui'];
    $this->public = $public = ['Tous public', '13+', '16+', '18+'];
  }
  public function printPreInscrit ($data, $idNav) {
    if ($data == array()) {
      echo '<h4>Pas de membres préinscrits.</h4>';
    } else {
      echo '<table class="compta">
              <tr>
              <th>Numéro adhérant</th>
              <th>Prenom</th>
              <th>Nom</th>
              <th>Date pré-inscription</th>
              <th>Inscription part le bureau</th>

              </tr>';
              foreach ($data as $key => $value) {
          echo '<tr>
                  <td>'.$value['numeroAdherant'].'</td>
                  <td>'.$value['prenom'].'</td>
                  <td>'.$value['nom'].'</td>
                  <td>'.brassageDate($value['dateInscription']).'</td>
                  <td><a class="lienNav" href="index.php?idNav=8">Inscription</a></td>
                </tr>';
              }
      echo '</table>';
    }
    if($data != []) {
    echo '<h3 class="titrePage">Nettoyer les pré-inscription</h3>';
    echo '<form class="flex-colonne" action="'.encodeRoutage(10).'" method="post">
          <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">Nettoyage de toute les pré-inscription</button>
          </form>';
        }

  }
  public function printInscrit ($data, $idNav) {
    if ($data == array()) {
      echo '<h4>Pas de membres inscrits.</h4>';
    } else {
      $routeFormCotisation = encodeRoutage(12);
      $routeFormSuppression = encodeRoutage(13);
      $year = date('Y');
echo '<table class="compta">
        <tr>
        <th>Numéro adhérant</th>
        <th>Pseudonyme</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Age</th>
        <th>Type de public</th>
        <th>Date inscription</th>
        <th>Cotisation à jour ?</th>
        <th>Année de cotisation</th>
        <th>Enregistrer une cotisation</th>
        <th>Supprimer le compte</th>
        </tr>';
foreach ($data as $key => $value) {
  $by = $value['bornYear'];
  $age = $year - $by;
  if($age < 18) {
    $membre = 'Mineur';
  } else {
    $membre = 'Majeur';
  }
  echo '<tr>
          <td>'.$value['numeroAdherant'].'</td>
          <td>'.$value['login'].'</td>
          <td>'.$value['prenom'].'</td>
          <td>'.$value['nom'].'</td>
          <td>'.$age.'</td>
          <td>'.$membre.'</td>
          <td>'.brassageDate($value['dateInscription']).'</td>
          <td>'.$this->yes[$value['cotisation']].'</td>
          <td>'.year($value['dateCotisation']).'</td>
          <td>';
          if($value['cotisation'] >0) {
            echo 'Cotisation à jour pour l\'année en cours';
          } else {
            if($value['valide'] == 1) {
              echo'<form class="flex-colonne" action="'.$routeFormCotisation.'" method="post">
                      <label for="numeroTransaction">Numero du moyen de payement</label>
                      <input id="numeroTransaction" name="numeroTransaction" required />
                          <label for="type">Moyen de payement ?</label>
                          <select id="type" name="formeBanquaire">
                            <option value="0">Liquide</option>
                            <option value="1">Chéque</option>
                            <option value="2">Carte bleu</option>
                            <option value="3">Virement bancaire</option>
                          </select>
                          <input type="hidden" name="idUser" value="'.$value['idUser'].'">
                          <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">Valider la cotisation</button>
                      </form>';
          } else {
            echo 'Non disponible';
          }
        }
      echo'</td>
          <td>
          <form action="'.$routeFormSuppression.'" method="post">
          <input type="hidden" name="idUser" value="'.$value['idUser'].'">';
          if($value['valide'] == 1) {
          echo '<input type="hidden" name="valide" value="0">';
        } else {
          echo '<input type="hidden" name="valide" value="1">';
        }
        echo '<button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'; if($value['valide'] == 1)
        {echo 'Supprimer compte';} else { echo 'Restaurer compte';}
        echo '</button>
        </form>


          </td>
        </tr>';
}

echo'</table>';
    }



  }
  public function tableauUser($data, $idNav) {
    //Adressage
    $rendezVous = encodeRoutage(8);
    //Fin adressage
      echo '<h3 id="message">Tourner votre portable</h3>';
    echo '<table class="compta">';
    echo '<tr>
            <th>Numéro adhérant</th>
            <th>Pseudo</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Role</th>
            <th>Valide</th>
            <th>Role</th>
            <th>Valide</th>
            <th>Modifier</th>
            <th>Fiche</th>
            <th>Suppression de compte</th>
          </tr>';

          foreach ($data as $key => $value) {
            echo '<tr>
                    <td>'.$value['numeroAdherant'].'</td>
                    <td>'.$value['login'].'</td>
                    <td>'.$value['prenom'].'</td>
                    <td>'.$value['nom'].'</td>
                    <td>'.$this->role[$value['role']].'</td>
                    <td>'.$this->yes[$value['valide']].'</td>

                    <form  action="'.$rendezVous.'" method="post">
                      <td>
                        <select name="role">';
                          for ($i=1; $i <count($this->role); $i++) {
                            if($value['role'] == $i) {
                              echo '<option value="'.$i.'" selected>'.$this->role[$i].'</option>';
                            } else {
                              echo '<option value="'.$i.'">'.$this->role[$i].'</option>';
                            }
                          }
                        echo'</select>
                      </td>
                      <td>
                        <select name="valide">';
                          for ($i=0; $i <count($this->yes) ; $i++) {
                            if($value['valide'] == $i) {
                              echo '<option value="'.$i.'" selected>'.$this->yes[$i].'</option>';
                            } else {
                              echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
                            }
                          }

                        echo'</select>
                      </td>
                      <td>';
                      if($value['role']==0) {
                        echo '<p>Impossible de modifier</p>';
                      } else {
                        echo'
                        <input type="hidden" name="idUser" value="'.$value['idUser'].'" />
                        <input type="hidden" name="numeroAdherant" value="'.$value['numeroAdherant'].'" />
                        <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">Modifier</button>';
                      }

              echo '</form></td>
              <td><a class="lienNav" href="index.php?idNav='.findTargetRoute(30).'&idUser='.$value['idUser'].'">Fiche</a></td>
              <td>';
              if(($value['valide'] == 0)&&($value['role'] == 3)) {
                echo '<form  action="sources/utilisateurs/administration/delUser.php" method="post">
                <input type="hidden" name="numeroAdherant" value="'.$value['numeroAdherant'].'" />
                <button type="submit" class="buttonForm">Supression compte</button>
                  </form>';
              } else {
                echo 'Pas d\'action possible';
              }
              echo'</td>
          </tr>';
          }

    echo'</table>';
  }
  public function profilUser($data) {
    // Recherche de l'année en cours :
    $selectE = "SELECT`anneeCour` FROM `dataSite` WHERE `idDataSite` = 1";
    $param = [];
    $search = new RCUD($selectE, $param);
    $annee = $search->READ();

    $age = date('Y') - $data[0]['bornYear'];
    if ($age <18) {
      $commentaire = 'Mineur';
    } else {
      $commentaire = 'Majeur';
    }
  echo '
    <ul class="listeUser">
      <li>Numéro d\'adhérant : '.$data[0]['numeroAdherant'].'</li>
      <li>CGU acceptée ? : '.$this->yes[$data[0]['valide']].'</li>
      <li>Identité : '.$data[0]['prenom'].' '.$data[0]['nom'].'</li>
      <li>Adresse : '.$data[0]['adresse'].' '.$data[0]['codePostal'].' '.$data[0]['ville'].'</li>
      <li>Age : '.$age.' années terrestres</li>
      <li>Type de joueur : '.$commentaire.'</li>
      <li>Cotisation '.$annee[0]['anneeCour'].' : '.$this->yes[$data[0]['cotisation']].'</li>
      <li>Date d\'inscription : '.brassageDate($data[0]['dateInscription']).'</li>

      <li>Date de la dernière cotisation : '.brassageDate($data[0]['dateCotisation']).'</li>
      <li><a class="lienNav" href="index.php?idNav='.findTargetRoute(43).'">Voir les CGU du site ?</a></li>
    </ul>';
  }
  public function updateProfil($data, $idNav) {
    echo '  <form class="flex-colonne" action="'.encodeRoutage(32).'" method="post">
      <label for="adresse">Rue</label>
      <input id="adresse" type="text" name="adresse" value="'.$data[0]['adresse'].'" required>
      <label for="codePostal">Code postale</label>
      <input id="codePostal" type="text" name="codePostal" value="'.$data[0]['codePostal'].'" required>
      <label for="ville">Ville :</label>
      <input id="ville" type="text" name="ville" value="'.$data[0]['ville'].'" required>
      <label for="email">Email :</label>
      <input id="email" type="text" name="email" value="'.$data[0]['email'].'" required>
      <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">Mettre à jour</button>
      </form>';
  }
  public function demission($data, $idNav) {
  echo '<form class="flex-colonne" action="'.encodeRoutage(31).'" method="post">
    <label>Efface votre compte et quitter l\'association ?</label>
    <input type="hidden" name="numeroAdherant" value="'.$data[0]['numeroAdherant'].'" />
    <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">Oui</button>
    </form>';
  }
}
