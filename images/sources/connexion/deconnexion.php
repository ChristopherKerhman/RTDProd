<?php
  session_destroy();
  $_SESSION = array();
  header('location: https://rtd.graines1901.com/');
