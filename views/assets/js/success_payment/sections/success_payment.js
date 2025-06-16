class SuccessPayment {
  constructor() {


  //  alert(menuClass.getActiveSession());


    button_go_home.addEventListener("click", function() {
      window.location.href = "../../views/home/index.php";
    });

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
        alert(JSON.stringify(parsedData));
        // Validate if the response contains the expected 'message' key
        if (typeof parsedData.message === "undefined") {
          throw new Error("Invalid response format: 'message' key missing.");
        }

        // Update the active session and handle login/logout logic



      })
      .catch(error => {
        // Handle any errors during the request or processing
        console.error("Error:", error.message);
        // Optionally, reload the page if needed
        // location.reload();
      });
  }

  getPaymentSuccess(){
    const url = "../../controller/lanyard/order.php";
    const data = {
      action: "getPaymentSuccess"
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error("Network error.");
      })
      .then(data => {
      //  alert(data);

      const data2 =   JSON.parse(data);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }




}

// Obtener los elementos del DOM
const button_go_home = document.getElementById("button_go_home");
// Crear una instancia del carrito de compras
const success_payment = new SuccessPayment();
