document.addEventListener('DOMContentLoaded', function() {
  const registerForm = document.getElementById('registerForm');
  const loginForm = document.getElementById('loginForm');
  const showLoginLink = document.getElementById('showLogin');
  const showRegisterLink = document.getElementById('showRegister');

  function showLogin() {
      registerForm.style.display = 'none';
      loginForm.style.display = 'flex';
  }

  function showRegister() {
      loginForm.style.display = 'none';
      registerForm.style.display = 'flex';
  }

  showLoginLink.addEventListener('click', function(e) {
      e.preventDefault();
      showLogin();
  });

  showRegisterLink.addEventListener('click', function(e) {
      e.preventDefault();
      showRegister();
  });

  // Inicialmente, muestra el formulario de registro
  showRegister();

  // Animación para los campos de entrada
  const inputs = document.querySelectorAll('input');
  inputs.forEach(input => {
      input.addEventListener('focus', function() {
          this.parentNode.classList.add('focus');
      });
      input.addEventListener('blur', function() {
          if (this.value === '') {
              this.parentNode.classList.remove('focus');
          }
      });
  });
});