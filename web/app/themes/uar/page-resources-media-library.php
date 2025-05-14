<?php
if (isset($_GET['tax'])) {
  $tax_query[] =  array(
    'taxonomy' => $_GET['tax'],
    'field' => 'slug',
    'terms' => array($_GET['term'])
  );
  if ($_GET['type'] == 'course') {
    $clink = 'active';
  }
}
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
      'post_type'              => array('uar-media-library'),
      'post_status'            => array('publish'),
      'posts_per_page' => $ppp,
      'paged' => $paged,
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

    $media = new WP_Query($args);

    if ($media->have_posts()) { ?>
      <div class="container p-0">
        <?php while ($media->have_posts()) {
          $media->the_post(); ?>
          <?php $thispmeta = get_post_meta($post->ID); ?>
          <?php include("inc/list-block.php"); ?>
        <?php  } ?>
      </div>
    <?php  } else {
      // no posts found
    } ?>
    <div class="paging">
      <?php wp_pagenavi(array('query' => $media)); ?>
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
            <a href="/resources-courses-and-training"></a>
            <?php include(TEMPLATEPATH . '/media/file-certificate.php'); ?>
            <p>Courses and Training</p>
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