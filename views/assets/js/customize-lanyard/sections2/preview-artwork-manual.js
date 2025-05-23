class PreviewArtworkManualClass {
  constructor() {
    var openBackgroundColour = document.getElementById("open-background-colour");




    openBackgroundColour.addEventListener("click", function(){
      customizeLanyard.setCurrentSectionOpen(9);
      customizeLanyard.openBackgroundColour();
    });
  }
  showArtworkManualPreview(action){
    previewArtworkManualContainer.style.display = action;
  }
  showDescriptionPreview() {
    const elements = document.querySelectorAll(".description_preview_artwork_manual");
    if (elements.length < 2) return;

    const printingOptions = {
      sublimation: {
        manual: "<strong>Sublimation</strong> lanyards can be customised manually. Choose a background colour, add text, and upload one logo. The reverse side will show a mirrored version of your design.",

        artwork: "With the <strong>sublimation</strong> artwork option, upload one image per side. Each side is mirrored on the reverse. If your image has transparency, you can choose a background colour."
      },
      screenPrint: {
        manual: "<strong>Screen print</strong> lanyards can be customised manually. Add text, pick a background colour, and upload a simple image like a logo. The reverse will mirror your design if both sides are set.",

        artwork: "With the <strong>screen print</strong> artwork option, upload one image per side. Each side is mirrored on the reverse. A background colour is included if your image uses transparency."
      }
    };


    const materialMap = {
      "Tubular": "screenPrint",
      "Ribbed Polyester": "screenPrint",
      "RPET Polyester": "screenPrint",
      "Dye Sub polyester": "sublimation",
      "Dye Sub RPET": "sublimation"
    };

    const selectedMaterial = material.getMaterialSelected();
    const optionType = materialMap[selectedMaterial];

    if (optionType) {
      elements[0].innerHTML = printingOptions[optionType].manual;
      elements[1].innerHTML = printingOptions[optionType].artwork;
    }
  }


  showSelectedPreviewtColour(){
    var artworkManual = colourClass.getColourSelected();
    var description;

    previewColourContainer.innerHTML = "";

    previewColourContainer.innerHTML +=
    '<h3>'+artworkManual+'</h3>' +

    '<div class="img-preview-material">' +
      '<img src="../../views/assets/img/global/customize-lanyard/sections2/colour/'+artworkManual+'.png" alt="">' +
    '</div>' +
    '<div class="description-preview-material">' +
      '<p>' + description + '</p>' +
    '</div>'
    ;
  }

  showManualArtworkSeleted(){
    const action = artworkManualClass.getArtworkManual();
    if (action == "artwork") {
      previewArtworkContainer.style.display = "flex";
      previewManualContainer.style.display = "none";
    }
    else if(action == "manual"){
      previewArtworkContainer.style.display = "none";
      previewManualContainer.style.display = "flex";
    }
  }
}
const previewManualContainer = document.getElementById("preview-manual-container");
const previewArtworkContainer = document.getElementById("preview-artwork-container");



const previewArtworkManualContainer = document.getElementById("preview-artwork-manual-container");
const previewArtworkManualClass = new PreviewArtworkManualClass();
