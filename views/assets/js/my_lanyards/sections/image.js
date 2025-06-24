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
}

const imageClass = new ImageClass();
