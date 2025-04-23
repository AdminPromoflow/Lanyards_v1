class PreviewManual {
  constructor() {
    this.previewManualSection = document.getElementById("preview-manual-section");

  }
  togglePreviewManualClass(action) {
    this.previewManualSection.style.display = action;
  }
}

const previewManual = new PreviewManual();
