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
        manual: "Sublimation lanyards can be set up manually. You can choose a background colour, add text, and upload one logo. The design will be mirrored on the reverse side of the lanyard.",
        artwork: "With the artwork option, you can upload two images—one for each side. Each side is mirrored on the reverse. If your image has transparency, you can add a background colour."
      },
      screenPrint: {
        manual: "Lanyards can be printed using <strong>screen print</strong> in one of two ways, depending on your previous selection. <br>The manual option allows you to choose text, a background colour, and/or an image. This lets you personalise your lanyard with simple design elements.",
        artwork: "With the artwork option for <strong>screen printing</strong>, you can choose whether or not to include a background colour and upload an image for each side. If you selected double-sided printing, you will need to upload four images—two for the front and two for the back."
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
