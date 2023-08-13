<?php

require_once ("internal/modulo.php");
require_once ("internal/filtro.php");
require_once ("internal/edit_db.php");

if (isset($_SESSION ['logged'])) {


$nav_html = file_get_contents ('nav.php');





if (isset($_POST ['test_key'])) {
	
	$api_key = filtro_txt ($_POST ['key']);
	
	$urlx = "https://2captcha.com/res.php?key=$api_key&action=getbalance";



$optionsx = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .  
              "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0",
			  
  )
);

$contextx = stream_context_create($optionsx);
$storex = file_get_contents($urlx, false, $contextx);



if ($storex == 'ERROR_KEY_DOES_NOT_EXIST') {
	
	$response = 'not_exist';
	
} else if (is_numeric($storex)) {
	
	 $save = edit_db ("Update api_login SET key_api='$api_key' where id=1 ");
	 $api_login_key = $api_key;
	
	if ($save == 1) {
		
	$response = 'success';
	
	} else  {
		
	$response = 'db_error';
		
	}
		

	
} else if ($storex == 'ERROR_WRONG_USER_KEY' ) {
	
	$response = 'lenght';
	

} else {
	
	$response = 'error';
	
}
	
}




if (isset($_POST ['test_proxy'])) {
	
$address = addslashes ($_POST ['ip']);	
$port = addslashes ($_POST ['porta']);	
$user = addslashes ($_POST ['user']);	
$pass = addslashes ($_POST ['pass']);	
	
	
if ($api_login_key != 'null') {
	
$ch = curl_init('http://ipv4.webshare.io/');
curl_setopt($ch, CURLOPT_PROXY, "http://$address:$port");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$user:$pass");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resultZ = curl_exec($ch);


if (filter_var($resultZ, FILTER_VALIDATE_IP)) {
	
	$save = edit_db ("Update api_login SET status_api = 1, ip='$address', porta='$port', user='$user', pass='$pass' where id=1 ");
	 
	
	if ($save == 1) {
		
	$response_p = 'success';
	
	} else  {
		
	$response_p = 'db_error';
		
	}
	
	
	
} else {
	
	$response_p = 'error';
	
	

}


} else {
	
	
	$response_p = 'no_key';

	
}
	
	$response = 1;
	
	
	
	
}





if ($api_login_status == 1) {


$url_1 = "https://2captcha.com/res.php?key=$api_login_key&action=getbalance";
$options_1 = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .  
              "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0",
			  
  )
);

$context_1 = stream_context_create($options_1);
$store_1 = file_get_contents($url_1, false, $context_1);


if(is_numeric($store_1)) {
	
  $saldo_key  = $store_1;

} else {
	
  $saldo_key  = 0;

}


}





