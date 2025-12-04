/**
 * Content Columns - Clickable Cards
 *
 * Makes entire card clickable when it has a CTA
 */

export default function initContentColumns() {
  const cards = document.querySelectorAll('.content-col[data-card-link], .content-col[data-card-modal]');

  if (!cards.length) return;

  cards.forEach(card => {
    card.addEventListener('click', (e) => {
      // Don't trigger if clicking on the CTA itself (to allow normal link/button behavior)
      if (e.target.closest('a, button')) return;

      // Handle link cards
      const cardLink = card.getAttribute('data-card-link');
      const cardTarget = card.getAttribute('data-card-target');

      if (cardLink) {
        if (cardTarget === '_blank') {
          window.open(cardLink, '_blank');
        } else {
          window.location.href = cardLink;
        }
      }

      // Handle modal cards
      const cardModal = card.getAttribute('data-card-modal');
      if (cardModal) {
        const button = card.querySelector(`[data-modal-open="${cardModal}"]`);
        if (button) {
          button.click();
        }
      }
    });
  });
}
