class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
  //  if (action == "block") {
  //    previewTemplateArtworkSection.style.visibility = "visible";

  //  }
  //  else {
      previewTemplateArtworkSection.style.visibility = "hidden";

  //  }

  }
}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
