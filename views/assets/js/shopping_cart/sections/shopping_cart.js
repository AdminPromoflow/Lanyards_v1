class ShoppingCart {
  constructor() {
    this.subtotal = 0;
    this.tax = 0;
    this.shippingPrice = 0;
    this.total = 0;
    this.shippingDays = 15;

    this.getOrder();
    this.makeAjaxRequestJobsAvailables();

    // Añadir eventos a los productos para toggle de descripción
    document.querySelectorAll(".product_items_shopping_cart").forEach((item, i) => {
      item.addEventListener("click", () => this.toggleDescriptionItemShoppingCart(i));
    });

    const open_checkout = document.getElementById("open_checkout");
    if (open_checkout) {
      open_checkout.addEventListener("click", () => {
        window.open("../../views/checkout/index.php", "_self");
      });
    }

    this.initializeStyles();
  }

  setSubtotal(value) { this.subtotal = value; }
  getSubtotal() { return this.subtotal; }

  setTax(value) { this.tax = value; }
  getTax() { return this.tax; }

  setShippingPrice(value) { this.shippingPrice = value; }
  getShippingPrice() { return this.shippingPrice; }

  setTotal(value) { this.total = value; }
  getTotal() { return this.total; }

  makeAjaxRequestJobsAvailables() {
    fetch("../../controller/lanyard/job.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "getJobsByOrder" })
    })
    .then(res => res.ok ? res.json() : Promise.reject("Network error"))
    .then(data => {
      this.addJobsToOrder(data);
      this.addOrderSummary(data);
    })
    .catch(error => console.error("Error:", error));
  }

  addJobsToOrder(data) {
    const container = document.getElementById("container_draw_items_shopping_cart");
    if (!container || !Array.isArray(data)) return;
    container.innerHTML = "";

    data.forEach((item, index) => {
      const idJob = item.idJobs;
      const name = item.name || "Sin nombre";
      const newColour = item.newColour * 25;

      let descriptionsHTML = "";
      const description = JSON.parse(item.description);
      for (const key in description) {
        const entry = description[key];
        const value = entry.type || entry.value || entry.side || "Sin dato";
        const price = entry.additional_price ?? "0";
        const title = key.replace(/_/g, " ").replace(/\b\w/g, c => c.toUpperCase());

        descriptionsHTML += `
          <div class="elements_descriptions_items_shopping_cart">
            <h3>${title}</h3>
            <h3>${value}</h3>
            <h3>+ £${price}</h3>
          </div>`;
      }

      const itemHTML = `
        <div class="items_shopping_cart">
          <div class="product_items_shopping_cart">
            <h3>${name} ${index + 1}</h3>
            <h3></h3>
            <img class="arrow_products_shopping_cart" onclick="shoppingCart.toggleDescriptionItemShoppingCart(${index})" src="../../views/assets/img/shopping_cart/sections/arrow_right.png" alt="">
            <img class="delete_job" onclick="shoppingCart.deleteJob(${idJob})" src="../../views/assets/img/shopping_cart/sections/delete-button.png" alt="">
          </div>
          <div class="descriptions_items_shopping_cart">${descriptionsHTML}</div>
          <div class="summary_items_shopping_cart">
            ${newColour ? `
              <div class="elements_summary_items_shopping_cart">
                <h3>New background colour</h3><h3></h3><h3>£${newColour}</h3>
                <div onclick="shoppingCart.infoNewColour();" class="info_extra_colour">
                  <img src="../../views/assets/img/shopping_cart/sections/info_icon.png" alt="">
                </div>
              </div>` : ""}
            <div class="elements_summary_items_shopping_cart">
              <h3>Cost per unit</h3><h3></h3><h3>£${item.price_per_unit}</h3>
            </div>
            <div class="elements_summary_items_shopping_cart">
              <h3>Amount</h3><h3></h3><h3>${item.amount}</h3>
            </div>
            <div class="elements_summary_items_shopping_cart">
              <h3>Subtotal</h3><h3></h3><h3>£${(item.price_per_unit * item.amount + newColour).toFixed(2)}</h3>
            </div>
          </div>
        </div>
      `;
      container.innerHTML += itemHTML;
    });
  }

  infoNewColour() {
    alert("You selected a new background colour when creating your lanyard. This choice adds an extra charge to the total price.");
  }

  calculateShippingAndTotal() {
    const base = this.getSubtotal();
    switch (this.shippingDays) {
      case 10: this.shippingPrice = base * 0.25; break;
      case 8: this.shippingPrice = base * 0.5; break;
      default: this.shippingDays = 15; this.shippingPrice = 0;
    }
    this.total = base + this.getTax() + this.shippingPrice;
  }

  updateOrder() {
    fetch("../../controller/lanyard/order.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        action: "updateOrder",
        subtotal: this.subtotal,
        shippingDays: this.shippingDays,
        shippingPrice: this.shippingPrice,
        tax: this.tax,
        total: this.total
      })
    })
    .catch(err => console.error("Update error:", err));
  }

  getOrder() {
    fetch("../../controller/lanyard/order.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "getOrder" })
    })
    .then(res => res.ok ? res.json() : Promise.reject("Network error"))
    .then(data => {
      const order = data.order;
      this.shippingDays = parseFloat(order.shippingDays) || 15;
      this.subtotal = parseFloat(order.subtotal);
      this.tax = parseFloat(order.tax);
      this.shippingPrice = parseFloat(order.shipping_price);
      this.total = parseFloat(order.total);
      this.calculateShippingAndTotal();
      this.updateOrder();

      const selectedRadio = document.querySelector(`input[name="options_card_shippingCart"][value="${this.shippingDays}"]`);
      if (selectedRadio) selectedRadio.checked = true;
    })
    .catch(err => console.error("Error:", err));
  }

  deleteJob(idJob) {
    if (!confirm("Are you sure you want to delete the product?")) return;

    fetch("../../controller/lanyard/job.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "deleteJob", idJob })
    })
    .then(res => res.ok ? res.json() : Promise.reject("Network error"))
    .then(() => {
      alert("The product has been deleted successfully.");
      location.reload();
    })
    .catch(err => console.log("Error deleting job:", err));
  }

  updatePriceShippingHTML() {
    const price_shipping = document.getElementById("price_shipping");
    const total_price = document.getElementById("total_price");

    this.calculateShippingAndTotal();

    if (price_shipping) price_shipping.textContent = `£${this.shippingPrice.toFixed(2)}`;
    if (total_price) total_price.textContent = `£${this.total.toFixed(2)}`;
  }

  changeShoppingTime(days) {
    this.shippingDays = days;
    this.updatePriceShippingHTML();
    this.updateOrder();
  }

  initializeStyles() {
    this.descriptionsStyles = [];
    this.arrowsStyles = [];

    const descriptions = document.querySelectorAll(".descriptions_items_shopping_cart");
    const arrows = document.querySelectorAll(".arrow_products_shopping_cart");

    descriptions.forEach((item, i) => {
      this.descriptionsStyles.push({
        element: item,
        display: window.getComputedStyle(item).display
      });

      if (arrows[i]) {
        this.arrowsStyles.push({
          element: arrows[i],
          transform: window.getComputedStyle(arrows[i]).transform
        });
      }
    });
  }

  toggleDescriptionItemShoppingCart(index) {
    const descriptions = document.querySelectorAll(".descriptions_items_shopping_cart");
    const arrows = document.querySelectorAll(".arrow_products_shopping_cart");

    const description = descriptions[index];
    const arrow = arrows[index];

    if (!description) return;
    description.classList.toggle("visible");
    if (arrow) arrow.classList.toggle("rotated");
  }
}

// Inicializar carrito
const shoppingCart = new ShoppingCart();
