class Width {
  constructor(){
    this.widthSelected = "10mm";
    var jsonWidth = {};
  }
  setWidthSelected(value) {
    this.widthSelected = value;
  }

  getWidthSelected() {
    return this.widthSelected;
  }
  setJsonWidth(jsonWidth) {
    this.jsonWidth = jsonWidth;
  }
  getJsonWidth() {
   return this.jsonWidth;
 }

  createWidth(data, index){

    containersBoxesWidth.innerHTML +=
        '<div class="container_boxes_width"   onclick="widthClass.searchDataWidthSelected(\'' + data['width']  + '\', \' '+ index +'  \');">'+
          '<img src="../../'+data["imgLink"]+'" alt="">'+
          '<h4 class="dataWidth">'+data["width"]+'</h4>'+
          '<h3 class="priceDataWidth">+£0 per unit</h3>'+
        '</div>'
    ;
  }

  selectWidth(){
    var data = this.getJsonWidth();
    // Clean the width options
    widthClass.cleanWidth();

    // Iterate through the allWidth and create width elements
    for (var i = 0; i < data.length; i++) {
      widthClass.createWidth(data[i], i);
    }

    // Update the price based on the width
    widthClass.updatePriceWidth();

    // Show the selected width
    widthClass.showSelectedWidth();

  }

  searchDataWidthSelected(width, index) {

    // Set the selected material.
    this.setWidthSelected(width);

    //artworkPreviewClass.changeAllSettingsWidth();

    previewLanyardType.showSelectedPreviewtTemplate();

    this.showSelectedWidth();

    const priceDataWidth = document.querySelectorAll(".priceDataWidth");

    for (var i = 0; i < priceDataWidth.length; i++) {
      if (i == index) {

        let text = priceDataWidth[i].innerHTML+"";
        let number = +text.match(/-?\d+\.\d+|\d+/); // Finds the first number (float or integer), which can be negative.

      //  alert(number);
        if (number >= 0) {
        //  alert("hi, I just enter in if");
            let result = number.toFixed(2);
            priceClass.setPriceWidth(result); // Displays the positive float number with two decimals.
            priceClass.changePricePerLanyard();
        } else {
          throw new Error("The number width is negative or no numbers were found.");
          //alert("hi, I just enter in else too");
        }
      }
    }

    sidePrintedClass.cleanSidePrinted();

    // Draw SidePrinted available:
    let sidePrintedAvailable = sidePrintedClass.getDataSidePrintedAvailable();

    for (var i = 0; i < sidePrintedAvailable.length; i++) {
      sidePrintedClass.drawSidePrintedAvailable(sidePrintedAvailable[i], i);
    }

    sidePrintedClass.updatePriceSidePrinted();
  //  artworkClass.changeWidthRightPanel();

  }

