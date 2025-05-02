class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "block";

  }
  togglePreviewTemplateArtworkClass(action) {

      previewTemplateArtworkSection.style.display = action;
  }

  addArtworkImage(side, image){

    var sizeAproval = this.confirmImageMessures(image);

    leftSuperLanyardTemplateArtwork.innerHTML = "";
    rightSuperLanyardTemplateArtwork.innerHTML = "";


    if (side == "left") {
       leftSuperLanyardTemplateArtwork.innerHTML = '<img src="' + image.src + '" alt="">';
    }
    else if (side == "right") {
      rightSuperLanyardTemplateArtwork.innerHTML = '<img src="' + image.src + '" alt="">';
    }
  }

  confirmImageMessures(image){
    var sizeAproval = false;
    const widthSelected = widthClass.getWidthSelectedJ();

    if (widthSelected == "10mm") {
      if (image.height == 42520 && img.width == 945) {
        var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 945 pixels wide.");
      }
    }
    else if (widthSelected == "15mm") {
      if (image.height == 42520 && img.width == 1417) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 945 pixels wide.");
      }
    }

    else if (widthSelected == "20mm") {
      if (image.height == 42520 && img.width == 1890) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 945 pixels wide.");
      }
    }

    else if (widthSelected == "25mm") {
      if (image.height == 42520 && img.width == 2362) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 945 pixels wide.");
      }
    }

    else if (widthSelected == "30mm") {
      if (image.height == 42520 && img.width == 2835) {
      var sizeAproval = true;
      }
      else {
        alert("The lanyard artwork image must measure 42,520 pixels high by 945 pixels wide.");
      }
    }

    return sizeAproval;

  }


}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
const leftSuperLanyardTemplateArtwork = document.getElementById("left-super-lanyard-template-artwork");
const rightSuperLanyardTemplateArtwork = document.getElementById("right-super-lanyard-template-artwork");
const centerSuperLanyardTemplateAartwork = document.getElementById("center-super-lanyard-template-artwork");




const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
