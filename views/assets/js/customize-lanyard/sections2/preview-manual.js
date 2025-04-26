class PreviewManual {
  constructor() {
    this.text_lanyard = document.querySelectorAll(".text-lanyard");
  }
  addTextToLanyard() {
    this.text_lanyard = document.querySelectorAll(".text-lanyard");
    var textLanyard = textClass.getContentText();
    var times = 3; //getTimesText(); // obtenemos el valor desde la función get

    this.text_lanyard.forEach(el => {
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
