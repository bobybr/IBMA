<div id="page_content">

<div id="sidebar">
<?php include"sidebars/sidebar.php";?>
</div><!--sidebar-->
 
   <div id="page">
<?php

$pag = "$_GET[pag]";
if($pag >= '1'){
 $pag = $pag;
}else{
 $pag = '1';
}

$maximo = '5'; //RESULTADOS POR PÁGINA
$inicio = ($pag * $maximo) - $maximo;

$topico = $_GET['cat'];

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
						WHERE categoria = '$topico'
						ORDER BY data DESC
						LIMIT $inicio, $maximo")
            or die(mysql_error());
if(@mysql_num_rows($noticias) <= '0'){
   echo "$info_not<br /><br />";	
}else{
	
	$numero = '0';
	
     while($res_noticias=mysql_fetch_array($noticias)){

		$id = $res_noticias[0];
		$thumb = $res_noticias[1];
		$titulo = $res_noticias[2];
		$texto = $res_noticias[3];
		$categoria = $res_noticias[4];
		$data = $res_noticias[5];
		$autor = $res_noticias[6];
		$valor_real = $res_noticias[7];
		$valor_pagseguro = $res_noticias[8];
		$visitas = $res_noticias[9];
		$numero++;
		
	 $pega_autor = mysql_query("SELECT nome FROM up_users WHERE id = '$autor'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($pega_autor) <= '0') echo 'Erro ao lesecionar o usuario';
	 else{
		 
		 while($res_autor=mysql_fetch_array($pega_autor)){
			 
			 $autor_do_post = $res_autor[0];
		
		
?>
<div class="categoria">
<a href="index.php?topicos=nav/single&amp;topico=<?php echo $id; ?>">
     <h1><?php echo $titulo;?></h1>
     
     <span class="info">Data: <?php echo date('d/m/Y - H:m', strtotime($data)); ?> | Autor: <?php echo $autor_do_post; ?> | Categoria: <?php echo $categoria; ?> | Visitas: <?php echo $visitas; ?></span>
     
       <img src="uploads/<?php echo $categoria; ?>/<?php echo $thumb; ?>" class="alinleft" alt="<?php echo $titulo; ?>" width="100"/>
          
      <p class="categoria_p"><?php echo strip_tags(trim(str_truncate($texto, 140, $rep))); ?></p>
</a>
</div>
<?php
 }
}
?>
<?php
 }
}
?>
<div class="paginator">
<?php

//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
$sql_res = mysql_query("SELECT * FROM up_posts WHERE categoria = '$topico'");
$total = mysql_num_rows($sql_res);

$paginas = ceil($total/$maximo);
$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

echo "<a href=\"index.php?topicos=nav/categoria&amp;cat=$categoria&amp;pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

for ($i = $pag-$links; $i <= $pag-1; $i++){
if ($i <= 0){
}else{
echo"<a href=\"index.php?topicos=nav/categoria&amp;cat=$categoria&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";


}
}echo "$pag &nbsp;&nbsp;&nbsp;";

for($i = $pag +1; $i <= $pag+$links; $i++){
if($i > $paginas){
}else{
echo "<a href=\"index.php?topicos=nav/categoria&amp;cat=$categoria&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
}
}
echo "<a href=\"index.php?topicos=nav/categoria&amp;cat=$categoria&amp;pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
?>
</div>

   </div><!--page-->
   
</div><!--page_content-->
<?php
$add_visita = $visitas + 1;
$up_visitas = mysql_query("UPDATE up_posts SET visitas = '$add_visita' WHERE id = '$topico'")
               or die(mysql_error());

?>