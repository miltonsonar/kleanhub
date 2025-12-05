/**
 * Accordion Content - Accordion functionality
 *
 * Handles expanding/collapsing accordion items with smooth slide animation
 */

export default function initAccordionContent() {
  const accordionContainer = document.querySelector('.js-accordion-content');

  if (!accordionContainer) return;

  const accordionItems = accordionContainer.querySelectorAll('.accordion-item');

  accordionItems.forEach(item => {
    const answer = item.querySelector('.answer');

    // Set initial max-height for open items
    if (item.classList.contains('active')) {
      answer.style.maxHeight = answer.scrollHeight + 'px';
    } else {
      answer.style.maxHeight = '0';
    }

    item.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      const arrowUp = item.querySelector('.arrow-up');
      const arrowDown = item.querySelector('.arrow-down');

      if (isActive) {
        // Close the accordion item with slide up animation
        item.classList.remove('active');
        answer.style.maxHeight = '0';
        arrowUp.classList.add('hidden');
        arrowDown.classList.remove('hidden');
      } else {
        // Open the accordion item with slide down animation
        item.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
        arrowUp.classList.remove('hidden');
        arrowDown.classList.add('hidden');
      }
    });
  });
}
