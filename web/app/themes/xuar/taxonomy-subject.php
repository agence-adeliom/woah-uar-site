<?php
if(true){
  $term = get_queried_object() ;
    header("location:/resources-publications-and-documents/?term=".$term->slug."&tax=subject#list");
}
?>
