// Define a class named Material.
class Material {
  // Constructor method.
  constructor() {
    // Initialize the materialSelected property to "Tubular".
    this.materialSelected = "Tubular";
    // Initialize an empty object to store JSON materials.
    var jsonMaterials = {};
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

  // Function to make an AJAX request to fetch all materials.
  makeAjaxRequestGetAllMaterials() {

    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "getMaterials"
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
        customizeLanyard.setJsonLanyards(data["lanyards"]);

        this.selecteMaterial();
      //  clipClass.selectClip();
      //  sidePrintedClass.selectSidePrinted();

      })
      .catch(error => {
        // Log any errors to the console
        console.error("Error:", error);
      //  location.reload();
      });
  }

  selecteMaterial(data){
    var data = customizeLanyard.getJsonLanyards();
    // Clear the container for materials
    containersBoxesMaterial.innerHTML = "";
    // Set the fetched JSON materials
    //material.setJsonMaterials(data);
    // Iterate through the lanyards and create materials HTML elements
    for (var i = 0; i < data.length; i++) {
      material.createMaterials(data[i]["materials"]);
    }
  }

  // Function to create materials HTML elements.
  createMaterials(data, price) {
    // Append a new material box to the containersBoxesMaterial's innerHTML.
    containersBoxesMaterial.innerHTML +=
      `<div class="container_boxes_material" onclick="material.searchDataMaterialSelected('${data['material']}');">
        <h4 class="dataMaterial">${data['material']}</h4>
        <h3 class="pricesDataMaterial">£0 per unit</h3>
      </div>`;

      const pricesDataMaterial = document.querySelectorAll('.pricesDataMaterial');
  }

  // Function to update material prices.
  updatePriceMaterial() {
      // Get the JSON lanyards data from the customizeLanyard object.
      var json = customizeLanyard.getJsonLanyards();

      // Get the material selected.
      var materialSelected = material.getMaterialSelected();

      var widthSelected;
      var sidePrintedSelected;
      var noColourSelected;

      // Get the amount selected from the priceClass object.
      var amountSelected = priceClass.getAmountSelected();

      // Ensure the priceDataMaterialResult array is empty
      let priceDataMaterialResult = [];
      priceDataMaterialResult.length = 0; // Vaciar el array en caso de que tenga datos previos

      // Iterating through each item in the JSON array.
      for (let i = 0; i < json.length; i++) {
          const material = json[i].materials.material;
          const widths = json[i].materials.width;

          for (let j = 0; j < widths.length; j++) {
              const width = widths[j].width;

              if (width == widths[0].width) {
                  const sidePrinted = widths[j].sidePrinted;

                  for (let k = 0; k < sidePrinted.length; k++) {
                      const noSides = sidePrinted[k].noSides;
                      sidePrintedSelected =  sidePrinted[0].noSides;

                      if (noSides == sidePrintedSelected) {
                          const noColours = sidePrinted[k].noColours;

                          for (let l = 0; l < noColours.length; l++) {
                              const noColour = noColours[l].noColour;
                              noColourSelected =  noColours[0].noColour;

                              if (noColour == noColourSelected) {
                                  const amounts = noColours[l].amount;

                                  for (let m = 0; m < amounts.length; m++) {
                                      const minAmount = amounts[m]['min-amount'];
                                      const maxAmount = amounts[m]['max-amount'];
                                      const pricePerMaterial = amounts[m].price; // Captura el precio del material

                                      if (Number(amountSelected) >= Number(minAmount) && Number(amountSelected) <= Number(maxAmount)) {
                                          // Verifica si ya existe una entrada con el mismo material, ancho, lados y colores
                                          let existingIndex = priceDataMaterialResult.findIndex(item =>
                                              item.material === material &&
                                              item.width === width &&
                                              item.noSides === noSides &&
                                              item.noColour === noColour
                                          );

                                          if (existingIndex === -1) {
                                              // Si no existe, agrega un nuevo objeto con el precio del material
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
                                              // Si ya existe, actualiza el precio en caso de cambios
                                              priceDataMaterialResult[existingIndex].price = pricePerMaterial;
                                          }
                                      } else if (Number(amountSelected) > Number(maxAmount)) {
                                          // Si el amountSelected es mayor que el maxAmount, usa el precio del mayor intervalo disponible
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
                                              // Agregar el precio del mayor intervalo
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
                                              // Si ya existe, actualizar el precio con el mayor intervalo disponible
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

      // Get all elements with the class "pricesDataMaterial".
      const pricesDataMaterial = document.querySelectorAll(".pricesDataMaterial");

      // Iterating through the priceDataMaterialResult array to update the HTML.
      for (var i = 0; i < priceDataMaterialResult.length; i++) {
          pricesDataMaterial[i].innerHTML = "£" + priceDataMaterialResult[i]["price"] + " per unit";

          if (json[i]["materials"]["material"] == materialSelected) {
              priceClass.setPricePerMaterialWithAmount(priceDataMaterialResult[i]["price"]);
              priceClass.changePricePerLanyard();
          }
      }
  }

  // Function to search for a material.
  searchDataMaterialSelected(materialSelected) {

    // Capture all elements with the class 'pricesDataMaterial'
    const pricesDataMaterialElements = document.querySelectorAll('.pricesDataMaterial');
    let dataMaterialElements = document.querySelectorAll('.dataMaterial');

    for (let i = 0; i < dataMaterialElements.length; i++) {
      let material = dataMaterialElements[i].innerText;
      if (material == materialSelected) {
        let number = pricesDataMaterialElements[i].innerText;;
        let price = number.match(/\d+(\.\d+)?/)[0];


         priceClass.setPricePerMaterialWithAmount(price);
         priceClass.changePricePerLanyard();

      }
    }


    // Material
    this.setMaterialSelected(materialSelected);
    this.refreshMaterial();

    // Lanyard Type
    oneTwoEndsClass.refreshLanyardType();

    widthClass.refreshWidth();


  }

  refreshMaterial(){
    chargingClass.hideShowchargin(true);
    this.showSelectedMaterial();
    this.updatePriceMaterial();
    previewMaterial.showSelectedPreviewtMaterial(this.getMaterialSelected());
    chargingClass.hideShowchargin(false);
  }

  // Function to display the selected material.
  showSelectedMaterial() {
    // Get all elements with the class "container_boxes_material".
    const containerBoxesMaterial = document.querySelectorAll(".container_boxes_material");

    // Get the currently selected material.
    const material = this.getMaterialSelected();

    // Set the border of all material containers to transparent.
    containerBoxesMaterial.forEach(container => {
      container.style.border = "2px solid transparent";
    });

    // Iterate through each material container to highlight the selected one.
    containerBoxesMaterial.forEach(container => {
      // Get the element that contains the material name.
      const dataMaterial = container.querySelector(".dataMaterial");

      // If the text content of the dataMaterial element matches the selected material, set the border to white.
      if (dataMaterial.textContent === material) {
        container.style.border = "2px solid white";
      }
    });
  }

}

// Get the container element for materials by its ID.
const containersBoxesMaterial = document.getElementById("containers_boxes_material");

// Create an instance of the Material class to initialize and manage materials.
const material = new Material();
