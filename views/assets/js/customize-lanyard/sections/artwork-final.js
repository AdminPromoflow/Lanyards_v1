class ArtworkFinal {
  constructor() {
    this.updateItems();
  }

  updateItems() {
    this.updateItem("artwork-final-material", "Material:", material.getMaterialSelected());
    this.updateItem("artwork-final-lanyard-type", "Lanyard type:", oneTwoEndsClass.getTypeLanyardSelected());
    this.updateItem("artwork-final-width", "Width:", widthClass.getWidthSelected());
    this.updateItem("artwork-final-side-printed", "Side printed:", sidePrintedClass.getSidePrintedSelected());
    this.updateItem("artwork-final-clips", "Clips:", clipClass.getClipSelected());
    this.updateItem("artwork-final-attachment", "Attachment:", attachmentClass.getAttachmentSelected());
    this.updateItem("artwork-final-colour-quantity", "Colour Quantity:", colourClass.getColourSelected());
    this.updateItem("artwork-final-artwork-manual", "Artwork - Manual:", artworkManualClass.getArtworkManual());
  }

  updateItem(id, title, value) {
    const container = document.getElementById(id);
    if (container) {
      container.innerHTML = `
        <h4 class="title">${title}</h4>
        <h4 class="value">${value}</h4>
      `;
    }
  }
}

const artworkClassFinal = new ArtworkFinal();
