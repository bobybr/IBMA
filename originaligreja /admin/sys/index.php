<? 
	define('ID_MODULO',0,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');


?>
<meta http-equiv="refresh" content="120; url=index.php" />
 
 

<?
 
	include('../includes/Mensagem.php');
?>








<!-- INÍCIO DO GRÁFICO -->          
        		<div class="container med left" id="graphs">
                	<div class="conthead">
                		<h2>Gráfico de visitas</h2>
                    </div>
<!-- MENUS DOS GRAFICOS -->                    
                	<div class="contentbox">
                    	<ul class="tablinks tabfade">
                        	<li class="nomar"><a href="#graphs-1">Barras</a></li>
                            <li><a href="#graphs-4">Área</a></li>
                        </ul>
<!-- FIM MENU GRAFICOS -->                       
<!-- INICIANDO TABELAS DE GRAFICOS -->
                    	<div class="tabcontent" id="graphs-1">
                            <table style="display: none; height: 250px" class="bar" width="52%">
                                <caption>Visitas ao site nos últimos 3 dias</caption>
                                <thead>
                                    <tr>
                                        <td></td>
<?
$hoje = time(); 
$ontem = $hoje - (24*3600); 
$anteontem = $hoje - (48*3600);
?>
										<th scope="col"> <span  style="color:green; font-weight:bold; text-decoration:underline;"><?echo date('d/m/Y', $hoje); ?> - Hoje</span></th>
										<th scope="col"> <?echo date('d/m/Y', $ontem); ?></th>
										<th scope="col"> <?echo date('d/m/Y', $anteontem);?></th>
										
                                        
										
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Visitas</th>
<?
	$i=0;
	$SQL = "SELECT * FROM visitantes ORDER BY id DESC";
	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

                                        <td><?=$linha['contador'];?></td>
										
<?
	}
?>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                   
                    
                   		<div class="tabcontent" id="graphs-4">
                            <table style="display: none; height: 250px" class="area" width="52%">
                               <caption>Visitas ao site nos últimos 3 dias</caption>
                                <thead>
                                    <tr>
                                        <td></td>
<?
$hoje = time(); 
$ontem = $hoje - (24*3600); 
$anteontem = $hoje - (48*3600);
?>
										<th scope="col"> <span  style="color:green; font-weight:bold; text-decoration:underline;"><?echo date('d/m/Y', $hoje); ?> - Hoje</span></th>
										<th scope="col"> <?echo date('d/m/Y', $ontem); ?></th>
										<th scope="col"> <?echo date('d/m/Y', $anteontem);?></th>
										
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Visitas</th>
<?
	$i=0;
	$SQL = "SELECT * FROM visitantes ORDER BY id DESC";
	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>	

                                        <td><?=$linha['contador'];?></td>
										
<?
	}
?>
                                    </tr>
                                </tbody>
                            </table>
                   		</div>
<!-- FIM DO GRÁFICO -->  
                      
                    </div>
                </div>
                
<!-- INÍCIO DAS ESTATÍSTICAS -->               
                <div class="container sml right">
                	<div class="conthead">
                		<h2>Estatísticas</h2>
                    </div>
                	<div class="contentbox">
                    	<ul class="summarystats">
							
                        	<li>
							<? $sql = "SELECT * FROM user";
							$query = mysql_query($sql) or die(mysql_error());
							$total = mysql_num_rows($query); ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Membros Cadastrados</p>    <p class="statview"><a href="user.php" title="view">ver</a></p>
                            </li>
							
							<li>
							<? $sql = "SELECT * FROM tboracao";
								$query = mysql_query($sql) or die(mysql_error());
								$total = mysql_num_rows($query);  ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Pedidos de oração</p>  <p class="statview"><a href="pedidos.php">ver</a></p>
                            </li>
							
							<li>
							<? $sql = "SELECT * FROM tbmural";
								$query = mysql_query($sql) or die(mysql_error());
								$total = mysql_num_rows($query);  ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Comentários no Mural</p>  <p class="statview"><a href="mural.php">ver</a></p>
                            </li>
							
							<li>
							<? $sql = "SELECT * FROM tbgalerias_fotos";
								$query = mysql_query($sql) or die(mysql_error());
								$total = mysql_num_rows($query);  ?>
                            	<p class="statcount"><?echo $total;?></p> <p>Fotos cadastradas</p>  <p class="statview"><a href="galeria.php">ver</a></p>
                            </li>
							
							<li>
							<? $sql = "SELECT * FROM user";
							$query = mysql_query($sql) or die(mysql_error());
							$total = mysql_num_rows($query); ?>
                            	<p class="statcount"><?echo $total;?></p> <p>E-mails cadastrados</p>    <p class="statview"><a href="newsletter.php" title="view">ver</a></p>
                            </li>
                    
					</ul>

                        
                    </div>
                </div>
<!-- FIM DAS ESTATÍSTICAS -->  
               
                <!-- LIMPAR --> <div style="clear: both"></div>
              
			  
			  
			  
			  

 
<? include('../includes/Rodape.php'); ?>