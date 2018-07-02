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
      <span class="caminho">Home &raquo; Editar Posts</span>
       
      <h1>Cadastrar post</h1>
      
    
<?php if(isset($_POST['cadastrar_post']) && $_POST['cadastrar_post'] == 'cad'){
	
	$usuario = $_SESSION['MM_Username'];
	$pega_autor = mysql_query("SELECT id FROM up_users WHERE usuario = '$usuario'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($pega_autor) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_autor=mysql_fetch_array($pega_autor)){
			 
			 $id_autor = $res_autor[0];
	
    $id_a_editar = $_POST['id_do_post'];
    $img         = $_FILES['thumb'];
	$titulo      = strip_tags(trim($_POST['titulo']));
	$texto       = $_POST['texto'];
	$categoria   = strip_tags(trim($_POST['categoria']));
	$data        = strip_tags(trim($_POST['data']));
	$autor       = "$id_autor";
	$valor_real  = strip_tags(trim($_POST['valor_real']));
	$valor_pag   = strip_tags(trim($_POST['valor_pagseguro']));
	
	$pasta = "../$categoria";
    $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');
	

	   require("scripts/funcao_upload.php");
	     $nome = $img['name'];
		 $tmp = $img['tmp_name'];
		 $type = $img['type'];
		 
		 $entrada = trim("$data");
		 if(strstr($entrada, "/")){
			$aux = explode("/", $entrada); 
			$aux2 = date('H:i:s');
			$aux3 = $aux[2] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2;
		 }
		 
if(empty($_FILES['thumb']['name'])){

   $editar_posts = mysql_query("UPDATE up_posts SET titulo = '$titulo', texto = '$texto', categoria = '$categoria', 
							   data = '$aux3', valor_real = '$valor_real', valor_pagseguro = '$valor_pag' WHERE id = '$id_a_editar'")
                   or die(mysql_error());
				   
	if($editar_posts >= '1'){
					echo "<div class=\"ok\">Seu tópico foi atualizado com sucesso com sucesso!</div>";
				}else{
					echo "<div class=\"no\">Erro ao atualizar o tópico</div>";
		   }

}else{
	
	$pega_imagem = mysql_query("SELECT thumb, categoria FROM up_posts WHERE id = '$id_a_editar'")
	               or die (mysql_error());
				   
	if(@mysql_num_rows($pega_imagem) <= '0'){
		echo "<div class=\"no\">Erro ao selecionar o post</div>";
	}else{
		while($res_pega_imagem=mysql_fetch_array($pega_imagem)){
			
			$thumb_meta = $res_pega_imagem[0];
			$categoria_meta = $res_pega_imagem[1];
			
			chdir("../uploads/$categoria_meta");
			$del = unlink("$thumb_meta");
			
		}
	}
		 
		 if(!empty($nome) && in_array($type, $permitido)){
				$name = md5(uniqid(rand(), true)).".jpg";
				Redimensionar($tmp, $name, 500, $pasta);	
	            $editar_posts = mysql_query("UPDATE up_posts SET thumb = '$name', titulo = '$titulo', texto = '$texto', categoria = '$categoria', 
							   data = '$aux3', valor_real = '$valor_real', valor_pagseguro = '$valor_pag' WHERE id = '$id_a_editar'")
                   or die(mysql_error());
				   
	            if($editar_posts >= '1'){
					echo "<div class=\"ok\">Seu tópico foi atualizado com sucesso com sucesso!</div>";
				}else{
					echo "<div class=\"no\">Erro ao atualizar o tópico</div>";
		   }
		 }
	   }
	 }
  }
}
?>
     
     
  
<?php 

$editar_post_id = $_POST['id_do_post'];


$noticias = mysql_query("SELECT
						id,
						thumb,
						titulo,
						texto,
						categoria,
						`data`,
						autor,
						valor_real,
						valor_pagseguro,
						visitas
						FROM up_posts
						WHERE id = '$editar_post_id'")
            or die(mysql_error());
if(@mysql_num_rows($noticias) <= '0'){
   echo "não encontramos notícias neste momento";	
}else{
	
    while($res_noticias=mysql_fetch_array($noticias)){
		 
        $id_do_post = $res_noticias[0];
		$thumb = $res_noticias[1];
		$titulo = $res_noticias[2];
		$texto = $res_noticias[3];
		$categoria = $res_noticias[4];
		$data = $res_noticias[5];
		$autor = $res_noticias[6];
		$valor_real = $res_noticias[7];
		$valor_pagseguro = $res_noticias[8];
		$visitas = $res_noticias[9];
?>
     
    
           <form name="editar_posts" id="editar_posts" method="post" action="" enctype="multipart/form-data">
             <fieldset>
                <label>
                  <span>Imagem de exibição <strong>(somente nessesária se quiser altera-la!)</strong></span>
                    <input type="file" name="thumb" size="60" />
                </label> 
                
                <label>
                  <span>Titulo</span>
                    <input type="text" name="titulo" value="<?php echo $titulo; ?>"/>
                </label>
                
                <label>
                  <span>Texto</span>
                    <textarea name="texto" rows="5"><?php echo $texto; ?></textarea>
                </label>
                
                <label>
                  <span>Categoria</span>
                   <select name="categoria" id="categoria">
     			     <option value="<?php echo $categoria;?>"><?php echo $categoria;?></option>
                     <option value="novidades" id="novidades">Novidades</option>
                     <option value="cursos" id="cursos">Cursos</option>
                     <option value="produtos" id="produtos">Produtos</option>     
                   </select>
                 </label>
                
                <label>
                  <span>Data</span>
                  <input type="text" name="data" value="<?php echo date('d/m/Y', strtotime($data));?>" />
                </label>
                 <?php if ($categoria == 'produtos'){
					 echo "<div id=\"produtos_class\">";
				 }else{
				     echo "<div id=\"produtos_class\" style=\"display:none;\">";
				 }
				 ?>
                <label>
                  <span>Valor R$ <strong>(EX: 15,50)</strong></span>
                  <input type="text" name="valor_real" value="<?php echo $valor_real; ?>"/>
                </label>
                
                <label>
                  <span>Valor PagSeguro  <strong>(EX: 1550)</strong></span>
                    <input type="text" name="valor_pagseguro" value="<?php echo $valor_pagseguro; ?>" />
                </label>
                </div><!--class produtos_class-->
                <input type="hidden" name="id_do_post" value="<?php echo $id_do_post;?>" />
                <input type="hidden" name="cadastrar_post" value="cad" />
                <input type="submit" value="Editar" name="Eidtar" class="cadastro_btn" />
               
             </fieldset>
           
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