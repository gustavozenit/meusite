<?php
$versao = '1.0';


require_once ("../../../dash/internal/conexao.php");



$dadosVX = "SELECT* FROM configuracao where id=1";
$conVX = $mysqli->query($dadosVX) or die($mysqli->error);



while ($consultaVX = $conVX->fetch_array()) {
	
    $config_url = $consultaVX["url"];
    $config_email = $consultaVX["email"];
    $config_chave = $consultaVX["chave"];
    $config_msg_type = $consultaVX["msg_type"];
	
    $config_pass_extra = $consultaVX["pass_extra"];
	
    $config_api_login = $consultaVX["api_login"];
	
    $config_slot = $consultaVX["slot"];
	
    $config_status_tela = $consultaVX["status_tela"];
	
    $config_bin_mod = $consultaVX["bin_mod"];
	
    $config_bip_on = $consultaVX["bip_on"];
    $config_bip_cc = $consultaVX["bip_cc"];
	
}


$dadosVA = "SELECT* FROM api_login where id=1";
$conVA = $mysqli->query($dadosVA) or die($mysqli->error);



while ($consultaVA = $conVA->fetch_array()) {
	
    $api_login_key = $consultaVA["key_api"];
    $api_login_status = $consultaVA["status_api"];
	
    $api_login_ip = $consultaVA["ip"];
    $api_login_porta = $consultaVA["porta"];
    $api_login_user = $consultaVA["user"];
    $api_login_pass = $consultaVA["pass"];

	
}


?>