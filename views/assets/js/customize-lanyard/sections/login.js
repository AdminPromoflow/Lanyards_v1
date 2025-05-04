// Class to manage the behavior of the login and registration forms
class Classlogin2 {
  constructor() {
    // Listener to switch from login to registration form
    openRegister2.addEventListener("click", () => {

      this.openLogin(false);                   // Hide login form
      classRegister2.openRegister(true);        // Show registration form
      classPreviewLogin.changeImage("register"); // Change image preview

    });

    const password_forgotten2 = document.getElementById("password_forgotten2");


    password_forgotten2.addEventListener("click", function(){
      passwordForgotten.setForgottenPassword2(true);
      passwordForgotten.showPasswordForgotten(true);

    });





    // Event listener to open the register form from the login screen
    enterLogin2.addEventListener("click", function () {
      // Call validation functions and display error or success messages
      if (classlogin2.validateEmail() && classlogin2.validatePassword()) {

        chargingClass.hideShowchargin(true);

        // Make the AJAX request
        classlogin2.makeAjaxRequestLogin();
      }
    });


  }


  // Function to make the AJAX request
  makeAjaxRequestLogin() {
    // Define the URL and the JSON data you want to send
    const url = "../../controller/users/login.php"; // Replace with your API endpoint URL
    const data = {
      action: "login",
      emailLogin: login2Email.value,
      passwordLogin: login2Password.value
    };

    fetch(url, {
    method: "POST", // HTTP POST method to send data
    headers: {
      "Content-Type": "application/json" // Indicate that you're sending JSON
    },
    body: JSON.stringify(data) // Convert the JSON object to a JSON string and send it
  })
    .then(response => {
      // Check if the response status is OK (2xx range)
      if (response.ok) {
        return response.json(); // Parse the response as JSON
      }
      // For other errors, throw a general network error
      throw new Error("Network error.");
    })
    .then(data => {
      // Process the response data
      chargingClass.hideShowchargin(false);

      if (data.message) {
        alert(data.message);
        //location.reload();
      }
      else{
        alert("The email address or password you entered is incorrect.");
      }
    })
    .catch(error => {
      // Handle specific errors (from throw in the .then block)
      console.error("Error:", error.message);
      alert(error.message); // Show the error message in an alert
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

//const loginWithGoogle2 = document.getElementById("loginWithGoogle2");
const loginWithFacebook2 = document.getElementById("loginWithFacebook2");
const loginWithApple2 = document.getElementById("loginWithApple2");

const enterLogin2 = document.getElementById("enterLogin2");
const login2Email = document.getElementById("login2Email");
const login2Password = document.getElementById("login2Password");
const openRegister2 = document.getElementById("openRegister2");

// Create an instance of the login class
const classlogin2 = new Classlogin2();
