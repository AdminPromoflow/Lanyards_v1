// Define a class called "Login"
class Login {
  constructor() {

    this.appId = '615665997605768';
    this.initFacebookSDK();

  //  login.style.display = "none";

  password_forgotten.addEventListener("click", function(){
    // Call the closeLogin method of the Login class
    loginClass.closeLogin();
    // Call the closeRegister method of the Register class
    registerClass.closeRegister();
    // Show the login form with a sliding animation
    loginClass.showLogin(700);
    // Hide the register form with a sliding animation
    registerClass.hideRegister(700);

    passwordForgotten.showPasswordForgotten(true);

  });

  loginWithFacebook1.addEventListener("click", function(){
    loginClass.customLogin();

  });



    // Event listener to close the login form
    closeLogin.addEventListener("click", function () {
      // Call the closeLogin method of the Login class
      loginClass.closeLogin();
      // Call the closeRegister method of the Register class
      registerClass.closeRegister();
      // Show the login form with a sliding animation
      loginClass.showLogin(700);
      // Hide the register form with a sliding animation
      registerClass.hideRegister(700);

    });


    loginWithGoogle1.addEventListener("click", function(){
      // Make the AJAX request
      loginClass.makeAjaxRequestLoginWithGoogle();
    })

    loginWithFacebook1.addEventListener("click", function(){
    })




    // Event listener to open the login form from the register screen
    openLoginFromRegister.addEventListener("click", function () {
      // Show the login form with a sliding animation
      loginClass.openLogin();
      loginClass.showLogin(0);

      // Hide the register form with a sliding animation
      registerClass.hideRegister(0);


    });


    // Event listener to open the register form from the login screen
    loginButton.addEventListener("click", function () {
      // Call validation functions and display error or success messages
      if (loginClass.validateEmail() && loginClass.validatePassword()) {

        chargingClass.hideShowchargin(true);

        // Make the AJAX request
        loginClass.makeAjaxRequestLogin();
      }
    });


    this.makeAjaxRequestValidateGoogleLogin();

  }

