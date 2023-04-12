const form = document.querySelector('form');
const id = form.querySelector('input[name="id"]');
const nom = form.querySelector('input[name="nom"]');
const prenom = form.querySelector('input[name="prenom"]');
const email = form.querySelector('input[name="email"]');
const password = form.querySelector('input[name="password"]');

id.addEventListener('input', (event) => {
  const value = event.target.value;
  if (!/^\d{8}$/.test(value)) {
    event.target.setCustomValidity('il faut que l\'ID soit composé de 8 chiffres');
  } else {
    event.target.setCustomValidity('');
  }
});


email.addEventListener('input', (event) => {
  const value = event.target.value;
  if (!value.endsWith('@isikef.u-jendouba.tn')) {
    event.target.setCustomValidity('il faut que l\'email soit de type @isikef.u-jendouba.tn');
  } else {
    event.target.setCustomValidity('');
  }
});

password.addEventListener("input", (event) => {
  const value = event.target.value;
  if (!/^\d{8}$/.test(value)) {
    event.target.setCustomValidity(
      "il faut que le mot de passe soit composé de 8 chiffres"
    );
  } else {
    event.target.setCustomValidity("");
  }
});


form.addEventListener('submit', (event) => {
  if (!form.checkValidity()) {
    event.preventDefault();
  }
    if (
      !id.value ||
      !nom.value ||
      !prenom.value ||
      !email.value ||
      !password.value
    ) {
      event.preventDefault();
      alert("Tous les champs sont obligatoires");
    }
  form.classList.add('was-validated');
});