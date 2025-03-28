<?php
if(true){
  $term = get_queried_object(); print_r($term) ;
    header("location:/events-and-courses/?type=".$term->slug."#list");
}
?>
