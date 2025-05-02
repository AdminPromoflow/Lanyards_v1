class Artwork {
  constructor() {
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

        var file = event.target.files[0]; // Captura el primer archivo seleccionado
        console.log('Archivo seleccionado:', file);

        if (file && file.type.startsWith('image/')) { // Verifica que sea una imagen
            var reader = new FileReader();

            reader.onload = function(e) {
                console.log('Archivo leído:', e.target.result);
                var img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                  artworkPreviewClass.uploadArtworkManual("left", img.src);
                  previewTemplateArtworkClass.addArtworkImage("left", img.src);

                };
            };

            reader.readAsDataURL(file); // Lee el contenido del archivo como una URL
        } else {
            alert('Por favor, selecciona un archivo de imagen.');
        }
    });



    const upload_file_artwork_right = document.getElementById("upload_file_artwork_right");

    upload_file_artwork_right.addEventListener('change', function(event) {

        var file = event.target.files[0]; // Captura el primer archivo seleccionado
        console.log('Archivo seleccionado:', file);

        if (file && file.type.startsWith('image/')) { // Verifica que sea una imagen
            var reader = new FileReader();

            reader.onload = function(e) {
                console.log('Archivo leído:', e.target.result);
                var img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                  artworkPreviewClass.uploadArtworkManual("right", img.src);
                  previewTemplateArtworkClass.addArtworkImage("right", img.src);

                };
            };

            reader.readAsDataURL(file); // Lee el contenido del archivo como una URL
        } else {
            alert('Por favor, selecciona un archivo de imagen.');
        }
    });
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
