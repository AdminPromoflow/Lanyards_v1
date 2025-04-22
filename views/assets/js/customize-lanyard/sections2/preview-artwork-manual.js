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
        manual: "<strong>Sublimation</strong> lanyards can be customised manually. You can select a background colour, add text, and upload one logo. The design will be mirrored on the reverse side of the lanyard.",
        artwork: "With the <strong>sublimation</strong> artwork option, you can upload two images—one for each side. Each side is mirrored on the reverse. If your image has a transparent background, you can also add a background colour."
      },
      screenPrint: {
        manual: "<strong>Screen print</strong> lanyards can be customised manually. You can add text, choose a background colour, and upload a simple image – logo, personalised design. For double-sided printing, customise four sides in total.",
        artwork: "With the <strong>screen print</strong> artwork option, you can upload one image per side. A background colour will always be included if your image has transparency. For double-sided printing, upload four images in total."
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
