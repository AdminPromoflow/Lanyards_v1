class OneTwoEnds {
  constructor() {
    this.jsonLanyardType;
  //  this.setTypeLanyardSelected("one-end");
    this.showSelectedOneTwoEnds();

  }


    getTypeLanyardSelected() {
      return this.typeLanyard;
    }

    // Setter method for amount property
    setTypeLanyardSelected(value) {
      this.typeLanyard = value;
    }
    setJsonLanyardType(data){
      this.jsonLanyardType = data;
    }
    getJsonLanyardType(){
      return this.jsonLanyardType;
    }

    autoSelectLanyardType() {
      const json = customizeLanyard.getJsonLanyards();  // Get the lanyard JSON data
      const selectedMaterial = material.getMaterialSelected();  // Get the selected material
      const i = json.findIndex(item => item.materials.material === selectedMaterial);  // Find the index of the selected material

      if (i !== -1) {  // If the material exists
        const lanyardTypes = json[i].materials.lanyardType;  // Get the available lanyard types for the material

        // Check if the selected lanyard type matches any of the available ones
        const isLanyardTypeValid = lanyardTypes.some(type => type.type === this.getTypeLanyardSelected());

        if (this.getTypeLanyardSelected() === undefined) {  // If no lanyard type is selected
          this.setTypeLanyardSelected(lanyardTypes[1]?.type);  // Select the first available lanyard type
        } else if (!isLanyardTypeValid) {  // If the selected lanyard type doesn't match any available
          this.setTypeLanyardSelected(lanyardTypes[1]?.type);  // Select the first available lanyard type
        }
      }
    }


    updateLanyardType(){
      var json = customizeLanyard.getJsonLanyards();

      var materialSelected = material.getMaterialSelected();

        var data = json.find(item => item.materials.material === materialSelected)?.materials.lanyardType || [];
      // Clean the oneTwoEnds options
      this.cleanOneTwoEnds();

      // Iterate through the allLanyardTypes and create oneTwoEnds elements
      for (var i = 0; i < data.length; i++) {
        this.createOneTwoEnds(data[i]);
      }

    }

  showSelectedOneTwoEnds(){
    var typeLanyardSelected = this.getTypeLanyardSelected();


    const dataOneTwoEnds = document.querySelectorAll(".data-one-two-ends");
    const containerBoxesOneTwoEnds = document.querySelectorAll(".container_boxes_one_two_ends");
    var index;
   for (var i = 0; i < dataOneTwoEnds.length; i++) {
     if (dataOneTwoEnds[i].textContent == typeLanyardSelected) {
       index = i;
     }
   }

    for (var i = 0; i < containerBoxesOneTwoEnds.length; i++) {
      if (index == i) {
        containerBoxesOneTwoEnds[i].style.border = "2px solid white";
      }
      else {
        containerBoxesOneTwoEnds[i].style.border = "2px solid transparent";
      }
    }
  }
  createOneTwoEnds(data){
    containersBoxesOneTwoEnds.innerHTML +=
    '<div class="container_boxes_one_two_ends"  onclick="oneTwoEndsClass.searchDataTypeLanyardSelected(\'' + data["type"] + '\', \'' + data["price"] + '\');">'+
      '<h3 class="price-one_two_ends">+£'+data["price"]+' per unit</h3>'+
      '<h4 class="data-one-two-ends">'+data["type"]+'</h4>'+
      '<img src="../../'+data["imgLink"]+'" alt="">'+
    '</div>'
    ;
  }


  searchDataTypeLanyardSelected(typeLanyardType, priceLanyardType){

    oneTwoEndsClass.setTypeLanyardSelected(typeLanyardType);
    oneTwoEndsClass.showSelectedOneTwoEnds();

    priceClass.setPriceLanyardType(priceLanyardType);
    priceClass.changePricePerLanyard();

    clipClass.refreshClip(); // Update the clip settings for the material.
    attachmentClass.refreshAttachment();


    previewLanyardType.showSelectedPreviewTemplate();

    previewTemplate.activateTemplate();
    previewManual.refreshTextLanyard();
 


  }

  cleanOneTwoEnds(){
    containersBoxesOneTwoEnds.innerHTML = "";
  }

  refreshLanyardType(){
    this.autoSelectLanyardType();
    this.updateLanyardType();
    this.showSelectedOneTwoEnds();

    previewLanyardType.showSelectedPreviewTemplate();
  }

}


const dataOneTwoEnds = document.querySelectorAll(".data-one-two-ends");

const containerBoxesOneTwoEnds = document.querySelectorAll(".container_boxes_one_two_ends");

const containersBoxesOneTwoEnds = document.getElementById('containers_boxes_one_two_ends');

const oneTwoEndsClass = new OneTwoEnds();
