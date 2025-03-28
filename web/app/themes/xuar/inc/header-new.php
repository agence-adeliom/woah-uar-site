<header class="live"><div class="container-fluid bg-dark-blue">
  <div class="container head-inner">
    <!-- Dropmenu-->
<?php //include("menu.php");?>
    <!-- End Dropmenu-->
<div class="row h-100 justify-content-between">
    <div class="logo"><a  href="/"><?php //include (TEMPLATEPATH . '/media/logo-uar.php');?><span>United Against Rabies</span></a></div>
    <div class="quick-links col-4 p-0">
      <div class="row utils no-gutters">
        <div class="col lang "></div>
        <div class="col im-switch "><p>Images</p><label class="switch">
          <input id="images" type="checkbox" <?php if( $_SESSION['imagestate'] == "off"){?>checked<?php } ?>>
          <span class="slider round"></span>
        </label></div>
      </div>
      <div class="row search-bar no-gutters">sht</div>
      <div class="row butts no-gutters">
        <!--<div class="col butt "></div>-->
        <div class="col q-menu ">
          <?php
          wp_nav_menu( array(
              'menu_class' => 'd-flex justify-content-between',
              'theme_location' => 'quicklinks',
          'item_spacing' => 'discard',
              'container' => ''
          ) );
          ?>

        </div>
      </div>
      <!--<div class="butts row no-gutters justify-content-between"> <a  href="#" class="tel col-auto"><span>Telephone</span></a> <a  href="#" class="account col-auto"><span>Account</span></a> <a  href="#" class="contact col-auto"><span>Contact</span></a>
        <input class="col-auto" type="submit" name="mobilebutton" id="mobilebutton" value="" />
      </div>-->
     </div>
  </div>
</div>
</div>
<div class="container-fluid bg-pale-grey-1">
  <div class="container menu d-flex">
<?php
wp_nav_menu( array(
    'menu_class' => 'd-flex justify-content-between',
    'theme_location' => 'primary',
'item_spacing' => 'discard',
    'container' => ''
) );
?>
</div>
</div>
</header>
