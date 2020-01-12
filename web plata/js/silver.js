$(document).ready(function(){
   $(".neon-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasHome = $(navIndex[0]).hasClass("active");
      let wasServicio = $(navIndex[2]).hasClass("active");
      if(wasHome){
        $(".home-bg").animate({opacity: "0"}, 2000);
        $(".home-li").removeClass("active");
        $(".navbar-brand").animate({fontSize: "4vh", margin: "-36.5vh 0 0 35px"}, 2000); 
        $(".nav-item").animate({margin: "0 0 0 10vh"}, 1500);
        $(".btn").fadeOut("slow");
      } else if(wasServicio){
        $(".servicios-bg").animate({opacity: "0"}, 1500);
        $(".servicios-li").removeClass("active");
      } else {
        $(".contacto-bg").animate({opacity: "0"}, 1500);
        $(".contacto-li").removeClass("active");
      }
      $(".neon-bg").animate({opacity: "1"}, 1500);
      $(".neon-li").addClass("active"); 
   }); 
   $(".servicios-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasHome = $(navIndex[0]).hasClass("active");
      let wasNeon = $(navIndex[1]).hasClass("active");
      if(wasHome){
        $(".home-bg").animate({opacity: "0"}, 2000);
        $(".home-li").removeClass("active");
        $(".navbar-brand").animate({fontSize: "4vh", margin: "-36.5vh 0 0 35px"}, 2000); 
        $(".nav-item").animate({margin: "0 0 0 10vh"}, 1500);
        $(".btn").fadeOut("slow");
      } else if(wasNeon){
        $(".neon-bg").animate({opacity: "0"}, 1500);
        $(".neon-li").removeClass("active");
      } else {
        $(".contacto-bg").animate({opacity: "0"}, 1500);
        $(".contacto-li").removeClass("active");
      }
       
      $(".servicios-bg").animate({opacity: "1"}, 1500);
      $(".servicios-li").addClass("active"); 
   });
   $(".contacto-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasHome = $(navIndex[0]).hasClass("active");
      let wasNeon = $(navIndex[1]).hasClass("active");
      if(wasHome){
        $(".home-bg").animate({opacity: "0"}, 2000);
        $(".home-li").removeClass("active");
        $(".navbar-brand").animate({fontSize: "4vh", margin: "-36.5vh 0 0 35px"}, 2000); 
        $(".nav-item").animate({margin: "0 0 0 10vh"}, 1500);
        $(".btn").fadeOut("slow");
      } else if(wasNeon){
        $(".neon-bg").animate({opacity: "0"}, 1500);
        $(".neon-li").removeClass("active");
      } else {
        $(".servicios-bg").animate({opacity: "0"}, 1500);
        $(".servicios-li").removeClass("active");
      }
      $(".contacto-bg").animate({opacity: "1"}, 1500);
      $(".contacto-li").addClass("active"); 
   });
   $(".home-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasNeon = $(navIndex[1]).hasClass("active");
      let wasServicio = $(navIndex[2]).hasClass("active");
      if(wasNeon){
        $(".neon-bg").animate({opacity: "0"}, 1500);
        $(".neon-li").removeClass("active");
      } else if(wasServicio){
        $(".servicios-bg").animate({opacity: "0"}, 1500);
        $(".servicios-li").removeClass("active");
      } else {
        $(".contacto-bg").animate({opacity: "0"}, 1500);
        $(".contacto-li").removeClass("active");
      }
      $(".home-bg").animate({opacity: "1"}, 1500);
      $(".home-li").addClass("active");
      $(".navbar-brand").animate({fontSize: "20vh", margin: "0 0 0 0px"}, 1500); 
      $(".nav-item").animate({margin: "0 15vh 0 15vh"}, 2000);
      $(".btn").fadeIn("slow");
   });
    
});