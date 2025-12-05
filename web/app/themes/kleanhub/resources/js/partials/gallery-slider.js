import $ from 'jquery';
import 'slick-carousel';

export default function() {
  const $slider = $('.js-gallery-slider .gallery');

  if ($slider.length) {
    $slider.slick({
      centerMode: true,
      centerPadding: '0',
      slidesToShow: 1,
      variableWidth: true,
      infinite: true,
      arrows: true,
      dots: false,
      touchMove: true,
      swipeToSlide: true,
      focusOnSelect: true,
      adaptiveHeight: false,
      prevArrow: '<button type="button" class="slick-prev"><img src="/app/themes/kleanhub/resources/images/arrow-left.png" alt="Previous"></button>',
      nextArrow: '<button type="button" class="slick-next"><img src="/app/themes/kleanhub/resources/images/arrow-right.png" alt="Next"></button>'
    });
  }
}
