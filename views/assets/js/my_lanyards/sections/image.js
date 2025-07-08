class ImageClass {
    constructor() {
      this.timesImage = 3;
      this.imageSize = 10;
      this.spaceBetweenImage = 50;
      this.imageRotation = 0;
      this.spaceAlongLanyard = 0;
      this.printableArea = false;
      this.linkImage = "";
      this.imagePosition = 0;
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

    setImagePosition(value){
      this.imagePosition = value;
    }
    getImagePosition(){
      return this.imagePosition;
    }




    refreshImageLanyard() {
      alert("Buenas");
      this.uploadImage();
      this.addImageLanyard();
      this.modifyImagePosition();
      this.modifySpaceBetweenImage();
      this.modifyImageSize();
      this.modifyImageRotation();
      this.centerImageLanyard();
      this.modifySpaceAlongLanyardImage();

    }

    addImageLanyard() {

      // Obtener los elementos del DOM
      this.image_lanyard_left = document.getElementById("img_lanyard_left");
      this.image_lanyard_right = document.getElementById("img_lanyard_right");

      // Obtener el contenido y el número de repeticiones
      const times = this.getTimesImage();

      const link = this.getLinkImage();
    //  const timestamp = Date.now(); // genera un número único (como filemtime)
    //link  const versionedLink = link + '?v=' + timestamp;

      // Iterar sobre los elementos izquierdo y derecho
      [this.image_lanyard_left, this.image_lanyard_right].forEach((el, index) => {
        if (el) {
          // Limpiar el contenido previo
          el.innerHTML = "";

          // Crear el HTML repetido
          const contentHTML = Array(times).fill(`
            <div class="wrap_img_${index}">
              <img src="${link}" alt="">
            </div>
          `).join('');

          // Agregar divs de padding antes y después
          const fullHTML = `
            <div class="padding_image_top"></div>
            ${contentHTML}
            <div class="padding_image_bottom"></div>
          `;

          // Asignar el HTML al elemento
          el.innerHTML = fullHTML;
        }
      });
    }



    modifyImagePosition(){
      const image_lanyard_left = document.getElementById("img_lanyard_left");
      const image_lanyard_right = document.getElementById("img_lanyard_right");


      image_lanyard_left.style.top = -50 +  this.getImagePosition() + "%";
      image_lanyard_right.style.top = -50 - this.getImagePosition() + "%";
    }

    modifySpaceAlongLanyardImage() {
      const padding_image_top = document.querySelectorAll(".padding_image_top");
      const padding_image_bottom = document.querySelectorAll(".padding_image_bottom");



      for (let i = 0; i < padding_image_top.length; i++) {
        padding_image_top[i].style.height = this.getSpaceAlongLanyard() + "px";
        padding_image_bottom[i].style.height = this.getSpaceAlongLanyard() + "px";


      //  padding_image_top[i].style.background = backgroundClass.getBackground() ;
      //  padding_image_bottom[i].style.background = backgroundClass.getBackground();

      }
    }

    centerImageLanyard(){
      const image_lanyard_left = document.getElementById("img_lanyard_left");
      const wrapElements = document.querySelectorAll('.wrap_img_0, .wrap_img_1');


      // Iterar sobre los elementos .wrap_text_0 y .wrap_text_1
      for (let i = 0; i < wrapElements.length; i++) {
        // Obtener el ancho de text_lanyard_right
        const rightWidth = image_lanyard_left.offsetWidth;


        // Calcular y establecer la propiedad 'left'
        //wrapElements[i].style.left = `${rightWidth / 2}px`; // Convertir a px para unidades correctas
        //wrapElements[i].style.height = `${rightWidth / 2}px`; // Convertir a px para unidades correctas

        // Calcular y establecer la propiedad 'transform' para rotar y ajustar la posición
        wrapElements[i].style.left = "50%";

        wrapElements[i].style.transform = `translateX(-50%)`;
      }
    }

    modifyImageSize(){
      const wrapElements = document.querySelectorAll('.wrap_img_0, .wrap_img_1');
      const size = this.getImageSize();
      for (let i = 0; i < wrapElements.length; i++) {
        wrapElements[i].style.width = size + "px";
        wrapElements[i].style.height = size + "px";
      }
    }

    modifySpaceBetweenImage(){
      const image_lanyard_left = document.getElementById("img_lanyard_left");
      const image_lanyard_right = document.getElementById("img_lanyard_right");

      image_lanyard_left.style.gap = this.getSpaceBetweenImage() + "px";
      image_lanyard_right.style.gap = this.getSpaceBetweenImage() + "px";
    }

    modifyImageRotation(){
      const wrapElementLeft = document.querySelectorAll('.wrap_img_0 img');
      const wrapElementRight = document.querySelectorAll('.wrap_img_1 img');

      var rotation0 = this.getImageRotation();
      var rotation1 =  180 + rotation0;


      for (var i = 0; i < wrapElementLeft.length; i++) {
        wrapElementLeft[i].style.transform = " translateY(-50%) rotate(" + rotation0 + "deg)"
        wrapElementRight[i].style.transform = "translateY(-50%) rotate(" + rotation1 + "deg) scale(-1, -1)"
      }
    }

    uploadImage() {
      const wrapElements = document.querySelectorAll('.wrap_img_0 img, .wrap_img_1 img');
      const link = this.getLinkImage();

      alert(link);


      if (!link) {
        console.error('Unable to retrieve the image link.');
        return;
      }

      const timestamp = Date.now();
      const versionedLink =  link + '?v=' + timestamp;


      let allAssigned = true;

      wrapElements.forEach(img => {
        img.src =  versionedLink;

        // Check whether the assignment was successful
        if (!img.src.includes(link)) {
          console.log('The image could not be displayed properly. Please try with a different image.');
          allAssigned = false;
        }
      });

      if (allAssigned) {
        console.log('✅ Image successfully assigned to all elements.');
      } else {
        console.warn('⚠️ Some images were not correctly assigned.');
      }
    }
}
