<?php 

    $key = (isset($_GET['key']))?$_GET['key']:''; 

    $uname = (isset($_GET['uname']))?$_GET['uname']:''; 

    header('Content-Type: application/json'); 
 $URL_ATUAL =$_SERVER['HTTP_HOST'];
 


    if (!$key) { 

        $err = new stdClass;

        $err->code = 404; 

        $err->message = 'API Not found'; 

        echo json_encode($err); return; 

    } 

     

    if ($key==="Patoxy") {

          $dadosPayload = new stdClass;

        $dadosPayload->status= "1";

        $dadosPayload->expira="2023-07-18 21:54:36\n";

        $dadosPayload->name="Patoxy";

       $dadosPayload2 = new stdClass;

        $dadosPayload2->qtd="2";

        $dadosPayload2->slot_1= $URL_ATUAL;

        $dadosPayload2->slot_2= $URL_ATUAL;

        echo json_encode($dadosPayload);
echo "|";	
        echo json_encode($dadosPayload2);

        return;



        return;



    } 

    else { 

        $err = new stdClass; 

        $err->code = 404; 

        $err->message = "forbidden you don't have permission to access / on this server"; 

        echo json_encode($err); return; 

    } 

?>