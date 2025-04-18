// Define a class named Price.
class Price {
  // Constructor method.
  constructor(){
    // Initialize properties.
    this.amountSelected = 1;
    this.priceMaterialWidthAmount; // Global variable to store the price.
    this.priceLanyardType = 0; // Global variable to store the price.
    this.priceWidth = 0;
    this.priceSidePrinted = 0;
    this.priceClip = 0;
    this.priceAttachment = 0;
    this.priceColour = 0;
    this.priceAccessory = 0;

    this.amountSelected = 1000;
    amountLanyardsRange.value = 1000;
    amountLanyards.value = 1000;

    // Event listener for input changes on amountLanyards element.
    amountLanyards.addEventListener('input', function(event) {
      this.value = this.value.replace(/\D/g, '');
      if (this.value > 0) {
        amountLanyardsRange.value = this.value;
        amountLanyards.value = this.value;

        priceClass.setAmountSelected(amountLanyardsRange.value);


        material.refreshMaterial();
        oneTwoEndsClass.refreshLanyardType();
        widthClass.refreshWidth();
        sidePrintedClass.refreshSidePrintedData();
        colourClass.refreshColourQuantity();
        clipClass.refreshClip();

      }
      else {
        amountLanyardsRange.value = 1;
        amountLanyards.value = 1;

        priceClass.setAmountSelected(amountLanyardsRange.value);


        material.refreshMaterial();
        oneTwoEndsClass.refreshLanyardType();
        widthClass.refreshWidth();
        sidePrintedClass.refreshSidePrintedData();
        colourClass.refreshColourQuantity();
        clipClass.refreshClip();

      }
    });

    // Event listener for input changes on amountLanyardsRange element.
    amountLanyardsRange.addEventListener('input', function() {
          amountLanyards.value = this.value;
          amountLanyardsRange.value = this.value;

          priceClass.setAmountSelected(amountLanyards.value);


          material.refreshMaterial();
          oneTwoEndsClass.refreshLanyardType();
          widthClass.refreshWidth();
          sidePrintedClass.refreshSidePrintedData();
          colourClass.refreshColourQuantity();
          clipClass.refreshClip();

    });
  }

  // Setter method for price per material with amount.
  setPricePerMaterialWithAmount(price){
    this.priceMaterialWidthAmount = price;
  }

  // Getter method for price per material with amount.
  getPricePerMaterialWithAmount(){
    return parseFloat(this.priceMaterialWidthAmount);
  }

  // Setter method for price per lanyard type.
  setPriceLanyardType(price){
    this.priceLanyardType = price;
  }

  // Getter method for price per lanyard type.
  getPriceLanyardType(){
    return parseFloat(this.priceLanyardType);
  }

  // Setter method for price per width.
  setPriceWidth(price){
    this.priceWidth = price;
  }

  // Getter method for price per width.
  getPriceWidth(){
    return parseFloat(this.priceWidth);
  }

  // Setter method for price per width.
  setPriceSidePrinted(price){
    this.priceSidePrinted = price;
  }

  // Getter method for price per width.
  getPriceSidePrinted(){
    return parseFloat(this.priceSidePrinted);
  }

  // Setter method for price per clip.
  setPriceClip(price){
    this.priceClip = price;
  }

  // Getter method for price per width.
  getPriceClip(){
    return parseFloat(this.priceClip);
  }

  // Setter method for price per attachment.
  setPriceAttachment(price){
    this.priceAttachment = price;
  }

  // Getter method for price per attachment.
  getPriceAttachment(){
    return parseFloat(this.priceAttachment);
  }

  // Setter method for price per colour.
  setPriceColour(price){
    this.priceColour = price;
  }

  // Getter method for price per colour.
  getPriceColour(){
    return parseFloat(this.priceColour);
  }

  // Getter method for amount property.
  getAmountSelected() {
    return this.amountSelected;
  }

  // Setter method for amount property.
  setAmountSelected(value) {
    this.amountSelected = value;
  }

  // Setter method for price per accessory.
  setPriceAccessory(price){
    this.priceAccessory = price;
  }

  // Getter method for price per accessory.
  getPriceAccessory(){
    return parseFloat(this.priceAccessory);
  }

  // Method to change price per lanyard.
  changePricePerLanyard() {
    // Calculate total price.
    var totalPrice = priceClass.getPricePerMaterialWithAmount() +
     priceClass.getPriceLanyardType() + priceClass.getPriceWidth()
     +  priceClass.getPriceSidePrinted() + priceClass.getPriceClip()
     + priceClass.getPriceAttachment() + priceClass.getPriceColour()
     + priceClass.getPriceAccessory();
    // Update the inner HTML of pricePerLanyard element to display the price with currency symbol.
    pricePerLanyard.innerHTML = "£" + totalPrice.toFixed(2);
  }

}

// DOM element references.
const amountLanyardsRange = document.getElementById("amountLanyardsRange");
const pricePerLanyard = document.getElementById("pricePerLanyard");
const amountLanyards = document.getElementById("amountLanyards");

// Create an instance of Price class.
const priceClass = new Price();
