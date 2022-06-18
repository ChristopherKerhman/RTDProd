<?php

      // Controle
      if(filter($_POST['role']<=0) ||(filter($_POST['role']>4))) {
            array_push($ok, 1);
      }  else {
        array_push($ok, 0);
      }
      $idNav = filter($_POST['idNav']);
      array_pop($_POST);
      if($ok == [0, 0]) {
        $role = $_POST['role'];
        $parametre = new Preparation();
        $param = $parametre->creationPrep($_POST);
        $updateUser = "UPDATE `users` SET `role` = :role, `valide` = :valide
        WHERE `idUser` = :idUser AND `numeroAdherant` = :numeroAdherant";
        $action = new RCUD($updateUser, $param);
        $action->CUD();
        header('location:../../index.php?idNav='.$idNav.'&message=Droit utilisateur modifié.');
      } else {
            header('location:../../index.php?message=Erreur.');
      }
