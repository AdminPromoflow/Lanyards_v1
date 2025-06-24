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

}

const textClass = new TextClass();
