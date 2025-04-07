<?php $thismeta = get_post_meta($post->ID); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php include("inc/head.php"); ?>

</head>

<body>
    <?php include("inc/header-new.php"); ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="xcontainer-fluid position-relative">
            <?php the_content(); ?>
            <label class="switch">
                <input class="imagestate" type="checkbox" <?php if ($_SESSION['imagestate'] == "off") { ?>checked<?php } ?>>
                <span class="slider round"></span>
            </label>
            <p>Images: <?php echo $_SESSION['imagestate'];
                        print_r($_SESSION); ?>
            </p>
        </div>
    <?php endwhile; ?>
    <footer>
        <?php include("inc/footer.php"); ?>
    </footer>
    <script>
        jQuery(document).ready(function() {
            //set initial state.
            //jQuery('#images').val(this.checked);

            jQuery('.imagestate').change(function() {
                if (this.checked) {
                    //var returnVal = confirm("Are you sure?");
                    //jQuery(this).prop("checked", returnVal);

                    jQuery.ajax({
                        type: 'POST',
                        //dataType: "json",
                        cache: false,
                        url: '/app/themes/uar/inc/image-state.php',
                        data: {
                            "imagestate": "off"
                        },
                        success: function(response) {
                            console.log('checked');
                            setInterval('location.reload()', 2000); // Using .reload() method.
                        }
                    });



                } else {

                    jQuery.ajax({
                        type: 'POST',
                        //dataType: "json",
                        cache: false,
                        url: '/app/themes/uar/inc/image-state.php',
                        data: {
                            "imagestate": "on"
                        },
                        success: function(response) {
                            console.log('unchecked');
                            setInterval('location.reload()', 2000); // Using .reload() method.
                        }
                    });


                    //console.log('unchecked')
                }

                jQuery('.imagestate').val(this.checked);
            });
        });
    </script>
</body>

</html