<?php
function anonymisation ($size) {
    $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alphaM = 'abcdefghijklmnopqrstuvwxyz';
    $num = '1234567890';
    for ($i=0; $i < 3 ; $i++) {
        $alpha = str_shuffle($alpha).$alpha;
        $alphaM = str_shuffle($alphaM).$alphaM;
        $num = str_shuffle($num).$num;
    }
    $token = NULL;
    $number = rand(0, strlen($alpha));
    $letter = substr($alpha, $number, 1);
    $token = $token.$letter;
    for ($i=0 ; $i < $size  ; $i++ ) {
      $number = rand(0, strlen($alphaM));
      $letter = substr($alphaM, $number, 1);
      $token = $token.$letter;
      //$token =  $token.substr($alpha, rand(0,strlen($alpha)));
    }
    for ($i=0; $i < 2 ; $i++) {
      $number = rand(0, strlen($num));
      $letter = substr($num, $number, 1);
      $token = $token.$letter;
    }
    return $token;
}

Class PrintEvenement extends GetEvenement {
  public function blocEvenement($variable) {
    echo '<div class="partie"><h3 class="titrePage">Nos prochains événements</h3>';
    $dataSeance = new GetEvenement();
    echo '<div class="gallery">';
        foreach ($variable as $key => $value) {

          $nbr = $dataSeance->inscrit($value['idEvenement']);
          $idMembre = $dataSeance->idInscrit($value['idEvenement']);
          echo '<aside class="item">
          <ul class="listeEvenement">
            <li><h4 class="titreEvenement">'.$value['titre'].'</h4></li>
            <li>Organisateur : '.$value['login'].'</li>
            <li>Rendez-vous : Le '.brassageDate($value['dateEvenement']).' à '.heure($value['heure']).'</li>
            <li><h5>Description séance :</h5>'.$value['texteEvenement'].'</li>';
            if($value['proprietaire'] > 0) {
                  echo'<li>Rendez-vous : Lieu privé</li>';
                } else {
                  if($value['lieuVirtuel']>0) {
                    echo $value['nomLieu'].' Lieux virtuel';
                  } else {
                    echo $value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'];
                  }
                }
            echo'<li>Nombre de personne inscrite : '.$nbr[0]['nbrJoueur'].' / '.$value['nombre'].'</li>';
            echo '<li><h5>Liste des inscrits :</h5>';
            echo '<ul class="listeMembreInscrit">';
            foreach ($idMembre as $cle => $valeur) {

              echo '<li>'.$valeur['login'].'</li>';
            }
            echo '</ul>';

            echo'</li>';
        echo'<li>Activité : '.$value['type'].'</li>
            <li>Public : '.$this->public[$value['public']].'</li>

          </ul>
          </aside>';
        }
    echo '</div>';
    echo '</div>';
  }
  public function blocEvenementPublic($variable) {

    echo '<div class="partie"><h3 class="titrePage">Nos prochains événements</h3>';
    $dataSeance = new GetEvenement();
    echo '<div class="gallery">';
        foreach ($variable as $key => $value) {

          $nbr = $dataSeance->inscrit($value['idEvenement']);
          $idMembre = $dataSeance->idInscrit($value['idEvenement']);
          echo '<aside class="item">
          <ul class="listeEvenement">
            <li><h4 class="titreEvenement">'.$value['titre'].'</h4></li>
            <li>Organisateur : '.anonymisation(rand(2,6)).'</li>
            <li>Rendez-vous : Le '.brassageDate($value['dateEvenement']).' à '.heure($value['heure']).'</li>
            <li><h5>Description séance :</h5>'.$value['texteEvenement'].'</li>';
            if($value['proprietaire'] > 0) {
                  echo'<li>Rendez-vous : Lieu privé</li>';
                } else {
                  if($value['lieuVirtuel']>0) {
                    echo $value['nomLieu'].' Lieux virtuel';
                  } else {
                    echo $value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'];
                  }
                }
            echo'<li>Nombre de personne inscrite : '.$nbr[0]['nbrJoueur'].' / '.$value['nombre'].'</li>';
            echo '<li><h5>Liste des inscrits :</h5>';
            echo '<ul class="listeMembreInscrit">';
            foreach ($idMembre as $cle => $valeur) {
              $sizeLogin = strlen($valeur['login']) + rand(1,3);
              echo '<li>'.anonymisation($sizeLogin).'</li>';
            }
            echo '</ul>';

            echo'</li>';
        echo'<li>Activité : '.$value['type'].'</li>
            <li>Public : '.$this->public[$value['public']].'</li>

          </ul>
          </aside>';
        }
    echo '</div>';
    echo '</div>';
  }
  public function InscriptionEvenement($variable, $idUser) {
    $routeInscription = encodeRoutage(29);
    $dataSeance = new GetEvenement();
    echo '<div class="gallery">';
        foreach ($variable as $key => $value) {
          $nbr = $dataSeance->inscrit($value['idEvenement']);
          $idMembre = $dataSeance->idInscrit($value['idEvenement']);
          echo '<aside class="item">
          <ul class="listeEvenement">
            <li><h4 class="titreEvenement">'.$value['titre'].'</h4></li>
            <li>Organisateur : '.$value['login'].'</li>
            <li>Rendez-vous : Le '.brassageDate($value['dateEvenement']).' à '.heure($value['heure']).'</li>
            <li><h5>Description séance :</h5>'.$value['texteEvenement'].'</li>';
            if($value['proprietaire'] > 0) {
                  echo'<li>Rendez-vous lieu privé : '.$value['nomLieu'].' '.$value['rue'].' '.$value['CP'].' '.$value['ville'].'</li>';
                } else {
                  if($value['lieuVirtuel']>0) {
                    echo $value['nomLieu'].' Lieux virtuel';
                  } else {
                    echo $value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'];
                  }
                }
            echo'<li>Nombre de personne inscrite : '.$nbr[0]['nbrJoueur'].' / '.$value['nombre'].'</li>';
            echo '<li><h5>Liste des inscrits :</h5>';
            echo '<ul class="listeMembreInscrit">';
            foreach ($idMembre as $cle => $valeur) {
              echo '<li>'.$valeur['login'].'</li>';
            }
            echo '</ul>
            </li>';
        //Inscription
        $verif = array();
        $controleInscription = new Controles();
        $verif = $controleInscription->dejaInscrit($value['idEvenement'], $idUser);
        $maximum = $controleInscription->maxInscription($value['idEvenement'], $idUser);
        if (($verif == 0)&&($maximum > 0)) {
          echo '<li><form class="flex-colonne" action="'.$routeInscription.'" method="post">
            <input type="hidden" name="idSeance" value="'.$value['idEvenement'].'" />
            <button type="submit" class="buttonForm">Inscription</button>
          </form></li>';
        } else {
          if($verif == 1) {
              echo '<li>Déjà inscrit.</li>';
          } else {
              echo '<li>Séance complète</li>';
          }

        }
        echo'<li>Activité : '.$value['type'].'</li>
            <li>Public : '.$this->public[$value['public']].'</li>';
            echo'</ul>
          </aside>';
        }
    echo '</div>';
    echo '</div>';
  }
  public function GestionEvenement($variable, $idUser) {
    $routeDesinscription = encodeRoutage(30);
    $dataSeance = new GetEvenement();
    echo '<div class="gallery">';
        foreach ($variable as $key => $value) {
          $nbr = $dataSeance->inscrit($value['idEvenement']);
          $idMembre = $dataSeance->idInscrit($value['idEvenement']);
          echo '<aside class="item">
          <ul class="listeEvenement">
            <li><h4 class="titreEvenement">'.$value['titre'].'</h4></li>
            <li>Organisateur : '.$value['login'].'</li>
            <li>Rendez-vous : Le '.brassageDate($value['dateEvenement']).' à '.heure($value['heure']).'</li>
            <li><h5>Description séance :</h5>'.$value['texteEvenement'].'</li>';
            if($value['proprietaire'] > 0) {
                  echo'<li><strong>Rendez-vous lieu privé :</strong> '.$value['nomLieu'].' '.$value['rue'].' '.$value['CP'].' '.$value['ville'].'</li>';
                } else {
                  if($value['lieuVirtuel'] > 0) {
                    echo $value['nomLieu'].' Lieux virtuel';
                  } else {
                    echo '<strong>Rendez-vous :</strong>'.$value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'];
                  }
                }
            echo'<li>Nombre de personne inscrite : '.$nbr[0]['nbrJoueur'].' / '.$value['nombre'].'</li>';
            echo '<li><h5>Liste des inscrits :</h5>';
            echo '<ul class="listeMembreInscrit">';
            foreach ($idMembre as $cle => $valeur) {
              echo '<li>'.$valeur['login'].'</li>';
            }
            echo '</ul>
            </li>';
        //Inscription
        $verif = array();
        $controleInscription = new Controles();
        $verif = $controleInscription->dejaInscrit($value['idEvenement'], $idUser);
        $maximum = $controleInscription->maxInscription($value['idEvenement'], $idUser);
        if (($verif == 1)) {
          echo '<li><form class="flex-colonne" action="'.$routeDesinscription.'" method="post">
            <input type="hidden" name="idSeance" value="'.$value['idEvenement'].'" />
            <button type="submit" class="buttonForm">Désinscription</button>
          </form></li>';
        }
        echo'<li>Activité : '.$value['type'].'</li>
            <li>Public : '.$this->public[$value['public']].'</li>';
            echo'</ul>
          </aside>';
        }
    echo '</div>';
    echo '</div>';
  }
  public function AdminEvenement($variable, $idNav) {
    $routeValide = encodeRoutage(27);
    $dataSeance = new GetEvenement();
    echo '<div class="gallery">';
        foreach ($variable as $key => $value) {
          if($value['archive']){

              $button = 'Suite ?';
          } else {
            $button = 'Modifier';
          };
          $nbr = $dataSeance->inscrit($value['idEvenement']);
          $idMembre = $dataSeance->idInscrit($value['idEvenement']);
          echo '<aside class="item">
          <ul class="listeEvenement">
            <li><h4 class="titreEvenement">'.$value['titre'].'</h4></li>
            <li>Organisateur : '.$value['login'].'</li>
            <li>Rendez-vous : Le '.brassageDate($value['dateEvenement']).' à '.heure($value['heure']).'</li>
            <li><h5>Description séance :</h5>'.$value['texteEvenement'].'</li>
            <li>';
            if($value['lieuVirtuel']>0) {
              echo $value['nomLieu'].' Lieux virtuel';
            } else {
              echo $value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'].' - valide : '.$this->yes[$value['valideLieu']];
            }
            echo'</li>
            <li>Nombre de personne inscrite : '.$nbr[0]['nbrJoueur'].' / '.$value['nombre'].'</li>';
            echo '<li><h5>Liste des inscrits :</h5>';
            echo '<ul class="listeMembreInscrit">';
            foreach ($idMembre as $cle => $valeur) {
              echo '<li>'.$valeur['login'].'</li>';
            }
            echo '</ul>';
            echo'</li>';
        echo'<li>Activité : '.$value['type'].'</li>
            <li>Public : '.$this->public[$value['public']].'</li>';
          //Administration by user
          if($value['valide'] == 1) {
            $message = 'Invalider';
            if($value['archive'] == 1) {
              $message = 'Supprimer';
            }
          } else {
            $message = 'Valider';
          }
        echo '<li>
        <form class="" action="'.$routeValide.'" method="post">
          <input type="hidden" name="idEvenement" value="'.$value['idEvenement'].'">
          <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'.$message.'</button>
        </form>
          </li>';
          echo '<li class="marginBottom"><a class="lienNav" href="index.php?idNav='.findTargetRoute(36).'&idEvenement='.$value['idEvenement'].'">Dupliquer</a></li>';
          echo '<li class="marginBottom"><a class="lienNav" href="index.php?idNav='.findTargetRoute(37).'&idEvenement='.$value['idEvenement'].'">'.$button.'</a></li>';
        echo'</ul>
          </aside>';
        }
    echo '</div>';
  }
  public function moderationEvenements($variable) {
    echo '<table class="compta">
        <tr>
        <th>Titre</th>
        <th>Date de création</th>
        <th>Date et heure de l\'événement</th>
        <th>Type d\'événement</th>
        <th>Public</th>
        <th>Identité du créateur</th>
        <th>Inscrit/max</th>
        <th>Valide</th>
        <th>Archivé</th>
        <th>Voir détail sortie</th>
      </tr>';
    foreach ($variable as $key => $value) {
      $sql = "SELECT COUNT(`idMembre`) AS `participant` FROM `participants` WHERE `idSeance` = :idSeance";
      $param = [['prep'=>':idSeance', 'variable'=>$value['idEvenement']]];
      $participants = new RCUD($sql, $param);
      $data = $participants->READ();
      if($value['archive'] == 1) {
            echo '<tr id="archive">';
      } else {
            echo '<tr>';
      }
        echo'<td>'.$value['titre'].'</td>';
        echo'<td>'.brassageDate($value['dateCreation']).'</td>';
        echo'<td>'.brassageDate($value['dateEvenement']).' - '.heure($value['heure']).'</td>';
        echo'<td>'.$value['type'].'</td>';
        echo'<td>'.$this->public[$value['public']].'</td>';
        echo'<td>'.$value['nom'].' '.$value['prenom'].' alias '.$value['login'].'</td>';
        echo'<td>'.$data[0]['participant'].' / '.$value['nombre'].'</td>';
        if($value['valide'] > 0) {
            echo'<td>'.$this->yes[$value['valide']].'</td>';
        } else {
            echo'<td id="nonValide">'.$this->yes[$value['valide']].'</td>';
        }


        echo'<td>'.$this->yes[$value['archive']].'</td>';
        echo'<td><a class="lienNav" href="index.php?idNav='.findTargetRoute(46).'&idFiche='.$value['idEvenement'].'">Fiche</a></td>';
      echo'</tr>';
    }
    echo '</table>';
  }
  public function moderationFiche($variable, $idNav) {
      $routeValide = encodeRoutage(24);
      $routeDel = encodeRoutage(25);
      $dataSeance = new GetEvenement();
    foreach ($variable as $key => $value) {
      $nbr = $dataSeance->inscrit($value['idEvenement']);
      $idMembre = $dataSeance->idInscrit($value['idEvenement']);
      echo '<aside class="item">
      <ul class="listeEvenement">
        <li><h4 class="titreEvenement">'.$value['titre'].'</h4></li>
        <li>Organisateur : '.$value['login'].'</li>
        <li>Rendez-vous : Le '.brassageDate($value['dateEvenement']).' à '.heure($value['heure']).'</li>
        <li>Statut => valide :'.$this->yes[$value['valide']].' Archive: '.$this->yes[$value['archive']].'</li>
        <li><h5>Description séance :</h5>'.$value['texteEvenement'].'</li>';
        if($value['proprietaire'] > 0) {
              echo'<li>Rendez-vous lieu privé : '.$value['nomLieu'].' '.$value['rue'].' '.$value['CP'].' '.$value['ville'].'</li>';
            } else {
              if($value['lieuVirtuel']>0) {
                echo $value['nomLieu'].' Lieux virtuel';
              } else {
                echo $value['nomLieu'].' '.$value['rue'].',  '.$value['CP'].' '.$value['ville'].' - valide : '.$this->yes[$value['valideLieu']];
              }
            }
        echo'<li>Nombre de personne inscrite : '.$nbr[0]['nbrJoueur'].' / '.$value['nombre'].'</li>';
        echo '<li><h5>Liste des inscrits :</h5>';
        echo '<ul class="listeMembreInscrit">';
        foreach ($idMembre as $cle => $valeur) {
          echo '<li>'.$valeur['login'].'</li>';
        }
        echo '</ul>
        </li>';
    echo'<li>Activité : '.$value['type'].'</li>
        <li>Public : '.$this->public[$value['public']].'</li>';
    echo '<li><strong>Administration</strong></li>';
    if($value['valide']>0) {
      $message = 'Invalider';
    } else {
      $message = 'Valider';
    }
    echo '<li>
    <form class="flex-colonne" action="'.$routeValide.'" method="post">
      <input type="hidden" name="idEvenement" value="'.$value['idEvenement'].'" />
      <button type="submit" class="buttonForm" name="idNav" value="'.$idNav.'">'.$message.'</button>
    </form>
    </li>';
    if($value['valide']<=0) {
      $message = 'Effacer définitivement';
      echo '<li>
      <form class="flex-colonne" action="'.$routeDel.'" method="post">
        <button type="submit" class="buttonForm" name="idEvenement" value="'.$value['idEvenement'].'">'.$message.'</button>
      </form>
      </li>';
    }
    echo'</ul></aside>';
    }
  }
}
