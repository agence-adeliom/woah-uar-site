<?php

$tax_query[] =  array(
  'taxonomy' => 'event-type',
  'field' => 'slug',
  'terms' => 'course'
);
if (wp_is_mobile()) {
  $ppp = 5;
} else {
  $ppp = 10;
}


$thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php include("inc/head.php"); ?>
</head>

<body>
  <?php include("inc/header.php"); ?>
  <?php the_content(); ?>
  <div class="container-fluid post-list resource-list" id="list">

    <?php
    // WP_Query arguments
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type'              => array('events-courses'),
      'post_status'            => array('publish'),
      'meta_key' => 'featured_post',
      'orderby' => 'meta_value_num',
      'order'                  => 'DESC',
      'orderby'                => 'featured_post',
      'posts_per_page' => $ppp,
      'paged' => $paged,
      'tax_query' => $tax_query,

    );

    // The Query
    $courses = new WP_Query($args);

    if ($courses->have_posts()) { ?>
      <div class="container p-0">
        <?php while ($courses->have_posts()) {
          $courses->the_post(); ?>
          <?php $thispmeta = get_post_meta($post->ID); ?>
          <?php include("inc/list-block.php"); ?>
        <?php  } ?>
      </div>
    <?php  } else {
      // no posts found
    } ?>
    <div class="paging">
      <?php wp_pagenavi(array('query' => $courses)); ?>
    </div>
    <?php wp_reset_postdata();
    ?>

    <div class="container other-resources p-0">
      <div class="title headline-05">
        See other types of resources :
      </div>
      <div class="buttons row">
        <div class="col-md col-6 ">
          <div class="card-icon-text">
            <a href="/resources-toolbox"></a>
            <?php include(TEMPLATEPATH . '/media/screwdriver.php'); ?>
            <p>Toolbox</p>
          </div>
        </div>
        <div class="col-md col-6">
          <div class="card-icon-text">
            <a href="/resources-publications-and-documents"></a>
            <?php include(TEMPLATEPATH . '/media/files.php'); ?>
            <p>Publications and Documents</p>
          </div>
        </div>
        <div class="col-md col-6">
          <div class="card-icon-text">
            <a href="/resources-media-library"></a>
            <?php include(TEMPLATEPATH . '/media/photo-film.php'); ?>
            <p>Media Library</p>
          </div>
        </div>
        <div class="col-md col-6">
          <div class="card-icon-text">
            <a href="/resources-uar-best-practice"></a>
            <?php include(TEMPLATEPATH . '/media/thumbs-up.php'); ?>
            <p>UAR Best Practice</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <?php include("inc/footer.php"); ?>
  </footer>
  <script>
    jQuery(function() {
      jQuery('.wp-pagenavi a').attr('href', function(_, oldHref) {
        oldHref = oldHref.replace(/\#(.*)/g, "#page1");
        if (oldHref.indexOf('#') == -1)
          oldHref += "#list";
        return oldHref;
      });
    });
  </script>
</body>

</html>