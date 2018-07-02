<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include"../Connections/config.php";
$conexao = mysql_connect("$hostname_config", "$username_config", "$password_config")
          or die(mysql_error());
$db = mysql_select_db("$database_config")
      or die(mysql_error());
?>
<?php include"scripts.php"?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UpInside - Gerenciador de Sites</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>