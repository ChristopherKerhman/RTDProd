<?php

  require '../../sources/tresorie/objets/getCompta.php';
      $idNav = filter($_POST['idNav']);
      // Récupération de l'année d'exercice et autorisation de cloture
      $sql = "SELECT `anneeCour`,`clotureCompta` FROM `dataSite` WHERE `idDataSite` = 1";
      $void = [];
      $readDB = new RCUD($sql, $void);
      $dataAutorisation = $readDB->READ();
      // Récupération de la balance année => repport sur l'exercice année + 1
      $bilan = new GetCompta();
      $balance = $bilan-> bilan (  $dataAutorisation[0]['anneeCour']);
      if($dataAutorisation[0]['clotureCompta'] == 1) {
        //Update de la compta en cours pour la cloturer + création de l'exercice comptable suivant et fermeture de la cloture.
      $cloture = "UPDATE `compta` SET `bilan`=1 WHERE `anneeExercice` = :anneeExercice;
        UPDATE `dataSite` SET `anneeCour`= :anneeCour,`clotureCompta` = 0 WHERE `idDataSite` = 1;
        UPDATE `users` SET `cotisation` = 0 ";
        $annee = date('Y').'-'.(date('Y') + 1);
        $param = [['prep'=>':anneeExercice', 'variable'=>$dataAutorisation[0]['anneeCour']],
        ['prep'=>':anneeCour', 'variable'=>$annee]];
        $updateCloture = new RCUD($cloture,$param);
        $updateCloture->CUD();
        // Création du repport du bilan année précédente vers la nouvelle années

        // Construction de la ligne comptable
        $depense = $balance[0];
        $recette = $balance[1];
        // Definition du type d'acte comptable
        $montant = $recette - $depense;
        if(  $montant >=0 ){
          $type = 1;
        } else {
          $type = 0;
        }
        $auteurActes = $_SESSION['idUser'];
        $numeroTransaction = 'Non Applicable';
        $objet = 'Report Bilan :'.$dataAutorisation[0]['anneeCour'];
        $acte000 = [['prep'=>':numeroTransaction', 'variable'=>$numeroTransaction],
                    ['prep'=>':type', 'variable'=>$type],
                    ['prep'=>':objet', 'variable'=>$objet],
                    ['prep'=>'montant', 'variable'=>$montant],
                    ['prep'=>':formeBanquaire', 'variable'=>3],
                    ['prep'=>':anneeExercice', 'variable'=>$annee],
                    ['prep'=>':auteurActes', 'variable'=>$auteurActes],];
        // Construction des élément d'enregistrement
      $insertComptaBilan = "INSERT INTO `compta`(`numeroTransaction`, `type`, `objet`, `montant`, `formeBanquaire`, `anneeExercice`, `auteurActes`)
        VALUES (:numeroTransaction, :type, :objet, :montant, :formeBanquaire, :anneeExercice, :auteurActes)";
        $bilan = new RCUD($insertComptaBilan, $acte000);
        $bilan->CUD();
        header('location:../../index.php?message=Clorture de l\'exercice&idNav='.$idNav);
      } else {
        header('location:../../index.php?message=Vous n\'êtes pas autorisé à cloturer la comptabilité&idNav='.$idNav);
      }
