<?php $thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php include("inc/head.php");?>
<style>
#holding {
	background-image: url(/media/uar_under_construction.svg);
	background-size: 100% auto;
	background-repeat: no-repeat;
	background-position: center;
	width: 80%;
	max-width: 700px;
	margin: auto;
	height: 100vh
}
</style>
</head>
<body >
<?php  while ( have_posts() ) : the_post(); ?>
<div id="holding"> </div>
<?php endwhile;?>
<footer> </footer>
</body>
</html>