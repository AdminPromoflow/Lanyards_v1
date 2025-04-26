class PreviewManual {
  constructor() {
    this.text_lanyard = document.querySelectorAll(".text-lanyard");
  }
  addTextToLanyard(){
    var textLanyard = textClass.getContentText();
    alert(textLanyard + "Lo estamos logrando");

  }

  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
