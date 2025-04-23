class PreviewManual {
  constructor() {
    this.manualElements = {
      left_manual: document.getElementById("left-super-lanyard-manual"),
      right_manual: document.getElementById("right-super-lanyard-manual"),
      center_manual: document.getElementById("center-super-lanyard-manual")
    };
  });
  }
  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }
  cleanStyleManual() {
    const elManual = this.manualElements;

    Object.values(elManual).forEach(element => {
      if (element) {
        element.removeAttribute("style");
        element.className = "";
      }
    });
  }
  applyClassToManualGroup(leftClass = "", rightClass = "", centerClass = "") {
    const el = this.manualElements;


    if (leftClass) el.left_manual.classList.add(leftClass);
    if (rightClass) el.right_manual.classList.add(rightClass);
    if (centerClass) el.center_manual.classList.add(centerClass);
  }
}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
