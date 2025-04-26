class PreviewManual {
  constructor() {
    this.text_lanyard = document.querySelectorAll(".text-lanyard");
  }
  addTextToLanyard(){
  //  this.cleanTextToLanyard();
    var textLanyard = textClass.getContentText();
    //alert(textLanyard + "Lo estamos logrando");

    const times = 2; // Cambia esto al número que necesites

    this.text_lanyard.forEach((container) => {
      container.querySelectorAll("h1").forEach(h1 => h1.remove());

      for (let i = 0; i < times; i++) {
        const heading = document.createElement("h1");
        heading.textContent = textLanyard;
        heading.classList.add("rotate--90");
        container.appendChild(heading);
      }
    });


  }

  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