?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from karciz.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Sep 2021 18:35:36 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Painel - <?php echo $_SESSION ['userlog']?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/new/genus.png" alt="">
                <img class="logo-compact" src="images/new/genus.png" alt="">
				
			
				
            </a>
			

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
			
		
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#chat">Lista</a>
					</li>
				</ul>
				<div class="tab-content">

					
					
					<div id="list_on_1" style="display: block;" class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Lista de visitantes</h6>
									<p class="mb-0"></p>
								</div>
								<a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
							
								
								
								<ul id="online_list" class="contacts">
									
									<br><br>
									
									<center>
									<img width="50" src="images/new/loader_1.gif"><br>
									Carregando...
									
									</center>

				
									
								</ul>
							</div>
						</div>
						

					
					
					</div>
					

					
					<div id="list_on_2" style="display: none;" class="tab-pane fade active show" id="chat" role="tabpanel">

						<div class="card chat dz-chat-history-box">
							<div class="card-header chat-list-header text-center">
								<a href="#" onClick="back_list()" >
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"></rect><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path></g></svg>
								</a>
								<div>
									<h6 id="nome_list" class="mb-1">... </h6>
									<p  id="etapa_list" class="mb-0 text-success">...</p>
								</div>							
								<div class="dropdown">
									<a href="javascript:;" data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li hidden="" class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
									</ul>
								</div>
								
	
					
							</div>
							
							<center>
							<br>Logs: <br>
							</center>
							
							
							
							 <div class="card">
							 <div class="card-body">
							 
	
                                        <ul id="add_log" class="list-icons">
										
                                           

                                        </ul>
                                    
                              
							  
							  
                            </div> 
							
							</div>
							
				
						</div>
					</div>

				
				
				
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div id="name_index"  class="dashboard_bar">
                               
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
			
		
                            <li hidden=""  class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:;" role="button" data-toggle="dropdown">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z" fill="#13B499"/>
									</svg>
									<div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media mr-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>

										</ul>
									</div>
                                    <a class="all-notification" href="javascript:;">See all notifications <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link" href="javascript:;">
                          
									<img width="30" src="images/new/lista.png">
						  
						  
									<div class="pulse-css"></div>
                                </a>
							</li>
							

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
                                    <img src="images/avatar/default.png" width="20" alt=""/>
									<div class="header-info">
										<span><?php echo $_SESSION ['userlog']?><i class="fa fa-caret-down ml-3" aria-hidden="true"></i></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
        
                                    <a href="sair.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
									
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
			
			
				<ul class="metismenu" id="menu">
				<?php echo $nav_html; ?>


                </ul>
            
				<div class="plus-box">
					<p class="fs-16 font-w500 mb-1">ɪʟɪᴍɪᴛᴀᴅᴏ</p>
				</div>
				<div class="copyright">
					<p class="fs-14 font-w200"><strong class="font-w400">Full</strong> © 2023 </p>
					<p> <i class="fa fa-heart text-danger"></i> Gênus 2.0 | @DuMalote</p>
					MEU TELEGRAM <a target="_blank" href="https://t.me/dumalote"><font color="7266ff">TELEGRAM</font></a>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
			
			                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">   
						
						<a href="add.php"><button type="button" class="btn btn-rounded btn-info">
						<span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Adicionar produto
                         </button></a>
						</li>
						
					</ol>
                </div>
			
				<div class="row">



                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">

                                <h4 class="card-title"> <?php if ($api_login_status == 1) { ?><font color="green"><i class="la la-power-off mr-2"></i></font><?php } else { ?> <font color="red"><i class="la la-power-off mr-2"></i></font><?php } ?></h4>
								
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link <?php if (!isset($response)) {?>active<?php } ?>" data-toggle="tab" href="#home"><i class="la la-info mr-2"></i> Sobre</a>
                                        </li>                                        
										<li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#ins"><i class="la la-list mr-2"></i> Instruções</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if (isset($response)) {?>active<?php } ?>" data-toggle="tab" href="#profile"><i class="la la-wrench mr-2"></i> Configurar</a>
                                        </li>
                     
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade <?php if (!isset($response)) {?>show active<?php } ?>" id="home" role="tabpanel">
                                            <div class="pt-4">
                                                <h4></h4>
                                                <p>A <font color="7266ff">API</font> serve para consultar se o login realizado na tela pela vítima realmente existe no site original da Magalu, além de verificar, também puxa os dados cadastrados no site original.
                                                </p>
                                                <p>Serão resgatados dados como ( NOME, CPF, EMAIL, ENDEREÇOS e CARTÕES DE CRÉDITO VINCULADOS A CONTA).
                                                </p>  
												<p>A verificação pode demorar de 15 até 40 segundos, pois depende de uma série de fatores.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ins">
										
										
                                            <div class="pt-4">
                                                <h4>2Captcha</h4>
                                                <p>1 - Crie uma conta no site: <a target="_blank" href="https://2captcha.com/auth/register" ><font color="7266ff">https://2captcha.com/</font> </a>
                                                </p>
                                                <p>2 - É necessário adicionar saldo para usar a API, a cada 3 dólares você pode testar 1000 logins, adicione no mínimo 3$ para começar, quando ficar sem saldo, a API desativa automaticamente. <a target="_blank" href="images/new/api_login_add.png"><font color="7266ff">Ver imagem</font></a>
                                                </p>                
												<p>3 - Quando o saldo já estiver na sua conta, você precisa copiar  a API KEY na página principal. <a target="_blank" href="images/new/api_login_key.png"><font color="7266ff">Ver imagem</font></a>
                                                </p>		
												
												<p>4 - Agora é só clicar no ícone &nbsp;&nbsp;<i class="la la-wrench mr-2"></i> acima e colar sua KEY.
                                                </p>
                                            </div>
											
											
											<div class="pt-4">
                                                <h4>Proxy</h4>
												
												<small>O 2Captcha trabalha em conjunto com o proxy para quebrar a verificação de login da magazine, os dois precisam estar configurados para tudo funcionar perfeitamente, caso você já tenha conhecimento sobre proxy e já possui, ignore essa parte.</small>
												<br><br>
                                                <p>1 - Crie uma conta no site: <a target="_blank" href="https://proxy.webshare.io/register/" ><font color="7266ff">https://www.webshare.io/</font> </a>
                                                </p>
                                                <p>2 - Siga exatamente todos os passos das imagens abaixo e pague.
												<br>
												<a target="_blank" href="images/new/proxy/api_1.png"><font color="7266ff">Passo 1</font></a> -
												<a target="_blank" href="images/new/proxy/api_2.png"><font color="7266ff">Passo 2</font></a> -
												<a target="_blank" href="images/new/proxy/api_3.png"><font color="7266ff">Passo 3</font></a> -
												<a target="_blank" href="images/new/proxy/api_4.png"><font color="7266ff">Passo 4</font></a> -
												<a target="_blank" href="images/new/proxy/api_5.png"><font color="7266ff">Passo 5</font></a> 
                                                </p>                
												<p>3 - Após pagar, siga os passos da imagem a seguir. <a target="_blank" href="images/new/proxy/api_6.png"><font color="7266ff">Ver imagem</font></a>
                                                </p>		
												<p>4 - Com todas informações em mãos, você já pode configurar sua API na tela. Agora é só clicar no ícone &nbsp;&nbsp;<i class="la la-wrench mr-2"></i> acima e colar as 4 informaçoes que a tela pede.
												</p>
												
												OBS: <small>Toda essa configuração pode ser reutilizada quantas vezes quiser em outras hospedagens, mas é recomendado mudar toda semana.</small>

                                            </div>
											
											
                                        </div>         

										<div class="tab-pane fade <?php if (isset($response)) {?>show active<?php } ?>" id="profile">
                                            
											

											
											<div class="pt-4">
								
								<?php if (isset($response)) {?>
								
								<?php if ($response == 'not_exist') { ?>
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                
                                    <strong>Atenção:</strong> Essa Key não existe.
                                </div>
								<?php } else if ($response == 'error') {?>
								
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Erro desconhecido.
                                </div>
								
								<?php } else if ($response == 'db_error') { ?>
								
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                 
                                    <strong>Atenção:</strong> Ocorreu algum erro ao salvar no banco de dados.
                                </div>
								
								<?php } else if ($response == 'lenght') { ?>
								
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                 
                                    <strong>Atenção:</strong> A Key precisa ter 32 caracteres.
                                </div>
										
								<?php } else if ($response == 'success') {?>	
								
								<div id="msg_error" class="alert alert-success alert-dismissible fade show">
                                
                                    <strong>Sucesso!</strong> Sua API foi ativa.
                                </div>
								
								
								<?php }} ?>
								
								
								<?php if (isset($response_p)) {?>
								
								<?php if ($response_p == 'error') { ?>
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                
                                    <strong>Atenção:</strong> Falha ao verificar o servidor de proxy, revise os dados e tente novamente.
                                </div>
								<?php } else if ($response_p == 'db_error') {?>
								
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Erro ao salvar os dados, tente novamente.
                                </div>
								
								<?php } else if ($response_p == 'no_key') {?>
								
								<div id="msg_error" class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Antes de configurar o proxy, ative uma Key 2Captcha.
                                </div>
								
										
								<?php } else if ($response_p == 'success') {?>	
								
								<div id="msg_error" class="alert alert-success alert-dismissible fade show">
                                
                                    <strong>Sucesso!</strong> Seu proxy foi salvo e a API está pronta para uso.
                                </div>
								
								
								<?php }} ?>
								
								
								
								
											
                                                <h4>API Key 2Captcha</h4>
                                         <form action="api_login.php" method="post">
										 
									    <div class="form-group">
                                            <input <?php if ($api_login_key != 'null') { ?> value="<?php echo $api_login_key ?>" <?php } ?> required class="form-control form-control-lg" name="key" type="text" placeholder="Cole sua KEY...">
                                        </div>
										
										<button name="test_key" type="submit" class="btn btn-primary">Salvar<span class="btn-icon-right"><i class="fa fa-check"></i></span>
										</button>
										
										</form>

										
                                            </div>
											
											
											
								<div class="pt-4">
								




											
                                     <h4>Dados do Proxy</h4>
                                         <form action="api_login.php" method="post">
										 
									    <div class="form-group">
                                            <input <?php if ($api_login_ip != 'null') { ?> value="<?php echo $api_login_ip ?>" <?php } ?> required class="form-control form-control-lg" name="ip" type="text" placeholder="Proxy Address...">
                                        </div>
										
										 <div class="form-group">
                                            <input <?php if ($api_login_porta != 'null') { ?> value="<?php echo $api_login_porta ?>" <?php } ?> required class="form-control form-control-lg" name="porta" type="text" placeholder="Proxy Port...">
                                        </div>
										
										 <div class="form-group">
                                            <input <?php if ($api_login_user != 'null') { ?> value="<?php echo $api_login_user ?>" <?php } ?> required class="form-control form-control-lg" name="user" type="text" placeholder="Proxy Username...">
                                        </div>
										
										 <div class="form-group">
                                            <input <?php if ($api_login_pass != 'null') { ?> value="<?php echo $api_login_pass ?>" <?php } ?> required class="form-control form-control-lg" name="pass" type="text" placeholder="Proxy Password...">
                                        </div>
										
										<button name="test_proxy" type="submit" class="btn btn-primary">Salvar<span class="btn-icon-right"><i class="fa fa-check"></i></span>
										</button>
										
										</form>

										
                                            </div>
											
											
											
                                        </div>
         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					







				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://api.whatsapp.com/send?phone=551998485812" target="_blank">Dumalote</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
	    <script src="js/plugins-init/chartjs-init.js"></script>

	
	<script src="js/jquery-3.2.1.min.js"></script>
	
</body>

<!-- Mirrored from karciz.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Sep 2021 18:35:36 GMT -->
</html>

<?php } else { header ('Location: login.php'); }?>