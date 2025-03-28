jQuery(document).ready(function($){
    document.querySelector('#mobilebutton').addEventListener('click', function() {

jQuery('#mobilebutton').toggleClass('active');
        jQuery('#mobilemenu').toggleClass('active');
		jQuery('#mobilemenu').slideToggle();

if (jQuery('#mobilebutton').hasClass('active')){
  $(".involvedbutton").removeClass("active");
  $("#involvedmenu").slideUp();
  $("body").addClass("nav-open");

  }else{
    $("body").removeClass("nav-open");
  }



    });

  $(window).on('resize', function() {
        var win = $(this);
        if (win.width() >= 991) {


if (jQuery('#mobilebutton').hasClass('active')){
jQuery('#mobilebutton').toggleClass('active');
        jQuery('#mobilemenu').toggleClass('active');
		jQuery('#mobilemenu').slideToggle();

          $("body").removeClass("nav-open");
        }
}
    });
    $("#mobilebutton.active").click(function() {
        $('#mobilebutton').toggleClass('active off');
        $('#mobilemenu').toggleClass('active off')
    })
});
/* var touchsupport = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)
if (!touchsupport) {
    document.documentElement.className += " non-touch"
}*/

(function($){
$(document).ready(function(){

$('#mobilemenu li.active').addClass('open').children('ul').show();
	$('#mobilemenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});

});
})(jQuery);

////////////////////////////////////
jQuery(document).ready(function($){


    document.querySelector('.involvedbutton a').addEventListener('click', function() {

jQuery('.involvedbutton').toggleClass('active');
    jQuery('#involvedmenu').toggleClass('active');
		jQuery('#involvedmenu').slideToggle();

    if (jQuery('.involvedbutton').hasClass('active')){
      $("#mobilebutton").removeClass("active");
      $("#mobilemenu").slideUp();
    		$("body").addClass("nav-open");

      }else{
        $("body").removeClass("nav-open");
      }
    });



  $(window).on('resize', function() {
        var win = $(this);
        if (win.width() >= 991) {


if (jQuery('.involvedbutton').hasClass('active')){
jQuery('.involvedbutton').toggleClass('active');
        jQuery('#involvedmenu').toggleClass('active');
		jQuery('#involvedmenu').slideToggle();

          $("body").removeClass("nav-open");
        }
}
    });
    $(".involvedbutton.active").click(function() {
        $('.involvedbutton').toggleClass('active off');
        $('#involvedmenu').toggleClass('active off')
    })
});
/* var touchsupport = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)
if (!touchsupport) {
    document.documentElement.className += " non-touch"
}*/

(function($){
$(document).ready(function(){

$('#involvedmenu li.active').addClass('open').children('ul').show();
	$('#involvedmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});

});
})(jQuery);

/////////////////search mobile //////////////////////
jQuery(document).ready(function($){
    document.querySelector('#searchopen').addEventListener('click', function() {

jQuery('#searchopen').toggleClass('active');
        jQuery('#searchblock').toggleClass('active');
		//jQuery('#searchblock').slideToggle();
    //jQuery('#searchblock').toggle( 1000);




    });


    $("#searchopen.active").click(function() {
        $('#searchopen').toggleClass('active off');
        $('#searchblock').toggleClass('active off')
        //jQuery('#searchblock').toggle("slide", {direction: "right" }, 1000);
    })
});
