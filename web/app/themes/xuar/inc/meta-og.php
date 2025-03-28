<?php $fallback = get_option('page_on_front');

if (has_post_thumbnail( $post->ID ) ){
  $image = get_the_post_thumbnail_url($post->ID,'full');
}else{
  $image = get_the_post_thumbnail_url($fallback,'full');
}
if (isset($thismeta['seo__title'][0])){
  $title = $thismeta['seo_title'][0];
}else{
  $title = get_the_title();
}
if (isset($thismeta['seo_desc'][0])){
  $desc = $thismeta['seo_desc'][0];
}else{
  $desc = get_post_meta( $fallback, 'seo_desc', true );
}
?>
<meta name="description" content="<?php echo $desc;?>">
<meta name="image" content="<?php echo $image;?>" />
<meta property="og:title" content="<?php echo $title;?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo get_the_permalink();?>" />
<meta property="og:locale" content="" />
<meta property="og:site_name" content="United Against Rabies" />
<meta property="og:description" content="<?php echo $desc;?>" />
<meta property="og:image" content="<?php echo $image;?>" />
<meta name="twitter:image" content="<?php echo $image;?>">
<meta name="twitter:title" content="<?php echo $title;?>">
<meta name="twitter:description" content="<?php echo $desc;?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@UARForum">
<meta name="twitter:creator" content="@UARForum">
