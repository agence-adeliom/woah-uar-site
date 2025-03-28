<?php
if(true){
  $term = get_queried_object() ;
    header("location:/resources-toolbox/?term=".$term->slug."&tax=dog-vaccination#list");
}
?>
