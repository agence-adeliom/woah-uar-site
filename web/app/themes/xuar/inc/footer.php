
  <div class="container-fluid bg-blue-grey-1 d-none d-lg-block">
    <div class="container main p-0">
      <div class="row no-gutters h-100">
        <div class="col logo-col">
 <div class="logo"><a  href="/"><span>United Against Rabies</span></a></div>
        </div>
        <div class="col-auto d-flex ">

          <?php
wp_nav_menu( array(
    'menu_class' => '',
    'theme_location' => 'footer',
'item_spacing' => 'discard',
    'container' => ''
) );
?>

        </div>

 <div class=" col d-flex  justify-content-end ">
<p>&copy; United Against Rabies Forum <?php echo date("Y"); ?></p>
        </div>


      </div>
    </div>
  </div>

  <div class="container-fluid bg-blue-grey-1 d-lg-none">
    <div class="container main pl-0 pr-0">
      <div class="row  h-100">

        <div class="col-sm col-12">

          <?php
wp_nav_menu( array(
    'menu_class' => '',
    'theme_location' => 'footer',
'item_spacing' => 'discard',
    'container' => ''
) );
?>

        </div>

 <div class="col-sm col-sm-5 col-12">
   <div class="row  h-100">
<div class="col-12 ">
   <p>&copy; United Against Rabies Forum <?php echo date("Y"); ?></p>
 </div>
 <div class=" col-12 ">

  </div>
        </div>

</div>
      </div>
    </div>
  </div>







  <div class="container-fluid bg-dark-blue">
    <div class="container sub pr-0 pl-0">
      <div class="row no-gutters h-100">

           <?php include("social.php");?>


      </div>
    </div>
  </div>

  <div id="mobilemenu">
    <div id="dropmenu">
    <?php
    wp_nav_menu( array(
        'menu_class' => '',
        'theme_location' => 'primary',
    'item_spacing' => 'discard',
        'container' => ''
    ) );
    ?>

  </div>
  </div>

  <div id="involvedmenu">
    <div id="dropmenu">
    <?php
    wp_nav_menu( array(
        'menu_class' => '',
        'theme_location' => 'quicklinks',
    'item_spacing' => 'discard',
        'container' => ''
    ) );
    ?>

  </div>
  </div>

<div class="image-status-load"></div>



<script>

jQuery(document).ready(function() {


    jQuery('h3.back a').click(function(){
        parent.history.back();
        return false;
    });

    //set initial state.
    //jQuery('#images').val(this.checked);

    jQuery('.imagestate').change(function() {
        if(this.checked) {
            //var returnVal = confirm("Are you sure?");
            //jQuery(this).prop("checked", returnVal);

            jQuery.ajax({
                type: 'POST',
                //dataType: "json",
                cache: false,
                url: '/media/image-state.php',
                data: {"imagestate": "off"},
                success: function( response ) {
            console.log('checked');
            jQuery("footer .image-status-load").fadeIn();
            setInterval('location.reload()', 2000);        // Using .reload() method.
        }
            });



        }else {

          jQuery.ajax({
              type: 'POST',
              //dataType: "json",
              cache: false,
              url: '/media/image-state.php',
              data: {"imagestate": "on"},
              success: function( response ) {
          console.log('unchecked');
          jQuery("footer .image-status-load").fadeIn();
          setInterval('location.reload()', 2000);        // Using .reload() method.
      }
          });


          //console.log('unchecked')
        }
        jQuery('.imagestate').val(this.checked);
    });

    jQuery('#searchform').submit(function(e){
    if(jQuery('#s').val() == ''){
        e.preventDefault();
    }
});
});
</script>
<?php wp_footer(); ?>
