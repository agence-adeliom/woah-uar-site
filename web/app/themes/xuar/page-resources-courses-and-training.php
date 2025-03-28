<?php

        $tax_query[] =  array(
                'taxonomy' => 'event-type',
                'field' => 'slug',
                'terms' => 'course'
            );
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
<?php  //while ( have_posts() ) : the_post(); ?>

<?php the_content();?>
<div class="container-fluid post-list">
  <div class="container post-list-head p-0">
    <div id="list" class="title">
      <h3>Please select resource type</h3>
    </div>
    <div class="buttons row no-gutters">
      <div class="col-md col-6"><a href="/resources-toolbox#list"><span>Toolbox</span></a></div>
      <div class="col-md col-6"><a href="/resources-publications-and-documents#list"><span>Publications and Documents</span></a></div>
      <div class="col-md col-6"><a class="active" href="/resources-courses-and-training#list"><span>Courses and Training</span></a></div>
      <div class="col-md col-6"><a href="/resources-media-library#list"><span>Media Library</span></a></div>
      <div class="col-md col-6"><a href="/resources-uar-best-practice#list"><span>UAR Best Practice</span></a></div>
    </div>
  </div>

<?php
  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array (
  	'post_type'              => array( 'events-courses' ),
  	'post_status'            => array( 'publish' ),
  	//'nopaging'               => true,
  'meta_key' => 'featured_post',
    'orderby' => 'meta_value_num',
  	'order'                  => 'DESC',
  	'orderby'                => 'featured_post',
  'posts_per_page' => $ppp,
    'paged' => $paged,
    'tax_query' => $tax_query,
    /*  'orderby'   => 'order_clause',
  'meta_query' => array(
       'order_clause' => array(
            'key' => 'featured_post',
            'value' => '1',
            'type' => 'NUMERIC' // unless the field is not a number
)),*/
  );

  // The Query
  $courses = new WP_Query( $args );

  // The Loop
  if ( $courses->have_posts() ) {?>

<div class="container p-0">
  <?php	while ( $courses->have_posts() ) {
  		$courses->the_post();?>
      <?php $thispmeta = get_post_meta($post->ID); ?>

<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
    <h5 class="c-date d-none">Event Date: <?php echo date("d/m/Y", $thispmeta['event_date'][0])?></h5>

    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php the_excerpt(); ?>
  </div>
  <div class="col-12 col-md-4 inf">
    <h4>Categories</h4>
    <?php $progs = get_the_terms( $post->ID, 'program-strategy');
    $pcount = count($progs);
    $pi =0; ?>
  <?php  if($progs){?>
    <p class="mb-0"><strong>Programs and Strategies</strong><p class="t-list">
    <?php  foreach ($progs as $prog) {
        //echo $prog->name.' ';
        echo '<a href="' . esc_url( get_term_link($prog->term_id) ) . '">' . $prog->name . '</a>';
  $pi++ ;
        if($pi < $pcount){
          echo ', ';
        }
   }?>
   </p>
<?php }?>

<?php $progs = get_the_terms( $post->ID, 'subject');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>Subject</strong><p class="t-list">
<?php  foreach ($progs as $prog) {
    //echo $prog->name.' ';
    echo '<a href="' . esc_url( get_term_link($prog->term_id) ) . '">' . $prog->name . '</a>';
$pi++ ;
    if($pi < $pcount){
      echo ', ';
    }
}?>
</p>
<?php }?>


    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?>
  </div>
</div>




<?php	} ?>
</div>
<?php  } else {
  	// no posts found
  }?>

<div class="paging">
 <?php wp_pagenavi( array( 'query' => $courses ) );?></div>

  <?php wp_reset_postdata();
  ?>





</div>

<?php //endwhile;?>
<footer>
<?php include("inc/footer.php");?>
</footer>
<script>

jQuery(function () {
    jQuery('.wp-pagenavi a').attr('href', function (_, oldHref) {
        oldHref =  oldHref.replace(/\#(.*)/g, "#page1");
         if(oldHref.indexOf('#') == -1)
            oldHref += "#list";
        return oldHref;
    });
});
</script>
</body>
</html
