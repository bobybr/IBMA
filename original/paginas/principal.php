<script type="text/javascript" src="<?=utf8_decode($dadosconfig['url']);?>/js/destaque/js/s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 3000
        });
    });
</script>



<!-- CHAMADA DAS FESTAS E SHOWS -->
<script type="text/javascript">

  $(document).ready(function() {
        
        //options( 1 - ON , 0 - OFF)
        var auto_slide = 1;
            var hover_pause = 1;
        var key_slide = 1;
        
        //speed of auto slide(
        var auto_slide_seconds = 5000;
        /* IMPORTANT: i know the variable is called ...seconds but it's 
        in milliseconds ( multiplied with 1000) '*/
        
        /*move he last list item before the first item. The purpose of this is 
        if the user clicks to slide left he will be able to see the last item.*/
        $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
        
        //check if auto sliding is enabled
        if(auto_slide == 1){
            /*set the interval (loop) to call function slide with option 'right' 
            and set the interval time to the variable we declared previously */
            var timer = setInterval('slide("right")', auto_slide_seconds); 
            
            /*and change the value of our hidden field that hold info about
            the interval, setting it to the number of milliseconds we declared previously*/
            $('#hidden_auto_slide_seconds').val(auto_slide_seconds);
        }
  
        //check if hover pause is enabled
        if(hover_pause == 1){
            //when hovered over the list 
            $('#carousel_ul').hover(function(){
                //stop the interval
                clearInterval(timer)
            },function(){
                //and when mouseout start it again
                timer = setInterval('slide("right")', auto_slide_seconds); 
            });
  
        }
  
        //check if key sliding is enabled
        if(key_slide == 1){
            
            //binding keypress function
            $(document).bind('keypress', function(e) {
                //keyCode for left arrow is 37 and for right it's 39 '
                if(e.keyCode==37){
                        //initialize the slide to left function
                        slide('left');
                }else if(e.keyCode==39){
                        //initialize the slide to right function
                        slide('right');
                }
            });

        }
        
        
  });

//FUNCTIONS BELLOW

//slide function  
function slide(where){
    
            //get the item width
            var item_width = $('#carousel_ul li').outerWidth() + 10;
            
            /* using a if statement and the where variable check 
            we will check where the user wants to slide (left or right)*/
            if(where == 'left'){
                //...calculating the new left indent of the unordered list (ul) for left sliding
                var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
            }else{
                //...calculating the new left indent of the unordered list (ul) for right sliding
                var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;
            
            }
            
            
            //make the sliding effect using jQuery's animate function... '
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
                
                /* when the animation finishes use the if statement again, and make an ilussion
                of infinity by changing place of last or first item*/
                if(where == 'left'){
                    //...and if it slided to left we put the last item before the first item
                    $('#carousel_ul li:first').before($('#carousel_ul li:last'));
                }else{
                    //...and if it slided to right we put the first item after the last item
                    $('#carousel_ul li:last').after($('#carousel_ul li:first')); 
                }
                
                //...and then just get back the default left indent
                $('#carousel_ul').css({'left' : '-210px'});
            });
            
            
            
             
           
}
  
</script>
	
<div id='colunameio'>
	
	
	<!-- destaque slide chamadas -->	
    <div id="slider">

        <ul id="sliderContent">
	
		<?
		$i=0;
		$SQL = "SELECT * FROM tbdestaque ORDER BY id_destaque DESC";
		$Lista = new Consulta($SQL,10,$PGATUAL);
		while ($linha = db_lista($Lista->consulta)) { $i++;
		?>
            <li class="sliderImage" align="center">
                <a href="<?=$linha['destino'];?>"><img src="<?=utf8_decode($dadosconfig['url']);?>/arquivos/destaque/<?=$linha['imagem'];?>" alt="<?=$linha['descricao'];?>" width="410" height="290" /></a>
                <span class="top"><strong>Destaque: <?=utf8_decode($linha['titulo']);?></strong><br /><?=utf8_decode($linha['descricao']);?></span>
            </li>

				<?
				}
				?>
				
            <div class="clear sliderImage"></div>
        </ul>
    </div>
	
	<!-- destaques ao lado do slide -->	
	<div id='destaques'>
<?
                    $i=0;
					
					$SQL = "
						SELECT
							tbnoticias.*,
							tbnoticias_categorias.*
						FROM
							(SELECT * FROM tbnoticias ORDER BY data DESC) as tbnoticias
							INNER JOIN tbnoticias_categorias ON (tbnoticias.id_categoria = tbnoticias_categorias.id_categoria)
						GROUP BY
							tbnoticias.id_categoria
						ORDER BY 
							tbnoticias.data DESC
						LIMIT 3;
					";
                    $consulta = db_consulta($SQL);
                    while ($linha = db_lista($consulta)) { $i++;
                ?>
                    <div<? if ($i==1) echo ' class="chamadapri"'; else echo ' class="chamadasec"'; ?>>
                        <h2><a href='<?=utf8_decode($dadosconfig['url']);?>/noticias/<?=$linha['id_categoria'];?>/<?=retiraAcentos(nomeArquivo($linha['categoria']));?>.html'><?=$linha['categoria'];?></a></h2>
                        <h1><a href="<?=utf8_decode($dadosconfig['url']);?>/noticias_ver/<?=$linha['id_noticia'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html">
							<?echo substr(utf8_decode($linha['titulo']),0,38); 
							if (strlen($linha['titulo'])>38) echo '...';?>
						</h1>
						<p><?
							echo substr(utf8_decode($linha['subtitulo']),0,90); 
							if (strlen($linha['subtitulo'])>90) echo '...';
						?></a></p>
                    </div>
                <?
					}
				?>

	</div>
	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>

 
