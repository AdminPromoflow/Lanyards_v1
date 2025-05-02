class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    document.addEventListener("DOMContentLoaded", () => {
      const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
      alert(JSON.stringify(previewTemplateArtworkSection.id));
    });
  }
}
const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
