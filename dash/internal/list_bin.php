<?php

require_once ("conexao.php");
require_once ("edit_db.php");
require_once ("filtro.php");


if (isset($_GET ['bin'], $_GET ['modo'])) {

$bin = preg_replace( '/[^0-9]/', '', $_GET ['bin'] );
$modo = filtro_txt ($_GET ['modo']);

$sql1="SELECT count(id) AS  total FROM bins where bin_number='$bin'";

$result=mysqli_query($mysqli,$sql1);
$values=mysqli_fetch_assoc($result);
$total_bin=$values['total'];




if ($total_bin > 0) {


	if ($modo == 'w') {
		
	 $save = edit_db ("Update bins SET white= 'true', black = 'false' where bin_number='$bin' ");
	 echo $save;

	} else if ($modo == 'b') {
		
	 $save = edit_db ("Update bins SET white= 'false', black = 'true' where bin_number='$bin' ");
	 echo $save;

		
	} else {
	echo 2;
		
	}


	





?>






<?php } else { echo 2 ;} ?>

<?php } else { echo 2 ;} ?>