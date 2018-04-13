<?
if ($_GET['id']>0) {
	$busca = " WHERE id_conteudo=".(int)$_GET['id'];
} else if ($_GET['id']>0) {
	$busca = " WHERE id_conteudo=".(int)$_GET['id'];
}

	$dados = db_dados("SELECT * FROM tbloja ".$busca);
?>


<div id='colunameio'>


<!-- Interna -->

<div class="acessibilidade">
	/ Loja / <?=utf8_decode($dados['titulo']);?>	<div style="float:right; font-size:12px;"><a onclick="window.print();return false" href="javascript:;">Imprimir Notícia</a></div>
</div>
<div class="interna">



<div class="titInterna" style="margin-top:0;"><?=utf8_decode($dados['titulo']);?></div>


<div class="conteudo">


<div id="texto">
<?=utf8_decode($dados['texto']);?>
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


</div>


</div>
</div>
