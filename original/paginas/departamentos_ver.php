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

<?

if ($_GET['id']>0) {
	$busca = " AND id_departamentos=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbdepartamentos.id_categoria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbdepartamentos.*,
		DATE_FORMAT(tbdepartamentos.data,'%d/%m/%Y')  as data1 ,
		tbdepartamentos_categorias.*
	FROM 
		tbdepartamentos
		INNER JOIN tbdepartamentos_categorias ON (tbdepartamentos_categorias.id_categoria = tbdepartamentos.id_categoria)
	WHERE 1
		".$busca."
	ORDER BY 
		data DESC
	LIMIT 1;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);
	
	db_consulta('UPDATE tbdepartamentos SET contador=contador+1 WHERE id_departamentos='.(int)$dados['id_departamentos']." LIMIT 1");
	
?>
<div id='colunameio'>
	
	
<!-- Interna -->	
   
<div class="acessibilidade">
	/ <?=utf8_decode($dados['categoria']);?> / <?=utf8_decode($dados['titulo']);?>	<div style="float:right; font-size:12px;"><a onclick="window.print();return false" href="javascript:;">Imprimir Notícia</a></div>
</div>
<div class="interna">

<div class="aumentando"> 
      <p>Tamanho da letra</p> 
      <ul> 
         <li class="maiorzin"> 
            <a href="javascript:mudaTamanho('texto', -1);"
              
               title="Diminuir tamanho da letra">A-</a> 
         </li> 
         <li class="menorzin"> 
            <a href="javascript:mudaTamanho('texto', +1);"
               
               title="Aumentar tamanho da letra">A+</a> 
         </li> 
      </ul> 
</div>

<div style="margin:10px 0 0 0; color:#999; font-size:12px;"><?=$dados['data1'];?> por <?=utf8_decode($dados['categoria']);?></div>
<div class="titInterna" style="margin-top:0;"><?=utf8_decode($dados['titulo']);?></div>
<div class="subtitInterna" style="margin-top:0;"><?=utf8_decode($dados['subtitulo']);?></div>
		
    
<div class="conteudo">
	
<!--<div style="font-size:11px; color:#aaa;">créditos: <?=utf8_decode($dados['creditos']);?></div>-->


		<link type="text/css" href="<?=utf8_decode($dadosconfig['url']);?>galeria/styles/bottom.css" rel="stylesheet" />
		<script type="text/javascript" src="<?=utf8_decode($dadosconfig['url']);?>galeria/lib/jquery.pikachoose.js"></script>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose({carousel:true});
				});
		</script>
		
		
<div style="margin:0 0 0 -35px;">
<iframe src="<?=utf8_decode($dadosconfig['url']);?>/paginas/departamentos_galeria.php?id=<?=utf8_decode($dados['id_departamentos']);?>" width="680" height="500" scrolling="no" frameborder="0"></iframe>
</div>

<div class="limpar"></div>

<div id="texto">
<?=utf8_decode($dados['texto']);?>.
</div>

<br><br>

<div class="limpar"></div>
<div style=" font-size:16px; color:#555; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Espalhe por aí <img src="<?=utf8_decode($dadosconfig['url']);?>/img/espalhe.png" /></div>
<div class="limpar"></div>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_preferred_5"></a>
<a class="addthis_button_preferred_6"></a>
<a class="addthis_button_preferred_7"></a>
<a class="addthis_button_preferred_8"></a>
<a class="addthis_button_preferred_9"></a>
<a class="addthis_button_preferred_10"></a>
<a class="addthis_button_preferred_11"></a>
<a class="addthis_button_preferred_12"></a>
<a class="addthis_button_preferred_13"></a>
<a class="addthis_button_preferred_14"></a>
<a class="addthis_button_preferred_15"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e4bc82150099580"></script>
<!-- AddThis Button END -->

<br><br>

<div class="limpar"></div>
<div style=" font-size:30px; color:#555; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Comentários <img src="<?=utf8_decode($dadosconfig['url']);?>/img/comentaricone.gif" /></div>
<div class="limpar"></div>

<meta http-equiv="content-type" content="text/html;charset=utf-8">

<?
	$i=0;
	$SQL = "SELECT *, DATE_FORMAT(datahora,'%Hh%i do dia %d/%m/%Y') as data1 FROM tbdepartamentos_comentarios WHERE flag_status=1 AND id_departamentos=".(int)$dados['id_departamentos']." ORDER BY datahora DESC";
	$Lista = new Consulta($SQL,100,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>	

 
<div id="comentarios">
	<div id="nome">
		<span class="laranja">›</span> <?=$linha['nome'];?>
	</div>
	<div id="comentando">
		<span style="font-size:12px; color:#999;"><i><?=$linha['data1'];?></i></span><br><?=$linha['mensagem'];?>
	</div>
</div>

<?
	}
?>

<div id="nome">
	Deixe seu comentário
</div>


<?
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=0","",$_SERVER ['REQUEST_URI']);
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=1","",$_SERVER ['REQUEST_URI']);


	if ($_GET['ok']=='0') { ?><script language="javascript">alert('Dados inválidos!');</script><? }
	if ($_GET['ok']=='1') { ?><script language="javascript">alert('Sua mensagem foi enviada com sucesso!');</script><? }

?>

<div id="formulario">
	<form  name="frmMuralAdd"  method="post" action="<?=utf8_decode($dadosconfig['url']);?>/app/departamentos_comentarios.php" onsubmit="return validaMural(this);">
		<input type="hidden" name="id_departamentos" value="<?=$dados['id_departamentos'];?>" />
		<div id="formdir">
		<input type="text" id="nomef" value="Nome" name="nome" />
		<input type="text" id="nomef" value="E-mail" name="email" />
		</div>
		<textarea id="mensagem" name="mensagem">Mensagem</textarea>
		<input type="submit" value="comentar" id="enviar">
	</form>
</div>


</div>

</div>
	
	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>

  
</div>






