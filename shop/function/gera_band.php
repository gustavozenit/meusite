<?php

require ('band.php');


if (isset($_GET ['num'])) {
	
$band = preg_replace( '/[^0-9]/', '', $_GET ['num']);

$bandeira = getBand($band);

echo imgBand($bandeira);

}
?>