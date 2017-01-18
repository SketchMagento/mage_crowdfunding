
$j('ul.nav li.dropdown').hover(function() {
  $j(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $j(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});





//var $flexslider = $j('.flexslider');
//$flexslider.flexslider({
//  animation: "slide",
//  manualControls: ".flex-control-nav li",
//  useCSS: false /* Chrome fix*/,
//  animationLoop:true,
//  start: function(slider){ $j('.flex-control-nav li').mouseover(function(){ var activeSlide = 'false'; if ($j(this).hasClass('flex-active')){ activeSlide = 'true'; } if (activeSlide == 'false'){ $j(this).trigger("click"); } }); }
//});


// Can also be used with $j(document).ready()
$j(window).load(function() {
  $j('.flexslider2').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5,
    minItems: 2,
    maxItems: 3
  });
});