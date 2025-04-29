class ImageClass {
    constructor() {
      this.timesImage = 3;
      this.imageSize = 10;
      this.spaceBetweenImage = 20;
      this.imageRotation = 0;
      this.spaceAlongLanyard = 0;





      const printable_area_image = document.getElementById("printable_area_image");

      printable_area_image.addEventListener('click', function() {
        if (printable_area_image.checked) {
          previewManual.showPrintableAreaImage(true);
        } else {
          previewManual.showPrintableAreaImage(false);
        }
      });









      const decrease_space_between_image = document.getElementById("decrease_space_between_image");
      const increase_space_between_image = document.getElementById("increase_space_between_image");

      decrease_space_between_image.addEventListener("click", function(){
        if (imageClass.getSpaceBetweenImage() > 0) {
          imageClass.setSpaceBetweenImage(imageClass.getSpaceBetweenImage() - 1);
          previewManual.refreshImageLanyard();
        }

      })


      increase_space_between_image.addEventListener("click", function(){
        if (imageClass.getSpaceBetweenImage() <=220) {
          imageClass.setSpaceBetweenImage(imageClass.getSpaceBetweenImage() + 1);
          previewManual.refreshImageLanyard();

        }

      })








      const decrease_space_along_lanyard = document.getElementById("decrease_space_along_lanyard_image");
      const increase_space_along_lanyard = document.getElementById("increase_space_along_lanyard_image");
      //const spaceAlongLanyard = this.getSpaceAlongLanyard();

      decrease_space_along_lanyard.addEventListener("click", function(){
        if (imageClass.getSpaceAlongLanyard() > 0) {
          imageClass.setSpaceAlongLanyard(imageClass.getSpaceAlongLanyard() - 1);
          previewManual.modifySpaceAlongLanyardImage();
        }

      })


      increase_space_along_lanyard.addEventListener("click", function(){
        if (imageClass.getSpaceAlongLanyard() <=900) {
          imageClass.setSpaceAlongLanyard(imageClass.getSpaceAlongLanyard() + 1);
          previewManual.modifySpaceAlongLanyardImage();
        }

      })













      const repeatImageBox = document.getElementById("repeat-image-box");

      repeatImageBox.addEventListener("click", function(){
        if (imageClass.getTimesImage() <=19) {
          imageClass.setTimesImage(imageClass.getTimesImage() + 1);
          previewManual.refreshImageLanyard();

        }
      })

      const decreaseImageBox = document.getElementById("decrease-image-box");
      decreaseImageBox.addEventListener("click", function(){
        if (imageClass.getTimesImage() >=0) {

          imageClass.setTimesImage(imageClass.getTimesImage() - 1);
          previewManual.refreshImageLanyard();

        }

      })







      const increaseImageSize = document.getElementById("increase-image-size");

      increaseImageSize.addEventListener("click", function(){
        if (imageClass.getImageSize() <=100) {
          imageClass.setImageSize(imageClass.getImageSize() + 1);
          previewManual.refreshImageLanyard();
        }
      })

      const decreaseImageSize = document.getElementById("decrease-image-size");
      decreaseImageSize.addEventListener("click", function(){
        if (imageClass.getImageSize() >=0) {
          imageClass.setImageSize(imageClass.getImageSize() - 1);
          previewManual.refreshImageLanyard();
        }

      })












      const rotate_image_left = document.getElementById("rotate_image_left");
      const rotate_image_right = document.getElementById("rotate_image_right");

      rotate_image_left.addEventListener("click", function(){
          imageClass.setImageRotation(imageClass.getImageRotation() - 10);
          previewManual.refreshImageLanyard();
      })


      rotate_image_right.addEventListener("click", function(){
          imageClass.setImageRotation(imageClass.getImageRotation() + 10);
          previewManual.refreshImageLanyard();
      })

      /*  const imageInput = document.getElementById('imageUpload');

        const imageContainers = document.querySelectorAll('.imageContent');

         this.linkImage = "";
         this.sizeImage = "medium";
         this.spacingBetweenImage = "normal";
         this.rotationImage = "0deg";

        // Add an event listener to the input file element
        imageInput.addEventListener('change', function(event){
        //  const imageContainers = customizeLanyard.getLanyardsActive();

          const file = event.target.files[0]; // Captura el archivo seleccionado

            if (file && file.type.startsWith('image/')) { // Verifica que sea una imagen
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgSrc = e.target.result; // Obtiene la URL del archivo leído
                    for (var i = 0; i < imageContainers.length; i++) {
                      imageContainers[i].style.backgroundImage = 'url("'+imgSrc+'")';
                    }
                };

                reader.readAsDataURL(file); // Lee el contenido del archivo como una URL
            } else {
                alert('Por favor, selecciona un archivo de imagen.');
            }

        });
        const sizeImageBox = document.querySelectorAll(".size-image-box");

        for (let i = 0; i < sizeImageBox.length; i++) {
          sizeImageBox[i].addEventListener("click", function(){

            if (i==0) {
              previewImageClass.changeImageSize(false);
            }
            else {
              previewImageClass.changeImageSize(true);

            }
          })
        }
        const spaceBetweenImageBox = document.querySelectorAll(".space-between-image-box");

        for (let i = 0; i < spaceBetweenImageBox.length; i++) {
         spaceBetweenImageBox[i].addEventListener("click", function(){

            if (i==0) {
              previewImageClass.changeSpaceBetweenImage(false);
            }
            else {
              previewImageClass.changeSpaceBetweenImage(true);

            }
          })
        }
        const rotationImageBox = document.querySelectorAll(".rotation-image-box");

        for (let i = 0; i < rotationImageBox.length; i++) {
         rotationImageBox[i].addEventListener("click", function(){
          //alert("hiii");
            if (i==0) {
              previewImageClass.changeRotationImage(false);
            }
            else {
              previewImageClass.changeRotationImage(true);

            }
          })
        }*/
    }

    getTimesImage(){
      return this.timesImage;
    }
    setTimesImage(value) {
      this.timesImage = value;
    }

    getLinkImage() {
        return this.linkImage;
    }
    setLinkImage(value) {
      this.linkImage = value;
    }


    getImageSize() {
      return this.imageSize;
    }
    setImageSize(value) {
      this.imageSize = value;
    }

    getSpaceBetweenImage(){
      return this.spaceBetweenImage;
    }
    setSpaceBetweenImage(value){
      this.spaceBetweenImage = value;
    }

    getImageRotation() {
      return this.imageRotation;
    }

    setImageRotation(value) {
      this.imageRotation = value;
    }

    setSpaceAlongLanyard(value){
      this.spaceAlongLanyard = value;
    }
    getSpaceAlongLanyard(){
      return this.spaceAlongLanyard;
    }

        // Link image
  /*

     // Size image


     // Spacing between image
     getSpacingBetweenImage() {
       return this.spacingBetweenImage;
     }

     setSpacingBetweenImage(value) {
       this.spacingBetweenImage = value;
     }

     // Rotation image
     getRotationImage() {
       return this.rotationImage;
     }

     setRotationImage(value) {
       this.rotationImage = value;
     }*/


}

// Create an instance of ImageClass
const imageClass = new ImageClass();
