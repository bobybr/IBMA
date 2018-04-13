<? 
	include ('../includes/BancoDeDados.php'); 
	include ('../includes/Funcoes.php'); 
	include ('../includes/Config.php'); 
	include ('../includes/Imagens.php'); 
	include ('../includes/Validacoes.php');
	
	$datavisita=date("d/m/Y");
	if ($consultavisita = db_dados( "SELECT * FROM visitantes WHERE data=".$datavisita."")) db_consulta('UPDATE visitantes SET contador=contador+1 WHERE data='.$datavisita." LIMIT 1");
	else { db_consulta("INSERT INTO visitantes (contador, data) VALUES (1, ".$datavisita.")"); }

?>
<?
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html dir="ltr" xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml"> 
<head> 


<title><?=utf8_decode($dadosconfig['nomesite']);?></title>
<meta content="<?=utf8_decode($dadosconfig['nomesite']);?>, <?=utf8_decode($dadosconfig['slogansite']);?>, igreja, gospel, louvor, noticias, jesus, deus " name="keywords" />
<style><? include ("../css/css".$dadosconfig['corsite'].".css"); ?></style>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<link type="text/css" rel="stylesheet" href="cssmenu.css" />


<!-- GAMBIARRA PARA INTERNET EXPLORER -->
<!--[if IE]>
<style type="text/css">
body {behavior:url(csshover.htc);}
</style>
<![endif]-->

<!-- DESTAQUE PRINCIPAL-->
<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
<script src="<?=utf8_decode($dadosconfig['url']);?>/site/Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
// Início do código de Aumentar/ Diminuir a letra
 
// Para usar coloque o comando: "javascript:mudaTamanho('tag_ou_id_alvo', -1);" para diminuir
// e o comando "javascript:mudaTamanho('tag_ou_id_alvo', +1);" para aumentar
 
var tagAlvo = new Array('p'); //pega todas as tags p//
 
// Especificando os possíveis tamanhos de fontes, poderia ser: x-small, small...
var tamanhos = new Array( '9px','10px','11px','12px','13px','14px','15px' );
var tamanhoInicial = 2;
 
function mudaTamanho( idAlvo,acao ){
  if (!document.getElementById) return
  var selecionados = null,tamanho = tamanhoInicial,i,j,tagsAlvo;
  tamanho += acao;
  if ( tamanho < 0 ) tamanho = 0;
  if ( tamanho > 6 ) tamanho = 6;
  tamanhoInicial = tamanho;
  if ( !( selecionados = document.getElementById( idAlvo ) ) ) selecionados = document.getElementsByTagName( idAlvo )[ 0 ];
  
  selecionados.style.fontSize = tamanhos[ tamanho ];
  
  for ( i = 0; i < tagAlvo.length; i++ ){
    tagsAlvo = selecionados.getElementsByTagName( tagAlvo[ i ] );
    for ( j = 0; j < tagsAlvo.length; j++ ) tagsAlvo[ j ].style.fontSize = tamanhos[ tamanho ];
  }
}
// Fim do código de Aumentar/ Diminuir a letra
 
</script>

<!-- <script type="text/javascript" src="<?=utf8_decode($dadosconfig['url']);?>/js/iconestop/jquery.bubbleup.js"></script>
<script type="text/javascript">
$(function(){

    $("div#demo ul#menu li img").bubbleup({tooltip: true, scale:96});
    
});
</script> -->


 
<script type="text/javascript" src="<?=utf8_decode($dadosconfig['url']);?>/site/menu/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	

	function megaHoverOver(){
		$(this).find(".sub").stop().fadeTo('fast', 1).show();
			
		//Calculate width of all ul's
		(function($) { 
			jQuery.fn.calcSubWidth = function() {
				rowWidth = 0;
				//Calculate row
				$(this).find("ul").each(function() {					
					rowWidth += $(this).width(); 
				});	
			};
		})(jQuery); 
		
		if ( $(this).find(".row").length > 0 ) { //If row exists...
			var biggestRow = 0;	
			//Calculate each row
			$(this).find(".row").each(function() {							   
				$(this).calcSubWidth();
				//Find biggest row
				if(rowWidth > biggestRow) {
					biggestRow = rowWidth;
				}
			});
			//Set width
			$(this).find(".sub").css({'width' :biggestRow});
			$(this).find(".row:last").css({'margin':'0'});
			
		} else { //If row does not exist...
			
			$(this).calcSubWidth();
			//Set Width
			$(this).find(".sub").css({'width' : rowWidth});
			
		}
	}
	
	function megaHoverOut(){ 
	  $(this).find(".sub").stop().fadeTo('fast', 0, function() {
		  $(this).hide(); 
	  });
	}


	var config = {    
		 sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)    
		 interval: 100, // number = milliseconds for onMouseOver polling interval    
		 over: megaHoverOver, // function = onMouseOver callback (REQUIRED)    
		 timeout: 500, // number = milliseconds delay before onMouseOut    
		 out: megaHoverOut // function = onMouseOut callback (REQUIRED)    
	};

	$("ul#topnav li .sub").css({'opacity':'0'});
	$("ul#topnav li").hoverIntent(config);



});



