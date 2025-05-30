// Class to manage the behavior of the registration form.
class ClassRegister2 {
  // The constructor is executed automatically when an instance of the class is created.
  constructor() {
    // Adds a listener to the 'openLogin2' button to switch to the login form when clicked.
    openLogin2.addEventListener("click", () => {
      // Opens the login window using the 'classlogin2' instance.
      classlogin2.openLogin(true);

      // Closes the registration window using 'this' (referring to the current instance).
      this.openRegister(false);

      // Changes the preview image to the login image.
      classPreviewLogin.changeImage("login");
    });

    // Adds a listener to the 'enterRegister2' button for registration validation and submission.
    enterRegister2.addEventListener("click", () => {
      // If name, email, and password are valid, send the registration request.
      if (this.validateNameRegister2() && this.validateEmailRegister2() && this.validatePasswordRegister2() && this.validateTermsConditions2()) {

        // Make the AJAX request for registration.
        this.makeAjaxRequestRegister();
      }
    });


  /*  registerWithGoogle2.addEventListener("click", function(){
    })*/

  /*  registerWithFacebook2.addEventListener("click", function(){
    })

    registerWithApple2.addEventListener("click", function(){
    })*/
  }
  makeAjaxRequestRegister() {
    const url = "../../controller/users/register.php?ajax=true"; // API endpoint
    const data = {
      action: "register",
      nameRegister: register2Name.value.trim(),
      emailRegister: register2Email.value.trim(),
      passwordRegister: register2Password.value.trim(),
      signupCategory: "normal"
    };



    // Show loading indicator
    chargingClass.hideShowchargin(true);

    fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(`Network error: ${response.status}`);
      }
      return response.json(); // Expecting JSON response
    })
    .then(data => {
      //alert(JSON.stringify(data));
      chargingClass.hideShowchargin(false); // Hide loading indicator

      switch (data.messageRegister) {
        case "1":
          alert("Registration successful. Welcome to our community! Please log in.");
          // Opens the login window using the 'classlogin2' instance.
          classlogin2.openLogin(true);

          // Closes the registration window using 'this' (referring to the current instance).
          this.openRegister(false);

          // Changes the preview image to the login image.
          classPreviewLogin.changeImage("login");
          break;
        case "0":
          alert("Registration unsuccessful. The user already exists.");
          break;
        default:
          alert("An unexpected error occurred. Please try again.");
          break;
      }
    })
    .catch(error => {
      console.error("Error:", error);
      alert("A network error occurred. Please check your connection.");
      //location.reload();
    });
  }

  // Function to show or hide the register panel based on the action parameter.
  toggleRegisterPanel(action) {
    // If action is true, show the panel, otherwise hide it.
    if (action) {
      register2.style.display = "block"; // Show the panel.
    } else {
      register2.style.display = "none"; // Hide the panel.
    }
  }

  // Method to show or hide the registration window.
  openRegister(action) {
    // If 'action' is true, show the registration form.
    if (action) {
      register2.style.display = "block"; // Show the registration form.
    } else {
      // If 'action' is false, hide the registration form.
      register2.style.display = "none"; // Hide the registration form.
    }
  }

  // Name validation for registration.
  validateNameRegister2() {
    const name = register2Name.value.trim(); // Get name and remove extra spaces.
    if (name === "") {
      alert("Name field is required"); // Show error if name is empty.
      register2Name.style.border = "3px solid #8B0000"; // Highlight field in red.
      return false; // Validation fails.
    }
    register2Name.style.border = "3px solid transparent"; // Reset border if valid.
    return true; // Validation passes.
  }

  // Email validation for registration.
  validateEmailRegister2() {
    const email = register2Email.value.trim(); // Get email and remove extra spaces.
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // Regex for valid email format.
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email"); // Show error if email is invalid.
      register2Email.style.border = "3px solid #8B0000"; // Highlight field in red.
      return false; // Validation fails.
    }
    register2Email.style.border = "3px solid transparent"; // Reset border if valid.
    return true; // Validation passes.
  }

  // Password validation for registration.
  validatePasswordRegister2() {
    const password = register2Password.value.trim(); // Get password and remove extra spaces.
    if (password.length < 6) {
      alert("Password must be at least 6 characters"); // Show error if password is too short.
      register2Password.style.border = "3px solid #8B0000"; // Highlight field in red.
      return false; // Validation fails.
    }
    register2Password.style.border = "3px solid transparent"; // Reset border if valid.
    return true; // Validation passes.
  }
  // terms and Conditions
  validateTermsConditions2() {
      if (!aceptTermsConditions2.checked) {
          alert("Please accept the Terms and Conditions.");
          return false; // Evita que el formulario se envíe
      }

        return true; // Permite el envío si está marcado
      }
}

// Get the DOM elements related to registration and login.
//const register2 = document.getElementById("register2");

const registerWithGoogle2 = document.getElementById("registerWithGoogle2");
//const registerWithFacebook2 = document.getElementById("registerWithFacebook2");
//const registerWithApple2 = document.getElementById("registerWithApple2");


const openLogin2 = document.getElementById("openLogin2");
const enterRegister2 = document.getElementById("enterRegister2");
const register2Name = document.getElementById("register2Name");
const register2Email = document.getElementById("register2Email");
const register2Password = document.getElementById("register2Password");
const aceptTermsConditions2 = document.getElementById("acept_terms_conditions2");

// Create an instance of the 'ClassRegister' class.
const classRegister2 = new ClassRegister2();
