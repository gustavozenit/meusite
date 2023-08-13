<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

session_start ();

require_once ("function/modulo.php");



$_SESSION ['next0'] = 1;
$rand_aval = rand (51,351);



function strip_tags_content($text) {

    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
    
 }
 

 

if (isset($_SESSION ['id_produto'])) {
	
	
	
	
$id = preg_replace( '/[^0-9]/', '', $_SESSION ['id_produto'] );



$dadosQA = "SELECT* FROM produtos where id=$id";
$conQA = $mysqli->query($dadosQA) or die($mysqli->error);

while ($consultaQA = $conQA->fetch_array()) {
	
	$valor = $consultaQA ['valor'];
	$nome = $consultaQA ['nome'];
	$desc = $consultaQA ['descricao'];
	
	$img = array(
	
     $consultaQA ['img_1'],
     $consultaQA ['img_2'],
     $consultaQA ['img_3'],
     $consultaQA ['img_4'],
     $consultaQA ['img_5'],
     $consultaQA ['img_6'],
     $consultaQA ['img_7'],
     $consultaQA ['img_8'],
     $consultaQA ['img_9']
    
	
	);
	
	
	


	$status_senha = $consultaQA ['status_senha'];
	$status_repetidas = $consultaQA ['status_repetidas'];
	
	$comentario_categoria = $consultaQA ['comentario_categoria'];
	$comentario_type = $consultaQA ['comentario_type'];
	$comentario_status = $consultaQA ['comentario_status'];
	$rating = $consultaQA ['rating'];
	
	$sku = $consultaQA ['sku'];
	$sub = $consultaQA ['sub'];
	$sub_grupo = $consultaQA ['sub_grupo'];

	
}


$desc_a = html_entity_decode ($desc);





if (!empty($img[0])) { $cont_img = 1; }
if (!empty($img[1])) { $cont_img = 2; }
if (!empty($img[2])) { $cont_img = 3; }
if (!empty($img[3])) { $cont_img = 4; }
if (!empty($img[4])) { $cont_img = 5; }
if (!empty($img[5])) { $cont_img = 6; }
if (!empty($img[6])) { $cont_img = 7; }
if (!empty($img[7])) { $cont_img = 8; }
if (!empty($img[8])) { $cont_img = 9; }


$valor_format = number_format($valor,2,",",".");
$valor_12x = number_format($valor / 12 ,2,",",".");



if ($comentario_type == 'only_good') {

$dadosQB = "SELECT* FROM comentarios where id_categoria=$comentario_categoria  and nota_type = 'good' ORDER BY ID ASC LIMIT 0,10";
$modo = 1;

} else if ($comentario_type == 'mesc_1') {
	
$dadosQB = "SELECT* FROM comentarios where id_categoria=$comentario_categoria  and nota_type = 'good' OR  id_categoria=$comentario_categoria  and nota_type = 'media' ORDER BY ID ASC LIMIT 0,10";
$modo = 2;

} else {
	
$dadosQB = "SELECT* FROM comentarios where id_categoria=$comentario_categoria  ORDER BY ID ASC LIMIT 0,10";
$modo = 3;

}

$conQB = $mysqli->query($dadosQB) or die($mysqli->error);


function rand_day () {
	
	$rand = rand (2,35);
	
	if ($rand < 30) {
		
		$string = "Há $rand dias";
		
	} else if ($rand >= 30) {
		
		$string = "Há aproximadamente 1 mês";

	}
	
	return $string;
	
	
}



$result_qnt_now = "SELECT count(id) AS total  FROM produtos WHERE sub_grupo='$sub_grupo' ";

$result_now=mysqli_query($mysqli,$result_qnt_now);
$values_now=mysqli_fetch_assoc($result_now);
$row_qnt_sub=$values_now['total'];


if ($row_qnt_sub > 1) {
	
$dadosQF = "SELECT* FROM produtos where sub_grupo=$sub_grupo";
$conQF = $mysqli->query($dadosQF) or die($mysqli->error);

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <link rel="shortcut icon" onclick="return false" href="/mixer/../assets/imgs/magazineluiza/favicon-16x16.png" />
   <link rel="apple-touch-icon-precomposed" onclick="return false" href="/mixer/../assets/imgs/magazineluiza/favicon-96x96.png" sizes="96x96" />
   <link rel="apple-touch-icon-precomposed" onclick="return false" href="/mixer/../assets/imgs/magazineluiza/favicon-72x72.png" sizes="72x72" />
   <link rel="apple-touch-icon-precomposed" onclick="return false" href="/mixer/../assets/imgs/magazineluiza/favicon-57x57.png" />
   <link rel="shortcut icon" onclick="return false" href="/mixer/../assets/imgs/magazineluiza/favicon-16x16.png" type="image/ico" />



   <link rel="stylesheet" onclick="return false" href="../assets/css/style.css">
   <link rel="stylesheet" onclick="return false" href="../assets/css/modal.css">
   <link rel="stylesheet" onclick="return false" href="../assets/font-awesome-old/css/font-awesome.min.css">



   <link rel="stylesheet" onclick="return false" href="../assets/slide/owlcarousel/assets/owl.carousel.min.css">

   <script src="../assets/slide/vendors/jquery.min.js"></script>
   <script src="../assets/slide/owlcarousel/owl.carousel.js"></script>



   <!-- bootstrap -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha512-ANkGm5vSmtDaoFA/NB1nVJzOKOiI4a/9GipFtkpMG8Rg2Bz8R1GFf5kfL0+z0lcv2X/KZRugwrAlVTAgmxgvIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="stylesheet" onclick="return false" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap-grid.css" integrity="sha512-CMBZvpj8E19AmB3ZULO2jpuOcxB0GXNaynnu3tthGhMM37FSIoBAXXj4Nmdxsu2Rrpl0nG6h141KeCS/1itkzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- bootstrap -->


   <meta charSet="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0" />
   <title>Magazine Luiza</title>


   <style>
      #overlay {
         position: fixed;
         display: ;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.5);
         z-index: 2;
         cursor: pointer;
      }
	  
	  .star-rating li {
  display: inline-block; }
  .star-rating li i {
    color: gold; }
	  
   </style>

</head>

