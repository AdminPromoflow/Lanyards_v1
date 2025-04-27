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
          <div class="wrap_ex_${index} space_between_text">
            <h1>${textLanyard}</h1>
          </div>
        `).join('');

        // Asignar el HTML al elemento
        el.innerHTML = html;

        // Obtener las dimensiones de la clase dinámica wrap_ex_0 o wrap_ex_1
        const wrapElement = document.querySelector(`.wrap_ex_${index}`);

        if (wrapElement) {
          // Concatenar las dimensiones al mensaje
          dimensionsMessage += `Dimensiones de .wrap_ex_${index}:\n`;
          dimensionsMessage += `Ancho: ${wrapElement.offsetWidth}px\n`;
          dimensionsMessage += `Alto: ${wrapElement.offsetHeight}px\n\n`;
        } else {
          // Si no se encuentra el elemento, agregar una advertencia
          dimensionsMessage += `No se encontró el elemento .wrap_ex_${index}\n\n`;
        }
      }
    });

    // Mostrar todo el mensaje en un solo alert
    alert(dimensionsMessage);
  }






  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
