<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
<?php if( $_SESSION['imagestate'] == "off"){?>
	<style>
.wp-block-image{
	display: none;
}

	</style>
<?php }?>
