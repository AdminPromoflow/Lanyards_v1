class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

    previewTemplateArtworkSection.style.display = "none";
  }


}


const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
