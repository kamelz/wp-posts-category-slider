var $j = (typeof $ !== 'undefined')? $:jQuery; 

$j(document).ready(function(){

 var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

});