let toggleButton = document.getElementsByClassName('toggle-button')[0]
let navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})



// slickCarousel

$(document).ready(function(){
  $('.partners-img').slick({
    slidesToShow:4,
    slidesToScroll:1,
    autoplay:true,
    arrows:false,
    dots:false,
    autoplaySpeed:2500,
    pauseOnHover:false,
    responsive:[{
      breakpoint:991,
      settings:{
        slidesToShow:3
      }
    }, {
      breakpoint:520,
      settings:{
        slidesToShow:2
      }
    }]
  });
})