<!-- chamada das festas e shows -->	
<div style="margin:40px 0 0 -10px;">
<span class="galeriahometit">Galerias</span>
<div id='carousel_container'>
  <div id='left_scroll'><a href='javascript:slide("left");'><img src='<?=utf8_decode($dadosconfig['url']);?>/js/festas_principal/left.png' /></a></div>
    <div id='carousel_inner'>
        <ul id='carousel_ul'>
<?
$i=0;
$SQL = "SELECT * FROM tbgalerias ORDER BY id_galeria DESC";
$Lista = new Consulta($SQL,6,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
            <li class='imglaranja'><a href='<?=utf8_decode($dadosconfig['url']);?>/galerias_ver/<?=$linha['id_galeria'];?>'><img src='<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$linha['codigo'];?>/capa.jpg' width="200px" /></a></li>
<?
}
?>
		</ul>
    </div>
  <div id='right_scroll'><a href='javascript:slide("right");'><img src='<?=utf8_decode($dadosconfig['url']);?>/js/festas_principal/right.png' /></a></div>
  <input type='hidden' id='hidden_auto_slide_seconds' value=0 />
</div>
</div>

       
	
	<div id='colunameio'>
	<div class='colunad'>
	<h2><a href='#'>Loja virtual</a></h2> 
	<p class="imghomeloja"><a href='<?=utf8_decode($dadosconfig['telefone1']);?>'target="_blank"><img src="<?=utf8_decode($dadosconfig['url']);?>/img/produto.jpg" width="150px" height="100px"/></a> </p>
	<p><a href='<?=utf8_decode($dadosconfig['telefone1']);?>'target="_blank">Bíblia Sagrada<br><br>De: R$ 65,00<br>Por: R$ 49,00<br><br>Frete grátis</a></p>
	<a id="comprarbt" href='<?=utf8_decode($dadosconfig['telefone1']);?>' target="_blank" alt="Comprar" title="Comprar" >Comprar</a>
	</div>
	
	<div class='colunad'>
	<br> 
	<p class="imghomeloja"><a href='<?=utf8_decode($dadosconfig['telefone2']);?>'target="_blank"><img src="<?=utf8_decode($dadosconfig['url']);?>/img/produto1.png" width="150px" height="100px"/></a> </p>
	<p><a href='<?=utf8_decode($dadosconfig['telefone2']);?>'target="_blank">Blusa Acampamento<br><br>De: R$ 29,00<br>Por: R$ 19,00<br><br>Promoção</a></p>
	<a id="comprarbt" href='<?=utf8_decode($dadosconfig['telefone2']);?>' target="_blank" alt="Comprar" title="Comprar" >Comprar</a>
	</div>
	
	<div class='colunad'>
	<h2><a href='#'>Culto ao Vivo</a></h2>
	<iframe width="322" height="240" src="http://cdn.livestream.com/embed/poderegloria?layout=4&amp;height=340&amp;width=560&amp;autoplay=false" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe>
	<span style="float:left; width:150px; margin:10px 0px 5px 0px;">
	</div>
	</div>
	<!-- Resetar formatação -->	
	<div class='limpar'></div>
	
	
	<!-- Central com 4 chamadas lado a lado -->	
	<div id='colunascentral2'>
	
	<!-- institucional -->	
	<div class='colunac2'>
	<h2><a href='<?=utf8_decode($dadosconfig['url']);?>/institucional/4'>Institucional</a></h2>
	<div class='imgverde'><a href='<?=utf8_decode($dadosconfig['url']);?>/institucional/4'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/logo.png" width="150px" height="100px"/></a></div>
 	</div>

	<!-- oração -->	
	<div class='colunac2'>
	<h2><a href='<?=utf8_decode($dadosconfig['url']);?>/pedidosdeoracao'>Pedido de Oração</a></h2>
	<div class='imgverde'><a href='<?=utf8_decode($dadosconfig['url']);?>/pedidosdeoracao'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/oracao.png" width="150px" height="100px"/></a></div>
 	</div>
	
	<!-- downloads -->	
	<div class='colunac2l'>
	<h2><a href='<?=utf8_decode($dadosconfig['url']);?>/downloads/0'>Downloads</a></h2>
	<div class='imglaranja'><a href='<?=utf8_decode($dadosconfig['url']);?>/downloads/0'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/downloads.png" width="150px" height="100px"/></a></div>
 	</div>

	<!-- mural de recados -->	
	<div class='colunac2l'>
	<h2><a href='<?=utf8_decode($dadosconfig['url']);?>/mural'>Mural de recados</a></h2>
	<div class='imglaranja'><a href='<?=utf8_decode($dadosconfig['url']);?>/mural'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/recados.png" width="150px" height="100px"/></a></div>
 	</div>
	
	<!-- liderança -->	
	<div class='colunac2l2'>
	<h2><a href='<?=utf8_decode($dadosconfig['url']);?>/lideranca'>Lideres</a></h2>
	<div class='img'><a href='<?=utf8_decode($dadosconfig['url']);?>/lideranca'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/lider.png" width="150px" height="100px"/></a></div>
 	</div>

	<!-- onde estamos -->	
	<div class='colunac2l2'>
	<h2><a href='<?=utf8_decode($dadosconfig['url']);?>/mural'>Onde estamos</a></h2>
	<div class='img'><a href='<?=utf8_decode($dadosconfig['url']);?>/institucional/2'><img src="<?=utf8_decode($dadosconfig['url']);?>/img/mapa.png" width="150px" height="100px"/></a></div>
 	</div>

	</div>
	
	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>
	
	
	<!-- Central com 3 chamadas em baixo e um float com mais 3 chamadas em baixo -->	
	<div id='colunascentral3'>
	<div class='colunascentral3a'>
	<span class="titverde">Departamentos</span>
