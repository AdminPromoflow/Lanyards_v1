// Define a class named Material.
class Material {
  // Constructor method for initializing the Material class.
  constructor() {
    // Initialize the materialSelected property to "Tubular".
    this.materialSelected = "Tubular";
    // Initialize an empty object to store JSON materials.
    var jsonMaterials = {};

    // Call the method to check arrow visibility based on scroll position.
    //this.checkArrowVisibility();
    // Add a scroll event listener to check arrow visibility when scrolling.
    containersBoxesMaterial.addEventListener('scroll', this.checkArrowVisibility);

    // Event listener for the up arrow to scroll the material container up smoothly.
    containersArrowUpMaterial.addEventListener('click', function() {
      containersBoxesMaterial.scrollBy({
        top: -100, // Scroll up (negative value)
        behavior: 'smooth' // Smooth scrolling
      });
    });

    // Event listener for the down arrow to scroll the material container down smoothly.
    containersArrowDownMaterial.addEventListener('click', function() {
      containersBoxesMaterial.scrollBy({
        top: 100, // Scroll down (positive value)
        behavior: 'smooth' // Smooth scrolling
      });
    });
  }

  // Method to check the visibility of the arrows based on scroll position.
  checkArrowVisibility() {
    // If the scroll is at the top, hide the up arrow.
    if (containersBoxesMaterial.scrollTop === 0) {
      containersArrowUpMaterial.style.display = 'none';
    } else {
      containersArrowUpMaterial.style.display = 'block';
    }

    // If the scroll is at the bottom, hide the down arrow.
    if (containersBoxesMaterial.scrollHeight - containersBoxesMaterial.scrollTop === containersBoxesMaterial.clientHeight) {
      containersArrowDownMaterial.style.display = 'none';
    } else {
      containersArrowDownMaterial.style.display = 'block';
    }
  }

  // Setter method for the materialSelected property.
  setMaterialSelected(value) {
    this.materialSelected = value;
  }

  // Getter method for the materialSelected property.
  getMaterialSelected() {
    return this.materialSelected;
  }

  // Setter method to set the JSON materials.
  setJsonMaterials(jsonMaterials) {
    this.jsonMaterials = jsonMaterials;
  }

  // Getter method to get the JSON materials.
  getJsonMaterials() {
    return this.jsonMaterials;
  }

