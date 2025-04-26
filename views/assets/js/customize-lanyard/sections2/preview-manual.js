class PreviewManual {
  constructor() {
  }
  function addTextToLanyard() {
    this.text_lanyard_left = document.getElementById("lanyard_left");
    this.text_lanyard_right = document.getElementById("lanyard_right");

    const textLanyard = textClass.getContentText();
    const times = textClass.getTimesText();

    [this.text_lanyard_left, this.text_lanyard_right].forEach((el, index) => {
      if (el) {
        el.innerHTML = ""; // Limpia el contenido anterior

        const html = Array(times).fill(`
          <div class="wrap_ex_${index}">
            <h1>${textLanyard}</h1>
          </div>
        `).join('');

        el.innerHTML = html;
      }
    });
  }






  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
