<?php
$niveau = 4;
include 'sources/securisation/securiter.php';
$idUser = filter($_GET['idUser']);
require 'sources/utilisateurs/objets/getUser.php';
require 'sources/utilisateurs/objets/printUser.php';
$user = new PrintUser();
$dataTraiter = $user->oneUser($idUser);
$user->profilUser($dataTraiter);
