
class SidePrinted {
  constructor() {
    //this.sidePrintedSelected = "one-side";
  }

  setSidePrintedSelected(value) {
    this.sidePrintedSelected = value;
  }
  getSidePrintedSelected() {
    return this.sidePrintedSelected;
  }


  autoSelectSidePrinted() {
    var data = this.getDataSidePrintedAvalaible();
    var existSidePrinted = false;
    var index = 0;

    data.forEach((element, i) => {
      if (element["noSides"]+"" == this.getSidePrintedSelected()+"") {

        existSidePrinted = true;
        index = i;
      }
    });

    if (existSidePrinted) {
      this.setSidePrintedSelectedIndex(index);

    }
    else {
      this.setSidePrintedSelectedIndex(0);
      this.setSidePrintedSelected(data[0]["noSides"]);
    }
  }

  /*updateEachPriceSidePrinted() {
   var json = customizeLanyard.getJsonLanyards();
   var materialSelected = material.getMaterialSelected();
   var widthSelected = widthClass.getWidthSelected();
   var amountSelected = priceClass.getAmountSelected();

   let priceDataSidePrintedResult = [];
   priceDataSidePrintedResult.length = 0; // Vaciar el array en caso de que tenga datos previos

   // Iterando a través del JSON de materiales
   for (let i = 0; i < json.length; i++) {
       const material = json[i].materials.material;

       if (material == materialSelected) {
           const widths = json[i].materials.width;

           for (let j = 0; j < widths.length; j++) {
               const width = widths[j].width;
               if (width == widthSelected) {
                   const sidePrinted = widths[j].sidePrinted;
                  // alert(JSON.stringify(width) + widthSelected);


                   for (let k = 0; k < sidePrinted.length; k++) {
                       const noSides = sidePrinted[k].noSides;
                       const noColours = sidePrinted[k].noColours;

                       if (noColours.length > 0) {
                           const noColourSelecter = noColours[0].noColour; // Tomar el primer color disponible

                           for (let l = 0; l < noColours.length; l++) {
                               const noColour = noColours[l].noColour;

                               if ((noColour) === (noColourSelecter)) {
                                   const amounts = noColours[l].amount;

                                   for (let m = 0; m < amounts.length; m++) {
                                       const minAmount = amounts[m]['min-amount'];
                                       const maxAmount = amounts[m]['max-amount'];
                                       const pricePerSidePrinted = amounts[m].price; // Captura el precio del sidePrinted

                                       if (Number(amountSelected) >= Number(minAmount) && Number(amountSelected) <= Number(maxAmount)) {
                                           let existingIndex = priceDataSidePrintedResult.findIndex(item =>
                                               item.material === material &&
                                               item.width === width &&
                                               item.noSides === noSides &&
                                               item.noColour === noColour
                                           );

                                           if (existingIndex === -1) {
                                               priceDataSidePrintedResult.push({
                                                   noSides,
                                                   price: pricePerSidePrinted
                                               });
                                           } else {
                                               priceDataSidePrintedResult[existingIndex].price = pricePerSidePrinted;
                                           }
                                       } else if (Number(amountSelected) > Number(maxAmount)) {
                                           let highestIndex = amounts.length - 1;
                                           let highestMinAmount = amounts[highestIndex]['min-amount'];
                                           let highestMaxAmount = amounts[highestIndex]['max-amount'];
                                           let highestPrice = amounts[highestIndex].price;

                                           let existingIndex = priceDataSidePrintedResult.findIndex(item =>
                                               item.material === material &&
                                               item.width === width &&
                                               item.noSides === noSides &&
                                               item.noColour === noColour
                                           );

                                           if (existingIndex === -1) {
                                               priceDataSidePrintedResult.push({
                                                   noSides,
                                                   price: highestPrice
                                               });
                                           } else {
                                               priceDataSidePrintedResult[existingIndex].price = highestPrice;
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
   }
   if (priceDataSidePrintedResult.length > 0) {
         let basePrice = parseFloat(priceDataSidePrintedResult[0].price);
         priceDataSidePrintedResult = priceDataSidePrintedResult.map(item => ({
             ...item,
             price: parseFloat((item.price - basePrice).toFixed(2))
         }));
     }

   return priceDataSidePrintedResult; // Retorna la variable con los precios filtrados
}
*/
  refreshSidePrintedData(){
    this.cleanSidePrinted();
    this.autoSelectSidePrinted();

    let sidePrintedAvailable = this.getDataSidePrintedAvalaible();

    for (var i = 0; i < sidePrintedAvailable.length; i++) {
      this.drawSidePrintedAvailable(sidePrintedAvailable[i], i);
    }

    this.showSelectedSidePrinted();
    this.updatePriceSidePrintedIndividual();
    previewSidePrinted.showSelectedPreviewtTemplate();
  }

