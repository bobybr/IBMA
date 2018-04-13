<?
include ('../includes/BancoDeDados.php'); 
include ('../includes/Funcoes.php'); 
include ('../includes/Config.php'); 
include ('../includes/Imagens.php'); 
include ('../includes/Validacoes.php');

# Configura��es
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1")
?>
	
<?php
 
/* Medida preventiva para evitar que outros dom�nios sejam remetente da sua mensagem. */
if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender = $dadosconfig['emailsite']; // Substitua essa linha pelo seu e-mail@seudominio
} else {
        $emailsender = $dadosconfig['emailsite'];
        //    Na linha acima estamos for�ando que o remetente seja 'webmaster@seudominio',
        // Voc� pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual �o sistema operacional do servidor para ajustar o cabe�alho de forma correta.  */
if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
else $quebra_linha = "\n"; //Se "não for Windows"
 
// Passando os dados obtidos pelo formul�rio para as vari�veis abaixo
$nomeremetente     = $_POST['nome'];
$emailremetente    = $_POST['email'];
$emaildestinatario = $_POST['emaildestinatario'];
$comcopia          = $_POST['comcopia'];
$comcopiaoculta    = $_POST['comcopiaoculta'];
$empresa           = $_POST['empresa'];
$verba           = $_POST['verba'];
$mensagem          = $_POST['mensagem'];
 
 
 if (($nomeremetente == "") || ($emailremetente == ""))

  {

    echo "<script>alert('Digite seu nome e e-mail corretamente.');</script>";

	echo "<script>history.go(-1);</script>";
	exit;
  }





// Validando o campo com E-mail



if (substr_count($emailremetente,"@") == 0 || substr_count($emailremetente,".") == 0)

  {

   echo "<script>alert('Por favor, utilize um e-mail v�lido');</script>";

   echo "<script>history.go(-1);</script>";
	exit;
   }
   
   
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P><i>Mensagem enviada por '.$nomeremetente.' - '.$emailremetente.'</i></P>
<p><b><i>Telefone: '.$empresa.'</i></b></p>
<p><b><i>Mensagem: '.$mensagem.'</i></b></p>
<hr>';
 
 
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8" .$quebra_linha;
// Perceba que a linha acima cont�m "text/html", sem essa linha, a mensagem n�o chegar� formatada.
$headers .= "From: " . $emailsender.$quebra_linha;
$headers .= "Cc: " . $comcopia . $quebra_linha;
$headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
$headers .= "Reply-To: " . $emailremetente . $quebra_linha;
// Note que o e-mail do remetente ser� usado no campo Reply-To (Responder Para)

// assunto
$eleenvioou = $nomeremetente.' - '.$empresa;
/* Enviando a mensagem */

//� obrigat�rio o uso do par�metro -r (concatena��o do "From na linha de envio"), aqui na Locaweb:

if(!mail($emaildestinatario, $eleenvioou, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "n�o for Postfix"
    mail($emaildestinatario, $empresa, $mensagemHTML, $headers );
}
 
/* mostrando mensagem ao usu�rio e redirecionando */
   echo '<script>alert("Mensagem enviada com sucesso!");</script>';

   echo "<script>history.go(-1);</script>";


?>