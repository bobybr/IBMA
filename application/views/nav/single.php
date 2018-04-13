<?php
if ($dados_single == 1) {
    foreach ($single->result() as $row) {
        ?> 

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $row->titulo; ?>
                    <small> <a href="#"></a>
                    </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li class="active"><?php echo $row->categoria; ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Postado em <?php echo date('d/m/Y - H:m', strtotime($row->data)); ?> Por  <?php echo $row->autor; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo base_url("uploads/$row->categoria/$row->thumb"); ?>" alt="<?php echo $row->titulo; ?>">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $row->titulo; ?></p>
                <?php echo $row->texto; ?>

                <?php if ($row->categoria == 'produtos') {
                    ?> 
                
                <span class="price">
                    <sup>R$</sup>
                <?php echo str_replace(',', "<sup> ", $row->valor_real); ?>
                </sup>
                       
                </span>
                    
                    <form target="pagseguro" method="post"action="https://pagseguro.uol.com.br/checkout/checkout.jhtml" class="pag_form">
                        <input type="hidden" name="email_cobranca" value="boby.vendas@gmail.com" />
                        <input type="hidden" name="tipo" value="CBR" />
                        <input type="hidden" name="moeda" value="BRL" />
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>" />
                        <input type="hidden" name="item_descr" value="<?php echo $row->titulo; ?>" />
                        <input type="hidden" name="item_quant" value="1" />
                        <input type="hidden" name="item_valor" value="<?php echo $row->valor_real; ?>" />
                        <input type="hidden" name="frete" value="0" />
                        <input type="hidden" name="peso" value="0" />
                        <input type="image" name="submit" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/209x48-comprar-preto-assina.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" class="btn_pag" />
                        <span class="compre_aqui">Para comprar clique no botão da PagSeguro</span>
                    </form>

                    <?php
                } else {
                    
                }
                ?>       
                <hr>


                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php $this->load->view('sidebars/sidebar');?>
            
            <!--insere sidebar -->

        </div>
        <!-- /.row -->


        <?php
    }
} else {
    echo $dados_single;
}
?>