  // Function to make the AJAX request
  makeAjaxRequestLoginWithGoogle() {
      // Define the URL and the data to be sent
      const url = "../../controller/users/login-google.php";
      const data = {
          action: "loginGoogle"
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
        //  alert(data); // Display the data from the response
        //   window.open(data, "_self");
           alert("no entiendo por que?");
      })
      .catch(error => {
          console.error("Error:", error); // Log any errors to the console
      });
  }

  makeAjaxRequestValidateGoogleLogin() {
    console.trace("Rastro de llamada");


    alert("Este script no deberia correr en este momento ahora");
      // Define the URL and the data to be sent
      const url = "../../controller/users/login-google.php";
      const data = {
          action: "validationLoginGoogle"
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
          return response.json(); // Parse the response as JSON
      })
      .then(data => {
        try {
          alert(JSON.parse(data));
        } catch (e) {
          alert("Error al analizar el JSON");
        }
      //  alert(data.google_login + 'hi');
          // Check if 'google_login' is true
          if (data.google_login) {
              // Handle successful login
              menuClass.setActiveSession(data.message);
              menuClass.loginOrLogout();
          } else {
              //alert("Google login failed.");
          }
      })
      .catch(error => {
          console.error("Error:", error); // Log any errors to the console
      });
  }


  // Function to make the AJAX request
  makeAjaxRequestLogin() {
    // Define the URL and the JSON data you want to send
    const url = "../../controller/users/login.php"; // Replace with your API endpoint URL
    const data = {
      action: "login",
      emailLogin: emailLogin.value,
      passwordLogin: passwordLogin.value
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
        location.reload();
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






  // Email validation function
  validateEmail() {
    // Get the value of the email input and remove leading/trailing whitespace
    const email = emailLogin.value.trim();
    // Regular expression pattern to check for a valid email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
      // If email doesn't match the pattern, show an error message
      alert("Please enter a valid email");
      emailLogin.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    emailLogin.style.border = "3px solid transparent";
    return true; // Validation passes
  }

  // Password validation function
  validatePassword() {
    // Get the value of the password input and remove leading/trailing whitespace
    const password = passwordLogin.value.trim();
    if (password.length < 6) {
      // If password is too short, show an error message
      alert("Password must be at least 6 characters");
      passwordLogin.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    passwordLogin.style.border = "3px solid transparent";
    return true; // Validation passes
  }

  openLogin() {
    // Set the position and transformation of the "login" element
    login.style.left = "50%";
    login.style.transform = "translate(-50%, -50%)";
    login.style.display = "flex";

  }

  closeLogin() {
    if (closeLoginSide == "left") {
      login.style.left = "100%";
      closeLoginSide = "right";
    } else if (closeLoginSide == "right") {
      login.style.left = "-100%";
      closeLoginSide = "left";
    }
    login.style.transform = "translateY(-50%)";

  }

  showLogin(time) {
    setTimeout(function () {
      // Perform rotation animations on login and register elements
      containerLogin.style.transform = "perspective(600px) rotateY(0deg)";
      containerLogin.style.backfaceVisibility = "visible";
      login.style.zIndex = "14";
    }, time);
  }

  hideLogin(time) {
    setTimeout(function () {
    containerLogin.style.transform = "perspective(600px) rotateY(-180deg)";
    containerLogin.style.backfaceVisibility = "hidden";
    login.style.zIndex = "13";
    }, time);
  }










  initFacebookSDK() {
    window.fbAsyncInit = () => {
      FB.init({
        appId: this.appId,
        cookie: true,
        xfbml: true,
        version: 'v6.0',
      });

      this.checkLoginState();
    };

    this.loadFacebookSDK();
  }

  loadFacebookSDK() {
    const script = document.createElement('script');
    script.src = 'https://connect.facebook.net/en_US/sdk.js';
    script.async = true;
    script.defer = true;
    document.body.appendChild(script);
  }

  checkLoginState() {
    FB.getLoginStatus((response) => this.statusChangeCallback(response));
  }

  statusChangeCallback(response) {
    console.log('statusChangeCallback', response);

    if (response.status === 'connected') {
      this.testAPI();
    } else {
    //  alert('Please log into this webpage.');
    }
  }

  testAPI() {
    console.log('Welcome! Fetching your information....');
    FB.api('/me', { fields: 'name,email' }, (response) => {

    //  alert(`Thanks for logging in, ${response.name}! Your email is ${response.email}.`);
    });
  }

  customLogin() {
   FB.login((response) => {
     if (response.authResponse) {
       this.statusChangeCallback(response);
     } else {
       console.log('User cancelled login or did not fully authorize.');
     }
   }, { scope: 'public_profile,email' });
 }

 // Cierra la sesión del usuario
 logoutFacebook() {
   FB.logout((response) => {
     console.log('User logged out.');
     this.updateStatus('You have logged out.');
   });
 }






}

// Get DOM elements
const loginWithGoogle1 = document.getElementById("loginWithGoogle1");
const loginWithFacebook1 = document.getElementById("loginWithFacebook1");

const openLoginFromRegister = document.getElementById("openLoginFromRegister");
const login = document.getElementById("login");
const closeLogin = document.getElementById("closeLogin"); // Button to close the login form
const password_forgotten = document.getElementById("password_forgotten");


var containerLogin = document.getElementById("containerLogin");



var emailLogin = document.getElementById("emailLogin");
var passwordLogin = document.getElementById("passwordLogin");
var loginButton = document.getElementById("loginButton");





var closeLoginSide = "left";

// Create an instance of the Login class
const loginClass = new Login();
// Botón de logout
/*document.getElementById('logoutButton').addEventListener('click', () => {
  loginClass.logoutFacebook();
});*/
