// Class to manage the behavior of the registration form.


class ClassRegisterCurstomize {
  constructor(){
    
      console.trace(); // Muestra el stack trace en la consola

  }
/*  constructor() {
    // Adds a listener to the 'openLogin2' button to switch to the login form when clicked.
    openLogin2.addEventListener("click", () => {
      classlogin2.openLogin(true);           // Opens the login window
      this.openRegister(false);              // Closes the registration window
      classPreviewLogin.changeImage("login"); // Changes the preview image to login
    });

    // Adds a listener to the 'enterRegister2' button for registration validation and submission.
    enterRegister2.addEventListener("click", () => {
      if (
        this.validateNameRegister2() &&
        this.validateEmailRegister2() &&
        this.validatePasswordRegister2()
      ) {
        const url = "../../controller/users/register.php";
        const data = {
          action: "register",
          nameRegister: register2Name.value,
          emailRegister: register2Email.value,
          passwordRegister: register2Password.value
        };
        registerClass.makeAjaxRequestRegister(url, data);
      }
    });

    // Placeholder listener for Google register
    registerWithGoogle2.addEventListener("click", function () {
      // TODO: Add Google login logic
    });



  }

  // Method to show or hide the registration window.
  openRegister(action) {
    register2.style.display = action ? "block" : "none";
  }

  // Optional method to toggle register panel (same as openRegister, can be refactored to one)
  toggleRegisterPanel(action) {
    this.openRegister(action);
  }

  // Name validation for registration.
  validateNameRegister2() {
    const name = register2Name.value.trim();
    if (name === "") {
      alert("Name field is required");
      register2Name.style.border = "3px solid #8B0000";
      return false;
    }
    register2Name.style.border = "3px solid transparent";
    return true;
  }

  // Email validation for registration.
  validateEmailRegister2() {
    const email = register2Email.value.trim();
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email");
      register2Email.style.border = "3px solid #8B0000";
      return false;
    }
    register2Email.style.border = "3px solid transparent";
    return true;
  }

  // Password validation for registration.
  validatePasswordRegister2() {
    const password = register2Password.value.trim();
    if (password.length < 6) {
      alert("Password must be at least 6 characters");
      register2Password.style.border = "3px solid #8B0000";
      return false;
    }
    register2Password.style.border = "3px solid transparent";
    return true;
  }*/
}

// DOM elements

/*const registerWithGoogle2 = document.getElementById("registerWithGoogle2");
// const registerWithFacebook2 = document.getElementById("registerWithFacebook2");
// const registerWithApple2 = document.getElementById("registerWithApple2");

const openLogin2 = document.getElementById("openLogin2");
const enterRegister2 = document.getElementById("enterRegister2");
const register2Name = document.getElementById("register2Name");
const register2Email = document.getElementById("register2Email");
const register2Password = document.getElementById("register2Password");
const register2 = document.getElementById("register2");

*/
// Instance of the registration class
//const classRegisterCustomize = new ClassRegisterCurstomize();
