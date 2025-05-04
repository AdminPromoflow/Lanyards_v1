class PasswordForgotten {
  constructor() {
    this._forgottenPassword2 = false;

    password_forgotten_close.addEventListener("click", function(){
      if (passwordForgotten.getForgottenPassword2() == false) {

        passwordForgotten.showPasswordForgotten(false);
        loginClass.openLogin();
        loginClass.showLogin(0);
        // Hide the register form with a sliding animation
        registerClass.hideRegister(0);
      }
      else {
        passwordForgotten.showPasswordForgotten(false);
      }

    });



    password_forgotten_button.addEventListener("click", function(){
      if (passwordForgotten.validateEmail()) {
        chargingClass.hideShowchargin(true);

        passwordForgotten.makeAjaxRequestPasswordForgotten();
      }

    })
  }
  getForgottenPassword2() {
     return this._forgottenPassword2;
   }

   // Función para establecer el valor
   setForgottenPassword2(value) {
     this._forgottenPassword2 = value;
   }

  makeAjaxRequestPasswordForgotten() {
    // Define the URL and the JSON data you want to send
    const url = "../../controller/users/password-forgotten.php"; // Replace with your API endpoint URL
    const data = {
      action: "verify_password_forgotten",
      email: password_forgotten_email.value // Assuming `password_forgotten_email` is a valid input element
    };

    // Make the fetch request
    fetch(url, {
      method: "POST", // HTTP POST method to send data
      headers: {
        "Content-Type": "application/json", // Indicate that you're sending JSON
      },
      body: JSON.stringify(data), // Convert the JSON object to a JSON string and send it
    })
      .then((response) => {
        // Check if the response status is OK (2xx range)
        if (!response.ok) {
          return response.json().then((errorData) => {
            // Throw an error with the message from the server
            throw new Error(errorData.message || "An error occurred");
          });
        }
        return response.json(); // Parse the response as JSON
      })
      .then((data) => {

        // Process the successful response
        if (passwordForgotten.getForgottenPassword2() == false) {
          if (data.success) { // Assuming your API returns a `success` property
            chargingClass.hideShowchargin(false);

            alert("Recovery email sent successfully. Please check your inbox.");
            // Optionally reload the page
          } else {
            chargingClass.hideShowchargin(false);
          }
          location.reload();
        }
        else {
          if (data.success) { // Assuming your API returns a `success` property
            chargingClass.hideShowchargin(false);

            alert("Recovery email sent successfully. Please check your inbox.");
            // Optionally reload the page
          } else {
            chargingClass.hideShowchargin(false);
          }
        }

      })
      .catch((error) => {
        // Handle errors
        if (passwordForgotten.getForgottenPassword2() == false) {
          console.error("Error:", error.message);
          alert(error.message); // Show the error message in an alert
          location.reload();
        }
        else {
          alert(error.message + "Please register");
          chargingClass.hideShowchargin(false);
        }


      });
  }



  // Email validation function
  validateEmail() {
    // Get the value of the email input and remove leading/trailing whitespace
    const email = password_forgotten_email.value.trim();
    // Regular expression pattern to check for a valid email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
      // If email doesn't match the pattern, show an error message
      alert("Please enter a valid email");
      password_forgotten_email.style.border = "3px solid #8B0000";

      return false; // Validation fails
    }
    // Clear any previous error messages
    password_forgotten_email.style.border = "3px solid transparent";
    return true; // Validation passes
  }

  showPasswordForgotten(action){
    if (action) {
      password_forgotten_background.style.display = "flex";
    }
    else {
      password_forgotten_background.style.display = "none";

    }
  }

}
const password_forgotten_background = document.getElementById("password_forgotten_background");
const password_forgotten_close = document.getElementById("password_forgotten_close");
const password_forgotten_button = document.getElementById("password_forgotten_button");
const password_forgotten_email = document.getElementById("password_forgotten_email");


const passwordForgotten = new PasswordForgotten();