  updatePriceWidth() {
      // Get the JSON lanyards data from the customizeLanyard object.
      var json = customizeLanyard.getJsonLanyards();

      // Get the selected material from the material object.
      var materialSelected = material.getMaterialSelected();

      // Get the selected side printed option from the sidePrintedClass object.
      var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected();

      // Get the number of colors selected from the customizeLanyard object.
      var noColourSelected = colourClass.getColourSelected();

      // Get the amount selected from the priceClass object.
      var amountSelected = priceClass.getAmountSelected();

      // Ensure the priceDataWidthResult array is empty
      let priceDataWidthResult = [];
      priceDataWidthResult.length = 0; // Vaciar el array en caso de que tenga datos previos

      // Get only the materialSelected from json
      var jsonMaterial = json.find(item => item.materials.material === materialSelected);

      if (!jsonMaterial) return; // Exit if material is not found

      const widths = jsonMaterial.materials.width;

      // Iterate through the widths of the selected material
      for (let j = 0; j < widths.length; j++) {
          const width = widths[j].width;
          const sidePrinted = widths[j].sidePrinted;

          for (let k = 0; k < sidePrinted.length; k++) {
              const noSides = sidePrinted[k].noSides;
              sidePrintedSelected = (noSides == sidePrintedSelected) ? noSides : sidePrinted[0].noSides;

              if (noSides == sidePrintedSelected) {
                  const noColours = sidePrinted[k].noColours;

                  for (let l = 0; l < noColours.length; l++) {
                      const noColour = noColours[l].noColour;
                      noColourSelected = (noColour == noColourSelected) ? noColour : noColours[0].noColour;

                      if (noColour == noColourSelected) {
                          const amounts = noColours[l].amount;

                          for (let m = 0; m < amounts.length; m++) {
                              const minAmount = amounts[m]['min-amount'];
                              const maxAmount = amounts[m]['max-amount'];
                              const pricePerMaterial = amounts[m].price; // Captura el precio del material

                              if (Number(amountSelected) >= Number(minAmount) && Number(amountSelected) <= Number(maxAmount)) {
                                  // Verifica si ya existe una entrada con el mismo width, lados y colores
                                  let existingIndex = priceDataWidthResult.findIndex(item =>
                                      item.width === width &&
                                      item.noSides === noSides &&
                                      item.noColour === noColour
                                  );

                                  if (existingIndex === -1) {
                                      // Si no existe, agrega un nuevo objeto con el precio del width
                                      priceDataWidthResult.push({
                                          width,
                                          noSides,
                                          noColour,
                                          minAmount,
                                          maxAmount,
                                          price: pricePerMaterial
                                      });
                                  } else {
                                      // Si ya existe, actualiza el precio en caso de cambios
                                      priceDataWidthResult[existingIndex].price = pricePerMaterial;
                                  }
                              } else if (Number(amountSelected) > Number(maxAmount)) {
                                  // Si el amountSelected es mayor que el maxAmount, usa el precio del mayor intervalo disponible
                                  let highestIndex = amounts.length - 1;
                                  let highestMinAmount = amounts[highestIndex]['min-amount'];
                                  let highestMaxAmount = amounts[highestIndex]['max-amount'];
                                  let highestPrice = amounts[highestIndex].price;

                                  let existingIndex = priceDataWidthResult.findIndex(item =>
                                      item.width === width &&
                                      item.noSides === noSides &&
                                      item.noColour === noColour
                                  );

                                  if (existingIndex === -1) {
                                      // Agregar el precio del mayor intervalo
                                      priceDataWidthResult.push({
                                          width,
                                          noSides,
                                          noColour,
                                          minAmount: highestMinAmount,
                                          maxAmount: highestMaxAmount,
                                          price: highestPrice
                                      });
                                  } else {
                                      // Si ya existe, actualizar el precio con el mayor intervalo disponible
                                      priceDataWidthResult[existingIndex].price = highestPrice;
                                  }
                              }
                          }
                      }
                  }
              }
          }
      }

      // Get the elements to display the price data
      const priceDataWidth = document.querySelectorAll(".priceDataWidth");
      var totalPriceWidth;

      // Update the price display for each element
      for (var i = 0; i < priceDataWidth.length; i++) {
          totalPriceWidth = priceDataWidthResult[i];
          priceDataWidth[i].innerHTML = "£" + totalPriceWidth.price.toFixed(2) + " per unit";
      }
  }


  cleanWidth(){
    containersBoxesWidth.innerHTML = "";
  }

  showSelectedWidth(){

    var width = widthClass.getWidthSelected();

    const containerBoxesWidth = document.querySelectorAll(".container_boxes_width");

    const dataWidth = document.querySelectorAll(".dataWidth");

    var index;

   for (var i = 0; i < dataWidth.length; i++) {

     if (dataWidth[i].textContent == width) {
       index = i;
     }
   }

    for (var i = 0; i < containerBoxesWidth.length; i++) {
      if (index == i) {
        containerBoxesWidth[i].style.border = "2px solid white";
      }
      else {
        containerBoxesWidth[i].style.border = "2px solid transparent";
      }
    }
  }
}

// la siguiente linea se va a eliminar porque se van a crear box-width automaticos
const containerBoxesWidth = document.querySelectorAll(".container_boxes_width");
const containersBoxesWidth = document.getElementById("containers_boxes_width");

const dataWidth = document.querySelectorAll(".dataWidth");
const widthClass = new Width();
