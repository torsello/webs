$(document).ready(function(){
  $(".flick-carousel").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 4,
      asNavFor: ".flick-carousel",
      dots: true,
      centerMode: true,
      focusOnSelect: true,
      autoplay: true,
      autoplaySpeed: 4000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3
          }
        }
      ]
  });
});