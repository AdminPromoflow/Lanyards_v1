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

        // Asegúrate de que wrapElement está disponible
        if (wrapElement) {
          // Obtener el ancho de text_lanyard_right
          const rightWidth = this.text_lanyard_right.offsetWidth;

          // Mover el wrapElement en el eje X con respecto al tamaño de text_lanyard_right
          wrapElement.style.position = "relative";  // Asegurarse de que el elemento esté posicionado
          wrapElement.style.left = `${rightWidth / 2 - wrapElement.offsetWidth / 2}px`; // Centrado respecto a text_lanyard_right

          // También podrías usar `transform` para moverlo en el eje X si prefieres una transformación CSS más fluida:
          wrapElement.style.transform = `translateX(${rightWidth / 2 - wrapElement.offsetWidth / 2}px)`;
        }
      }
    });

    // Mostrar todo el mensaje en un solo alert (si es necesario)
    alert(dimensionsMessage);
  }


  //  alert("Max" + text_lanyard_right.offsetWidth + " Min " + wrapElement.offsetWidth);





  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
