<?php $thismeta = get_post_meta(1320); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php include("inc/head.php");?>

</head>
<body >
<?php include("inc/header.php");?>
<?php  //while ( have_posts() ) : the_post(); ?>
<div class="xcontainer-fluid position-relative">
<?php //the_content(1320);
//get post_content for page
$post_id = 1320;
$post = get_post($post_id);
$blocks = parse_blocks($post->post_content);


foreach ($blocks as $block) {

	echo render_block($block);
}



?>
</div>
<?php //endwhile;?>
<footer>
<?php include("inc/footer.php");?>
</footer>
<script>
jQuery(document).ready(function() {
  jQuery(".twitter-tl").addClass("d-none");

});

</script>
</body>
</html
