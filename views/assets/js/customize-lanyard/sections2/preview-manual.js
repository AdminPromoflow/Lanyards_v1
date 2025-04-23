class PreviewManual {
  constructor() {

  }
  togglePreviewManualClass(action) {
    this.previewManualSection.style.display = action;
  }
}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
