const form = document.querySelector('form');
const idInput = form.querySelector('input[name="id"]');
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');

// validate ID input
idInput.addEventListener('input', (event) => {
  const value = event.target.value;
  if (!/^\d{8}$/.test(value)) {
    event.target.setCustomValidity('il faut que l\'ID soit composé de 8 chiffres');
  } else {
    event.target.setCustomValidity('');
  }
});

// validate email input
emailInput.addEventListener('input', (event) => {
  const value = event.target.value;
  if (!value.endsWith('@isikef.u-jendouba.tn')) {
    event.target.setCustomValidity('il faut que l\'email soit de type @isikef.u-jendouba.tn');
  } else {
    event.target.setCustomValidity('');
  }
});


// submit form
form.addEventListener('submit', (event) => {
  if (!form.checkValidity()) {
    event.preventDefault();
  }
  form.classList.add('was-validated');
});