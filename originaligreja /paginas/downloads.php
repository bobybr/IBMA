 

<?

if ($_GET['id']>0) {
	$busca = " AND id_noticia=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbdownloads.id_categoria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbdownloads.*,
		tbdownloads_categorias.*
	FROM 
		tbdownloads
		INNER JOIN tbdownloads_categorias ON (tbdownloads_categorias.id_categoria = tbdownloads.id_categoria)
	WHERE 1
		".$busca."
	ORDER BY 
		id_download DESC
		");
 

?>
<div id='colunameio'>
	
	
<!-- Interna -->	
   
<div class="acessibilidade">
	/ Downloads / <?=utf8_decode($dados['categoria']);?>	 
</div>
<div class="interna">
 
<div class="titInterna" style="margin-top:0;"><span style="color:#ccc;">Download:</span> <?=utf8_decode($dados['categoria']);?></div>
	<br><br>
<div class='colunac3binterna'>

<div id="texto">
<?

$i=0;
$SQL = " SELECT
		tbdownloads.*,
		tbdownloads_categorias.*
	FROM 
		tbdownloads
		INNER JOIN tbdownloads_categorias ON (tbdownloads_categorias.id_categoria = tbdownloads.id_categoria)
	WHERE 1
		".$busca."
	ORDER BY 
		id_download DESC
		";
 

	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
	
?>

<div class='colunac3binterna'>
<p style="width:400px; float:left; font-size:16px; font-weight:bold;"><?=utf8_decode($linha['titulo']);?><br><span style="font-size:14px; font-weight:normal;"><?=utf8_decode($linha['descricao']);?></span> </p>
<div style="float:right;"><a href="<?=utf8_decode($dadosconfig['url']);?>/arquivos/downloads/<?=utf8_decode($linha['arquivo']);?>"><img src="<?=utf8_decode($dadosconfig['url']);?>/img/baixar.png" /></a></div>
</div>

<?
}
?>
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


	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>

  
</div>

</div>

</div>






