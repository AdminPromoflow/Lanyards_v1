class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
  //  if (action == "block") {
  //    previewTemplateArtworkSection.style.visibility = "visible";

  //  }
  //  else {
      previewTemplateArtworkSection.style.display = "none";

  //  }

  }
}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
