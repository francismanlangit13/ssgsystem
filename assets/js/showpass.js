function addTogglePasswordListener(togglePassword, password) {
    togglePassword.addEventListener('click', function (e) {
  
      // Toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
  
      // Toggle the eye slash icon
      if (togglePassword.src.match(base_url + "assets/files/images/system/eye-close.png")) {
        togglePassword.src = base_url + "assets/files/images/system/eye-open.png";
      } else {
        togglePassword.src = base_url + "assets/files/images/system/eye-close.png";
      }
    });
  }
  
  // Usage
  addTogglePasswordListener(document.querySelector('#togglePassword'), document.querySelector('#password'));
  addTogglePasswordListener(document.querySelector('#togglePassword1'), document.querySelector('#password1'));
  