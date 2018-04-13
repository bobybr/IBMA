 

<?

if ($_GET['id']>0) {
	$busca = " AND id_galeria=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbgalerias.id_galeria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbgalerias.*,
		DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
	FROM 
		tbgalerias
	WHERE 1
		".$busca."
	ORDER BY 
		data DESC
	LIMIT 1;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);
	
	db_consulta('UPDATE tbgalerias SET contador=contador+1 WHERE id_galeria='.(int)$dados['id_galeria']." LIMIT 1");
	
?>
<div id='colunameio'>
	
	
<!-- Interna -->	
   
<div class="acessibilidade">
	/ Galerias / <?=utf8_decode($dados['titulo']);?>	 
</div>
<div class="interna">
 

<div style="margin:10px 0 0 0; color:#999; font-size:12px;"><?=$dados['data1'];?></div>
<div class="titInterna" style="margin-top:0;"><?=utf8_decode($dados['titulo']);?></div>
<div class="subtitInterna" style="margin-top:0;"><?=utf8_decode($dados['local']);?></div>
		
    
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
<iframe src="<?=utf8_decode($dadosconfig['url']);?>/paginas/galerias_galeria.php?id=<?=utf8_decode($dados['id_galeria']);?>" width="680" height="500" scrolling="no" frameborder="0"></iframe>
</div>

<div class="limpar"></div>

<div id="texto">
<?=utf8_decode($dados['descricao']);?>
</div>

<br><br>

<div class="limpar"></div>
<div style=" font-size:16px; color:#555; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Espalhe por a&iacute; <img src="<?=utf8_decode($dadosconfig['url']);?>/img/espalhe.png" /></div>
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
<div style=" font-size:30px; color:#555; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Coment&aacute;rios <img src="<?=utf8_decode($dadosconfig['url']);?>/img/comentaricone.gif" /></div>
<div class="limpar"></div>



<?
	$i=0;
	$SQL = "SELECT *, DATE_FORMAT(datahora,'%Hh%i do dia %d/%m/%Y') as data1 FROM tbgalerias_comentarios WHERE flag_status=1 AND id_galeria=".(int)$dados['id_galeria']." ORDER BY datahora DESC";
	$Lista = new Consulta($SQL,100,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>	

 
<div id="comentarios">
	<div id="nome">
		<span class="laranja">&rsaquo;</span> <?=$linha['nome'];?>
	</div>
	<div id="comentando">
		<span style="font-size:12px; color:#999;"><i><?=$linha['data1'];?></i></span><br><?=$linha['mensagem'];?>
	</div>
</div>

<?
	}
?>

<div id="nome">
	Deixe seu coment&aacute;rio
</div>


<?
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=0","",$_SERVER ['REQUEST_URI']);
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=1","",$_SERVER ['REQUEST_URI']);


	if ($_GET['ok']=='0') { ?><script language="javascript">alert('Dados inválidos!');</script><? }
	if ($_GET['ok']=='1') { ?><script language="javascript">alert('Sua mensagem foi enviada com sucesso!');</script><? }

?>

<div id="formulario">
	<form  name="frmMuralAdd"  method="post" action="<?=utf8_decode($dadosconfig['url']);?>/app/galeria_comentarios.php" onsubmit="return validaMural(this);">
		<input type="hidden" name="id_galeria" value="<?=$dados['id_galeria'];?>" />
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






