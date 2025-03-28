<?php
if (isset($_GET['type']))
    {
        $tax_query[] =  array(
                'taxonomy' => 'event-type',
                'field' => 'name',
                'terms' => $_GET['type']
            );
        if($_GET['type']=='course'){
          $clink = 'active';
        }
      }else{
        $_GET['all']='yes';
      }
    if (isset($_GET['future']))
        {
//////////////
$tax_query[] =  array(
        'taxonomy' => 'event-status',
        'field' => 'name',
        'terms' => 'future'
    );

          if($_GET['future']){
            $flink = 'active';
          }
        }
        if (isset($_GET['past']))
            {
///////////////
$tax_query[] =  array(
        'taxonomy' => 'event-status',
        'field' => 'name',
        'terms' => 'past'
    );
///////////////

              if($_GET['past']){
                $plink = 'active';
              }
            }
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
  $args = array (
  	'post_type'              => array( 'events-courses' ),
  	'post_status'            => array( 'publish' ),
    'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  	'order'                  => 'ASC',
  'posts_per_page' => $ppp,
    'paged' => $paged,

    'tax_query' => $tax_query,
    'meta_query'    => $meta_query,
  );

  $events = new WP_Query( $args );

  if ( $events->have_posts() ) {?>
  <div class="container p-0">
    <?php	while ( $events->have_posts() ) {
  		$events->the_post();?>
    <?php $thispmeta = get_post_meta($post->ID); ?>
    <?php include("inc/list-block.php");?>
    <?php	} ?>
  </div>
  <?php  } else {
  	// no posts found
  }?>
  <div class="paging">
    <?php wp_pagenavi( array( 'query' => $events ) );?>
  </div>
  <?php wp_reset_postdata();
  ?>
</div>
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
</html>
