<?php
require $cheminObjetsNavigation.'getNav.php';
require $cheminObjetsNavigation.'printNav.php';
$navigation = new PrintNav();
// Détermination du type de menu à afficher
if(isset($_SESSION['role'])) {
  $dataNav = $navigation->getMenuNav($_SESSION['role'], 0);
  $navigation->printNavigationBandeau($dataNav);
} else {
  $dataNav = $navigation->getMenuNav(0,0);
  $navigation->printNavigationBandeau($dataNav);
}
