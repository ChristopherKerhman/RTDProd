<?php
$niveau = 2;
include 'sources/securisation/securiter.php';
include 'sources/evenements/objets/evenementCommun.php';
$adminLieux = new Lieux ();
$adminLieux->addlieu($idNav, $_SESSION['role']);
$adminLieux->adminLieu($idNav);
