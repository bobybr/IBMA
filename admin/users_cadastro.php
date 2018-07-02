<?php include"scripts/restrict_admin.php";?>
<?php include"header.php";?>
<div id="box">
  
  <div id="header">
  
    <div id="header_logo">
    <a href="painel.php"><img src="images/logo.png" alt="" border="0" /></a>
    </div><!--header logo-->
  
  </div><!--header-->
  
  <div id="content">
  
    <div id="menu">
     <?php include"menu.php";?> 
    </div><!--menu-->
    
    <div id="conteudo">
        <span class="caminho">Home &raquo; Usuários Cadastro</span>

<?php if(isset($_POST['cadastro']) && $_POST['cadastro'] == 'ok'){
	
	$usuario = strip_tags(trim($_POST['usuario']));
	$senha   = strip_tags(trim($_POST['senha']));
	$nivel   = strip_tags(trim($_POST['nivel']));
	$nome    = strip_tags(trim($_POST['nome']));
	$email   = strip_tags(trim($_POST['email']));
	
	
$verificar_usuario = mysql_query("SELECT usuario FROM up_users WHERE usuario = '$usuario'")
                     or die(mysql_error());
if(@mysql_num_rows($verificar_usuario) >= '1'){
	echo "<div class=\"no\">Usuário não pode ser cadastrado pois já existe!</div>";
}else{

	
	$cadastra_usuario = mysql_query("INSERT INTO up_users (usuario, senha, nivel, nome, email)
								    VALUES ('$usuario', '$senha', '$nivel', '$nome', '$email')")
	                    or die(mysql_error());
						
	if($cadastra_usuario >= '1'){
		echo "<div class=\"ok\">Usuário cadastrado com sucesso!</div>";
	}else{
		echo "<div class=\"no\">Erro ao cadastrar Usuário!</div>";
	}
	
  }

}
?>


        <form name="cadastro" action="" method="post" enctype="multipart/form-data">
          
          <label>
            <span>Usuário</span>
              <input type="text" name="usuario" />
          </label>
          
          <label>
            <span>Senha</span>
              <input type="password" name="senha" />
          </label>
          
          <label>
            <span>Nivel</span>
             <select name="nivel" id="nivel">
             <option value="editor">Editor</option>
             <option value="admin">Admin</option>
             </select>
          </label>
          
          <label>
            <span>Nome</span>
              <input type="text" name="nome" />
          </label>
          
          <label>
            <span>Email</span>
              <input type="text" name="email" />
          </label>
          <input type="hidden" name="cadastro" value="ok" />
          <input type="submit" name="Cadastrar" value="Cadastrar" class="cadastro_btn" />
        
        
        </form>

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>