</script>


</head>
<center>
<body>
<? echo $datahoje; ?>
<div id='anuncio'><a href='<?=utf8_decode($dadosconfig['telefone3']);?>'target="_blank">
<img src="<?=utf8_decode($dadosconfig['url']);?>/img/bannertop.png" alt="Publicidade" width="720px" height="90px"/>
</div>
<div id='topo'>
  
  <div id='logo'><a href="<?=utf8_decode($dadosconfig['url']);?>">
<img src='<?=utf8_decode($dadosconfig['url']);?>/arquivos/configuracoes/<?=utf8_decode($dadosconfig['imagem']);?>'>
</a></div>

</div>

<div class='limpar'></div>

<!-- menu do topo -->
<div id='menutopbg'>
<div id='menutop'>

<div id='menutop1'>
<ul id="topnav">
    	<li>
        	<a href="<?=utf8_decode($dadosconfig['url']);?>" class="home">Home</a>
        </li>
        <li>
        	<a href="#" class="igreja">Igreja</a>
            <div class="sub">
            	<ul>
                	<li><h2><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos">Departamentos</a></h2></li>
					
<?
$i=0;
$SQL = "SELECT * FROM tbdepartamentos_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
                </ul>
                <ul>
                	<li><h2><a href="#">Institucional</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbconteudo ORDER BY titulo DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/institucional/<?=$linha['id_conteudo'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><?=utf8_decode($linha['titulo']);?></a></li>
<?
}
?>
 
                </ul>
                 
                <ul>
                	<li><h2><a href="#">O portal</a></h2></li>
				 
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/agenda">Agenda</a></li>
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/lideranca">Liderança</a></li>
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/pedidosdeoracao">Pedidos de Oração</a></li>
			 
                </ul>
                
            </div>
        </li>
        <li>
        	<a href="#" class="entretenimento">Interatividade</a>
            <div class="sub">
                <div class="row">
                    <ul>
                	<li><h2><a href="#">Notícias</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbnoticias_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/noticias/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
                    </ul>
                    <ul>
                	<li><h2><a href="#">Vídeos</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbvideos_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/videos/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
                    </ul>
                    <ul>
                	<li><h2><a href="#">Downloads</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbdownloads_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/downloads/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
                    </ul>
                </div>
				
				
				<div class="row">
				
					<ul style="width: 225px;">
                	<li><h2><a href="#">interaja</a></h2></li>
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/galerias">Eventos</a></li>
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/mural">Mural de recados</a></li>
                    </ul>
					
					
                    <ul style="width: 225px;">
                	<li><h2><a href="#">Links parceiros</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tblinks ORDER BY texto DESC";
$Lista = new Consulta($SQL,5,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=$linha['url'];?>" target="_blank"><?=utf8_decode($linha['texto']);?></a></li>
<?
}
?>
                    </ul>
					
					
                </div>
            </div>
        </li>

<li><a href="<?=utf8_decode($dadosconfig['url']);?>/galerias" class="loginmenu">Eventos</a></li>
       
    </ul>
</div>

<div id='menutop2'>
<ul>
<li><a href='<?=utf8_decode($dadosconfig['url']);?>/institucional/2/ondeestamos.html'>» Onde estamos</a></li>
<li>|</li>
<li><a href='<?=utf8_decode($dadosconfig['url']);?>/institucional/3/quemsomos.html'>» Quem somos</a></li>
<li>|</li>
<li class='faleconosco'><a href='<?=utf8_decode($dadosconfig['url']);?>/faleconosco'>» Fale conosco</a></li>
</ul>
</div>

</div>
</div>

<div class='limpar'></div>

<!-- topo roxo, caixa de busca -->
<div id='toporoxo'>
<div id='roxo'>



