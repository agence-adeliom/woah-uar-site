<?php
if(true){
  $term = get_queried_object() ;
    header("location:/news-and-case-studies/?type=".$term->slug."#list");
}
?>
