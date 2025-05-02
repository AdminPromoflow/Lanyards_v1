class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "none";

  }
  togglePreviewTemplateArtworkClass(action) {
      previewTemplateArtworkSection.style.display = action;
      alert(JSON.stringify(previewTemplateArtworkSection.id + action));


  }
}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
