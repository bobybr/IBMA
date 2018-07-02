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
      <span class="caminho">Home &raquo; Cadastrar Posts</span>
       
      <h1>Cadastrar post</h1>
      
    
<?php if(isset($_POST['cadastrar_post']) && $_POST['cadastrar_post'] == 'cad'){
	
	
	$usuario = $_SESSION['MM_Username'];
	$pega_autor = mysql_query("SELECT id FROM up_users WHERE usuario = '$usuario'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($pega_autor) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_autor=mysql_fetch_array($pega_autor)){
			 
			 $id_autor = $res_autor[0];
	

    $img         = $_FILES['thumb'];
	$titulo      = strip_tags(trim($_POST['titulo']));
	$texto       = $_POST['texto'];
	$categoria   = strip_tags(trim($_POST['categoria']));
	$data        = strip_tags(trim($_POST['data']));
	$autor       = "$id_autor";
	$valor_real  = strip_tags(trim($_POST['valor_real']));
	$valor_pag   = strip_tags(trim($_POST['valor_pagseguro']));
	
	$pasta = "../uploads/$categoria";
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
		 
		 if(!empty($nome) && in_array($type, $permitido)){
				$name = md5(uniqid(rand(), true)).".jpg";
				Redimensionar($tmp, $name, 500, $pasta);	
	            $cadastrar_noticias = mysql_query("INSERT INTO up_posts (thumb, titulo, texto, categoria, data, autor, valor_real, valor_pagseguro, visitas)
											VALUES ('$name', '$titulo', '$texto', '$categoria', '$aux3', '$autor', '$valor_real', '$valor_pag', '1')")
		                              or die(mysql_error());
									  
				if($cadastrar_noticias >= '1'){
					echo "<div class=\"ok\">Seu tópico foi cadastrado com sucesso!</div>";
				}else{
					echo "<div class=\"no\">Erro ao cadastrar o tópico</div>";
		   }
		 }
	   }
	 }
  }
?>
       
           <form name="cadastrar_posts" id="cadastrar_posts" method="post" action="" enctype="multipart/form-data">
             <fieldset>
                <label>
                  <span>Imagem de exibição</span>
                    <input type="file" name="thumb" size="60" />
                </label> 
                
                <label>
                  <span>Titulo</span>
                    <input type="text" name="titulo"/>
                </label>
                
                <label>
                  <span>Texto</span>
                    <textarea name="texto" rows="5"></textarea>
                </label>
                
                <label>
                  <span>Categoria</span>
                   <select name="categoria" id="categoria">
     			     <option value="">Selecione a categoria</option>
                     <option value="novidades" id="novidades">Novidades</option>
                     <option value="cursos" id="cursos">Cursos</option>
                     <option value="produtos" id="produtos">Produtos</option>     
                   </select>
                 </label>
                
                <label>
                  <span>Data</span>
                  <input type="text" name="data" />
                </label>
                                      
                <div id="produtos_class" style="display:none;">
                <br />
                <div class="no"><strong>Para postar um produto, os campos abaixo são obrigatórios!</strong></div>
                <label>
                  <span>Valor R$ <strong>(EX: 15,50)</strong></span>
                  <input type="text" name="valor_real"/>
                </label>
                
                <label>
                  <span>Valor PagSeguro  <strong>(EX: 1550)</strong></span>
                    <input type="text" name="valor_pagseguro" />
                </label>
                </div><!--class produtos_class-->
                <input type="hidden" name="cadastrar_post" value="cad" />
                <input type="submit" value="Cadastrar" name="Cadastrar" class="cadastro_btn" />
               
             </fieldset>
           
      </form>
     

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>