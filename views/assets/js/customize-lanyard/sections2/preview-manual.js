class PreviewManual {
  constructor() {

  }

  refreshTextLanyard() {
    this.addTextLanyard();
    this.modifyTextPosition();
    this.centerTextLanyard();
    this.modifySpaceBetweenText();
    this.changeSizeText();
    this.changeColourText();
    this.modifySpaceAlongLanyard();
    this.changeBoldText();
    this.changeItalicText();
    this.changeUnderlineText();


  }

  addTextLanyard() {
    // Obtener los elementos del DOM
    this.text_lanyard_left = document.getElementById("text_lanyard_left");
    this.text_lanyard_right = document.getElementById("text_lanyard_right");

    // Obtener el contenido y el número de repeticiones
    const textLanyard = textClass.getContentText();
    const times = textClass.getTimesText();

    // Iterar sobre los elementos izquierdo y derecho
    [this.text_lanyard_left, this.text_lanyard_right].forEach((el, index) => {
      if (el) {
        // Limpiar el contenido previo
        el.innerHTML = "";

        // Crear el HTML repetido
        const contentHTML = Array(times).fill(`
          <div class="wrap_text_${index}">
            <h1>${textLanyard}</h1>
          </div>
        `).join('');

        // Agregar divs de padding antes y después
        const fullHTML = `
          <div class="padding_text_top"></div>
          ${contentHTML}
          <div class="padding_text_bottom"></div>
        `;

        // Asignar el HTML al elemento
        el.innerHTML = fullHTML;
      }
    });
  }

  showPrintableAreaText(){
    const value = textClass.getPrintableAreaText()
    text_lanyard_left = document.getElementById("text_lanyard_left");
    text_lanyard_right = document.getElementById("text_lanyard_right");
    text_lanyard_center = document.getElementById("text_lanyard_center");


    if (value) {
      [text_lanyard_left, text_lanyard_right, text_lanyard_center].forEach((element, index) => {
        element.style.background = "rgba(215,215,215, .3)";
      });
    }
    else {
      [text_lanyard_left, text_lanyard_right, text_lanyard_center].forEach((element, index) => {
        element.style.background = "rgba(215,215,215, 0)";
      });
    }
  }

  modifyTextPosition(){
    this.text_lanyard_left.style.top = textClass.getTextPosition() + "%";
    this.text_lanyard_right.style.top = textClass.getTextPosition() + "%";
  }

  modifySpaceBetweenText(){
    this.text_lanyard_left.style.gap = textClass.getSpaceBetweenText() + "px";
    this.text_lanyard_right.style.gap = textClass.getSpaceBetweenText() + "px";
  }

  modifySpaceAlongLanyard() {
    const padding_text_top = document.querySelectorAll(".padding_text_top");
    const padding_text_bottom = document.querySelectorAll(".padding_text_bottom");

    for (let i = 0; i < padding_text_top.length; i++) {
      padding_text_top[i].style.height = textClass.getSpaceAlongLanyard() + "px";
      padding_text_bottom[i].style.height = textClass.getSpaceAlongLanyard() + "px";
      padding_text_top[i].style.background = backgroundClass.getBackground() ;
      padding_text_bottom[i].style.background = backgroundClass.getBackground();


    //  padding_text_top[i].style.top = "calc(25% + " + textClass.getSpaceAlongLanyard() + "px)" ;
    //  padding_text_bottom[i].style.bottom = "calc(25% + " + textClass.getSpaceAlongLanyard() + "px)" ;

    }
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
    const wrapElements = document.querySelectorAll('.wrap_text_0, .wrap_text_1');

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






  refreshImageLanyard() {
  //  this.uploadImage();
    this.addImageLanyard();
    this.modifySpaceBetweenImage();
    this.modifyImageSize();
    this.modifyImageRotation();
    this.centerImageLanyard();
    this.modifySpaceAlongLanyardImage();

  }

  addImageLanyard() {

    // Obtener los elementos del DOM
    this.image_lanyard_left = document.getElementById("img_lanyard_left");
    this.image_lanyard_right = document.getElementById("img_lanyard_right");

    // Obtener el contenido y el número de repeticiones
    const times = imageClass.getTimesImage();

    const link = imageClass.getLinkImage();
  //  const timestamp = Date.now(); // genera un número único (como filemtime)
  //link  const versionedLink = link + '?v=' + timestamp;

    // Iterar sobre los elementos izquierdo y derecho
    [this.image_lanyard_left, this.image_lanyard_right].forEach((el, index) => {
      if (el) {
        // Limpiar el contenido previo
        el.innerHTML = "";

        // Crear el HTML repetido
        const contentHTML = Array(times).fill(`
          <div class="wrap_img_${index}">
            <img src="${link}" alt="">
          </div>
        `).join('');

        // Agregar divs de padding antes y después
        const fullHTML = `
          <div class="padding_image_top"></div>
          ${contentHTML}
          <div class="padding_image_bottom"></div>
        `;

        // Asignar el HTML al elemento
        el.innerHTML = fullHTML;
      }
    });
  }

  showPrintableAreaImage(){
    const value = imageClass.getPrintableAreaImage()

    const image_lanyard_left = document.getElementById("img_lanyard_left");
    const image_lanyard_right = document.getElementById("img_lanyard_right");
    const image_lanyard_center = document.getElementById("img_lanyard_center");


    if (value) {
      [image_lanyard_left, image_lanyard_right, image_lanyard_center].forEach((element, index) => {
        element.style.background = "rgba(215,215,215, .3)";
      });
    }

    else {
      [image_lanyard_left, image_lanyard_right, image_lanyard_center].forEach((element, index) => {
        element.style.background = "rgba(215,215,215, 0)";
      });
    }

  }

  modifySpaceAlongLanyardImage() {
    const padding_image_top = document.querySelectorAll(".padding_image_top");
    const padding_image_bottom = document.querySelectorAll(".padding_image_bottom");



    for (let i = 0; i < padding_image_top.length; i++) {
      padding_image_top[i].style.height = imageClass.getSpaceAlongLanyard() + "px";
      padding_image_bottom[i].style.height = imageClass.getSpaceAlongLanyard() + "px";


      padding_image_top[i].style.background = backgroundClass.getBackground() ;
      padding_image_bottom[i].style.background = backgroundClass.getBackground();

    }
  }

  centerImageLanyard(){
    const image_lanyard_left = document.getElementById("img_lanyard_left");
    const wrapElements = document.querySelectorAll('.wrap_img_0, .wrap_img_1');


    // Iterar sobre los elementos .wrap_text_0 y .wrap_text_1
    for (let i = 0; i < wrapElements.length; i++) {
      // Obtener el ancho de text_lanyard_right
      const rightWidth = image_lanyard_left.offsetWidth;


      // Calcular y establecer la propiedad 'left'
      //wrapElements[i].style.left = `${rightWidth / 2}px`; // Convertir a px para unidades correctas
      //wrapElements[i].style.height = `${rightWidth / 2}px`; // Convertir a px para unidades correctas

      // Calcular y establecer la propiedad 'transform' para rotar y ajustar la posición
      wrapElements[i].style.left = "50%";

      wrapElements[i].style.transform = `translateX(-50%)`;
    }
  }

  modifyImageSize(){
    const wrapElements = document.querySelectorAll('.wrap_img_0, .wrap_img_1');
    const size = imageClass.getImageSize();
    for (let i = 0; i < wrapElements.length; i++) {
      wrapElements[i].style.width = size + "px";
      wrapElements[i].style.height = size + "px";
    }
  }

  modifySpaceBetweenImage(){
    const image_lanyard_left = document.getElementById("img_lanyard_left");
    const image_lanyard_right = document.getElementById("img_lanyard_right");

    image_lanyard_left.style.gap = imageClass.getSpaceBetweenImage() + "px";
    image_lanyard_right.style.gap = imageClass.getSpaceBetweenImage() + "px";
  }

  modifyImageRotation(){
    const wrapElementLeft = document.querySelectorAll('.wrap_img_0 img');
    const wrapElementRight = document.querySelectorAll('.wrap_img_1 img');

    var rotation0 = imageClass.getImageRotation();
    var rotation1 =  180 + rotation0;


    for (var i = 0; i < wrapElementLeft.length; i++) {
      wrapElementLeft[i].style.transform = " translateY(-50%) rotate(" + rotation0 + "deg)"
      wrapElementRight[i].style.transform = "translateY(-50%) rotate(" + rotation1 + "deg) scale(-1, -1)"
    }
  }

  uploadImage() {
    const wrapElements = document.querySelectorAll('.wrap_img_0 img, .wrap_img_1 img');
    const link = imageClass.getLinkImage();

    if (!link) {
      console.error('No se pudo obtener el enlace de la imagen.');
      return;
    }

    const timestamp = Date.now(); // genera un número único (como filemtime)
    const versionedLink = link + '?v=' + timestamp;

    wrapElements.forEach(img => {
      img.src = versionedLink;
    });
  }







}

const previewManualSection = document.getElementById("preview-manual-section");
const previewManual = new PreviewManual();
