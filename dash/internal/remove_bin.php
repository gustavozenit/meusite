<?php

require_once ("conexao.php");


if (isset($_GET ['remove'])) {

$id = preg_replace( '/[^0-9]/', '', $_GET ['remove'] );


$sql1="SELECT count(id) AS  total FROM bins where id='$id'";

$result=mysqli_query($mysqli,$sql1);
$values=mysqli_fetch_assoc($result);
$total_bin=$values['total'];


if ($total_bin > 0) {

$dadosQA = "Update bins SET white='false', black ='false' where id=$id ";
$conQA = $mysqli->query($dadosQA) or die($mysqli->error);


}

}

?>



