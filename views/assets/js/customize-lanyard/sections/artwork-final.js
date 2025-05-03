class ArtworkFinal {
  constructor(){
    this.updateItems();
  }
updateItems(){
  artworkFinalMaterial.innerHTML = "<strong>Material: </strong>&nbsp;&nbsp;&nbsp;" + material.getMaterialSelected();
  artworkFinalLanyardLype.innerHTML = "<strong>Lanyard type: </strong>&nbsp;&nbsp;&nbsp;" + oneTwoEndsClass.getTypeLanyardSelected();
  artworkFinalWidth.innerHTML = "<strong>Width: </strong>&nbsp;&nbsp;&nbsp;" + widthClass.getWidthSelected();
  artworkFinalSidePrinted.innerHTML = "<strong>Side printed: </strong>&nbsp;&nbsp;&nbsp;" + sidePrintedClass.getSidePrintedSelected();
  artworkFinalClips.innerHTML = "<strong>Clips: </strong>&nbsp;&nbsp;&nbsp;" + clipClass.getClipSelected();
  artworkFinalAttachment.innerHTML = "<strong>Attachment: </strong>&nbsp;&nbsp;&nbsp;" + attachmentClass.getAttachmentSelected();
  artworkFinalColourQuantity.innerHTML = "<strong>Colour Quantity: </strong>&nbsp;&nbsp;&nbsp;" + colourClass.getColourSelected();
  artworkFinalArtworkManual.innerHTML = "<strong>Artwork - Manual: </strong>&nbsp;&nbsp;&nbsp;" + artworkManualClass.getArtworkManual();
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
