class SuccessPayment {
  constructor() {
    this.getPaymentSuccess();

    button_go_home.addEventListener("click", function() {
      window.location.href = "../../views/home/index.php";
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
