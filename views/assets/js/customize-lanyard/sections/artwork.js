class Artwork {
  constructor() {
    this._srcImage = "";
    this._heightImage = "";
    this._widthImage = "";

    for (let i = 0; i < containerBoxesArtwork.length; i++) {
      containerBoxesArtwork[i].addEventListener("click", () => {
        this.borderWhite(i);
        artworkPreviewClass.borderWhite(i);
      });
    }

    this.setupUploadListener("left", "upload_file_artwork_left");
    this.setupUploadListener("right", "upload_file_artwork_right");
  }

  // Método reutilizable para manejar subida de imágenes
  setupUploadListener(side, inputId) {
    const input = document.getElementById(inputId);

    input.addEventListener("change", (event) => {
      const file = event.target.files[0];
      console.log(`Archivo seleccionado (${side}):`, file);

      if (file && file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = (e) => {
          console.log(`Archivo leído (${side}):`, e.target.result);
          const img = new Image();

          img.onload = () => {
            console.log(`Imagen cargada (${side}):`, img.width, img.height);

            this.setSRCImage(img.src);
            this.setHeightImage(img.height);
            this.setWidthImage(img.width);

            artworkPreviewClass.uploadArtworkManual(side, img.src);
            previewTemplateArtworkClass.addArtworkImage(side, img, img.height, img.width);
          };

          img.src = e.target.result;
        };

        reader.readAsDataURL(file);
      } else {
        alert("Por favor, selecciona un archivo de imagen.");
      }
    });
  }

  // Getters y setters
  setSRCImage(value) {
    this._srcImage = value;
  }

  getSRCImage() {
    return this._srcImage;
  }

  setHeightImage(value) {
    this._heightImage = value;
  }

  getHeightImage() {
    return this._heightImage;
  }

  setWidthImage(value) {
    this._widthImage = value;
  }

  getWidthImage() {
    return this._widthImage;
  }

  // Mostrar u ocultar artwork
  showHideArtwork(active) {
    if (active) {
      artworkPHPClass.style.display = "flex";
      sidePrintedClass.getSidePrintedSelected();
    }
  }

  // Estilo de borde
  borderWhite(active) {
    for (let i = 0; i < containerBoxesArtwork.length; i++) {
      containerBoxesArtwork[i].style.border = "2px solid transparent";
    }
    containerBoxesArtwork[active].style.border = "2px solid white";
  }

  // Ocultar lado posterior si solo hay una cara impresa
  hideShowOneOrTwoSidesPrinted() {
    const display = sidePrintedClass.getSidePrintedSelected() === "one-side" ? "flex" : "none";

    for (let i = 0; i < artworkBackSide.length; i++) {
      artworkBackSide[i].style.display = display;
    }
  }
}

// Elementos del DOM necesarios
const inputImageArtwork = document.querySelectorAll(".input_image_artwork");
const containerBoxesArtwork = document.querySelectorAll(".container_boxes_artwork");
const artworkPHPClass = document.getElementById("artworkPHPClass");
const artworkBackSide = document.querySelectorAll(".artworkBackSide");

// Instancia de la clase
const artworkClass = new Artwork();