<div id="demo">
  <ul id="menu">
    <li> <a target="_blank" href="<?=utf8_decode($dadosconfig['twitter']);?>"> <img src="<?=utf8_decode($dadosconfig['url']);?>/js/iconestop/css/images/twitter.png" alt="siga-nos no twitter"/></a> </li>
    <li> <a target="_blank" href="<?=utf8_decode($dadosconfig['facebook']);?>"> <img src="<?=utf8_decode($dadosconfig['url']);?>/js/iconestop/css/images/facebook.png" alt="curta nossa página no facebook"/></a> </li>
    <li> <a target="_blank" href="<?=utf8_decode($dadosconfig['youtube']);?>"> <img src="<?=utf8_decode($dadosconfig['url']);?>/js/iconestop/css/images/orkut.png" alt="acesse nosso canal no youtube"/></a> </li>
	<li> <a href="<?=utf8_decode($dadosconfig['url']);?>/contato"> <img src="<?=utf8_decode($dadosconfig['url']);?>/js/iconestop/css/images/email.png" alt="fale conosco"/></a> </li>
	<li>  </li>
	<li> <div class='detalhe'><object type="application/x-shockwave-flash" data="media/dewplayer-rect.swf" width="240" height="20" id="dewplayer" name="dewplayer"> <param name="wmode" value="transparent" /><param name="movie" value="dewplayer-rect.swf" /> <param name="flashvars" value="mp3=media/mp3/musica1.mp3|media/mp3/musica2.mp3|media/mp3/musica3.mp3&amp;autostart=0&amp;autoreplay=1&amp;showtime=1&amp;volume=75" /> </object> </div></li>
  </ul>
</div>



<div id="pesquisa">
<div class='detalhe'><img src='<?=utf8_decode($dadosconfig['url']);?>/img/detalhe.png'></div>
<form action="<?=utf8_decode($dadosconfig['url']);?>/site/index.php" method="GET">
	<input type="hidden" name="p" value="busca" />
    <div class="busca"><label for="busca"><span><input type="text" name="busca" id="busca" value=" " />
    </span></label><input type="image" src="<?=utf8_decode($dadosconfig['url']);?>/img/buscar.png" id="enviar_busca" /></div>
</form>
</div>

</div>
</div>


<div class='limpar'></div>

<!-- inicia conteúdo -->	
<div id='site'>
<?
		// Inclusão das páginas do portal
		include ('secoes.php'); 
?>



<!-- Coluna direita, anuncios -->	
<div id='colunadireita'>

	<!-- Chamadas da coluna da direita -->	
	<div class='colunad'>
	<iframe src="<?=utf8_decode($dadosconfig['url']);?>/paginas/dados_usuario2.php" width="322px" height="170px" frameborder="0" scrolling="no"></iframe>
	</div>
	
	<div class='colunad1'>
	<!-- <h2><a href='#'>Culto ao Vivo</a></h2>
	<iframe width="322" height="240" src="http://cdn.livestream.com/embed/poderegloria?layout=4&amp;height=340&amp;width=560&amp;autoplay=false" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe>
	<span style="float:left; width:150px; margin:10px 0px 5px 0px;"> -->	
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<h2><a href='#'>Faça uma doação!</a></h2> 
	<span style="width:150px; float:left; color:#555; margin:10px 5px 5px 10px; text-shadow: 1px 1px 1px #fff;">Doe uma oferta voluntária para <?=utf8_decode($dadosconfig['nomesite']);?>.</span>

