<?php 
  if (wp_is_mobile()) {
        $ppp= 5;
      }else{
        $ppp= 10;
      }

$thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<?php include("inc/head.php");?>
	</head>
	<body >
    <?php include("inc/header.php");?>
    <div class="container-fluid position-relative">
      <?php
$tag = get_queried_object();
 //print_r($tag) ;?>
    </div>
    <div class="container-fluid post-list">
      <div class="container post-list-head">
        <div class="title">
          <h3>Tag: <?php echo $tag->name;?></h3>
        </div>
      </div>
      <?php


  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array (
  	'post_type' => 'any',
  	'post_status'            => array( 'publish' ),
  	'order'                  => 'ASC',
	'posts_per_page' => $ppp,
	'suppress_filters' => true,
    'paged' => $paged,
    'tax_query' => array(
        array (
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array($tag->slug),
        )
    ),
  );

  // The Query
  $tag = new WP_Query( $args );

  if ( $tag->have_posts() ) {?>
      <div class="container">
        <?php	while ( $tag->have_posts() ) {
  		$tag->the_post();?>
        <?php $thispmeta = get_post_meta($post->ID); ?>
        <div class="row result-row ml-0 mr-0">
          <div class="col-8 deets">
            <h3><a href="<?php the_permalink();?>">
              <?php the_title(); ?>
              </a></h3>
            <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
            <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
            <?php the_excerpt(); ?>
          </div>
          <div class="col-4 inf">
            <?php  $post_type = get_post_type_object($post->post_type);?>
            <h4><?php echo $post_type->labels->singular_name;?></h4>
            <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
        </div>
        <?php	} ?>
      </div>
      <?php  } else {
  	// no posts found
  }?>
      <div class="paging">
        <?php wp_pagenavi( array( 'query' => $tag ) );?>
      </div>
      <?php wp_reset_postdata();
  ?>
    </div>
    <footer>
      <?php include("inc/footer.php");?>
    </footer>
</body>
</html>
