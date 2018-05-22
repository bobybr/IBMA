<?php



# Iniciando sessao
@session_start();

# Banco de Dados
define(DB_SERVIDOR,		'localhost',	true);
define(DB_USUARIO,		'root',	true);
define(DB_SENHA,		'root',			true);
define(DB_BANCO,		'ibma',	true);
db_conectar();


# Constantes
define(CONF_EMAIL, 'email@email.com.br', true);


	# Pagina��o
	if (isset($_GET["pg"]) && is_numeric($_GET["pg"])) $PGATUAL = $_GET["pg"]; else $PGATUAL = 1; 





?>