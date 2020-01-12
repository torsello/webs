$(document).ready(function(){
   $(".button").click(function(){
      $(".landing").fadeOut("slow");
      $(".home-bg").animate({opacity: "1"}, 1500);
      $(".home-li").addClass("active");
      $(".btn-fade").fadeIn("slow");
      if(window.innerWidth > 991){
          $(".navbar-brand").animate({fontSize: "4vh", margin: "-65vh 0 0 10px"}, 2000); 
          $(".nav-item").animate({margin: "0 0 0 10vh"}, 1500);
      }
      $(".landing").css("z-index", "0");
      $(".navbar").css("z-index", "999");
      $(".rest").addClass("animate-text");
      $('.animate-text').textillate({
           loop: true,
           in: {
            effect: 'rotateIn',
            delay: 200,
            sequence: true
            },
           out: {
            effect: 'fadeOut',
            delay: 150,
            shuffle: true
           }
        });
   });

   $(".neon-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasHome = $(navIndex[0]).hasClass("active");
      let wasServicio = $(navIndex[2]).hasClass("active");
      if(wasHome){
        $(".home-bg").fadeOut("slow");
        $(".home-bg").animate({opacity: "0"}, 2000);
        $(".home-li").removeClass("active");
      } else if(wasServicio){
        $(".servicios-bg").fadeOut("slow");
        $(".servicios-bg").animate({opacity: "0"}, 1500);
        $(".servicios-li").removeClass("active");
      } else {
        $(".contacto-bg").fadeOut("slow");
        $(".contacto-bg").animate({opacity: "0"}, 1500);
        $(".contacto-li").removeClass("active");
      }
      $(".neon-bg").fadeIn("slow");
      $(".neon-bg").animate({opacity: "1"}, 1500);
      $(".neon-li").addClass("active"); 
   }); 
   $(".servicios-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasHome = $(navIndex[0]).hasClass("active");
      let wasNeon = $(navIndex[1]).hasClass("active");
      if(wasHome){
        $(".home-bg").fadeOut("slow");
        $(".home-bg").animate({opacity: "0"}, 2000);
        $(".home-li").removeClass("active");
      } else if(wasNeon){
        $(".neon-bg").fadeOut("slow");
        $(".neon-bg").animate({opacity: "0"}, 1500);
        $(".neon-li").removeClass("active");
      } else {
        $(".contacto-bg").fadeOut("slow");
        $(".contacto-bg").animate({opacity: "0"}, 1500);
        $(".contacto-li").removeClass("active");
      }
      $(".servicios-bg").fadeIn("slow");
      $(".servicios-bg").animate({opacity: "1"}, 1500);
      $(".servicios-li").addClass("active"); 
   });
   $(".contacto-a").click(function(){
      let navIndex = $($(".ml-auto").children());
      let wasHome = $(navIndex[0]).hasClass("active");
      let wasNeon = $(navIndex[1]).hasClass("active");
      if(wasHome){
        $(".home-bg").fadeOut("slow");
        $(".home-bg").animate({opacity: "0"}, 2000);
        $(".home-li").removeClass("active");
      } else if(wasNeon){
        $(".neon-bg").fadeOut("slow");
        $(".neon-bg").animate({opacity: "0"}, 1500);
        $(".neon-li").removeClass("active");
      } else {
        $(".servicios-bg").fadeOut("slow");
        $(".servicios-bg").animate({opacity: "0"}, 1500);
        $(".servicios-li").removeClass("active");
      }
      $(".contacto-bg").fadeIn("slow");
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
        $(".servicios-bg").fadeOut("slow");
        $(".servicios-li").removeClass("active");
      } else {
        $(".contacto-bg").fadeOut("slow");
        $(".contacto-bg").animate({opacity: "0"}, 1500);
        $(".contacto-li").removeClass("active");
      }
      $(".home-bg").fadeIn("slow");
      $(".home-bg").animate({opacity: "1"}, 1500);
      $(".home-li").addClass("active");
   });
   
   if(window.innerWidth < 992){
        $(".nav-link").click(function(){
          $(".navbar-toggler").click(); 
       });  
   }

    
});
