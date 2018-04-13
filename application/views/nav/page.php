
<?php
if ($dados_page == 1) {
    foreach ($page->result() as $row) {
        ?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo str_replace('-'," ", $row->pagina); ?>
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('home');?>">Home</a>
                    </li>
                    <li class="active"><?php echo str_replace('-'," ", $row->pagina); ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <p><?php echo $row->content;?></p>
            </div>
        </div>
        <!-- /.row -->

        <hr>

<?php
    }
} else {
    echo $dados_page;
}
?>
