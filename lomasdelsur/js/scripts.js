document.querySelector('.dropdown-service1').addEventListener('click', function() {
  document.querySelector('.drop-service1').classList.toggle('expand');
  if($('.drop-service1').hasClass('expand')){
       $('.plus1').css('display', 'none');
       $('.minus1').css('display', 'inline');
   } else {
       $('.plus1').css('display', 'inline');
       $('.minus1').css('display', 'none');   
   }
});

document.querySelector('.dropdown-service2').addEventListener('click', function() {
  document.querySelector('.drop-service2').classList.toggle('expand');
  if($('.drop-service2').hasClass('expand')){
       $('.plus2').css('display', 'none');
       $('.minus2').css('display', 'inline');
   } else {
       $('.plus2').css('display', 'inline');
       $('.minus2').css('display', 'none');   
   }
});

document.querySelector('.dropdown-service3').addEventListener('click', function() {
  document.querySelector('.drop-service3').classList.toggle('expand');
  if($('.drop-service3').hasClass('expand')){
       $('.plus3').css('display', 'none');
       $('.minus3').css('display', 'inline');
   } else {
       $('.plus3').css('display', 'inline');
       $('.minus3').css('display', 'none');   
   }
});

$('.gral').click(function(){
    window.location.hash = '#Gral'
});

$('.ciru').click(function(){
    $('.drop-service2').addClass('expand');
});

$('.eco').click(function(){
    $('.drop-service3').addClass('expand');
});

$(document).ready(function() {
     var hash = window.location.hash;
     if (hash === '#Gral') {
       $('.drop-service1').addClass('expand');
     }
     if (hash === '#Ciru') {
       $('.drop-service2').addClass('expand');
     }
     if (hash === '#Eco') {
       $('.drop-service3').addClass('expand');
     }
});

$(document).ready(function(){
    console.log($('.drop-service1').hasClass('expand'));
    if($('.drop-service1').hasClass('expand')){
       $('.plus1').css('display', 'none');
       $('.minus1').css('display', 'inline');
   } else {
       $('.plus1').css('display', 'inline');
       $('.minus1').css('display', 'none');   
   }
   if($('.drop-service1').hasClass('expand')){
       $('.plus2').css('display', 'none');
       $('.minus2').css('display', 'inline');
   } else {
       $('.plus2').css('display', 'inline');
       $('.minus2').css('display', 'none');   
   }
   if($('.drop-service1').hasClass('expand')){
       $('.plus3').css('display', 'none');
       $('.minus3').css('display', 'inline');
   } else {
       $('.plus3').css('display', 'inline');
       $('.minus3').css('display', 'none');   
   }
});