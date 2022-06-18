
<header class="parallax-effect">

<div class="calque">
  <h1><?=$title?></h1>
  <h2><?=$title2?></h2>
  <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 4)) {
     echo '<h3 id="message">Administrer le site sur un pc</h3>';
  } ?>
  <?php include 'sources/navigation/affichages/bandeauHaut.php'; ?>
  </div>
</header>
