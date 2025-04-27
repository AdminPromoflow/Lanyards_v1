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

    // Obtener las dimensiones de la clase dinámica wrap_ex_0 o wrap_ex_1
    const wrapElement = document.querySelectorAll('.wrap_ex_0');

    for (var i = 0; i < wrapElement.length; i++) {
      alert(text_lanyard_right.offsetWidth + "  " + wrapElement[i].offsetHeight);
      // Obtener el ancho de text_lanyard_right
      const rightWidth = text_lanyard_right.offsetWidth;

      // Calcular y establecer la propiedad 'left'
      //wrapElement[i].style.left = `${rightWidth / 2}px`; // Convertir a px para unidades correctas

      // Calcular y establecer la propiedad 'transform' para centrar el elemento
      wrapElement[i].style.transform = `rotate(90deg)  translate(0px, calc(-100% + 2px))`; // Ajustar la posición
    }
//rotate(90deg) translateY(-100%)

    // Mostrar todo el mensaje en un solo alert
  }

  //  alert("Max" + text_lanyard_right.offsetWidth + " Min " + wrapElement.offsetWidth);





  togglePreviewManualClass(action) {
    previewManualSection.style.display = action;
  }



}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
