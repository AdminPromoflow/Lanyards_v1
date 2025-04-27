class PreviewManual {
  constructor() {

  }

  addTextToLanyard() {
    // Obtener los elementos del DOM
    this.text_lanyard_left = document.getElementById("text_lanyard_left");
    this.text_lanyard_right = document.getElementById("text_lanyard_right");

    // Obtener el contenido y el número de repeticiones
    const textLanyard = textClass.getContentText();
    const times = textClass.getTimesText();



    let dimensionsMessage = ""; // Variable para almacenar las dimensiones

    // Iterar sobre los elementos izquierdo y derecho
    [this.text_lanyard_left, this.text_lanyard_right].forEach((el, index) => {
      if (el) {
        // Limpiar el contenido previo
        el.innerHTML = "";

        // Crear el HTML repetido
        const html = Array(times).fill(`
          <div class="wrap_ex_${index}">
            <h1>${textLanyard}</h1>
          </div>
        `).join('');

        // Asignar el HTML al elemento
        el.innerHTML = html;
      }
    });

    this.centerTextLanyard();
    this.modifySpaceBetweenText();
  }

  modifySpaceBetweenText(){
    this.text_lanyard_left.style.gap = textClass.getSpaceBetweenText() + "px";
    this.text_lanyard_right.style.gap = textClass.getSpaceBetweenText() + "px";
  }
  centerTextLanyard(){
    const wrapElements = document.querySelectorAll('.wrap_ex_0, .wrap_ex_1');

    // Iterar sobre los elementos .wrap_ex_0 y .wrap_ex_1
    for (let i = 0; i < wrapElements.length; i++) {
      // Obtener el ancho de text_lanyard_right
      const rightWidth = text_lanyard_right.offsetWidth;

      // Calcular y establecer la propiedad 'left'
      wrapElements[i].style.left = `${rightWidth / 2}px`; // Convertir a px para unidades correctas

      // Calcular y establecer la propiedad 'transform' para rotar y ajustar la posición
      wrapElements[i].style.transform = `rotate(90deg) translateY(calc(-100% + ${wrapElements[i].offsetHeight / 2}px))`;
    }
  }

  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
