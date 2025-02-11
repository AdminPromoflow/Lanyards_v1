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
        clipClass.selectClip();
        sidePrintedClass.selectSidePrinted();

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
  }

  // Function to update material prices.
  updatePriceMaterial() {
      var json = customizeLanyard.getJsonLanyards();
      var materialSelected = material.getMaterialSelected();
      var widthSelected = widthClass.getWidthSelected();
      var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected();
      var noColourSelected = colourClass.getColourSelected();
      var amountSelected = priceClass.getAmountSelected();

      let priceDataMaterialResult = new Map();

      json.forEach(item => {
          if (!item.materials) return;
          const material = item.materials.material || "";
          const widths = item.materials.width || [];

          widths.forEach(widthItem => {
              if (!widthItem.sidePrinted) return;
              const width = widthItem.width || "";

              if (width == widthSelected) {
                  widthItem.sidePrinted.forEach(sidePrintedItem => {
                      if (!sidePrintedItem.noColours) return;
                      const noSides = sidePrintedItem.noSides || "";

                      if (sidePrintedItem.noColours.length > 0) {
                          sidePrintedSelected = (noSides == sidePrintedSelected) ? noSides : sidePrintedItem.noColours[0].noSides;
                      }

                      if (noSides == sidePrintedSelected) {
                          sidePrintedItem.noColours.forEach(colourItem => {
                              if (!colourItem.amount) return;
                              const noColour = colourItem.noColour || "";

                              if (colourItem.amount.length > 0) {
                                  noColourSelected = (noColour == noColourSelected) ? noColour : colourItem.amount[0].noColour;
                              }

                              if (noColour == noColourSelected) {
                                  colourItem.amount.forEach(amountItem => {
                                      const minAmount = amountItem['min-amount'];
                                      const maxAmount = amountItem['max-amount'];
                                      const price = amountItem.price;

                                      const key = `${minAmount}-${maxAmount}-${price}`;
                                      if (!priceDataMaterialResult.has(key)) {
                                          priceDataMaterialResult.set(key, { material, width, noSides, noColour, minAmount, maxAmount, price });
                                      }
                                  });
                              }
                          });
                      }
                  });
              }
          });
      });

      const pricesDataMaterial = document.querySelectorAll(".pricesDataMaterial");
      const priceArray = Array.from(priceDataMaterialResult.values());

      for (let i = 0; i < pricesDataMaterial.length; i++) {
          if (priceArray[i]) {
              pricesDataMaterial[i].innerHTML = "£" + priceArray[i].price + " per unit";

              if (json[i]?.materials?.material === materialSelected) {
                  priceClass.setPricePerMaterialWithAmount(priceArray[i].price);
                  priceClass.changePricePerLanyard();
              }
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



    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "setMaterialSelected",
      optionSelected: materialSelected,
      amountSelected: priceClass.getAmountSelected()
    };

    // Set the selected material.
    this.setMaterialSelected(materialSelected);

    // Show the selected material.
    this.showSelectedMaterial();

    // Show the selected preview material.
    previewMaterial.showSelectedPreviewtMaterial(this.getMaterialSelected());

    // Make an AJAX request to set the selected material.
    this.makeAjaxRequestSetMaterialSelected(url, data);
  }

  // Function to make an AJAX request to set the selected material.
  makeAjaxRequestSetMaterialSelected(url, data) {
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
        // Parse the response data as JSON
        data = JSON.parse(data);
        this.setJsonMaterials(data["jsonDataByMaterial"]);

        oneTwoEndsClass.setJsonLanyardType(data["allLanyardTypes"]);
        oneTwoEndsClass.selectOneTwoEnds();
        previewLanyardType.showSelectedPreviewtTemplate();


        widthClass.setJsonWidth(data["allWidth"]);
        widthClass.selectWidth();


        sidePrintedClass.setSidePrintedSelected(data["sidePrintedSelected"]);
        sidePrintedClass.selectSidePrinted();


        clipClass.selectClip();


        // Attachment

        colourClass.setColourSelected(data["noColourSelected"]);
        colourClass.createColour();
        colourClass.showSelectedColour();

        previewColourClass.showSelectedPreviewtColour();
        previewColourClass.showColourPreview("none");

  })
      .catch(error => {
        // Log any errors to the console
        console.error("Error:", error);
      });
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
