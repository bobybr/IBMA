
<!-- inicio primeriro bloco carosel -->    
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <?php
        if ($dados_novidade1 == 1) {
            $ativo = 1;
            foreach ($novidades1->result() as $row) {
                $active = '';
                if ($dados_novidade1 == $ativo) {
                    $ativo = 0;
                    $active = 'active';
                }
                ?>
                <div class="item <?php echo $active ?>">
                    <center>
                        <img src="uploads/<?php echo $row->categoria; ?>/<?php echo $row->thumb; ?>" width="1200" height="250" alt="<?php echo $row->titulo; ?>" class="img-rounded">
                    </center>
                    <div class="carousel-caption">
                        <h1><?php echo $row->titulo; ?></h1>
                        <p class="text-capitalize"> 
                            <?php echo character_limiter(strip_tags($row->texto), 70, '...'); ?>
                        </p>
                    </div>
                </div>
                <?php
            }
        } else {
            echo $dados_novidade1;
        }
        ?>
    </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
<!-- fim primeriro bloco carosel -->


<!-- inicio segundo bloco produtos e servicos -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Conheça nossos produtos e serviços
        </h1>
    </div>

    <?php
    if ($dados_produto == 1) {
        foreach ($produto->result() as $row) {
            ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-circle" width="30" height="30" src="uploads/<?php echo $row->categoria; ?>/<?php echo $row->thumb; ?>">
                        &nbsp;<?php echo $row->titulo; ?>
                            </img> 
                        
                    </div>
                    <div class="panel-body">
                        <p><?php echo  character_limiter(strip_tags($row->texto),120, '...'); ?></p>
                        <p><?php echo "R$: $row->valor_real "; ?></p>
                        <a href="single/post/<?php echo $row->id; ?>" class="btn btn-default">Leia Mais</a>
                    </div>
                </div>
            </div>

            <?php
        }
    } else {
        echo $dados_produto;
    }
    ?>
</div> 
<!-- fim segundo bloco produtos e servicos -->    
<!-- /.row -->

<!-- inicio blog -->
<div class="col-lg-8 row">
    <div class="col-lg-12">
        <h2 class="page-header">Nosso blog</h2>
    </div>
    
        <div class="col-md-6">
        <?php
            if ($dados_blog1 == 1) {
                foreach ($blog1->result() as $row1) {
                    ?>
        <!-- Blog Post Row -->
        <div class="row">
            
            <div class="col-md-4">
                <a href="single/post/<?php echo $row1->id; ?>">
                    <img class="img-circle img-responsive img-hover" src="uploads/<?php echo $row1->categoria; ?>/<?php echo $row1->thumb; ?>" alt="<?php //echo $row1->titulo; ?>">
                </a>
            </div>
            <div class="col-md-8">
                <h3>
                    <a href="single/post/<?php echo $row1->id; ?>"><?php echo $row1->titulo; ?></a>
                </h3>
                <p>Por <a href="single/post/<?php echo $row1->id; ?>"><?php echo $row1->autor; ?></a>
                </p>
                <p><?php echo character_limiter(strip_tags($row1->texto), 60, '...'); ?></p>
                        <a class="btn btn-primary" href="single/post/<?php echo $row1->id; ?>">Saiba mais <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>
        <?php
    }
} else {
    echo $dados_blog1;
}
?>

        </div>
        <div class="col-md-6">
            
          <?php
            if ($dados_blog2 == 1) {
                foreach ($blog2->result() as $row2) {
                    ?>
        <!-- Blog Post Row -->
        <div class="row">
            
            <div class="col-md-4">
                <a href="single/post/<?php echo $row2->id; ?>">
                    <img class="img-circle img-responsive img-hover" src="uploads/<?php echo $row2->categoria; ?>/<?php echo $row2->thumb; ?>" alt="<?php echo $row1->titulo; ?>">
                </a>
            </div>
            <div class="col-md-8">
                <h3>
                    <a href="single/post/<?php echo $row2->id; ?>"><?php echo $row2->titulo; ?></a>
                </h3>
                <p>Por <a href="single/post/<?php echo $row2->id; ?>"><?php echo $row2->autor; ?></a>
                </p>
                <p><?php echo character_limiter(strip_tags($row2->texto), 60, '...'); ?></p>
                        <a class="btn btn-primary" href="single/post/<?php echo $row2->id; ?>">Saiba mais <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>
        <?php
    }
} else {
    echo $dados_blog2;
}
?>
        </div>

        <!-- /.row -->

    </div>
    <!-- fim  do blog -->
    <!-- inicio das noticias -->
    <div class="col-lg-4 row">
        <div class="col-lg-12">
            <h2 class="page-header">Noticias</h2>
        </div>
        
        <!-- Blog Post Row -->
        <div class="row">
            
            <?php
        if ($dados_novidade2 == 1) {
            $ativo = 1;
            foreach ($novidades2->result() as $row) {
                ?>
                <div class="col-md-4">
                <a href="single/post/<?php echo $row->id; ?>">
                    <img class="img-responsive img-hover" src="uploads/<?php echo $row->categoria; ?>/<?php echo $row->thumb; ?>" alt="<?php echo $row->titulo; ?>">
                </a>
            </div>
            <div class="col-md-8">
                <h3>
                    <a href="single/post/<?php echo $row->id; ?>"><?php echo $row->titulo; ?></a>
                </h3>
                <p>Por <a href="single/post/<?php echo $row->id; ?>"><?php echo $row->autor; ?></a>
                </p>
                <p>  <?php echo character_limiter(strip_tags($row->texto), 70, '...'); ?></p>
                <a class="btn btn-info" href="single/post/<?php echo $row->id; ?>">Leia Mais <i class="fa fa-angle-right"></i></a>
            </div>
                <?php
            }
        } else {
            echo $dados_novidade2;
        }
        ?>

        </div>
            
           
        <!-- /.row -->

        <hr>
        
    </div>
    <!-- fim das noticias -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Modern Business Features</h2>
        </div>
        <div class="col-md-6">
            <p>The Modern Business template by Start Bootstrap includes:</p>
            <ul>
                <li><strong>Bootstrap v3.2.0</strong>
                </li>
                <li>jQuery v1.11.0</li>
                <li>Font Awesome v4.1.0</li>
                <li>Working PHP contact form with validation</li>
                <li>Unstyled page elements for easy customization</li>
                <li>17 HTML pages</li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="http://placehold.it/700x450" alt="">
        </div>
    </div>
    <!-- /.row -->

    

    







<?php //$this->load->view('sidebars/sidebar1'); ?>

