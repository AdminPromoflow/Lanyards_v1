// Class MaterialHome: Handles the behavior of displaying material descriptions
class MaterialHome {
  constructor() {
    // Ensure there are elements to work with before proceeding
    if (itemMaterial.length === 0 || containerTextMaterials.length === 0) return;

    // Initialize all material text containers as hidden
    containerTextMaterials.forEach(container => (container.style.display = "none"));

    // Add event listeners to each material item for hover and click interactions
    itemMaterial.forEach((item, index) => {
      item.addEventListener("mouseover", () => this.showMaterialInfo(index));
      item.addEventListener("click", () => this.showMaterialInfo(index));
    });

    // Activate the first material description by default
    this.showMaterialInfo(0);
  }

  /**
   * Displays the material description for the given index
   * and hides all others.
   * @param {number} index - The index of the material to show
   */
  showMaterialInfo(index) {
    containerTextMaterials.forEach((container, i) => {
      container.style.display = i === index ? "flex" : "none";
    });

    // Update the active index
    containerTextMaterialsOn = index;
  }
}

// Selecting elements from the DOM
const itemMaterial = document.querySelectorAll(".itemMaterial");
const containerTextMaterials = document.querySelectorAll(".containerTextMaterials");
const buttonMaterialsBox = document.querySelectorAll(".buttonMaterialsBox");
const materialForSelect = document.querySelectorAll(".material-for-select");
const documento = document.documentElement;

// Variable to track the currently active material description
let containerTextMaterialsOn = 0;

// Creating an instance of the MaterialHome class
const materialHome = new MaterialHome();
