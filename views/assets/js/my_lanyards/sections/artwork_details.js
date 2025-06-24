class ArtworkDetailsClass {
  constructor() {
    back_to_my_lanyards.addEventListener("click", function(){
      myLanyardsClass.showSection("flex");
      artworkDetailsClass.showSection("none");
    })

  }

  showSection(action){
    section_artwork_details.style.display = action;
  }
  resizeWithLanyard(descriptionObj){
    if (descriptionObj.width.value == "10mm") {
      my_lanyards_left_side.style.height = "0.48cm";
      my_lanyards_right_side.style.height = "0.48cm";
    }
    else if (descriptionObj.width.value == "15mm") {
      my_lanyards_left_side.style.height = "0.72cm";
      my_lanyards_right_side.style.height = "0.72cm";
    }
    else if (descriptionObj.width.value == "20mm") {
      my_lanyards_left_side.style.height = "0.96cm";
      my_lanyards_right_side.style.height = "0.96cm";
    }
    else if (descriptionObj.width.value == "25mm") {
      my_lanyards_left_side.style.height = "1.2cm";
      my_lanyards_right_side.style.height = "1.2cm";
    }
    else if (descriptionObj.width.value == "30mm") {
      my_lanyards_left_side.style.height = "1.44cm";
      my_lanyards_right_side.style.height = "1.44cm";
    }
  }
  manageLanyardDataJobArtwork(data, artwork){

    const lefttLink = (artwork[0].linkLeftImage);
    const rightLink = (artwork[0].linkRightImage);

    this.resizeWithLanyard(JSON.parse(data.description));
    this.cleanArtworkManual();

    my_lanyards_left_side.innerHTML = `<img class="" src="../../${lefttLink}" alt="">`;
    my_lanyards_right_side.innerHTML = `<img class="" src="../../${rightLink}" alt="">`;

  }

  cleanArtworkManual(){
    my_lanyards_left_side.innerHTML = ``;
    my_lanyards_right_side.innerHTML = ``;
  }
  manageLanyardDataJobManual(data, images, texts){
    this.resizeWithLanyard(JSON.parse(data.description));
    this.cleanArtworkManual();

    if (images != false) {
    //  alert(JSON.stringify(images));
      this.manageImage(images);
    }
    if (texts != false) {
    //  alert(JSON.stringify(texts));
      this.manageText(texts);
    }

  }

  manageImage(images){
    my_lanyards_left_side.innerHTML = `
    <div class="img_lanyard_left" id="img_lanyard_left">
    </div>
    `;
    my_lanyards_right_side.innerHTML = `
    <div class="img_lanyard_right" id="img_lanyard_right">
    </div>
    `;

    if (Array.isArray(images) && images.length > 0) {
      const imageData = images[0]; // si sólo necesitas el primer objeto
      imageClass.setTimesImage(parseInt(imageData.timesImage));
      imageClass.setImageSize(parseFloat(imageData.imageSize));
      imageClass.setSpaceBetweenImage(parseFloat(imageData.spaceBetweenImage));
      imageClass.setImageRotation(parseFloat(imageData.imageRotation));
      imageClass.setSpaceAlongLanyard(parseFloat(imageData.spaceAlongLanyard));
      imageClass.setLinkImage(imageData.linkImage);
      imageClass.setImagePosition(parseFloat(imageData.imagePosition));
      //imageClass.refreshImageLanyard();
      // Aquí puedes hacer algo con imageClass, como almacenarlo o usar sus getters
      /*alert(
      `Datos de ImageClass:\n` +
      `Times Image: ${imageClass.getTimesImage()}\n` +
      `Image Size: ${imageClass.getImageSize()}\n` +
      `Space Between Image: ${imageClass.getSpaceBetweenImage()}\n` +
      `Image Rotation: ${imageClass.getImageRotation()}\n` +
      `Space Along Lanyard: ${imageClass.getSpaceAlongLanyard()}\n` +
      `Link Image: ${imageClass.getLinkImage()}\n` +
      `Image Position: ${imageClass.getImagePosition()}`
    );*/


    } else {
      console.warn("No se encontraron datos de imagen.");
    }

  }
  manageText(texts){
    my_lanyards_left_side.innerHTML = `
    <div class="text_lanyard_left" id="text_lanyard_left">
    </div>
    `;
    my_lanyards_right_side.innerHTML = `
    <div class="text_lanyard_right" id="text_lanyard_right">
    </div>
    `;



    if (Array.isArray(texts) && texts.length > 0) {
      const textData = texts[0]; // solo toma el primer objeto

      textClass.setContentText(textData.contentText);
      textClass.setTimesText(parseInt(textData.timesText));
      textClass.setSpaceBetweenText(parseFloat(textData.spaceBetweenText));
      textClass.setSpaceAlongLanyard(parseFloat(textData.spaceAlongLanyard));
      textClass.setColourText(textData.colourText);
      textClass.setFontFamilyText(textData.fontFamilyText);
      textClass.setSizeText(parseFloat(textData.sizeText));
      textClass.setBoldText(textData.boldText === "1");
      textClass.setItalicText(textData.italicText === "1");
      textClass.setUnderlineText(textData.underlineText === "1");
      textClass.setTextPosition(parseFloat(textData.textPosition));
    //  textClass.refreshTextLanyard();
      // Mostrar en alert
      /*alert(
        `Datos de TextClass:\n` +
        `Content Text: ${textClass.getContentText()}\n` +
        `Times Text: ${textClass.getTimesText()}\n` +
        `Space Between Text: ${textClass.getSpaceBetweenText()}\n` +
        `Space Along Lanyard: ${textClass.getSpaceAlongLanyard()}\n` +
        `Colour Text: ${textClass.getColourText()}\n` +
        `Font Family: ${textClass.getFontFamilyText()}\n` +
        `Size Text: ${textClass.getSizeText()}\n` +
        `Bold: ${textClass.getBoldText()}\n` +
        `Italic: ${textClass.getItalicText()}\n` +
        `Underline: ${textClass.getUnderlineText()}\n` +
        `Text Position: ${textClass.getTextPosition()}`
      );*/
    } else {
      alert("No se encontraron datos de texto.");
    }
  }



}

const  my_lanyards_left_side = document.getElementById('my_lanyards_left_side');
const  my_lanyards_right_side = document.getElementById('my_lanyards_right_side');

const section_artwork_details = document.getElementById("section_artwork_details");
const back_to_my_lanyards = document.getElementById("back_to_my_lanyards");

const artworkDetailsClass = new ArtworkDetailsClass();
