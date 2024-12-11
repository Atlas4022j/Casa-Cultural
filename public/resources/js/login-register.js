const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_form = document.querySelector(".sign-in-form");
const sign_up_form = document.querySelector(".sign-up-form");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// Función para validar el formulario
function validateForm(form) {
  const inputs = form.querySelectorAll('input[required]');
  let isValid = true;

  inputs.forEach(input => {
    if (!input.value.trim()) {
      isValid = false;
      showError(input, 'Este campo es obligatorio');
    } else {
      clearError(input);
    }
  });

  return isValid;
}

// Función para mostrar errores
function showError(input, message) {
  const errorElement = input.parentElement.querySelector('.error-message');
  if (!errorElement) {
    const error = document.createElement('span');
    error.className = 'error-message';
    error.style.color = 'red';
    error.style.fontSize = '0.8rem';
    error.style.marginTop = '5px';
    input.parentElement.appendChild(error);
  }
  errorElement.textContent = message;
  input.classList.add('input-error');
}

// Función para limpiar errores
function clearError(input) {
  const errorElement = input.parentElement.querySelector('.error-message');
  if (errorElement) {
    errorElement.remove();
  }
  input.classList.remove('input-error');
}

// Evento de envío para el formulario de inicio de sesión
sign_in_form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (validateForm(sign_in_form)) {
    console.log('Formulario de inicio de sesión enviado');
    // Aquí puedes agregar la lógica para enviar los datos al servidor
  }
});

// Evento de envío para el formulario de registro
sign_up_form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (validateForm(sign_up_form)) {
    console.log('Formulario de registro enviado');
    // Aquí puedes agregar la lógica para enviar los datos al servidor
  }
});

// Animación de entrada para los elementos del formulario
function animateFormElements() {
  const elements = document.querySelectorAll('.input-field, .btn, .social-icon');
  elements.forEach((element, index) => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    setTimeout(() => {
      element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      element.style.opacity = '1';
      element.style.transform = 'translateY(0)';
    }, index * 100);
  });
}

// Llamar a la función de animación cuando se carga la página
window.addEventListener('load', animateFormElements);

// Efecto de hover para los botones sociales
const socialIcons = document.querySelectorAll('.social-icon');
socialIcons.forEach(icon => {
  icon.addEventListener('mouseenter', () => {
    icon.style.transform = 'scale(1.1) rotate(5deg)';
  });
  icon.addEventListener('mouseleave', () => {
    icon.style.transform = 'scale(1) rotate(0deg)';
  });
});

// Animación del fondo
const background = document.querySelector('.container:before');
let gradientPosition = 0;

function animateBackground() {
  gradientPosition += 0.5;
  background.style.backgroundImage = `linear-gradient(-45deg, #4481eb ${gradientPosition}%, #04befe ${gradientPosition + 100}%)`;
  requestAnimationFrame(animateBackground);
}

animateBackground();