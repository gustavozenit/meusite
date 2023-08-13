<?php

session_start ();


if (isset($_SESSION ['logged'])) {
	
	$logs = $_SESSION ['log_info'];
	
	$total = count ($logs);
	$in = 0;
	
	
	
	while ($in <= $total - 1) {
		
		echo ''.$logs[$in].'&#10;';
		
		$in ++ ;
	}
	
	
	
	
	
}

?>