class PreviewManual {
  constructor() {
    this.text_lanyard = document.querySelectorAll(".text-lanyard");
  }
  addTextToLanyard() {
      this.text_lanyard = document.querySelectorAll(".text-lanyard");
      var textLanyard = textClass.getContentText();
      var times = 3; // o usar getTimesText()

      this.text_lanyard.forEach(el => {
          el.innerHTML = ""; // 🔹 limpiar contenido previo
          el.innerHTML = Array(times).fill(`
              <div class="wrap_ex">
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
