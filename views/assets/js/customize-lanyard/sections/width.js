class Width {
  constructor(){
  //  this.widthSelected = "10mm";
  this.setWidthSelectedIndex(0);
    var jsonWidth = {};
  }

  setWidthSelected(value) {
    this.widthSelected = value;
  }

  getWidthSelected() {
    return this.widthSelected;
  }

  setWidthSelectedIndex(value) {
    this.widthSelectedIndex = value;
  }

  getWidthSelectedIndex() {
      return this.widthSelectedIndex;
  }

  setJsonWidth(jsonWidth) {
    this.jsonWidth = jsonWidth;
  }

  getJsonWidth() {
   return this.jsonWidth;
 }

  drawWidthAvailable(data, index){

    containersBoxesWidth.innerHTML +=
        '<div class="container_boxes_width"   onclick="widthClass.searchDataWidthSelected(\'' + data['width']  + '\', \' '+ index +'  \');">'+
          '<img src="../../'+data["imgLink"]+'" alt="">'+
          '<h4 class="dataWidth">'+data["width"]+'</h4>'+
          '<h3 class="priceDataWidth">+£'+data["price"]+' per unit</h3>'+
        '</div>'
    ;
  }

  autoSelectWidth() {
    var data = this.getDataWidthAvalaible();
    var existWidth = false;
    var index = 0;

    data.forEach((element, i) => {
      if (element["width"]+"" == this.getWidthSelected()+"") {

        existWidth = true;
        index = i;
      }
    });


    if (existWidth) {
      this.setWidthSelectedIndex(index);

    }
    else {
      this.setWidthSelectedIndex(0);
      this.setWidthSelected("10mm");
    }




  /*  const json = customizeLanyard.getJsonLanyards();  // Get the lanyard JSON data
    const selectedMaterial = material.getMaterialSelected();  // Get the selected material
    const i = json.findIndex(item => item.materials.material === selectedMaterial);  // Find the index of the selected material

    if (i !== -1) {  // If the material exists
      const width = json[i].materials.width;  // Get the available widths for the material

      // Check if the selected width matches any of the available ones
      const isWidthValid = width.some(w => w.width === this.getWidthSelected());  // Compare by "width" property

      if (this.getWidthSelected() === undefined) {  // If no width is selected
        //this.setWidthSelected(width[0].width);  // Select the first available width
        this.searchDataWidthSelected(width[0].width, 0);
        this.setWidthSelectedIndex(0);
      } else if (!isWidthValid) {  // If the selected width doesn't match any available
      //  this.setWidthSelected(width[0].width);  // Select the first available width
        this.searchDataWidthSelected(width[0].width, 0);
        this.setWidthSelectedIndex(0);
      }
    }*/
  }

  getDataWidthAvalaible(){
    // Get the JSON lanyards data.
    var json = customizeLanyard.getJsonLanyards();

    // Get the selected material.
    var materialSelected = material.getMaterialSelected();

    // Get the selected amount.
    var amountSelected = priceClass.getAmountSelected();

    // Ensure the priceDataWidthResult array is empty before use.
    let priceDataWidthResult = [];
    priceDataWidthResult.length = 0; // Clear if it contains previous data.

    // Filter the data for the selected material.
    var jsonMaterial = json.find(item => item.materials.material === materialSelected);
    if (!jsonMaterial) return; // Exit if the material is not found.

    const widths = jsonMaterial.materials.width; // Get available widths.

    // Iterate through the widths of the selected material.
    for (let j = 0; j < widths.length; j++) {
        const width = widths[j].width; // Store each width.
        const imgLink = widths[j].imgLink; // Store each width.


        // Get the first noSides (position 0).
        const sidePrinted = widths[j].sidePrinted;
        if (!sidePrinted || sidePrinted.length === 0) continue; // Skip if there is no data.
        const noSides = sidePrinted[0].noSides; // Use only the first position (minimum).

        // Get the first noColours (position 0) within the first noSides.
        const noColours = sidePrinted[0].noColours;
        if (!noColours || noColours.length === 0) continue; // Skip if there is no data.
        const noColour = noColours[0].noColour; // Use only the first position (minimum).

        // Get the values of minAmount, maxAmount, and price within the first noColour.
        const amounts = noColours[0].amount;
        if (!amounts || amounts.length === 0) continue; // Skip if there is no data.

        let priceCaptured = false; // Flag to avoid duplicates.

        for (let m = 0; m < amounts.length; m++) {
            const minAmount = Number(amounts[m]['min-amount']);
            const maxAmount = Number(amounts[m]['max-amount']);
            const price = Number(amounts[m].price);

            // If amountSelected is within the minAmount - maxAmount range, store it.
            if (amountSelected >= minAmount && amountSelected <= maxAmount) {
                priceDataWidthResult.push({
                    width,
                    imgLink,
                    price
                });
                priceCaptured = true; // Mark that the correct price has been captured.
                break; // Stop iterating once the correct price is found.
            }
        }

        // If amountSelected is greater than all available ranges, capture the highest interval price.
        if (!priceCaptured) {
            let highestIndex = amounts.length - 1; // Last index.
            let highestMinAmount = Number(amounts[highestIndex]['min-amount']);
            let highestMaxAmount = Number(amounts[highestIndex]['max-amount']);
            let highestPrice = Number(amounts[highestIndex].price);

            priceDataWidthResult.push({
                width,
                imgLink,
                price: highestPrice
            });
        }
    }

    let priceDataWidthFinal = [];
    priceDataWidthFinal.length = 0;
    var firstPrice = priceDataWidthResult[0]["price"];

    priceDataWidthResult.forEach((element, i) => {

      priceDataWidthFinal.push({
           width: element.width,
           imgLink: element.imgLink,
           price: (element.price - firstPrice).toFixed(2)
        }
      )
    });


    return priceDataWidthFinal;

  }

  updateWidth() {
      var json = customizeLanyard.getJsonLanyards();
      var materialSelected = material.getMaterialSelected();

      // Busca el material seleccionado y obtiene la lista de width
      var data = json.find(item => item.materials.material === materialSelected)?.materials.width || [];

      // Limpia las opciones de ancho
      widthClass.cleanWidth();

      // Itera sobre los anchos disponibles y crea los elementos correspondientes
      for (var i = 0; i < data.length; i++) {
          widthClass.createWidth(data[i], i);
      }
  }

  searchDataWidthSelected(width, index) {
    this.setWidthSelected(width);
    this.setWidthSelectedIndex(index);

    previewLanyardType.showSelectedPreviewTemplate();
    previewTemplate.activateTemplate();
    attachmentClass.refreshAttachment();



    material.refreshMaterial();
    oneTwoEndsClass.refreshLanyardType();
    this.refreshWidth();
    sidePrintedClass.refreshSidePrintedData()
    colourClass.refreshColourQuantity();
    clipClass.refreshClip();
    priceClass.changePricePerLanyard();
    previewManual.refreshTextLanyard();
    previewManual.refreshImageLanyard()
    artworkPreviewClass.refreshPreviewArtwork();

    previewTemplateArtworkClass.confirmImageMessures();


  }

  updatePriceWidthIndividual() {
    let index = this.getWidthSelectedIndex();
  //  alert("individual" + index);
    const priceDataWidth = document.querySelectorAll(".priceDataWidth");

    for (var i = 0; i < priceDataWidth.length; i++) {
        if (i == index) {
            let text = priceDataWidth[i].innerHTML + "";
            let number = +text.match(/-?\d+\.\d+|\d+/); // Finds the first number (float or integer), which can be negative.

            if (number >= 0) {
                let result = number.toFixed(2);
                priceClass.setPriceWidth(result); // Displays the positive float number with two decimals.
                priceClass.changePricePerLanyard();
            } else {
                throw new Error("The number width is negative or no numbers were found.");
            }
        }
    }
}

  updatePriceWidth() {
      // Get the JSON lanyards data.
      var json = customizeLanyard.getJsonLanyards();

      // Get the selected material.
      var materialSelected = material.getMaterialSelected();

      // Get the selected amount.
      var amountSelected = priceClass.getAmountSelected();

      // Ensure the priceDataWidthResult array is empty before use.
      let priceDataWidthResult = [];
      priceDataWidthResult.length = 0; // Clear if it contains previous data.

      // Filter the data for the selected material.
      var jsonMaterial = json.find(item => item.materials.material === materialSelected);
      if (!jsonMaterial) return; // Exit if the material is not found.

      const widths = jsonMaterial.materials.width; // Get available widths.

      // Iterate through the widths of the selected material.
      for (let j = 0; j < widths.length; j++) {
          const width = widths[j].width; // Store each width.

          // Get the first noSides (position 0).
          const sidePrinted = widths[j].sidePrinted;
          if (!sidePrinted || sidePrinted.length === 0) continue; // Skip if there is no data.
          const noSides = sidePrinted[0].noSides; // Use only the first position (minimum).

          // Get the first noColours (position 0) within the first noSides.
          const noColours = sidePrinted[0].noColours;
          if (!noColours || noColours.length === 0) continue; // Skip if there is no data.
          const noColour = noColours[0].noColour; // Use only the first position (minimum).

          // Get the values of minAmount, maxAmount, and price within the first noColour.
          const amounts = noColours[0].amount;
          if (!amounts || amounts.length === 0) continue; // Skip if there is no data.

          let priceCaptured = false; // Flag to avoid duplicates.

          for (let m = 0; m < amounts.length; m++) {
              const minAmount = Number(amounts[m]['min-amount']);
              const maxAmount = Number(amounts[m]['max-amount']);
              const price = Number(amounts[m].price);

              // If amountSelected is within the minAmount - maxAmount range, store it.
              if (amountSelected >= minAmount && amountSelected <= maxAmount) {
                  priceDataWidthResult.push({
                      width,
                      noSides,
                      noColour,
                      minAmount,
                      amountSelected,
                      maxAmount,
                      price
                  });
                  priceCaptured = true; // Mark that the correct price has been captured.
                  break; // Stop iterating once the correct price is found.
              }
          }

          // If amountSelected is greater than all available ranges, capture the highest interval price.
          if (!priceCaptured) {
              let highestIndex = amounts.length - 1; // Last index.
              let highestMinAmount = Number(amounts[highestIndex]['min-amount']);
              let highestMaxAmount = Number(amounts[highestIndex]['max-amount']);
              let highestPrice = Number(amounts[highestIndex].price);

              priceDataWidthResult.push({
                  width,
                  noSides,
                  noColour,
                  minAmount: highestMinAmount,
                  amountSelected,
                  maxAmount: highestMaxAmount,
                  price: highestPrice
              });
          }
      }

      // Get the elements to display price data.
      const priceDataWidth = document.querySelectorAll(".priceDataWidth");
      //alert(JSON.stringify(priceDataWidthResult));


      // Update the price display for each element.
      for (var i = 0; i < priceDataWidth.length; i++) {
          let totalPriceWidth = priceDataWidthResult[i].price - priceDataWidthResult[0].price;
          priceDataWidth[i].innerHTML = "£" + totalPriceWidth.toFixed(2) + " per unit.";
      }
  }

  refreshWidth(){
    this.cleanWidth();
    this.autoSelectWidth();

    let widthAvailable = this.getDataWidthAvalaible();
    // Iterate through the available clip options and draw them
    for (var i = 0; i < widthAvailable.length; i++) {
      this.drawWidthAvailable(widthAvailable[i], i);
    }
    this.showSelectedWidth();
    this.updatePriceWidthIndividual();
    previewLanyardType.showSelectedPreviewTemplate();
  }

  cleanWidth(){
    containersBoxesWidth.innerHTML = "";
  }

  showSelectedWidth(){

    var width = widthClass.getWidthSelected();

    const containerBoxesWidth = document.querySelectorAll(".container_boxes_width");

    const dataWidth = document.querySelectorAll(".dataWidth");

    var index = this.getWidthSelectedIndex();

   /*for (var i = 0; i < dataWidth.length; i++) {

     if (dataWidth[i].textContent == width) {
       index = i;
     }
   }*/

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
