<?php
if (isset($_GET['tax']))
    {
        $tax_query[] =  array(
                'taxonomy' => $_GET['tax'],
                'field' => 'slug',
                'terms' => array($_GET['term'])
            );
        if($_GET['type']=='course'){
          $clink = 'active';
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
    <?php the_content();?>
    <div class="container-fluid post-list">
      <div class="container post-list-head p-0">
        <div id="list" class="title">
          <h3>Please select resource type</h3>
        </div>
        <div class="buttons row no-gutters">
          <div class="col-md col-6"><a class="active" href="/resources-toolbox#list"><span>Toolbox</span></a></div>
          <div class="col-md col-6"><a href="/resources-publications-and-documents#list"><span>Publications and Documents</span></a></div>
          <div class="col-md col-6"><a href="/resources-courses-and-training#list"><span>Courses and Training</span></a></div>
          <div class="col-md col-6"><a href="/resources-media-library#list"><span>Media Library</span></a></div>
          <div class="col-md col-6"><a href="/resources-uar-best-practice#list"><span>UAR Best Practice</span></a></div>
        </div>
      </div>
      <?php
  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array (
  	'post_type'              => array( 'toolbox' ),
  	'post_status'            => array( 'publish' ),
    'posts_per_page' => $ppp,
    'paged' => $paged,
    'tax_query' => $tax_query,
    'meta_query' => array(
      'relation' => 'OR',
        array(
          'key' => 'list_year',
          'value' => '1900',
          'compare' => '!='
        ),
        array(
          'key' => 'list_year',
          'compare' => 'NOT EXISTS'
        )
      ),
      'orderby' => array(
         'meta_value_num' => 'DESC',
         'title'      => 'ASC',
    )
  );

  $toolbox = new WP_Query( $args );

  if ( $toolbox->have_posts() ) {?>
      <div class="container p-0">
        <?php	while ( $toolbox->have_posts() ) {
  		$toolbox->the_post();?>
        <?php $thispmeta = get_post_meta($post->ID); ?>
        <?php include("inc/list-block.php");?>
        <?php	} ?>
      </div>
      <?php  } else {
  	// no posts found
  }?>
      <div class="paging">
        <?php wp_pagenavi( array( 'query' => $toolbox ) );?>
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
