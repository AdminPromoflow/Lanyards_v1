class ColourClass {
  constructor() {
    this.colourSelected = "one-colour";
  }

  setColourSelected(value) {
      this.colourSelected = value;
  }

  getColourSelected() {
      return this.colourSelected;
  }

  cleanColourQuantity(){
    containersBoxesColour.innerHTML = "";
  }

  getDataColourQuantityAvalaible() {
    var json = customizeLanyard.getJsonLanyards();
    var materialSelected = material.getMaterialSelected();
    var widthSelected = widthClass.getWidthSelected();
    var amountSelected = priceClass.getAmountSelected();
    var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected();
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

                        if (noSides == sidePrintedSelected) {
                            const noColours = sidePrinted[k].noColours;

                            for (let l = 0; l < noColours.length; l++) {
                                const noColour = noColours[l].noColour;

                                const amounts = noColours[l].amount;

                                let found = false;  // Indicador para saber si encontramos un rango válido
                                let maxAmountRange = null;  // Guardamos el rango máximo en caso de que no encontremos ninguno

                                for (let m = 0; m < amounts.length; m++) {
                                    const minAmount = amounts[m]['min-amount'];
                                    const maxAmount = amounts[m]['max-amount'];
                                    const pricePerColour = amounts[m].price;

                                    // Comprobamos si el amountSelected está dentro de los rangos
                                    if (Number(amountSelected) >= Number(minAmount) && Number(amountSelected) <= Number(maxAmount)) {
                                        priceDataColourResult.push({
                                            noColour,
                                            price: pricePerColour
                                        });
                                        found = true;
                                        break;  // Terminamos el bucle porque ya encontramos el rango adecuado
                                    }

                                    // Si amountSelected es mayor que maxAmount, guardamos el rango
                                    if (Number(amountSelected) > Number(maxAmount)) {
                                        maxAmountRange = {
                                            noColour,
                                            price: pricePerColour
                                        };
                                    }
                                }

                                // Si no encontramos un rango adecuado, agregamos el rango máximo con la misma estructura
                                if (!found && maxAmountRange) {
                                    priceDataColourResult.push({
                                        noColour: maxAmountRange.noColour,
                                        price: maxAmountRange.price
                                    });
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

    this.setColourSelectedIndex(index);

    /*material.refreshMaterial();
    oneTwoEndsClass.refreshLanyardType();
    widthClass.refreshWidth();
    sidePrintedClass.refreshSidePrintedData();
    clipClass.refreshClip();*/
    this.refreshColourQuantity();
    priceClass.changePricePerLanyard();
    previewColourClass.showColourPreview("flex");

  //  colourSelectorClass.showColourSelector();

  }

  setColourSelectedIndex(value) {
    this.colourSelectedIndex = value;
  }

  getColourSelectedIndex() {
      return this.colourSelectedIndex;
  }

  refreshColourQuantity(){
    this.cleanColourQuantity();
    this.autoSelectColourQuantity();

    let coloursQuantityAvailable = this.getDataColourQuantityAvalaible();

    for (var i = 0; i < coloursQuantityAvailable.length; i++) {
      this.drawColourQuantityvailable(coloursQuantityAvailable[i], i);
    }
    this.showSelectedColour();
    this.showTextPrintedOption();
    this.updatePriceColourIndividual();

    previewColourClass.showSelectedPreviewtColour();
  }

  drawColourQuantityvailable(data, index){
    containersBoxesColour.innerHTML += `
    <div class="container_boxes_colour" onclick='colourClass.searchDataColourSelected("${data["noColour"]}", "${index}");'>
      <h4 class="dataColour">${data["noColour"]}</h4>
      <h3 class="priceDataColour">£ ${data["price"]} per unit</h3>
    </div>`;
  }
  showTextPrintedOption() {
  const textColourQuantity = document.getElementById("text-colour-quantity");
  const colourSelected = this.getColourSelected();

  const messages = {
    "one-colour": "The selected material uses <strong> screen print</strong>, including one background colour and up to two print colours. <br><br>Please choose your preferred colours.",
    "two-colour": "The selected material uses <strong> screen print</strong>, including one background colour and up to two print colours. <br><br>Please choose your preferred colours.",
    "full-colour": "The selected material uses <strong>dye sublimation</strong>, allowing unlimited colours and full-colour designs. <br><br>Please click ‘Next’ to proceed with your artwork."
  };

  const defaultMessage = "Select the number of colours you want printed on your lanyard:";
  textColourQuantity.innerHTML = messages[colourSelected] || defaultMessage;
}

  autoSelectColourQuantity(){
    var data = this.getDataColourQuantityAvalaible();
    var existColourQuantity = false;
    var index = 0;

    data.forEach((element, i) => {
      if (element["noColour"]+"" == this.getColourSelected()+"") {

        existColourQuantity = true;
        index = i;
      }
    });


    if (existColourQuantity) {
      this.setColourSelectedIndex(index);
    }
    else {
      this.setColourSelectedIndex(0);
      this.setColourSelected(data[0]["noColour"]);
    }
  }

  showSelectedColour() {
    // Get the selected colour value
    var data = colourClass.getColourSelected();

    // Select all elements with the class "container_boxes_colour"
    const containerBoxesColour = document.querySelectorAll(".container_boxes_colour");
    // Select all elements with the class "data_colour"
    const dataColour = document.querySelectorAll(".dataColour");

    var index = this.getColourSelectedIndex();

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

  updatePriceColourIndividual(){
    let index = this.getColourSelectedIndex();
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

}


const containersBoxesColour = document.getElementById("containers_boxes_colour");
const colourClass = new ColourClass();
