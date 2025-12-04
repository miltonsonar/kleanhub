/**
 * Testimonials - Mobile Slider
 *
 * Slick slider for mobile view only
 */

import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';

export default function initTestimonials() {
  const $slider = $('.testimonials-slider');

  if (!$slider.length) return;

  // Get layout from data attribute
  const layout = $slider.data('layout') || 'grid-cols-3';
  const desktopSlides = layout === 'grid-cols-2' ? 2 : (layout === 'grid-cols-4' ? 4 : 3);

  function initSlider() {
    if ($slider.hasClass('slick-initialized')) {
      $slider.slick('unslick');
    }

    const slidesToShow = $(window).width() < 768 ? 1.2 : desktopSlides;

    $slider.slick({
      slidesToShow: slidesToShow,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      infinite: false,
      touchMove: true,
      swipe: true,
      mobileFirst: true
    });
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
