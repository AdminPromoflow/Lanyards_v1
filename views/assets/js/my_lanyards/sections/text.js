class TextClass {

  constructor() {
    this.contentText = "";
    this.timesText = 3;
    this.spaceBetweenText = 50;
    this.spaceAlongLanyard = 0;
    this.colourText = "black";
    this.fontFamilyText = "sans-serif";
    this.sizeText = 6;
    this.boldText = false;
    this.italicText = false;
    this.underlineText = false;
    this.printableArea = false;
    this.textPosition = 0;
  }

  getContentText() {
    return this.contentText;
  }
  setContentText(value) {
    this.contentText = value;
  }

  setTimesText(newTimes) {
  if (typeof newTimes === 'number' && newTimes > 0) {
      this.timesText = newTimes;
  }
  }
  getTimesText() {
      return this.timesText;
  }

  setSpaceBetweenText(value){
    this.spaceBetweenText = value;
  }
  getSpaceBetweenText(){
    return this.spaceBetweenText;
  }

  setSpaceAlongLanyard(value){
    this.spaceAlongLanyard = value;
  }
  getSpaceAlongLanyard(){
    return this.spaceAlongLanyard;
  }

  setColourText(value){
    this.colourText = value;
  }
  getColourText(){
    return this.colourText;
  }

  setFontFamilyText(value){
    this.fontFamilyText = value;
  }
  getFontFamilyText(){
    return this.fontFamilyText;
  }

  setSizeText(value){
    this.sizeText = value;
  }
  getSizeText(){
    return this.sizeText;
  }

  setBoldText(value){
    this.boldText = value;
  }
  getBoldText(){
    return this.boldText;
  }

  setItalicText(value){
    this.italicText = value;
  }
  getItalicText(){
    return this.italicText;
  }

  setUnderlineText(value){
    this.underlineText = value;
  }
  getUnderlineText(){
    return this.underlineText;
  }



  setTextPosition(value){
    this.textPosition = value;
  }
  getTextPosition(){
    return this.textPosition;
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
    const textLanyard = this.getContentText();
    const times = this.getTimesText();

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

  modifyTextPosition(){
  //  alert(this.getTextPosition());
    this.text_lanyard_left.style.top = -50 +  this.getTextPosition() + "%";
    this.text_lanyard_right.style.top = -50 + this.getTextPosition() + "%";
  }

  modifySpaceBetweenText(){
    this.text_lanyard_left.style.gap = this.getSpaceBetweenText() + "px";
    this.text_lanyard_right.style.gap = this.getSpaceBetweenText() + "px";
  }

  modifySpaceAlongLanyard() {
    const padding_text_top = document.querySelectorAll(".padding_text_top");
    const padding_text_bottom = document.querySelectorAll(".padding_text_bottom");

    for (let i = 0; i < padding_text_top.length; i++) {
      padding_text_top[i].style.height = this.getSpaceAlongLanyard() + "px";
      padding_text_bottom[i].style.height = this.getSpaceAlongLanyard() + "px";
    //  padding_text_top[i].style.background = backgroundClass.getBackground() ;
      //padding_text_bottom[i].style.background = backgroundClass.getBackground();


    //  padding_text_top[i].style.top = "calc(25% + " + this.getSpaceAlongLanyard() + "px)" ;
    //  padding_text_bottom[i].style.bottom = "calc(25% + " + this.getSpaceAlongLanyard() + "px)" ;

    }
  }

  changeColourText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const colourText = this.getColourText();

    text_wrap_ex.forEach((text, i) => {
      text.style.color = colourText;
    });

  }

  changeFontFamilyText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const fontFamilyText = this.getFontFamilyText();

    text_wrap_ex.forEach((text, i) => {
      text.style.fontFamily = fontFamilyText;
    });
  }

  changeSizeText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const sizeText = this.getSizeText();

    text_wrap_ex.forEach((text, i) => {
      text.style.fontSize = sizeText + "px";
    });

    this.centerTextLanyard();
  }

  changeBoldText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const boldText = this.getBoldText();
    var fontWeight = 300;

    fontWeight = boldText ? 500 : 300;

    text_wrap_ex.forEach((text, i) => {
      text.style.fontWeight = fontWeight;
    });

    this.centerTextLanyard();

  }

  changeItalicText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const italicText = this.getItalicText();
    var fontStyle = "normal";

    fontStyle = italicText ? "italic" : "normal";

    text_wrap_ex.forEach((text, i) => {
      text.style.fontStyle = fontStyle;
    });


    this.centerTextLanyard();
  }

  changeUnderlineText(){
    const text_wrap_ex = document.querySelectorAll(".wrap_text_0 h1, .wrap_text_1 h1");
    const underlineText = this.getUnderlineText();
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

      wrapElements[i].style.left = "50%";

      wrapElements[i].style.transform = `rotate(90deg) translateY(-50%)`;
    }
  }

}
