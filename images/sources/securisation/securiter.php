<?php
//Securiter
$ok = identification($niveau, $_SESSION['connexionToken']);
if($ok === 0) {
session_destroy();
$_SESSION = array();
  header('location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
}
?>
