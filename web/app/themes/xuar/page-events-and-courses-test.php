<?php
// get event type///////////////////////
if (isset($_GET['type'])){

  //events query/////////////////////
if ($_GET['type'] == 'event'){
  echo 'Events';
  /////////////////////
  if (isset($_GET['future'])){
      $flink = 'active';
      echo 'Future';
      //////
      $args = array (
        'post_type'              => array( 'events-courses' ),
        'post_status'            => array( 'publish' ),
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'paged' => $paged,
        'tax_query' => array(
          'relation' => 'AND',
                      array (
                          'taxonomy' => 'event-type',
                          'field' => 'name',
                          'terms' => 'event',
                      ),
                      array (
                          'taxonomy' => 'event-status',
                          'field' => 'name',
                          'terms' => 'future',
                      ),
                  )
      );
      /////////////////
  }
  /////////////////////
  if (isset($_GET['past'])){
      $plink = 'active';
      echo 'Past';
      //////
      $args = array (
        'post_type'              => array( 'events-courses' ),
        'post_status'            => array( 'publish' ),
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'paged' => $paged,
        'tax_query' => array(
          'relation' => 'AND',
                      array (
                          'taxonomy' => 'event-type',
                          'field' => 'name',
                          'terms' => 'event',
                      ),
                      array (
                          'taxonomy' => 'event-status',
                          'field' => 'name',
                          'terms' => 'past',
                      ),
                  )
      );
      /////////////////
  }
///////////////////////
  }
  // course query////////////////////
  if ($_GET['type'] == 'course'){
    echo 'Courses';
    $clink = 'active';
    //////
    $args = array (
      'post_type'              => array( 'events-courses' ),
      'post_status'            => array( 'publish' ),
      'meta_key' => 'event_date',
      'orderby' => 'date',
      'order' => 'ASC',
      'posts_per_page' => -1,
      'paged' => $paged,
      'tax_query' => array(

                    array (
                        'taxonomy' => 'event-type',
                        'field' => 'name',
                        'terms' => 'course',
                    ),

                )
    );
    /////////////////
    }
}
///////////////
            /*  $meta_query[]  = array(
                  'relation'      => 'AND',
                  array(
                      'key'       => 'event_date',
                      'value' => current_time( 'timestamp' ),
                          'compare' => '<=',
                          'type' => 'NUMERIC',
                  )
              );*/
  ////////////////

$thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php include("inc/head.php");?>

</head>
<body >
<?php include("inc/header.php");?>
<?php  //while ( have_posts() ) : the_post(); ?>
<div class="xcontainer-fluid position-relative">

<?php the_content();?>
</div>
<div class="container-fluid post-list">
  <div class="container post-list-head p-0">
    <div id="list" class="title">
      <h3>Select category</h3>
    </div>
    <div class="buttons row no-gutters">
      <div class="col-md col-6 d-none"><a class="<?php if (isset($_GET['all'])){?>active<?php }?>" href="<?php echo get_the_permalink()?>?all=yes#list"><span>View all</span></a></div>
      <div class="col-md col-6"><a class=" <?php if (isset($flink)){?>active<?php }?>"href="<?php echo get_the_permalink()?>?type=event&future=yes#list"><span>Events</span></a></div>
      <div class="col-md col-6"><a class=" <?php if (isset($plink)){?>active<?php }?>"href="<?php echo get_the_permalink()?>?type=event&past=yes#list"><span>Past Events</span></a></div>
      <div class="col-md col-6"><a class=" <?php if (isset($clink)){?>active<?php }?>" href="<?php echo get_the_permalink()?>?type=course#list "><span>Courses</span></a></div>

    </div>
  </div>

<?php
  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

  // The Query
  $events = new WP_Query( $args );

  // The Loop
  if ( $events->have_posts() ) {?>

<div class="container p-0">
  <?php	while ( $events->have_posts() ) {
  		$events->the_post();?>
      <?php $thispmeta = get_post_meta($post->ID); ?>

<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a><?php //echo $thispmeta['featured_post'][0]?></a></h3>
    <?php if($thispmeta['event_date'][0]!='0'){?><h5 class="c-date">Event Date: <?php echo date("d/m/Y", $thispmeta['event_date'][0])?></h5><?php }?>
    <?php if(isset($thispmeta['produced_by'][0])){?><h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0] ?></h5><?php }?>
    <?php the_excerpt(); ?>
  </div>
  <div class="col-12 col-md-4 inf">
    <?php $cats = get_the_terms( $post->ID, 'event-type');
    $pcount = count($cats);
    $pi =0; ?>
  <?php  if($cats){?>
    <h4 class="event-cat"><strong>Category</strong>
    <?php  foreach ($cats as $cat) {
        //echo $prog->name.' ';
        echo '<a href="' . esc_url( get_term_link($cat->term_id) ) . '">' . $cat->name . '</a>';
  $pi++ ;
        if($pi < $pcount){
          echo ', ';
        }
   }?>
 </h4>
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
 <?php wp_pagenavi( array( 'query' => $events ) );?></div>

  <?php wp_reset_postdata();  ?>
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
