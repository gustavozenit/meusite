<?php

require_once ('config.php');



$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli -> connect_errno)
	echo "A conexao falhou: (".$mysqli -> connect_errno.")".$mysqli -> connect_error;

$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET character_set_mysqliection=utf8");
$mysqli->query("SET character_set_client=utf8");
$mysqli->query("SET character_set_results=utf8");
?>