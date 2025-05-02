class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {

    if (previewTemplateArtworkSection) {
          previewTemplateArtworkSection.style.display = action;
    }
    else {
      alert("tenemos un problema");
    }


  }


}

const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
