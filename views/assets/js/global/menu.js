class Menu {
  constructor() {

    this.getActiveUserSession();
    // Prepare the URL and data to check session login status
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
        menu.style.display = "flex";
      }
    });

    // Agrega un evento de clic al documento
        document.addEventListener('click', function(event) {
            // Si el clic no fue dentro del div, escóndelo
            if (!container_logout.contains(event.target) && !showLogout.contains(event.target)) {
                container_logout.style.display = 'none';
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

    for (let i = 0; i < openSignup.length; i++) {
      openSignup[i].addEventListener("click", function() {

        registerClass.openRegister();
        registerClass.showRegister(0);

      });
    }




    document.addEventListener("DOMContentLoaded", () => {
      // Lógica para el primer evento
      const showLogout = document.getElementById("showLogout");
      const container_logout = document.getElementById("container_logout");

      if (showLogout && container_logout) {
        showLogout.addEventListener("click", function () {
          container_logout.style.display =
            container_logout.style.display === "none" || container_logout.style.display === ""
              ? "flex"
              : "none";
        });
      }

      // Lógica para el segundo evento
      const openLogout = document.getElementById("openLogout");
      if (openLogout) {
        openLogout.addEventListener("click", function () {
          chargingClass.hideShowchargin(true);

          menuClass.processUserLogout();
        });
      }

      // Agregar más lógica según sea necesario
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

    // Make the fetch request
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        // Check if the response status is OK
        if (!response.ok) {
          throw new Error(`Network error: ${response.status} ${response.statusText}`);
        }
        return response.json(); // Parse the response as JSON
      })
      .then(parsedData => {
        // Validate if the response contains the expected 'message' key
        if (typeof parsedData.message === "undefined") {
          throw new Error("Invalid response format: 'message' key missing.");
        }

        // Update the active session and handle login/logout logic
        this.setActiveSession(parsedData.message);
        this.loginOrLogout();
      })
      .catch(error => {
        // Handle any errors during the request or processing
        console.error("Error:", error.message);
        // Optionally, reload the page if needed
        // location.reload();
      });
  }

  loginOrLogout() {
    // Assume that this.getActiveSession() returns true (active session) or false (no session)
    const activeSession = this.getActiveSession();

    // Ensure openLogin and openLogoutClass are defined
    if (!openLogin || !openLogoutClass) {
      console.error("Error: 'openLogin' or 'openLogoutClass' elements are not defined.");
      return;
    }

    // Toggle display based on the session state
    openLogin.forEach(element => {
      element.style.display = activeSession ? 'none' : 'flex'; // Show or hide login buttons
    });

    openLogoutClass.forEach(element => {
      element.style.display = activeSession ? 'flex' : 'none'; // Show or hide logout buttons
    });
  }


  getActiveSession() {
        return this.activeSession;
    }

  setActiveSession(activeSession) {
        this.activeSession = activeSession;
    }

    processUserLogout() {
      // Prepare the URL and data to process the logout action
      const url = "../../controller/users/session-user.php";
      const data = {
        action: "processUserLogout" // Action to process logout
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
          // Check if the response is okay (HTTP status 200-299)
          if (response.ok) {
            return response.json(); // Parse the response as JSON
          }

          // If the response status is 401 (Unauthorized), the user is not logged in
          if (response.status === 401) {
            throw new Error("User not authenticated.");
          }

          // For other responses, throw a general network error
          throw new Error("Network error.");
        })
        .then(data => {
          // If logout is successful, reload the page
          chargingClass.hideShowchargin(false);

          alert("Successfully logged out.");
          window.location.href = "https://lanyardsforyou.com/views/home/index.php";
        })
        .catch(error => {
          // Handle errors: If the user is not authenticated or any other errors
          if (error.message === "User not authenticated.") {
            alert("Please log in to access this data."); // Inform the user to log in
          } else {
            console.error("Error:", error.message); // Log any other errors
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
    openMenuMobile.style.display = "flex"; // Show the open button
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
const openSignup = document.querySelectorAll('.openSignup'); // All login buttons


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
