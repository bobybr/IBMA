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
        <span class="caminho">Home &raquo; Modo de manutenção!</span>
        
        <?php if(isset($_POST['alterar']) && $_POST['alterar'] == 'ok'){
		
		$status = $_POST['status'];
		
		$alterar = mysql_query("UPDATE up_manu SET status = '$status'")
		           or die(mysql_error());
				   
		if($alterar >= '1'){
			echo "<div class=\"ok\">Status alterado com sucesso para <strong>$status!</strong></div>";
		}else{
			echo "<div class=\"no\">Erro ao alterar o status!</div>";
		}
		}
		
		?>
        
        <p><strong>Se modo = Ativo:</strong> o site só poderá ser visualizado estando logado no painel</p>
        <p>Mantenha Desativo para seus usuários poderem navegar</p>
        
        <form name="manu" action="" method="post" enctype="multipart/form-data">
        
          <select name="status" id="status">
            <option value="inativo">Desativar</option>
            <option value="ativo">Ativar</option>
          </select>
          <input type="hidden" name="alterar" value="ok" />
          <input type="submit" name="Alterar" value="Alterar Status" class="pagina_btn" />
        
        </form>

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>