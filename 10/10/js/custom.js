$(function(){

//  Header part
$(window).scroll(function(){
  if ($(this).scrollTop() > 50) {
     $('.mob_header').addClass('mobHeaderNewClass');
  } else {
     $('.mob_header').removeClass('mobHeaderNewClass');
  }
});

// Mobile  Header part
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
  autoplaySpeed: 5000,
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
 
   
// navbar off can list
var list = $('.js-dropdown-list');
var link = $('.js-link');
link.click(function(e) {
  e.preventDefault();
  list.slideToggle(200);
}); 


});


// Timer Part Start

var countDownDate = new Date("july 7, 2022 15:37:25").getTime();
var x = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate - now;
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("demo1").innerHTML = days +"<br>"+ "Days";

document.getElementById("demo2").innerHTML = hours +"<br>"+ "Hours";
document.getElementById("demo3").innerHTML =  minutes +"<br>"+ "Mins";
document.getElementById("demo4").innerHTML =seconds +"<br>"+ "Sec ";
if (distance < 0) {
  clearInterval(x);
  document.getElementById("demo").innerHTML = "EXPIRED";
}
},0);

function Utils() {}
  Utils.prototype = {
      constructor: Utils,
      isElementInView: function (element, fullyInView) {
          var pageTop = $(window).scrollTop();
          var pageBottom = pageTop + $(window).height();
          var elementTop = $(element).offset().top;
          var elementBottom = elementTop + $(element).height();

          if (fullyInView === true) {
              return ((pageTop < elementTop) && (pageBottom > elementBottom));
          } else {
              return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
          }
      }
  };
