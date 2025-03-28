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

				<div class="col"> <input type="text" name="s" id="search" placeholder="Search Site" value="<?php the_search_query(); ?>" /></div>
				<div class="col-auto">  <input id="searchbutt" type="submit" alt="Search" value="" /></div>
			</form>

	</div>
		</div>

</div><!-- .page-header -->

		<?php //shape_content_nav( 'nav-above' ); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
<?php $thispmeta = get_post_meta($post->ID); ?>
<div class="container p-0">
			<div class="row result-row ml-0 mr-0">
				<div class="col-12 col-md-8 deets">
					<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
					<?php if (isset($thispmeta['event_date'][0])){?>
							<h5 class="c-date">Event Date: <?php echo date("d/m/Y", $thispmeta['event_date'][0])?></h5>
					<?php } ?>
					<?php if (isset($thispmeta['creation_date'][0])){?>
							<h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
					<?php } ?>
					<?php if (isset($thispmeta['produced_by'][0])){?>
							<h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
							<?php } ?>
					<?php the_excerpt(); ?>
				</div>
				<div class="col-12 col-md-4 inf">

					<?php	$postType = get_post_type_object(get_post_type());
						if ($postType) {?>
						  <h5> <?php echo esc_html($postType->labels->singular_name); ?></h5>
					<?php	} ?>

<!--toolbox -->

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

<!--publications -->

			<?php $progs = get_the_terms( $post->ID, 'subject');
			$pcount = count($progs);
			$pi =0; ?>
			<?php  if($progs){?>
			<p class="mb-0"><strong>Subject</strong><p class="t-list">
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

<!--events -->
<?php $progs = get_the_terms( $post->ID, 'event-type');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>Event Type</strong><p class="t-list">
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

<!--news -->
<?php $progs = get_the_terms( $post->ID, 'news-type');
$pcount = count($progs);
$pi =0; ?>
<?php  if($progs){?>
<p class="mb-0"><strong>News Type</strong><p class="t-list">
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
</div>
		<?php endwhile; ?>



<?php else : ?>

	<div class="page-title">
			<h1 class="title"><?php printf( __( 'No Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

				<div class="row justify-content-center s-holder no-gutters">
		<div class="col">
					<form action="/" method="get" class="row search-bar no-gutters">

						<div class="col"> <input type="text" name="s" id="search" placeholder="Search Site" value="<?php the_search_query(); ?>" /></div>
						<div class="col-auto">  <input id="searchbutt" type="submit" alt="Search" value="" /></div>
					</form>

			</div>
				</div>


	</div>

<?php endif; ?>


<div class="paging">
 <?php wp_pagenavi();?></div>
</div>

</div>



<footer>
<?php include("inc/footer.php");?>
</footer>

</body>
</html
