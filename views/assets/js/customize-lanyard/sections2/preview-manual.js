class PreviewManual {
  constructor() {

  }
  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }
  // Clears styles and classes for the manual elements
  cleanStyleManual() {
    const elManual = this.manualElements;

    Object.values(elManual).forEach(element => {
      if (element) {
        element.removeAttribute("style");
        element.className = "";
      }
    });
  }


}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
