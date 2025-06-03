class success_payment {
  constructor() {


    boxes_container_success_payment.addEventListener("click", function() {

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
        alert(data);

      const data2 =   JSON.parse(data);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }




}

// Obtener los elementos del DOM
const boxes_container_success_payment = document.getElementById("boxes_container_success_payment");
// Crear una instancia del carrito de compras
const success_payment = new success_payment();
