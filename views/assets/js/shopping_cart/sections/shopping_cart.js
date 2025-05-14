class ShoppingCart {
  constructor() {

    this.makeAjaxRequestJobsAvailables();
    // Iterar sobre cada elemento del carrito y agregar un evento
    for (let i = 0; i < product_items_shopping_cart.length; i++) {
      product_items_shopping_cart[i].addEventListener("click", () => {
        // Alternar la visibilidad del div correspondiente
        this.toggleDescriptionItemShoppingCart(i);
      });
    }
    open_checkout.addEventListener("click", function(){
      window.open("../../views/checkout/index.php", "_self");
    })

    // Obtener los estilos iniciales de todos los elementos

    this.initializeStyles();
  }


  makeAjaxRequestJobsAvailables(){

    // Define the URL and the JSON data you want to send
    const url = "../../controller/lanyard/job.php"; // Replace with your API endpoint URL
    const data = {
      action: "getJobsByOrder"
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
      //alert(JSON.stringify(data));

      shoppingCart.addJobsToOrder(data);



    /*  if (data.message) {

      }
      else{
      //  alert("The email address or password you entered is incorrect.");
    }*/
    })
    .catch(error => {
      alert("error");
      // Handle specific errors (from throw in the .then block)
    //  console.error("Error:", error.message);
      //alert(error.message); // Show the error message in an alert
    });
  }



  addJobsToOrder(data) {
     if (!Array.isArray(data)) return;

     // Limpiar contenido anterior
     container_draw_items_shopping_cart.innerHTML = "";

     data.forEach((item, index) => {
       const name = item["name"] || "Sin nombre";
       const description = item["description"] || {};

       // Construir HTML de las descripciones dinámicamente
       let descriptionsHTML = "";

       alert(JSON.stringify(description));
       for (var i = 0; i < description.length; i++) {
         if (true/*description.hasOwnProperty(key)*/) {
           const value = "test";
           const label = "test";
           const detail = "test";
           const price = "test";

           descriptionsHTML += `
             <div class="elements_descriptions_items_shopping_cart">
               <h3>${label}</h3>
               <h3>${detail}</h3>
               <h3>${price}</h3>
             </div>
           `;
         }
       }

       // Crear HTML del item completo
       const itemHTML = `
         <div class="items_shopping_cart" onclick="shoppingCart.toggleDescriptionItemShoppingCart(${index})">
           <div class="product_items_shopping_cart">
               <h3>${name}</h3>
               <h3></h3>
               <img class="arrow_products_shopping_cart" src="../../views/assets/img/shopping_cart/sections/arrow_right.png" alt="">
           </div>
           <div class="descriptions_items_shopping_cart">
             ${descriptionsHTML}
           </div>
           <div class="summary_items_shopping_cart">
             <div class="elements_summary_items_shopping_cart">
               <h3>Cost per unit</h3>
               <h3></h3>
               <h3>hola3</h3>
             </div>
             <div class="elements_summary_items_shopping_cart">
               <h3>Amount</h3>
               <h3></h3>
               <h3>hola3</h3>
             </div>
             <div class="elements_summary_items_shopping_cart">
               <h3>Subtotal</h3>
               <h3></h3>
               <h3>hola3</h3>
             </div>
           </div>
         </div>
       `;

       container_draw_items_shopping_cart.innerHTML += itemHTML;
     });
    }

  // Función auxiliar para convertir snake_case en "Title Case"
  formatLabel(key) {
   return key
     .replace(/_/g, ' ')
     .replace(/\b\w/g, char => char.toUpperCase());
  }








  // Inicializa los estilos actuales de todos los elementos
  initializeStyles() {
    this.descriptionsStyles = [];
    this.arrowsStyles = [];

    for (let i = 0; i < descriptions_items_shopping_cart.length; i++) {
      const item = descriptions_items_shopping_cart[i];
      const arrow = arrow_products_shopping_cart[i];

      // Verificar que los elementos sean válidos antes de obtener estilos
      if (item instanceof Element && arrow instanceof Element) {
        const currentDisplay = window.getComputedStyle(item).display;
        const currentTransform = window.getComputedStyle(arrow).transform;

        this.descriptionsStyles.push({ element: item, display: currentDisplay });
        this.arrowsStyles.push({ element: arrow, transform: currentTransform });
      } else {
        console.error(`Elemento no válido en el índice ${i}`);
      }
    }
  }




  // Alterna la visibilidad de una descripción específica





   toggleDescriptionItemShoppingCart(index) {
    const descriptions_items_shopping_cart = document.querySelectorAll(".descriptions_items_shopping_cart");
    const arrow_products_shopping_cart = document.querySelectorAll(".arrow_products_shopping_cart");

    const description = descriptions_items_shopping_cart[index];
    const arrow = arrow_products_shopping_cart[index];

    if (!description) return;

    // Alternar clase para mostrar u ocultar
    description.classList.toggle("visible");

    // Opcional: rotar la flecha para indicar el estado
    if (arrow) {
      arrow.classList.toggle("rotated");
    }
  }



}

const container_draw_items_shopping_cart = document.getElementById("container_draw_items_shopping_cart");

// Obtener los elementos del DOM
const product_items_shopping_cart = document.querySelectorAll(".product_items_shopping_cart");
const open_checkout = document.getElementById("open_checkout");
const descriptions_items_shopping_cart = document.querySelectorAll(".descriptions_items_shopping_cart");
const arrow_products_shopping_cart = document.querySelectorAll(".arrow_products_shopping_cart");

// Crear una instancia del carrito de compras
const shoppingCart = new ShoppingCart();
