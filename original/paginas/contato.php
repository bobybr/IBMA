<div id='colunameio'>

<div class="acessibilidade">
	/ Mural de recados
</div>

<div class="interna">
	<div class="titInterna">Contato</div>
	<div class="texto"><?=utf8_decode($dadosconfig['emailsite']);?></div>
	
	
	<form action="paginas/envia.php" method="post">

		<div class="subtitInterna">Formul&aacute;rio</div>
		Nome<br>
		<input class="nometext" type="text" id="nomef" name="nome"><br>

		Telefone para contato<br>
		<input class="nometext" type="text" id="nomef" name="empresa"><br>

		E-mail<br>
		<input class="nometext" type="text" id="nomef" name="email"><br>
		<input type="hidden" value="<?=utf8_decode($dadosconfig['emailsite']);?>" id="emaildestinatario" name="emaildestinatario">

		Mensagem<br>
		<textarea class="mensagemtext" id="mensagem" name="mensagem"></textarea><br>

		<input class="enviar" type="submit" id="submit" value="Enviar e-mail">

	</form>
	
	
	</div>
	</div>