<?
                    $i=0;
					
					$SQL = "
						SELECT
							tbdepartamentos.*,
							tbdepartamentos_categorias.*
						FROM
							(SELECT * FROM tbdepartamentos ORDER BY data DESC) as tbdepartamentos
							INNER JOIN tbdepartamentos_categorias ON (tbdepartamentos.id_categoria = tbdepartamentos_categorias.id_categoria)
						GROUP BY
							tbdepartamentos.id_categoria
						ORDER BY 
							tbdepartamentos.data DESC
						LIMIT 3;
					";
					

                    $consulta = db_consulta($SQL);
                    while ($linha = db_lista($consulta)) { $i++;
?>
 
	<div class='colunac3a'>
	<div class='imgverde'><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos_ver/<?=$linha['id_departamentos'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/departamentos/<?=$linha['codigo'];?>/capa.jpg&x=120&y=90&corta=1"/></a></div>
	<p><span class="categoriadep"><?=utf8_decode($linha['categoria']);?></span><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos_ver/<?=$linha['id_departamentos'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><?=utf8_decode($linha['titulo']);?>  </a></p>
	</div>
<?
}
?>
	</div>
	

	<div class='colunascentral3a'>
	<span class="titlaranja">Vídeos</span>
<?
$i=0;
$SQL = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM tbvideos ORDER BY id_video DESC";
$Lista = new Consulta($SQL,3,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
	<div class='colunac3b'>
	<a href="<?=utf8_decode($dadosconfig['url']);?>/videos_ver/<?=utf8_decode($linha['id_video']);?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><span class="playicon"><img src="<?=utf8_decode($dadosconfig['url']);?>/img/play_icone.png" /></span></a>
<?
$url = "http://www.youtube.com/watch?v=".utf8_decode($linha['video']);?><?
echo "<div class='imglaranja'><a href='".utf8_decode($dadosconfig['url'])."/videos_ver/".utf8_decode($linha['id_video'])."/".retiraAcentos(nomeArquivo($linha['titulo'])).".html'><img src='".video_imagem($url)."' width='120px' height='90px'/></a></div>";
?>
	<p><span class="categoriadep"><?=utf8_decode($linha['data1']);?></span><a href='<?=utf8_decode($dadosconfig['url']);?>/videos_ver/<?=utf8_decode($linha['id_video']);?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html'><?=utf8_decode($linha['titulo']);?>.  </a></p>
	</div>
<?
}
?>
	</div>
	
	
	
	<div class='colunascentral3b'>
	<span class="titazul">Agenda</span>

<?
$i=0;
$SQL = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM tbagenda ORDER BY id_agenda DESC";
$Lista = new Consulta($SQL,3,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
 
	<div class='colunac3c'>
	
	<? if (strlen($linha['imagem'])>0)  { ?>  
        	<div class='img'><a href="<?=utf8_decode($dadosconfig['url']);?>/agenda_ver/<?=$linha['id_agenda'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/agenda/<?=$linha['imagem'];?>&x=120&y=90&corta=1"/></a></div>
    <? } else { ?> <div class='img'><a href="<?=utf8_decode($dadosconfig['url']);?>/agenda_ver/<?=$linha['id_agenda'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=img/sem_foto.png&x=120&y=90&corta=1"/></a></div> <? } ?>
	
	<p><span class="categoriadep"><?=$linha['data1'];?></span><a href='<?=utf8_decode($dadosconfig['url']);?>/agenda_ver/<?=$linha['id_agenda'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html'><?=utf8_decode($linha['titulo']);?></a>  </p>
	</div>
<?
}
?>
	</div>
	</div>
  
</div>
