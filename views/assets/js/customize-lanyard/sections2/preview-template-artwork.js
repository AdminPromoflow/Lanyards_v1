class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "block";

  }
  togglePreviewTemplateArtworkClass(action) {
      previewTemplateArtworkSection.style.display = "none";
      alert(JSON.stringify(previewTemplateArtworkSection.id + action));


  }
}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
