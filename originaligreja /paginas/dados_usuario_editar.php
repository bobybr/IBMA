<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 



include "../paginas/validar_session.php";


// faz consulta no banco
$user = db_dados("select * from user where login = '$login_usuario'");
if ($user['flag_status']==0){echo '<p style="font-family:verdana; font-weight:bold; color:red; margin:0 auto; width:600px; text-align:center; font-size:12px;">Este usu�rio foi desativado! Entre em contato com o pastor.</p>'; }
else {

	include('../admin/includes/Admin.php');
 

	$Config = array(
		'arquivo'=>'user',
		'tabela'=>'user',
		'titulo'=>'nome',
		'id'=>'id',
		'urlfixo'=>'', 
		'pasta'=>'user',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT *

, DATE_FORMAT(data,'%d/%m/%Y') as data
, DATE_FORMAT(nascimento,'%d/%m/%Y') as nascimento
, DATE_FORMAT(datafe,'%d/%m/%Y') as datafe
, DATE_FORMAT(databatismo,'%d/%m/%Y') as databatismo
, DATE_FORMAT(dataentrou,'%d/%m/%Y') as dataentrou

FROM ".$Config['tabela']." WHERE login = '$login_usuario' LIMIT 1;");
 
	if (empty($dados['nascimento'])) $dados['nascimento']=date('d/m/Y');
	if (empty($dados['datafe'])) $dados['datafe']=date('d/m/Y');
	if (empty($dados['databatismo'])) $dados['databatismo']=date('d/m/Y');
	if (empty($dados['dataentrou'])) $dados['dataentrou']=date('d/m/Y');
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');
?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Cadastro de Membros</h2>
                    </div>
<div id="conteudo">

<?


	# Estado civil
	$Estadocivil=array();
	$tmp1s = db_consulta("SELECT * FROM z_estadocivil_categoria ORDER BY categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Estadocivil[$tmp1['categoria']]=$tmp1['id_categoria'];
	}
	
	# SIM NAO
	$Simnao=array();
	$tmp1s = db_consulta("SELECT * FROM z_simnao_categoria ORDER BY id_categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Simnao[$tmp1['categoria']]=$tmp1['id_categoria'];
	}
	
	# grau de instrucao
	$Grauinst=array();
	$tmp1s = db_consulta("SELECT * FROM z_grau_categoria ORDER BY id_categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Grauinst[$tmp1['categoria']]=$tmp1['id_categoria'];
	}
	
	# Minist�rios
	$Minist=array();
	$tmp1s = db_consulta("SELECT * FROM z_ministerios_categoria ORDER BY categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Minist[$tmp1['categoria']]=$tmp1['id_categoria'];
	}
	
	# Cargo
	$Cargo=array();
	$tmp1s = db_consulta("SELECT * FROM z_cargos_categoria ORDER BY categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Cargo[$tmp1['categoria']]=$tmp1['id_categoria'];
	}
 
	if (empty($dados['nascimento'])) $dados['nascimento']=date('d/m/Y');
	if (empty($dados['datafe'])) $dados['datafe']=date('d/m/Y');
	if (empty($dados['databatismo'])) $dados['databatismo']=date('d/m/Y');
	if (empty($dados['dataentrou'])) $dados['dataentrou']=date('d/m/Y');
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Coment�rio								6=>Atributos
	
	
	# Informa��es pessoais
    array('','','','','','<a id="btnalt">Dados de acesso</a>',''),
	array('text',		'Login',		'login',			'500',			'',					'',											''),
	array('text',		'Senha',		'senha',			'500',			'',					'acima de 6 d�gitos',											''),
    
	array('','','','','','',''),	
    array('','','','','','<a id="btnalt">Informa&ccedil;&otilde;es Pessoais</a>',''),
	array('text',		'Nome',		'nome',			'500',			'',					'',											''),
    array('text',		'Sobrenome',		'sobrenome',			'500',			'',					'',											''),
    array('text',		'Nome do Pai',		'pai',			'500',			'',					'',											''),
    array('text',		'Nome da M�e',		'mae',			'500',			'',					'',											''),
    array('text',		'Naturalidade',		'naturalde',			'255',			'',					'',											''),
    array('text',		'Nacionalidade',		'nacional',			'255',			'',					'',											''),
    array('data',		'Data de Nascimento',		'nascimento',			'',			'',					'<- Clique no calend�rio',											''),
    array('select',		'Estado Civil',		'estadocivil',			'',			$Estadocivil,					'',											''),
    array('text',		'Nome do Conjuge',		'conjuge',			'500',			'',					'',											''),
    array('select',		'Conjuge � crente?',		'conjugecrente',			'',			$Simnao,					'',											''),
    array('text',		'Conjuge � de qual igreja?',		'igrejaconjuge',			'500',			'',					'',											''),
    array('textarea',	'Filhos',		'filhos',			'',			'',					'',											''),

	array('','','','','','',''),
	
	# Informa��es Profissional
    array('','','','','','<a id="btnalt">Informa&ccedil;&otilde;es Profissional</a>',''),
	array('text',		'Profiss�o',		'profissao',			'255',			'',					'',											''),
    array('text',		'Empresa que trabalha',		'empresa',			'255',			'',					'',											''),
    array('text',		'Telefone Comercial',		'telcomercial',			'255',			'',					'',											''),
	array('text',		'Endere�o da empresa',		'enderecoempresa',			'500',			'',					'',											''),
    array('text',		'RG',		'identidade',			'150',			'',					'S� n�meros',											''),
    array('text',		'CPF',		'cpf',			'150',			'',					'S� n�meros',											''),
    array('select',		'Grau de Instru��o',		'grau',			'',			$Grauinst,					'',											''),
    
 	
	array('','','','','','',''),

	# Contatos
    array('','','','','','<a id="btnalt">Informa&ccedil;&otilde;es de Contato</a>',''),
	array('text',		'Endere�o',		'endereco',			'500',			'',					'',											''),
    array('text',		'CEP',		'cep',			'150',			'',					'S� n�meros',											''),
    array('text',		'Bairro',		'bairro',			'255',			'',					'',											''),
    array('text',		'Cidade',		'cidade',			'255',			'',					'',											''),
	array('text',		'Estado',		'estado',			'30',			'',					'ex: DF',											''),
    array('text',		'Telefone',		'telefone',			'255',			'',					'',											''),
    array('text',		'Celular',		'celular',			'255',			'',					'',											''),
    array('text',		'E-mail',		'email',			'500',			'',					'',											''),
	array('text',		'Twiter',		'twitter',			'255',			'',					'',											''),
    array('text',		'Facebook',		'facebook',			'255',			'',					'',											''),
    array('text',		'Orkut',		'orkut',			'255',			'',					'',											''),

    
	array('','','','','','',''),
	
	# Informa��es Religiosas
    array('','','','','','<a id="btnalt">Informa&ccedil;&otilde;es Religiosas</a>',''),
	array('data',		'Data de Profiss�o de F�',		'datafe',			'',			'',					'<- Clique no calend�rio',											''),
    array('data',		'Data do Batismo',		'databatismo',			'',			'',					'<- Clique no calend�rio',											''),
    array('text',		'Igreja em que foi batizado',		'igrejabatismo',			'500',			'',					'',											''),
    array('text',		'Cidade da Igreja',		'cidadeigreja',			'255',			'',					'',											''),
    array('text',		'Estado da Igreja',		'estadoigreja',			'30',			'',					'',											''),
	array('text',		'Pastor que batizou',		'pastorbatismo',			'500',			'',					'',											''),
    array('data',		'Data que chegou na igreja',		'dataentrou',			'',			'',					'<- Clique no calend�rio',											''),
    array('text',		'Modo como entrou na igreja',		'modocomoentrou',			'500',			'',					'',											''),
    array('text',		'M�sica Preferida',		'musicapreferida',			'255',			'',					'',											''),
	array('text',		'Texto B�blico preferido',		'bibliapreferida',			'500',			'',					'',											''),
    array('select',		'� dizimista?',		'dizimista',			'',			$Simnao,					'',											''),
    array('select',		'Minist�rio',		'ministerio',			'',			$Minist,					'<a href="ministerios_categorias.php">Clique aqui para editar as op��es</a>',											''),
    array('text',		'Qual � o seu talento?',		'talentos',			'255',			'',					'Ex: Eu toco viol�o e canto',											''),
    array('select',		'Qual o seu cargo na igreja?',		'posicaoeclisiastica',			'',			$Cargo,					'<a href="cargos_categorias.php">Clique aqui para editar as op��es</a>',											''),
    array('select',		'Onde gostaria de trabalhar na igreja?',		'gostariatrabalhar',			'',			$Minist,					'<a href="ministerios_categorias.php">Clique aqui para editar as op��es</a>',											''),
  	array('file',		'Foto',		'imagem',			'350',			0,					'',											''),

 
	
    );
    

	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);



} ?>