wp.domReady(() => {
  // Hide block preview images in hover popup
  const style = document.createElement('style');
  style.textContent = `
    div.block-editor-inserter__preview-content-missing {
      display: none !important;
    }
  `;
  document.head.appendChild(style);

  // Auto-open "List view" when editing a post or page
  function openListViewPanel() {
    const listViewButton = document.querySelector(
      'button.editor-document-tools__document-overview-toggle'
    );

    if (
      listViewButton &&
      listViewButton.getAttribute('aria-pressed') === 'false'
    ) {
      listViewButton.click(); // Open the panel if it's not already open
      return true;
    }
    return !!(listViewButton && listViewButton.getAttribute('aria-pressed') === 'true');
  }

  // Try initially and retry until it's available
  const listViewInterval = setInterval(() => {
    if (openListViewPanel()) {
      clearInterval(listViewInterval);
      listViewObserver.disconnect(); // 💡 Disconnect the observer
    }
  }, 300);

  // Watch for page transition or editor reinitialization
  const listViewObserver = new MutationObserver(() => {
    if (openListViewPanel()) {
      listViewObserver.disconnect(); // 💡 Disconnect once open
    }
  });

  listViewObserver.observe(document.body, {childList: true, subtree: true});

});
