/**
 * Modal functionality
 *
 * Usage:
 * - Add class "js-modal" to any element on the page
 * - Buttons: data-modal-open="modal-id"
 * - Modals: data-modal="modal-id"
 * - Close buttons: data-modal-close
 */

export default function initModal() {
  const openButtons = document.querySelectorAll('[data-modal-open]');
  const closeButtons = document.querySelectorAll('[data-modal-close]');
  const modals = document.querySelectorAll('[data-modal]');

  if (!openButtons.length && !modals.length) return;

  // Open modal
  openButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const modalId = button.getAttribute('data-modal-open');
      const modal = document.querySelector(`[data-modal="${modalId}"]`);

      if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scroll
      }
    });
  });

  // Close modal
  const closeModal = (modal) => {
    modal.classList.add('hidden');
    document.body.style.overflow = ''; // Restore scroll
  };

  // Close button click
  closeButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const modal = button.closest('[data-modal]');
      if (modal) closeModal(modal);
    });
  });

  // Backdrop click (click outside modal content)
  modals.forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        closeModal(modal);
      }
    });
  });

  // Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      modals.forEach(modal => {
        if (!modal.classList.contains('hidden')) {
          closeModal(modal);
        }
      });
    }
  });
}
