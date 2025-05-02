class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
      previewTemplateArtworkSection.style.display = "none";
      alert(JSON.stringify(previewTemplateArtworkSection.id + action));


  }
}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
