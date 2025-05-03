class Artwork {
  constructor() {
    this.setSRCImage = "";
    this.setHeightImage = "";
    this.setWidthImage = "";

  /*  for (let i = 0; i < clickUploadArtwork.length; i++) {
      clickUploadArtwork[i].addEventListener("click", function (){
        inputImageArtwork[i].click();
      //  alert(i);
      })
    }*/
    for (let i = 0; i < containerBoxesArtwork.length; i++) {
      containerBoxesArtwork[i].addEventListener("click", function () {
        artworkClass.borderWhite(i);
        artworkPreviewClass.borderWhite(i);
      })
    }


    const upload_file_artwork_left = document.getElementById("upload_file_artwork_left");
    const upload_file_artwork_left_img = document.querySelector("#upload_file_artwork_left img");


    upload_file_artwork_left.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Captura el primer archivo seleccionado
        console.log('Archivo seleccionado:', file);

        if (file && file.type.startsWith('image/')) { // Verifica que sea una imagen
            const reader = new FileReader();

            reader.onload = function(e) {
                console.log('Archivo leído:', e.target.result);
                const img = new Image();

                // Asegúrate de asignar el onload ANTES de asignar el src
                img.onload = function() {
                    console.log('Imagen cargada:');
                    console.log('Ancho:', img.width, 'Alto:', img.height);

                    // Aquí ya puedes usar el src y las dimensiones con seguridad
                    artworkPreviewClass.uploadArtworkManual("left", img.src);
                    previewTemplateArtworkClass.addArtworkImage("left", img, img.height, img.width);
                };

                img.src = e.target.result;
            };

            reader.readAsDataURL(file); // Lee el contenido del archivo como una URL
        } else {
            alert('Por favor, selecciona un archivo de imagen.');
        }
    });




    const upload_file_artwork_right = document.getElementById("upload_file_artwork_right");

    upload_file_artwork_right.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = new Image();

                // Agrega el onload antes de asignar src
                img.onload = function() {
                    console.log('Image loaded');
                    console.log('Width:', img.width);
                    console.log('Height:', img.height);

                    // Ahora sí: ya puedes usar las dimensiones con seguridad

                    

                    artworkPreviewClass.uploadArtworkManual("right", img.src);
                    previewTemplateArtworkClass.addArtworkImage("right", img, img.height, img.width);


                };

                // Este paso debe venir después de definir onload
                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please select a valid image file.');
        }
    });

  }

  setSRCImage(){
    return this.setSRCImage;
  }
  setSRCImage(value){
    this.setSRCImage = value;
  }

  getHeightImage(){
    return this.setHeightImage;
  }
  setHeightImage(value){
    this.setHeightImage = value;
  }

  getWidthImage(){
    return this.setWidthImage;
  }
  setWidthImage(value){
    this.setWidthImage = value;
  }

  refreshArtwork(){
    previewTemplateArtworkClass.confirmImageMessures();
  }


  showHideArtwork(active){
    if (active) {
      artworkPHPClass.style.display = "flex";
      sidePrintedClass.getSidePrintedSelected();
      //alert(sidePrintedClass.getSidePrintedSelected());
    }
    else {

    }
  }

  borderWhite(active){
    for (var i = 0; i < containerBoxesArtwork.length; i++) {
      containerBoxesArtwork[i].style.border ="2px solid transparent";
    }
    containerBoxesArtwork[active].style.border ="2px solid white";
  }

 hideShowOneOrTwoSidesPrinted(){

   var sidePrintedDisplay;
   if (sidePrintedClass.getSidePrintedSelected() == "one-side") {
      sidePrintedDisplay = "flex";
   }
   else {
     sidePrintedDisplay = "none";
   }
   for (var i = 0; i < artworkBackSide.length; i++) {
     artworkBackSide[i].style.display = sidePrintedDisplay;
   }
 }

}
//const imageArtworkRigthSection = document.querySelectorAll(".image_artwork_rigth_section");
const inputImageArtwork = document.querySelectorAll(".input_image_artwork");
const containerBoxesArtwork = document.querySelectorAll(".container_boxes_artwork");
const artworkPHPClass = document.getElementById("artworkPHPClass");
//const clickUploadArtwork = document.querySelectorAll(".click_upload_artwork");
const artworkBackSide = document.querySelectorAll(".artworkBackSide");

const artworkClass = new Artwork();
