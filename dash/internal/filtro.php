<?php

function filtro_txt($sql)
{
	
	$palavras_cad = array(
	
   'from ',
   'alter table',
   'select ',
   'insert ',
   'delete ',
   'update ',
   'where ',
   'drop table',
   'show tables',
   'order ',
   'order by',
   'or 1=1',
   '<input',
   '<script>',
   ' or ',
   'declare ',
   'exec ',
   'set ',
   'eval ',
   '<form'
   
);


$formata = strtolower($sql);

	

if( preg_match( sprintf( '/%s/i', implode( '|', $palavras_cad ) ), $sql ) )
{

  $retorno = "{error}";
  
  return $retorno;



} else {
	
$retorno_1 = addslashes($sql);
$retorno_2 = htmlspecialchars ($retorno_1);

return $retorno_2;

}
}
?>