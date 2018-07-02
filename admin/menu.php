<?php
	 $usuario = $_SESSION['MM_Username'];
	 $boas_vindas = mysql_query("SELECT nivel FROM up_users WHERE usuario = '$usuario'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($boas_vindas) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_boas_vindas=mysql_fetch_array($boas_vindas)){
			 
			 $nivel = $res_boas_vindas[0];
		 }
	 }
?>
<?php if($nivel == 'admin'){
?>
<h1>Gerenciar site</h1>
   <ul>
     <li><a href="painel.php">Home</a></li>
     <li><a href="manutencao.php">Manutenção</a></li>
   </ul>
<h1>Gerenciar Posts</h1>
   <ul>
     <li><a href="posts_cadastro.php">Cadastrar novo</a></li>
     <li><a href="posts_list.php">Listar Posts</a></li>
   </ul>
<h1>Gerenciar Páginas</h1>
   <ul>
    <li><a href="page_edit.php">Edição de Páginas</a></li>
   </ul>
<h1>Gerenciar Usuário</h1>
   <ul>
    <li><a href="users_cadastro.php">Cadastrar novo</a></li>
    <li><a href="users_listar.php">Listar Usuários</a></li>
    <li><a href="users_perfil.php">Editar Perfil</a></li>
   </ul>
<h1>Funções</h1>
  <ul>
   <li><a href="../" target="_blank">Visualizar o Site</a></li>
   <li><a href="logof.php">Deslogar do painel</a></li>
 </ul>
<?php }else{
?>
<h1>Gerenciar site</h1>
   <ul>
     <li><a href="painel.php">Home</a></li>
   </ul>
<h1>Gerenciar Posts</h1>
   <ul>
     <li><a href="posts_cadastro.php">Cadastrar novo</a></li>
     <li><a href="posts_list.php">Listar Posts</a></li>
   </ul>
<h1>Gerenciar Páginas</h1>
   <ul>
    <li><a href="page_edit.php">Edição de Páginas</a></li>
   </ul>
<h1>Gerenciar Usuário</h1>
   <ul>
    <li><a href="users_perfil.php">Editar Perfil</a></li>
   </ul>
<h1>Funções</h1>
  <ul>
   <li><a href="../" target="_blank">Visualizar o Site</a></li>
   <li><a href="logof.php">Deslogar do painel</a></li>
 </ul>
<?php 
}
?>