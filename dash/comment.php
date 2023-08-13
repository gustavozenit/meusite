<?php

require_once ("internal/modulo.php");
require_once ("internal/filtro.php");
require_once ("internal/edit_db.php");


if (isset($_SESSION ['logged'])) {


$nav_html = file_get_contents ('nav.php');

$dadosQA = "SELECT* FROM comentarios_categoria order by id asc";
$conQA = $mysqli->query($dadosQA) or die($mysqli->error);
$conQB = $mysqli->query($dadosQA) or die($mysqli->error);
$conQC = $mysqli->query($dadosQA) or die($mysqli->error);

if (isset($_POST ['edit_comment'])) {
	
	
	$id_comment = filtro_txt ($_POST ['id_comment']);
	$nome_comment = filtro_txt ($_POST ['name_comment']);
	$nota_comment = filtro_txt ($_POST ['rating2']);
	$nota_type_comment = filtro_txt ($_POST ['level']);
	$recomenda_comment = filtro_txt ($_POST ['recomenda']);
	$descricao_comment = filtro_txt ($_POST ['descricao_comment']);
	
	
	$save = edit_db ("Update comentarios SET nome='$nome_comment', nota='$nota_comment', nota_type='$nota_type_comment', recomenda='$recomenda_comment', descricao='$descricao_comment'  where id=$id_comment ");
	
	if ($save == 1) {
		
	header ("Location: comment.php?edit=1");
	
	} else  {
		
	header ("Location: comment.php?edit=2");

		
	}
	
	
}

if (isset($_POST ['add_category'])) {
	
	
	$nome = filtro_txt ($_POST ['name_categoria']);

	
	
	$save = edit_db ("INSERT INTO comentarios_categoria (nome) VALUES ('$nome')");
	
	if ($save == 1) {
		
	header ("Location: comment.php?add_category=1");
	
	} else  {
		
	header ("Location: comment.php?add_category=2");

		
	}
	
	
}


if (isset($_POST ['remove_category'])) {
	
	
	$id = filtro_txt ($_POST ['comentarios_categoria']);

	
	
	$save = edit_db ("DELETE FROM comentarios_categoria WHERE id='$id'");
	
	if ($save == 1) {
		
	header ("Location: comment.php?del_category=1");
	
	} else  {
		
	header ("Location: comment.php?del_category=2");

		
	}
	
	
}


if (isset($_POST ['add_comment'])) {
	
	
	$id_categoria = filtro_txt ($_POST ['comentarios_categoria']);
	$nome_comment = filtro_txt ($_POST ['name_comment']);
	$nota_comment = filtro_txt ($_POST ['rating3']);
	$nota_type_comment = filtro_txt ($_POST ['level']);
	$recomenda_comment = filtro_txt ($_POST ['recomenda']);
	$descricao_comment = filtro_txt ($_POST ['descricao_comment']);
	
	
	$save = edit_db ("INSERT INTO comentarios (nome, nota , nota_type, recomenda, descricao, id_categoria) VALUES ('$nome_comment', '$nota_comment', '$nota_type_comment', '$recomenda_comment', '$descricao_comment', '$id_categoria')");
	
	if ($save == 1) {
		
	header ("Location: comment.php?add_comment=1");
	
	} else  {
		
	header ("Location: comment.php?add_comment=2");

		
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
    <link rel="stylesheet" href="css/rating.css">

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
			
			        <div id="modal_edit" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Editar comentário</strong></h4>
                                </div>
                                <div class="modal-body">
								
								<label>Nome</label>							
								<div class="input-group">								
								<input required name="name_comment" id="nome_txt" class="form-control" type="text" value="">								
								</div>		
								<br>
                                <label>Nota</label>							
								<div class="form-group">
                                          
                                                <div id="half-stars-example">
    <div class="rating-group">
        <input class="rating__input rating__input--none"  name="rating2" id="rating2-0" value="0" type="radio">
        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
        <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-05" value="0.5" type="radio">
        <label aria-label="1 star" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
        <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-15" value="1.5" type="radio">
        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input  class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
        <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-25" value="2.5" type="radio">
        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
        <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-35" value="3.5" type="radio">
        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
        <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-45" value="4.5" type="radio" >
        <label aria-label="5 stars" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
    </div>

</div>




										  
                                </div>			

								<br>
                                <label>Level da nota</label>							
								<div class="form-group">
								
					                 <div class="form-check">
									 
                                         <input class="form-check-input" type="radio" name="level" value="low">
                                           <label class="form-check-label">
                                             Ruim
                                          </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
										  <input class="form-check-input" type="radio" name="level" value="media">
                                           <label class="form-check-label">
                                             Média
                                          </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          
										  <input class="form-check-input" type="radio" name="level" value="good">
                                           <label class="form-check-label">
                                             Boa
                                          </label>
                                   
								   </div>			
                                </div>			

								<br>
                                <label>Recomenda?</label>							
								<div class="form-group">
					                 <div class="form-check">
									 
                                         <input class="form-check-input" type="radio" name="recomenda" value="y">
                                           <label class="form-check-label">
                                             Sim
                                          </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
										  <input class="form-check-input" type="radio" name="recomenda" value="n">
                                           <label class="form-check-label">
                                             Não
                                          </label>
                                   
								   </div>	
                                </div>
								
								<label>Comentário</label>							
								<div class="input-group">
									<textarea required maxlength="290"  name="descricao_comment" id="comment_txt" value="" class="form-control" placeholder="Digite um comentário..."></textarea>
						
								</div>
								
								<input required type="hidden" id="id_comment" name="id_comment" value="null">
								
								
								</div>
                                <div class="modal-footer">
                                    <a type="button" onClick="$('#modal_edit').css('display', 'none');" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</a>
                                    <button name="edit_comment" type="submit" class="btn btn-success delete-event waves-effect waves-light" data-dismiss="modal">Salvar</button>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
					
					 <div id="modal_categoria" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Adicionar Categoria</strong></h4>
                                </div>
                                <div class="modal-body">
								
								<label>Nome da categoria</label>							
								<div class="input-group">								
								<input required name="name_categoria" class="form-control" type="text" value="">								
								</div>		
					
								
								
								</div>
                                <div class="modal-footer">
                                    <a type="button" onClick="$('#modal_categoria').css('display', 'none');" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</a>
                                    <button name="add_category" type="submit" class="btn btn-success delete-event waves-effect waves-light" data-dismiss="modal">Adicionar</button>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
			              
						  
					<div id="modal_remove" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Remover Categoria</strong></h4>
                                </div>
                                <div class="modal-body">
								
								<small>OBS: Removendo uma categoria, você também apagará todos os comentários relacionados a ela.  </small><br><br>
								
								<label>Categoria a ser removida</label>
										<div class="form-group">
                                            <select name="comentarios_categoria" class="form-control form-control-sm">
											
                                                <?php while ($consultaQB = $conQB->fetch_array()) { ?>
												<option value="<?php echo $consultaQB ['id'] ?>" ><?php echo $consultaQB ['nome'] ?></option>
												
												<?php } ?>
                                             
                                            </select>
											
                                        </div>	
					
								
								
								</div>
                                <div class="modal-footer">
                                    <a type="button" onClick="$('#modal_remove').css('display', 'none');" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</a>
                                    <button name="remove_category" type="submit" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Remover</button>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
						  
						  
					 <div id="modal_add_comment" class="modal fade none-border show" id="event-modal" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
							<form action="comment.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Editar comentário</strong></h4>
                                </div>
                                <div class="modal-body">
								
									<label>Categoria</label>
										<div class="form-group">
                                            <select name="comentarios_categoria" class="form-control form-control-sm">
											
                                                <?php while ($consultaQC = $conQC->fetch_array()) { ?>
												<option value="<?php echo $consultaQC ['id'] ?>" ><?php echo $consultaQC ['nome'] ?></option>
												
												<?php } ?>
                                             
                                            </select>
											
                                        </div>	
								
								
								<label>Nome</label>							
								<div class="input-group">								
								<input required name="name_comment" id="nome_txt" class="form-control" type="text" value="">								
								</div>		
								<br>
                                <label>Nota</label>							
								<div class="form-group">
                                          
                                                <div id="half-stars-example">
    <div class="rating-group">
        <input class="rating__input rating__input--none"  name="rating3" id="rating3-0" value="0" type="radio">
        <label aria-label="0 stars" class="rating__label" for="rating3-0">&nbsp;</label>
        <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating3-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating3" id="rating3-05" value="0.5" type="radio">
        <label aria-label="1 star" class="rating__label" for="rating3-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating3" id="rating3-10" value="1" type="radio">
        <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating3-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating3" id="rating3-15" value="1.5" type="radio">
        <label aria-label="2 stars" class="rating__label" for="rating3-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input  class="rating__input" name="rating3" id="rating3-20" value="2" type="radio">
        <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating3-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating3" id="rating3-25" value="2.5" type="radio">
        <label aria-label="3 stars" class="rating__label" for="rating3-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating3" id="rating3-30" value="3" type="radio">
        <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating3-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating3" id="rating3-35" value="3.5" type="radio">
        <label aria-label="4 stars" class="rating__label" for="rating3-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating3" id="rating3-40" value="4" type="radio">
        <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating3-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" checked name="rating3" id="rating3-45" value="4.5" type="radio" >
        <label aria-label="5 stars" class="rating__label" for="rating3-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating3" id="rating3-50" value="5" type="radio">
    </div>

</div>




										  
                                </div>			

								<br>
                                <label>Level da nota</label>							
								<div class="form-group">
								
					                 <div class="form-check">
									 
                                         <input  class="form-check-input" type="radio" name="level" value="low">
                                           <label class="form-check-label">
                                             Ruim
                                          </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
										  <input checked class="form-check-input" type="radio" name="level" value="media">
                                           <label class="form-check-label">
                                             Média
                                          </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          
										  <input  class="form-check-input" type="radio" name="level" value="good">
                                           <label class="form-check-label">
                                             Boa
                                          </label>
                                   
								   </div>			
                                </div>			

								<br>
                                <label>Recomenda?</label>							
								<div class="form-group">
					                 <div class="form-check">
									 
                                         <input checked class="form-check-input" type="radio" name="recomenda" value="y">
                                           <label class="form-check-label">
                                             Sim
                                          </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
										  <input class="form-check-input" type="radio" name="recomenda" value="n">
                                           <label class="form-check-label">
                                             Não
                                          </label>
                                   
								   </div>	
                                </div>
								
								<label>Comentário</label>							
								<div class="input-group">
									<textarea required maxlength="290"  name="descricao_comment" id="comment_txt" value="" class="form-control" placeholder="Digite um comentário..."></textarea>
						
								</div>
																
								
								</div>
                                <div class="modal-footer">
                                    <a type="button" onClick="$('#modal_add_comment').css('display', 'none');" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</a>
                                    <button name="add_comment" type="submit" class="btn btn-success delete-event waves-effect waves-light" data-dismiss="modal">Adicionar</button>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
						  
						  
				
								<?php if (isset($_GET ['edit'])) { ?>
								
								<?php if ($_GET ['edit'] == '2') { ?>
								<div  class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Erro ao editar o comentário, tente novamente.
                                </div>
								
								<?php } else if ($_GET ['edit'] == '1') { ?>
								
								<div  class="alert alert-success alert-dismissible fade show">
                                  
                                    <strong>Sucesso:</strong> O comentário foi atualizado.
                                </div>
								
								<?php } }?>
			
			
								<?php if (isset($_GET ['add_category'])) { ?>
								
								<?php if ($_GET ['add_category'] == '2') { ?>
								<div  class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Erro ao adicionar nova categoria.
                                </div>
								
								<?php } else if ($_GET ['add_category'] == '1') { ?>
								
								<div  class="alert alert-success alert-dismissible fade show">
                                  
                                    <strong>Sucesso:</strong> Categoria adicionada com sucesso!
                                </div>
								
								<?php } }?>
								
								
								<?php if (isset($_GET ['del_category'])) { ?>
								
								<?php if ($_GET ['del_category'] == '2') { ?>
								<div  class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Erro ao remover categoria.
                                </div>
								
								<?php } else if ($_GET ['del_category'] == '1') { ?>
								
								<div  class="alert alert-success alert-dismissible fade show">
                                  
                                    <strong>Sucesso:</strong> Categoria removida com sucesso!
                                </div>
								
								<?php } }?>
								
								<?php if (isset($_GET ['add_comment'])) { ?>
								
								<?php if ($_GET ['add_comment'] == '2') { ?>
								<div  class="alert alert-danger alert-dismissible fade show">
                                  
                                    <strong>Atenção:</strong> Erro ao adicionar comentário.
                                </div>
								
								<?php } else if ($_GET ['add_comment'] == '1') { ?>
								
								<div  class="alert alert-success alert-dismissible fade show">
                                  
                                    <strong>Sucesso:</strong> Comentário adicionado com sucesso!
                                </div>
								
								<?php } }?>
								

								
			
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 onClick="art()" class="card-title">Gerenciar Comentários</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-2">
                                            <div class="list-group mb-4 " id="list-tab" role="tablist">
											 <?php while ($consultaQA = $conQA->fetch_array()) { ?>
											<a onCLick="comments('<?php echo $consultaQA ['id'] ?>')" class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab"><?php echo $consultaQA ['nome'] ?></a> 
											 <?php } ?>
											 
											<a onClick="$('#modal_categoria').css('display', 'block');" class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab">
											<i class="fa fa-plus"></i> <strong><font color="bbea00">ADD Categoria</font></strong>
											</a> 	
											<a onClick="$('#modal_remove').css('display', 'block');" class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab">
											<i class="fa fa-close"></i> <strong><font color="ff4444">DEL Categoria</font></strong>
											</a> 
											<a onClick="$('#modal_add_comment').css('display', 'block');" class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab">
											<i class="fa fa-plus"></i> <strong><font color="007fff">ADD Comentário</font></strong>
											</a> 
											
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-10">
                                            <div class="tab-content" id="nav-tabContent">
											
                                      <div class="tab-pane fade show active" id="list-home">
                             
							 
									
								
									 <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
										
						
										
                                            <tr>
                                       
                                                <th><strong>NOME</strong></th>
                                                <th><strong>NOTA</strong></th>
                                                <th><strong>LEVEL</strong></th>
                                                <th><strong>RECOMENDA</strong></th>
                                                <th><strong>COMENTÁRIO</strong></th>
												
												

                                            </tr>
                                        </thead>
										
                                        <tbody id="table_comment" >
											
										<tr>	
										
										<td></td><td></td>
										<td>										
										Selecione alguma categoria...
										</td>
										<td></td><td></td>
										</tr>
										
										
                                        </tbody>
										
                                    </table>
                                </div>
								
								
							 <center>
							 <div style="display: none;" id="loader_img" ><img width="60" src="images/new/loader_1.gif"><br>Aguarde...</div>
							 </center>
							 
							 
							 
							 
							 
							 
							 
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

</html>

<?php } else { header ('Location: login.php'); }?>