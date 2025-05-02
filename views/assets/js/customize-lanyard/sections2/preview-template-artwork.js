class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    document.addEventListener("DOMContentLoaded", () => {
      const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
      previewTemplateArtworkSection.style.display = action;

    });
  }
}
const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