<span style="float:left; width:150px; margin:10px 0px 5px 0px;">	
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/doacao.jhtml" method="post">
<input type="hidden" name="email_cobranca" value="<?=utf8_decode($dadosconfig['pagseguro']);?>" />
<input type="hidden" name="moeda" value="BRL" />
<input id="doarbt" type="submit" src="" name="submit" alt="Faça uma doação para o ministério" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
</span>

	</div>
	<!-- BIBLIA ONLINE -->
	<div class='limpar'></div>
	<div class='colunad1'>
    <iframe src="http://www.internautascristaos.com/bibliaonline" width="320" height="240" frameborder="0" scrolling="auto"></iframe>
	</div>
	
	<!-- BANER LATERAL -->
	<div class='colunad1'><a href='<?=utf8_decode($dadosconfig['produtoservico']);?>'target="_blank">
        <img src="<?=utf8_decode($dadosconfig['url']);?>/img/bannerlateral.png" alt="Publicidade" width="320px" height="220px"/>
        </div>
	
    <!--<div class='colunad'>
	<h2><a href='#'>loja virtual</a></h2> 
	<p class="imghomeloja"><a href='#'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/produto.jpg" width="150px" height="100px"/></a> </p>
	<p><a href='#'>Bíblia Sagrada<br>R$ 55,00<br>Frete grátis</a></p>
	<a id="comprarbt" href='#' alt="Comprar" title="Comprar" >Comprar</a>
	</div>
	
	<div class='colunad'>
	<h2><a href='#'>loja virtual</a></h2> 
	<p class="imghomeloja"><a href='#'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/produto1.png" width="150px" height="100px"/></a> </p>
	<p><a href='#'>Blusa Acampamento<br>R$ 19,00<br>Frete grátis</a></p>
	<a id="comprarbt" href='#' alt="Comprar" title="Comprar" >Comprar</a>
	</div>
 
        <div class='colunad1' style="">
	<h2><a href='#'>enquete</a></h2> 
	<span style="width:300px; font-weight:bold; float:left; color:#555; margin:20px 5px 5px 10px; text-shadow: 1px 1px 1px #fff;">Esta será uma pergunta da enquete?</span>
	<span style="width:300px; float:left; color:#555; margin:10px 5px 5px 10px; text-shadow: 1px 1px 1px #fff;"><input type="checkbox"> Sim</span>
	<span style="width:300px; float:left; color:#555; margin:10px 5px 5px 10px; text-shadow: 1px 1px 1px #fff;"><input type="checkbox"> Não</span>
	<span style="width:300px; float:left; color:#555; margin:10px 5px 5px 10px; text-shadow: 1px 1px 1px #fff;"><input type="checkbox"> Talvez</span>
	<span style="width:300px; float:left; color:#555; margin:10px 5px 5px 10px; text-shadow: 1px 1px 1px #fff;"><input type="checkbox"> Nenhuma das alternativas</span>
	<span style="clear:both; margin:0 10px;"><input type="submit" value="responder"  id="submit"></span><br><br>
	</div>-->
</div>



<div class='limpar'></div>

</div>


<!-- rodape do site - creditos -->
<div id='Rodapebg'>
<div id='rodape'>

<div id='rodape1'>
<div id="menurodape">
		 
            	<ul>
                	<li><h2><a href="#">Departamentos</a></h2></li>
					
<?
$i=0;
$SQL = "SELECT * FROM tbdepartamentos_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
                </ul>
               <ul>
                	<li><h2><a href="#">Institucional</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbconteudo ORDER BY titulo DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/institucional/<?=$linha['id_conteudo'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><?=utf8_decode($linha['titulo']);?></a></li>
<?
}
?>
 
        </ul>
              
				
 
                    <ul>
                	<li><h2><a href="#">Notícias</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbnoticias_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/noticias/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
                    </ul>
					<br>
					<?=utf8_decode($dadosconfig['endereco']);?>
					<div class="limpar"></div>
					
					
                  <ul>
                	<li><h2><a href="#">Vídeos</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbvideos_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/videos/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
        </ul>
                  <ul>
                	<li><h2><a href="#">Downloads</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tbdownloads_categorias ORDER BY categoria DESC";
$Lista = new Consulta($SQL,99,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=utf8_decode($dadosconfig['url']);?>/downloads/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html"><?=utf8_decode($linha['categoria']);?></a></li>
<?
}
?>
        </ul>

				

				<ul>
                	<li><h2><a href="#">Interaja</a></h2></li>
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/galerias">Eventos</a></li>
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/mural">Mural de recados</a></li>
        </ul>
					
					
                 <ul>
                	<li><h2><a href="#">Links parceiros</a></h2></li>
<?
$i=0;
$SQL = "SELECT * FROM tblinks ORDER BY texto DESC";
$Lista = new Consulta($SQL,5,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
                	<li><a href="<?=$linha['url'];?>" target="_blank"><?=utf8_decode($linha['texto']);?></a></li>
<?
}
?>
        </ul>
					
					
				<ul>
                	<li><h2><a href="#">O Portal</a></h2></li>
				 
					<li><a href="<?=utf8_decode($dadosconfig['url']);?>/lideranca">Lideran&ccedil;as</a></li>
                    <li><a href="<?=utf8_decode($dadosconfig['url']);?>/pedidosdeoracao">Pedidos de Oração</a></li>
                    <li><a href="<?=utf8_decode($dadosconfig['url']);?>/agenda">Agenda</a></li>
				 
                </ul>
					
         
    </div>
</div>


<div id='creditos'>
<? 
$ano = date(Y); 
?>
 &copy <? echo $ano; ?>, <?=utf8_decode($dadosconfig['nomesite']);?>, Todos os direitos reservados.<br>
        <a href="http://www.magnis.com.br">  Powered By Magnis Hospedagem ilimitada</a> 
        
        <p align="right"><?=utf8_decode($dadosconfig['slogansite']);?></p><br>
        
       </div>

</div>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
