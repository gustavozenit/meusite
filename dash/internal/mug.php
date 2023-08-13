<?php
session_start ();

require ("conexao.php");
require ("filtro.php");
require ('function.php');


function isXmlHttpRequest()
{
    $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return (strtolower($isAjax) === 'xmlhttprequest');
}



if (isXmlHttpRequest()){
	
	

if (isset($_GET ['user'], $_GET ['pass'])) {

$user = filtro_txt ($_GET ['user']);
$pass = filtro_txt ($_GET ['pass']);
$pass = md5 ($pass);
$_SESSION ['userlog'] = $user;
$sql1="SELECT count(id) AS  total FROM users where login='$user' and pass = '$pass'";

$result=mysqli_query($mysqli,$sql1);
$values=mysqli_fetch_assoc($result);
$total_user=$values['total'];

if ($total_user > 0) {
	
	$response_login = 1;
	
} else {
	
	$response_login = 0;

}


if ($response_login == 1) {
	
$dadosVX = "SELECT* FROM configuracao where id=1";
$conVX = $mysqli->query($dadosVX) or die($mysqli->error);



while ($consultaVX = $conVX->fetch_array()) {
	
    $tokken = $consultaVX["tokken"];
    $slot = $consultaVX["slot"];

}
	
$srv = "$_SERVER[HTTP_HOST]/dash/internal/";
	

$urlx = "http://".$srv."puxar.php?key=$tokken";

$optionsx = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .  
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n",
			  'timeout' => 10 
  )
);

$contextx = stream_context_create($optionsx);
$storex = file_get_contents($urlx, false, $contextx);
	
	$json_tk = explode ('|', $storex);

	$dados = json_decode($json_tk[0]);
	$slots = json_decode($json_tk[1]);

	if ($dados->status == 1) {
		
		$response_status = 1;
		
		$url_tk = $_SERVER['HTTP_HOST'];
		$atual = "slot_$slot";
		
		if ($slots->$atual !== "Patoxy") {
			
			$response_slot = 1;
			
			if (check_expire($dados->expira)[0] == 1) {
				
				$response_expira = 1;
				
			} else {
				
				$response_expira = 0;

			}
			
			
			
			
			
		} else {
			
			$response_slot = 0;

		}
		
		
	} else {
		
		$response_status = 0;
		
	}

	
}


if (empty($response_login)) { $response_login = 0; }
if (empty($response_status)) { $response_status = 0; }
if (empty($response_slot)) { $response_slot = 0; }
if (empty($response_expira)) { $response_expira = 0; }


if ($response_login == 1 & $response_status == 1 & $response_slot == 1 & $response_expira == 1) {
	
	$_SESSION ['logged'] = 1;
	
}

echo "$response_login|$response_status|$response_slot|$response_expira";





}



} else {
	
	echo 'false';
	
}

?>