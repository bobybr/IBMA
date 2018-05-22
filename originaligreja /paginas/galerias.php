

<div id='colunameio'>
	
<div class="acessibilidade">
	/ Galerias
</div>

<div class="titInterna" style="margin-top:0;"> Galerias</div>	
<div class='colunac3binterna'>
<?
$i=0;
$SQL = "SELECT *, DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1 FROM tbgalerias ORDER BY id_galeria DESC";
$Lista = new Consulta($SQL,9999,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
			<div class='colunac3binterna'>
            <div class='imglaranja'><a href='<?=utf8_decode($dadosconfig['url']);?>/galerias_ver/<?=$linha['id_galeria'];?>'><img src='<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$linha['codigo'];?>/capa.jpg' width="150px" /></a></div>
			<p><span class="categoriadep"><?=utf8_decode($linha['data1']);?></span><a href='<?=utf8_decode($dadosconfig['url']);?>/galerias_ver/<?=utf8_decode($linha['id_galeria']);?>'><?=utf8_decode($linha['titulo']);?>.  </a></p>
			</div>
			
<?
}
?>

</div>	

	<!-- Resetar formatação -->	
	<div class='limpar'></div>
	<br><br>
<!--<div class="paginacao"><?//=$Lista->geraPaginacao();?></div>-->

	<!-- Resetar formatação -->	
	<div class='limpar'></div>

	
  
</div>