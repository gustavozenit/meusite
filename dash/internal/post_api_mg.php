<?php


function api_login ($api_key, $link_api, $user, $pass) {

$urlx = "http://localhost/2021/Magazine/dash/teste_api/api_login.php?";

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





}

// invalid: {"error_message": "Invalid credentials"}1


?>	



