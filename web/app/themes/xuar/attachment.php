<?php $thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php include("inc/head.php");?>

</head>
<body >
<?php include("inc/header.php");?>
<?php  while ( have_posts() ) : the_post(); ?>
<div class="container-fluid">
  <div class="container attachment p-0">
    <h2 class="title"><?php the_title();?></h2>

    <div class="row no-gutters col-lg-10 m-auto pt-4 pb-4 pr-0 pl-0">


  <div class="col-md-5 col-lg-4 d-flex">
    <div class="image flex-grow-1 bg-pale-grey-1 p-4">
       <?php $image_size = apply_filters( 'wporg_attachment_size', 'medium' );
             echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
           </div>
</div>


           <div class="col-md-7 col-lg-8 d-flex">
             <div class="text">
             <h3><?php the_title();?></h3>
                 <?php the_content(); ?>

                 <p><a class="btn" href="<?php echo wp_get_attachment_url( $post->ID );?>" target="_blank">Download</a></p>
                 </div>
           </div>



</div>
</div>
</div>
<?php endwhile;?>
<footer>
<?php include("inc/footer.php");?>
</footer>

</body>
</html
