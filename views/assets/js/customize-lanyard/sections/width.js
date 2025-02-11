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
      // 1️⃣ Obtener los datos JSON de los lanyards
      var json = customizeLanyard.getJsonLanyards();

      // 2️⃣ Obtener el material seleccionado
      var materialSelected = material.getMaterialSelected();

      // 3️⃣ Obtener la cantidad seleccionada
      var amountSelected = priceClass.getAmountSelected();

      // 4️⃣ Asegurar que priceDataWidthResult esté vacío antes de usarlo
      let priceDataWidthResult = [];
      priceDataWidthResult.length = 0; // Vaciar en caso de que tenga datos previos

      // 5️⃣ Filtrar los datos solo para el material seleccionado
      var jsonMaterial = json.find(item => item.materials.material === materialSelected);
      if (!jsonMaterial) return; // Salir si no encuentra el material

      const widths = jsonMaterial.materials.width; // Obtener los widths disponibles

      // 6️⃣ Recorrer los widths del material seleccionado
      for (let j = 0; j < widths.length; j++) {
          const width = widths[j].width; // Capturar cada width

          // 7️⃣ Obtener el primer noSides (posición 0)
          const sidePrinted = widths[j].sidePrinted;
          if (!sidePrinted || sidePrinted.length === 0) continue; // Si no hay datos, pasar al siguiente width
          const noSides = sidePrinted[0].noSides; // Solo usar la primera posición (mínima)

          // 8️⃣ Obtener el primer noColours (posición 0) dentro del primer noSides
          const noColours = sidePrinted[0].noColours;
          if (!noColours || noColours.length === 0) continue; // Si no hay datos, pasar al siguiente width
          const noColour = noColours[0].noColour; // Solo usar la primera posición (mínima)

          // 9️⃣ Obtener los valores de minAmount, maxAmount y price dentro del primer noColour
          const amounts = noColours[0].amount;
          if (!amounts || amounts.length === 0) continue; // Si no hay datos, pasar al siguiente width

          for (let m = 0; m < amounts.length; m++) {
              const minAmount = Number(amounts[m]['min-amount']);
              const maxAmount = Number(amounts[m]['max-amount']);
              const price = Number(amounts[m].price);

              //  🔟 Si amountSelected está dentro del rango minAmount - maxAmount, se guarda
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
                  break; // No seguir iterando, ya se encontró el precio correcto
              }
          }
      }

      // 1️⃣1️⃣ Mostrar los resultados en consola para verificar
      console.table(priceDataWidthResult);

      // 1️⃣2️⃣ Obtener los elementos para mostrar los precios
      const priceDataWidth = document.querySelectorAll(".priceDataWidth");

      alert(JSON.stringify(priceDataWidthResult)); // Mostrar resultados en alert

      // 1️⃣3️⃣ Actualizar la visualización de precios
      for (var i = 0; i < priceDataWidth.length; i++) {
          let totalPriceWidth = priceDataWidthResult[i].price - priceDataWidthResult[0].price;
          priceDataWidth[i].innerHTML = "£" + totalPriceWidth.toFixed(2) + " per unit";
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
