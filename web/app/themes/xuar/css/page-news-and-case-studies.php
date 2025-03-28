<?php
//echo $_GET['type'];
if (isset($_GET['type']))
    {
        $tax_query[] =  array(
                'taxonomy' => 'news-type',
                'field' => 'slug',
                'terms' => $_GET['type']
            );
        if($_GET['type']=='news'){
          $nlink = 'active';
        }elseif ($_GET['type']=='case-study') {
          $cslink = 'active';
        }
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
<div class="xcontainer-fluid position-relative">

<?php the_content();?>
</div>
<div class="container-fluid post-list">
  <div class="container post-list-head">
    <div id="list" class="title">
      <h3>Select category</h3>
    </div>
    <div class="buttons row no-gutters">
      <div class="col"><a class="<?php if (isset($_GET['all'])){?>active<?php }?>" href="<?php echo get_the_permalink()?>?all=yes#list"><span>View all</span></a></div>
      <div class="col"><a class=" <?php if (isset($nlink)){?>active<?php }?>"href="<?php echo get_the_permalink()?>?type=news#list"><span>News</span></a></div>
      <div class="col"><a class=" <?php if (isset($cslink)){?>active<?php }?>"href="<?php echo get_the_permalink()?>?type=case-study#list"><span>Case studies</span></a></div>

    </div>
  </div>

<?php
  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array (
  	'post_type'              => array( 'news' ),
  	'post_status'            => array( 'publish' ),
  	//'nopaging'               => true,
    //meta_key' => 'featured_post',
    //'orderby' => 'meta_value_num',
  	'order'                  => 'ASC',
  	//'orderby'                => 'featured_post',
  'posts_per_page' => 5,
    'paged' => $paged,
    /*'meta_query'    => array(
        'relation'      => 'AND',
        array(
            'key'       => 'event_date',
            'value' => current_time( 'timestamp' ),
                'compare' => '>=',
                'type' => 'NUMERIC',
        )
    ),*/
    'tax_query' => $tax_query,
    'meta_query'    => $meta_query,
  );

  // The Query
  $events = new WP_Query( $args );

  // The Loop
  if ( $events->have_posts() ) {?>

<div class="container">
  <?php	while ( $events->have_posts() ) {
  		$events->the_post();?>
      <?php $thispmeta = get_post_meta($post->ID); ?>

<div class="row result-row ml-0 mr-0">
  <div class="col-8 deets">
    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <h5 class="p-by"><?php if($thispmeta['produced_by'][0]){?>Produced By: <?php echo $thispmeta['produced_by'][0] ?><?php }?></h5>
    <?php the_excerpt(); ?>
  </div>
  <div class="col-4 inf">
    <?php $cats = get_the_terms( $post->ID, 'news-type');
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
