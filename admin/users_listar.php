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
        <span class="caminho">Home &raquo; Usuários Listar/Editar/Excluir</span>

<?php if(isset($_POST['excluir']) && $_POST['excluir'] == 'ok'){
	
	
	$id_user = $_POST['user_id'];
	
	
$verifica_usuario = mysql_query("SELECT usuario FROM up_users WHERE id = '$id_user'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($verifica_usuario) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		while($res_usuario=mysql_fetch_array($verifica_usuario)){
			 
			 $usuario = $res_usuario[0];
		}
	 }
	
	if($usuario == 'admin'){
		echo "<div class=\"no\">O Usuário Admin não pode ser excluido</div>";
	}else{
	
	$deletar_usuario = mysql_query("DELETE FROM up_users WHERE id = '$id_user'")
	                   or die(mysql_error());
					   
	if($deletar_usuario >= '1'){
		echo "<div class=\"ok\">Usuário foi excluido com succeso!</div>";
	}else{
		echo "<div class=\"no\">Erro ao excluir o usuário!</div>";
	}
  }
}
?>
<div id="usuarios">
<ul>
     <?php
	 $boas_vindas = mysql_query("SELECT id, nome, email FROM up_users")
	                  or die(mysql_error());
	 if(@mysql_num_rows($boas_vindas) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_boas_vindas=mysql_fetch_array($boas_vindas)){
			 
			 $id = $res_boas_vindas[0];
			 $nome = $res_boas_vindas[1];
			 $email = $res_boas_vindas[2];
			 $default = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=40";
             $size = 40;
			 $grav_url = "http://www.gravatar.com/avatar.php?
             gravatar_id=" . md5( strtolower( $email ) ) .
			 "&default=" . urlencode( $default ) .
			 "&size=" . $size;
	         ?>
<li>
<span>
<form name="editar_usuario" action="users_editar.php" enctype="multipart/form-data" method="post" class="form">

  <input type="hidden" name="user_id" value="<?php echo $id;?>" />
  <input type="submit" name="Editar" value="Editar Usuário" class="btn" />

</form>


<form name="excluir_usuario" action="" enctype="multipart/form-data" method="post" class="form">

  <input type="hidden" name="user_id" value="<?php echo $id;?>" />
  <input type="hidden" name="excluir" value="ok" class="btn" />
  <input type="submit" name="Excluir" value="Excluir Usuário" />

</form>
</span>
<img src="<?php echo $grav_url; ?>" alt=""/>
<?php echo $nome;?><br />
<?php echo $email;?>
</li>
       
    <?php
	   }
	 }
     ?>   
</ul>
</div><!--usuarios-->

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>