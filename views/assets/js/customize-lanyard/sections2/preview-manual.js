class PreviewManual {
  constructor() {

  }

  refreshTextLanyard() {
    this.addTextLanyard();
    this.centerTextLanyard();
    this.modifySpaceBetweenText();
    this.changeColourText();
    this.changeColourText();
  }

  addTextLanyard(){
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
          <div class="wrap_text_${index}">
            <h1>${textLanyard}</h1>
          </div>
          <div class="wrap_img_${index}">
            <img src="../../views/assets/img/Test/arrow2.png" alt="">
          </div>
        `).join('');

        // Asignar el HTML al elemento
        el.innerHTML = html;
      }
    });
  }

  modifySpaceBetweenText(){
    this.text_lanyard_left.style.gap = textClass.getSpaceBetweenText() + "px";
    this.text_lanyard_right.style.gap = textClass.getSpaceBetweenText() + "px";
    const wrap_text_0 = document.querySelectorAll(".wrap_text_0");

  //  alert(wrap_text_0[0].offsetHeight + "  " + wrap_text_0[0].getBoundingClientRect().width);

    for (var i = 0; i < wrap_text_0.length; i++) {
      wrap_text_0[i].offsetWidth = wrap_text_0[i].getBoundingClientRect().width;
    }

  //  alert(wrap_text_0[0].offsetHeight + "  " + wrap_text_0.offsetWidth);

  }

  changeColourText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const colourText = textClass.getColourText();

    text_wrap_ex.forEach((text, i) => {
      text.style.color = colourText;
    });

  }

  changeFontFamilyText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const fontFamilyText = textClass.getFontFamilyText();

    text_wrap_ex.forEach((text, i) => {
      text.style.fontFamily = fontFamilyText;
    });
  }

  changeSizeText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const sizeText = textClass.getSizeText();

    text_wrap_ex.forEach((text, i) => {
      text.style.fontSize = sizeText + "px";
    });

    this.centerTextLanyard();
  }

  changeBoldText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const boldText = textClass.getBoldText();
    var fontWeight = 300;

    fontWeight = boldText ? 500 : 300;

    text_wrap_ex.forEach((text, i) => {
      text.style.fontWeight = fontWeight;
    });

    this.centerTextLanyard();

  }

  changeItalicText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const italicText = textClass.getItalicText();
    var fontStyle = "normal";

    fontStyle = italicText ? "italic" : "normal";

    text_wrap_ex.forEach((text, i) => {
      text.style.fontStyle = fontStyle;
    });


    this.centerTextLanyard();
  }

  changeUnderlineText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const underlineText = textClass.getUnderlineText();
    var textDecoration = "none";

    textDecoration = underlineText ? "underline" : "none";

    text_wrap_ex.forEach((text, i) => {
      text.style.textDecoration = textDecoration;
    });

    this.centerTextLanyard();

  }

  centerTextLanyard(){
    const wrapElements = document.querySelectorAll('.wrap_text_0, .wrap_text_1, .wrap_img_0, .wrap_img_1');

    // Iterar sobre los elementos .wrap_text_0 y .wrap_text_1
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
