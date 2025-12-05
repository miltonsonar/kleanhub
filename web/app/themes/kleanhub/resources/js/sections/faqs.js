/**
 * FAQs - Accordion functionality
 *
 * Handles expanding/collapsing FAQ items with smooth slide animation
 */

export default function initFaqs() {
  const faqsContainer = document.querySelector('.js-faqs');

  if (!faqsContainer) return;

  const faqItems = faqsContainer.querySelectorAll('.faq');

  faqItems.forEach(faq => {
    const answer = faq.querySelector('.answer');

    // Set initial max-height for open items
    if (faq.classList.contains('active')) {
      answer.style.maxHeight = answer.scrollHeight + 'px';
    } else {
      answer.style.maxHeight = '0';
    }

    faq.addEventListener('click', () => {
      const isActive = faq.classList.contains('active');
      const arrowUp = faq.querySelector('.arrow-up');
      const arrowDown = faq.querySelector('.arrow-down');

      if (isActive) {
        // Close the FAQ with slide up animation
        faq.classList.remove('active');
        answer.style.maxHeight = '0';
        arrowUp.classList.add('hidden');
        arrowDown.classList.remove('hidden');
      } else {
        // Open the FAQ with slide down animation
        faq.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
        arrowUp.classList.remove('hidden');
        arrowDown.classList.add('hidden');
      }
    });
  });
}
