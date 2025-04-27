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




      }
    });





    const rightWidth = text_lanyard_right.offsetWidth;

    // Definir las clases a procesar
    const classNames = ['.wrap_ex_0', '.wrap_ex_1'];

    classNames.forEach(className => {
      const wrapElements = document.querySelectorAll(className);

      wrapElements.forEach(el => {
        // Calcular y establecer la propiedad 'left'
        el.style.left = `${rightWidth / 2}px`;

        // Calcular y establecer la propiedad 'transform' para centrar el elemento
        el.style.transform = `translateX(${-el.offsetWidth / 2}px)`;
      });
    });
  }

  //  alert("Max" + text_lanyard_right.offsetWidth + " Min " + wrapElement.offsetWidth);





  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
