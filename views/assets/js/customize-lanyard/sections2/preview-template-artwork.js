class PreviewTemplateArtwork {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

    previewTemplateArtworkSection.style.display = action;
  }


}


const previewTemplateArtwork = new PreviewTemplateArtwork();
