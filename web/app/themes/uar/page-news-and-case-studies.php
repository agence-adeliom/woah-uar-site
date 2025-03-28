<?php
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
    }else{
      $_GET['all']='yes';
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
          <div class="col-md col-6"><a class="<?php if (isset($_GET['all'])){?>active<?php }?>" href="<?php echo get_the_permalink()?>?all=yes#list"><span>View all</span></a></div>
          <div class="col-md col-6"><a class=" <?php if (isset($nlink)){?>active<?php }?>"href="<?php echo get_the_permalink()?>?type=news#list"><span>News</span></a></div>
          <div class="col-md col-6"><a class=" <?php if (isset($cslink)){?>active<?php }?>"href="<?php echo get_the_permalink()?>?type=case-study#list"><span>Case studies</span></a></div>
        </div>
      </div>
      <?php
  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array (
  	'post_type'              => array( 'news' ),
  	'post_status'            => array( 'publish' ),
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'posts_per_page' => $ppp,
    'paged' => $paged,
    'tax_query' => $tax_query,
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
