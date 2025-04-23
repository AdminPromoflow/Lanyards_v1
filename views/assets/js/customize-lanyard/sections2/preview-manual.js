class PreviewManual {
  constructor() {
    this.previewManualSection = document.getElementById("preview-manual-section");

  }
  togglePreviewManualClass(action) {
    this.previewManualSection.style.display = action;
  }
}
document.addEventListener("DOMContentLoaded", () => {
  const previewManual = new PreviewManual();
});