<body >
   <div id="__next">
      <div class="sc-bdfBwQ beazo">
         <svg class="sc-gsTCUz bhdLno"></svg>
         <main class="globalStyles__Container-jqmhun-0 eckrlQ">
            <noscript>
               <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-9NCJ" width="0" heigth="0" style="display:none;visibility:hidden"></iframe></noscript>
            </noscript>
            <header class="sc-jROiwL buqilp">
               <div class="sc-ezXQAu hJdgdh">
                  <header>

                     <div onClick="show_mod ('menu')" class="sc-iktFzd gaGeRK">
                        <svg width="24" height="24" data-testid="button-burger" role="button" aria-label="abrir o menu" color="#fff" fill="#fff" viewBox="0 0 24 24" class="sc-dlfnbm jkbFGn">
                           <path d="M2 15.5v2h20v-2H2zm0-5v2h20v-2H2zm0-5v2h20v-2H2z"></path>
                        </svg>
                     </div>

                     <a onclick="return false" href="/" role="link" data-testid="logo" aria-label="ir para página inicial" class="sc-klSzut cjWSoj">
                        <svg width="87" height="19" data-testid="LogoMagaluIcon" viewBox="0 0 60 13" id="logo" color="#fff" fill="#fff" class="sc-dlfnbm Wbtjw">
                           <path d="M59.379 0.210938H58.0197C57.633 0.210938 57.3987 0.445293 57.3987 0.83198V4.85118C57.3987 6.32762 56.6018 7.15959 55.4945 7.15959C54.3286 7.15959 53.6724 6.40379 53.6724 4.94492V0.83198C53.6724 0.445293 53.438 0.210938 53.0514 0.210938H51.6921C51.3054 0.210938 51.071 0.445293 51.071 0.83198V5.13827C51.071 7.87437 52.4889 9.42698 54.6215 9.42698C55.9046 9.42698 56.8889 8.99928 57.592 8.1263L57.7092 8.67118C57.7853 9.02271 58.0197 9.21606 58.3888 9.21606H59.379C59.7656 9.21606 60 8.9817 60 8.59501V0.83198C60 0.445293 59.7715 0.210938 59.379 0.210938Z" fill="currentColor"></path>
                           <path d="M49.911 6.84906H47.4678C46.6124 6.84906 46.1671 6.40379 46.1671 5.54839V0.83198C46.1671 0.445293 45.9328 0.210938 45.5461 0.210938H44.1517C43.765 0.210938 43.5306 0.445293 43.5306 0.83198V5.87649C43.5306 7.95054 44.7903 9.21606 46.8702 9.21606H49.9168C50.3035 9.21606 50.5379 8.9817 50.5379 8.59501V7.47011C50.532 7.08342 50.2977 6.84906 49.911 6.84906Z" fill="currentColor"></path>
                           <path d="M10.3635 0.814404C10.3224 0.404281 10.1115 0.210938 9.72484 0.210938H8.69367C8.36557 0.210938 8.13122 0.345692 7.95545 0.638637L5.4537 4.86876L3.12772 0.638637C2.97539 0.345692 2.7176 0.210938 2.3895 0.210938H1.28217C0.895481 0.210937 0.684561 0.41014 0.643549 0.814404L0.00492948 8.57744C-0.0360828 9.00514 0.180696 9.21606 0.58496 9.21606H1.82705C2.21373 9.21606 2.44809 9.02271 2.46567 8.61259L2.73517 4.26529L4.22919 6.96038C4.38152 7.25333 4.63932 7.38808 4.96741 7.38808H5.82281C6.15091 7.38808 6.38527 7.27091 6.56103 6.96038L8.24839 4.07195L8.44174 8.61259C8.45931 9.02271 8.67609 9.21606 9.06278 9.21606H10.4045C10.8146 9.21606 11.0255 9.00514 10.9845 8.57744L10.3635 0.814404Z" fill="currentColor"></path>
                           <path d="M41.7261 0.21092H40.6598C40.2906 0.21092 40.0387 0.404264 39.9801 0.773374L39.9215 1.21865C39.3181 0.580031 38.4451 0 36.9862 0C34.5431 0 32.7385 1.92172 32.7385 4.69297C32.7385 7.4115 34.4259 9.42696 36.8339 9.42696C38.3455 9.42696 39.3356 8.78834 39.9391 8.12629L40.0387 8.67116C40.0973 9.0227 40.3317 9.21604 40.7008 9.21604H41.7319C42.1186 9.21604 42.353 8.98169 42.353 8.595V0.831963C42.3471 0.445276 42.1128 0.21092 41.7261 0.21092ZM37.5487 7.15957C36.1718 7.15957 35.2989 6.21043 35.2989 4.73399C35.2989 3.23997 36.2129 2.26739 37.5487 2.26739C38.9255 2.26739 39.7985 3.21653 39.7985 4.69297C39.8044 6.19285 38.8904 7.15957 37.5487 7.15957Z" fill="currentColor"></path>
                           <path d="M31.186 0.21092H30.1197C29.7506 0.21092 29.4987 0.404264 29.4401 0.773374L29.3815 1.21865C28.778 0.580031 27.9051 0 26.452 0C24.0089 0 22.2043 1.80454 22.2043 4.58166C22.2043 7.21816 23.8741 9.08129 26.2821 9.08129C27.7762 9.08129 28.6667 8.46024 29.2702 7.79819V8.24346C29.2702 9.79607 28.3972 10.7862 26.5516 10.7862C25.7783 10.7862 25.0752 10.6339 24.3604 10.3234C23.9913 10.1476 23.6984 10.2238 23.5285 10.5929L23.1008 11.4483C22.925 11.7998 22.9836 12.0869 23.3117 12.2802C24.3428 12.8603 25.6025 13.0946 26.8212 13.0946C29.8678 13.0946 31.8071 11.1729 31.8071 8.4954V0.831963C31.8071 0.445276 31.5727 0.21092 31.186 0.21092ZM27.0145 6.86662C25.6728 6.86662 24.7647 5.97607 24.7647 4.59337C24.7647 3.14037 25.7138 2.26739 27.0145 2.26739C28.3562 2.26739 29.2643 3.0642 29.2643 4.55822C29.2643 5.89991 28.3152 6.86662 27.0145 6.86662Z" fill="currentColor"></path>
                           <path d="M20.6516 0.21092H19.5853C19.2162 0.21092 18.9642 0.404264 18.9057 0.773374L18.8471 1.21865C18.2436 0.580031 17.3706 0 15.9176 0C13.4745 0 11.6699 1.92172 11.6699 4.69297C11.6699 7.4115 13.3573 9.42696 15.7653 9.42696C17.2769 9.42696 18.267 8.78834 18.8705 8.12629L18.9701 8.67116C19.0287 9.0227 19.263 9.21604 19.6322 9.21604H20.6633C21.05 9.21604 21.2844 8.98169 21.2844 8.595V0.831963C21.2726 0.445276 21.0383 0.21092 20.6516 0.21092ZM16.4801 7.15957C15.1032 7.15957 14.2303 6.21043 14.2303 4.73399C14.2303 3.23997 15.1442 2.26739 16.4801 2.26739C17.8569 2.26739 18.7299 3.21653 18.7299 4.69297C18.7299 6.19285 17.8159 7.15957 16.4801 7.15957Z" fill="currentColor"></path>
                        </svg>
                     </a>
                     <div class="sc-gNobms lkaJva">
                        <a onclick="return false" href="//sacolamobile.magazineluiza.com.br/#/" role="link" aria-label="ir para sacola" class="sc-klSzut cjWSoj">
                           <svg width="32" height="32" data-testid="ShoppingBagIcon" viewBox="0 0 32 32" id="shoppingBag" color="#fff" fill="#fff" class="sc-dlfnbm igifgv">
                              <g fill-rule="evenodd">
                                 <path d="M20.047 8h-8.124c-.8 0-1.423.917-1.423 2h11c0-1.083-.652-2-1.453-2zM23.311 12.736c-.059-.984-.89-1.736-1.898-1.736h-10.8c-1.008 0-1.839.752-1.898 1.736l-.712 10.268A1.9 1.9 0 0 0 9.902 25h12.193c1.098 0 1.988-.926 1.899-1.996l-.683-10.268zm-7.298 5.756c-2.403 0-4.361-1.91-4.361-4.223 0-.26.208-.463.475-.463s.474.202.474.463c0 1.822 1.513 3.268 3.383 3.268 1.869 0 3.382-1.475 3.382-3.268 0-.26.207-.463.474-.463s.475.202.475.463c.06 2.343-1.899 4.223-4.302 4.223z"></path>
                              </g>
                           </svg>
                        </a>
                     </div>
                  </header>
                  <div id="search-container" class="sc-idOhPF dqybPI sc-ctaXAZ cYDoHS">
                     <div data-testid="input-container" class="sc-idOhPF liohtw sc-iJuUWI fcAPnc">
                        <svg width="24" height="24" data-testid="icon-search" color="#818181" fill="#818181" viewBox="0 0 24 24" class="sc-dlfnbm hVVamT">
                           <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>
                        <form data-testid="form-search" autoComplete="off"><label for="input-search" class="sc-kLgntA iHaOcn">Procure no magalu</label>

                           <input type="search" placeholder="Procure no Magalu" value="" id="input-search" data-testid="input-search" font-size="1" class="sc-ezrdKe doQbYm" />

                        </form>
                     </div>
                  </div>
               </div>






               <hr data-testid="strip" size="5" class="sc-hJJQhR fklbpQ" />

               <div data-testid="zipcode-bar" class="sc-jEnjew fDokeh">
                  <div data-testid="container" class="sc-hBEYos gaPKKT sc-evBfig eXbgp">
                     <div class="sc-hBEYos cFdazG sc-DdDhB gcKNIO">
                        <svg width="20" height="18" data-testid="PinIcon" color="#fefefe" class="sc-dlfnbm athpA sc-fweGeb kUzkwc" fill="#fefefe" viewBox="0 0 24 24">
                           <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                        </svg>
                        <div data-testid="text-line" color="text.lightest" font-size="0" font-weight="normal" class="sc-hBEYos hnvjuf sc-joCieG gXKmMR">Ver ofertas para minha região</div>
                     </div>


                     <svg width="24" height="24" data-testid="ChevronRightIcon" color="#fefefe" class="sc-dlfnbm geCpvP sc-ibushM htnIwU" fill="#fefefe" viewBox="0 0 24 24">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                     </svg>
                  </div>
               </div>

               <!-- MENU BAR ESCONDIDO -->

               <aside id="menu" data-testid="sidebar" style="display: none" class="sc-biBrSq kXfhbA">
                  <div direction="left" data-testid="content" width="80%" display="block" height="100vh" class="sc-hBEYos jnilHf sc-hzMMCg hdKJjj">
                     <div class="sc-hBEYos ixduTQ sc-bgxajJ iUEGY">
                        <div data-testid="sidebar-header" class="sc-hBEYos bgRpod">
                           <a onclick="return false" href="https://sacolamobile.magazineluiza.com.br/#/cliente/login/" data-testid="item" class="sc-dtTInj jepJFF">
                              <div height="45px" class="sc-idOhPF jyWNZu sc-XhUPp kSRpVV">
                                 <span font-weight="medium" data-testid="item-title" class="sc-dkIXFM dNALQj">Entre ou cadastre-se</span>
                                 <svg width="24" height="24" data-testid="item-endicon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx sc-ikPAkQ jjUVhJ">
                                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                                 </svg>
                              </div>
                           </a>
                           <nav data-testid="toolbar" class="sc-iXolAE caGCmt">
                              <a data-testid="link" onclick="return false" href="https://m.magazineluiza.com.br/lojas-proximas" class="sc-kiYtDG cgMUZr sc-djErbT iHQfb sc-djErbT iHQfb" color="text.base" font-size="1">
                                 <svg width="24" height="24" data-testid="StoreIcon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx">
                                    <g fill-rule="evenodd">
                                       <path d="M12.927.38H2.073c-.27 0-.52.134-.663.356L.06 2.833c-.163.253.024.58.331.58H14.61c.306 0 .493-.327.331-.58L13.59.736c-.143-.222-.394-.357-.663-.357M2.625 8.724h4.5V6.448h-4.5v2.276zm-1.5-4.556v6.069c0 .42.336.759.75.759h6.75V6.828c0-.21.168-.38.375-.38h3c.207 0 .375.17.375.38v4.168h.75c.414 0 .75-.34.75-.759V4.168H1.125z" transform="translate(5 7)"></path>
                                    </g>
                                 </svg>
                                 Nossas lojas
                              </a>
                              <a data-testid="link" onclick="return false" href="https://meuespaco.magazineluiza.com.br/pedidos/" class="sc-kiYtDG cgMUZr sc-djErbT iHQfb sc-djErbT iHQfb" color="text.base" font-size="1">
                                 <svg width="24" height="24" data-testid="PackageIcon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx">
                                    <g fill="none">
                                       <path d="M20.4019 6.01937L12.2179 2.14528C11.8305 1.95157 11.3462 1.95157 10.9588 2.14528L2.77482 6.01937C2.33898 6.2615 2 6.79419 2 7.32688V16.6731C2 17.2542 2.33898 17.7385 2.82324 17.9806L11.0073 21.8547C11.3947 22.0484 11.8789 22.0484 12.2663 21.8547L20.4504 17.9806C20.9346 17.7385 21.2736 17.2058 21.2736 16.6731V7.32688C21.2252 6.79419 20.9346 6.2615 20.4019 6.01937ZM19.8208 7.85956C19.8208 8.00484 19.724 8.19855 19.5787 8.24697L12.1211 11.8305V19.5787C12.1211 19.8208 11.9274 20.0145 11.6852 20.0145H11.5884C11.3462 20.0145 11.1525 19.8208 11.1525 19.5787V11.8305L3.79177 8.2954C3.64649 8.24697 3.54964 8.05327 3.54964 7.90799C3.54964 7.56901 3.88862 7.3753 4.17918 7.52058L11.6368 11.0557L19.2397 7.42373C19.4818 7.32688 19.8208 7.52058 19.8208 7.85956Z" fill="currentColor"></path>
                                    </g>
                                 </svg>
                                 Meus pedidos
                              </a>
                           </nav>
                        </div>
                        <nav class="sc-bVa-die fttBxO">
                           <a data-testid="link" onclick="return false" href="https://m.magazineluiza.com.br/selecao/ofertasdodia/" width="100%" color="text.base" font-size="1" class="sc-kiYtDG gOwzXi">Veja as ofertas do dia</a>
                           <div class="sc-hBEYos dziZxi">
                              <ul data-testid="list" class="sc-eltcbb gDYPlu sc-ihsSHl hfhwhy">
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/celulares-e-smartphones/l/te/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 13 20" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path d="M11 0H2C1.46957 0 0.960888 0.210714 0.585815 0.585786C0.210743 0.960859 0 1.46957 0 2V18C0 18.5304 0.210743 19.0391 0.585815 19.4142C0.960888 19.7893 1.46957 20 2 20H11C11.5304 20 12.0392 19.7893 12.4142 19.4142C12.7893 19.0391 13 18.5304 13 18V2C13 1.46957 12.7893 0.960859 12.4142 0.585786C12.0392 0.210714 11.5304 0 11 0ZM4 1.5H9V2H4V1.5ZM6.5 18.5C6.25277 18.5 6.0111 18.4267 5.80554 18.2893C5.59998 18.152 5.43976 17.9568 5.34515 17.7284C5.25054 17.4999 5.22582 17.2486 5.27405 17.0061C5.32228 16.7637 5.44133 16.5409 5.61615 16.3661C5.79097 16.1913 6.01369 16.0722 6.25616 16.024C6.49864 15.9758 6.74999 16.0005 6.97839 16.0951C7.2068 16.1898 7.40202 16.35 7.53937 16.5555C7.67672 16.7611 7.75 17.0028 7.75 17.25C7.75 17.5815 7.61833 17.8995 7.38391 18.1339C7.14949 18.3683 6.83152 18.5 6.5 18.5ZM11 14.5H2V3.5H11V14.5Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Celular e Smartphone</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/eletrodomesticos/l/ed/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M6 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20H4C4 20.5304 4.21068 21.0391 4.58575 21.4142C4.96083 21.7893 5.46957 22 6 22Z" fill="currentColor"></path>
                                                   <path d="M17 2H6C5.46957 2 4.96083 2.21071 4.58575 2.58579C4.21068 2.96086 4 3.46957 4 4V19H19V4C19 3.46957 18.7893 2.96086 18.4142 2.58579C18.0391 2.21071 17.5304 2 17 2ZM11.5 16C10.4616 16 9.44661 15.6921 8.58325 15.1152C7.71989 14.5383 7.04696 13.7184 6.6496 12.7591C6.25224 11.7998 6.14832 10.7442 6.35089 9.72578C6.55346 8.70738 7.05343 7.77191 7.78766 7.03769C8.52188 6.30346 9.45737 5.80345 10.4758 5.60088C11.4942 5.3983 12.5498 5.50227 13.5091 5.89963C14.4684 6.29699 15.2884 6.9699 15.8652 7.83326C16.4421 8.69661 16.75 9.71165 16.75 10.75C16.7487 12.142 16.1951 13.4766 15.2108 14.4608C14.2265 15.4451 12.892 15.9987 11.5 16Z" fill="currentColor"></path>
                                                   <path d="M13.1701 10.545C13.1695 10.1186 13.3256 9.70695 13.6085 9.38804C13.8915 9.06914 14.2817 8.86522 14.7051 8.81499C14.2701 8.10094 13.6088 7.55298 12.8263 7.25837C12.0438 6.96377 11.1853 6.93948 10.3874 7.18937C9.58953 7.43925 8.89822 7.94894 8.4236 8.63725C7.94897 9.32556 7.71837 10.1529 7.76845 10.9875C7.81852 11.8221 8.14638 12.6159 8.6999 13.2425C9.25342 13.8691 10.0007 14.2925 10.8228 14.4452C11.6448 14.5979 12.4943 14.4711 13.2359 14.0851C13.9775 13.699 14.5686 13.0759 14.9151 12.315C14.6838 12.315 14.4548 12.2691 14.2415 12.1798C14.0281 12.0906 13.8346 11.9598 13.6723 11.7951C13.5099 11.6304 13.3819 11.4351 13.2957 11.2204C13.2095 11.0058 13.1667 10.7762 13.1701 10.545Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Eletrodomésticos</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/tv-e-video/l/et/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M20 6V16H4V6H20ZM20 4H4C3.46957 4 2.96083 4.21072 2.58575 4.58579C2.21068 4.96087 2 5.46957 2 6V16C2 16.5304 2.21068 17.0391 2.58575 17.4142C2.96083 17.7893 3.46957 18 4 18H20C20.5304 18 21.0391 17.7893 21.4142 17.4142C21.7893 17.0391 22 16.5304 22 16V6C22 5.46957 21.7893 4.96087 21.4142 4.58579C21.0391 4.21072 20.5304 4 20 4Z" fill="currentColor"></path>
                                                   <path d="M8.5 19H15.5C16.0304 19 16.5391 19.2107 16.9142 19.5858C17.2893 19.9609 17.5 20.4696 17.5 21H6.5C6.5 20.4696 6.71068 19.9609 7.08575 19.5858C7.46083 19.2107 7.96957 19 8.5 19Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">TV e Vídeo</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/informatica/l/in/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M18 6V13.5H6V6H18ZM18 4H6C5.46956 4 4.96086 4.21072 4.58579 4.58579C4.21071 4.96087 4 5.46957 4 6V15.5H20V6C20 5.46957 19.7893 4.96087 19.4142 4.58579C19.0391 4.21072 18.5304 4 18 4Z" fill="currentColor"></path>
                                                   <path d="M2 16.5H22V17.095C22 17.6002 21.7993 18.0848 21.442 18.442C21.0848 18.7993 20.6002 19 20.095 19H3.905C3.39976 19 2.91522 18.7993 2.55796 18.442C2.2007 18.0848 2 17.6002 2 17.095V16.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Informática</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/moveis/l/mo/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <path fill="currentColor" d="M4.766 18.111h14.4v-4.278h-14.4zM21.6 23h-1.2V11.389c0-1.013.806-1.833 1.8-1.833s1.8.82 1.8 1.833v9.167C24 21.906 22.925 23 21.6 23"></path>
                                                   <path fill="currentColor" d="M3.3 23h17.4v-3.667H3.3z"></path>
                                                   <path fill="currentColor" d="M3.6 23H2.4C1.075 23 0 21.905 0 20.556v-9.167c0-1.013.806-1.833 1.8-1.833s1.8.82 1.8 1.833V23z"></path>
                                                   <path fill="currentColor" d="M19.8 1H4.2C2.875 1 1.8 2.095 1.8 3.444v4.89c1.654 0 3 1.37 3 3.055v1.222h14.4V11.39c0-1.685 1.346-3.056 3-3.056V3.444C22.2 2.094 21.125 1 19.8 1"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Móveis</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/automotivo/l/au/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M12 5.5C13.2856 5.5 14.5423 5.88122 15.6112 6.59545C16.6801 7.30968 17.5132 8.32484 18.0052 9.51256C18.4972 10.7003 18.6259 12.0072 18.3751 13.2681C18.1243 14.529 17.5052 15.6871 16.5962 16.5962C15.6872 17.5052 14.529 18.1243 13.2681 18.3751C12.0072 18.6259 10.7003 18.4972 9.51256 18.0052C8.32484 17.5132 7.30968 16.6801 6.59545 15.6112C5.88122 14.5423 5.5 13.2856 5.5 12C5.5 10.2761 6.18483 8.62279 7.40381 7.4038C8.6228 6.18482 10.2761 5.5 12 5.5ZM12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17316C2.00434 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8078C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 9.34783 20.9464 6.8043 19.0711 4.92893C17.1957 3.05357 14.6522 2 12 2Z" fill="currentColor"></path>
                                                   <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" fill="currentColor"></path>
                                                   <path d="M9.27003 12.26C9.39622 12.3065 9.53049 12.327 9.66479 12.3204C9.7991 12.3138 9.9307 12.2802 10.0517 12.2215C10.1727 12.1629 10.2807 12.0804 10.3691 11.9791C10.4575 11.8778 10.5246 11.7597 10.5663 11.6318C10.608 11.504 10.6235 11.3691 10.6119 11.2351C10.6002 11.1011 10.5617 10.9709 10.4985 10.8522C10.4354 10.7334 10.349 10.6286 10.2444 10.5441C10.1399 10.4595 10.0194 10.3969 9.89004 10.36L7.13004 9.46002C6.8183 10.0499 6.61828 10.6924 6.54004 11.355L9.27003 12.26Z" fill="currentColor"></path>
                                                   <path d="M11.1151 13.235C10.9002 13.0801 10.6326 13.0168 10.3711 13.0589C10.1095 13.1011 9.87543 13.2454 9.72014 13.46L8.02515 15.79C8.48971 16.2764 9.03857 16.6745 9.64514 16.965L11.3401 14.635C11.4176 14.5284 11.4733 14.4076 11.5039 14.2794C11.5346 14.1513 11.5396 14.0183 11.5187 13.8882C11.4978 13.7581 11.4514 13.6334 11.3821 13.5213C11.3129 13.4092 11.2221 13.3119 11.1151 13.235Z" fill="currentColor"></path>
                                                   <path d="M12.87 13.27C12.6562 13.4261 12.5129 13.6605 12.4717 13.922C12.4304 14.1835 12.4946 14.4507 12.65 14.665L14.33 16.975C14.9385 16.6917 15.4894 16.2985 15.955 15.815L14.27 13.49C14.1927 13.3834 14.0951 13.2931 13.9829 13.2244C13.8706 13.1556 13.7458 13.1097 13.6157 13.0892C13.4856 13.0688 13.3528 13.0742 13.2248 13.1052C13.0969 13.1363 12.9763 13.1923 12.87 13.27Z" fill="currentColor"></path>
                                                   <path d="M13.465 11.6C13.5474 11.8519 13.7263 12.0607 13.9626 12.1807C14.1988 12.3007 14.473 12.322 14.725 12.24L17.46 11.355C17.3817 10.687 17.1799 10.0393 16.865 9.44501L14.11 10.355C13.8607 10.4365 13.6534 10.6126 13.5327 10.8455C13.4121 11.0784 13.3878 11.3494 13.465 11.6Z" fill="currentColor"></path>
                                                   <path d="M12 6.5C11.6642 6.50137 11.3294 6.53486 11 6.6V9.5C11 9.76522 11.1054 10.0196 11.2929 10.2071C11.4804 10.3946 11.7348 10.5 12 10.5C12.2652 10.5 12.5196 10.3946 12.7071 10.2071C12.8946 10.0196 13 9.76522 13 9.5V6.595C12.6704 6.53172 12.3356 6.49991 12 6.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Automotivo</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/eletroportateis/l/ep/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M17.4746 7.55139L18.0287 4.60065C18.0435 4.52714 18.0418 4.4512 18.0238 4.37844C18.0059 4.30569 17.9721 4.23799 17.925 4.18035C17.8779 4.12271 17.8187 4.07662 17.7518 4.04549C17.6849 4.01436 17.6119 3.99898 17.5384 4.0005H14.714C14.714 3.46993 14.5073 2.9611 14.1395 2.58593C13.7716 2.21077 13.2728 2 12.7526 2H10.3008C9.78062 2 9.2817 2.21077 8.91387 2.58593C8.54604 2.9611 8.33942 3.46993 8.33942 4.0005H5.50028C5.42673 3.99898 5.35381 4.01436 5.28689 4.04549C5.21996 4.07662 5.16075 4.12271 5.11366 4.18035C5.06657 4.23799 5.03279 4.30569 5.01483 4.37844C4.99688 4.4512 4.9952 4.52714 5.00993 4.60065L7.43713 17.4989C7.03194 17.7722 6.69947 18.1436 6.4693 18.58C6.23914 19.0163 6.11848 19.504 6.11812 19.9995V22H16.9058V19.9995C16.9055 19.504 16.7848 19.0163 16.5546 18.58C16.3245 18.1436 15.9919 17.7722 15.5867 17.4989L16.0771 14.9382C16.5688 15.0073 17.0679 14.8836 17.4737 14.5922C17.8796 14.3008 18.162 13.8633 18.2641 13.3678L18.9604 9.90198C19.0629 9.38987 18.9648 8.85718 18.6871 8.41788C18.4094 7.97859 17.9743 7.66757 17.4746 7.55139ZM11.5316 20.5046C11.2407 20.5046 10.9562 20.4166 10.7143 20.2518C10.4724 20.0869 10.2838 19.8526 10.1725 19.5784C10.0611 19.3043 10.032 19.0026 10.0888 18.7115C10.1456 18.4205 10.2857 18.1532 10.4914 17.9433C10.6971 17.7335 10.9592 17.5906 11.2446 17.5327C11.5299 17.4748 11.8257 17.5045 12.0945 17.6181C12.3633 17.7316 12.5931 17.924 12.7547 18.1707C12.9164 18.4174 13.0027 18.7075 13.0027 19.0043C13.0027 19.4022 12.8476 19.7838 12.5717 20.0652C12.2959 20.3466 11.9218 20.5046 11.5316 20.5046ZM13.9834 15.5034H9.07985L7.29007 6.001H15.7682L13.9834 15.5034Z" fill="currentColor"></path>
                                                   <path d="M13.9833 9.50189H9.07983V10.002H13.9833V9.50189Z" fill="currentColor"></path>
                                                   <path d="M13.0027 11.5024H10.0606V12.0025H13.0027V11.5024Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Eletroportáteis</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/colchoes/l/co/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <path fill="currentColor" d="M5.844 8.164c-.603 0-1.005.405-1.005 1.014v1.42h6.54v-1.42c0-.609-.401-1.014-1.005-1.014h-4.53zM19.132 9.182c0-.608-.403-1.014-1.006-1.014h-4.53c-.603 0-1.006.406-1.006 1.014v1.42h6.542v-1.42z"></path>
                                                   <path fill="currentColor" d="M3.624 6.438c0-.302.299-.609.603-.609H19.73c.3 0 .604.302.604.609v4.164h1.81V6.438c0-1.32-1.109-2.438-2.418-2.438H4.231c-1.31.104-2.417 1.118-2.417 2.438v4.164h1.81V6.438zM22.76 11.922H1.21c-.705 0-1.21.509-1.21 1.22v4.165c0 .707.505 1.216 1.206 1.216h1.207v1.221c0 .708.505 1.217 1.206 1.217.702 0 1.207-.509 1.207-1.217v-1.22h14.301v1.22c0 .708.505 1.217 1.207 1.217.706 0 1.21-.509 1.21-1.217v-1.22h1.211c.702 0 1.206-.51 1.206-1.217v-4.164c-.094-.712-.598-1.221-1.202-1.221"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Colchões</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/tablets-ipads-e-e-reader/l/tb/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M18 2H5C4.46957 2 3.96089 2.21072 3.58582 2.58579C3.21074 2.96087 3 3.46957 3 4V20C3 20.5304 3.21074 21.0391 3.58582 21.4142C3.96089 21.7893 4.46957 22 5 22H18C18.5304 22 19.0392 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V4C20 3.46957 19.7893 2.96087 19.4142 2.58579C19.0392 2.21072 18.5304 2 18 2ZM11.5 20.5C11.2528 20.5 11.0111 20.4267 10.8055 20.2893C10.6 20.152 10.4398 19.9568 10.3452 19.7284C10.2505 19.4999 10.2258 19.2486 10.274 19.0061C10.3223 18.7637 10.4413 18.5409 10.6161 18.3661C10.791 18.1913 11.0137 18.0722 11.2562 18.024C11.4986 17.9758 11.75 18.0005 11.9784 18.0952C12.2068 18.1898 12.402 18.35 12.5394 18.5555C12.6767 18.7611 12.75 19.0028 12.75 19.25C12.75 19.5815 12.6183 19.8995 12.3839 20.1339C12.1495 20.3683 11.8315 20.5 11.5 20.5ZM18 16.5H5V4H18V16.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Tablets, iPads e E-Readers</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/informatica-e-acessorios/l/ia/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M16.25 3H7.75C7.21957 3 6.71086 3.21072 6.33578 3.58579C5.96071 3.96087 5.75 4.46957 5.75 5H18.25C18.25 4.46957 18.0393 3.96087 17.6642 3.58579C17.2891 3.21072 16.7804 3 16.25 3Z" fill="currentColor"></path>
                                                   <path d="M20 5.99998H4C3.50809 5.96541 3.02236 6.12602 2.64802 6.44702C2.27368 6.76801 2.04087 7.22356 2 7.71498V16.285C2.0396 16.7769 2.27206 17.2332 2.6467 17.5545C3.02134 17.8758 3.50779 18.0359 4 18H5V19.5C5 20.0304 5.21071 20.5391 5.58578 20.9142C5.96086 21.2893 6.46957 21.5 7 21.5H17C17.5304 21.5 18.0391 21.2893 18.4142 20.9142C18.7893 20.5391 19 20.0304 19 19.5V18H20C20.4922 18.0359 20.9787 17.8758 21.3533 17.5545C21.7279 17.2332 21.9604 16.7769 22 16.285V7.71498C21.9591 7.22356 21.7263 6.76801 21.352 6.44702C20.9776 6.12602 20.4919 5.96541 20 5.99998ZM17 19.5H7V14H17V19.5ZM18.645 10.5C18.4472 10.5 18.2539 10.4413 18.0894 10.3315C17.925 10.2216 17.7968 10.0654 17.7211 9.88266C17.6454 9.69993 17.6256 9.49887 17.6642 9.30489C17.7028 9.11091 17.798 8.93272 17.9379 8.79287C18.0777 8.65302 18.2559 8.55778 18.4499 8.5192C18.6439 8.48061 18.845 8.50042 19.0277 8.5761C19.2104 8.65179 19.3666 8.77996 19.4765 8.94441C19.5864 9.10886 19.645 9.3022 19.645 9.49998C19.645 9.76519 19.5396 10.0195 19.3521 10.2071C19.1646 10.3946 18.9102 10.5 18.645 10.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Acessórios de Tecnologia</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/bebe/l/bb/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M8.81348 16.4951C8.26909 16.4951 7.73693 16.6565 7.28429 16.9589C6.83165 17.2614 6.47884 17.6913 6.27052 18.1942C6.06219 18.6972 6.00769 19.2506 6.1139 19.7845C6.2201 20.3184 6.48224 20.8089 6.86718 21.1938C7.25212 21.5788 7.74257 21.8409 8.2765 21.9471C8.81043 22.0533 9.36385 21.9988 9.8668 21.7905C10.3697 21.5822 10.7996 21.2294 11.1021 20.7767C11.4045 20.3241 11.566 19.7919 11.566 19.2475C11.566 18.5175 11.276 17.8174 10.7598 17.3012C10.2436 16.785 9.54348 16.4951 8.81348 16.4951ZM8.81348 20.3085C8.60344 20.3095 8.39781 20.2481 8.22268 20.1321C8.04755 20.0161 7.91079 19.8508 7.82972 19.657C7.74865 19.4632 7.72693 19.2498 7.7673 19.0436C7.80767 18.8375 7.90832 18.648 8.0565 18.4991C8.20468 18.3502 8.3937 18.2487 8.59964 18.2073C8.80558 18.166 9.01916 18.1867 9.21332 18.2669C9.40747 18.347 9.57346 18.483 9.69026 18.6576C9.80706 18.8322 9.86942 19.0375 9.86942 19.2475C9.86943 19.528 9.75833 19.7971 9.56045 19.996C9.36256 20.1948 9.094 20.3072 8.81348 20.3085Z" fill="currentColor"></path>
                                                   <path d="M19.6282 7.98741C19.6282 7.72196 19.5227 7.46737 19.335 7.27967C19.1473 7.09196 18.8927 6.98651 18.6273 6.98651C18.3618 6.98651 18.1072 7.09196 17.9195 7.27967C17.7318 7.46737 17.6264 7.72196 17.6264 7.98741V9.48876H5C5 9.68394 5 9.87911 5.03504 10.0743C5.26477 11.8975 6.17031 13.5681 7.57259 14.7557C8.97487 15.9433 10.7718 16.5614 12.6079 16.4878C14.444 16.4142 16.1857 15.6542 17.4884 14.3582C18.7912 13.0622 19.5601 11.3245 19.6432 9.48876L19.6282 7.98741Z" fill="currentColor"></path>
                                                   <path d="M12.3117 2.50248C12.3119 2.43279 12.2977 2.36381 12.2698 2.29996C12.2418 2.23611 12.2009 2.17879 12.1495 2.13168C12.0982 2.08457 12.0376 2.0487 11.9715 2.02638C11.9055 2.00405 11.8356 1.99576 11.7662 2.00203C10.0589 2.12489 8.44899 2.84367 7.21777 4.03281C5.98655 5.22196 5.21225 6.80588 5.03012 8.50788H12.3117V2.50248Z" fill="currentColor"></path>
                                                   <path d="M16.3202 18.1916C16.5302 18.1916 16.7356 18.2539 16.9101 18.3707C17.0847 18.4875 17.2207 18.6535 17.3009 18.8477C17.381 19.0418 17.4017 19.2554 17.3604 19.4614C17.319 19.6673 17.2175 19.8563 17.0686 20.0045C16.9197 20.1527 16.7302 20.2533 16.5241 20.2937C16.318 20.3341 16.1045 20.3124 15.9107 20.2313C15.7169 20.1502 15.5516 20.0135 15.4356 19.8383C15.3196 19.6632 15.2582 19.4576 15.2592 19.2475C15.2606 18.967 15.3729 18.6984 15.5718 18.5006C15.7706 18.3027 16.0397 18.1916 16.3202 18.1916ZM16.3202 16.4951C15.7758 16.4951 15.2436 16.6565 14.791 16.9589C14.3384 17.2614 13.9856 17.6913 13.7772 18.1942C13.5689 18.6972 13.5144 19.2506 13.6206 19.7845C13.7268 20.3184 13.989 20.8089 14.3739 21.1938C14.7588 21.5788 15.2493 21.8409 15.7832 21.9471C16.3171 22.0533 16.8706 21.9988 17.3735 21.7905C17.8765 21.5822 18.3063 21.2294 18.6088 20.7767C18.9112 20.3241 19.0727 19.7919 19.0727 19.2475C19.0727 18.5175 18.7827 17.8174 18.2665 17.3012C17.7503 16.785 17.0502 16.4951 16.3202 16.4951Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Bebês</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/audio/l/ea/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <g fill="currentColor">
                                                      <path d="M12.5 16.8c-.67 0-1.214-.537-1.214-1.2 0-.663.543-1.2 1.214-1.2.67 0 1.214.537 1.214 1.2 0 .663-.543 1.2-1.214 1.2m0-6c-2.678 0-4.857 2.153-4.857 4.8s2.179 4.8 4.857 4.8c2.678 0 4.857-2.153 4.857-4.8s-2.179-4.8-4.857-4.8M12.5 6.6c.67 0 1.214-.538 1.214-1.2 0-.662-.544-1.2-1.214-1.2-.67 0-1.214.538-1.214 1.2 0 .662.544 1.2 1.214 1.2"></path>
                                                      <path d="M12.5 21.6c-3.353 0-6.071-2.686-6.071-6s2.718-6 6.071-6c3.353 0 6.071 2.686 6.071 6s-2.718 6-6.071 6m0-18.6c1.341 0 2.429 1.075 2.429 2.4S13.84 7.8 12.5 7.8c-1.341 0-2.429-1.075-2.429-2.4S11.16 3 12.5 3m6.071-3H6.43C5.087 0 4 1.075 4 2.4v19.2C4 22.925 5.087 24 6.429 24H18.57C19.913 24 21 22.925 21 21.6V2.4C21 1.075 19.913 0 18.571 0"></path>
                                                   </g>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Áudio</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/esporte-e-lazer/l/es/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M9.27026 6.95532H5.25771C4.7037 6.95532 4.25458 7.40392 4.25458 7.9573C4.25458 8.51067 4.7037 8.95927 5.25771 8.95927H9.27026C9.82428 8.95927 10.2734 8.51067 10.2734 7.9573C10.2734 7.40392 9.82428 6.95532 9.27026 6.95532Z" fill="currentColor"></path>
                                                   <path d="M21.8294 3.22802C21.9474 3.08428 22.0079 2.90195 21.9992 2.71626C21.9904 2.53057 21.9132 2.3547 21.7822 2.22263C21.6512 2.09056 21.4759 2.01167 21.29 2.00119C21.1042 1.99072 20.9211 2.04941 20.7761 2.16593L17.5861 5.35221C17.516 5.42194 17.4603 5.5048 17.4222 5.59604C17.3841 5.68729 17.3644 5.78513 17.3641 5.88399C17.3639 5.98284 17.3832 6.08078 17.4208 6.1722C17.4585 6.26362 17.5138 6.34674 17.5836 6.4168C17.6535 6.48687 17.7364 6.54251 17.8277 6.58056C17.9191 6.61861 18.017 6.63831 18.116 6.63854C18.215 6.63877 18.313 6.61953 18.4046 6.58192C18.4961 6.5443 18.5793 6.48905 18.6495 6.41931L19.2814 5.8081V16.4791L10.0375 10.7779C9.34849 10.3504 8.56983 10.0879 7.7624 10.0107C6.95496 9.93357 6.14061 10.0439 5.38295 10.3332C4.62529 10.6225 3.94481 11.0828 3.39474 11.6782C2.84466 12.2736 2.43988 12.988 2.21196 13.7655C1.98405 14.543 1.93922 15.3627 2.08094 16.1604C2.22266 16.9581 2.54707 17.7123 3.02891 18.3641C3.51074 19.0158 4.13695 19.5474 4.85854 19.9175C5.58013 20.2875 6.3776 20.4858 7.18864 20.497V21.499C7.18864 21.6319 7.24146 21.7593 7.33553 21.8533C7.42959 21.9472 7.55719 22 7.69021 22H10.1981C10.3311 22 10.4586 21.9472 10.5527 21.8533C10.6467 21.7593 10.6996 21.6319 10.6996 21.499V20.497H15.5899V21.499C15.5899 21.6319 15.6427 21.7593 15.7368 21.8533C15.8309 21.9472 15.9585 22 16.0915 22H18.5993C18.7323 22 18.8599 21.9472 18.9539 21.8533C19.048 21.7593 19.1009 21.6319 19.1009 21.499V20.497H19.3566C19.8773 20.4801 20.371 20.2616 20.7333 19.8876C21.0956 19.5136 21.298 19.0135 21.2977 18.4931V3.80416L21.8294 3.22802ZM7.28391 18.4781C6.63911 18.4781 6.00878 18.2871 5.47265 17.9293C4.93651 17.5714 4.51863 17.0629 4.27187 16.4678C4.02511 15.8728 3.96056 15.218 4.08635 14.5864C4.21215 13.9547 4.52266 13.3744 4.97861 12.919C5.43455 12.4636 6.01547 12.1535 6.64789 12.0278C7.28031 11.9022 7.9358 11.9666 8.53153 12.2131C9.12725 12.4596 9.63642 12.877 9.99466 13.4125C10.3529 13.948 10.5441 14.5776 10.5441 15.2216C10.5441 16.0853 10.2006 16.9136 9.58922 17.5243C8.97781 18.135 8.14857 18.4781 7.28391 18.4781Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Esporte e Lazer</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/utilidades-domesticas/l/ud/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path fill="currentColor" d="M22.8 10.125H1.2c-.663 0-1.2.531-1.2 1.188 0 .656.537 1.187 1.2 1.187h1.2v4.75C2.4 19.873 4.55 22 7.2 22h9.6c2.65 0 4.8-2.127 4.8-4.75V12.5h1.2c.662 0 1.2-.531 1.2-1.188 0-.656-.538-1.187-1.2-1.187M18 5.375h-2.1C15.9 4.063 14.825 3 13.5 3h-3C9.175 3 8.1 4.063 8.1 5.375H6c-1.988 0-3.6 1.595-3.6 3.563h19.2c0-1.968-1.612-3.563-3.6-3.563"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Utilidades Domésticas</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/comercio-e-industria/l/pi/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M6 18.5V20C6 20.5304 6.21071 21.0391 6.58578 21.4142C6.96086 21.7893 7.46957 22 8 22H16.5C17.0304 22 17.5391 21.7893 17.9142 21.4142C18.2893 21.0391 18.5 20.5304 18.5 20V18.5H6ZM16.5 20.5H8V20H16.5V20.5Z" fill="currentColor"></path>
                                                   <path d="M16.5 2H8C7.46957 2 6.96086 2.21072 6.58578 2.58579C6.21071 2.96087 6 3.46957 6 4V17.5H18.5V4C18.5 3.46957 18.2893 2.96087 17.9142 2.58579C17.5391 2.21072 17.0304 2 16.5 2ZM11 14.5C11 14.7652 10.8946 15.0196 10.7071 15.2071C10.5196 15.3946 10.2652 15.5 10 15.5H9C8.73478 15.5 8.48043 15.3946 8.29289 15.2071C8.10536 15.0196 8 14.7652 8 14.5V4H11V14.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Comércio e Indústria</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/ar-e-ventilacao/l/ar/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 17 17" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path d="M8.5 0C6.81886 0 5.17547 0.498516 3.77766 1.43251C2.37984 2.3665 1.29037 3.69402 0.647028 5.24719C0.00368291 6.80036 -0.164645 8.50943 0.163329 10.1583C0.491303 11.8071 1.30085 13.3217 2.4896 14.5104C3.67834 15.6992 5.1929 16.5087 6.84174 16.8367C8.49057 17.1646 10.1996 16.9963 11.7528 16.353C13.306 15.7096 14.6335 14.6202 15.5675 13.2223C16.5015 11.8245 17 10.1811 17 8.5C17 6.24566 16.1045 4.08365 14.5104 2.48959C12.9164 0.895533 10.7543 0 8.5 0ZM8.5 7.145C8.76778 7.14599 9.02926 7.2263 9.25143 7.37579C9.4736 7.52527 9.6465 7.73724 9.74829 7.98492C9.85008 8.2326 9.8762 8.50488 9.82336 8.7674C9.77051 9.02991 9.64106 9.27088 9.45137 9.45988C9.26167 9.64888 9.02022 9.77744 8.75752 9.82932C8.49481 9.8812 8.22262 9.85407 7.97532 9.75137C7.72802 9.64867 7.51669 9.47499 7.36802 9.25227C7.21935 9.02956 7.14001 8.76778 7.14 8.5C7.14133 8.14017 7.2852 7.79553 7.5401 7.54157C7.79501 7.2876 8.14017 7.145 8.5 7.145ZM2.12 7.22C2.30421 6.50675 2.58015 5.82207 2.95 5.185C3.32019 4.54756 3.77799 3.96522 4.31 3.455C4.48559 3.28472 4.6981 3.15725 4.93099 3.08249C5.16389 3.00774 5.41089 2.98773 5.65278 3.02401C5.89467 3.0603 6.12492 3.1519 6.32564 3.29169C6.52635 3.43148 6.6921 3.6157 6.81 3.83L8.205 6.265C7.87754 6.30707 7.56347 6.42118 7.28535 6.5991C7.00724 6.77703 6.77201 7.01436 6.59655 7.29403C6.4211 7.57371 6.30978 7.88878 6.27061 8.2166C6.23144 8.54443 6.26538 8.87686 6.37 9.19H3.68C3.43783 9.19147 3.19849 9.13778 2.98016 9.03299C2.76182 8.92821 2.57021 8.77507 2.41986 8.58521C2.26952 8.39535 2.16438 8.17375 2.11242 7.9372C2.06047 7.70066 2.06306 7.45539 2.12 7.22ZM10.615 14.72C9.22565 15.1134 7.75436 15.1134 6.365 14.72C6.13833 14.6493 5.9308 14.5277 5.75822 14.3646C5.58564 14.2016 5.45257 14.0012 5.36914 13.7789C5.28571 13.5566 5.25414 13.3182 5.27681 13.0818C5.29949 12.8455 5.37583 12.6174 5.5 12.415L6.865 10.08C7.07941 10.3022 7.33708 10.4781 7.62211 10.5969C7.90714 10.7157 8.21348 10.7748 8.52224 10.7706C8.831 10.7663 9.13562 10.6989 9.4173 10.5724C9.69898 10.4459 9.95175 10.263 10.16 10.035L11.54 12.43C11.6589 12.6332 11.7302 12.8607 11.7484 13.0954C11.7666 13.3301 11.7313 13.5658 11.6451 13.7849C11.5589 14.004 11.4241 14.2006 11.2509 14.36C11.0776 14.5194 10.8705 14.6373 10.645 14.705L10.615 14.72ZM13.24 9.22H10.625C10.6987 9.00248 10.7375 8.77466 10.74 8.545C10.746 8.24564 10.6926 7.94806 10.5831 7.6694C10.4736 7.39074 10.31 7.1365 10.1018 6.92132C9.89359 6.70614 9.64487 6.53428 9.36996 6.41563C9.09506 6.29699 8.7994 6.2339 8.5 6.23C8.565 6.23 8.63 6.23 8.695 6.23L10.14 3.73C10.2618 3.51987 10.4294 3.33991 10.6304 3.20353C10.8314 3.06715 11.0605 2.97786 11.3008 2.9423C11.5411 2.90674 11.7863 2.92583 12.0181 2.99815C12.25 3.07047 12.4626 3.19416 12.64 3.36C13.7174 4.40355 14.4797 5.72897 14.84 7.185C14.8993 7.42325 14.9035 7.67188 14.8523 7.91199C14.801 8.15211 14.6957 8.37738 14.5444 8.57068C14.393 8.76399 14.1995 8.92024 13.9787 9.02755C13.7579 9.13487 13.5155 9.19042 13.27 9.19L13.24 9.22Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Ar e Ventilação</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/artesanato/l/am/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <path fill="currentColor" d="M16.12 8.499c0-.416-.31-.753-.691-.753H4.406c-.382 0-.692.337-.692.753v.373c0 .416.31.752.692.752H15.43c.382 0 .692-.336.692-.752v-.373zM16.12 11.523c0-.416-.31-.753-.691-.753H4.406c-.382 0-.692.337-.692.753v.373c0 .416.31.753.692.753H15.43c.382 0 .692-.337.692-.753v-.373zM16.12 14.548c0-.416-.31-.753-.691-.753H4.406c-.382 0-.692.337-.692.753v.373c0 .416.31.752.692.752H15.43c.382 0 .692-.336.692-.752v-.373zM15.429 16.82H4.406c-.382 0-.692.336-.692.752v.373c0 .416.31.753.692.753H15.43c.382 0 .692-.337.692-.753v-.373c0-.416-.31-.753-.692-.753M3.33 3.573h13.174c.735 0 1.33-.649 1.33-1.449S17.24.677 16.505.677H3.33C2.596.677 2 1.325 2 2.124c0 .8.596 1.449 1.33 1.449M16.504 19.847H3.331c-.735 0-1.33.648-1.33 1.448 0 .8.595 1.448 1.33 1.448h13.173c.735 0 1.33-.648 1.33-1.448 0-.8-.595-1.448-1.33-1.448"></path>
                                                   <path fill="currentColor" d="M22.445 16.506a1.94 1.94 0 0 1-1.486-.522 2.198 2.198 0 0 1-.477-1.431V9.235c0-.033-.014-.061-.018-.092.005-.035.02-.064.02-.1.055-1.205-.312-2.38-1.007-3.231-.697-.746-1.598-1.135-2.52-1.086h-1.75c-.007 0-.012-.005-.018-.005H4.506c-.37 0-.671.337-.671.753v.373c0 .416.3.753.671.753h7.178c.04.007.078.015.12.015h5.23c.512-.018 1.011.191 1.407.59.372.5.558 1.167.514 1.843.002.04.01.079.017.118-.003.024-.014.045-.014.069v5.24c-.04.937.275 1.854.877 2.562a3.366 3.366 0 0 0 2.606 1.025.771.771 0 0 0 .708-.72.774.774 0 0 0-.704-.836"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Artesanato</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/artigos-para-festa/l/af/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 25 40" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <g transform="translate(-8.000000, 0.000000)">
                                                      <g transform="translate(8.000000, -1.000000)">
                                                         <g transform="translate(0.000000, 0.124200)">
                                                            <polygon id="path-1" points="0.0003 0.876 24.702 0.876 24.702 29.9794 0.0003 29.9794"></polygon>
                                                            <path fill="currentColor" d="M24.7023,12.6384 C24.7023,7.0754 20.7173,0.8754 12.3433,0.8754 C3.9693,0.8754 0.0003,7.0754 0.0003,12.6384 C0.0003,17.0724 2.9363,24.8264 10.1483,27.2464 L8.9553,29.4224 C8.7933,29.7344 8.9553,29.9794 9.3423,29.9794 L15.4253,29.9794 C15.7963,29.9794 15.9573,29.7344 15.7963,29.4224 L14.5213,27.2464 C21.5723,24.7114 24.7023,17.0724 24.7023,12.6384"></path>
                                                         </g>
                                                         <path fill="currentColor" d="M13.6661,33.307 L13.5851,33 L11.2941,33 L11.4881,33.549 C11.8391,34.543 11.6131,35.6 11.0681,36.502 C10.4221,37.572 10.3151,38.871 10.4231,40.116 C10.4291,40.18 10.4291,40.229 10.4341,40.293 C10.4691,40.822 10.9701,41.22 11.5041,41.213 C12.0681,41.241 12.5671,40.81 12.5851,40.245 C12.5861,40.204 12.5871,40.116 12.5851,40.083 C12.5251,39.094 12.6341,38.102 13.0691,37.212 C13.7901,36.045 14.0051,34.636 13.6661,33.307"></path>
                                                      </g>
                                                   </g>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Artigos para Festa</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/beleza-e-perfumaria/l/pf/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M18.9893 15.0902C18.8778 13.24 18.0891 11.4954 16.7734 10.1889C15.4576 8.88233 13.7068 8.10519 11.8546 8.00549H11.4997C9.87121 8.00549 8.28699 8.53516 6.98641 9.51448C5.68583 10.4938 4.73956 11.8695 4.29062 13.4338C3.84168 14.9981 3.91446 16.6659 4.49794 18.1851C5.08143 19.7044 6.14393 20.9926 7.52487 21.8551C7.6758 21.9467 7.84831 21.9967 8.02484 22H14.9295C15.1159 21.9998 15.2989 21.9498 15.4595 21.8551C16.6001 21.1466 17.5294 20.1451 18.1503 18.9551C18.7712 17.7651 19.061 16.4303 18.9893 15.0902ZM16.7744 16.9888H6.21493C5.98318 16.1718 5.94403 15.3123 6.10053 14.4777C6.25703 13.643 6.60495 12.856 7.11696 12.1783C7.62897 11.5006 8.29114 10.9507 9.05156 10.5717C9.81197 10.1928 10.6499 9.995 11.4997 9.994H11.7647C13.1218 10.0688 14.404 10.6395 15.3674 11.5976C16.3308 12.5557 16.9081 13.8343 16.9894 15.1901C17.0198 15.7975 16.9471 16.4056 16.7744 16.9888Z" fill="currentColor"></path>
                                                   <path d="M8.99983 3.9985H9.49981V6.49663C9.49981 6.62913 9.55249 6.75622 9.64625 6.84991C9.74002 6.94361 9.86718 6.99625 9.99978 6.99625H12.9996C13.1322 6.99625 13.2594 6.94361 13.3532 6.84991C13.4469 6.75622 13.4996 6.62913 13.4996 6.49663V3.9985H13.9996C14.2648 3.9985 14.5191 3.89322 14.7066 3.70583C14.8942 3.51843 14.9995 3.26427 14.9995 2.99925C14.9995 2.73423 14.8942 2.48007 14.7066 2.29267C14.5191 2.10528 14.2648 2 13.9996 2H8.99983C8.73463 2 8.48027 2.10528 8.29274 2.29267C8.10521 2.48007 7.99988 2.73423 7.99988 2.99925C7.99988 3.26427 8.10521 3.51843 8.29274 3.70583C8.48027 3.89322 8.73463 3.9985 8.99983 3.9985Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Beleza &amp; Perfumaria</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/brinquedos/l/br/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M21.0338 14.9917H20.9237C21.238 14.5008 21.4142 13.9346 21.4339 13.3523C21.4535 12.7701 21.3158 12.1933 21.0353 11.6824C20.7548 11.1715 20.3417 10.7453 19.8394 10.4485C19.337 10.1517 18.764 9.99524 18.1802 9.99548H17.5194V7.99699H14.5157V9.99548H11.5119V5.99849H12.0125C12.2781 5.99849 12.5327 5.89322 12.7205 5.70582C12.9083 5.51843 13.0138 5.26426 13.0138 4.99925C13.0138 4.73423 12.9083 4.48007 12.7205 4.29267C12.5327 4.10528 12.2781 4 12.0125 4H3.00125C2.7357 4 2.48102 4.10528 2.29324 4.29267C2.10547 4.48007 2 4.73423 2 4.99925C2 5.26426 2.10547 5.51843 2.29324 5.70582C2.48102 5.89322 2.7357 5.99849 3.00125 5.99849H3.50188V14.9917H3.00125C2.7357 14.9917 2.48102 15.097 2.29324 15.2844C2.10547 15.4718 2 15.726 2 15.991C2 16.256 2.10547 16.5101 2.29324 16.6975C2.48102 16.8849 2.7357 16.9902 3.00125 16.9902H4.30788C4.48023 17.8373 4.9407 18.5989 5.6113 19.1459C6.2819 19.6929 7.12137 19.9917 7.98747 19.9917C8.85357 19.9917 9.69305 19.6929 10.3636 19.1459C11.0342 18.5989 11.4947 17.8373 11.6671 16.9902H15.5469C15.3649 17.292 15.2681 17.6372 15.2666 17.9895C15.2647 18.2971 15.3341 18.601 15.4692 18.8775C15.6043 19.154 15.8016 19.3957 16.0456 19.5836C16.2896 19.7716 16.5739 19.9008 16.8761 19.9611C17.1784 20.0215 17.4905 20.0114 17.7882 19.9317C18.086 19.8519 18.3612 19.7046 18.5925 19.5013C18.8239 19.298 19.0051 19.0441 19.122 18.7594C19.2389 18.4748 19.2883 18.167 19.2665 17.8601C19.2447 17.5533 19.1522 17.2556 18.9962 16.9902H20.9987C21.2643 16.9902 21.519 16.8849 21.7068 16.6975C21.8945 16.5101 22 16.256 22 15.991C22 15.726 21.8945 15.4718 21.7068 15.2844C21.519 15.097 21.2643 14.9917 20.9987 14.9917H21.0338ZM9.51939 5.99849V9.99548H5.51438V5.99849H9.51939Z" fill="currentColor"></path>
                                                   <path d="M16.0175 5.49887C15.6192 5.49887 15.2372 5.65679 14.9555 5.93788C14.6738 6.21897 14.5156 6.60022 14.5156 6.99774H17.5194C17.5194 6.60022 17.3611 6.21897 17.0795 5.93788C16.7978 5.65679 16.4158 5.49887 16.0175 5.49887Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Brinquedos</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/cama-mesa-e-banho/l/cm/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <path fill="currentColor" d="M2.4 4.8H1.2a1.2 1.2 0 1 1 0-2.4h1.2v2.4zM21.6 4.8h1.2a1.2 1.2 0 1 0 0-2.4h-1.2v2.4zM20.397 17.4v-15a2.4 2.4 0 0 0-2.4-2.4h-12a2.4 2.4 0 0 0-2.4 2.4v15h16.8zM3.596 20.4h16.8v-1.8h-16.8zM3.596 24h16.8v-2.4h-16.8z"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Cama, Mesa e Banho</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/cameras-e-drones/l/cf/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M20 6H4C3.46957 6 2.96086 6.21071 2.58578 6.58579C2.21071 6.96086 2 7.46957 2 8V18C2 18.5304 2.21071 19.0391 2.58578 19.4142C2.96086 19.7893 3.46957 20 4 20H20C20.5304 20 21.0391 19.7893 21.4142 19.4142C21.7893 19.0391 22 18.5304 22 18V8C22 7.46957 21.7893 6.96086 21.4142 6.58579C21.0391 6.21071 20.5304 6 20 6ZM5.75 10.5C5.50277 10.5 5.26107 10.4267 5.05551 10.2893C4.84995 10.152 4.68973 9.95676 4.59512 9.72835C4.50051 9.49995 4.47579 9.24861 4.52402 9.00614C4.57225 8.76366 4.69127 8.54093 4.86609 8.36612C5.0409 8.1913 5.26366 8.07225 5.50613 8.02402C5.74861 7.97579 5.99992 8.00054 6.22833 8.09515C6.45674 8.18976 6.65199 8.34998 6.78934 8.55554C6.92669 8.7611 7 9.00277 7 9.25C7 9.58152 6.8683 9.89946 6.63388 10.1339C6.39946 10.3683 6.08152 10.5 5.75 10.5ZM15 18C14.0111 18 13.0444 17.7068 12.2221 17.1573C11.3999 16.6079 10.759 15.827 10.3806 14.9134C10.0021 13.9998 9.90314 12.9945 10.0961 12.0245C10.289 11.0546 10.7652 10.1637 11.4644 9.46447C12.1637 8.7652 13.0546 8.289 14.0245 8.09607C14.9944 7.90315 15.9998 8.00216 16.9134 8.3806C17.827 8.75904 18.6079 9.3999 19.1573 10.2221C19.7068 11.0444 20 12.0111 20 13C20 14.3261 19.4732 15.5979 18.5355 16.5355C17.5978 17.4732 16.3261 18 15 18Z" fill="currentColor"></path>
                                                   <path d="M15 17C17.2091 17 19 15.2091 19 13C19 10.7909 17.2091 9 15 9C12.7909 9 11 10.7909 11 13C11 15.2091 12.7909 17 15 17Z" fill="currentColor"></path>
                                                   <path d="M9.5 3H13.5C14.0304 3 14.5391 3.21071 14.9142 3.58579C15.2893 3.96086 15.5 4.46957 15.5 5H7.5C7.5 4.46957 7.71071 3.96086 8.08578 3.58579C8.46086 3.21071 8.96957 3 9.5 3Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Câmeras e Drones</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/casa-e-construcao/l/cj/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <path fill="currentColor" d="M17.469 0c.532 0 .969.428.969.954l-.129 3.839c0 3.313-2.719 6-6.071 6-3.353 0-6.072-2.687-6.072-6l.13-3.84c0-.525.434-.953.97-.953.272 0 .52.11.694.289l1.875 1.834L11.696.29a.993.993 0 0 1 1.4 0l1.831 1.807L16.774.289A.972.972 0 0 1 17.469 0z"></path>
                                                   <path fill="currentColor" d="M11.153 16.048h2.428V7.275h-2.428z"></path>
                                                   <path fill="currentColor" d="M20.502 16.8l.22-1.082a.602.602 0 0 0-.596-.718H4.607a.602.602 0 0 0-.595.718L4.23 16.8h16.271zM4.474 18l.824 4.07A2.422 2.422 0 0 0 7.679 24h9.375a2.422 2.422 0 0 0 2.382-1.93L20.26 18H4.474z"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Casa e Construção</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/cursos/l/cr/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 24 24" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path d="M4.06859 10.9572L11.5005 13.5L18.5572 11.1068V16.0154H18.5489C18.3688 17.1202 15.1979 18.0001 11.3127 18.0001C7.4274 18.0001 4.25651 17.1202 4.07643 16.0154H4.06859V15.9331L4.06836 15.9161L4.06859 15.8992V10.9572Z" fill="currentColor"></path>
                                                <path d="M1.20366 8.08083L11.3268 5.03394C11.4004 5.01178 11.4789 5.01131 11.5528 5.03258L22.1363 8.07955C22.5161 8.18889 22.5241 8.7241 22.1478 8.84482L20.938 9.23295V12.8904C21.2851 13.0129 21.5339 13.3438 21.5339 13.7329V13.9313C21.5339 14.2062 21.4096 14.4521 21.2143 14.616L21.5339 16.2137H19.7476L20.0671 14.616C19.8718 14.4521 19.7476 14.2062 19.7476 13.9313V13.7329C19.7476 13.4234 19.905 13.1507 20.1441 12.9904V9.48763L11.5645 12.2399C11.4834 12.266 11.396 12.2654 11.3152 12.2383L1.19176 8.8431C0.821985 8.71908 0.830198 8.19324 1.20366 8.08083Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Cursos</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/decoracao/l/de/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <path d="M19.069 11.763c-.98-2.97-1.81-5.82-2.544-8.68-.043-.204-.153-.389-.311-.525-.16-.135-.359-.215-.567-.226h-5.83c-.208.011-.407.09-.566.226-.159.136-.269.32-.312.525-.733 2.86-1.564 5.71-2.543 8.671-.043.124-.055.256-.035.386.02.129.071.251.149.356.09.12.206.218.34.284.135.065.283.098.433.094H18.23c.15-.01.297-.056.428-.132.131-.076.243-.181.327-.307.064-.098.105-.21.12-.326.014-.117.002-.235-.037-.346zM11.474 21.888c-.007.072.014.143.06.2.044.055.11.09.182.099h2.034c.067-.015.128-.052.172-.106.044-.054.068-.121.068-.19 0-.07-.024-.138-.068-.192-.044-.054-.105-.091-.173-.105h-.232c.018-.038.028-.078.03-.119.264-2.437.264-4.895 0-7.331-.002-.035-.01-.069-.022-.101h.224c.068-.015.13-.052.173-.106.044-.054.068-.121.068-.19 0-.07-.024-.138-.068-.192-.044-.053-.105-.09-.173-.105h-2.033c-.068.014-.13.052-.173.105-.044.054-.067.122-.067.191 0 .07.023.137.067.191.044.054.105.091.173.106h.228c-.013.035-.022.072-.026.11-.26 2.432-.26 4.885 0 7.318.004.043.016.084.035.123h-.237c-.071.007-.136.043-.181.098-.045.055-.067.125-.06.196z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Decoração</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/ferramentas/l/fs/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path d="M21 7H18C18 6.46957 17.7893 5.96086 17.4142 5.58579C17.0392 5.21071 16.5304 5 16 5V11C16.5304 11 17.0392 10.7893 17.4142 10.4142C17.7893 10.0391 18 9.53043 18 9H21C21.2652 9 21.5196 8.89464 21.7071 8.70711C21.8946 8.51957 22 8.26522 22 8C22 7.73478 21.8946 7.48043 21.7071 7.29289C21.5196 7.10536 21.2652 7 21 7Z" fill="currentColor"></path>
                                                <path d="M13 3H4C3.46957 3 2.96089 3.21071 2.58582 3.58579C2.21074 3.96086 2 4.46957 2 5V11C2 11.5304 2.21074 12.0391 2.58582 12.4142C2.96089 12.7893 3.46957 13 4 13H4.53003V18.5C4.53003 19.0304 4.74071 19.5391 5.11578 19.9142C5.49086 20.2893 5.9996 20.5 6.53003 20.5H7.53003C8.06046 20.5 8.56914 20.2893 8.94421 19.9142C9.31929 19.5391 9.53003 19.0304 9.53003 18.5V15H10.53C10.7952 15 11.0496 14.8946 11.2371 14.7071C11.4247 14.5196 11.53 14.2652 11.53 14V13H13C13.5304 13 14.0392 12.7893 14.4142 12.4142C14.7893 12.0391 15 11.5304 15 11V5C15 4.46957 14.7893 3.96086 14.4142 3.58579C14.0392 3.21071 13.5304 3 13 3ZM9 7H4V6.5H9V7ZM9 5.5H4V5H9V5.5Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Ferramentas</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/filmes-e-series/l/fm/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 40 25" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none" fill-rule="evenodd">
                                                   <g transform="translate(0 -7)">
                                                      <g transform="translate(0 7)">
                                                         <mask id="b" fill="white">
                                                            <polygon points="2.479e-4 0.25385 26.935 0.25385 26.935 24.999 2.479e-4 24.999"></polygon>
                                                         </mask>
                                                         <path d="m20.057 13.557l-8.8936 4.9923c-1.7637 0.90673-1.7772-0.79808-1.7772-0.79808l0.085821-10.226c0.068464-1.7981 1.6991-0.8625 1.6991-0.8625l8.8145 5.326c1.0106 0.74712 0.071357 1.5683 0.071357 1.5683zm6.8785-6.7625c0.029659-3.5163-2.8053-6.3923-6.3327-6.4221l-14.062-0.11849c-3.5264-0.028627-6.4096 2.7973-6.4395 6.3146l-0.10052 11.891c-0.029659 3.5173 2.8053 6.3923 6.3327 6.4212l14.061 0.11827c3.5274 0.030769 6.4106-2.7971 6.4395-6.3135l0.10148-11.891z" fill="currentColor" mask="url(#b)"></path>
                                                         <g transform="translate(28 3)">
                                                            <mask id="a" fill="white">
                                                               <polygon points="0.48229 0.23068 12 0.23068 12 20.483 0.48229 20.483"></polygon>
                                                            </mask>
                                                            <path d="m0.48229 15.578l8.1502 4.446c3.1058 1.53 3.2138-1.255 3.2138-1.255l0.15382-16.71c-0.032727-2.936-3.0229-1.454-3.0229-1.454l-8.3913 4.57-0.10364 10.403z" fill="currentColor" mask="url(#a)"></path>
                                                         </g>
                                                      </g>
                                                   </g>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Filmes e Séries</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/games/l/ga/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M17.5 5H6.5C5.30653 5 4.16193 5.47411 3.31802 6.31802C2.47411 7.16194 2 8.30653 2 9.5V14C2 15.0609 2.42143 16.0783 3.17157 16.8284C3.92172 17.5786 4.93913 18 6 18C7.06087 18 8.07828 17.5786 8.82843 16.8284C9.57857 16.0783 10 15.0609 10 14C10 13.7348 10.1054 13.4804 10.2929 13.2929C10.4804 13.1054 10.7348 13 11 13H13C13.2652 13 13.5196 13.1054 13.7071 13.2929C13.8946 13.4804 14 13.7348 14 14C14 15.0609 14.4214 16.0783 15.1716 16.8284C15.9217 17.5786 16.9391 18 18 18C19.0609 18 20.0783 17.5786 20.8284 16.8284C21.5786 16.0783 22 15.0609 22 14V9.5C22 8.30653 21.5259 7.16194 20.682 6.31802C19.8381 5.47411 18.6935 5 17.5 5ZM8.225 10.26H7.225V11.26C7.225 11.4589 7.14598 11.6497 7.00533 11.7903C6.86468 11.931 6.67391 12.01 6.475 12.01C6.27609 12.01 6.08532 11.931 5.94467 11.7903C5.80402 11.6497 5.725 11.4589 5.725 11.26V10.26H4.725C4.52609 10.26 4.33532 10.181 4.19467 10.0403C4.05402 9.89968 3.975 9.70891 3.975 9.51C3.975 9.31109 4.05402 9.12033 4.19467 8.97968C4.33532 8.83902 4.52609 8.76 4.725 8.76H5.725V7.76C5.725 7.56109 5.80402 7.37033 5.94467 7.22968C6.08532 7.08902 6.27609 7.01 6.475 7.01C6.67391 7.01 6.86468 7.08902 7.00533 7.22968C7.14598 7.37033 7.225 7.56109 7.225 7.76V8.76H8.225C8.42391 8.76 8.61468 8.83902 8.75533 8.97968C8.89598 9.12033 8.975 9.31109 8.975 9.51C8.975 9.70891 8.89598 9.89968 8.75533 10.0403C8.61468 10.181 8.42391 10.26 8.225 10.26ZM16.265 10.03C16.1957 10.1002 16.1132 10.1558 16.0222 10.1938C15.9312 10.2319 15.8336 10.2514 15.735 10.2514C15.6364 10.2514 15.5388 10.2319 15.4478 10.1938C15.3568 10.1558 15.2743 10.1002 15.205 10.03C15.0658 9.88874 14.9877 9.69835 14.9877 9.5C14.9877 9.30165 15.0658 9.11127 15.205 8.97C15.3472 8.83752 15.5352 8.7654 15.7295 8.76883C15.9238 8.77226 16.1092 8.85097 16.2466 8.98838C16.384 9.12579 16.4627 9.31118 16.4662 9.50548C16.4696 9.69978 16.3975 9.88783 16.265 10.03ZM18.015 11.78C17.9457 11.8502 17.8632 11.9058 17.7722 11.9438C17.6812 11.9819 17.5836 12.0014 17.485 12.0014C17.3864 12.0014 17.2888 11.9819 17.1978 11.9438C17.1068 11.9058 17.0243 11.8502 16.955 11.78C16.8158 11.6387 16.7377 11.4484 16.7377 11.25C16.7377 11.0516 16.8158 10.8613 16.955 10.72C17.0972 10.5875 17.2852 10.5154 17.4795 10.5188C17.6738 10.5223 17.8592 10.601 17.9966 10.7384C18.134 10.8758 18.2127 11.0612 18.2162 11.2555C18.2196 11.4498 18.1475 11.6378 18.015 11.78ZM18.015 8.28001C17.9457 8.35015 17.8632 8.40584 17.7722 8.44385C17.6812 8.48186 17.5836 8.50143 17.485 8.50143C17.3864 8.50143 17.2888 8.48186 17.1978 8.44385C17.1068 8.40584 17.0243 8.35015 16.955 8.28001C16.8158 8.13874 16.7377 7.94835 16.7377 7.75C16.7377 7.55165 16.8158 7.36127 16.955 7.22C17.0972 7.08752 17.2852 7.0154 17.4795 7.01883C17.6738 7.02226 17.8592 7.10097 17.9966 7.23838C18.134 7.37579 18.2127 7.56118 18.2162 7.75548C18.2196 7.94978 18.1475 8.13783 18.015 8.28001ZM19.765 10.03C19.6957 10.1002 19.6132 10.1558 19.5222 10.1938C19.4312 10.2319 19.3336 10.2514 19.235 10.2514C19.1364 10.2514 19.0388 10.2319 18.9478 10.1938C18.8568 10.1558 18.7743 10.1002 18.705 10.03C18.5658 9.88874 18.4877 9.69835 18.4877 9.5C18.4877 9.30165 18.5658 9.11127 18.705 8.97C18.7737 8.89631 18.8565 8.83721 18.9485 8.79622C19.0405 8.75523 19.1398 8.73319 19.2405 8.73141C19.3412 8.72964 19.4412 8.74816 19.5346 8.78588C19.628 8.8236 19.7128 8.87975 19.784 8.95097C19.8553 9.02218 19.9114 9.10702 19.9491 9.20041C19.9868 9.2938 20.0054 9.39382 20.0036 9.49452C20.0018 9.59522 19.9798 9.69454 19.9388 9.78654C19.8978 9.87854 19.8387 9.96134 19.765 10.03Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Games</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/instrumentos-musicais/l/im/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M21.5271 2.44192C21.3874 2.30185 21.2214 2.19071 21.0386 2.11487C20.8558 2.03904 20.6599 2 20.462 2C20.2641 2 20.0681 2.03904 19.8853 2.11487C19.7025 2.19071 19.5365 2.30185 19.3968 2.44192L17.4169 4.44531L17.7728 4.80091L14.6902 7.8761L14.6451 7.83603C14.1037 7.4604 12.8456 6.66405 12.0988 6.76422C11.1214 6.88943 10.4447 6.94953 9.67279 8.14155C8.90088 9.33356 8.77054 9.77931 6.85581 10.5055C4.94107 11.2318 3.06644 11.8979 2.54516 12.9797C2.02387 14.0615 0.966244 15.9848 4.71552 19.5158C8.46479 23.0467 10.3946 21.9449 11.4772 21.3939C12.5599 20.843 13.1764 18.9848 13.8431 17.0866C14.5097 15.1884 14.9609 15.0432 16.1488 14.2469C17.3367 13.4505 17.3668 12.7844 17.4671 11.8228C17.5422 11.0414 16.5698 9.73924 16.2089 9.28848L16.1588 9.24341L19.1913 6.23833L19.5422 6.58892L21.5471 4.61058C21.6922 4.46901 21.807 4.29959 21.8848 4.11251C21.9627 3.92544 22.0018 3.72457 21.9999 3.52199C21.9981 3.3194 21.9552 3.11929 21.874 2.93368C21.7927 2.74807 21.6747 2.5808 21.5271 2.44192ZM10.4998 15.4639C10.1529 15.4639 9.81367 15.3611 9.52517 15.1685C9.23667 14.9759 9.01181 14.7021 8.87903 14.3818C8.74625 14.0615 8.7115 13.709 8.77919 13.369C8.84688 13.0289 9.01397 12.7166 9.25932 12.4714C9.50467 12.2263 9.81726 12.0593 10.1576 11.9917C10.4979 11.924 10.8506 11.9588 11.1712 12.0914C11.4917 12.2241 11.7657 12.4488 11.9585 12.7371C12.1513 13.0253 12.2542 13.3642 12.2542 13.7109C12.2542 13.9416 12.2086 14.1699 12.1201 14.3829C12.0317 14.5959 11.902 14.7894 11.7386 14.9523C11.5751 15.1151 11.3811 15.2441 11.1677 15.3319C10.9543 15.4197 10.7256 15.4646 10.4948 15.4639H10.4998Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Instrumentos Musicais</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/livros/l/li/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M17 2H6C5.46957 2 4.96086 2.21072 4.58578 2.58579C4.21071 2.96087 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58578 21.4142C4.96086 21.7893 5.46957 22 6 22H16.5C16.9423 21.9986 17.3716 21.8506 17.7208 21.5792C18.07 21.3077 18.3195 20.9282 18.43 20.5H7C6.73478 20.5 6.48044 20.3946 6.29291 20.2071C6.10537 20.0196 6 19.7652 6 19.5C6 19.2348 6.10537 18.9804 6.29291 18.7929C6.48044 18.6054 6.73478 18.5 7 18.5H18.5C18.6326 18.5 18.7598 18.4473 18.8536 18.3536C18.9473 18.2598 19 18.1326 19 18V4C19 3.46957 18.7893 2.96087 18.4142 2.58579C18.0391 2.21072 17.5304 2 17 2ZM15.245 9H8.745C8.54608 9 8.35534 8.92099 8.21469 8.78033C8.07404 8.63968 7.995 8.44891 7.995 8.25C7.995 8.05109 8.07404 7.86033 8.21469 7.71967C8.35534 7.57902 8.54608 7.5 8.745 7.5H15.245C15.4439 7.5 15.6347 7.57902 15.7753 7.71967C15.916 7.86033 15.995 8.05109 15.995 8.25C15.995 8.44891 15.916 8.63968 15.7753 8.78033C15.6347 8.92099 15.4439 9 15.245 9Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Livros</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/mercado/l/me/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M7.70296 5.5088L7.70424 5.50263H16.2791L16.28 5.5034L16.2816 5.51081L17.1466 9.09153C17.2445 9.49697 17.6884 9.75404 18.138 9.66573C18.5877 9.57741 18.8728 9.17715 18.7748 8.77172L17.9131 5.2047C17.7563 4.50691 17.0743 4 16.281 4H7.69909C6.90082 4 6.22072 4.50907 6.0692 5.21234L5.22458 8.77454C5.12837 9.18031 5.41517 9.57958 5.86516 9.66633C6.31515 9.75309 6.75793 9.49448 6.85414 9.08871L7.70296 5.5088ZM3.26979 10.5124H20.7269C21.4301 10.5124 21.9967 11.0233 22 11.6574C22 12.4898 21.2501 13.166 20.3269 13.166H19.5371L18.9572 17.6018C18.7772 18.9692 17.4908 20 15.9643 20H8.42893C6.89918 20 5.61606 18.9692 5.43609 17.6018L4.85619 13.166H3.49975C2.66989 13.166 2 12.5619 2 11.8136V11.6574C2 11.0233 2.56991 10.5124 3.26979 10.5124ZM8.1823 17.8963C8.50225 17.8963 8.76221 17.6619 8.76221 17.3734V13.5056C8.76221 13.2171 8.50225 12.9827 8.1823 12.9827H8.06899C7.74904 12.9827 7.48909 13.2171 7.48909 13.5056V17.3734C7.48909 17.6619 7.74904 17.8963 8.06899 17.8963H8.1823ZM12.055 17.8963C12.3749 17.8963 12.6349 17.6619 12.6349 17.3734V13.5056C12.6349 13.2171 12.3749 12.9827 12.055 12.9827H11.9417C11.6217 12.9827 11.3618 13.2171 11.3618 13.5056V17.3734C11.3618 17.6619 11.6217 17.8963 11.9417 17.8963H12.055ZM15.8944 17.8963C16.2143 17.8963 16.4743 17.6619 16.4743 17.3734V13.5056C16.4743 13.2171 16.2143 12.9827 15.8944 12.9827H15.781C15.4611 12.9827 15.2011 13.2171 15.2011 13.5056V17.3734C15.2011 17.6619 15.4611 17.8963 15.781 17.8963H15.8944Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Mercado</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/moda-e-acessorios/l/md/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path fill="currentColor" d="M23.66,6.28,17.54.16A.6.6,0,0,0,17.1,0H6.68a.6.6,0,0,0-.44.16L.12,6.28a.47.47,0,0,0,0,.63l2.71,3.37a.57.57,0,0,0,.76.13h.06L5.55,9.2l-.1,7.1a2,2,0,0,0,.68,1.49,2.51,2.51,0,0,0,1.67.63H16a2.54,2.54,0,0,0,1.68-.63,2,2,0,0,0,.65-1.49l-.06-7.1,1.9,1.21a.62.62,0,0,0,.79-.06v0L23.69,7a.47.47,0,0,0,0-.67ZM14.81,1.05c-.14,1.26-1.5,3.21-2.89,3.21S9.17,2.36,9,1.05Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Moda</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/musica-e-shows/l/ms/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 33 40" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <g transform="translate(-2.000000, 0.000000)" fill="currentColor">
                                                      <g transform="translate(2.000000, 0.000000)">
                                                         <path d="M33,1.31665457 C33,0.872662082 32.7794768,0.471668868 32.4715391,0.250672607 C32.1179073,-0.0163228748 31.676861,-0.0603221303 31.2805153,0.0726756192 L11.4711779,6.73456289 C10.9417236,6.91255988 10.5880919,7.44555086 10.5880919,7.97754186 L10.5880919,28.0072029 C9.48547605,27.1642172 8.11763643,26.6752255 6.61768159,26.6752255 C2.9562024,26.6752255 0,29.6511751 0,33.3371127 C0,37.0240504 2.9562024,40 6.61768159,40 C10.1470455,40 13.0595407,37.1570481 13.1916559,33.6041082 L13.1916559,33.4261112 L13.1916559,14.8624254 L30.353722,9.08752308 L30.353722,22.0123044 C29.2511062,21.1693186 27.8832666,20.6793269 26.3823184,20.6793269 C22.7208392,20.6793269 19.7656302,23.6552766 19.7656302,27.3412142 C19.7656302,31.0281518 22.7208392,34.0041015 26.3823184,34.0041015 C29.9126757,34.0041015 32.8231841,31.1611496 32.9562927,27.6082097 L32.9562927,27.4302127 L32.9562927,1.31665457 L33,1.31665457 Z"></path>
                                                      </g>
                                                   </g>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Música e Shows</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/natal/l/na/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M14.5937 19.0762L14.669 18.6844C14.6758 18.6529 14.6754 18.6203 14.6679 18.589C14.6605 18.5577 14.6461 18.5285 14.6259 18.5034C14.6056 18.4784 14.58 18.4582 14.551 18.4443C14.522 18.4304 14.4902 18.4232 14.458 18.4231H8.85155C8.81936 18.4232 8.78762 18.4304 8.75858 18.4443C8.72955 18.4582 8.70399 18.4784 8.68377 18.5034C8.66354 18.5285 8.64917 18.5577 8.6417 18.589C8.63423 18.6203 8.63386 18.6529 8.64059 18.6844L8.71596 19.0762H14.5937Z" fill="currentColor"></path>
                                                   <path d="M8.71579 19.0762L9.10256 21.2967C9.14213 21.4953 9.24944 21.6739 9.40612 21.8022C9.5628 21.9305 9.75917 22.0004 9.96166 22H13.3476C13.5501 22.0004 13.7465 21.9305 13.9032 21.8022C14.0599 21.6739 14.1671 21.4953 14.2067 21.2967L14.5935 19.0762H8.71579Z" fill="currentColor"></path>
                                                   <path d="M12.4684 19.0612V17.0768H10.8356V19.0612H12.4684Z" fill="currentColor"></path>
                                                   <path d="M14.4579 18.4231H12.4484V17.0768H10.8157V18.4231H8.8062C8.77402 18.4232 8.74227 18.4304 8.71324 18.4443C8.6842 18.4582 8.65864 18.4784 8.63842 18.5034C8.6182 18.5284 8.60382 18.5577 8.59635 18.589C8.58888 18.6203 8.58845 18.6529 8.59519 18.6844L8.67055 19.0762L9.05739 21.2967C9.09696 21.4953 9.20427 21.674 9.36095 21.8022C9.51762 21.9305 9.71393 22.0004 9.91642 22H13.3025C13.505 22.0004 13.7013 21.9305 13.8579 21.8022C14.0146 21.674 14.1219 21.4953 14.1615 21.2967L14.5483 19.0762L14.6236 18.6844C14.6303 18.6563 14.6313 18.6272 14.6265 18.5988C14.6217 18.5703 14.6113 18.5431 14.5959 18.5188C14.5804 18.4944 14.5603 18.4734 14.5366 18.457C14.5129 18.4406 14.4861 18.429 14.4579 18.4231Z" fill="currentColor"></path>
                                                   <path d="M17.9694 13.9319L16.0654 11.0734H16.2463C17.5022 11.0734 17.9644 10.2144 17.251 9.16946L13.021 2.78935C12.3227 1.7394 11.1723 1.73437 10.4589 2.78935L6.06822 9.20463C5.35486 10.2445 5.80197 11.0935 7.07296 11.0935H7.34923L5.37998 13.9721C4.58121 15.1376 5.08356 16.0921 6.49522 16.0921H16.829C18.2356 16.072 18.7531 15.1075 17.9694 13.9319ZM9.03719 14.359C8.86331 14.359 8.69338 14.3074 8.5488 14.2108C8.40423 14.1142 8.29155 13.9769 8.22501 13.8162C8.15847 13.6556 8.14104 13.4788 8.17497 13.3083C8.20889 13.1377 8.29259 12.9811 8.41554 12.8581C8.53849 12.7352 8.69519 12.6515 8.86573 12.6175C9.03626 12.5836 9.21303 12.601 9.37368 12.6676C9.53432 12.7341 9.67158 12.8468 9.76818 12.9914C9.86478 13.1359 9.91634 13.3059 9.91634 13.4798C9.91239 13.7103 9.81807 13.9301 9.65362 14.0917C9.48918 14.2534 9.26777 14.3439 9.03719 14.3439V14.359ZM11.7349 6.61239C11.561 6.61239 11.3911 6.56083 11.2465 6.46423C11.102 6.36763 10.9893 6.23032 10.9227 6.06968C10.8562 5.90904 10.8388 5.73227 10.8727 5.56173C10.9066 5.39119 10.9903 5.23454 11.1133 5.11159C11.2362 4.98864 11.3929 4.90491 11.5635 4.87099C11.734 4.83707 11.9108 4.85448 12.0714 4.92102C12.232 4.98756 12.3693 5.10024 12.4659 5.24482C12.5625 5.38939 12.6141 5.55936 12.6141 5.73324C12.6141 5.96641 12.5215 6.19002 12.3566 6.3549C12.1918 6.51977 11.9681 6.61239 11.7349 6.61239ZM14.2116 10.6715C14.0378 10.6715 13.8678 10.62 13.7232 10.5234C13.5786 10.4268 13.4659 10.2895 13.3994 10.1288C13.3328 9.96819 13.3155 9.79142 13.3494 9.62089C13.3833 9.45035 13.467 9.2937 13.59 9.17075C13.7129 9.0478 13.8696 8.96407 14.0401 8.93014C14.2106 8.89622 14.3874 8.91363 14.5481 8.98017C14.7087 9.04671 14.846 9.1594 14.9426 9.30397C15.0392 9.44855 15.0908 9.61852 15.0908 9.7924C15.0908 10.0256 14.9982 10.2492 14.8333 10.4141C14.6684 10.5789 14.4448 10.6715 14.2116 10.6715Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Natal</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/papelaria/l/pa/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M20.6784 17.65L15.5707 12.65L13.0668 15.1L18.1245 20.1C18.8256 20.75 19.9273 20.75 20.6284 20.1C21.3294 19.45 21.3294 18.35 20.6784 17.65Z" fill="currentColor"></path>
                                                   <path d="M20.6784 3.8C20.6784 3.8 20.6784 3.75 20.6784 3.8C19.9774 3.1 18.8757 3.1 18.1746 3.8L12.3658 9.5L9.91204 7.1C10.0122 6.75 10.0623 6.4 10.0623 6C10.0623 3.8 8.25953 2 6.0061 2C3.75267 2 2.05008 3.8 2.05008 6C2.05008 8.2 3.85282 10 6.10625 10C6.65709 10 7.15785 9.9 7.60853 9.7L9.91204 11.95L7.60853 14.25C7.10777 14.05 6.60701 13.95 6.10625 13.95C3.85282 14 2 15.75 2 18C2 20.2 3.80274 22 6.05617 22C8.3096 22 10.1123 20.25 10.1123 18C10.1123 17.6 10.0623 17.25 9.91204 16.9L12.3658 14.5L14.8696 12.05L20.6784 6.2C21.3294 5.55 21.3294 4.45 20.6784 3.8ZM6.05617 7.95C4.9545 7.95 4.05312 7.05 4.05312 5.95C4.05312 4.85 4.9545 3.95 6.05617 3.95C7.15785 3.95 8.05922 4.85 8.05922 5.95C8.05922 7.1 7.15785 7.95 6.05617 7.95ZM6.05617 19.9C4.9545 19.9 4.05312 19 4.05312 17.9C4.05312 16.8 4.9545 15.9 6.05617 15.9C7.15785 15.9 8.05922 16.8 8.05922 17.9C8.05922 19.05 7.15785 19.9 6.05617 19.9Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Papelaria</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/pet-shop/l/pe/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path fill="currentColor" d="M16.646 20.996H6.999c-.988 0-1.793-.797-1.793-1.766V15.78c0-3.579 2.96-6.542 6.64-6.542 3.632 0 6.64 2.917 6.64 6.542v3.449a1.855 1.855 0 0 1-1.84 1.766M2.828 7.51c1.562 0 2.828 1.248 2.828 2.787s-1.266 2.786-2.828 2.786C1.266 13.083 0 11.836 0 10.297s1.266-2.786 2.828-2.786M8.483 3c1.562 0 2.828 1.248 2.828 2.786 0 1.54-1.266 2.787-2.828 2.787-1.561 0-2.827-1.248-2.827-2.787C5.656 4.248 6.922 3 8.483 3M15.615 3c1.562 0 2.828 1.248 2.828 2.786 0 1.54-1.266 2.787-2.828 2.787-1.562 0-2.828-1.248-2.828-2.787C12.787 4.248 14.053 3 15.615 3M21.134 7.51c1.561 0 2.827 1.248 2.827 2.787s-1.266 2.786-2.827 2.786c-1.562 0-2.828-1.247-2.828-2.786s1.266-2.786 2.828-2.786"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Pet Shop</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/relogios/l/re/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M14.5 5.13001V3C14.5 2.73478 14.3946 2.48043 14.2071 2.29289C14.0196 2.10536 13.7652 2 13.5 2H9.5C9.23478 2 8.98041 2.10536 8.79288 2.29289C8.60534 2.48043 8.5 2.73478 8.5 3V5.13001C9.44562 4.71466 10.4672 4.5002 11.5 4.5002C12.5328 4.5002 13.5544 4.71466 14.5 5.13001Z" fill="currentColor"></path>
                                                   <path d="M8.5 18.87V21C8.5 21.2652 8.60534 21.5196 8.79288 21.7071C8.98041 21.8946 9.23478 22 9.5 22H13.5C13.7652 22 14.0196 21.8946 14.2071 21.7071C14.3946 21.5196 14.5 21.2652 14.5 21V18.87C13.5544 19.2853 12.5328 19.4998 11.5 19.4998C10.4672 19.4998 9.44562 19.2853 8.5 18.87Z" fill="currentColor"></path>
                                                   <path d="M11.5 5.5C10.2144 5.5 8.95773 5.88122 7.88881 6.59545C6.81989 7.30968 5.98677 8.32484 5.4948 9.51256C5.00283 10.7003 4.87409 12.0072 5.12489 13.2681C5.3757 14.529 5.99478 15.6872 6.90383 16.5962C7.81287 17.5052 8.97104 18.1243 10.2319 18.3751C11.4928 18.6259 12.7997 18.4972 13.9874 18.0052C15.1752 17.5133 16.1903 16.6801 16.9046 15.6112C17.6188 14.5423 18 13.2856 18 12C18 10.2761 17.3152 8.6228 16.0962 7.40381C14.8772 6.18482 13.2239 5.5 11.5 5.5ZM11.5 16.5C10.61 16.5 9.73998 16.2361 8.99996 15.7416C8.25994 15.2472 7.68314 14.5443 7.34255 13.7221C7.00195 12.8998 6.91284 11.995 7.08647 11.1221C7.26011 10.2492 7.6887 9.44736 8.31804 8.81802C8.94738 8.18869 9.74917 7.76011 10.6221 7.58647C11.495 7.41284 12.3998 7.50195 13.2221 7.84255C14.0444 8.18314 14.7472 8.75992 15.2416 9.49994C15.7361 10.24 16 11.11 16 12C16 13.1935 15.5259 14.3381 14.682 15.182C13.8381 16.0259 12.6935 16.5 11.5 16.5Z" fill="currentColor"></path>
                                                   <path d="M11.525 8.5C11.3261 8.5 11.1353 8.57902 10.9947 8.71967C10.854 8.86033 10.775 9.05109 10.775 9.25V11.5H9.52502C9.32611 11.5 9.13534 11.579 8.99469 11.7197C8.85404 11.8603 8.77502 12.0511 8.77502 12.25C8.77502 12.4489 8.85404 12.6397 8.99469 12.7803C9.13534 12.921 9.32611 13 9.52502 13H11.775C11.9076 13 12.0348 12.9473 12.1286 12.8536C12.2223 12.7598 12.275 12.6326 12.275 12.5V9.25C12.275 9.05109 12.196 8.86033 12.0554 8.71967C11.9147 8.57902 11.7239 8.5 11.525 8.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Relógios</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/saude-e-cuidados-pessoais/l/cp/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M2 8.32277C2.0005 9.60303 2.39005 10.8529 3.11702 11.9067C3.84399 12.9606 4.87403 13.7686 6.07065 14.2237V19.9997C6.07065 20.5302 6.2814 21.039 6.65654 21.4141C7.03167 21.7893 7.54046 22 8.07098 22H9.07114C9.60166 22 10.1105 21.7893 10.4856 21.4141C10.8607 21.039 11.0715 20.5302 11.0715 19.9997V16.9992H12.0716C12.3369 16.9992 12.5913 16.8938 12.7789 16.7062C12.9664 16.5187 13.0718 16.2643 13.0718 15.999V14.0287L19.0028 13.1836V4.01207L9.56123 2.12176C8.64402 1.93916 7.69774 1.96219 6.7905 2.18919C5.88326 2.41619 5.03764 2.84153 4.31451 3.43457C3.59138 4.02761 3.00874 4.77361 2.60853 5.61885C2.20831 6.4641 2.00048 7.38757 2 8.32277ZM12.6717 8.32277C12.6717 9.11403 12.4371 9.88751 11.9975 10.5454C11.5579 11.2033 10.9331 11.7161 10.2021 12.0189C9.47104 12.3217 8.66664 12.4009 7.89059 12.2466C7.11454 12.0922 6.40169 11.7112 5.84219 11.1517C5.28269 10.5922 4.90167 9.87931 4.7473 9.10326C4.59294 8.32721 4.67217 7.52281 4.97497 6.79179C5.27777 6.06077 5.79054 5.43595 6.44845 4.99635C7.10635 4.55676 7.87983 4.32212 8.67108 4.32212C9.73212 4.32212 10.7497 4.74362 11.5 5.49388C12.2502 6.24415 12.6717 7.26173 12.6717 8.32277Z" fill="currentColor"></path>
                                                   <path d="M21.1981 4.45214L20.0029 4.2121V13.0385L21.1431 12.8785C21.3834 12.8445 21.6032 12.7243 21.7615 12.5403C21.9197 12.3563 22.0056 12.121 22.0033 11.8783V5.4323C22.0031 5.20103 21.9228 4.97697 21.776 4.79826C21.6292 4.61955 21.425 4.49723 21.1981 4.45214Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Saúde e Cuidados Pessoais</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/servicos/l/se/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 19 26" color="primary" fill="primary" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <path fill="currentColor" fill-rule="nonzero" d="M5.464 1.298v2.603H2.587v19.497h13.88V3.9h-2.878V1.298h2.772c1.46 0 2.639 1.213 2.639 2.71V23.29c0 1.498-1.18 2.71-2.64 2.71H2.64C1.18 26 0 24.788 0 23.29V4.008c0-1.497 1.18-2.71 2.64-2.71h2.824zM9.5 2.602c.323 0 .582-.28.582-.625s-.26-.625-.582-.625c-.323 0-.582.28-.582.625s.26.625.582.625zM7.183 18.781a.639.639 0 0 0 .519-.194l6.458-6.514a.682.682 0 0 0-.005-.953.657.657 0 0 0-.936-.006l-5.962 6.018-1.36-1.384c-.253-.259-.682-.248-.946.021-.27.275-.28.706-.021.965l1.825 1.858c.116.124.27.183.428.189zm6.908-12.224H4.91c0-1.143 2.375-1.978 2.375-2.656V2.274C7.3 1.013 8.284 0 9.5 0c1.217 0 2.2 1.018 2.216 2.274v1.621c0 .69 2.375 1.514 2.375 2.662z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Serviços</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/suplementos-alimentares/l/sa/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M18 3C18 2.73478 17.8946 2.48043 17.7071 2.29289C17.5196 2.10536 17.2652 2 17 2H7C6.73478 2 6.48044 2.10536 6.29291 2.29289C6.10537 2.48043 6 2.73478 6 3V4H18V3Z" fill="currentColor"></path>
                                                   <path d="M18 5H6C5.46957 5 4.96089 5.21071 4.58582 5.58578C4.21074 5.96086 4 6.46957 4 7V20C4 20.5304 4.21074 21.0391 4.58582 21.4142C4.96089 21.7893 5.46957 22 6 22H18C18.5304 22 19.0392 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V7C20 6.46957 19.7893 5.96086 19.4142 5.58578C19.0392 5.21071 18.5304 5 18 5ZM18 18H6V8.5H18V18Z" fill="currentColor"></path>
                                                   <path d="M8.43501 15.595C8.50081 15.5953 8.56605 15.5827 8.62697 15.5578C8.68789 15.533 8.74333 15.4963 8.79005 15.45L11 13.24L12.325 14.56C12.3994 14.6407 12.4999 14.6925 12.6088 14.7062C12.7177 14.7199 12.8279 14.6947 12.92 14.635C12.9902 14.6125 13.0538 14.573 13.105 14.52L16.2251 11.4C16.3182 11.3063 16.3704 11.1795 16.3704 11.0475C16.3704 10.9154 16.3182 10.7886 16.2251 10.695C16.1314 10.6018 16.0046 10.5496 15.8725 10.5496C15.7404 10.5496 15.6137 10.6018 15.52 10.695L12.695 13.52L11.41 12.235C11.398 12.2098 11.3829 12.1863 11.365 12.165C11.3185 12.1181 11.2632 12.0809 11.2023 12.0555C11.1414 12.0301 11.076 12.0171 11.01 12.0171C10.944 12.0171 10.8787 12.0301 10.8178 12.0555C10.7568 12.0809 10.7015 12.1181 10.655 12.165L8.08504 14.74C8.01483 14.8096 7.96685 14.8985 7.94716 14.9954C7.92747 15.0923 7.93692 15.1929 7.97438 15.2844C8.01184 15.3759 8.07562 15.4542 8.15761 15.5095C8.2396 15.5648 8.33613 15.5945 8.43501 15.595Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Suplementos Alimentares</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://m.magazineluiza.com.br/telefonia-fixa/l/tf/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" color="primary" fill="primary" viewBox="0 0 24 24" class="sc-dlfnbm beypGT sc-ikPAkQ daAEiN">
                                                <g fill="none">
                                                   <path d="M20 12.5H14.5V17.5C14.5 18.163 14.2366 18.7989 13.7678 19.2678C13.2989 19.7366 12.663 20 12 20H6.5C5.83696 20 5.20108 19.7366 4.73224 19.2678C4.2634 18.7989 4 18.163 4 17.5V12.5C3.46957 12.5 2.96083 12.7107 2.58575 13.0858C2.21068 13.4609 2 13.9696 2 14.5V20C2 20.5304 2.21068 21.0391 2.58575 21.4142C2.96083 21.7893 3.46957 22 4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V14.5C22 13.9696 21.7893 13.4609 21.4142 13.0858C21.0391 12.7107 20.5304 12.5 20 12.5ZM18.75 20C18.5028 20 18.2611 19.9267 18.0555 19.7893C17.85 19.652 17.6898 19.4568 17.5952 19.2284C17.5005 18.9999 17.4758 18.7486 17.524 18.5061C17.5722 18.2637 17.6913 18.0409 17.8661 17.8661C18.0409 17.6913 18.2636 17.5722 18.5061 17.524C18.7486 17.4758 18.9999 17.5005 19.2283 17.5952C19.4567 17.6898 19.652 17.85 19.7893 18.0555C19.9267 18.2611 20 18.5028 20 18.75C20 19.0815 19.8683 19.3995 19.6339 19.6339C19.3994 19.8683 19.0815 20 18.75 20Z" fill="currentColor"></path>
                                                   <path d="M6.5 19H12C12.3978 19 12.7793 18.842 13.0606 18.5607C13.3419 18.2794 13.5 17.8978 13.5 17.5V3.5C13.5 3.10218 13.3419 2.72065 13.0606 2.43935C12.7793 2.15804 12.3978 2 12 2H6.5C6.10218 2 5.72064 2.15804 5.43933 2.43935C5.15803 2.72065 5 3.10218 5 3.5V17.5C5 17.8978 5.15803 18.2794 5.43933 18.5607C5.72064 18.842 6.10218 19 6.5 19ZM7 4.5C7 4.36739 7.05266 4.24021 7.14642 4.14645C7.24019 4.05268 7.36739 4 7.5 4H11C11.1326 4 11.2597 4.05268 11.3535 4.14645C11.4473 4.24021 11.5 4.36739 11.5 4.5V8C11.5 8.13261 11.4473 8.25979 11.3535 8.35355C11.2597 8.44732 11.1326 8.5 11 8.5H7.5C7.36739 8.5 7.24019 8.44732 7.14642 8.35355C7.05266 8.25979 7 8.13261 7 8V4.5Z" fill="currentColor"></path>
                                                </g>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Telefonia Fixa</span></div>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                              <div data-testid="list-action" class="sc-hBEYos kfuYHs sc-dtTInj iWNiav sc-bWNSNh ePyFgV">
                                 <div height="45px" class="sc-idOhPF fXLuRV sc-XhUPp uoyyh">
                                    <span font-size="1" font-weight="medium" class="sc-dkIXFM jozBtk">Veja todos os departamentos</span>
                                    <svg width="24" height="24" data-testid="ChevronDownIcon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx sc-ikPAkQ fUVMaF">
                                       <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path>
                                    </svg>
                                 </div>
                              </div>
                           </div>
                           <div class="sc-hBEYos lnsBjm">
                              <div data-testid="list-title-outside" height="45px" class="sc-idOhPF jyWNZu sc-XhUPp kSRpVV"><span font-size="1" font-weight="medium" class="sc-dkIXFM jozBtk">Nossas Marcas</span></div>
                              <ul data-testid="list" class="sc-hBEYos dziZxi sc-fvFlmW ipWRIt">
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/netshoes/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" fill="#5A2D82" color="#5A2D82" viewBox="0 0 24 24" class="sc-dlfnbm bpsUFr sc-ikPAkQ fUVMaF">
                                                <path d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor"></path>
                                                <path d="M10.2841 9.27262C10.2644 9.05368 10.2065 8.94577 9.96063 8.94577C9.73552 8.94577 9.63935 9.03586 9.58143 9.27262L7.40132 17.2011C7.02212 18.6007 6.50851 19.0909 4.91632 19.0909H4.00603C3.62574 19.0909 3.53176 18.8908 3.6454 18.5105L6.41454 8.76349C6.94454 6.87149 7.85592 5.99986 10.5125 5.99986C12.332 5.99986 13.1669 6.43673 13.3199 8.72682L13.7931 15.9271C13.8116 16.146 13.8499 16.256 14.0968 16.256C14.3241 16.256 14.4181 16.1639 14.4749 15.9271L16.6004 7.99873C16.9807 6.59701 17.4725 6.10986 19.0668 6.10986H19.9957C20.3739 6.10986 20.4689 6.30786 20.3552 6.69025L17.6255 16.4373C17.0944 18.3272 16.2016 19.1999 13.5636 19.1999C11.7058 19.1999 10.8338 18.764 10.7015 16.4729L10.2841 9.27262Z" fill="white"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Netshoes</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/zattini/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx sc-ikPAkQ fUVMaF">
                                                <path d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="black"></path>
                                                <path d="M18.6667 4H5.33334V20H18.6667V4Z" fill="white"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9468 19.8195V20.2107H8.55517H7.62987H5.05209V19.8195V7.95912L12.0155 7.95823C12.0156 7.95807 12.0156 7.95807 12.0156 7.95823H12.0155C11.9871 7.99291 7.5618 15.7879 5.78148 18.9239C5.57123 19.2941 5.39787 19.5995 5.273 19.8195H7.62987H8.55517H18.9468ZM11.9815 16.0401H11.9816C11.9815 16.0403 11.9814 16.0403 11.9815 16.0401ZM11.9816 16.0401C12.0162 15.9996 17.5439 6.26167 18.7259 4.17892H15.4437H5.05209V3.78955H16.5368H18.9468V4.17892V16.0401H11.9816Z" fill="black"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Zattini</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://magazineluiza.com.br/lojista/epocacosmeticos-integra/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx sc-ikPAkQ fUVMaF">
                                                <circle cx="12" cy="12" r="12" fill="#FB95A4"></circle>
                                                <g mask="url(#mask0)"></g>
                                                <rect x="4" y="3.7793" width="16.027" height="16.027" fill="url(#pattern0)"></rect>
                                                <defs>
                                                   <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                      <use xlink:onclick="return false" href="#image0" transform="scale(0.00444444)"></use>
                                                   </pattern>
                                                   <image id="image0" width="225" height="225" xlink:onclick="return false" href="data:image/png;base64,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"></image>
                                                </defs>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Época Cosméticos</span></div>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="sc-hBEYos lnsBjm">
                              <div data-testid="list-title-outside" height="45px" class="sc-idOhPF jyWNZu sc-XhUPp kSRpVV"><span font-size="1" font-weight="medium" class="sc-dkIXFM jozBtk">Serviços</span></div>
                              <ul data-testid="list" class="sc-hBEYos dziZxi sc-fvFlmW ipWRIt">
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/cartao-luiza/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 14" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M19.9091 1.77815C19.9068 1.53673 19.8008 1.30643 19.6151 1.13943C19.4295 0.97243 19.18 0.882875 18.923 0.891062H1.18332C0.925849 0.880005 0.674781 0.968409 0.488509 1.13571C0.302237 1.30302 0.196997 1.53464 0.197266 1.7767V3.4454H19.9091V1.77815ZM1.18332 13.2091H18.923C19.1805 13.2201 19.4316 13.1317 19.6179 12.9644C19.8041 12.7971 19.9094 12.5655 19.9091 12.3235V5.54896H0.197269V12.322C0.196579 12.5643 0.301634 12.7963 0.487954 12.9639C0.674275 13.1316 0.925585 13.2202 1.18332 13.2091ZM17.2065 9.55968C17.6602 9.55676 18.0709 9.81115 18.2466 10.2039C18.4224 10.5967 18.3285 11.0503 18.0088 11.3526C17.6892 11.6549 17.2069 11.7462 16.7875 11.5839C16.368 11.4215 16.0944 11.0375 16.0943 10.6115C16.0915 10.3329 16.2075 10.0649 16.4165 9.86732C16.6254 9.66969 16.91 9.5589 17.2065 9.55968ZM1.78924 10.4597C1.78624 10.2299 1.88288 10.0088 2.05695 9.84718C2.23102 9.6856 2.46755 9.59744 2.71222 9.60295H7.22561C7.47027 9.59744 7.70681 9.6856 7.88088 9.84718C8.05495 10.0088 8.15158 10.2299 8.14859 10.4597V10.7602C8.15496 11.255 7.75092 11.6692 7.22561 11.7065H2.71068C2.18246 11.6749 1.77507 11.2572 1.7877 10.7602V10.4597H1.78924Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Cartão Luiza</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/marketplace/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M19.8465 5.88332C19.9119 6.01846 19.9456 6.16678 19.9451 6.31694V6.96737C19.9841 7.96815 19.291 8.8492 18.3091 9.04679C17.7313 9.14652 17.139 8.98382 16.6933 8.60282C16.2548 8.22813 16.0029 7.68058 16.0028 7.10485C15.9873 8.18004 15.1109 9.04679 14.032 9.04679C12.9434 9.04679 12.061 8.16437 12.061 7.07578C12.061 8.16437 11.1786 9.04679 10.09 9.04679C9.00142 9.04679 8.119 8.16437 8.119 7.07578C8.119 8.16437 7.23656 9.04679 6.148 9.04679C5.06914 9.04679 4.19273 8.18004 4.1772 7.10485C4.17712 7.68058 3.92519 8.22813 3.48679 8.60282C3.04103 8.98382 2.44876 9.14652 1.87091 9.04679C0.889098 8.8492 0.195923 7.96815 0.234969 6.96737V6.31694C0.234348 6.16678 0.268062 6.01846 0.333519 5.88332L2.61989 1.16275C2.96806 0.559592 3.60871 0.184953 4.3051 0.177246H15.8749C16.5713 0.184953 17.212 0.559592 17.5601 1.16275L19.8465 5.88332ZM16.003 15.9453V10.0323H17.974V15.9453C17.974 17.0339 17.0916 17.9163 16.003 17.9163H4.17699C3.08843 17.9163 2.20598 17.0339 2.20598 15.9453V10.0323H4.17699V15.9453H8.119V12.0033C8.119 11.459 8.56021 11.0178 9.1045 11.0178H11.0755C11.6198 11.0178 12.061 11.459 12.061 12.0033V15.9453H16.003Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Marketplace</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://www.parceiromagalu.com.br/divulgador" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 22 22" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <g clip-path="url(#clip0)">
                                                   <g filter="url(#filter0_d)">
                                                      <path d="M13.5799 7.8452C13.8928 7.8452 14.2092 7.93038 14.4404 8.09678L16.1442 9.6576C16.5719 9.96583 17.237 10.511 17.6231 10.8695L19.1705 12.3077L21.8987 9.14581L17.6585 5.08687L16.6378 6.08877C16.6378 6.08877 16.2966 6.01155 16.0592 5.89627L14.4601 5.11829C14.2656 5.02359 14.0262 4.97778 13.7821 4.97778C13.4312 4.97778 13.0699 5.07226 12.8165 5.25127L10.3427 6.98645C9.9126 7.29025 9.81745 7.88502 10.1314 8.30853L10.2781 8.50656C10.479 8.77762 10.8083 8.92587 11.1375 8.92587C11.3225 8.92587 11.5073 8.87896 11.6695 8.78116L12.8431 8.03194C13.0502 7.90671 13.3137 7.8452 13.5799 7.8452Z"></path>
                                                      <path d="M10.7088 16.41L10.5294 16.2396C10.3448 16.0635 10.1065 15.9761 9.86865 15.9761C9.6153 15.9761 9.36283 16.075 9.17542 16.2717L9.17254 16.2666C9.53586 15.8854 9.52126 15.2758 9.14023 14.9127L8.96123 14.7421C8.77758 14.5669 8.54104 14.4801 8.30473 14.4801C8.06576 14.4801 7.82701 14.5686 7.64269 14.7432L8.00159 14.3671C8.36535 13.986 8.35119 13.3762 7.96928 13.0129L7.79072 12.8423C7.60663 12.6668 7.36943 12.5799 7.13245 12.5799C6.88662 12.5799 6.64079 12.6732 6.45471 12.8587C6.75386 12.4761 6.72421 11.9196 6.36576 11.5778L6.18763 11.4078C6.00265 11.2315 5.76435 11.1443 5.52649 11.1443C5.27313 11.1443 5.02045 11.2432 4.83303 11.4399L3.03412 13.3258C2.67036 13.707 2.68474 14.3164 3.06687 14.6797L3.24521 14.8499C3.42864 15.0247 3.66452 15.1112 3.90017 15.1112C4.11723 15.1112 4.33452 15.0379 4.51109 14.8937L4.03713 15.3904C3.67381 15.7719 3.68841 16.3813 4.06922 16.7448L4.24888 16.9152C4.43364 17.0913 4.67173 17.1787 4.90937 17.1787C5.16272 17.1787 5.41541 17.0798 5.60282 16.8831L5.97278 16.495C5.64376 16.8776 5.66522 17.4586 6.03474 17.8109L6.21419 17.9815C6.39872 18.1574 6.63681 18.2448 6.87445 18.2448C7.12802 18.2448 7.38071 18.1456 7.56813 17.9489L8.16289 17.334C7.79913 17.7153 7.81329 18.3247 8.19498 18.6884L8.37398 18.8588C8.55852 19.0351 8.79683 19.1223 9.03447 19.1223C9.28782 19.1223 9.54051 19.0234 9.72814 18.8265L10.7411 17.7644C11.1044 17.3832 11.0896 16.7736 10.7088 16.41Z"></path>
                                                      <path d="M19.143 13.209L16.7235 10.9613C16.3953 10.6836 16.0223 10.3865 15.7561 10.1946L15.7244 10.1718L15.6957 10.1455L14.0275 8.61744C13.9173 8.54929 13.7494 8.50769 13.5799 8.50769C13.4303 8.50769 13.2861 8.54022 13.1914 8.59554L12.0264 9.33922L12.0193 9.34364L12.0122 9.34807C11.752 9.50517 11.4493 9.58836 11.1373 9.58836C10.5848 9.58836 10.0642 9.33125 9.74468 8.90088L9.59798 8.70285C9.33865 8.35303 9.23377 7.92443 9.30258 7.49605C9.37118 7.0679 9.60439 6.69418 9.96152 6.44193L10.94 5.75534C10.4884 5.54801 9.7553 5.53916 9.284 5.74118C9.284 5.74118 8.76136 5.97063 8.59408 6.04144C8.20487 6.2065 7.66055 6.20407 7.66055 6.20407L6.38251 5.01343L1.98193 9.38546L3.9687 11.3837L4.35348 10.9804C4.65728 10.662 5.08522 10.479 5.52753 10.479C5.94683 10.479 6.34423 10.6376 6.64693 10.9262L6.82505 11.0961C7.06778 11.3275 7.22377 11.6165 7.28993 11.9221C7.64993 11.9564 7.98626 12.1093 8.25068 12.3611L8.42791 12.5306C8.74123 12.8288 8.91957 13.2318 8.92997 13.6659C8.93218 13.7562 8.92687 13.8456 8.91492 13.933C9.10079 14.0086 9.27227 14.1188 9.42096 14.2604L9.59953 14.4308C9.86018 14.6793 10.0197 14.9944 10.0772 15.3243C10.4189 15.3677 10.7366 15.5177 10.9878 15.7571L11.1683 15.9286C11.7093 16.4448 11.8131 17.2484 11.4717 17.8764L11.9622 18.3329C12.3475 18.6918 12.9568 18.6694 13.3157 18.2835L13.4834 18.1028C13.8346 17.7244 13.8169 17.1354 13.4531 16.7751L14.6944 17.9266C15.0808 18.2849 15.6899 18.2625 16.0488 17.876L16.2165 17.6958C16.573 17.3122 16.5524 16.7083 16.1723 16.3488L16.4914 16.6457C16.8773 17.0042 17.4866 16.9816 17.8449 16.5955L18.0128 16.4151C18.3713 16.029 18.3489 15.4194 17.963 15.061L17.6933 14.8107C18.0805 15.1493 18.6728 15.1232 19.0247 14.7439L19.1933 14.5631C19.5513 14.177 19.5291 13.5676 19.143 13.209Z"></path>
                                                   </g>
                                                </g>
                                                <defs>
                                                   <filter id="filter0_d" x="-2.01807" y="4.97778" width="27.9168" height="22.1445" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                      <feblend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feblend>
                                                   </filter>
                                                </defs>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Parceiro Magalu</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://querodecasamento.com.br/lista-de-casamento/busca/?utm_source=magazineluiza.com.br&amp;utm_medium=referral&amp;utm_campaign=convidados" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M18.1322 5.0529H16.7824C17.0106 4.58573 17.1303 4.07302 17.1324 3.55311C17.1324 2.62498 16.7637 1.73487 16.1074 1.07858C15.4511 0.422299 14.561 0.0536005 13.6329 0.0536005C12.1786 -0.00934065 10.8175 0.76846 10.1334 2.05332C9.44926 0.76846 8.08811 -0.00934065 6.63386 0.0536005C4.70113 0.0536005 3.13435 1.62038 3.13435 3.55311C3.13648 4.07302 3.25611 4.58573 3.4843 5.0529H2.13449C1.03007 5.0529 0.134766 5.94821 0.134766 7.05262V10.0522C0.134766 11.1566 1.03007 12.0519 2.13449 12.0519V18.0511C2.13449 19.1555 3.02979 20.0508 4.13421 20.0508H16.1325C17.237 20.0508 18.1322 19.1555 18.1322 18.0511V12.0519C19.2367 12.0519 20.132 11.1566 20.132 10.0522V7.05262C20.132 5.94821 19.2367 5.0529 18.1322 5.0529ZM13.6329 2.05332C14.4612 2.05332 15.1327 2.7248 15.1327 3.55311C15.1327 4.38141 14.4612 5.0529 13.6329 5.0529H11.2532C11.6732 2.05332 13.053 2.05332 13.6329 2.05332ZM5.13407 3.55311C5.13407 2.7248 5.80554 2.05332 6.63386 2.05332C7.21377 2.05332 8.63358 2.05332 9.01352 5.0529H6.63386C5.80554 5.0529 5.13407 4.38141 5.13407 3.55311ZM2.13449 7.05262H9.13351V10.0522H2.13449V7.05262ZM4.13421 12.0519H9.13351V18.0511H4.13421V12.0519ZM16.1325 18.0511H11.1332V12.0519H16.1325V18.0511ZM18.1322 10.0522H11.1332V7.05262H18.1322V10.0522Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Lista de Casamento</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://listasmagalu.com/chadebebe" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 24 24" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="m11.888 2c1.1452 0.02009 2.2101 0.2411 3.2548 0.7032 1.2256 0.54247 2.2905 1.3863 3.0941 2.4713 0.8037 1.0648 1.3261 2.3306 1.527 3.6366 0.0603 0.36165 0.0804 0.72329 0.0804 1.0849-0.0201 1.0045-0.4822 1.7479-1.3863 2.21-0.4822 0.2612-1.0448 0.3215-1.5672 0.201-0.0402-0.0201-0.1004-0.0201-0.1406 0-0.0402 0-0.1005 0.0401-0.1407 0.0602-0.7434 0.5626-1.4867 1.1051-2.2301 1.6676-0.7635 0.5626-1.527 1.1452-2.2905 1.7078-0.1406 0.1206-0.2411 0.1206-0.4018 0-0.8037-0.6228-1.6073-1.2457-2.4311-1.8685-0.64293-0.4822-1.2859-0.9644-1.9087-1.4868-0.20092-0.1607-0.36165-0.1607-0.58266-0.1205-0.56256 0.1004-1.105-0.0402-1.5872-0.3416-0.62284-0.3817-0.98448-0.9644-1.1452-1.6877-0.06027-0.34153-0.02009-0.66299 0-1.0046 0.04019-0.4822 0.12055-0.9443 0.26119-1.4064 0.52238-1.8886 1.748-3.5361 3.4156-4.5809 0.86394-0.54247 1.8283-0.92421 2.8329-1.105 0.3415-0.06027 0.6831-0.10046 1.0247-0.10046 0.1205-0.02009 0.221-0.04018 0.3214-0.04018zm-0.6027 12.838c0-0.0402 0-0.1005-0.0201-0.1407-0.3215-0.7634-0.6229-1.5269-0.9443-2.2904-0.0402-0.0804-0.0804-0.1205-0.1607-0.1004-0.18087 0-0.3617 0-0.52243-0.0402-0.50229-0.1005-0.92421-0.3215-1.2658-0.6831-0.08036-0.0804-0.12055-0.0804-0.20091 0-0.12055 0.1406-0.28128 0.2411-0.44201 0.3415-0.14065 0.0804-0.14065 0.1005 0 0.2009 1.1653 0.8841 2.3105 1.7882 3.4758 2.6722 0.0201 0.0201 0.0201 0.0201 0.0402 0.0201 0 0.0201 0.0201 0.0201 0.0402 0.0201zm0.5826 0.1406c0.0603-0.0201 0.0603-0.0803 0.0804-0.1406 0.1205-0.2813 0.2411-0.5626 0.3616-0.8439 0.2411-0.5424 0.4822-1.105 0.7032-1.6475 0.0402-0.0803 0.0201-0.1205-0.0602-0.1406-0.3818-0.1206-0.7233-0.3416-0.9845-0.6228-0.0603-0.0603-0.1206-0.0603-0.1808 0-0.2612 0.2812-0.6028 0.4822-0.9845 0.6027-0.0804 0.0201-0.1206 0.0603-0.0804 0.1406 0.0201 0.0402 0.0201 0.0804 0.0402 0.1005 0.1607 0.4018 0.3215 0.7836 0.4822 1.1854 0.1808 0.4219 0.3616 0.8639 0.5425 1.2859 0.0401 0.0401 0.0401 0.0602 0.0803 0.0803zm0.6028-0.1406c0.0603 0 0.1004-0.0201 0.1406-0.0603l2.6521-1.989c0.2813-0.201 0.5626-0.422 0.8238-0.6229 0.1004-0.0804 0.1004-0.1004-0.0201-0.1607-0.1608-0.1005-0.3215-0.221-0.4621-0.3818-0.0603-0.0803-0.1206-0.0803-0.201 0-0.5022 0.5023-1.105 0.7233-1.8082 0.7233-0.0804 0-0.1205 0.0201-0.1607 0.1005-0.2612 0.6027-0.5224 1.2055-0.7836 1.8082-0.0402 0.1809-0.1406 0.3617-0.1808 0.5827z"></path>
                                                <path d="m9.4563 16.366c0.30138 0 0.64296-0.0201 0.98446-0.0201 0.9845 0.0201 1.969 0 2.9334 0.0201 0.5626 0.0201 1.1251 0 1.6877 0.0201 0.442 0 0.7233 0.4018 0.6027 0.8036-0.0402 0.1206-0.1205 0.221-0.221 0.2813-0.1004 0.0804-0.221 0.1206-0.3415 0.1206h-0.1608c-0.0602 0-0.0602 0.0201-0.0602 0.0803 0.0401 0.1809 0.02 0.3617 0.02 0.5425 0 0.7233 0.0201 1.4466 0 2.19-0.02 0.6429-0.3214 1.1251-0.9041 1.4265-0.221 0.1205-0.4621 0.1808-0.7233 0.1607-0.4621 0-0.9041 0.0201-1.3662 0-0.5626-0.0201-1.105 0-1.6676-0.0201-0.56255-0.0402-0.98447-0.3214-1.2658-0.8036-0.16073-0.2612-0.22101-0.5626-0.22101-0.8841 0-0.5826-0.02009-1.1653 0.02009-1.7479 0.02009-0.3014-0.02009-0.6028 0.04019-0.9041 0.02009-0.0804-0.0201-0.1005-0.08037-0.0804-0.12055 0-0.2411 0-0.36165-0.0402-0.2411-0.1005-0.40183-0.3817-0.36165-0.6429 0.04019-0.2612 0.30138-0.5023 0.56257-0.5023h0.42192 0.4621z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Chá de Bebê</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/cliente-ouro/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M14.5281 9.41194L12.6075 11.2844L13.061 13.9279C13.0873 14.0819 13.0241 14.2375 12.8978 14.3293C12.8263 14.3808 12.7415 14.4074 12.6564 14.4074C12.5912 14.4074 12.5257 14.3922 12.4655 14.3606L10.0913 13.1123L7.71738 14.3606C7.65719 14.3922 7.59202 14.4074 7.52618 14.4074C7.44138 14.4074 7.35692 14.3808 7.28543 14.3293C7.15907 14.2375 7.09556 14.0819 7.12216 13.9279L7.57539 11.2844L5.6544 9.41194C5.543 9.3032 5.50244 9.14027 5.55098 8.99129C5.59887 8.84299 5.72755 8.73459 5.88218 8.71231L8.53639 8.32658L9.7235 5.92143C9.79266 5.78111 9.93498 5.69232 10.0913 5.69232C10.2476 5.69232 10.3902 5.78111 10.4594 5.92143L11.6465 8.32658L14.3007 8.71231C14.4553 8.73459 14.5837 8.84299 14.6319 8.99129C14.6801 9.14027 14.6399 9.3032 14.5281 9.41194ZM10.0923 0.0500488C4.56972 0.0500488 0.0922852 4.52715 0.0922852 10.05C0.0922852 15.5729 4.56972 20.05 10.0923 20.05C15.6155 20.05 20.0923 15.5729 20.0923 10.05C20.0923 4.52715 15.6155 0.0500488 10.0923 0.0500488Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Cliente Ouro</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://magazineluiza.com.br/empresas/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 14 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M7.22962 0.137743L7.06573 0.0500488L6.90184 0.137743C5.93565 0.718129 5.13421 1.56748 4.58247 2.59576C4.03074 3.62404 3.74927 4.79292 3.7679 5.9785V10.5218L0.318359 14.2135H3.87025L4.6031 16.5663H9.52836L10.2612 14.2135H13.8131L10.3636 10.5218V5.9785C10.3822 4.79292 10.1007 3.62404 9.54898 2.59576C8.99725 1.56748 8.19581 0.718129 7.22962 0.137743ZM7.0643 0.939449C7.74876 1.40367 8.33066 2.02171 8.7696 2.75069C8.72684 2.77991 8.67733 2.80959 8.62265 2.84137C8.1428 3.11029 7.60727 3.24517 7.06573 3.23351C6.52419 3.24517 5.98867 3.11028 5.50883 2.84137C5.4507 2.80758 5.39892 2.77615 5.35426 2.74535C5.79183 2.0149 6.376 1.39799 7.0643 0.939449ZM7.06573 5.58636C7.28314 5.58636 7.49568 5.65536 7.67645 5.78462C7.85723 5.91389 7.99812 6.09762 8.08133 6.31259C8.16453 6.52755 8.1863 6.76409 8.14388 6.99229C8.10146 7.2205 7.99677 7.43012 7.84303 7.59464C7.6893 7.75917 7.49342 7.87121 7.28019 7.9166C7.06695 7.962 6.84592 7.9387 6.64505 7.84966C6.44419 7.76062 6.2725 7.60983 6.15171 7.41637C6.03093 7.22291 5.96645 6.99546 5.96645 6.76278C5.96677 6.45088 6.08269 6.15185 6.28877 5.9313C6.49486 5.71075 6.77428 5.5867 7.06573 5.58636Z" fill="currentColor"></path>
                                                <path d="M9.41583 17.3506H4.71533L7.06558 19.8658L9.41583 17.3506Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Soluções para empresas</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://www.luizaseg.com.br/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5792 4.27726L10.1002 0.0607877C9.96195 -0.00833481 9.77763 -0.0313757 9.63938 0.0607877L1.18339 4.25422C0.999064 4.34639 0.860819 4.53071 0.88386 4.76112C1.11427 8.53982 2.08198 11.5812 3.57964 14.0927C5.10034 16.5811 7.17401 18.4704 9.5933 19.922C9.75459 20.0142 9.96195 20.0372 10.1463 19.922C12.5886 18.4704 14.6392 16.5811 16.1599 14.0927C17.6806 11.6043 18.6484 8.56286 18.8788 4.78416C18.8788 4.57679 18.7866 4.36943 18.5792 4.27726ZM8.90224 12.7448C8.93104 12.7505 8.95985 12.7563 8.99441 12.7563H10.7225C11.022 12.7563 11.2524 12.5259 11.2524 12.2494C11.2524 12.1803 11.2294 12.1112 11.2063 12.042L10.6764 10.4983C10.9529 10.36 11.2063 10.1296 11.3676 9.87619C11.5289 9.5997 11.6441 9.25409 11.6441 8.90847C11.6441 8.40158 11.4367 7.9638 11.1142 7.64123C10.7916 7.31866 10.3308 7.11129 9.84692 7.11129C9.34002 7.11129 8.90224 7.31866 8.57967 7.64123C8.2571 7.9638 8.04973 8.40158 8.04973 8.90847C8.04973 9.25409 8.16494 9.5997 8.34926 9.87619C8.51055 10.1296 8.764 10.36 9.04049 10.4983L8.48751 12.0651C8.39534 12.3416 8.53359 12.6411 8.81008 12.7333C8.84464 12.7333 8.87344 12.739 8.90224 12.7448Z" fill="currentColor"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Luizaseg</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/plano-controle/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.34451 0.0500488H15.0673C15.5387 0.1679 15.8628 0.639307 15.8628 1.28749V18.7001C15.8628 19.4072 15.4503 19.9375 14.8905 19.9375H5.52128C4.96149 19.9375 4.54901 19.4072 4.54901 18.7001V11.9825H1.86788C0.83668 11.9825 0.0117188 11.1576 0.0117188 10.1264V6.62028C0.0117188 5.58908 0.83668 4.76412 1.86788 4.76412H4.54901V1.25803C4.54901 0.609844 4.8731 0.138438 5.34451 0.0500488ZM11.0602 0.845503H9.67547C9.55762 0.845503 9.4987 0.933892 9.4987 1.02228C9.4987 1.11067 9.58708 1.19906 9.67547 1.19906H11.0602C11.1486 1.19906 11.237 1.11067 11.237 1.02228C11.237 0.933892 11.1486 0.845503 11.0602 0.845503ZM10.2945 19.3482C9.88204 19.3482 9.52848 19.0241 9.52848 18.5822C9.52848 18.1697 9.85258 17.8161 10.2945 17.8161C10.707 17.8161 11.0606 18.1402 11.0606 18.5822C11.0311 18.9947 10.707 19.3482 10.2945 19.3482ZM5.96273 17.168H14.4481H14.4775V2.20086H5.96273V4.7936H8.17245C9.20365 4.7936 10.0286 5.61856 10.0286 6.64976V13.8387C10.0286 13.9271 9.96969 13.986 9.91076 14.0155H9.85184C9.79291 14.0155 9.73398 14.0155 9.70452 13.9566L8.26084 11.9826H8.17245H5.96273V17.168Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Plano Controle</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://magazineluiza.com.br/lojista/consorcioluiza/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.28849 5.43286H13.9824C13.9824 5.43286 19.3685 10.0484 19.3685 15.4345C19.3685 18.5108 17.0587 20.05 15.5216 20.05H4.74929C3.21851 20.05 0.902344 18.5108 0.902344 15.4345C0.902344 10.0484 6.28849 5.43286 6.28849 5.43286ZM10.9041 17.3569V16.1251C12.0832 15.8998 12.7907 15.1628 12.7907 14.0616C12.7907 13.032 12.2201 12.4677 10.8956 12.1897L10.1018 12.0213C9.32906 11.8486 9.01532 11.6233 9.01532 11.2169C9.01532 10.7158 9.4954 10.3957 10.1608 10.3957C10.8261 10.3957 11.3104 10.7432 11.3757 11.2633H12.6622C12.6285 10.3094 11.9358 9.59983 10.8956 9.36821V8.1259H9.35854V9.3661C8.2931 9.60404 7.62352 10.3284 7.62352 11.3327C7.62352 12.3371 8.21309 12.9625 9.41328 13.2131L10.2703 13.3962C11.0788 13.5773 11.4073 13.8174 11.4073 14.2385C11.4073 14.7333 10.8998 15.0807 10.1839 15.0807C9.40697 15.0807 8.87004 14.7375 8.80476 14.2048H7.47191C7.52245 15.2197 8.23414 15.9188 9.36696 16.1293V17.3569H10.9041Z"></path>
                                                <path d="M13.9812 0.815325H11.8546C11.4154 0.328156 10.7902 0.0500488 10.1343 0.0500488C9.47836 0.0500488 8.8532 0.328156 8.414 0.815325H6.28734C6.03298 0.816427 5.79555 0.942966 5.65281 1.1535C5.51007 1.36403 5.48041 1.63143 5.57353 1.86813L6.28734 3.89162H13.9812L14.695 1.86813C14.7882 1.63143 14.7585 1.36403 14.6157 1.1535C14.473 0.942966 14.2356 0.816427 13.9812 0.815325Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Consórcio Luiza</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://www.residencialmagazineluiza.com.br/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1884 6.83865L19.767 9.55696C20.1291 9.93866 19.9952 10.251 19.4685 10.251H17.5361V18.67C17.5361 19.3305 17.0004 19.8658 16.3403 19.8658H4.38224C3.72167 19.8658 3.18643 19.3305 3.18643 18.67V10.251H1.254C0.727369 10.251 0.593439 9.93866 0.955529 9.55696L9.70263 0.336325C10.0647 -0.0453766 10.6574 -0.0453766 11.0195 0.336325L14.1592 3.64584V1.17961H17.1884V6.83865ZM11.4685 16.3741V13.695C12.2993 13.2855 12.8719 12.4327 12.8719 11.444C12.8719 10.0569 11.7473 8.93281 10.3607 8.93281C8.97402 8.93281 7.84949 10.0569 7.84949 11.444C7.84949 12.4322 8.42252 13.2855 9.25289 13.695V16.3741C9.25289 16.9859 9.74891 17.4819 10.3607 17.4819C10.972 17.4819 11.4685 16.9859 11.4685 16.3741Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Seguro Casa Protegida</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/casa-inteligente/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M19.1536 7.41042L10.5251 0.353258C10.2299 0.107486 9.86897 0.142596 9.5737 0.388368L0.945238 7.41042C0.354696 7.90196 0.682775 8.81483 1.43736 8.81483H2.61844V18.751C2.61844 19.3479 2.91371 20.0501 3.47144 20.0501H9.18001C9.18001 18.2946 9.18001 16.8902 9.18001 15.8369C9.18001 14.7836 10.8204 14.7836 10.8204 15.8369C10.8204 16.8902 10.8204 18.2946 10.8204 20.0501H16.6274C17.1851 20.0501 17.7101 19.3128 17.7101 18.751V8.81483H18.6615C19.4161 8.81483 19.7441 7.90196 19.1536 7.41042ZM13.117 13.66C12.8873 13.9058 12.5264 13.8707 12.2968 13.66C11.739 13.0281 10.9844 12.677 10.1642 12.677C9.37686 12.677 8.62228 13.0632 8.06454 13.66C7.96612 13.7654 7.80208 13.9058 7.67085 13.9058C7.50681 13.9058 7.37558 13.8356 7.27715 13.7303C7.0475 13.4845 7.0475 12.9578 7.27715 12.7121C8.06454 11.8694 9.11439 11.3077 10.1971 11.3077C11.3125 11.3077 12.3624 11.8694 13.117 12.7121C13.3466 12.9227 13.3466 13.4143 13.117 13.66ZM15.6432 10.9917C15.4135 11.2374 15.0526 11.2023 14.823 10.9917C13.5763 9.65748 11.9359 8.92016 10.1642 8.92016C8.39262 8.92016 6.75223 9.65748 5.50553 10.9917C5.40711 11.097 5.24307 11.1672 5.11184 11.1672C4.9478 11.1672 4.81656 11.097 4.71814 10.9917C4.48849 10.7459 4.48849 10.3597 4.71814 10.1139C6.16169 8.56906 8.13016 7.6913 10.1642 7.6913C12.2311 7.6913 14.1668 8.53395 15.6432 10.1139C15.8728 10.3597 15.8728 10.7459 15.6432 10.9917Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Casa inteligente</span></div>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="sc-hBEYos jDvQKF">
                              <ul data-testid="list" class="sc-hBEYos dziZxi sc-fvFlmW ipWRIt">
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://atendimento.magazineluiza.com.br/hc/pt-br/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 20 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M18.0236 7.13119H17.0368V5.27952C17.1071 4.06455 16.681 2.87177 15.8511 1.96078C15.0213 1.04978 13.855 0.49432 12.606 0.415283H7.67181C6.41928 0.489465 5.24794 1.04283 4.41391 1.95437C3.5799 2.86591 3.15107 4.06144 3.22122 5.27952V7.13119H2.2344C1.71095 7.13119 1.20894 7.33334 0.838816 7.69322C0.468677 8.05309 0.260742 8.54115 0.260742 9.05002V11.9283C0.260742 12.4371 0.468677 12.9252 0.838816 13.2851C1.20894 13.6449 1.71095 13.8471 2.2344 13.8471H3.22122C3.74467 13.8471 4.24668 13.6449 4.6168 13.2851C4.98694 12.9252 5.19488 12.4371 5.19488 11.9283V5.27952C5.12816 4.57393 5.34779 3.87092 5.80689 3.3206C6.26599 2.77029 6.92818 2.41627 7.65208 2.33411H12.5862C13.3137 2.41163 13.9808 2.76367 14.444 3.31451C14.9072 3.86534 15.1296 4.57095 15.0632 5.27952V12.8877C15.1603 13.4952 15.0078 14.1154 14.6385 14.6144C14.2691 15.1135 13.7128 15.4513 13.0895 15.5549V15.1327C13.0895 14.7917 12.9502 14.4648 12.7022 14.2237C12.4542 13.9826 12.1179 13.8471 11.7671 13.8471H8.49088C8.14017 13.8471 7.80383 13.9826 7.55584 14.2237C7.30785 14.4648 7.16853 14.7917 7.16853 15.1327V16.3991C7.16853 16.7401 7.30785 17.0671 7.55584 17.3082C7.80383 17.5493 8.14017 17.6848 8.49088 17.6848H11.7671H11.8658C13.6125 17.5984 16.4842 17.0611 16.9677 13.8471H18.0236C18.547 13.8471 19.049 13.6449 19.4192 13.2851C19.7894 12.9252 19.9973 12.4371 19.9973 11.9283V9.05002C19.9973 8.54115 19.7894 8.05309 19.4192 7.69322C19.049 7.33334 18.547 7.13119 18.0236 7.13119Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Central de Atendimento</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/regulamentos/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 18 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path d="M16 0H2C0.9 0 0 0.9 0 2V20L1.5 18.5L3 20L4.5 18.5L6 20L7.5 18.5L9 20L10.5 18.5L12 20L13.5 18.5L15 20L16.5 18.5L18 20V2C18 0.9 17.1 0 16 0ZM15.2 13.5H2.7C2.3 13.5 1.95 13.15 1.95 12.75C1.95 12.35 2.3 12 2.7 12H15.2C15.6 12 15.95 12.35 15.95 12.75C15.95 13.15 15.6 13.5 15.2 13.5ZM15.2 10H2.7C2.3 10 1.95 9.65 1.95 9.25C1.95 8.85 2.3 8.5 2.7 8.5H15.2C15.6 8.5 15.95 8.85 15.95 9.25C15.95 9.65 15.6 10 15.2 10ZM15.2 6.5H2.7C2.3 6.5 1.95 6.15 1.95 5.75C1.95 5.35 2.3 5 2.7 5H15.2C15.6 5 15.95 5.35 15.95 5.75C15.95 6.15 15.6 6.5 15.2 6.5Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Regulamentos</span></div>
                                       </div>
                                    </a>
                                 </li>
                                 <li data-testid="list-item-container" class="sc-hHKmLs nJfnd">
                                    <a onclick="return false" href="https://especiais.magazineluiza.com.br/politica-de-privacidade/" data-testid="list-item" class="sc-dtTInj iWNiav sc-jnHOtz dMtmol">
                                       <div height="45px" class="sc-idOhPF julNFl sc-XhUPp gMXQIB">
                                          <div width="45px" height="100%" class="sc-idOhPF ftaimA sc-cTkOiY brFinj">
                                             <svg width="24" height="24" data-testid="list-item-starticon" viewBox="0 0 18 20" color="gray" fill="gray" class="sc-dlfnbm iMkLEv sc-ikPAkQ eUstsA">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.2304 1.96676L9.04974 0.145508L0.869044 1.96676C0.417145 2.06867 0.0953212 2.46889 0.0927734 2.93212V8.10726C0.0927734 11.0929 2.08321 18.0594 9.04974 20.0499C16.0163 18.0594 18.0067 11.0929 18.0067 8.10726V2.93212C18.0041 2.46889 17.6824 2.06867 17.2304 1.96676Z"></path>
                                             </svg>
                                          </div>
                                          <div data-testid="list-item-content" height="100%" class="sc-idOhPF iSCDNh sc-ezipRf bSkNQK"><span font-size="1" font-weight="regular" class="sc-dkIXFM dnbWft">Política de Privacidade</span></div>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="sc-hBEYos lnsBjm">
                              <a onclick="return false" href="tel:08007733838" color="primary" class="sc-iBPRYJ jpGyYO">
                                 <span class="sc-eCssSg hmocIu">
                                    <svg width="24" height="24" data-testid="PhoneIcon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx">
                                       <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"></path>
                                    </svg>
                                 </span>
                                 <label class="sc-jSgupP bGikiP">0800 773 3838</label><span class="sc-gKsewC gnwqMi"></span>
                              </a>
                              <a onclick="return false" href="https://www9.directtalk.com.br/clientes/custom/magluiza/init2.html" color="primary" class="sc-iBPRYJ fPwqnt"><span class="sc-eCssSg hmocIu"></span><label class="sc-jSgupP bGikiP">Compre pelo chat</label><span class="sc-gKsewC gnwqMi"></span></a>
                           </div>
                        </nav>
                        <div class="sc-hBEYos dxixGM">
                           <p font-size="1" color="darkGray" class="sc-jJEJSO ceybkf">Compre pelo televendas</p>
                           <p font-size="1" color="darkGray" font-weight="medium" class="sc-jJEJSO bGbVYF">Seg. à Dom. (exceto feriados)</p>
                           <p font-size="1" color="darkGray" font-weight="medium" class="sc-jJEJSO bGbVYF">das 8h às 20h</p>
                        </div>
                     </div>
                  </div>

                  <div id="overlay" onclick="off_modal('menu')"></div>

               </aside>



            </header>


            <div data-testid="breadcrumb-container" class="sc-hBEYos cLnbUA">
               <div class="sc-exiMuG lcVukj">
                  <div class="sc-idOhPF liohtw sc-eishCr bXwziS">
                     <div class="sc-idOhPF liohtw sc-dkaWxM AOAr">
                        <div data-testid="breadcrumb-item-list" class="sc-idOhPF liohtw sc-httYMd eunqYU">

                           <svg width="60" height="14" data-testid="magalogo" viewBox="0 0 60 14" title="Logo magalu" color="#0086ff" class="sc-dlfnbm bIQGKo sc-kRGEVP jkqmAl" fill="#0086ff">
                              <path d="M59.379 0.210938H58.0197C57.633 0.210938 57.3987 0.445293 57.3987 0.83198V4.85118C57.3987 6.32762 56.6018 7.15959 55.4945 7.15959C54.3286 7.15959 53.6724 6.40379 53.6724 4.94492V0.83198C53.6724 0.445293 53.438 0.210938 53.0514 0.210938H51.6921C51.3054 0.210938 51.071 0.445293 51.071 0.83198V5.13827C51.071 7.87437 52.4889 9.42698 54.6215 9.42698C55.9046 9.42698 56.8889 8.99928 57.592 8.1263L57.7092 8.67118C57.7853 9.02271 58.0197 9.21606 58.3888 9.21606H59.379C59.7656 9.21606 60 8.9817 60 8.59501V0.83198C60 0.445293 59.7715 0.210938 59.379 0.210938Z" fill="currentColor"></path>
                              <path d="M49.911 6.84906H47.4678C46.6124 6.84906 46.1671 6.40379 46.1671 5.54839V0.83198C46.1671 0.445293 45.9328 0.210938 45.5461 0.210938H44.1517C43.765 0.210938 43.5306 0.445293 43.5306 0.83198V5.87649C43.5306 7.95054 44.7903 9.21606 46.8702 9.21606H49.9168C50.3035 9.21606 50.5379 8.9817 50.5379 8.59501V7.47011C50.532 7.08342 50.2977 6.84906 49.911 6.84906Z" fill="currentColor"></path>
                              <path d="M10.3635 0.814404C10.3224 0.404281 10.1115 0.210938 9.72484 0.210938H8.69367C8.36557 0.210938 8.13122 0.345692 7.95545 0.638637L5.4537 4.86876L3.12772 0.638637C2.97539 0.345692 2.7176 0.210938 2.3895 0.210938H1.28217C0.895481 0.210937 0.684561 0.41014 0.643549 0.814404L0.00492948 8.57744C-0.0360828 9.00514 0.180696 9.21606 0.58496 9.21606H1.82705C2.21373 9.21606 2.44809 9.02271 2.46567 8.61259L2.73517 4.26529L4.22919 6.96038C4.38152 7.25333 4.63932 7.38808 4.96741 7.38808H5.82281C6.15091 7.38808 6.38527 7.27091 6.56103 6.96038L8.24839 4.07195L8.44174 8.61259C8.45931 9.02271 8.67609 9.21606 9.06278 9.21606H10.4045C10.8146 9.21606 11.0255 9.00514 10.9845 8.57744L10.3635 0.814404Z" fill="currentColor"></path>
                              <path d="M41.7261 0.21092H40.6598C40.2906 0.21092 40.0387 0.404264 39.9801 0.773374L39.9215 1.21865C39.3181 0.580031 38.4451 0 36.9862 0C34.5431 0 32.7385 1.92172 32.7385 4.69297C32.7385 7.4115 34.4259 9.42696 36.8339 9.42696C38.3455 9.42696 39.3356 8.78834 39.9391 8.12629L40.0387 8.67116C40.0973 9.0227 40.3317 9.21604 40.7008 9.21604H41.7319C42.1186 9.21604 42.353 8.98169 42.353 8.595V0.831963C42.3471 0.445276 42.1128 0.21092 41.7261 0.21092ZM37.5487 7.15957C36.1718 7.15957 35.2989 6.21043 35.2989 4.73399C35.2989 3.23997 36.2129 2.26739 37.5487 2.26739C38.9255 2.26739 39.7985 3.21653 39.7985 4.69297C39.8044 6.19285 38.8904 7.15957 37.5487 7.15957Z" fill="currentColor"></path>
                              <path d="M31.186 0.21092H30.1197C29.7506 0.21092 29.4987 0.404264 29.4401 0.773374L29.3815 1.21865C28.778 0.580031 27.9051 0 26.452 0C24.0089 0 22.2043 1.80454 22.2043 4.58166C22.2043 7.21816 23.8741 9.08129 26.2821 9.08129C27.7762 9.08129 28.6667 8.46024 29.2702 7.79819V8.24346C29.2702 9.79607 28.3972 10.7862 26.5516 10.7862C25.7783 10.7862 25.0752 10.6339 24.3604 10.3234C23.9913 10.1476 23.6984 10.2238 23.5285 10.5929L23.1008 11.4483C22.925 11.7998 22.9836 12.0869 23.3117 12.2802C24.3428 12.8603 25.6025 13.0946 26.8212 13.0946C29.8678 13.0946 31.8071 11.1729 31.8071 8.4954V0.831963C31.8071 0.445276 31.5727 0.21092 31.186 0.21092ZM27.0145 6.86662C25.6728 6.86662 24.7647 5.97607 24.7647 4.59337C24.7647 3.14037 25.7138 2.26739 27.0145 2.26739C28.3562 2.26739 29.2643 3.0642 29.2643 4.55822C29.2643 5.89991 28.3152 6.86662 27.0145 6.86662Z" fill="currentColor"></path>
                              <path d="M20.6516 0.21092H19.5853C19.2162 0.21092 18.9642 0.404264 18.9057 0.773374L18.8471 1.21865C18.2436 0.580031 17.3706 0 15.9176 0C13.4745 0 11.6699 1.92172 11.6699 4.69297C11.6699 7.4115 13.3573 9.42696 15.7653 9.42696C17.2769 9.42696 18.267 8.78834 18.8705 8.12629L18.9701 8.67116C19.0287 9.0227 19.263 9.21604 19.6322 9.21604H20.6633C21.05 9.21604 21.2844 8.98169 21.2844 8.595V0.831963C21.2726 0.445276 21.0383 0.21092 20.6516 0.21092ZM16.4801 7.15957C15.1032 7.15957 14.2303 6.21043 14.2303 4.73399C14.2303 3.23997 15.1442 2.26739 16.4801 2.26739C17.8569 2.26739 18.7299 3.21653 18.7299 4.69297C18.7299 6.19285 17.8159 7.15957 16.4801 7.15957Z" fill="currentColor"></path>
                           </svg>

                           <a data-testid="breadcrumb-item" onclick="return false" href="/" class="sc-hjWSAi hLigrX"><span class="sc-fWPcDo cgpajZ"></span></a>


                        </div>
                        <div data-testid="breadcrumb-item-list" class="sc-idOhPF liohtw sc-httYMd eunqYU">

                           <svg width="20" height="20" data-testid="ChevronRightIcon" color="#bcbcbc" class="sc-dlfnbm dTALkf sc-cbDGPM eTEuVf" fill="#bcbcbc" viewBox="0 0 24 24">
                              <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                           </svg>


                           <a data-testid="breadcrumb-item" onclick="return false" href="/utilidades-domesticas/l/ud/" class="sc-hjWSAi hLigrX"><span class="sc-fWPcDo cgpajZ"><?php echo $nome ?></span></a>
                        </div>
       
                     </div>
                  </div>
               </div>
            </div> <br><br>



            <script>
               jQuery(document).ready(function($) {
                  $('.fadeOut').owlCarousel({
                     items: 1,
                     animateOut: 'fadeOut',
                     loop: true,
                     margin: 10,
                  });
                  $('.custom1').owlCarousel({
                     animateOut: 'slideOutDown',
                     animateIn: 'flipInX',
                     items: 1,
                     margin: 5,
                     stagePadding: 0,
                     smartSpeed: 450
                  });
               });
            </script>

            <div class="sc-fZKJon drxYPY">
               <div data-testid="media-gallery" class="sc-hBEYos gzppyj sc-jExWIn IIEXN">
                  <div id="slides" data-testid="carousel" class="sc-hBEYos kfuYHs sc-cVkrFx hzPuOC">

                     <div class="custom1 owl-carousel owl-theme">

                        
						
						<?php $inc = 0; while ($inc <= $cont_img - 1) { ?>
						<div class="item">

                           <img width="1000" src="<?php echo $img[$inc] ?>">

                           <br><br>

                           <div hidden="" onClick="open_vd()" data-testid="media-gallery-icons" class="sc-hBEYos kfuYHs sc-cnEbbV djHfky">
                              <svg width="24" height="24" data-testid="media-gallery-video-icon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx">
                                 <g fill="none" transform="matrix(0.57213929,0,0,0.57213929,0.5572142,0.5572142)">
                                    <circle cx="20" cy="20" r="19.6" fill="#ffffff" fill-opacity="0.5" stroke="#a400e1"></circle>
                                    <path fill="#a400e1" d="m 14.267,13.093 v 13.814 c 0,1.053 1.16,1.693 2.053,1.12 L 27.173,21.12 C 28,20.6 28,19.4 27.173,18.867 L 16.32,11.973 c -0.893,-0.573 -2.053,0.067 -2.053,1.12 z"></path>
                                 </g>
                              </svg>
                           </div>

                           <div data-testid="media-gallery-counter" class="sc-eQhwCh hUpsvY">
                              <?php echo $inc + 1 ?> de  <?php echo $cont_img ?>
                           </div>

                        </div>
						<?php $inc ++ ;} ?>

                       


                      












                     </div>


                     <div id="myModal" class="modal-vd">


                        <!-- Modal content -->
                        <div class="modal-content">


                           <span class="close">&times;</span><br><br>

                           <center>
                              <iframe id="vd_youtube" width="100%" height="150" src="https://www.youtube.com/embed/2B3pO5PLW4o"></iframe>
                           </center>

                        </div>

                     </div>






                  </div>


                  <!-- BOTAO VIDEO 
					<div data-testid="media-gallery-icons" class="sc-hBEYos kfuYHs sc-cnEbbV djHfky">
                        <svg width="24" height="24" data-testid="media-gallery-video-icon" viewBox="0 0 24 24" class="sc-dlfnbm juTdIx">
                           <g fill="none" transform="matrix(0.57213929,0,0,0.57213929,0.5572142,0.5572142)">
                              <circle cx="20" cy="20" r="19.6" fill="#ffffff" fill-opacity="0.5" stroke="#a400e1"></circle>
                              <path fill="#a400e1" d="m 14.267,13.093 v 13.814 c 0,1.053 1.16,1.693 2.053,1.12 L 27.173,21.12 C 28,20.6 28,19.4 27.173,18.867 L 16.32,11.973 c -0.893,-0.573 -2.053,0.067 -2.053,1.12 z"></path>
                           </g>
                        </svg>
                     </div>
					 -->

               </div>
            </div>



            <script>
               var modal = document.getElementById("myModal");
               var btn = document.getElementById("myBtn");
               var span = document.getElementsByClassName("close")[0];

               function open_vd() {
                  modal.style.display = "block";

               }

               span.onclick = function() {


                  modal.style.display = "none";
                  var f = document.getElementById('vd_youtube');
                  f.src = f.src;

               }
               window.onclick = function(event) {
                  if (event.target == modal) {
                     modal.style.display = "none";
                  }
               }
            </script>


            <div data-testid="mod-heading" class="sc-dbGQSH hCGUTh">
               <h1 title="Jogo de Panelas Tramontina Antiaderente" font-size="24px" font-weight="500" color="#404040" class="sc-hKgILt gdRVKm"><?php echo $nome ?></h1>
            </div>
            <div data-testid="mod-row" class="sc-dbGQSH iiLfXx">

               <div class="sc-cXGDzr grJKpE">
			   
										   
				 <ul class="star-rating">
				 
                                           <li><i class="fa fa-star<?php if ($rating < 0.5) { echo '-o'; } else if ($rating == 0.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 1.5) { echo '-o'; } else if ($rating == 1.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 2.5) { echo '-o'; } else if ($rating == 2.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 3.5) { echo '-o'; } else if ($rating == 3.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 4.5) { echo '-o'; } else if ($rating == 4.5) { echo '-half-empty'; } ?>"></i></li>
				  
                  </ul>


                  <div data-testid="review" class="sc-kTaSZA eRNvLK"><span format="score-count" font-size="12px,1,1" font-weight="regular" color="text.scratched" class="sc-ha-DqYV gPvmMS"><?php echo $rating ?> (<?php echo $rand_aval ?>)</span></div>



               </div>



            </div>
            <div data-testid="mod-attributelist" class="sc-dbGQSH fjGQXS">
               <div width="1" class="sc-idOhPF inZpTL"></div>
            </div>
            <div data-testid="mod-productprice" class="sc-dbGQSH drcgfi">
               <div data-testid="product-price">
                  <div class="sc-hBEYos kfuYHs sc-hlWvWH hQvqSV">
                     <div data-testid="price-default" font-size="5,5" class="sc-hBEYos eThmMa sc-fFYUoA cIMAnL">
					 
                        <!-- BOTAO VIDEO  <p data-testid="price-original" font-size="1,1" font-weight="regular" color="text.light" class="sc-jJEJSO kBbKih sc-dYzljZ gduEyT">R$ 499,90</p>  -->
						 
                        <p data-testid="price-value" class="sc-jJEJSO cxPsYP sc-eUWgFQ hcHFJT" color="#404040">R$ <?php echo $valor_format ?></p>
                     </div>
                  </div>
               </div>
               <div width="48" height="35" class="sc-bqyKva hFCwVy"><img src="https://i.mlcdn.com.br/selo-ml/48x35/011759d4-e4a6-11eb-8691-1e04bf75c5fb.png" alt="selo sobre a promoção selo-piscouchegou" title="" data-testid="badge" class="sc-dQppl SpyTd" /></div>
            </div>
            <div data-testid="mod-sellerdelivery" class="sc-dbGQSH iiLfXx">
               <div class="sc-hBEYos kfuYHs">
                  <p data-testid="label" class="sc-jJEJSO cxPsYP sc-gEzdPt cPSMIt" color="#404040">
                     Vendido e entregue por
                     <svg width="60" height="14" data-testid="magalogo" viewBox="0 0 60 14" title="Logo magalu" color="#0086ff" class="sc-dlfnbm bIQGKo sc-kRGEVP jkqmAl" fill="#0086ff">
                        <path d="M59.379 0.210938H58.0197C57.633 0.210938 57.3987 0.445293 57.3987 0.83198V4.85118C57.3987 6.32762 56.6018 7.15959 55.4945 7.15959C54.3286 7.15959 53.6724 6.40379 53.6724 4.94492V0.83198C53.6724 0.445293 53.438 0.210938 53.0514 0.210938H51.6921C51.3054 0.210938 51.071 0.445293 51.071 0.83198V5.13827C51.071 7.87437 52.4889 9.42698 54.6215 9.42698C55.9046 9.42698 56.8889 8.99928 57.592 8.1263L57.7092 8.67118C57.7853 9.02271 58.0197 9.21606 58.3888 9.21606H59.379C59.7656 9.21606 60 8.9817 60 8.59501V0.83198C60 0.445293 59.7715 0.210938 59.379 0.210938Z" fill="currentColor"></path>
                        <path d="M49.911 6.84906H47.4678C46.6124 6.84906 46.1671 6.40379 46.1671 5.54839V0.83198C46.1671 0.445293 45.9328 0.210938 45.5461 0.210938H44.1517C43.765 0.210938 43.5306 0.445293 43.5306 0.83198V5.87649C43.5306 7.95054 44.7903 9.21606 46.8702 9.21606H49.9168C50.3035 9.21606 50.5379 8.9817 50.5379 8.59501V7.47011C50.532 7.08342 50.2977 6.84906 49.911 6.84906Z" fill="currentColor"></path>
                        <path d="M10.3635 0.814404C10.3224 0.404281 10.1115 0.210938 9.72484 0.210938H8.69367C8.36557 0.210938 8.13122 0.345692 7.95545 0.638637L5.4537 4.86876L3.12772 0.638637C2.97539 0.345692 2.7176 0.210938 2.3895 0.210938H1.28217C0.895481 0.210937 0.684561 0.41014 0.643549 0.814404L0.00492948 8.57744C-0.0360828 9.00514 0.180696 9.21606 0.58496 9.21606H1.82705C2.21373 9.21606 2.44809 9.02271 2.46567 8.61259L2.73517 4.26529L4.22919 6.96038C4.38152 7.25333 4.63932 7.38808 4.96741 7.38808H5.82281C6.15091 7.38808 6.38527 7.27091 6.56103 6.96038L8.24839 4.07195L8.44174 8.61259C8.45931 9.02271 8.67609 9.21606 9.06278 9.21606H10.4045C10.8146 9.21606 11.0255 9.00514 10.9845 8.57744L10.3635 0.814404Z" fill="currentColor"></path>
                        <path d="M41.7261 0.21092H40.6598C40.2906 0.21092 40.0387 0.404264 39.9801 0.773374L39.9215 1.21865C39.3181 0.580031 38.4451 0 36.9862 0C34.5431 0 32.7385 1.92172 32.7385 4.69297C32.7385 7.4115 34.4259 9.42696 36.8339 9.42696C38.3455 9.42696 39.3356 8.78834 39.9391 8.12629L40.0387 8.67116C40.0973 9.0227 40.3317 9.21604 40.7008 9.21604H41.7319C42.1186 9.21604 42.353 8.98169 42.353 8.595V0.831963C42.3471 0.445276 42.1128 0.21092 41.7261 0.21092ZM37.5487 7.15957C36.1718 7.15957 35.2989 6.21043 35.2989 4.73399C35.2989 3.23997 36.2129 2.26739 37.5487 2.26739C38.9255 2.26739 39.7985 3.21653 39.7985 4.69297C39.8044 6.19285 38.8904 7.15957 37.5487 7.15957Z" fill="currentColor"></path>
                        <path d="M31.186 0.21092H30.1197C29.7506 0.21092 29.4987 0.404264 29.4401 0.773374L29.3815 1.21865C28.778 0.580031 27.9051 0 26.452 0C24.0089 0 22.2043 1.80454 22.2043 4.58166C22.2043 7.21816 23.8741 9.08129 26.2821 9.08129C27.7762 9.08129 28.6667 8.46024 29.2702 7.79819V8.24346C29.2702 9.79607 28.3972 10.7862 26.5516 10.7862C25.7783 10.7862 25.0752 10.6339 24.3604 10.3234C23.9913 10.1476 23.6984 10.2238 23.5285 10.5929L23.1008 11.4483C22.925 11.7998 22.9836 12.0869 23.3117 12.2802C24.3428 12.8603 25.6025 13.0946 26.8212 13.0946C29.8678 13.0946 31.8071 11.1729 31.8071 8.4954V0.831963C31.8071 0.445276 31.5727 0.21092 31.186 0.21092ZM27.0145 6.86662C25.6728 6.86662 24.7647 5.97607 24.7647 4.59337C24.7647 3.14037 25.7138 2.26739 27.0145 2.26739C28.3562 2.26739 29.2643 3.0642 29.2643 4.55822C29.2643 5.89991 28.3152 6.86662 27.0145 6.86662Z" fill="currentColor"></path>
                        <path d="M20.6516 0.21092H19.5853C19.2162 0.21092 18.9642 0.404264 18.9057 0.773374L18.8471 1.21865C18.2436 0.580031 17.3706 0 15.9176 0C13.4745 0 11.6699 1.92172 11.6699 4.69297C11.6699 7.4115 13.3573 9.42696 15.7653 9.42696C17.2769 9.42696 18.267 8.78834 18.8705 8.12629L18.9701 8.67116C19.0287 9.0227 19.263 9.21604 19.6322 9.21604H20.6633C21.05 9.21604 21.2844 8.98169 21.2844 8.595V0.831963C21.2726 0.445276 21.0383 0.21092 20.6516 0.21092ZM16.4801 7.15957C15.1032 7.15957 14.2303 6.21043 14.2303 4.73399C14.2303 3.23997 15.1442 2.26739 16.4801 2.26739C17.8569 2.26739 18.7299 3.21653 18.7299 4.69297C18.7299 6.19285 17.8159 7.15957 16.4801 7.15957Z" fill="currentColor"></path>
                     </svg>
                  </p>
               </div>
            </div>
            <div data-testid="mod-bestinstallment" class="sc-dbGQSH hCGUTh">
               <section class="sc-fpiLZM qtKIZ">
                  <div class="sc-idOhPF liohtw sc-fashhx bWQBFg">
                     <div>
                        <p role="button" aria-hidden="true" aria-label="abrir métodos de pagamento" class="sc-jJEJSO cxPsYP sc-hRDjdK hsHTer" color="#404040"><strong>Cartão de crédito</strong></p>
                        <p class="sc-jJEJSO cxPsYP sc-hCMElv dfhdtr" color="#404040">sem juros</p>
                     </div>
                     <div>
                        <p class="sc-jJEJSO fiBLz sc-hCMElv dfhdtr" color="#404040">R$ <?php echo $valor_format ?></p>
                        <p font-weight="500" class="sc-jJEJSO fcjSGB sc-hCMElv dfhdtr" color="#404040">
                           12
                           <!-- -->x
                           <!-- -->R$ <?php echo $valor_12x ?>
                        </p>
                     </div>
                  </div>
                  <aside data-testid="sidebar" class="sc-biBrSq hTEfPw">
                     <div direction="right" data-testid="sidebar-payments" width="80%" display="block" height="100vh" class="sc-hBEYos dUKaUL sc-hzMMCg eztuOI">
                        <div class="sc-hBEYos kfuYHs sc-fybufo iTodIt sc-eEfYrc eufHJl">
                           <svg width="24" height="24" data-testid="CloseIcon" color="#bcbcbc" role="button" title="fechar métodos de pagamento" fill="#bcbcbc" viewBox="0 0 24 24" class="sc-dlfnbm hmQSBH">
                              <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                           </svg>
                           <p font-weight="normal" class="sc-jJEJSO ZwBTj sc-epptyN llTJyU" color="#404040">Formas de pagamento</p>
                        </div>
                        <div data-testid="payments-list" class="sc-kGNybE iqergQ" role="tablist">
                           <div>
                              <div data-testid="luizaCard-tab" selected="" class="sc-idOhPF liohtw sc-cipWhh hBfkbl">
                                 <svg width="24" height="24" data-testid="CartaoLuizaIcon" viewBox="0 0 27 18" class="sc-dlfnbm juTdIx">
                                    <g fill="none" fill-rule="evenodd">
                                       <g transform="translate(-1305 -2210)" fill-rule="nonzero">
                                          <g transform="translate(1305 2210)">
                                             <path d="m27 2.8454v12.244c6e-4 0.2343-0.038 0.467-0.114 0.6887-0.1438 0.4291-0.4189 0.8021-0.7864 1.0663s-0.8088 0.4062-1.2614 0.4058h-22.676c-0.28383 0-0.56489-0.055801-0.82714-0.1643-0.26225-0.1086-0.50054-0.2677-0.70128-0.4684-0.20074-0.2006-0.36-0.4389-0.46867-0.7011-0.10867-0.2622-0.1647-0.5432-0.1647-0.827v-12.244c0-0.45254 0.142-0.89366 0.40615-1.2611s0.63704-0.64263 1.066-0.78672c0.2219-0.076284 0.45498-0.11497 0.68963-0.11446h22.676c0.5734 0 1.1232 0.228 1.5286 0.63349 0.4054 0.40549 0.6332 0.9554 0.6332 1.5288z" fill="#C5A662"></path>
                                             <path d="m6.8986 4.6826h-4.3044c-0.21345 0-0.38648 0.17303-0.38648 0.38648v3.7527c0 0.21345 0.17303 0.38648 0.38648 0.38648h4.3044c0.21344 0 0.38648-0.17303 0.38648-0.38648v-3.7527c0-0.21345-0.17304-0.38648-0.38648-0.38648z" fill="url(#linearGradient-1)"></path>
                                             <g transform="translate(2 11)" fill="#E3C48D" opacity=".8">
                                                <path d="m4.3875 2.1165h-3.5138c-0.17692-0.0047-0.34502-0.0783-0.46849-0.2051-0.12348-0.1268-0.19257-0.2968-0.19257-0.4738 0-0.1769 0.06909-0.3469 0.19257-0.4737 0.12347-0.1268 0.29157-0.2004 0.46849-0.2051h3.5142c0.17692 0.0047 0.34502 0.0783 0.46849 0.2051 0.12348 0.1268 0.19257 0.2968 0.19257 0.4737 0 0.177-0.06909 0.347-0.19257 0.4738-0.12347 0.1268-0.29157 0.2004-0.46849 0.2051h-4.8e-4z"></path>
                                             </g>
                                             <g transform="translate(17 5)" fill="#E3C48D" opacity=".8">
                                                <path d="m7.1274 1.4476h-6.438c-0.1769-0.0047-0.345-0.07828-0.4685-0.20508s-0.1926-0.29679-0.1926-0.47377 0.0691-0.34698 0.1926-0.47377c0.1235-0.1268 0.2916-0.20039 0.4685-0.20509h6.438c0.1769 0.0047 0.345 0.07829 0.4685 0.20509 0.1234 0.12679 0.1925 0.29679 0.1925 0.47377s-0.0691 0.34697-0.1925 0.47377c-0.1235 0.1268-0.2916 0.20038-0.4685 0.20508z"></path>
                                             </g>
                                             <g transform="translate(11 7)" fill="#E3C48D" opacity=".8">
                                                <path d="m13.127 1.8006h-11.638c-0.1769-0.0047-0.345-0.07828-0.4685-0.20508s-0.1926-0.29679-0.1926-0.47377c0-0.17699 0.0691-0.34698 0.1926-0.47378 0.1235-0.12679 0.2916-0.20038 0.4685-0.20508h11.638c0.1769 0.0047 0.345 0.07829 0.4685 0.20508 0.1235 0.1268 0.1926 0.29679 0.1926 0.47378 0 0.17698-0.0691 0.34697-0.1926 0.47377s-0.2916 0.20038-0.4685 0.20508z"></path>
                                             </g>
                                             <g transform="translate(8 11)" fill="#E3C48D" opacity=".8">
                                                <path d="m4.3008 2.1165h-3.5142c-0.17692-0.0047-0.34502-0.0783-0.46849-0.2051-0.12348-0.1268-0.19257-0.2968-0.19257-0.4738 0-0.1769 0.06909-0.3469 0.19257-0.4737 0.12347-0.1268 0.29157-0.2004 0.46849-0.2051h3.5142c0.1769 0.0047 0.345 0.0783 0.4685 0.2051s0.1926 0.2968 0.1926 0.4737c0 0.177-0.0691 0.347-0.1926 0.4738s-0.2916 0.2004-0.4685 0.2051z"></path>
                                             </g>
                                             <g transform="translate(14 11)" fill="#E3C48D" opacity=".8">
                                                <path d="m4.2139 2.1165h-3.5143c-0.1769-0.0047-0.345-0.0783-0.4685-0.2051-0.1234-0.1268-0.1925-0.2968-0.1925-0.4738 0-0.1769 0.0691-0.3469 0.1925-0.4737 0.1235-0.1268 0.2916-0.2004 0.4685-0.2051h3.5143c0.1769 0.0047 0.345 0.0783 0.4685 0.2051 0.1234 0.1268 0.1925 0.2968 0.1925 0.4737 0 0.177-0.0691 0.347-0.1925 0.4738-0.1235 0.1268-0.2916 0.2004-0.4685 0.2051z"></path>
                                             </g>
                                             <g transform="translate(19 11)" fill="#E3C48D" opacity=".8">
                                                <path d="m5.1274 2.1165h-3.5147c-0.1769-0.0047-0.345-0.0783-0.4685-0.2051-0.1234-0.1268-0.1925-0.2968-0.1925-0.4738 0-0.1769 0.0691-0.3469 0.1925-0.4737 0.1235-0.1268 0.2916-0.2004 0.4685-0.2051h3.5147c0.177 0.0047 0.3451 0.0783 0.4685 0.2051 0.1235 0.1268 0.1926 0.2968 0.1926 0.4737 0 0.177-0.0691 0.347-0.1926 0.4738-0.1234 0.1268-0.2915 0.2004-0.4685 0.2051z"></path>
                                             </g>
                                             <g transform="translate(2 4)" fill="#E01600" opacity=".5">
                                                <path d="m4.4106 1.9474h0.87449v-0.13601h-0.87449c-0.07448 2.5e-4 -0.14581 0.03005-0.19834 0.08284-0.05252 0.0528-0.08195 0.12428-0.08183 0.19876v0.78445h-0.53973v-0.49088c-1.2e-4 -0.07515-0.03004-0.14719-0.08318-0.20034-0.05314-0.05314-0.12518-0.08305-0.20033-0.08318h-0.4928v-1.4204h-0.13553v1.4204h-0.47891c-0.07516 1.3e-4 -0.1472 0.03004-0.20034 0.08318-0.05314 0.05315-0.08305 0.12519-0.08318 0.20034v0.49088h-0.55362v-0.78445c0-0.07444-0.02947-0.14585-0.08197-0.19862s-0.12375-0.0826-0.19819-0.08298h-0.87497v0.13601h0.87497c0.0381 0 0.07465 0.01514 0.10159 0.04208 0.02695 0.02694 0.04208 0.06349 0.04208 0.10159v1.7049c0 0.03811-0.01513 0.07465-0.04208 0.1016-0.02694 0.02694-0.06349 0.04208-0.10159 0.04208h-0.87497v0.13601h0.87497c0.07444-3.8e-4 0.14569-0.03022 0.19819-0.08299s0.08197-0.12418 0.08197-0.19861v-0.78063h0.55266v0.49089c1.3e-4 0.07515 0.03004 0.14719 0.08318 0.20033 0.05315 0.05314 0.12519 0.08306 0.20034 0.08318h0.47891v1.4204h0.13553v-1.4204h0.4928c0.07515-1.2e-4 0.14719-0.03004 0.20034-0.08318 0.05314-0.05314 0.08305-0.12518 0.08317-0.20033v-0.49089h0.54021v0.78446c-1.2e-4 0.07447 0.02931 0.14596 0.08184 0.19875 0.05252 0.0528 0.12385 0.08259 0.19833 0.08285h0.87449v-0.13601h-0.87401c-0.03811 0-0.07465-0.01514-0.1016-0.04208-0.02694-0.02695-0.04208-0.06349-0.04208-0.1016v-1.7049c-5.1e-4 -0.01918 0.00283-0.03828 0.00982-0.05615 0.00699-0.01788 0.01749-0.03418 0.03088-0.04792 0.0134-0.01375 0.02941-0.02468 0.04709-0.03214 0.01769-0.00746 0.03669-0.0113 0.05589-0.01129zm-0.95782 1.5569c0 0.03916-0.01553 0.07673-0.04318 0.10447s-0.06516 0.04338-0.10433 0.04351h-1.1063c-0.03921-1.3e-4 -0.07678-0.01576-0.1045-0.04348-0.02773-0.02773-0.04336-0.06529-0.04348-0.1045v-1.1178c1.2e-4 -0.03921 0.01575-0.07677 0.04348-0.1045 0.02772-0.02772 0.06529-0.04336 0.1045-0.04348h1.1082c0.03916 1.2e-4 0.07668 0.01577 0.10433 0.04351s0.04317 0.06531 0.04317 0.10447l-0.00191 1.1178z"></path>
                                             </g>
                                          </g>
                                       </g>
                                    </g>
                                 </svg>
                              </div>
                           </div>
                           <div>
                              <div data-testid="creditCard-tab" class="sc-idOhPF liohtw sc-cipWhh kaoHGK">
                                 <svg width="24" height="24" data-testid="CreditCardIcon" viewBox="0 0 29 19" class="sc-dlfnbm juTdIx">
                                    <g stroke="none" fill="none">
                                       <g transform="translate(-1370.000000, -2210.000000)">
                                          <g transform="translate(1370.000000, 2210.000000)">
                                             <path d="M27.2295747,1.32937182 L27.6706282,17.2295879 L1.7704253,17.6706282 L1.32937182,1.77041205 L27.2295747,1.32937182 Z" stroke="#B9B9B9" stroke-width="2.65874363"></path>
                                             <polygon fill="#B9B9B9" transform="translate(14.000000, 7.500000) rotate(-270.000000) translate(-14.000000, -7.500000) " points="12 21 16 21 16 -6 12 -6"></polygon>
                                          </g>
                                       </g>
                                    </g>
                                 </svg>
                              </div>
                           </div>
                           <div>
                              <div data-testid="bankSlip-tab" class="sc-idOhPF liohtw sc-cipWhh kaoHGK">
                                 <svg width="24" height="24" data-testid="BoletoIcon" viewBox="0 0 32 23" class="sc-dlfnbm juTdIx">
                                    <g transform="translate(-1432.000000, -2207.000000)" fill="#B9B9B9">
                                       <g transform="translate(1432.000000, 2207.000000)">
                                          <path d="M2.90909091,0 L29.0909091,0 C30.7054545,0 32,1.279375 32,2.875 L32,20.125 C32,21.720625 30.7054545,23 29.0909091,23 L2.90909091,23 C1.29454545,23 0,21.720625 0,20.125 L0.0145454545,2.875 C0.0145454545,1.279375 1.29454545,0 2.90909091,0 Z M2.90909091,20.125 L29.0909091,20.125 L29.0909091,12.9375 L29.0909091,11.5 L29.0909091,5.75 L29.0909091,2.875 L2.90909091,2.875 L2.90909091,5.75 L2.90909091,11.5 L2.90909091,12.9375 L2.90909091,20.125 Z" id="Shape"></path>
                                          <rect id="Rectangle" x="6" y="3" width="3" height="17"></rect>
                                          <rect x="12" y="3" width="3" height="17"></rect>
                                          <rect x="17" y="3" width="3" height="17"></rect>
                                          <rect x="23" y="3" width="3" height="17"></rect>
                                       </g>
                                    </g>
                                 </svg>
                              </div>
                           </div>
                        </div>


                     </div>
                     <div aria-hidden="true" data-testid="overlay" opacity="0" class="sc-hBEYos fjCpOI sc-kYrkKh dDRYun"></div>
                  </aside>
               </section>
            </div>





            <div data-testid="shipping" class="sc-hBEYos gZwvZD">
              
			  <div data-toggle="modal" data-target=".bd-example-modal-sm" id="calc_frete" data-testid="shipping-button" class="sc-idOhPF blYPjs sc-cfZGEC fWHyiy">
                  <svg width="24" height="24" data-testid="PinIcon" fill="primary.base" class="sc-dlfnbm fDNOUL sc-jhLFZp bYqHeE" color="primary.base" viewBox="0 0 24 24">
                     <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                  </svg>
                  <span class="sc-emTkGv dYycOC" >Calcular frete e prazo</span>
               </div>
			   
			   <div data-toggle="modal" data-target=".bd-example-modal-sm" style="display: none" id="cep_detal"  data-testid="shipping-button" class="sc-idOhPF blYPjs sc-cfZGEC fWHyiy">
                  <svg width="24" height="24" data-testid="PinIcon" fill="primary.base" class="sc-dlfnbm fDNOUL sc-jhLFZp bYqHeE" color="primary.base" viewBox="0 0 24 24">
                     <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                  </svg>
                  <span id="info_cep"  class="sc-emTkGv dYycOC" ></span>
               </div>
			   
			   

				<div style="display: none" id="free_frete">
			     <div  data-testid="shipping-button" class="sc-idOhPF blYPjs sc-cfZGEC fWHyiy" style="background-color:white; border-top: 2px solid #f4f4f4">
                  <svg width="24" height="24" data-testid="FastDeliveryIcon" viewBox="0 0 24 11" fill="background.dark" class="consul-cep sc-dkPtRN dvRUrs sc-dMOJrz dLlczy" color="background.dark">
                     <g fill-rule="evenodd">
                        <path d="M6.333 8H.667C.3 8 0 7.775 0 7.5S.3 7 .667 7h5.666C6.7 7 7 7.225 7 7.5s-.3.5-.667.5zM6.25 6h-4.5C1.337 6 1 5.775 1 5.5s.337-.5.75-.5h4.5c.413 0 .75.225.75.5s-.337.5-.75.5zM5.333 4H3.667C3.3 4 3 3.775 3 3.5s.3-.5.667-.5h1.666C5.7 3 6 3.225 6 3.5s-.3.5-.667.5z"></path>
                        <g transform="translate(9)">
                           <path d="M11.411 9.705c-.394 0-.715-.29-.715-.646 0-.358.32-.647.715-.647.394 0 .715.289.715.646 0 .357-.32.647-.715.647zM9.295 3.56h1.917l.92 1.941H9.294V3.56zM4.082 9.705c-.395 0-.715-.29-.715-.646 0-.358.32-.647.715-.647.394 0 .715.289.715.646 0 .357-.321.647-.715.647zm8.444-6.656c-.225-.476-.742-.784-1.314-.784H9.295v-.971C9.295.58 8.655 0 7.865 0H1.43C.64 0 0 .58 0 1.294v6.47C0 8.48.64 9.06 1.43 9.06h.507c0 1.072.96 1.941 2.145 1.941 1.184 0 2.145-.869 2.145-1.941h3.039c0 1.072.96 1.941 2.145 1.941s2.145-.869 2.145-1.941h.029c.395 0 .715-.29.715-.647V6.794l-1.774-3.745z"></path>
                        </g>
                     </g>
                  </svg>
                  <div class="consul-texto">
                     <p>Receba em até 3 dias úteis</p>
                  </div>
                  <p class="f-gratis"><font color="green"><small>Frete Grátis</small></font></p>

               </div>
			   </div>
			   
			   
			   
               <div class="sc-hBEYos kfuYHs"></div>
            </div>
			
			
			
			
               <div id="modal_cep"  style="display: none;" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                        <p class="local"><small><font id="cep_msg" color="red"></font></small></p>
                        <form class="sc-cqtowF juAUbh"><label data-testid="zipcode-label" for="zipcode" class="cep">CEP</label><br>
						<input type="tel"  id="cep_val" maxlength="9" placeholder="Digite seu cep" class="inp" name="cep"><br>
						<br>
						<center>
						<a onClick="cep_verify()" onclick="return false" href="#">Buscar</a>
						</center>
						</form>
                     </div>
                  </div>
               </div>
			   
			
			
            <div class="sc-hBEYos brbGDt">
			
			<a  href="login.php" color="secondary" data-testid="buy-button" class="sc-iBPRYJ jkFMTt sc-zmtOJ sjCkG"><span class="sc-eCssSg hmocIu"></span><label class="sc-jSgupP bGikiP">Comprar Agora</label><span class="sc-gKsewC gnwqMi"></span></a>
			
			
			</div>

			
            <div onClick="show_mod('detalhes')" data-testid="collapsible" class="sc-hBEYos kfuYHs sc-fodVxV dFHCWV">
               <h2 class="sc-fFubgz cyOhyw">Informações do Produto</h2>
               <svg width="24" height="24" data-testid="collapsible-icon-right" color="text.light" fill="text.light" viewBox="0 0 24 24" class="sc-dlfnbm iszBUv">
                  <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
               </svg>
            </div>
            <div open="" data-testid="collapsible-content" class="sc-hBEYos hiGdSg sc-bkzZxe jcXjYS"><?php echo  strip_tags ($desc_a) ?></div>







            <aside id="detalhes" style="display: none; " data-testid="sidebar">
               <div data-testid="content" width="80%" height="100vh" class="sc-hBEYos dUKaUL sc-hzMMCg gAkaSs">

                  <div class="sc-cBYayr eVPJDi">
                     <svg onclick="off_modal('detalhes')" width="24" height="24" data-testid="arrow-back" color="text.light" role="button" title="Fechar detalhes" fill="text.light" viewBox="0 0 24 24" class="sc-dlfnbm iszBUv">
                        <g fill-rule="evenodd">
                           <path fill="none" d="M0 0L24 0 24 24 0 24z"></path>
                           <path fill-rule="nonzero" d="M20 11L7.83 11 13.42 5.41 12 4 4 12 12 20 13.41 18.59 7.83 13 20 13z"></path>
                        </g>
                     </svg>
                     <div class="sc-kpXpMQ gJZzxf">
                        <p data-testid="detail-title" class="sc-jJEJSO cxPsYP sc-czgevV EebLr" color="#404040">Detalhes do Produto</p>
                     </div>
                  </div>
                  <div class="sc-cxRJHX epOncL">
                     <p class="sc-hKgILt iEbovZ sc-dBqzDF bbKTTA" color="#404040"><?php echo $nome ?></p>
                     <p class="sc-hKgILt iEbovZ sc-htObEk kOuQNc" color="#404040"><?php echo html_entity_decode ($desc) ?></p>
                  </div>


               </div>

               <div id="overlay" onclick="off_modal('detalhes')"></div>
            </aside>




            <div style="display: none" onClick="show_mod('ficha')" data-testid="collapsible" class="sc-hBEYos kfuYHs sc-fodVxV dFHCWV">
               <h2 class="sc-fFubgz cyOhyw">Ficha Técnica</h2>
               <svg width="24" height="24" data-testid="collapsible-icon-right" color="text.light" fill="text.light" viewBox="0 0 24 24" class="sc-dlfnbm iszBUv">
                  <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
               </svg>
            </div>

            <div data-testid="collapsible-content" class="sc-hBEYos hiGdSg sc-bkzZxe jNBNdP"></div>



            <aside id="ficha" style="display: none; " data-testid="sidebar">

               <div data-testid="content" width="80%" height="100vh" class="sc-hBEYos dUKaUL sc-hzMMCg gAkaSs">


                  <div class="sc-cBYayr eVPJDi">
                     <svg onclick="off_modal('ficha')" width="24" height="24" data-testid="arrow-back" color="text.light" role="button" title="Fechar detalhes" fill="text.light" viewBox="0 0 24 24" class="sc-dlfnbm iszBUv">
                        <g fill-rule="evenodd">
                           <path fill="none" d="M0 0L24 0 24 24 0 24z"></path>
                           <path fill-rule="nonzero" d="M20 11L7.83 11 13.42 5.41 12 4 4 12 12 20 13.41 18.59 7.83 13 20 13z"></path>
                        </g>
                     </svg>
                     <div class="sc-kpXpMQ gJZzxf">
                        <p data-testid="detail-title" class="sc-jJEJSO cxPsYP sc-czgevV EebLr" color="#404040">Ficha Técnica</p>
                     </div>
                  </div>



                  <div class="sc-jWiyIi cfMSyF">
                     <table name="Ficha Técnica" class="sc-cSaEtG gFBPBs">
                        <tbody>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Informações técnicas</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Marca</td>
                                          <td><a data-testid="link" onclick="return false" href="/marcas/tramontina/" font-size="0" class="sc-kiYtDG gfAQaN sc-hmfusV kjvAVr sc-hmfusV kjvAVr" color="text.base">Tramontina</a></td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Referência</td>
                                          <td>20298/719.</td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Modelo</td>
                                          <td>20298/719</td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Linha</td>
                                          <td>Turim</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Tipo da panela</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Conjunto de panelas</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Material</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Alumínio</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Cor</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Vermelho</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Capacidade</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>- Caçarola 2,8L
                                             - Frigideira 0,8L
                                             - Panela de pressão 4,5L
                                             - Panela 1,4L
                                             - Panela 2L
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Diâmetro</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>- Caçarola 20cm
                                             - Frigideira 20cm
                                             - Panela de pressão 20cm
                                             - Panela 16cm
                                             - Panela 18cm
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Quantidade de peças</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>- 08 Peças</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Revestimento</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Interno</td>
                                          <td>Antiaderente Starflon T1.</td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Externo</td>
                                          <td>Antiaderente Starflon T1.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Tampa</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Material</td>
                                          <td>Vidro temperado com borda de aço inox.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Alça/cabo</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Material</td>
                                          <td>Baquelite antitérmico.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Material dos utensílios:</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Nylon.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Uso</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Fogão a gás</td>
                                       </tr>
                                       <tr>
                                          <td>Fogão vitrocerâmico</td>
                                       </tr>
                                       <tr>
                                          <td>Fogão elétrico</td>
                                       </tr>
                                       <tr>
                                          <td>Pode ser levado à lava-louças</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Diferenciais</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Revestimento interno</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Material do pegador</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>Nylon.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">INMETRO</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td>73302/15 F2.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Peso aproximado</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Peso do produto</td>
                                          <td>3,423 kg.</td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Peso do produto com embalagem</td>
                                          <td>4,660 kg.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Dimensões do produto com embalagem</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Largura</td>
                                          <td>33,5 cm.</td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Altura</td>
                                          <td>24 cm.</td>
                                       </tr>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Profundidade</td>
                                          <td>50,5 cm.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="sc-lhuSvW kWHBpm">Garantia</td>
                              <td>
                                 <table class="sc-leCWtA WaKgU">
                                    <tbody>
                                       <tr>
                                          <td class="sc-hoXqvr kTgJcS">Prazo de garantia</td>
                                          <td>03 meses de garantia legal.</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>




               </div>

               <div id="overlay" onclick="off_modal('ficha')"></div>
            </aside>













            <div onClick="show_mod('comentarios')" data-testid="collapsible" class="sc-hBEYos kfuYHs sc-fodVxV dFHCWV">
               <h2 class="sc-fFubgz cyOhyw">Avaliações de clientes</h2>
               <svg width="24" height="24" data-testid="collapsible-icon-right" color="text.light" fill="text.light" viewBox="0 0 24 24" class="sc-dlfnbm iszBUv">
                  <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
               </svg>
            </div>









            <!-- comentarios ESCONDIDO -->

            <aside id="comentarios" style="display: none;" data-testid="sidebar" class="sc-biBrSq kXfhbA">
               <div data-testid="content" width="80%" height="100vh" class="sc-hBEYos dUKaUL sc-hzMMCg gAkaSs">
                  <div class="sc-cBYayr eVPJDi">
                     <svg onclick="off_modal('comentarios')" width="24" height="24" data-testid="arrow-back" color="text.light" role="button" title="Fechar detalhes" fill="text.light" viewBox="0 0 24 24" class="sc-dlfnbm iszBUv">
                        <g fill-rule="evenodd">
                           <path fill="none" d="M0 0L24 0 24 24 0 24z"></path>
                           <path fill-rule="nonzero" d="M20 11L7.83 11 13.42 5.41 12 4 4 12 12 20 13.41 18.59 7.83 13 20 13z"></path>
                        </g>
                     </svg>
                     <div class="sc-kpXpMQ gJZzxf">
                        <p data-testid="detail-title" class="sc-jJEJSO cxPsYP sc-czgevV EebLr" color="#404040">Avaliações de clientes</p>
                     </div>
                  </div>
                  <div class="sc-hBEYos fQUuGz sc-bTRMAZ kGehDO">
                     <img src="<?php echo $img[0] ?>" alt="" title="" data-testid="image" class="sc-dQppl SpyTd sc-fTNIDv yGvBF">
                     <p class="sc-jJEJSO cxPsYP sc-hRxedE jbFeQs" color="#404040"><?php echo $nome ?></p>
                  </div>
                  <div class="sc-hBEYos kfuYHs sc-fMvtBK btNwzM"></div>
                  <div class="sc-EchRo bFrBZd">
                     <div class="sc-hZOyjC eFSFPF">
                        <div class="sc-dCuYax deayFW">
                           <p data-testid="stat-score" class="sc-hKgILt iEbovZ sc-eYErCu hoFnVL" color="#404040"><?php echo $rating ?></p>
                           <div class="sc-LwQvY jcqefh">

                              <div data-testid="review" class="sc-kTaSZA eRNvLK">
                                 &nbsp;
				 <ul class="star-rating">
				 
                                           <li><i class="fa fa-star<?php if ($rating < 0.5) { echo '-o'; } else if ($rating == 0.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 1.5) { echo '-o'; } else if ($rating == 1.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 2.5) { echo '-o'; } else if ($rating == 2.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 3.5) { echo '-o'; } else if ($rating == 3.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($rating < 4.5) { echo '-o'; } else if ($rating == 4.5) { echo '-half-empty'; } ?>"></i></li>
				  
                  </ul>


                              </div>
                              <p data-testid="stat-desc" class="sc-hKgILt iEbovZ sc-hiola-d ckcwxT" color="#404040"><?php echo $rand_aval ?> avaliações</p>
                           </div>
                        </div>
                       
					<?php if ($rating > 0 & $rating <= 3) { ?>
					   <ul>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Qualidade geral</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="3.051020408163265" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">3.0</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Custo-benefício</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="3.541737649063032" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">3.5</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Design</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="2.671957671957672" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">2.5</p>
                           </li>
                        
						</ul>
					<?php } else if ($rating > 3 & $rating <= 4) {?>
					
						 <ul>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Qualidade geral</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="4.151020408163265" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">4.1</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Custo-benefício</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="4.041737649063032" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">4.0</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Design</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="3.571957671957672" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">3.8</p>
                           </li>
                        
						</ul>
					
					<?php } else if ($rating > 4 & $rating <= 4.5) { ?>
					
						 <ul>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Qualidade geral</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="4.651020408163265" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">4.6</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Custo-benefício</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="4.541737649063032" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">4.5</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Design</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="4.871957671957672" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">4.8</p>
                           </li>
                        
						</ul>
					
					
					<?php } else { ?>
					
					
						 <ul>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Qualidade geral</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="5" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">5.0</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Custo-benefício</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="5" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">5.0</p>
                           </li>
                           <li class="sc-hPCzgT cvCoTi">
                              <p color="#404040" class="sc-hKgILt iEbovZ">Design</p>
                              <div color="#0086ff" width="100%" height="8px" data-testid="linear-progress" class="sc-JAcuL jIeuIr"><progress value="5" max="5"></progress></div>
                              <p color="#404040" class="sc-hKgILt iEbovZ">5.0</p>
                           </li>
                        
						</ul>
					
					<?php } ?>
                     
					 </div>
                     <div class="sc-hBEYos jDXiNI sc-fMvtBK btNwzM"></div>
 
                     <ul id="table_comment" class="sc-fxEOJv iDnVvY">
                        
						<?php while ($consultaQB = $conQB->fetch_array()) { ?>
						
						<div data-testid="review-card" class="sc-jbiwVq dqCLEx">
                           <div data-testid="review" class="sc-kTaSZA eRNvLK">
					&nbsp;
				 <ul class="star-rating">
				 
                                            <li><i class="fa fa-star<?php if ($consultaQB ['nota'] < 0.5) { echo '-o'; } else if ($consultaQB ['nota'] == 0.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQB ['nota'] < 1.5) { echo '-o'; } else if ($consultaQB ['nota'] == 1.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQB ['nota'] < 2.5) { echo '-o'; } else if ($consultaQB ['nota'] == 2.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQB ['nota'] < 3.5) { echo '-o'; } else if ($consultaQB ['nota'] == 3.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQB ['nota'] < 4.5) { echo '-o'; } else if ($consultaQB ['nota'] == 4.5) { echo '-half-empty'; } ?>"></i></li>
				  
                 </ul>


                           </div><br>
                           <p class="sc-hKgILt iEbovZ sc-dnWOup kkRxEf" color="#404040"><strong><?php echo $consultaQB ['nome'] ?></strong> - <span><?php echo rand_day () ?></span></p>
                           <p class="sc-hKgILt iEbovZ sc-jlCfWU jqDoMz" color="#404040"><?php echo $consultaQB ['descricao'] ?></p>
                          
						  <?php if ($consultaQB ['recomenda']  == 'y') { ?>
						  <p class="sc-hKgILt iEbovZ sc-ccjgGX dYnIYg" color="#404040">Sim, eu recomendo esse produto</p>
						  <?php } else { ?>
						  <p class="sc-hKgILt iEbovZ sc-ccjgGX ikFmsf" color="#404040">Não, eu não recomendo esse produto</p>
						  <?php } ?>
						  
                        </div>
						
						<?php } ?>






                     </ul>
					 
                    
					<input type="hidden" value="0" id="pag_atual"> 
					
					<button id="btn_more" onClick="more_comment('<?php echo $comentario_categoria ?>', '<?php echo $modo ?>')" data-testid="review-more" class="sc-eznDEQ cfriWW">Carregar Mais</button>
					 
                 
				 </div>
               </div>
               <div id="overlay" onclick="off_modal('comentarios')"></div>
            </aside>


			<?php if ($row_qnt_sub > 1 ) { ?>
				
				<br>
				<center><b>Você também pode gostar de:</b></center>
				<br>
				
            <div class="sc-fZKJon drxYPY">
               <div data-testid="media-gallery" class="sc-hBEYos gzppyj sc-jExWIn IIEXN">
                  <div id="slides" data-testid="carousel" class="sc-hBEYos kfuYHs sc-cVkrFx hzPuOC">

                     <div class="custom1 owl-carousel owl-theme">

					<?php while ($consultaQF = $conQF->fetch_array()) { ?>
					
						<?php if ($consultaQF ['id'] != $id ) {?> 
						
						<?php
						
						$Qvalor_format = number_format($consultaQF ['valor'],2,",",".");
						$Qvalor_12x = number_format($consultaQF ['valor'] / 12 ,2,",",".");
						
						
						?>
						
						
					
                        <div class="item">

                           <img src="<?php echo $consultaQF ['img_1'] ?>">

                           <div class="container produtos">
                             <p><b> <a  href="../?category=<?php echo $consultaQF ['id'] ?>&refer=<?php echo rand (0000000,9999999) ?>"><font color="black"><?php echo $consultaQF ['nome'] ?></font></a></b></p>
                              <div class="sc-jSYIrd heberV estrelinha">
                                <ul class="star-rating">
								 
	                                        <li><i class="fa fa-star<?php if ($consultaQF ['rating'] < 0.5) { echo '-o'; } else if ($consultaQF ['rating'] == 0.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQF ['rating'] < 1.5) { echo '-o'; } else if ($consultaQF ['rating'] == 1.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQF ['rating'] < 2.5) { echo '-o'; } else if ($consultaQF ['rating'] == 2.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQF ['rating'] < 3.5) { echo '-o'; } else if ($consultaQF ['rating'] == 3.5) { echo '-half-empty'; } ?>"></i></li>
                                            <li><i class="fa fa-star<?php if ($consultaQF ['rating'] < 4.5) { echo '-o'; } else if ($consultaQF ['rating'] == 4.5) { echo '-half-empty'; } ?>"></i></li>
	
								</ul>
                              </div>
                              <div class="descricao">
                                 <p class="sc-hKwDye dWfgMa sc-gsFzgR gnQUPC" color="#404040">R$&nbsp;<?php echo $Qvalor_format ?> <span style="font-size: 14px;">à vista</span></p>
                                 <span class="sc-hKwDye btOovJ sc-iidyiZ jHbaRr" color="#404040">ou 12x de R$&nbsp;<?php echo $Qvalor_12x ?> sem juros</span>
                              </div>

                           </div>
                        </div>
						<?php } ?>
					<?php } ?>

                     </div>
                  </div>
               </div>
            </div>
				
			<?php } ?>





            <div data-testid="lazyload-container" class="sc-hBEYos kfuYHs"></div>
            <div data-testid="lazyload-container" class="sc-hBEYos kfuYHs"></div>


<br><br>


            <footer class="sc-kSGQht fzaaQx">
               <hr data-testid="strip" size="5" class="sc-hJJQhR loLYfb" />
               <p data-testid="rules-line" color="text.white" class="sc-jJEJSO gFRbSc sc-fAQylc dnJiqa">Preços e condições de pagamento exclusivos para compras via internet, podendo variar nas lojas físicas. Ofertas válidas na compra de até 5 peças de cada produto por cliente, até o término dos nossos estoques para internet. Caso os produtos apresentem divergências de valores, o preço válido é o da Sacola de compras. Vendas sujeitas a análise e confirmação de dados.</p>
               <a data-testid="policy-line" target="_blank" onclick="return false" href="//especiais.magazineluiza.com.br/politica-de-privacidade/" rel="noopener" color="text.white" class="sc-kJjJVy bHbMnQ">Política de privacidade</a>
               <address class="sc-kutfdj fjDYdq">
                  <p data-testid="address-line" color="text.white" class="sc-jJEJSO gFRbSc sc-jwbTYE dguLHZ">Magazine Luiza S/A - CNPJ: 47.960.950/1088-36</p>
                  <p data-testid="address-line" color="text.white" class="sc-jJEJSO gFRbSc sc-jwbTYE dguLHZ">Rua Arnulfo de Lima, 2385 - Vila Santa Cruz</p>
                  <p data-testid="address-line" color="text.white" class="sc-jJEJSO gFRbSc sc-jwbTYE dguLHZ">CEP: 14.403-471 - Franca/SP</p>
                  <p data-testid="address-line" color="text.white" class="sc-jJEJSO gFRbSc sc-jwbTYE dguLHZ">Endereço eletrônico: www.magazineluiza.com.br</p>
                  <p data-testid="address-line" color="text.white" class="sc-jJEJSO gFRbSc sc-jwbTYE dguLHZ">www.magazineluiza.com.br/formulariocontato</p>
                  <p data-testid="address-line" color="text.white" class="sc-jJEJSO gFRbSc sc-jwbTYE dguLHZ">® Magazine Luiza – Todos os direitos reservados</p>
               </address>
            </footer>
         </main>
      </div>
   </div>
   
   
   
     <script src="../assets/js/meu.js"></script>

   
   
   
</body>

</html>


<?php } else { http_response_code(401); echo '{"status": "Unauthorized"}'; } ?>