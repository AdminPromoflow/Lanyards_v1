class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
      const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
      previewTemplateArtworkSection.style.display = action;
      alert(JSON.stringify(previewTemplateArtworkSection.id + action));


  }
}
const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
