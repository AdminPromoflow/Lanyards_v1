class PreviewManual {
  constructor() {
    this.text_lanyard = document.querySelectorAll(".text-lanyard");
  }
  addTextToLanyard(){
    var textLanyard = textClass.getContentText();
    //alert(textLanyard + "Lo estamos logrando");

    const times = 7; // Cambia esto al número que necesites

    this.text_lanyard.forEach((element) => {
      for (let i = 0; i < times; i++) {
        const h1 = document.createElement("h1");
        h1.textContent = textLanyard;
        element.appendChild(h1);
      }
      const h1s = element.querySelectorAll("h1");
        h1s.forEach(h1 => {
          h1.classList.add("rotate-90");
        });
    });





  }

  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
