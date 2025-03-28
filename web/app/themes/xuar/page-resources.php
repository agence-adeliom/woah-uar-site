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

$thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php include("inc/head.php");?>

</head>
<body >
<?php include("inc/header.php");?>
<?php  //while ( have_posts() ) : the_post(); ?>
<div class="container-fluid position-relative">

<div class="container resources-header">
<div class="row">
  <div class="col-4 left d-flex">
    <div class="inner">
      <h1>Resources</h1>
      <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor
sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </h5>
    </div>
  </div>
  <div class="col-8 right">
    <div class="inner">
<h4><strong>Toolbox</strong></h4>
<p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et.</p>

<h4><strong>Publications & Documents</strong></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>

<h4><strong>Courses & Training</strong></h4>
<p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo.</p>

<h4><strong>Media Library</strong></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>

<h4><strong>UAR Best Practice</strong></h4>
<p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
    </div>
  </div>
</div>

</div>
<?php the_content();?>
</div>
<div class="container-fluid post-list">
  <div class="container post-list-head">
    <div class="title">
      <h3>Please select resource type</h3>
    </div>
    <div class="buttons row no-gutters">
      <div class="col"><a class="active" href="#"><span>Toolbox</span></a></div>
      <div class="col"><a href="#"><span>Publications and Documents</span></a></div>
      <div class="col"><a href="#"><span>Courses and Training</span></a></div>
      <div class="col"><a href="#"><span>Media Library</span></a></div>
      <div class="col"><a href="#"><span>UAR Best Practice</span></a></div>
    </div>
  </div>

<?php
  // WP_Query arguments
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array (
  	'post_type'              => array( 'toolbox' ),
  	'post_status'            => array( 'publish' ),
  	//'nopaging'               => true,
    //meta_key' => 'featured_post',
    //'orderby' => 'meta_value_num',
  	'order'                  => 'ASC',
  	//'orderby'                => 'featured_post',
  'posts_per_page' => 3,
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
  $services = new WP_Query( $args );

  // The Loop
  if ( $services->have_posts() ) {?>

<div class="container">
  <?php	while ( $services->have_posts() ) {
  		$services->the_post();?>
      <?php $thispmeta = get_post_meta($post->ID); ?>

<div class="row result-row ml-0 mr-0">
  <div class="col-8 deets">
    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php the_excerpt(); ?>
  </div>
  <div class="col-4 inf">
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

<?php $progs = get_the_terms( $post->ID, 'dog-vaccination');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>Dog Vaccination</strong><p class="t-list">
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


<?php $progs = get_the_terms( $post->ID, 'surveillance');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>Surveillance</strong><p class="t-list">
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

<?php $progs = get_the_terms( $post->ID, 'education');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>Education and Communication</strong><p class="t-list">
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

<?php $progs = get_the_terms( $post->ID, 'population-management');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>Dog Population Management</strong><p class="t-list">
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
 <?php wp_pagenavi( array( 'query' => $services ) );?></div>

  <?php wp_reset_postdata();
  ?>





</div>

<?php //endwhile;?>
<footer>
<?php include("inc/footer.php");?>
</footer>

</body>
</html
