<div id='colunameio'>

<div class="acessibilidade">
	/ Mural de recados
</div>

<div class="interna">
	<div class="titInterna">Mural de recados</div>


<script language="javascript">
	function muralCarinha(carinha) {
		document.frmMuralAdd.mensagem.value += ' '+carinha+' ';
		document.frmMuralAdd.mensagem.focus();
	}
	
	function validaMural(f) {
		var erro='';
		if (f.nome.value.length < 4) erro += '- Nome\n';
		if (!(ValidaEmail(f.email.value))) erro += '- Email\n';
		if (f.mensagem.value.length < 4) erro += '- Mensagem\n';
		if (f.codigo.value.length != 4) erro += '- Código de Confirmação\n';

		if (erro.length > 0) {
			alert('Por favor, verifique os seguintes campos obrigatórios: \n\n'+erro);
			return false;
		} else return true;
	}
</script>


<?
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=0","",$_SERVER ['REQUEST_URI']);
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=1","",$_SERVER ['REQUEST_URI']);


	if ($_GET['ok']=='0') { ?><script language="javascript">alert('Dados inválidos!');</script><? }
	if ($_GET['ok']=='1') { ?><script language="javascript">alert('Sua mensagem foi enviada com sucesso!');</script><? }

?>

<div id="muralborda">
<div class="limpar"></div>
<div style=" font-size:30px; color:#f90; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Comentários <img src="<?=utf8_decode($dadosconfig['url']);?>/img/comentaricone.gif" /></div>
<div class="limpar"></div>

<?
	$i=0;
	$SQL = "SELECT *, DATE_FORMAT(datahora,'%d/%m/%Y às %H:%i:%s') as datahora1 FROM tbmural WHERE flag_status=1 ORDER BY datahora DESC";
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

<div id="comentarios">
	<div id="nome">
		<span class="laranja">›</span> <?=$linha['nome'];?>
	</div>
	<div id="comentando">
		<span style="font-size:12px; color:#999;"><i><?=$linha['datahora1'];?></i></span><br><img src="<?=utf8_decode($dadosconfig['url']);?>/img/comm.png" /> <?=$linha['mensagem'];?>
	</div>
</div>


<?
	}
?>

<div class="paginacao"><?=$Lista->geraPaginacao();?></div>
<div class="limpar"></div>

<div id="nome">
	Deixe seu comentário
</div>

<div id="mural">
	<form name="frmMuralAdd" method="post" action="<?=utf8_decode($dadosconfig['url']);?>/app/mural.php" onsubmit="return validaMural(this);">
<div id="formdir">
		<input type="text" id="nomef" value="Nome" name="nome" />
		<input type="text" id="nomef" value="E-mail" name="email" />
		</div>
		<textarea id="mensagem" name="mensagem">Mensagem</textarea>
        
		

        <input type="submit" value="comentar"  id="submit" />

	</form><div class="limpar"></div>
</div>
</div>

</div>

</div>


