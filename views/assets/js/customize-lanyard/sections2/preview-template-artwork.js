class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    alert(":P");
      previewTemplateArtworkSection.style.setProperty('display', 'block', 'important');

  }
}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
