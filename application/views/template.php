<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

               

                <title><?= $title ?></title>
                <!-- Bootstrap Core CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/responsive.css">
                
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

                <link rel="shortcut icon" href="favicon.ico" />
                <link rel="icon" href="favicon.ico" />
            </head>
            
          <body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header d-flex flex-row justify-content-end align-items-center">

		<!-- Logo -->
		<div class="logo_container mr-auto">
			<div class="logo">
				<a href="#"><span>z</span>zeta<span>.</span></a>
			</div>
		</div>

		<!-- Main Navigation -->
		<nav class="main_nav justify-self-end">
			<ul class="nav_items">
				<li class="active"><a href="#"><span>home</span></a></li>
				<li><a href="services.html"><span>services</span></a></li>
				<li><a href="elements.html"><span>elements</span></a></li>
				<li><a href="blog.html"><span>blog</span></a></li>
				<li><a href="contact.html"><span>contact</span></a></li>
			</ul>
		</nav>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<span class="hamburger_text">Menu</span>
			<span class="hamburger_icon"></span>
		</div>

	</header>

	<!-- Menu -->

	<div class="fs_menu_overlay"></div>
	<div class="fs_menu_container">
		<div class="fs_menu_shapes"><img src="images/menu_shapes.png" alt=""></div>
		<nav class="fs_menu_nav">
			<ul class="fs_menu_list">
				<li><a href="#"><span><span>H</span>Home</span></a></li>
				<li><a href="#"><span><span>S</span>Services</span></a></li>
				<li><a href="#"><span><span>E</span>Elements</span></a></li>
				<li><a href="#"><span><span>B</span>Blog</span></a></li>
				<li><a href="#"><span><span>C</span>Contact</span></a></li>
			</ul>
		</nav>
		<div class="fs_social_container d-flex flex-row justify-content-end align-items-center">
			<ul class="fs_social">
				<li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li>
				<li><a href="#"><i class="fab fa-facebook-f trans_300"></i></a></li>
				<li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li>
				<li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li>
				<li><a href="#"><i class="fab fa-behance trans_300"></i></a></li>
				<li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li>
			</ul>
		</div>
	</div>
                    <!-- conteudo geral -->
    
                    <!-- conteudo -->
                        <div >
                            <?php echo $contents ?>
                        </div>
                    
                    <!-- conteudo -->

          
                      <!-- Footer -->
                      	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row footer_content d-flex flex-sm-row flex-column align-items-center">
				<div class="col-sm-6 cr text-sm-left text-center">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                            Copyright &copy; IBMA <?php echo date('Y'); ?></script> Todos os direitos reservados<br> by <a href="http://www.headsolution.com.br" target="_blank">HS Sistemas</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
				<div class="col-sm-6 text-sm-right text-center">
					<div class="footer_social_container">
						<ul class="footer_social">
							<li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li>
							<li><a href="#"><i class="fab fa-facebook-f trans_300"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li>
							<li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li>
							<li><a href="#"><i class="fab fa-behance trans_300"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
 </div><!-- super_container -->
    

<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url(); ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>plugins/easing/easing.js"></script>
<script src="<?php echo base_url(); ?>js/custom.js"></script>
    
</body>

</html>