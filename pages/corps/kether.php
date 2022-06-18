<?php
$sql = "SELECT `titre`, `sousTitre`, `description` FROM `dataSite`";
$param = [];
$read = new RCUD($sql, $param);
$dataHead = $read->READ();
$title =  $dataHead[0]['titre'];
$title2 = $dataHead[0]['sousTitre'];
$description = $dataHead[0]['description'];
require 'functions/functionDateTime.php';
