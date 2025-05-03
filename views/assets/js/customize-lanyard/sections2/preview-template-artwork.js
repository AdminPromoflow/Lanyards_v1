class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "block";

  }
  togglePreviewTemplateArtworkClass(action) {

      previewTemplateArtworkSection.style.display = action;
  }

  addArtworkImage(side, image, height, width){




    var sizeAproval = this.confirmImageMessures();


    if (sizeAproval) {
      if (side == "left") {
         leftSuperLanyardTemplateArtwork.innerHTML = '<img src="' + image.src + '" alt="">';
      }
      else if (side == "right") {
        rightSuperLanyardTemplateArtwork.innerHTML = '<img src="' + image.src + '" alt="">';
      }
    }
    else {
      alert("Please re-upload the image.");
    }

  }


  confirmImageMessures(){
    const height = artworkClass.getHeightImage();
    const width = artworkClass.getWidthImage();


    var sizeAproval = false;
    const widthSelected = widthClass.getWidthSelected();

    if (artworkManualClass.get) {

    }

    if (widthSelected == "10mm") {
      if (height == 42520 && width == 945) {
        var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 945 pixels wide.");
      }
    }
    else if (widthSelected == "15mm") {
      if (height == 42520 && width == 1417) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 1417 pixels wide.");
      }
    }

    else if (widthSelected == "20mm") {
      if (height == 42520 && width == 1890) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 1890 pixels wide.");
      }
    }

    else if (widthSelected == "25mm") {
      if (height == 42520 && width == 2362) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 2362 pixels wide.");
      }
    }

    else if (widthSelected == "30mm") {
      if (height == 42520 && width == 2835) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 2835 pixels wide.");
      }
    }

    if (!sizeAproval) {
      leftSuperLanyardTemplateArtwork.innerHTML = "";
      rightSuperLanyardTemplateArtwork.innerHTML = "";
    }

    return sizeAproval;

  }


}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
const leftSuperLanyardTemplateArtwork = document.getElementById("left-super-lanyard-template-artwork");
const rightSuperLanyardTemplateArtwork = document.getElementById("right-super-lanyard-template-artwork");
const centerSuperLanyardTemplateAartwork = document.getElementById("center-super-lanyard-template-artwork");




const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
