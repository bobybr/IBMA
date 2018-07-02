<?php include"scripts/restrict_no.php";?>
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
        <span class="caminho">Home &raquo; Editar Perfil</span>

<?php if(isset($_POST['editar']) && $_POST['editar'] == 'ok'){
	
     $usuario = $_SESSION['MM_Username'];
	 $senha   = strip_tags(trim($_POST['senha']));
	 $nome    = strip_tags(trim($_POST['nome']));
	 $email   = strip_tags(trim($_POST['email']));
	 
	 $atualizar_perfil = mysql_query("UPDATE up_users SET senha = '$senha', nome = '$nome', email = '$email' WHERE usuario = '$usuario'")
	                     or die(mysql_error());
						 
	 if($atualizar_perfil >= '1'){
	   echo "<div class=\"ok\">Seus dados foram atualizados com sucesso!</div>";
    }else{
	   echo "<div class=\"no\">Erro ao atualizar seus dados!</div>";
	}
	
}
?>
     <?php
	 $usuario = $_SESSION['MM_Username'];
	 $perfil = mysql_query("SELECT id, senha, nome, email FROM up_users WHERE usuario = '$usuario'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($perfil) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_perfil=mysql_fetch_array($perfil)){
			 
			 $id = $res_perfil[0];
			 $senha = $res_perfil[1];
			 $nome = $res_perfil[2];
			 $email = $res_perfil[3];

			 $default = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=40";
             $size = 40;
			 $grav_url = "http://www.gravatar.com/avatar.php?
             gravatar_id=" . md5( strtolower( $email ) ) .
			 "&default=" . urlencode( $default ) .
			 "&size=" . $size;
	         ?>
<div class="usuario_editar">          
<img src="<?php echo $grav_url; ?>" alt=""/>
<?php echo $nome;?><br />
<?php echo $email;?>
</div>           

<form name="editar_usuario" action="" enctype="multipart/form-data" method="post">

  <label>
    <span>Altera a Senha</span>
      <input type="password" name="senha" value="<?php echo $senha; ?>" />
  </label>
  
  <label>
    <span>Altera Nome</span>
      <input type="text" name="nome" value="<?php echo $nome;?>" />
  </label>
  
  <label>
    <span>Altera E-mail</span>
      <input type="text" name="email" value="<?php echo $email; ?>" />
  </label>
  
  <input type="hidden" name="editar" value="ok" />
  <input type="submit" name="Editar_usuario" value="Editar Usuário" class="cadastro_btn" />

</form>
      
    <?php
	   }
	 }
     ?>   
</div><!--usuarios-->

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>