class ContactUsHome {
  constructor() {
    button_contact_us_from_home.addEventListener('click', () => {
      chargingClass.hideShowchargin(true);
      this.validateFields();
    });
  }

  validateFields() {
    const name = nameContactUsHome.value.trim();
    const email = emailContactUsHome.value.trim();
    const phone = phoneContactUsHome.value.trim();
    const message = messageContactUsHome.value.trim();

    let errors = [];

    // Reset input borders before validation
    this.resetBorders();

    // Validate name field
    if (name === '') {
      errors.push('The "Name" field cannot be empty.');
      this.setErrorBorder(nameContactUsHome);
    }

    // Validate email field
    if (email === '') {
      errors.push('The "Email" field cannot be empty.');
      this.setErrorBorder(emailContactUsHome);
    } else if (!this.validateEmail(email)) {
      errors.push('The email format is not valid.');
      this.setErrorBorder(emailContactUsHome);
    }

    // Validate phone field
    if (phone === '') {
      errors.push('The "Phone" field cannot be empty.');
      this.setErrorBorder(phoneContactUsHome);
    } else if (!this.validatePhone(phone)) {
      errors.push('The phone format is not valid.');
      this.setErrorBorder(phoneContactUsHome);
    }

    // Validate message field
    if (message === '') {
      errors.push('The "Message" field cannot be empty.');
      this.setErrorBorder(messageContactUsHome);
    }

    // Show errors or success message
    if (errors.length > 0) {
      alert(errors.join('\n'));
    } else {
      this.makeAjaxRequestContactUs();
    }
  }

  // Function to validate email format
  validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }

  // Function to validate phone number format
  validatePhone(phone) {
    const phonePattern = /^[0-9]{7,15}$/; // Only numbers, length between 7 and 15
    return phonePattern.test(phone);
  }

  // Function to set error border on invalid input fields
  setErrorBorder(element) {
    element.style.border = '2px solid rgb(139, 0, 0)';
  }

  // Function to reset all input borders
  resetBorders() {
    const inputs = [nameContactUsHome, emailContactUsHome, phoneContactUsHome, messageContactUsHome];
    inputs.forEach(input => {
      input.style.border = '1px solid #ccc'; // Reset to default border
    });
  }

  // Function to make the AJAX request
  makeAjaxRequestContactUs() {
    // Define the URL and the JSON data you want to send
    const url = "../../controller/users/contact-us.php"; // Replace with your API endpoint URL
    const data = {
        action: "contactUs",
        name: nameContactUsHome.value,
        email: emailContactUsHome.value,
        phone: phoneContactUsHome.value,
        message: messageContactUsHome.value
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
      alert(JSON.parse(data) + 'hola tu');

      // Process the response data
      chargingClass.hideShowchargin(false);

      if (data.message) {
        alert('Vamos bien');
      }
      else{
        alert("Error, please try again");
      }
    })
    .catch(error => {
      // Handle specific errors (from throw in the .then block)
      console.error("Error:", error.message);
      chargingClass.hideShowchargin(false);

      alert('Algo raro paso'); // Show the error message in an alert
    });

  }

}

const nameContactUsHome = document.getElementById('nameContactUsHome');
const emailContactUsHome = document.getElementById('emailContactUsHome');
const phoneContactUsHome = document.getElementById('phoneContactUsHome');
const messageContactUsHome = document.getElementById('messageContactUsHome');

const button_contact_us_from_home = document.getElementById('button_contact_us_from_home');
const contactUsHome = new ContactUsHome();
