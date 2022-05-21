$(function(){
// Header Part  
  $(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('.header').addClass('headerNewClass');
    } else {
       $('.header').removeClass('headerNewClass');
    }
  });
// Header Two Part
$(window).scroll(function(){
  if ($(this).scrollTop() > 50) {
     $('.SubpageHeader').addClass('subPageHeaderNewClass');
  } else {
     $('.SubpageHeader').removeClass('subPageHeaderNewClass');
  }
});
// Sub Page Header

$(window).scroll(function(){
  if ($(this).scrollTop() > 900) {
     $('.headerPartTwo').addClass('headerPartTwoNewClass');
  } else {
     $('.headerPartTwo').removeClass('headerPartTwoNewClass');
  }
});
// banner
$('.banner_slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll:1,
  arrows:true,
  cssEase: 'linear',
  fade:true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 800,
  dots:true,
  prevArrow:'<i class="fas fa-chevron-left prev"></i>', 
  nextArrow:'<i class="fas fa-chevron-right next"></i>'
  // responsive: [
  //   {
  //     breakpoint: 968,
  //     settings: {
  //       arrows: false,
  //       centerPadding: '0px',
  //       slidesToShow: 1
  //     }
  //   },
  //   {
  //     breakpoint: 767,
  //     settings: {
  //       arrows: false,
  //       centerPadding: '0px',
  //       slidesToShow: 1
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       arrows: false,
  //       centerMode: false,
  //       centerPadding: '0px',
  //       slidesToShow:1
  //     }
  //   }
  // ]
});
// news Slider
$('.news_imgSlide').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll:1,
  arrows:false,
  autoplay: true,
  autoplaySpeed: 2000,
  speed: 800,
  dots:true,
  // prevArrow:'<i class="fas fa-chevron-left prev"></i>', 
  // nextArrow:'<i class="fas fa-chevron-right next"></i>',
  responsive: [
    {
      breakpoint: 968,
      settings: {
        arrows: false,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: false,
        centerPadding: '0px',
        slidesToShow:1
      }
    }
  ]
});

// Card Slider
$('.card_slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll:1,
  arrows:true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 800,
  dots:false,
  prevArrow:'<i class="fas fa-chevron-left cardPrev"></i>', 
  nextArrow:'<i class="fas fa-chevron-right cardNext"></i>',
  responsive: [
    {
      breakpoint: 968,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow:1
      }
    }
  ]
});
   // Back to Top 
   var btn = $('.backtotop');

   $(window).scroll(function() {
     if ($(window).scrollTop() > 300) {
       btn.addClass('show');
     } else {
       btn.removeClass('show');
     }
   });
   btn.on('click', function(e) {
     e.preventDefault();
     $('html, body').animate({scrollTop:0}, '300');
   });
 
// Navbar scrolalar add class
  $(window).scroll(function(){
  if ($(this).scrollTop() > 50) {
     $('.header').addClass('newclass');
  } else {
     $('.header').removeClass('newclass');
  }
});
  
// navbar off can list
var list = $('.js-dropdown-list');
var link = $('.js-link');
link.click(function(e) {
  e.preventDefault();
  list.slideToggle(200);
}); 

var list1 = $('.js-dropdown-list1');
var link1 = $('.js-link1');
link1.click(function(e) {
  e.preventDefault();
  list1.slideToggle(200);
}); 
var list2 = $('.js-dropdown-list2');
var link2 = $('.js-link2');
link2.click(function(e) {
  e.preventDefault();
  list2.slideToggle(200);
}); 

var list3 = $('.js-dropdown-list3');
var link3 = $('.js-link3');
link3.click(function(e) {
  e.preventDefault();
  list3.slideToggle(200);
}); 

var list4 = $('.js-dropdown-list4');
var link4 = $('.js-link4');
link4.click(function(e) {
  e.preventDefault();
  list4.slideToggle(200);
}); 
var list5 = $('.js-dropdown-list5');
var link5 = $('.js-link5');
link5.click(function(e) {
  e.preventDefault();
  list5.slideToggle(200);
}); var list6 = $('.js-dropdown-list6');
var link6 = $('.js-link6');
link6.click(function(e) {
  e.preventDefault();
  list6.slideToggle(200);
}); 

// AOS
AOS.init();



});