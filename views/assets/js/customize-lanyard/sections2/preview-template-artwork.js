class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "block";

  }
  togglePreviewTemplateArtworkClass(action) {

      previewTemplateArtworkSection.style.display = action;
  }

  addArtworkImage(side, src){

    if (side == "left") {
      leftSuperLanyardTemplateArtwork.innerHTML = "";
       leftSuperLanyardTemplateArtwork.innerHTML = '<img src="' + src + '" alt="">';
    }
    else if (side == "right") {
      rightSuperLanyardTemplateArtwork.innerHTML = "";
      rightSuperLanyardTemplateArtwork.innerHTML = '<img src="' + src + '" alt="">';
    }
  }


}
const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
const leftSuperLanyardTemplateArtwork = document.getElementById("left-super-lanyard-template-artwork");
const rightSuperLanyardTemplateArtwork = document.getElementById("right-super-lanyard-template-artwork");
const centerSuperLanyardTemplateAartwork = document.getElementById("center-super-lanyard-template-artwork");




const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
