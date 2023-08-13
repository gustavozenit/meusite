<?php

$ali = $_POST ['code'];

$salvar = '


'.$ali.'

' ;
	
$fp = fopen("a.txt", "w");
fwrite($fp, $salvar);
fclose($fp);

?>

{"status": "<?php echo $ali ?>"}