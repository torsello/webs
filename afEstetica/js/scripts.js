$(window).on("load", function(){
   $(".preloader").fadeOut(3000);
});

$(document).ready(function(){
   $(document).scroll(function(){
      if($(".menu-alt").css("display") === "none"){
          if($(this).scrollTop() <= $(".carousel").height()-200){
                $(".logo").attr("src","img/LogoW.png");
                $(".nav-fix").css("background-color", "transparent");
                $(".nav-fix").css("color", "white");
                $(".menu-wrapper li a").css("color", "white");
                $(".bar1").css("background-color", "white");
                $(".bar2").css("background-color", "white");
                $(".bar3").css("background-color", "white");
           } else {
                $(".logo").attr("src","img/Logo.png");
                $(".nav-fix").css("background-color", "white");
                $(".nav-fix").css("color", "rgb(100,100,100)");
                $(".menu-wrapper li a").css("color", "rgb(100,100,100)");
                $(".bar1").css("background-color", "rgb(100,100,100)");
                $(".bar2").css("background-color", "rgb(100,100,100)");
                $(".bar3").css("background-color", "rgb(100,100,100)");
           }
       }
   });
});

$(document).ready(function(){
    if($(this).scrollTop() >= $(".carousel").height()-200){
        $(".logo").attr("src","img/Logo.png");
        $(".nav-fix").css("background-color", "white");
        $(".nav-fix").css("color", "rgb(100,100,100)");
        $(".menu-wrapper li a").css("color", "rgb(100,100,100)");
        $(".bar1").css("background-color", "rgb(100,100,100)");
        $(".bar2").css("background-color", "rgb(100,100,100)");
        $(".bar3").css("background-color", "rgb(100,100,100)");
    } else {
        $(".logo").attr("src","img/LogoW.png");
        $(".nav-fix").css("background-color", "transparent");
        $(".nav-fix").css("color", "white");
        $(".menu-wrapper li a").css("color", "white");
        $(".bar1").css("background-color", "white");
        $(".bar2").css("background-color", "white");
        $(".bar3").css("background-color", "white");
    }
});

$(document).ready(function(){
   $(".menu-link1").hover(function(){
      $(".menu-link1").css("color", "rgb(183,10,143)"); 
   }, function(){
       let scr = $(document).scrollTop();
       if($(document).scrollTop() >= $(".carousel").height()-200){
                 $(".menu-link1").css("color", "rgb(100,100,100)"); 
           } else {
                 $(".menu-link1").css("color", "white"); 
           }
   });
   $(".menu-link2").hover(function(){
      $(".menu-link2").css("color", "rgb(183,10,143)"); 
   }, function(){
       if($(document).scrollTop() >= $(".carousel").height()-200){
                 $(".menu-link2").css("color", "rgb(100,100,100)"); 
           } else {
                 $(".menu-link2").css("color", "white"); 
           }
   });
   $(".menu-link3").hover(function(){
      $(".menu-link3").css("color", "rgb(183,10,143)"); 
   }, function(){
       if($(document).scrollTop() >= $(".carousel").height()-200){
                 $(".menu-link3").css("color", "rgb(100,100,100)"); 
           } else {
                 $(".menu-link3").css("color", "white"); 
           }
   });
   $(".menu-link4").hover(function(){
      $(".menu-link4").css("color", "rgb(183,10,143)"); 
   }, function(){
       if($(document).scrollTop() >= $(".carousel").height()-200){
                 $(".menu-link4").css("color", "rgb(100,100,100)"); 
           } else {
                 $(".menu-link4").css("color", "white"); 
           }
   });
});
