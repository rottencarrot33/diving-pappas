



// slickCarousel

$(document).ready(function () {
  $(".partners-img").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 2500,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
});
