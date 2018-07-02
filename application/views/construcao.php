<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
 $page = $this->M_header->pegar_config();
 
    foreach ($page->result() as $row) {
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="clients">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
					<h2>IBMA INFORMA:<span><img src='<?php echo base_url();?>arquivos/configuracoes/<?= $row->imagem ?> '></span></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<p>Igreja bastita mundial da alianca informa que nosso site encontra se em desenvolvimeto para conquistarmos mas uma ferramenta no evangelismo e conquista de vidas para Jesus  </p>
				</div>
				<div class="col-lg-6">
                                    <p>A IBMA esta localizada na rua das hortas com cultos Regulares as <br> quartas as 17:30 <br>sextas 17:30 <br> domingos as 18:30</p>
				</div>
			</div>

			

		</div>
	</div>
    </body>
</html>
   <?php
    }
?> 

