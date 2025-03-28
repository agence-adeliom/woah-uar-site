<?php $thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<?php include("inc/head.php");?>
	</head>
	<body >
    <?php include("inc/header.php");?>
    <div class="container-fluid post-list">
      <?php if ( have_posts() ) : ?>
      <div class="container p-0">
        <div class="page-title">
          <h1 class="title">Search Results</h1>
        </div>
        <div class="row justify-content-center s-holder no-gutters">
          <div class="col">
            <form action="/" method="get" class="row search-bar no-gutters">
              <div class="col">
                <input type="text" name="s" id="search" placeholder="Search Site" value="<?php the_search_query(); ?>" />
              </div>
              <div class="col-auto">
                <input id="searchbutt" type="submit" alt="Search" value="" />
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <?php $thispmeta = get_post_meta($post->ID); ?>
      <div class="container p-0">
        <?php include("inc/list-block.php");?>
      </div>
      <?php endwhile; ?>
      <?php else : ?>
      <div class="page-title">
        <h1 class="title"><?php printf( __( 'No Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <div class="row justify-content-center s-holder no-gutters">
          <div class="col">
            <form action="/" method="get" class="row search-bar no-gutters">
              <div class="col">
                <input type="text" name="s" id="search" placeholder="Search Site" value="<?php the_search_query(); ?>" />
              </div>
              <div class="col-auto">
                <input id="searchbutt" type="submit" alt="Search" value="" />
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="paging">
        <?php wp_pagenavi();?>
      </div>
    </div>
    </div>
    <footer>
      <?php include("inc/footer.php");?>
    </footer>
</body>
</html>
