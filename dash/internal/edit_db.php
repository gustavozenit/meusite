<?php

require ('config.php');

$GLOBALS ['dbhost'] = $dbhost ;
$GLOBALS ['dbuser'] = $dbuser ;
$GLOBALS ['dbpass'] = $dbpass ;
$GLOBALS ['dbname'] = $dbname ;



function edit_db ($termos) {
	
	$mysqli = new mysqli($GLOBALS ['dbhost'], $GLOBALS ['dbuser'], $GLOBALS ['dbpass'], $GLOBALS ['dbname']);

if ($mysqli -> connect_errno)
	echo "A conexao falhou: (".$mysqli -> connect_errno.")".$mysqli -> connect_error;

$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET character_set_mysqliection=utf8");
$mysqli->query("SET character_set_client=utf8");
$mysqli->query("SET character_set_results=utf8");
	
	
	$query = $mysqli->query($termos) or die($mysqli->error);
	
	
	if (!$query) {
		
		return 0;
		
	} else {
		
		return 1;
		
	}
	
}


?>