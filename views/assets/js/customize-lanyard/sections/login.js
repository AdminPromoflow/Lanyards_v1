// Class to manage the behavior of the login and registration forms
class Classlogin2 {
  constructor() {
    alert("Al menos estamos entrando");
    // Listener to switch from login to registration form
    openRegister2.addEventListener("click", () => {
      alert("hicimos un berraco click");
      if (typeof ClassRegisterCurstomize !== "undefined") {
        console.warn("ClassRegisterCurstomize ya está definida");
        console.trace(); // Muestra el stack trace en la consola
        alert("¡Clase duplicada detectada! Revisa la consola para más información.");
      }
      this.openLogin(false);                   // Hide login form
      classRegister.openRegister(true);        // Show registration form
      classPreviewLogin.changeImage("register"); // Change image preview
      if (typeof ClassRegisterCurstomize !== "undefined") {
          alert("Clase duplicada");
          console.trace();
        }
    });

    // Listener for login submission
    enterLogin2.addEventListener("click", () => {
      alert("hahah");
      if (this.validateEmail() && this.validatePassword()) {
        const url = "../../controller/users/login.php";
        const data = {
          action: "login",
          emailLogin: login2Email.value,
          passwordLogin: login2Password.value
        };
        loginClass.makeAjaxRequestLogin(url, data);
      }
    });

    // Social login event listeners (placeholders)
    loginWithGoogle2.addEventListener("click", function () {
      // TODO: Add Google login functionality
    });



  }

  // Method to show or hide the login form
  openLogin(action) {
    login2.style.display = action ? "block" : "none";
  }

  // Email validation for login
  validateEmail() {
    const email = login2Email.value.trim();
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!emailPattern.test(email)) {
      alert("Please enter a valid email");
      login2Email.style.border = "3px solid #8B0000";
      return false;
    }

    login2Email.style.border = "3px solid transparent";
    return true;
  }

  // Password validation for login
  validatePassword() {
    const password = login2Password.value.trim();

    if (password.length < 6) {
      alert("Password must be at least 6 characters");
      login2Password.style.border = "3px solid #8B0000";
      return false;
    }

    login2Password.style.border = "3px solid transparent";
    return true;
  }
}

// DOM elements for login and registration
const login2 = document.getElementById("login2");

const loginWithGoogle2 = document.getElementById("loginWithGoogle2");
const loginWithFacebook2 = document.getElementById("loginWithFacebook2");
const loginWithApple2 = document.getElementById("loginWithApple2");

const enterLogin2 = document.getElementById("enterLogin2");
const login2Email = document.getElementById("login2Email");
const login2Password = document.getElementById("login2Password");
const openRegister2 = document.getElementById("openRegister2");

// Create an instance of the login class
const classlogin2 = new Classlogin2();
