class Menu {
  constructor() {
    this.getActiveUserSession();
    // Prepare the URL and data to check session login status
    //this.getActiveSession();
  //  this.activeSession = true;
    //this.loginOrLogout();


    logo_img.addEventListener("click", function(){
      window.location.href = "../../views/home/index.php";
    });
    dadCustomizeLanyard.addEventListener('scroll', function() {
      var seventyVH = window.innerHeight * 0.7;

      container_logout.style.display = 'none';
      var scrollTop = dadCustomizeLanyard.scrollTop;
      if (scrollTop > seventyVH) {
        menu.style.display = "none";
      }
      else {
        menu.style.display = "block";
      }

    });

    // Agrega un evento de clic al documento
        document.addEventListener('click', function(event) {
            // Si el clic no fue dentro del div, escóndelo
            if (!container_logout.contains(event.target) && !showLogout.contains(event.target)) {
                container_logout.style.display = 'none';
            }
        });

    showLogout.addEventListener("click",function(){
      ;
      if (container_logout.style.display == "none") {
        container_logout.style.display = "block";
      }
      else {
        container_logout.style.display = "none";
      }
    });

    // Loop through all 'openLogin' buttons and add a click event listener to each
    for (let i = 0; i < openLogin.length; i++) {
      openLogin[i].addEventListener("click", function() {
        // Open the login modal
        loginClass.openLogin();
        // Open the registration modal
        registerClass.openRegister();
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      const openLogout = document.getElementById("openLogout");
      if (openLogout) {
        openLogout.addEventListener("click", function () {
          menuClass.processUserLogout();
        });
      }
    });




    // Add event listeners to handle the mobile menu open/close buttons
    openMenuMobileButton.addEventListener("click", this.openMenuMobile.bind(this));
    closeMenuMobileButton.addEventListener("click", this.closeMenuMobile.bind(this));
    document.addEventListener("click", this.handleClickOutside.bind(this)); // Handle clicks outside the mobile menu
  }
  getActiveUserSession() {
    const url = "../../controller/users/session-user.php";
    const data = {
      action: "checkSessionLogin"
    };
    // Make a fetch request to the given URL with the specified data
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)

    })
      .then(response => {

        // Check if the response is okay, if so, return the response text
        if (response.ok) {
          return response.text();
        }
        // If the response is not okay, throw an error
        throw new Error("Network error.");
      })
      .then(data => {
        data = JSON.parse(data);

        this.setActiveSession(data["message"]);
        this.loginOrLogout();

      })
      .catch(error => {
        // Log any errors to the console
        console.error("Error:", error);
      //  location.reload();
      });
  }

  loginOrLogout(){
    var activeSession = this.getActiveSession(); // Asume que esta función devuelve true o false

    if (activeSession) {
        // Si la sesión está activa
        openLogin.forEach(element => {
            element.style.display = 'none'; // Ocultar botones de login
        });
        openLogoutClass.forEach(element => {
            element.style.display = 'flex'; // Mostrar botones de logout
        });
    } else {
        // Si no hay sesión activa
        openLogin.forEach(element => {
            element.style.display = 'flex'; // Mostrar botones de login
        });
        openLogoutClass.forEach(element => {
            element.style.display = 'none'; // Ocultar botones de logout
        });
    }
  }

  getActiveSession() {
        return this.activeSession;
    }

  setActiveSession(activeSession) {
        this.activeSession = activeSession;
    }

  processUserLogout() {
    // Prepare the URL and data to check session login status
    const url = "../../controller/users/session-user.php";
    const data = {
      action: "processUserLogout" // Action to check if the session is active (login)
    };
    // Make a fetch request to the given URL with the specified data
    fetch(url, {
      method: "POST", // Set the request method to POST
      headers: {
        "Content-Type": "application/json" // Set the request content type to JSON
      },
      body: JSON.stringify(data) // Send the data as a JSON string
    })
      .then(response => {
        // Check if the response is okay (HTTP status 200-299), if so, return the response text
        if (response.ok) {
          return response.text();
        }

        // If the response status is 401 (Unauthorized), the user is not logged in
        if (response.status === 401) {
          throw new Error("User not authenticated.");
        }

        // If the response is not okay, throw a general network error
        throw new Error("Network error.");
      })
      .then(data => {
        location.reload();

        //alert(data);
        // Parse the response data as JSON
      //  data = JSON.parse(data);




      })
      .catch(error => {
        // Handle errors: If the user is not authenticated or another error occurs
        if (error.message === "User not authenticated.") {
          alert("Please log in to access this data."); // Inform the user to log in
        } else {
          console.error("Error:", error); // Log any other errors
        }
      });
  }



  // Function to open the mobile menu
  openMenuMobile() {
    closeMenuMobile.style.display = "block"; // Show the close button
    menuMobile.style.left = "calc(100% - 300px)"; // Slide the mobile menu in from the right
    openMenuMobile.style.display = "none"; // Hide the open button
  }

  // Function to close the mobile menu
  closeMenuMobile() {
    closeMenuMobile.style.display = "none"; // Hide the close button
    menuMobile.style.left = "calc(100%)"; // Slide the mobile menu out of view
    openMenuMobile.style.display = "block"; // Show the open button
  }

  // Function to close the mobile menu if the user clicks outside of it
  handleClickOutside(event) {
    // Check if the clicked element is outside the mobile menu and open button
    if (!openMenuMobile.contains(event.target)) {
      if (!menuMobile.contains(event.target)) {
        this.closeMenuMobile(); // Close the mobile menu
      }
    }
  }


}

// DOM elements related to login, logout, and menu functionality
const logo_img = document.getElementById("logo_img");
const openLogin = document.querySelectorAll('.openLogin'); // All login buttons
const openLogoutClass = document.querySelectorAll(".openLogout"); // Mobile menu close button
const logoutButtons = document.querySelectorAll('.logoutButtons'); // All logout buttons
const openMenuMobileButton = document.getElementById("openMenuMobile"); // Mobile menu open button
const closeMenuMobileButton = document.getElementById("closeMenuMobile"); // Mobile menu close button
const menuMobile = document.getElementById("menuMobile"); // Mobile menu element
const showLogout = document.getElementById("showLogout");
const dadCustomizeLanyard = document.getElementById("dad-customize-lanyard");
const menu = document.getElementById("menu");

// Create an instance of the 'Menu' class to initialize the menu
const menuClass = new Menu();
