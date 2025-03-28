<?php $thismeta = get_post_meta(1320); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<?php include("inc/head.php");?>
	</head>
	<body >
    <?php include("inc/header.php");?>
    <div class="xcontainer-fluid position-relative">
      <?php $post_id = 1320;
$post = get_post($post_id);
$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		echo render_block($block);
	}
?>
    </div>
    <footer>
      <?php include("inc/footer.php");?>
    </footer>
    <script>
jQuery(document).ready(function() {
	jQuery(".twitter-tl").addClass("d-none");
});
</script>
</body>
</html>
