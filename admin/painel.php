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
     <?php
	   $visitas_total = mysql_query("SELECT Sum(visitas) AS visitas FROM up_posts")
	                    or die(mysql_error());
	   if(@mysql_num_rows($visitas_total) <= '0') echo '';
	   $views = 0;
	   $visitas = mysql_result($visitas_total, $views, 'Visitas');
	   
	   $visitas_media = mysql_query("SELECT id FROM up_posts")
	                    or die(mysql_error());
	   $linhas = mysql_num_rows($visitas_media);
	   if($linhas >= '2'){
	   $media = ceil($visitas/$linhas);
	   }else{
	   }
	   
	   $produtos = mysql_query("SELECT id FROM up_posts WHERE categoria = 'produtos'")
	                    or die(mysql_error());
	   $res_produtos = mysql_num_rows($produtos);
	   
	   $novidades = mysql_query("SELECT id FROM up_posts WHERE categoria = 'novidades'")
	                    or die(mysql_error());
	   $res_novidades = mysql_num_rows($novidades);
	   
	   $cursos = mysql_query("SELECT id FROM up_posts WHERE categoria = 'cursos'")
	                    or die(mysql_error());
	   $res_cursos = mysql_num_rows($cursos);
	 ?>
    
    
         <h1>Boas vindas</h1>
     <?php
	 $usuario = $_SESSION['MM_Username'];
	 $boas_vindas = mysql_query("SELECT nome, email FROM up_users WHERE usuario = '$usuario'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($boas_vindas) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_boas_vindas=mysql_fetch_array($boas_vindas)){
			 
			 $nome = $res_boas_vindas[0];
			 $email = $res_boas_vindas[1];
			 $default = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=40";
             $size = 40;
			 $grav_url = "http://www.gravatar.com/avatar.php?
             gravatar_id=" . md5( strtolower( $email ) ) .
			 "&default=" . urlencode( $default ) .
			 "&size=" . $size;
	         ?>
         <img src="<?php echo $grav_url; ?>" alt="" align="right" />
         <strong>Bem vindo</strong> <?php echo $nome; ?><br />
         <strong>Hoje dia: </strong><?php echo date('d'); ?> do mes <?php echo date('m'); ?> de <?php echo date('Y'); ?> as <?php echo date('H:i'); ?>
       
    <?php
	   }
	 }
     ?>   

    <h1>Visitas em seus posts</h1>
    Visitas = <strong><?php echo $visitas; ?></strong>
    <h1>Media de visitas em seu site</h1>
     Visitas = <strong><?php echo $media; ?></strong>
     <h1>Quantidade de posts em seu site!</h1>
     Posts encontrados = <strong><?php echo $linhas; ?></strong><br />
     <strong><?php echo $res_novidades; ?></strong> em novidades | <strong><?php echo $res_produtos; ?></strong> em produtos | <strong><?php echo $res_cursos; ?></strong> em cursos
   </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>


</div><!--box-->

<?php include"footer.php";?>