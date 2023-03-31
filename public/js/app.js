// When Mobile Menu button is clicked, toggle the class "hidden" on the menu
const navbarbtn = document.querySelector('[data-collapse-toggle="navbar-multi-level"]');
const target = document.querySelector('#navbar-multi-level');
navbarbtn.addEventListener('click', () => {
  navbarbtn.setAttribute('aria-expanded', navbarbtn.getAttribute('aria-expanded') === 'false' ? 'true' : 'false');
  target.classList.toggle('hidden');
});

// Dropdown MENUS fadedouni merci
const dropdownBtns = document.querySelectorAll('.dropdown-btn');
const dropdownMenus = document.querySelectorAll('.dropdown-menu');

dropdownBtns.forEach((dropdownBtn, index) => {
  dropdownBtn.addEventListener('mouseenter', () => {
    closeAllMenus();
    dropdownMenus[index].classList.remove('hidden');
  });
});
dropdownMenus.forEach((menu) => {
  menu.addEventListener('mouseenter', () => {
    menu.classList.remove('hidden');
  });
  menu.addEventListener('mouseleave', () => {
    menu.classList.add('hidden');
  });
});
document.addEventListener('mouseleave', () => {
  closeAllMenus();
});
function closeAllMenus() {
  dropdownMenus.forEach((menu) => {
    if (!menu.classList.contains('hidden')) {
      menu.classList.add('hidden');
    }
  });
}
const subdropdownBtns = document.querySelectorAll('.subdropdown-btn');
const subdropdownMenus = document.querySelectorAll('.subdropdown-menu');
let activeSubdropdown = null;

subdropdownBtns.forEach((subdropdownBtn, index) => {
  subdropdownBtn.addEventListener('mouseenter', () => {
    if (activeSubdropdown !== null && activeSubdropdown !== subdropdownMenus[index]) {
      activeSubdropdown.classList.add('hidden');
    }
    subdropdownMenus[index].classList.toggle('hidden');
    activeSubdropdown = subdropdownMenus[index];
  });
});

document.addEventListener('click', (event) => {
  if (!event.target.closest('.dropdown-menu')) {
    subdropdownMenus.forEach((subdropdownMenu) => {
      subdropdownMenu.classList.add('hidden');
    });
    activeSubdropdown = null;
  }
});