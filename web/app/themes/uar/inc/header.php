<div class="row mob-utils justify-content-between d-lg-none m-0">
  <?php
  if (isset($_SESSION['imagestate'])) {
    if ($_SESSION['imagestate'] == "off") {
      $checkp = "Off";
    } else {
      $checkp = "On";
    }
  } else {

    $checkp = "On";
  }

  ?>
  <div class="col-auto im-switch ">
    <p>Images: <?php echo $checkp; ?></p>
    <label class="switch">
      <input class="imagestate" type="checkbox" <?php if (isset($_SESSION['imagestate'])) {
                                                  if ($_SESSION['imagestate'] == "off") { ?>checked<?php }
                                                                                                } ?>>
      <span class="slider round"></span> </label>
  </div>
  <div class="col lang "></div>
  <div class="col-auto search "><a id="searchopen" href="#"></a>
    <div id="searchblock">
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
<header class="live">
  <div class="container-fluid bg-dark-blue">
    <div class="container head-inner">
      <div class="row h-100 justify-content-between">
        <div class="logo"><a href="/home"><span>United Against Rabies</span></a></div>
        <div class="quick-links p-0">
          <div class="row utils no-gutters">
            <div class="col lang "></div>
            <div class="col im-switch ">
              <p>Images: <?php echo $checkp; ?></p>
              <label class="switch">
                <input class="imagestate" type="checkbox"
                  <?php if (isset($_SESSION['imagestate'])) {
                    if ($_SESSION['imagestate'] == "off") { ?>checked<?php }
                                                                  } ?>>
                <span class="slider round"></span> </label>
            </div>
          </div>
          <div class="row no-gutters bottom dark">
            <form action="/" method="get" class="row search-bar no-gutters">
              <div class="col">
                <input type="text" name="s" id="search" placeholder="Search Site" value="<?php the_search_query(); ?>" />
              </div>
              <div class="col-auto">
                <input id="searchbutt" type="submit" alt="Search" value="" />
              </div>
            </form>
            <div class="row butts no-gutters">
              <div class="col q-menu p-0 d-flex">
                <?php
                wp_nav_menu(array(
                  'menu_class' => 'd-flex justify-content-between',
                  'theme_location' => 'quicklinks',
                  'item_spacing' => 'discard',
                  'container' => ''
                ));
                ?>
              </div>
              <div class="col-auto d-lg-none" id="mobilebutton"></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-pale-grey-1">
    <div class="container menu d-flex p-0">
      <?php
      wp_nav_menu(array(
        'menu_class' => 'd-flex justify-content-between',
        'theme_location' => 'primary',
        'item_spacing' => 'discard',
        'container' => ''
      ));
      ?>
    </div>
  </div>
</header>