<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <?php
$produto = $this->M_sidebar->sidebar_produto($id);
foreach ($produto->result() as $pro) :
    ?>

    <?php if ($pro->categoria == 'produtos') {
        ?>
        <h2>Formas de pagamento</h2>
        <p></p>
        <center>
                <a href='https://pagseguro.uol.com.br' target='_blank'><img alt='Logotipos de meios de pagamento do PagSeguro' src='https://p.simg.uol.com.br/out/pagseguro/i/banners/pagamento/todos_animado_125_150.gif' title='Este site aceita pagamentos com Visa, MasterCard, Diners, American Express, Hipercard, Aura, Bradesco, Itaú, Banco do Brasil, Unibanco, Banrisul, saldo em conta PagSeguro e boleto.' border='0'></a>
            </center>
        <?php
    } else {
        
    }
    ?>
<?php endforeach; ?>

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h3>Categorias</h3>
        <div class="row">
            <div class="col-lg-12">
                <ul class="lead">
                    <?php
                    $categoria = $this->M_sidebar->sidebar_categoria();
                    foreach ($categoria->result() as $cat) :
                        ?>

                        <li><a href="<?php echo base_url() ?>categoria/view/<?php echo $cat->categoria; ?>"><?php echo str_replace('-'," ",$cat->categoria); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h3>+ Vistos</h3>
        <ul class="lead">
        <?php
$vistos = $this->M_sidebar->sidebar_vistos();
foreach ($vistos->result() as $vis) :
    ?>
        <li><a href="<?php echo base_url() ?>single/post/<?php echo $vis->id; ?>"><?php echo $vis->titulo; ?></a></li>

        <?php endforeach; ?>
    </ul>
    </div>

</div>



