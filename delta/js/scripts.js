$(window).load(function(){
   $(".loader").css({"display":"none"});
   $(".preloader").fadeOut(4000); 
});

$(function() {
  $.scrollify({
      section:".panel",
      scrollbars:false,
      interstitialSection:".header,.footer",
      before:function(i,panels) {

          let ref = panels[i].attr("data-section-name");

          $(".paginations .active").removeClass("active");
          $(".paginations .active2").removeClass("active2");

        if(i%2==0){
             $(".paginations").find("a[href=\"#" + ref + "\"]").addClass("active");
         }else{
             $(".paginations").find("a[href=\"#" + ref + "\"]").addClass("active2");
         }
          
      },
      afterRender:function() {
          let paginations = "<ul class=\"paginations\">";
          let activeClass = "";
          $(".panel").each(function(i) {
              activeClass = "";
              if(i===0) {
                  activeClass = "active";
          }
          paginations += "<li><a class=\"" + activeClass + "\" href=\"#" + $(this).attr("data-section-name") + "\"><span class=\"hover-text\">" + $(this).attr("data-section-name").charAt(0).toUpperCase() + $(this).attr("data-section-name").slice(1) + "</span></a></li>";
      });

      paginations += "</ul>";
      $(".home").append(paginations);
      $(".paginations a").on("click",$.scrollify.move);
      }
  });
});

$(document).ready(function(){       
    let scroll_pos = 0;
    $(document).scroll(function() { 
        scroll_pos = $(this).scrollTop();
        win_height = $(window).height();
        if(scroll_pos < win_height - win_height/2 || scroll_pos > 2*win_height + win_height/2 || scroll_pos == null) {
            $(".social-button a").css({"color":"white"});
            $(".hover-text-2").css({"color": "white"});
            $(".paginations a").css({"color":"white"});
            if(scroll_pos > 2*win_height + win_height/2){
                $(".home-logo1").css(({"display":"inline"}));
            }
            $(".home-logo2").css(({"display":"none"}));
        } else {
            $('.social-button a').css({"color":"#3B3B3B"});
            $(".hover-text-2").css({"color": "#3B3B3B"});
            $('.paginations a').css({"color":"#3B3B3B"});
            $(".home-logo1").css(({"display":"none"}));
            $(".home-logo2").css(({"display":"inline"}));
        }
    });
});

$(document).ready(function(){
  $(".fa-arrow-down").click(function(){
      $.scrollify.next();
  });
});

$(document).ready(function(){
   $(".menu-footer1").click(function(){
      $.scrollify.previous();
      $.scrollify.previous();
      $.scrollify.previous();
   });
   $(".menu-footer2").click(function(){
      $.scrollify.previous();
      $.scrollify.previous();
   });
   $(".menu-footer3").click(function(){
      $.scrollify.previous();
   });
});

$(document).ready(function(){
    $(".navBar a").click(function(){
       let is_home = $($($(".paginations li")[0]).children()).hasClass("active");
       let is_about_us = $($($(".paginations li")[1]).children()).hasClass("active2");    
       let is_portfolio = $($($(".paginations li")[2]).children()).hasClass("active");
       let is_contact = $($($(".paginations li")[3]).children()).hasClass("active2");
       if(!is_home && is_about_us){
           $.scrollify.previous();
       } else if (!is_home && is_portfolio){
           $.scrollify.previous();
           $.scrollify.previous();
       } else if (!is_home && is_contact){
           $.scrollify.previous();
           $.scrollify.previous();
           $.scrollify.previous();
       } else if (!is_home){
           $.scrollify.previous();
           $.scrollify.previous();
           $.scrollify.previous();
           $.scrollify.previous();
       }
    });
    
});

$(document).ready(function(){
  $(".facebook-button").hover(function(){
    $(this).css("color","#3b5998");
    $(".fa-text").css("opacity", "1");  
    }, function(){
      let color = $(".instagram-button").css("color");
      $(".facebook-button").css("color", color);
      $(".fa-text").css("opacity", "0");   
  }); 
  $(".instagram-button").hover(function(){
    $(this).css("color","#8a3ab9");
    $(".ig-text").css("opacity", "1");  
    }, function(){
      let color = $(".facebook-button").css("color");
      $(".instagram-button").css("color", color);
      $(".ig-text").css("opacity", "0");   
  });
  $(".twitter-button").hover(function(){
    $(this).css("color","#1DA1F2");
    $(".gl-text").css("opacity", "1");  
    }, function(){
      let color = $(".instagram-button").css("color");
      $(".twitter-button").css("color", color);
      $(".gl-text").css("opacity", "0");  
  });
});