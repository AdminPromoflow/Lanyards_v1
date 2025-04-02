// Define a class called "Register"
class Register {
  constructor() {
    this.closeRegister();
    this.hideRegister(0);
    // Event listener to close the register form
    closeRegister.addEventListener("click", function () {
      // Call the closeRegister method of the Register class
      registerClass.closeRegister();
      // Call the closeLogin method of the Login class (assuming there's a Login class)
      loginClass.closeLogin();
      // Show the login form with a sliding animation
      loginClass.showLogin(700);
      // Hide the register form with a sliding animation
      registerClass.hideRegister(700);
    });

    registerWithGoogle1.addEventListener("click", function(){
        loginClass.makeAjaxRequestLoginWithGoogle();
    //  registerClass.makeAjaxRequestRegisterWithGoogle();
    })
    registerWithFacebook1.addEventListener("click", function(){
    })


    // Event listener to open the register form from the login screen
    openRegisterFromLogin.addEventListener("click", function () {
      // Hide the login form with a sliding animation
      loginClass.hideLogin(0);
      // Show the register form with a sliding animation
      registerClass.showRegister(0);
    });

    // Add an event listener to the registration button
    submitBtnRegister.addEventListener("click", function () {
      // Call validation functions and display error or success messages
      if (registerClass.validateName() && registerClass.validateEmail() && registerClass.validatePassword() && registerClass.validateTermsConditions()) {
        chargingClass.hideShowchargin(true);
        // Make the AJAX request
        registerClass.makeAjaxRequestRegister();
      }
    });

  }

  // Method to open the register form
  openRegister() {
    // Set the position and transformation of the "register" element
    register.style.left = "50%";
    register.style.transform = "translate(-50%, -50%)";
  }

  // Method to close the register form
  closeRegister() {
    if (closeRegisterSide == "left") {
      register.style.left = "100%";
      closeRegisterSide = "right";
    } else if (closeRegisterSide == "right") {
      register.style.left = "-100%";
      closeRegisterSide = "left";
    }
    register.style.transform = "translateY(-50%)";
  }

  // Method to show the register form with a delay
  showRegister(time) {
    // Delay the animation to allow time for the transition
    setTimeout(function () {
      // Perform rotation animations on login and register elements
      containerRegister.style.transform = "perspective(600px) rotateY(-360deg)";

      // Control the visibility of the front and back faces of the elements
      containerRegister.style.backfaceVisibility = "visible";

      // Adjust the Z-index to display the register form on top
      register.style.zIndex = "14";
    }, time); // 700 milliseconds delay
  }

  // Method to hide the register form with a delay
  hideRegister(time) {
    setTimeout(function () {
      containerRegister.style.transform = "perspective(600px) rotateY(-180deg)";
      containerRegister.style.backfaceVisibility = "hidden";
      register.style.zIndex = "13";
    }, time); // 700 milliseconds delay
  }

  // Name validation function
  validateName() {
    // Get the value of the name input and remove leading/trailing whitespace
    const name = nameRegister.value.trim();
    if (name === "") {
      // If the name is empty, show an error message
      alert("Name field is required");
      nameRegister.style.border = "3px solid #8B0000";
      return false; // Validation fails
    }
    // Clear any previous error messages
    nameRegister.style.border = "3px solid transparent";

    return true; // Validation passes
  }

  // terms and Conditions
  validateTermsConditions() {
      if (!aceptTermsConditions.checked) {
          alert("Please accept the Terms and Conditions.");
          return false; // Evita que el formulario se envíe
      }

        return true; // Permite el envío si está marcado
      }

  // Email validation function
  validateEmail() {
    // Get the value of the email input and remove leading/trailing whitespace
    const email = emailRegister.value.trim();
    // Regular expression pattern to check for a valid email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
      // If email doesn't match the pattern, show an error message
      alert("Please enter a valid email");
      emailRegister.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    emailRegister.style.border = "3px solid transparent";
    return true; // Validation passes
  }

  // Password validation function
  validatePassword() {
    // Get the value of the password input and remove leading/trailing whitespace
    const password = passwordRegister.value.trim();
    if (password.length < 6) {
      // If password is too short, show an error message
      alert("Password must be at least 6 characters");
      passwordRegister.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    passwordRegister.style.border = "3px solid transparent";
    return true; // Validation passes
  }

  // Function to make the AJAX request
  makeAjaxRequestRegister() {
    const url = "../../controller/users/register.php?ajax=true"; // API endpoint
    const data = {
      action: "register",
      nameRegister: nameRegister.value.trim(),
      emailRegister: emailRegister.value.trim(),
      passwordRegister: passwordRegister.value.trim(),
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
      alert(JSON.stringify(data));
      chargingClass.hideShowchargin(false); // Hide loading indicator

      switch (data.message) {
        case "1":
          alert("Successful registration. Welcome to our community!");
          loginClass.showLogin(700);
          registerClass.hideRegister(700);
          break;
        case "-1":
          alert("An error occurred while sending the confirmation email.");
          loginClass.showLogin(0);
          registerClass.hideRegister(0);
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

  makeAjaxRequestRegisterWithGoogle() {
      // Define the URL and the data to be sent
      const url = "../../controller/users/register-google.php";
      const data = {
          action: "registerGoogle"
      };

      // Construct the query parameters and full URL
      const queryParams = new URLSearchParams(data).toString(); // Generate query parameters
      const fullUrl = `${url}?${queryParams}`; // Append query parameters to the URL

      // Make the request using the Fetch API with GET method
      fetch(fullUrl, {
          method: "GET" // Use GET method
      })
      .then(response => {
          if (!response.ok) {
              throw new Error("Network error.");
          }
          return response.text(); // You can use .json() if expecting a JSON response
      })
      .then(data => {
      //  alert(JSON.stringify(data));
        window.location.href = data;
        //  alert("The registration has been successful. Now you can log in."); // Display the data from the response
          // Optionally, redirect based on the data received
        //  location.reload();
      })
      .catch(error => {
          console.error("Error:", error); // Log any errors to the console
      });
  }

}

// Get DOM elements for the register
const openRegisterFromLogin = document.getElementById("openRegisterFromLogin");
const closeRegister = document.getElementById("closeRegister");
const containerRegister = document.getElementById("containerRegister");
const register = document.getElementById("register");

const nameRegister = document.getElementById("nameRegister");
const emailRegister = document.getElementById("emailRegister");
const passwordRegister = document.getElementById("passwordRegister");

const registerWithGoogle1 = document.getElementById("registerWithGoogle1");
const registerWithFacebook1 = document.getElementById("registerWithFacebook1");
const aceptTermsConditions = document.getElementById("acept_terms_conditions");



// Set the initial position of the "register" element
let closeRegisterSide = "left";

// Create an instance of the Register class
const registerClass = new Register();
