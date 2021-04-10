
$(".body-1st-profile").on("click",function(){
  $(this).fadeOut(9);
  $("div").first().removeClass('overlay');
   // $("div").first().toggleClass("toverlay");
  // $(".overlay").show("slide",{direction:"right"},"slow");
  // $(".overlay").animate({width:'toggle'},"slow");
  // $(".overlay").toggle('slide',{direction:'right'},700);
})
$(".back").on("click",function(){
	$(".body-1st-profile").fadeIn(9);
   // $("div").first().removeClass('toverlay');
   $("div").first().toggleClass("overlay");
})