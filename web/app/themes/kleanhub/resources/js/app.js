import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

// Load JS modules dynamically from blocks/
const partialModules = import.meta.glob('./partials/*.js');
const sectionModules = import.meta.glob('./sections/*.js');

// Helper function to auto-init modules based on class name
function autoInitModules(modules) {
  Object.entries(modules).forEach(([path, loader]) => {
    const name = path.match(/\.\/(?:partials|sections)\/(.*)\.js$/)[1]; // extract name
    const className = `.js-${name}`; // target .js-name

    if (document.querySelector(className)) {
      loader().then((mod) => {
        if (typeof mod.default === 'function') {
          mod.default(); // run default export
        }
      });
    }
  });
}

// Auto-init from both sources
autoInitModules(partialModules);
autoInitModules(sectionModules);
