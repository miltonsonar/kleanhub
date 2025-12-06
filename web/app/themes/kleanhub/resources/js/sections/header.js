export default function() {
  const header = document.querySelector('.js-header');

  if (!header) {
    console.log('Header not found');
    return;
  }

  // Hamburger menu toggle
  const hamburger = header.querySelector('.hamburger');
  const headerMenu = header.querySelector('.header-menu');

  if (hamburger && headerMenu) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('open');
      headerMenu.classList.toggle('open');
    });

    // Close menu when resizing to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        hamburger.classList.remove('open');
        headerMenu.classList.remove('open');
      }
    });
  }

  const navPrimary = header.querySelector('.nav-primary');
  if (!navPrimary) {
    console.log('nav-primary not found');
    return;
  }

  // Get the menu with class 'nav'
  const menu = navPrimary.querySelector('ul.nav');
  if (!menu) {
    console.log('ul.nav not found');
    return;
  }

  console.log('Menu found, initializing...');

  const menuItems = menu.querySelectorAll(':scope > li');
  console.log('Menu items:', menuItems.length);

  menuItems.forEach(item => {
    // Check if item has submenu
    const submenu = item.querySelector(':scope > ul');

    if (submenu) {
      const link = item.querySelector(':scope > a');

      if (link) {
        link.addEventListener('click', (e) => {
          // Only prevent default and toggle on mobile (below lg breakpoint)
          if (window.innerWidth < 1024) {
            e.preventDefault();
            console.log('Toggling menu item on mobile');

            // Close other open menu items
            menuItems.forEach(otherItem => {
              if (otherItem !== item && otherItem.querySelector(':scope > ul')) {
                otherItem.classList.remove('open');
              }
            });

            // Toggle current item
            item.classList.toggle('open');
          }
        });
      }
    }
  });

  // Close all menus when resizing to desktop
  window.addEventListener('resize', () => {
    if (window.innerWidth >= 1024) {
      menuItems.forEach(item => {
        item.classList.remove('open');
      });
    }
  });

  // Scroll behavior - hide header on scroll down, show on scroll up
  let lastScrollTop = 0;
  let scrollThreshold = 10; // Minimum scroll distance to trigger hide/show

  window.addEventListener('scroll', () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Only trigger if scrolled more than threshold
    if (Math.abs(scrollTop - lastScrollTop) < scrollThreshold) {
      return;
    }

    if (scrollTop > lastScrollTop && scrollTop > 100) {
      // Scrolling down & past 100px
      header.classList.add('header-hidden');
    } else {
      // Scrolling up
      header.classList.remove('header-hidden');
    }

    lastScrollTop = scrollTop;
  });
}
