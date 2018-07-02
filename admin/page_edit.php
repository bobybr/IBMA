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
        <span class="caminho">Home &raquo; Edição de Páginas</span>
         <form name="edit_page" method="post" action="page_cadastro.php" enctype="multipart/form-data">
         
          <select name="pagina" id="pagina">
            <option value="-1">Selecione a página</option>
            <option value="empresa">Empresa</option>
            <option value="nossos livros">Nossos Livros</option>
            <option value="nossos cursos">Nossos cursos</option>
          </select>
            <input type="submit" name="Editar" value="Editar" class="pagina_btn" />
         </form>

    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>