class ArtworkPreviewClass {
  constructor() {


    document.addEventListener("DOMContentLoaded", () => {
          this.elements = {
            left: document.getElementById("left-artwork-lanyard"),
            right: document.getElementById("right-artwork-lanyard"),
          };

        });

    for (let i = 0; i < boxPreviewArtwork.length; i++) {
      boxPreviewArtwork[i].addEventListener("click", function () {
        artworkClass.borderWhite(i);
        artworkPreviewClass.borderWhite(i);
      })
    }


  }
  refreshPreviewArtwork(){
    this.cleanStyleArtwork();
    this.applyTwoEndStylesArtwork();
  }
  cleanStyleArtwork() {
    const el = this.elements;

    Object.entries(el).forEach(([key, element]) => {
      if (element) {
        element.removeAttribute("style");

        if (["left", "right", "center"].includes(key)) {
          // Retain only the background-colour class
          element.className = "background-colour";
        } else {
          // Remove all CSS classes
          element.className = "";
        }
      }
    });
    backgroundClass.setBackgroundColourToLanyards();


  }
  applyTwoEndStylesArtwork() {
    const width = widthClass.getWidthSelected();

    switch (width) {
      case "10mm":
        this.applyClassToGroupArtwork("left-artwork-lanyard-two-end-10mm", "right-artwork-lanyard-two-end-10mm");
        break;
      case "15mm":
        this.applyClassToGroupArtwork("left-artwork-lanyard-two-end-15mm", "right-artwork-lanyard-two-end-15mm");
        break;
      case "20mm":
        this.applyClassToGroupArtwork("left-artwork-lanyard-two-end-20mm", "right-artwork-lanyard-two-end-20mm");
        break;
      case "25mm":
        this.applyClassToGroupArtwork("left-artwork-lanyard-two-end-25mm", "right-artwork-lanyard-two-end-25mm");
        break;
      case "30mm":
        this.applyClassToGroupArtwork("left-artwork-lanyard-two-end-30mm", "right-artwork-lanyard-two-end-30mm");
        break;
      default:
        console.warn("Unrecognised width in 'two-end' mode:", width);
    }

  }
  showHidePreviewArtwork(active){
    if (active) {
      previewArtwork.style.display = "flex";
    }
    else {
      previewArtwork.style.display = "none";
    }
  }
  uploadArtwork(image,index){

      lanyardArtwork[index].style.backgroundImage = 'url("' + image + '")';
  }
  borderWhite(active){
    for (var i = 0; i < boxPreviewArtwork.length; i++) {
      boxPreviewArtwork[i].style.border ="2px solid transparent";
    }
    boxPreviewArtwork[active].style.border ="2px solid white";
  }
  hideShowOneOrTwoSidesPrinted(){
    var sidePrintedSelected = sidePrintedClass.getSidePrintedSelected();

    if (sidePrintedSelected == "two-side") {
      for (var i = 0; i < previewArtworkBackSide.length; i++) {
         previewArtworkBackSide[i].style.display = "none";
      }
    } else {
      for (var i = 0; i < previewArtworkBackSide.length; i++) {
         previewArtworkBackSide[i].style.display = "flex";
      }
    }

  }


  applyClassToGroupArtwork(leftClass = "", rightClass = "") {

    const el = this.elements;

    if (leftClass) el.left_manual.classList.add(leftClass);
    if (rightClass) el.right_manual.classList.add(rightClass);
  }

}


const boxPreviewArtwork = document.querySelectorAll(".box-previewArtwork");
const lanyardArtwork = document.querySelectorAll(".lanyard-artwork");
const previewArtworkBackSide = document.querySelectorAll(".previewArtworkBackSide");
const drawArtworkOsNormal10mm = document.querySelectorAll(".draw-artwork-os-normal-10mm");
const previewArtwork = document.getElementById("previewArtwork");
const artworkPreviewClass = new ArtworkPreviewClass();
