class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
    alert(action);

    previewTemplateArtworkSection.style.display = action;
  }


}


const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
