<div id='colunameio'>

<div class="acessibilidade">
	/ Pedidos de Ora&ccedil;&atilde;o
</div>

<div class="interna">
 


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
		if (f.codigo.value.length != 4) erro += '- C�digo de Confirma��o\n';

		if (erro.length > 0) {
			alert('Por favor, verifique os seguintes campos obrigat�rios: \n\n'+erro);
			return false;
		} else return true;
	}
</script>


<?
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=0","",$_SERVER ['REQUEST_URI']);
	 $_SERVER ['REQUEST_URI'] = str_replace("&ok=1","",$_SERVER ['REQUEST_URI']);


	if ($_GET['ok']=='0') { ?><script language="javascript">alert('Dados inv�lidos!');</script><? }
	if ($_GET['ok']=='1') { ?><script language="javascript">alert('Sua mensagem foi enviada com sucesso!');</script><? }

?>

<div id="muralborda">
<div class="limpar"></div>
<div style=" font-size:30px; color:#f90; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Pedidos de Ora&ccedil;&atilde;o <img src="<?=utf8_decode($dadosconfig['url']);?>/img/comentaricone.gif" /></div>
<div class="limpar"></div>



<div class="paginacao"><?=$Lista->geraPaginacao();?></div>
<div class="limpar"></div>

<div id="nome">
	Fa&ccedil;a o seu Pedido de Ora&ccedil;&atilde;o
</div>

<div id="mural">
	<form name="frmMuralAdd" method="post" action="<?=utf8_decode($dadosconfig['url']);?>/app/oracao.php" onsubmit="return validaMural(this);">
<div id="formdir">
		<input type="text" id="nomef" value="Nome" name="nome" />
		</div>
		<textarea id="mensagem" name="pedido">Mensagem</textarea>
        
		<p>C�d. Confirma��o:</p>
        <p><img src="<?=utf8_decode($dadosconfig['url']);?>/img/img_confirmacao.php"></p>
        <p><input type="text" type="text" id="nomef" name="codigo" /></p>

        <input type="submit" value="Enviar pedido"  id="submit" />

	</form><div class="limpar"></div>
</div>
</div>

</div>

</div>


