class PreviewTemplateArtworkClass {
  constructor() {

  }
  togglePreviewTemplateArtworkClass(action) {
    if (action == "block") {
      previewTemplateArtworkSection.style.visibility = "visible";

    }
    else {
      previewTemplateArtworkSection.style.visibility = "hidden";

    }

  }
}
const previewTemplateArtworkSection = document.getElementById("super-lanyard-artwork");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
