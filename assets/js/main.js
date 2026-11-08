document.addEventListener('DOMContentLoaded', function () {
  
  // 1. HEADER ENTRANCE ANIMATION
  const header = document.getElementById('siteHeader');
  if (header) {
    setTimeout(() => {
      header.classList.add('ready');
    }, 150); 
  }

  // 2. SCROLL EFFECT (Header shrink & background change)
  window.addEventListener('scroll', () => {
    if (header) {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }
  });

  // 3. MOBILE DRAWER TOGGLE
  const toggle = document.querySelector('.menu-toggle');
  const drawer = document.getElementById('mobileDrawer');
  
  if (toggle && drawer) {
    toggle.addEventListener('click', function () {
      const isOpen = drawer.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      drawer.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
      
      // Luxury touch: Pigilan mag-scroll ang background habang nakabukas ang menu
      document.body.classList.toggle('menu-open', isOpen);
    });

    // Isara ang drawer kapag may clinick na link
    drawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        drawer.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        drawer.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('menu-open');
      });
    });
  }

  // 4. SCROLL PROGRESS BAR
  const progressBar = document.querySelector('.site-progress > span');
  window.addEventListener('scroll', () => {
    if (progressBar) {
      let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
      let scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      let progress = (scrollTop / scrollHeight) * 100;
      progressBar.style.width = progress + '%';
    }
  });

});