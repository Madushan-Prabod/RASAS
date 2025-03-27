document.addEventListener('DOMContentLoaded', () => {
  const logoContainer = document.getElementById('logoContainer');
  const loadingOverlay = document.getElementById('loadingOverlay');
  const content = document.getElementById('content');

  const img = new Image();
  img.src = 'assets/images/rasas_logo.png';
  img.onload = () => {
      logoContainer.classList.add('loaded');
  };

  setTimeout(() => {
      loadingOverlay.classList.add('fade-out');
      loadingOverlay.addEventListener('animationend', () => {
          loadingOverlay.style.display = 'none';
          content.style.display = 'block';
      }, { once: true });
  }, 5000);
});


function createPopup(el, msg) {
  const popup = document.createElement('div');
  popup.classList.add('popup');
  popup.textContent = msg;
  el.appendChild(popup);
  setTimeout(() => {
    popup.classList.add('fade-out');
    popup.addEventListener('animationend', () => {
      popup.remove();
    }, { once: true });
  }, 2000);
}

document.querySelectorAll('.date').forEach(el => {
  el.addEventListener('mouseover', e => {
    const date = new Date(el.textContent);
    const now = new Date();
    const diffTime = date - now;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    const msg = `Only ${diffDays} days left until the event!`;
    createPopup(el, msg);
  });
  el.addEventListener('mouseout', e => {
    const popup = el.querySelector('.popup');
    if (popup) {
      popup.remove();
    }
  });
});




const hamburger = document.querySelector('.hamburger');
        const nav = document.querySelector('.nav');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open'); // Toggles the "open" class on the hamburger
            nav.classList.toggle('active');    // Toggles the visibility of the navigation menu
        });
