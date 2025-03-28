<?php
$sepcom = ', ';

//toolbox/////////////////////////////

if ( get_post_type( $post->ID ) == 'toolbox' ) {
?>

<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
  	$postType = get_post_type_object(get_post_type());
      if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <!--Program / Strategy-->
    <?php
$progstrat = wp_get_post_terms($post->ID, 'program-strategy');

if($progstrat){
  $total_progstrat = count($progstrat);

  echo '<p class="mb-0"><strong>Program / Strategy</strong><p class="t-list">';

    for($i = 0; $i < $total_progstrat; $i++) {

        echo '<a href="' . esc_url( get_term_link($progstrat[$i]->term_id) ) . '">' . $progstrat[$i]->name .'</a>';

        if($i < $total_progstrat-1) {
            echo $sepcom; // echo comma
        }
    }
    echo '</p>';
}

?>
    
    <!--Dog Vaccination Campaign Implementation-->
    
    <?php
$dogvac = wp_get_post_terms($post->ID, 'dog-vaccination');

if($dogvac){
  $total_dogvac = count($dogvac);

  echo '<p class="mb-0"><strong>Dog Vaccination Campaign Implementation</strong><p class="t-list">';

    for($i = 0; $i < $total_dogvac; $i++) {

        echo '<a href="' . esc_url( get_term_link($dogvac[$i]->term_id) ) . '">' . $dogvac[$i]->name .'</a>';

        if($i < $total_dogvac-1) {
            echo $sepcom; // echo comma
        }
    }
    echo '</p>';
}

?>
    
    <!--Rabies Surveillance-->
    
    <?php
$surveillance = wp_get_post_terms($post->ID, 'surveillance');

if($surveillance){
  $total_surveillance = count($surveillance);

  echo '<p class="mb-0"><strong>Rabies Surveillance</strong><p class="t-list">';

    for($i = 0; $i < $total_surveillance; $i++) {

        echo '<a href="' . esc_url( get_term_link($surveillance[$i]->term_id) ) . '">' . $surveillance[$i]->name .'</a>';

        if($i < $total_surveillance-1) {
            echo $sepcom; // echo comma
        }
    }
    echo '</p>';
}

?>
    
    <!--Education and Communication-->
    
    <?php
$education = wp_get_post_terms($post->ID, 'education');

if($education){
  $total_education = count($education);

  echo '<p class="mb-0"><strong>Education and Communication</strong><p class="t-list">';

    for($i = 0; $i < $total_education; $i++) {

        echo '<a href="' . esc_url( get_term_link($education[$i]->term_id) ) . '">' . $education[$i]->name .'</a>';

        if($i < $total_education-1) {
            echo $sepcom; // echo comma
        }
    }
    echo '</p>';
}

?>
    
    <!--Dog Population Management-->
    
    <?php
$popmanage = wp_get_post_terms($post->ID, 'population-management');

if($popmanage){
  $total_popmanage = count($popmanage);

  echo '<p class="mb-0"><strong>Dog Population Management</strong><p class="t-list">';

    for($i = 0; $i < $total_popmanage; $i++) {

        echo '<a href="' . esc_url( get_term_link($popmanage[$i]->term_id) ) . '">' . $popmanage[$i]->name .'</a>';

        if($i < $total_popmanage-1) {
            echo $sepcom; // echo comma
        }
    }
    echo '</p>';
}

?>
    <?php //echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?>
  </div>
</div>
<?php }

//publications/////////////////////////////

