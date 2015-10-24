<?php
$topicheading=$_GET['id'];
require ('wp-blog-header.php');
?>



<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title>Aasya Health Foundation</title>

	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
	<!-- CORE JQUERY -->
	<script src="assets/js/jquery-1.11.1.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.js"></script>
	<!-- EASING SCROLL SCRIPTS PLUGIN -->
	<script src="assets/js/vegas/jquery.vegas.min.js"></script>
	<!-- VEGAS SLIDESHOW SCRIPTS -->
	<script src="assets/js/jquery.easing.min.js"></script>
	<!-- FANCYBOX PLUGIN -->
	<script src="assets/js/source/jquery.fancybox.js"></script>
	<!-- ISOTOPE SCRIPTS -->
	<script src="assets/js/jquery.isotope.js"></script>
	<!-- VIEWPORT ANIMATION SCRIPTS   -->
	<script src="assets/js/appear.min.js"></script>
	<script src="assets/js/animations.min.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>


<!-- BOOTSTRAP CORE CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- ION ICONS STYLES -->
<link href="assets/css/ionicons.css" rel="stylesheet" />
<!-- FONT AWESOME ICONS STYLES -->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- FANCYBOX POPUP STYLES -->
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<!-- STYLES FOR VIEWPORT ANIMATION -->
<link href="assets/css/animations.min.css" rel="stylesheet" />
<!-- CUSTOM CSS -->
<link href="assets/css/style-green.css" rel="stylesheet" />
<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body data-spy="scroll" data-target="#menu-section">
	<!--MENU SECTION START-->
	<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">

					Aasya Health Foundation

				</a>
			</div>
		</div>
	</div>

	<!--GRID SECTION START-->
	<section id="contact" >
		<div class="container">
			<div class="row text-center header animate-in" data-anim-type="fade-in-up">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<h3><?php echo $topicheading ?></h3>
					<hr />

				</div>
			</div>
			<div class="row animate-in" data-anim-type="fade-in-up">
			<?php 
			$args = array('post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date", 'category_name'=> $topicheading);
			$postslist = get_posts( $args );
			//if($postslist){

			foreach ($postslist as $post) :  setup_postdata($post);
			?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="contact-wrapper">
				<h3><?php the_title(); ?></h3>
				<br><br>
				<p><?php echo get_the_content('Read more')?></p>
				<br><br>
				<h4><?php echo "Written By : "?> <?php the_author();?></h4>
				<h5><?php echo "Written On: " ?> <?php the_time('l, F jS, Y')?></h5><br><br>
			</div>
			</div>
			<?php endforeach;
	//	}
			/*else{
				echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="contact-wrapper">
					<h2>No articles yet.Come back soon!!!</h2>
					</div>
					</div>';
			}*/
			?>
			
			</div>
         

		</div>
	</section>

</body>
</html>