class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    alert("al menos");
    const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

    previewTemplateArtworkSection.style.display = action;
  }


}


const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
