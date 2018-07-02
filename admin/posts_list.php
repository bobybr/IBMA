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
    <span class="caminho">Home &raquo; Listar Posts</span>



<?php if(isset($_POST['excluir_post']) && $_POST['excluir_post'] == 'excluir'){
	
	$posts_meta = $_POST['id_do_post'];
	
	$pega_imagem = mysql_query("SELECT thumb, categoria FROM up_posts WHERE id = '$posts_meta'")
	               or die (mysql_error());
	if(@mysql_num_rows($pega_imagem) <= '0'){
		echo "<div class=\"no\">Erro ao selecionar o post</div>";
	}else{
		while($res_pega_imagem=mysql_fetch_array($pega_imagem)){
			$thumb_meta = $res_pega_imagem[0];
			$categoria_meta = $res_pega_imagem[1];
			
			chdir("../uploads/$categoria_meta");
			$del = unlink("$thumb_meta");
		  
			  $deletar_post = mysql_query("DELETE FROM up_posts WHERE id = '$posts_meta'")
			                  or die(mysql_error());
							  
			if($deletar_post >= '1'){
				echo "<div class=\"ok\">Tópico foi removido com sucesso!</div>";
			}else{
				echo "<div class=\"no\">Erro ao remover o tópico, tente novamente!</div>";
			}
			
    	}
	}
}
?>



    <table width="100%" border="0" cellspacing="1" class="tabela">
      <tr>
        <td align="center" bgcolor="#e0e0e0">Data:</td>
        <td align="center" bgcolor="#e0e0e0">Categoria:</td>
        <td align="center" bgcolor="#e0e0e0">Titulo do post:</td>
        <td align="center" bgcolor="#e0e0e0">Editar</td>
        <td align="center" bgcolor="#e0e0e0">Excluir</td>
      </tr>
<?php

$pag = "$_GET[pag]";
if($pag >= '1'){
 $pag = $pag;
}else{
 $pag = '1';
}

$maximo = '16'; //RESULTADOS POR PÁGINA
$inicio = ($pag * $maximo) - $maximo;

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
						ORDER BY data DESC
						LIMIT $inicio, $maximo")
            or die(mysql_error());
if(@mysql_num_rows($noticias) <= '0'){
   echo "<strong>não encontramos notícias neste momento</strong><br /><br />";	
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
      
      <tr>
        <td align="center" bgcolor="#c8c8c8" height="20"><?php echo date('d/m/y', strtotime($data)); ?></td>
        <td align="center" bgcolor="#c8c8c8" height="20"><?php echo $categoria; ?></td>
        <td bgcolor="#c8c8c8" height="20">&nbsp;<?php echo $titulo; ?></td>
        <td height="20" align="center" bgcolor="#c8c8c8">
        <form name="editar_posts" action="posts_editar.php" enctype="multipart/form-data" class="lista_posts" method="post">
          
          <input type="hidden" name="id_do_post" value="<?php echo $id_do_post;?>" />
          <input type="submit" name="editar" value="Editar" class="lista_btn" />
        
        </form>    
        </td>
        <td height="20" align="center" bgcolor="#c8c8c8">
        <form name="excluir_posts" action="" enctype="multipart/form-data" class="lista_posts" method="post">
          
          <input type="hidden" name="id_do_post" value="<?php echo $id_do_post;?>" />
          <input type="hidden" name="excluir_post" value="excluir" />
          <input type="submit" name="Excluir" value="Excluir" class="lista_btn_e" />
        
        </form>  
        </td>
      </tr>
<?php
	}
}
?>
    </table>
<br />
<div class="paginator">
<?php

//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
$sql_res = mysql_query("SELECT * FROM up_posts");
$total = mysql_num_rows($sql_res);

$paginas = ceil($total/$maximo);
$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

echo "<a href=\"posts_list.php?pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

for ($i = $pag-$links; $i <= $pag-1; $i++){
if ($i <= 0){
}else{
echo"<a href=\"posts_list.php?pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";


}
}echo "$pag &nbsp;&nbsp;&nbsp;";

for($i = $pag +1; $i <= $pag+$links; $i++){
if($i > $paginas){
}else{
echo "<a href=\"posts_list.php?pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
}
}
echo "<a href=\"posts_list.php?pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
?>
</div>
    
    </div><!--conteudo-->
  
  </div><!--content-->
<div id="clear"></div>

</div><!--box-->

<?php include"footer.php";?>