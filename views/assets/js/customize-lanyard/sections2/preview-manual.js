class PreviewManual {
  constructor() {
  }
  addTextToLanyard() {
    this.text_lanyard_left = document.getElementById(".text-lanyard");
    this.text_lanyard_left = document.getElementById(".text-lanyard");
      var textLanyard = textClass.getContentText();
      var times = textClass.getTimesText();


      this.text_lanyard.forEach((el, index) => {
          el.innerHTML = ""; // 🔹 limpiar contenido previo
          el.innerHTML = Array(times).fill(`
              <div class="wrap_ex_${index}">
                  <h1>${textLanyard}</h1>
              </div>
          `).join('');
      });

  }





  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
