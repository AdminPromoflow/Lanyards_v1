class ColourClass {
  constructor() {
    this.colourSelected = "one-colour";
  }

  // Setter method for the colourSelected property
  setColourSelected(value) {
      this.colourSelected = value;
  }

  // Getter method for the colourSelected property
  getColourSelected() {
      return this.colourSelected;
  }
  createColour(){
      let priceDataColourResult = this.updateEachPriceColour();
      alert(priceDataColourResult.length + "colour.js line 17");

  //  let firstPrice = priceDataColourResult[0].price;
/*    containersBoxesColour.innerHTML = "";
    var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected();

    if (sidePrintedSelected == "one-side") {
      if (priceDataColourResult.length >= 2) {
          containersBoxesColour.innerHTML += `
          <div class="container_boxes_colour" onclick='colourClass.searchDataColourSelected("one-colour", "0");'>
            <h4 class="dataColour">one-colour</h4>
            <h3 class="priceDataColour">£ ${priceDataColourResult[0].price} per unit</h3>
          </div>
          <div class="container_boxes_colour" onclick='colourClass.searchDataColourSelected("two-colour", "1");'>
            <h4 class="dataColour">two-colour</h4>
            <h3 class="priceDataColour">£ ${priceDataColourResult[1].price} per unit</h3>
          </div>`;
      } else if (priceDataColourResult.length === 0) {
          alert("No hay precios disponibles para la selección actual.");
      }
  } else if (sidePrintedSelected == "two-side") {
      if (priceDataColourResult.length >= 1) {
          containersBoxesColour.innerHTML += `
          <div class="container_boxes_colour" onclick='colourClass.searchDataColourSelected("full-colour", "0");'>
            <h4 class="dataColour">full-colour</h4>
            <h3 class="priceDataColour">£ ${priceDataColourResult[0].price} per unit</h3>
          </div>`;
      } else if (priceDataColourResult.length === 0) {
          alert("No hay precios disponibles para la selección actual.");
      }
  }*/

  }
  updateEachPriceColour() {
    var json = customizeLanyard.getJsonLanyards();
    var materialSelected = material.getMaterialSelected();
    var widthSelected = widthClass.getWidthSelected();
    var amountSelected = priceClass.getAmountSelected();
    var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected(); // Se agrega la selección de sidePrinted

    let priceDataColourResult = [];

    // Iterando a través del JSON de materiales
    for (let i = 0; i < json.length; i++) {
        const material = json[i].materials.material;

        if (material == materialSelected) {
            const widths = json[i].materials.width;

            for (let j = 0; j < widths.length; j++) {
                const width = widths[j].width;
                if (width == widthSelected) {
                    const sidePrinted = widths[j].sidePrinted;

                    for (let k = 0; k < sidePrinted.length; k++) {
                        const noSides = sidePrinted[k].noSides;

                        if (noSides == sidePrintedSelected) { // Filtra por la cantidad de lados impresos seleccionados
                            const noColours = sidePrinted[k].noColours;

                            for (let l = 0; l < noColours.length; l++) {
                                const noColour = noColours[l].noColour;
                                const amounts = noColours[l].amount;

                                for (let m = 0; m < amounts.length; m++) {
                                    const minAmount = amounts[m]['min-amount'];
                                    const maxAmount = amounts[m]['max-amount'];
                                    const pricePerColour = amounts[m].price; // Captura el precio del color

                                    if (Number(amountSelected) >= Number(minAmount) && Number(amountSelected) <= Number(maxAmount)) {
                                        priceDataColourResult.push({
                                            material,
                                            width,
                                            noSides,
                                            noColour,
                                            minAmount,
                                            maxAmount,
                                            price: pricePerColour
                                        });
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }



    // Ajustar precios restando el precio base
    if (priceDataColourResult.length > 0) {
        let basePrice = parseFloat(priceDataColourResult[0].price);
        priceDataColourResult = priceDataColourResult.map(item => ({
            ...item,
            price: parseFloat((item.price - basePrice).toFixed(2))
        }));
    }

    return priceDataColourResult; // Retorna la variable con los precios filtrados
}




  searchDataColourSelected(coloursQuantity, index){
    this.setColourSelected(coloursQuantity);
    this.showSelectedColour();

    previewColourClass.showSelectedPreviewtColour();
    this.getPriceClipSelected(index);


  //  colourSelectorClass.showColourSelector();

  }
  updateColourQuantity(){

    this.createColour();
    this.showSelectedColour();

    previewColourClass.showSelectedPreviewtColour();
    previewColourClass.showColourPreview("none");
  }
  showSelectedColour() {
    // Get the selected colour value
    var data = colourClass.getColourSelected();

    // Select all elements with the class "container_boxes_colour"
    const containerBoxesColour = document.querySelectorAll(".container_boxes_colour");
    // Select all elements with the class "data_colour"
    const dataColour = document.querySelectorAll(".dataColour");

    // Initialize index variable to -1
    var index = -1;
    // Iterate through all elements in dataColour
    for (var i = 0; i < dataColour.length; i++) {
      // If the text content of the current element matches the selected data
      if (dataColour[i].textContent == data) {
        // Set the index to the current position
        index = i;
        // Exit the loop once the matching element is found
        break;
      }
    }

    // Iterate through all elements in containerBoxesColour
    for (var i = 0; i < containerBoxesColour.length; i++) {
      // If the current index matches the found index
      if (index == i) {
        // Set the border of the matching element to "2px solid white"
        containerBoxesColour[i].style.border = "2px solid white";
      } else {
        // Set the border of non-matching elements to "2px solid transparent"
        containerBoxesColour[i].style.border = "2px solid transparent";
      }
    }
}


updatePriceColour() {
    // Get the JSON lanyards data.
    var json = customizeLanyard.getJsonLanyards();

    // Get the selected material.
    var materialSelected = material.getMaterialSelected();

    // Get the selected width.
    var widthSelected = widthClass.getWidthSelected();

    // Get the selected amount.
    var amountSelected = priceClass.getAmountSelected();

    // Get the selected colour.
    var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected();

    // Ensure the priceDataColourResult array is empty before use.
    let priceDataColourResult = [];
    priceDataColourResult.length = 0; // Clear if it contains previous data.

    // Filter the data for the selected material.
    var jsonMaterial = json.find(item => item.materials.material === materialSelected);
    if (!jsonMaterial) return; // Exit if the material is not found.

    // Filter the data for the selected width within the material.
    var jsonWidth = jsonMaterial.materials.width.find(item => item.width === widthSelected);
    if (!jsonWidth) return; // Exit if the width is not found.

    // Filter the data for the selected sidePrinted within the width.
    var jsonSidePrinted = jsonWidth.sidePrinted.find(item => item.noSides === sidePrintedSelected);
    if (!jsonSidePrinted) return; // Exit if sidePrinted is not found.


    // Get available colours.
    const noColours = jsonSidePrinted.noColours;
    if (!noColours || noColours.length === 0) return; // Exit if no data is found.

    // Iterate through the available colour options.
    for (let l = 0; l < noColours.length; l++) {
        const noColour = noColours[l].noColour; // Capture each colour.

        // Get minAmount, maxAmount, and price within each colour.
        const amounts = noColours[l].amount;
        if (!amounts || amounts.length === 0) continue; // Skip if there is no data.

        let priceCaptured = false; // Flag to avoid duplicates.

        // Iterate through the available price ranges.
        for (let m = 0; m < amounts.length; m++) {
            const minAmount = Number(amounts[m]['min-amount']);
            const maxAmount = Number(amounts[m]['max-amount']);
            const price = Number(amounts[m].price);

            // If amountSelected is within the minAmount - maxAmount range, store it.
            if (amountSelected >= minAmount && amountSelected <= maxAmount) {
                priceDataColourResult.push({
                    noColour,
                    minAmount,
                    amountSelected,
                    maxAmount,
                    price
                });
                priceCaptured = true; // Indicate that the correct price has been captured.
                break; // Stop iterating once the correct price is found.
            }
        }

        // If amountSelected is greater than all available ranges, capture the highest interval price.
        if (!priceCaptured) {
            let highestIndex = amounts.length - 1; // Last index.
            let highestMinAmount = Number(amounts[highestIndex]['min-amount']);
            let highestMaxAmount = Number(amounts[highestIndex]['max-amount']);
            let highestPrice = Number(amounts[highestIndex].price);

            priceDataColourResult.push({
                noColour,
                minAmount: highestMinAmount,
                amountSelected,
                maxAmount: highestMaxAmount,
                price: highestPrice
            });
        }
    }
  //  alert(JSON.stringify(priceDataColourResult));

    // Get the elements to display price data.
    const priceDataColour = document.querySelectorAll(".priceDataColour");

    // Update the price display for each element.
    for (var i = 0; i < priceDataColour.length; i++) {
        let totalPriceColour = priceDataColourResult[i].price - priceDataColourResult[0].price;
        priceDataColour[i].innerHTML = "£" + Math.abs(totalPriceColour.toFixed(2)) + " per unit.";
    }
}


  getPriceClipSelected(index){
  const priceDataColour = document.querySelectorAll(".priceDataColour");
  for (var i = 0; i < priceDataColour.length; i++) {

    if (i == index) {

      let text = priceDataColour[i].innerHTML+"";
      let number = +text.match(/-?\d+\.\d+|\d+/); // Finds the first number (float or integer), which can be negative.
      if (number >= 0) {

       let lanyardType = oneTwoEndsClass.getTypeLanyardSelected() + "";

          let result = number.toFixed(2);

          priceClass.setPriceColour(result); // Displays the positive float number with two decimals.
          priceClass.changePricePerLanyard();
      } else {
        console.log("The number clip is negative or no numbers were found. Error: (clip.js line 58)");
      }
    }
  }
}


recalculateColourData(){
  this.createColour();
  this.showSelectedColour();

  previewColourClass.showSelectedPreviewtColour();
  previewColourClass.showColourPreview("none");
}
}


const containersBoxesColour = document.getElementById("containers_boxes_colour");
const colourClass = new ColourClass();
