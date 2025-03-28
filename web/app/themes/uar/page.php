<?php $thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<?php include("inc/head.php");?>
	</head>
	<body >
    <?php include("inc/header.php");?>
    <?php  while ( have_posts() ) : the_post(); ?>
    <div class="xcontainer-fluid position-relative">
      <?php the_content();?>
    </div>
    <?php endwhile;?>
    <footer>
      <?php include("inc/footer.php");?>
    </footer>
</body>
</html>
