import $ from 'jquery';
import 'slick-carousel';
import arrowLeft from '@images/arrow-left.png';
import arrowRight from '@images/arrow-right.png';

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
      prevArrow: `<button type="button" class="slick-prev"><img src="${arrowLeft}" alt="Previous"></button>`,
      nextArrow: `<button type="button" class="slick-next"><img src="${arrowRight}" alt="Next"></button>`
    });
  }
}
