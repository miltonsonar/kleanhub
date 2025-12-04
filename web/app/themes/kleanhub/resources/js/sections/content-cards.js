/**
 * Content Cards - Mobile Slider
 *
 * Slick slider for mobile view only
 */

import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';

export default function initContentCards() {
  const $slider = $('.cards-slider');

  if (!$slider.length) return;

  function initSlider() {
    if ($(window).width() < 768) {
      if (!$slider.hasClass('slick-initialized')) {
        $slider.slick({
          slidesToShow: 1.2,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
          infinite: false,
          touchMove: true,
          swipe: true,
          mobileFirst: true
        });
      }
    } else {
      if ($slider.hasClass('slick-initialized')) {
        $slider.slick('unslick');
      }
    }
  }

  // Initialize on load
  initSlider();

  // Re-initialize on window resize with debounce
  let resizeTimer;
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      initSlider();
    }, 250);
  });
}