  getDataSidePrintedAvalaible() {
      // Get the JSON lanyards data.
      var json = customizeLanyard.getJsonLanyards();

      // Get the selected material.
      var materialSelected = material.getMaterialSelected();

      // Get the selected width.
      var widthSelected = widthClass.getWidthSelected();

      // Get the selected amount.
      var amountSelected = priceClass.getAmountSelected();

      // Ensure the priceDataSidePrintedResult array is empty before use.
      let priceDataSidePrintedResult = [];
      priceDataSidePrintedResult.length = 0; // Clear if it contains previous data.

      // Filter the data for the selected material.
      var jsonMaterial = json.find(item => item.materials.material === materialSelected);
      if (!jsonMaterial) return; // Exit if the material is not found.

      // Filter the data for the selected width within the material.
      var jsonWidth = jsonMaterial.materials.width.find(item => item.width === widthSelected);
      if (!jsonWidth) return; // Exit if the width is not found.

      // Get available sidePrinted options.
      const sidePrinted = jsonWidth.sidePrinted;
      if (!sidePrinted || sidePrinted.length === 0) return; // Exit if no data is found.

      // Iterate through the available sidePrinted options.
      for (let j = 0; j < sidePrinted.length; j++) {
          const noSides = sidePrinted[j].noSides; // Capture each noSides.

          // Get the first noColours (position 0) within each noSides.
          const noColours = sidePrinted[j].noColours;
          if (!noColours || noColours.length === 0) continue; // Skip if there is no data.
          const noColour = noColours[0].noColour; // Use only the first position (minimum).

          // Get minAmount, maxAmount, and price within the first noColour.
          const amounts = noColours[0].amount;
          if (!amounts || amounts.length === 0) continue; // Skip if there is no data.

          let priceCaptured = false; // Flag to avoid duplicates.

          // Iterate through the available price ranges.
          for (let m = 0; m < amounts.length; m++) {
              const minAmount = Number(amounts[m]['min-amount']);
              const maxAmount = Number(amounts[m]['max-amount']);
              const price = Number(amounts[m].price);

              // If amountSelected is within the minAmount - maxAmount range, store it.
              if (amountSelected >= minAmount && amountSelected <= maxAmount) {
                  priceDataSidePrintedResult.push({
                      noSides,
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

              priceDataSidePrintedResult.push({
                  noSides,
                  price: highestPrice
              });
          }
      }

      let priceDataSidePrintedFinal = [];
      priceDataSidePrintedFinal.length = 0;
      var firstPrice = priceDataSidePrintedResult[0]["price"];

      priceDataSidePrintedResult.forEach((element, i) => {

        priceDataSidePrintedFinal.push({
             noSides: element.noSides,
             price: (element.price - firstPrice).toFixed(2)
          }
        )
      });

      return priceDataSidePrintedFinal;
  }

  cleanSidePrinted(){

    containerBoxSidePrinted.innerHTML = "";
  }

  drawSidePrintedAvailable(data, index){

    containerBoxSidePrinted.innerHTML +=
    '<div class="container_boxes_side_printed" onclick="sidePrintedClass.searchDataSidePrintedSelected(\'' + data.noSides + '\', \' '+ index +'  \');">' +
        '<h3 class="priceDataSidePrinted">+£'+data["price"]+' per unit</h3>' +
        '<h4 class="data_side_printed">'+ data["noSides"]+'</h4>' +
        '<img src="../../views/assets/img/global/customize-lanyard/sections/side-printed/'+ data["noSides"]+'.png" alt="">' +
      '</div>'
    ;
  }

  searchDataSidePrintedSelected(sidePrinted, index) {
    this.setSidePrintedSelected(sidePrinted);


    this.setSidePrintedSelectedIndex(index);


    material.refreshMaterial();
    oneTwoEndsClass.refreshLanyardType();
    widthClass.refreshWidth();

    this.refreshSidePrintedData()
    colourClass.refreshColourQuantity();
    clipClass.refreshClip();
    priceClass.changePricePerLanyard();
    artworkPreviewClass.refreshPreviewArtwork();


    previewSidePrinted.showSelectedPreviewtTemplate();

  }

  setSidePrintedSelectedIndex(value) {
    this.sidePrintedSelectedIndex = value;
  }

  getSidePrintedSelectedIndex() {
      return this.sidePrintedSelectedIndex;
  }

  updatePriceSidePrintedIndividual(){
    let index = this.getSidePrintedSelectedIndex();
    const priceDataSidePrinted = document.querySelectorAll(".priceDataSidePrinted");


    for (var i = 0; i < priceDataSidePrinted.length; i++) {
      if (i == index) {

        let text = priceDataSidePrinted[i].innerHTML+"";
        let number = +text.match(/-?\d+\.\d+|\d+/); // Finds the first number (float or integer), which can be negative.

      //  alert(number);
        if (number >= 0) {

        //  alert("hi, I just enter in if");
            let result = number.toFixed(2);
            priceClass.setPriceSidePrinted(result); // Displays the positive float number with two decimals.
            priceClass.changePricePerLanyard();
            //artworkClass.hideShowOneOrTwoSidesPrinted();
            artworkPreviewClass.hideShowOneOrTwoSidesPrinted()



        } else {
          //alert("hi, I just enter in else too");
          console.log("The number sidePrinted is negative or no numbers were found. Error: (width.js line 58)");
        }
      }
    }
  }
  showSelectedSidePrinted() {
    // Get the selected side printed value
    var data = sidePrintedClass.getSidePrintedSelected();
    //alert(data);

    // Select all elements with the class "container_boxes_side_printed"
    const containerBoxesSidePrinted = document.querySelectorAll(".container_boxes_side_printed");
    // Select all elements with the class "data_side_printed"
    const dataSidePrinted = document.querySelectorAll(".data_side_printed");

    // Initialize index variable to -1
    var index = -1;
    // Iterate through all elements in dataSidePrinted
    for (var i = 0; i < dataSidePrinted.length; i++) {
      // If the text content of the current element matches the selected data
      if (dataSidePrinted[i].textContent == data) {
        // Set the index to the current position
        index = i;
        // Exit the loop once the matching element is found
        break;
      }
    }

    // Iterate through all elements in containerBoxesSidePrinted
    for (var i = 0; i < containerBoxesSidePrinted.length; i++) {
      // If the current index matches the found index
      if (index == i) {
        // Set the border of the matching element to "2px solid white"
        containerBoxesSidePrinted[i].style.border = "2px solid white";
      } else {
        // Set the border of non-matching elements to "2px solid transparent"
        containerBoxesSidePrinted[i].style.border = "2px solid transparent";
      }
    }
  }
}


const containerBoxSidePrinted = document.getElementById("containers_boxes_side_printed");


const sidePrintedClass = new SidePrinted();
