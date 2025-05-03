class ArtworkFinal {
  constructor(){
    this.updateItems();
  }
updateItems(){
  artworkFinalMaterial.innerHTML = "<strong>Material: </strong>" + material.getMaterialSelected();
  artworkFinalLanyardLype.innerHTML = "<strong>Lanyard type: </strong>" + oneTwoEndsClass.getTypeLanyardSelected();
  artworkFinalWidth.innerHTML = "<strong>Width: </strong>" + widthClass.getWidthSelected();
  artworkFinalSidePrinted.innerHTML = "<strong>Side printed: </strong>" + sidePrintedClass.getSidePrintedSelected();
  artworkFinalClips.innerHTML = "<strong>Clips: </strong>" + clipClass.getClipSelected();
  artworkFinalAttachment.innerHTML = "<strong>Attachment: </strong>" + attachmentClass.getAttachmentSelected();
  artworkFinalColourQuantity.innerHTML = "<strong>Colour Quantity: </strong>" + colourClass.getColourSelected();
  artworkFinalArtworkManual.innerHTML = "<strong>Artwork - Manual: </strong>" + artworkManualClass.getArtworkManual();
}
}
const artworkFinalMaterial = document.getElementById("artwork-final-material");
const artworkFinalLanyardLype = document.getElementById("artwork-final-lanyard-type");
const artworkFinalWidth = document.getElementById("artwork-final-width");
const artworkFinalSidePrinted = document.getElementById("artwork-final-side-printed");
const artworkFinalClips = document.getElementById("artwork-final-clips");
const artworkFinalAttachment = document.getElementById("artwork-final-attachment");
const artworkFinalColourQuantity = document.getElementById("artwork-final-colour-quantity");
const artworkFinalArtworkManual = document.getElementById("artwork-final-artwork-manual");

const artworkClassFinal = new ArtworkFinal();
