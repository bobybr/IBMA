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
        <span class="caminho">Home &raquo; Edição de Página Única</span>
        
<?php 

$pagina_editar = $_POST['pagina'];
$content_editar = $_POST['content'];

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'envia_form'){
	$cadatrar_pagina = mysql_query("INSERT INTO up_page (pagina, content) VALUES ('$pagina_editar', '$content_editar')")
	                   or die(mysql_error());
}

if(isset($_POST['editar_post']) && $_POST['editar_post'] == 'envia_form'){
	$atualiza_pagina = mysql_query("UPDATE up_page SET content = '$content_editar' WHERE pagina = '$pagina_editar'")
	                   or die (mysql_error());
	
}


 
$pagina_de_edicao = $_POST['pagina'];

$pega_pagina = mysql_query("SELECT id, pagina, content FROM up_page WHERE pagina = '$pagina_de_edicao'")
               or die(mysql_error());
if(@mysql_num_rows($pega_pagina) <= '0'){
	
?>	

<form name="cadastrar_pagina" method="post" action="" enctype="multipart/form-data">

<input type="hidden" name="pagina" value="<?php echo $pagina_de_edicao;?>" />

 <textarea name="content" rows="30" cols=""></textarea>
 
 <input type="hidden" name="cadastrar" value="envia_form" />
  
  <input type="submit" value="Cadastrar" name="Cadastrar" class="cadastro_btn" />

</form>	
	
<?php	
}else{

  while($res_pagina = mysql_fetch_array($pega_pagina)){
	  
	  $id = $res_pagina[0];
	  $pagina = $res_pagina[1];
	  $content = $res_pagina[2];
	  
 
?>

<form name="edita_pagina" method="post" action="" enctype="multipart/form-data">

  <input type="hidden" name="pagina" value="<?php echo $pagina_de_edicao;?>" />

 <textarea name="content" rows="30" cols=""><?php echo $content; ?></textarea>
 
  <input type="hidden" name="editar_post" value="envia_form" />
  
  <input type="submit" value="Editar" name="Editar" class="cadastro_btn" />

</form>


<?php
  }
}
?>

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>