if ( get_post_type( $post->ID ) == 'publications' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <!--Subject-->
    
    <?php
    $subject = wp_get_post_terms($post->ID, 'subject');

    if($subject){
      $total_subject = count($subject);

      echo '<p class="mb-0"><strong>Subject</strong><p class="t-list">';

        for($i = 0; $i < $total_subject; $i++) {

            echo '<a href="' . esc_url( get_term_link($subject[$i]->term_id) ) . '">' . $subject[$i]->name .'</a>';

            if($i < $total_subject-1) {
            echo $sepcom; // echo comma
            }
        }
        echo '</p>';
    }

    ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//Events & Courses/////////////////////////////

if ( get_post_type( $post->ID ) == 'events-courses' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php  if( has_term( 'event', 'event-type' ) ) {?>
    <h5 class="c-date">Event Date: <?php echo date("d/m/Y", $thispmeta['event_date'][0])?></h5>
    <?php }?>
    <h5 class="p-by">
      <?php if(isset($thispmeta['produced_by'][0])){?>
      Produced By: <?php echo $thispmeta['produced_by'][0] ?>
      <?php }?>
    </h5>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    
    <!--Event type-->
    
    <?php
    $etype = wp_get_post_terms($post->ID, 'event-type');

    if($etype){
      $total_etype = count($etype);

      echo '<p class="mb-0"><strong>Event Category</strong><p class="t-list">';

        for($i = 0; $i < $total_etype; $i++) {

            echo '<a href="' . esc_url( get_term_link($etype[$i]->term_id) ) . '">' . $etype[$i]->name .'</a>';

            if($i < $total_etype-1) {
            echo $sepcom; // echo comma
            }
        }
        echo '</p>';
    }

    ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//media library /////////////////////////////

if ( get_post_type( $post->ID ) == 'uar-media-library' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//media library /////////////////////////////

if ( get_post_type( $post->ID ) == 'attachment' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

////////////////////////////////////////

//post /////////////////////////////

if ( get_post_type( $post->ID ) == 'post' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

////////////////////////////////////////

//page /////////////////////////////

if ( get_post_type( $post->ID ) == 'page' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//working group /////////////////////////////

if ( get_post_type( $post->ID ) == 'working-groups' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//News/////////////////////////////

if ( get_post_type( $post->ID ) == 'news' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    
    <!--News type-->
    
    <?php
    $ntype = wp_get_post_terms($post->ID, 'news-type');

    if($ntype){
      $total_ntype = count($ntype);

      echo '<p class="mb-0"><strong>News Category</strong><p class="t-list">';

        for($i = 0; $i < $total_ntype; $i++) {

            echo '<a href="' . esc_url( get_term_link($ntype[$i]->term_id) ) . '">' . $ntype[$i]->name .'</a>';

            if($i < $total_ntype-1) {
            echo $sepcom; // echo comma
            }
        }
        echo '</p>';
    }

    ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//best practice /////////////////////////////

if ( get_post_type( $post->ID ) == 'uar-best-practice' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }

//governance and policies /////////////////////////////

if ( get_post_type( $post->ID ) == 'governance-policies' ) {
?>
<div class="row result-row ml-0 mr-0">
  <div class="col-12 col-md-8 deets">
    <h3><a href="<?php the_permalink();?>">
      <?php the_title(); ?>
      </a></h3>
    <?php if (isset($thispmeta['creation_date'][0])){?>
    <h5 class="c-date">Creation Date: <?php echo $thispmeta['creation_date'][0]?></h5>
    <?php } ?>
    <?php if (isset($thispmeta['produced_by'][0])){?>
    <h5 class="p-by">Produced By: <?php echo $thispmeta['produced_by'][0]?></h5>
    <?php } ?>
    <?php the_excerpt(); ?>
  </div>
  
  <!--Cats-->
  
  <div class="col-12 col-md-4 inf">
    <?php if ( is_search() ) {
    	$postType = get_post_type_object(get_post_type());
        if ($postType) {?>
    <h4> <?php echo esc_html($postType->labels->singular_name); ?></h4>
    <?php	} ?>
    <?php	}else{ ?>
    <h4>Categories</h4>
    <?php	} ?>
    <?php echo get_the_tag_list('<p class="p-tags"><strong>Tags:</strong> ',', ','</p>');?> </div>
</div>
<?php }?>
