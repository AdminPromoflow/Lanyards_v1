class ArtworkFinal {
  constructor(){
    this.updateItems();
  }
updateItems(){
  artworkFinalMaterialTitle.innerHTML = "Material:";
  artworkFinalMaterialValue.innerHTML = material.getMaterialSelected();

  artworkFinalLanyardTypeTitle.innerHTML = "Lanyard type:";
  artworkFinalLanyardTypeValue.innerHTML = oneTwoEndsClass.getTypeLanyardSelected();

  artworkFinalWidthTitle.innerHTML = "Width:";
  artworkFinalWidthValue.innerHTML = widthClass.getWidthSelected();

  artworkFinalSidePrintedTitle.innerHTML = "Side printed:";
  artworkFinalSidePrintedValue.innerHTML = sidePrintedClass.getSidePrintedSelected();

  artworkFinalClipsTitle.innerHTML = "Clips:";
  artworkFinalClipsValue.innerHTML = clipClass.getClipSelected();

  artworkFinalAttachmentTitle.innerHTML = "Attachment:";
  artworkFinalAttachmentValue.innerHTML = attachmentClass.getAttachmentSelected();

  artworkFinalColourQuantityTitle.innerHTML = "Colour Quantity:";
  artworkFinalColourQuantityValue.innerHTML = colourClass.getColourSelected();

  artworkFinalArtworkManualTitle.innerHTML = "Artwork - Manual:";
  artworkFinalArtworkManualValue.innerHTML = artworkManualClass.getArtworkManual();

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