  // Method to make an AJAX request to fetch all materials.
  makeAjaxRequestGetAllMaterials() {
    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "getMaterials"
    };
    // Make a fetch request to the given URL with the specified data.
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        // Check if the response is okay, if so, return the response text.
        if (response.ok) {
          return response.text();
        }
        // If the response is not okay, throw an error.
        throw new Error("Network error.");
      })
      .then(data => {
        // Parse the JSON response and update the lanyard data.
        data = JSON.parse(data);
        customizeLanyard.setJsonLanyards(data["lanyards"]);

        // Call the method to select the material.
        this.selecteMaterial();
      })
      .catch(error => {
        // Log any errors to the console.
        console.error("Error:", error);
      });
  }

  // Method to select the material and update the container with material data.
  selecteMaterial(data) {
    var data = customizeLanyard.getJsonLanyards();
    // Clear the container for materials.
    const children = containersBoxesMaterial.children;

    // Loop through the children and remove all except the arrows.
    for (let i = children.length - 1; i >= 0; i--) {
      const child = children[i];

      // If the child does not have the classes for the arrows, remove it.
      if (!child.classList.contains('containers_arrow_up_material') && !child.classList.contains('containers_arrow_down_material')) {
        containersBoxesMaterial.removeChild(child);
      }
    }

    // Iterate through the fetched lanyards and create HTML elements for each material.
    for (var i = 0; i < data.length; i++) {
      material.createMaterials(data[i]["materials"]);
    }
  }

  // Method to create the HTML elements for materials.
  createMaterials(data, price) {
    // Append a new material box to the containersBoxesMaterial's innerHTML.
    containersBoxesMaterial.innerHTML +=
      `<div class="container_boxes_material" onclick="material.searchDataMaterialSelected('${data['material']}');">
        <h4 class="dataMaterial">${data['material']}</h4>
        <h3 class="pricesDataMaterial">£0 per unit</h3>
      </div>`;

    // Query all elements with the class "pricesDataMaterial".
    const pricesDataMaterial = document.querySelectorAll('.pricesDataMaterial');
  }

  // Method to update the prices of the materials.
  updatePriceMaterial() {
    // Get the JSON lanyards data from the customizeLanyard object.
    var json = customizeLanyard.getJsonLanyards();

    // Get the currently selected material.
    var materialSelected = material.getMaterialSelected();

    var widthSelected;
    var sidePrintedSelected;
    var noColourSelected;

    // Get the selected amount from the priceClass object.
    var amountSelected = priceClass.getAmountSelected();

    // Ensure the priceDataMaterialResult array is empty.
    let priceDataMaterialResult = [];
    priceDataMaterialResult.length = 0; // Clear the array if it has any data.

    // Iterate through each item in the JSON array.
    for (let i = 0; i < json.length; i++) {
      const material = json[i].materials.material;
      const widths = json[i].materials.width;

      for (let j = 0; j < widths.length; j++) {
        const width = widths[j].width;

        if (width == widths[0].width) {
          const sidePrinted = widths[j].sidePrinted;

          for (let k = 0; k < sidePrinted.length; k++) {
            const noSides = sidePrinted[k].noSides;
            sidePrintedSelected = sidePrinted[0].noSides;

            if (noSides == sidePrintedSelected) {
              const noColours = sidePrinted[k].noColours;

              for (let l = 0; l < noColours.length; l++) {
                const noColour = noColours[l].noColour;
                noColourSelected = noColours[0].noColour;

                if (noColour == noColourSelected) {
                  const amounts = noColours[l].amount;

                  for (let m = 0; m < amounts.length; m++) {
                    const minAmount = amounts[m]['min-amount'];
                    const maxAmount = amounts[m]['max-amount'];
                    const pricePerMaterial = amounts[m].price; // Capture the material price.

                    if (Number(amountSelected) >= Number(minAmount) && Number(amountSelected) <= Number(maxAmount)) {
                      // Check if an entry with the same material, width, sides, and colours already exists.
                      let existingIndex = priceDataMaterialResult.findIndex(item =>
                        item.material === material &&
                        item.width === width &&
                        item.noSides === noSides &&
                        item.noColour === noColour
                      );

                      if (existingIndex === -1) {
                        // If it doesn't exist, add a new object with the material price.
                        priceDataMaterialResult.push({
                          material,
                          width,
                          noSides,
                          noColour,
                          minAmount,
                          maxAmount,
                          price: pricePerMaterial
                        });
                      } else {
                        // If it exists, update the price.
                        priceDataMaterialResult[existingIndex].price = pricePerMaterial;
                      }
                    } else if (Number(amountSelected) > Number(maxAmount)) {
                      // If the selected amount is higher than the maximum, use the highest available price.
                      let highestIndex = amounts.length - 1;
                      let highestMinAmount = amounts[highestIndex]['min-amount'];
                      let highestMaxAmount = amounts[highestIndex]['max-amount'];
                      let highestPrice = amounts[highestIndex].price;

                      let existingIndex = priceDataMaterialResult.findIndex(item =>
                        item.material === material &&
                        item.width === width &&
                        item.noSides === noSides &&
                        item.noColour === noColour
                      );

                      if (existingIndex === -1) {
                        // Add the highest available price.
                        priceDataMaterialResult.push({
                          material,
                          width,
                          noSides,
                          noColour,
                          minAmount: highestMinAmount,
                          maxAmount: highestMaxAmount,
                          price: highestPrice
                        });
                      } else {
                        // If it exists, update with the highest available price.
                        priceDataMaterialResult[existingIndex].price = highestPrice;
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    // Query all elements with the class "pricesDataMaterial".
    const pricesDataMaterial = document.querySelectorAll(".pricesDataMaterial");

    // Iterate through the priceDataMaterialResult array to update the HTML.
    for (var i = 0; i < priceDataMaterialResult.length; i++) {
      pricesDataMaterial[i].innerHTML = "£" + priceDataMaterialResult[i]["price"] + " per unit";

      if (json[i]["materials"]["material"] == materialSelected) {
        priceClass.setPricePerMaterialWithAmount(priceDataMaterialResult[i]["price"]);
        priceClass.changePricePerLanyard();
      }
    }
  }

  // Method to search for a selected material and update the price.
  searchDataMaterialSelected(materialSelected) {
    chargingClass.hideShowchargin(true); // Show loading animation.


    // Set the selected material.
    this.setMaterialSelected(materialSelected);

    // Refresh the material display and related components.
    this.refreshMaterial();
    oneTwoEndsClass.refreshLanyardType();
    widthClass.refreshWidth();
    sidePrintedClass.refreshSidePrintedData();
    colourClass.updateColourQuantity();
    clipClass.updateClip();
    priceClass.changePricePerLanyard();

  }

  // Method to refresh the selected material and its display.
  refreshMaterial(){
    this.getPriceDivsMaterialSelected();
    this.setOriginValuesAfteMaterial();
    this.showSelectedMaterial(); // Display the selected material.
    this.updatePriceMaterial(); // Update the material prices.
    previewMaterial.showSelectedPreviewtMaterial(this.getMaterialSelected()); // Show preview of selected material.
    chargingClass.hideShowchargin(false); // Hide loading animation.
  }
  getPriceDivsMaterialSelected(){

    const pricesDataMaterialElements = document.querySelectorAll('.pricesDataMaterial');
    let dataMaterialElements = document.querySelectorAll('.dataMaterial');
    let materialSelected = this.getMaterialSelected();
    for (let i = 0; i < dataMaterialElements.length; i++) {
      let material = dataMaterialElements[i].innerText;
      if (material == materialSelected) {
        let number = pricesDataMaterialElements[i].innerText;
        let price = number.match(/\d+(\.\d+)?/)[0];
        // Update the price class with the selected material's price.
        priceClass.setPricePerMaterialWithAmount(price);
        priceClass.changePricePerLanyard();
      }
    }
  }

  setOriginValuesAfteMaterial() {
    oneTwoEndsClass.autoSelectLanyardType();
    widthClass.autoSelectWidth();
    sidePrintedClass.autoSelectSidePrinted();

    var json = customizeLanyard.getJsonLanyards();
    var selectedMaterial = material.getMaterialSelected();

    // Encontrar el índice del material seleccionado
    var i = json.findIndex(item => item.materials.material === selectedMaterial);

    if (i !== -1) {
        colourClass.setColourSelected(json[i].materials.width[0].sidePrinted[0].noColours[0].noColour);
        clipClass.setClipSelected(json[i].materials.width[0].clips[0].name);
    } else {
        console.error("Material seleccionado no encontrado en el JSON.");
    }
}

  // Method to highlight the selected material by setting its border.
  showSelectedMaterial() {
    const containerBoxesMaterial = document.querySelectorAll(".container_boxes_material");
    const material = this.getMaterialSelected();

    // Set the border of all material containers to transparent.
    containerBoxesMaterial.forEach(container => {
      container.style.border = "2px solid transparent";
    });

    // Iterate through each material container to highlight the selected one.
    containerBoxesMaterial.forEach(container => {
      const dataMaterial = container.querySelector(".dataMaterial");

      // If the material matches the selected one, highlight the border.
      if (dataMaterial.textContent === material) {
        container.style.border = "2px solid white";
      }
    });
  }
}

// Get the container element for materials by its ID.
const containersBoxesMaterial = document.getElementById("containers_boxes_material");
var containersArrowUpMaterial = document.getElementById("containers_arrow_up_material");
var containersArrowDownMaterial = document.getElementById("containers_arrow_down_material");

// Create an instance of the Material class to initialize and manage materials.
const material = new Material();
