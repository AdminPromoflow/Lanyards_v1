class PreviewClip {
  constructor() {
    // Main preview container
    this.previewClip = document.getElementById("preview-clip-class");

    // Elementos individuales del clip
    this.centerClip = document.getElementById("center_clip");
    this.leftClip = document.getElementById("left_clip");
    this.rightClip = document.getElementById("right_clip");
  }

  togglePreviewClipClass(action) {
      this.previewClip.style.display = action;

  }

  showPreviewSelectedClip() {
    const type = oneTwoEndsClass.getTypeLanyardSelected();
    const width = widthClass.getWidthSelected();
    const clipSelected = clipClass.getClipSelected();

    this.updateClipImagesSrc();


    //this.cleanStyle();


    if (type === "one-end") {
      this.applyOneEndStyles(width, clipSelected);
    } else if (type === "two-end") {
      this.applyTwoEndStyles(width, clipSelected);
    }
  }

  updateClipImagesSrc() {
    const newSrc = "../../views/assets/img/global/customize-lanyard/sections2/clips/one-end/5.png";

    this.centerClip.querySelector("img").src = newSrc;
    this.leftClip.querySelector("img").src = newSrc;
    this.rightClip.querySelector("img").src = newSrc;
  }




  applyOneEndStyles(width, clipSelected) {
    if (!this.centerClip) return;

    this.leftClip.style.display = "none";
    this.rightClip.style.display = "none";
    this.centerClip.style.display = "block";


    // Agregar clase correspondiente según el ancho
    switch (width) {
      case "10mm":
        this.centerClip.classList.add("clip_one_end_10mm");
        break;
      case "15mm":
        this.centerClip.classList.add("clip_one_end_15mm");
        break;
      case "20mm":
        this.centerClip.classList.add("clip_one_end_20mm");
        break;
      case "25mm":
        this.centerClip.classList.add("clip_one_end_25mm");
        break;
      case "30mm":
        this.centerClip.classList.add("clip_one_end_30mm");
        break;
      // Podés seguir agregando más anchos acá...
      default:
        console.warn("Ancho no reconocido:", width);
    }
  }

  applyTwoEndStyles(width, clipSelected) {
    if (!this.leftClip || !this.rightClip) return;

    this.leftClip.style.display = "block";
    this.rightClip.style.display = "block";
    this.centerClip.style.display = "none";

    // Agregar nuevas clases según el ancho
    switch (width) {
      case "10mm":
        this.leftClip.classList.add("clip_two_ends_10mm_left");
        this.rightClip.classList.add("clip_two_ends_10mm_right");
        break;
      case "15mm":
        this.leftClip.classList.add("clip_two_ends_15mm_left");
        this.rightClip.classList.add("clip_two_ends_15mm_right");
        break;
      case "20mm":
        this.leftClip.classList.add("clip_two_ends_20mm_left");
        this.rightClip.classList.add("clip_two_ends_20mm_right");
        break;
      case "25mm":
        this.leftClip.classList.add("clip_two_ends_25mm_left");
        this.rightClip.classList.add("clip_two_ends_25mm_right");
        break;
      case "30mm":
        this.leftClip.classList.add("clip_two_ends_30mm_left");
        this.rightClip.classList.add("clip_two_ends_30mm_right");
        break;
      // Agregar más casos si es necesario
      default:
        console.warn("Ancho no reconocido:", width);
    }
  }

  cleanStyle() {
  if (this.centerClip) {
    this.centerClip.removeAttribute("style");
    this.centerClip.className = "clip"; // mantiene solo la clase 'clip'
  }

  const sideClips = [this.leftClip, this.rightClip];
  sideClips.forEach(el => {
    if (el) {
      el.removeAttribute("style");
      el.className = "clips"; // mantiene solo la clase 'clips'
    }
  });
}

}

// Instanciación
const previewClip = new PreviewClip();
