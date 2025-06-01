class ShoppingCart {
  constructor() {
    // Retrieve order details from server
    this.getOrder();

    // Fetch the list of available jobs for the current order
    this.makeAjaxRequestJobsAvailables();

    // Add toggle event to each product to show/hide details
    for (let i = 0; i < product_items_shopping_cart.length; i++) {
      product_items_shopping_cart[i].addEventListener("click", () => {
        this.toggleDescriptionItemShoppingCart(i);
      });
    }

    // Go to checkout page when button is clicked
    open_checkout.addEventListener("click", function () {
      window.open("../../views/checkout/index.php", "_self");
    });

    // Save initial display styles for later toggling
    this.initializeStyles();
  }

  // --- SETTERS & GETTERS ---

  setSubtotal(value) {
    this.subtotal = value;
  }

  getSubtotal() {
    return this.subtotal;
  }

  setTax(value) {
    this.tax = value;
  }

  getTax() {
    return this.tax;
  }

  setShippingPrice(value) {
    this.shippingPrice = value;
  }

  getShippingPrice() {
    return this.shippingPrice;
  }

  setTotal(value) {
    this.total = value;
  }

  getTotal() {
    return this.total;
  }

  // --- FETCH JOBS FOR ORDER ---

  makeAjaxRequestJobsAvailables() {
    const url = "../../controller/lanyard/job.php";
    const data = { action: "getJobsByOrder" };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) return response.json();
        throw new Error("Network error.");
      })
      .then(data => {
        shoppingCart.addJobsToOrder(data);
        shoppingCart.addOrderSummary(data);
      })
      .catch(error => {
        console.error("Error:", error.message);
      });
  }

  // --- DISPLAY JOB ITEMS IN CART ---

  addJobsToOrder(data) {
    if (!Array.isArray(data)) return;

    container_draw_items_shopping_cart.innerHTML = ""; // Clear existing content

    data.forEach((item, index) => {
      const idJob = item["idJobs"];
      const name = item["name"] || "No name";
      const newColour = item["newColour"] * 25;
      let extraPriceNewColour = "";

      if (newColour !== 0) {
        extraPriceNewColour = `
          <div class="elements_summary_items_shopping_cart">
            <h3>New background colour</h3>
            <h3></h3>
            <h3>£${newColour}</h3>
            <div onclick="shoppingCart.infoNewColour();" class="info_extra_colour">
              <img src="../../views/assets/img/shopping_cart/sections/info_icon.png" alt="">
            </div>
          </div>`;
      }

      const price_per_unit = item["price_per_unit"];
      const amount = item["amount"];
      const total = price_per_unit * amount + newColour;
      const description = JSON.parse(item["description"]);

      let descriptionsHTML = "";
      for (const key in description) {
        if (description.hasOwnProperty(key)) {
          const entry = description[key];
          const value = entry.type || entry.value || entry.side || "No data";
          const price = entry.additional_price ?? "0";
          const title = key.replace(/_/g, " ").replace(/\b\w/g, c => c.toUpperCase());

          descriptionsHTML += `
            <div class="elements_descriptions_items_shopping_cart">
              <h3>${title}</h3>
              <h3>${value}</h3>
              <h3>+ £${price}</h3>
            </div>`;
        }
      }

      const itemHTML = `
        <div class="items_shopping_cart">
          <div class="product_items_shopping_cart">
              <h3>${name} ${index + 1}</h3>
              <h3></h3>
              <img class="arrow_products_shopping_cart" onclick="shoppingCart.toggleDescriptionItemShoppingCart(${index})" src="../../views/assets/img/shopping_cart/sections/arrow_right.png" alt="">
              <img class="delete_job" onclick="shoppingCart.deleteJob(${idJob})" src="../../views/assets/img/shopping_cart/sections/delete-button.png" alt="">
          </div>
          <div class="descriptions_items_shopping_cart">
            ${descriptionsHTML}
          </div>
          <div class="summary_items_shopping_cart">
            ${extraPriceNewColour}
            <div class="elements_summary_items_shopping_cart">
              <h3>Cost per unit</h3><h3></h3><h3>£${price_per_unit}</h3>
            </div>
            <div class="elements_summary_items_shopping_cart">
              <h3>Amount</h3><h3></h3><h3>${amount}</h3>
            </div>
            <div class="elements_summary_items_shopping_cart">
              <h3>Subtotal</h3><h3></h3><h3>£${total}</h3>
            </div>
          </div>
        </div>`;

      container_draw_items_shopping_cart.innerHTML += itemHTML;
    });
  }

  infoNewColour() {
    alert("You selected a new background colour when creating your lanyard. As noted in the options, this choice adds an extra charge to the total price of the lanyard, not to the unit cost.");
  }

  // --- DISPLAY ORDER SUMMARY ---

  addOrderSummary(data) {
    const boxes_container_shopping_cart = document.getElementById("boxes_container_shopping_cart");
    const boxes2_container_shopping_cart = document.getElementById("boxes2_container_shopping_cart");

    boxes2_container_shopping_cart.innerHTML = "";

    boxes_container_shopping_cart.innerHTML = `
      <div class="items2_shopping_cart">
        <h3>Product</h3>
        <h3>Subtotal</h3>
      </div>
      <div class="elements_boxes2_container_shopping_cart">
        <h2>Products</h2>
      </div>`;

    let subtotal = 0;

    data.forEach((item, index) => {
      const total = parseFloat(item["total"]) + parseFloat(item["newColour"] * 25);
      boxes_container_shopping_cart.innerHTML += `
        <div class="elements_boxes_container_shopping_cart">
          <h3>${item["name"]} ${index + 1}</h3>
          <h3>£${total}</h3>
        </div>`;
      subtotal += parseFloat(item["total"]);
    });

    this.subtotal = subtotal;
    this.tax = subtotal * 0.2;
    const total = this.subtotal + this.tax + this.shippingPrice;
    this.total = total;

    this.updateOrder();

    boxes2_container_shopping_cart.innerHTML = `
      <div class="elements_boxes2_container_shopping_cart"><h2>Shipping</h2></div>
      <div class="elements_boxes2_container_shopping_cart">
        <label onclick="shoppingCart.changeShoppingTime(15)">
          <input type="radio" name="options_card_shippingCart" value="15" checked>
          <h3>15 working days</h3>
        </label><h3>0%</h3>
      </div>
      <div class="elements_boxes2_container_shopping_cart">
        <label onclick="shoppingCart.changeShoppingTime(10)">
          <input type="radio" name="options_card_shippingCart" value="10">
          <h3>10 working days</h3>
        </label><h3>+25%</h3>
      </div>
      <div class="elements_boxes2_container_shopping_cart">
        <label onclick="shoppingCart.changeShoppingTime(8)">
          <input type="radio" name="options_card_shippingCart" value="8">
          <h3>8 working days</h3>
        </label><h3>+50%</h3>
      </div>`;

    boxes4_container_shopping_cart.innerHTML = `
      <div class="elements_boxes2_container_shopping_cart"><h2>Basket totals</h2></div>
      <div class="elements_boxes2_container_shopping_cart"><h3>Subtotal</h3><h3>£${this.subtotal}</h3></div>
      <div class="elements_boxes2_container_shopping_cart"><h3>Tax (VAT 20%)</h3><h3>£${this.tax}</h3></div>
      <div class="elements_boxes2_container_shopping_cart"><h3>Shipping</h3><h3 id="price_shipping">£${this.shippingPrice}</h3></div>
      <div class="elements_boxes2_container_shopping_cart"><h3>Total</h3><h3 id="total_price">£${this.total}</h3></div>`;
  }

  // --- FETCH SAVED ORDER FROM BACKEND ---

  getOrder() {
    const url = "../../controller/lanyard/order.php";
    const data = { action: "getOrder" };

    fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) return response.text();
        throw new Error("Network error.");
      })
      .then(data => {
        const parsed = JSON.parse(data);
        const order = parsed["order"];
        this.shippingDays = parseFloat(order["shippingDays"]);
        this.subtotal = parseFloat(order["subtotal"]);
        this.tax = parseFloat(order["tax"]);
        this.shippingPrice = parseFloat(order["shipping_price"]);
        this.total = parseFloat(order["total"]);

        if (isNaN(this.shippingDays)) {
          this.shippingDays = 15;
          this.shippingPrice = 0;
          this.total = this.subtotal + this.tax;
          this.updateOrder();
        }

        const value = this.shippingDays + " working days";
        const radio = document.querySelector('input[name="options_card_shippingCart"][value="' + this.shippingDays + '"]');
        if (radio) radio.checked = true;
      })
      .catch(error => console.error("Error:", error));
  }

  updateOrder() {
    const url = "../../controller/lanyard/order.php";
    const data = {
      action: "updateOrder",
      subtotal: this.subtotal,
      shippingDays: this.shippingDays,
      shippingPrice: this.shippingPrice,
      tax: this.tax,
      total: this.total
    };

    fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    }).catch(error => console.error("Error:", error));
  }

  deleteJob(idJob) {
    if (!confirm("Are you sure you want to delete the product?")) return;

    const url = "../../controller/lanyard/job.php";
    const data = { action: "deleteJob", idJob };

    fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) return response.json();
        throw new Error("Network error.");
      })
      .then(data => {
        if (data) {
          alert("The product has been deleted successfully");
          location.reload();
        }
      })
      .catch(() => console.log("Error"));
  }

  updatePriceShippingHTML() {
    const price_shipping = document.getElementById("price_shipping");
    const total_price = document.getElementById("total_price");

    if (this.shippingDays === 15) {
      this.shippingPrice = 0;
    } else if (this.shippingDays === 10) {
      this.shippingPrice = this.getSubtotal() * 0.25;
    } else if (this.shippingDays === 8) {
      this.shippingPrice = this.getSubtotal() * 0.5;
    } else {
      this.shippingPrice = 0;
    }

    this.total = this.subtotal + this.tax + this.shippingPrice;

    price_shipping.textContent = "£" + this.shippingPrice.toFixed(2);
    total_price.textContent = "£" + this.total.toFixed(2);
  }

  changeShoppingTime(days) {
    this.shippingDays = days;
    this.updatePriceShippingHTML();
    this.updateOrder();
  }

  initializeStyles() {
    this.descriptionsStyles = [];
    this.arrowsStyles = [];

    for (let i = 0; i < descriptions_items_shopping_cart.length; i++) {
      const item = descriptions_items_shopping_cart[i];
      const arrow = arrow_products_shopping_cart[i];

      if (item instanceof Element && arrow instanceof Element) {
        const currentDisplay = window.getComputedStyle(item).display;
        const currentTransform = window.getComputedStyle(arrow).transform;

        this.descriptionsStyles.push({ element: item, display: currentDisplay });
        this.arrowsStyles.push({ element: arrow, transform: currentTransform });
      }
    }
  }

  toggleDescriptionItemShoppingCart(index) {
    const descriptions = document.querySelectorAll(".descriptions_items_shopping_cart");
    const arrows = document.querySelectorAll(".arrow_products_shopping_cart");

    const description = descriptions[index];
    const arrow = arrows[index];

    if (!description) return;

    description.classList.toggle("visible");

    if (arrow) {
      arrow.classList.toggle("rotated");
    }
  }
}

// DOM references
const container_draw_items_shopping_cart = document.getElementById("container_draw_items_shopping_cart");
const boxes4_container_shopping_cart = document.getElementById("boxes4_container_shopping_cart");
const product_items_shopping_cart = document.querySelectorAll(".product_items_shopping_cart");
const open_checkout = document.getElementById("open_checkout");
const descriptions_items_shopping_cart = document.querySelectorAll(".descriptions_items_shopping_cart");
const arrow_products_shopping_cart = document.querySelectorAll(".arrow_products_shopping_cart");

// Initial instance
const shoppingCart = new ShoppingCart();
