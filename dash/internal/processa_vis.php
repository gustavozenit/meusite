<?php


session_start();


require_once ("conexao.php");

if(!isset($_POST['contar'])){
	
	$data['atual'] = date('Y-m-d H:i:s');
	$data['online'] = strtotime($data['atual'] . " - 30 seconds");
	$data['online'] = date("Y-m-d H:i:s",$data['online']);
	
	$etapa = $_SESSION ['etapa_on'];
	
	if ((isset($_SESSION['visitante'])) AND (!empty($_SESSION['visitante']))) {
		
		$result_up_visita = "UPDATE visitas SET
		data_final = '" . $data['atual'] . "'
		WHERE id = '" . $_SESSION['visitante'] . "'";
		
		$resultado_up_visitas = $mysqli->query($result_up_visita);
		
	}else{
		$result_visitas = "INSERT INTO visitas (data_inicio, data_final, nome, etapa, acao, now)VALUES ('".$data['atual']."', '".$data['atual']."', 'Sem Nome', '$etapa', 'null', 0)";
		$resultado_visitas = $mysqli->query($result_visitas)or die($mysqli->error);
		

$dadosVX1 = "SELECT* FROM visitas order by id desc limit 0,1";
$conVX1 = $mysqli->query($dadosVX1) or die($mysqli->error);



while ($consultaVX1 = $conVX1->fetch_array()) {
	
    $id_visitante = $consultaVX1["id"];
	
}
	$_SESSION['visitante'] = $id_visitante;

	}
	
	

	
	$result_qnt_visitas = "SELECT count(id) AS total  FROM visitas WHERE data_final >= '" . $data['online'] . "'";

$result=mysqli_query($mysqli,$result_qnt_visitas);
$values=mysqli_fetch_assoc($result);
$row_qnt_visitas=$values['total'];

	echo $row_qnt_visitas;

}