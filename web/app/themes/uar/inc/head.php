<meta charset="<?php bloginfo( 'charset' ); ?>">
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );	?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php include("meta-og.php");?>
<?php wp_head(); ?>
<?php if(isset($_SESSION['imagestate'])){?>
<?php if( $_SESSION['imagestate'] == "off"){?>
<style>
.wp-block-image, .wp-block-getwid-image-box__image-container, .wp-block-getwid-media-text-slider-slide-content__image, .visualizer-front-container {
	display: none!important;
}
</style>
<?php }?>
<?php }?>
