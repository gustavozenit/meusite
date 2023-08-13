<?php

require_once ("conexao.php");


if (isset($_GET ['bin'])) {

$bin = preg_replace( '/[^0-9]/', '', $_GET ['bin'] );


$sql1="SELECT count(id) AS  total FROM bins where bin_number='$bin'";

$result=mysqli_query($mysqli,$sql1);
$values=mysqli_fetch_assoc($result);
$total_bin=$values['total'];


if ($total_bin > 0) {

$dadosQA = "SELECT* FROM bins where bin_number=$bin";
$conQA = $mysqli->query($dadosQA) or die($mysqli->error);




?>




<?php while ($consultaQA = $conQA->fetch_array()) { ?>

										
										
									<li class="list-group-item d-flex px-0 justify-content-between">
										<span class="mb-0">		

											
											<a href="#"><span id="btn_bin_white" onClick="list_bin ('w', '<?php echo $consultaQA ['bin_number'] ?>')" class="badge badge-light">Adicionar a Whitelist</span></a>						
											<a href="#"><span id="btn_bin_black" onClick="list_bin ('b', '<?php echo $consultaQA ['bin_number'] ?>')" class="badge badge-dark">Adicionar a Blacklist</span></a>
											
										</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Tipo</strong>
										<span class="mb-0"><?php echo $consultaQA ['card_type'] ?></span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Bandeira</strong>
										<span class="mb-0"><?php echo $consultaQA ['card_band'] ?></span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Level</strong>
										<span class="mb-0"><?php echo $consultaQA ['card_level'] ?></span>
									</li>
									
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Banco</strong>
										<span class="mb-0"><?php echo $consultaQA ['card_bank'] ?></span>
									</li>
									
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>País</strong>
										<span class="mb-0"><?php echo $consultaQA ['card_pais'] ?></span>
									</li>
		
										


<?php } ?>


<?php } else { echo 2 ;}?>






<?php } ?>