class ArtworkDetailsClass {
  constructor() {


  }

  showSection(action){
    section_artwork_detailss.style.display = action;
  }

}


const section_artwork_detailss = document.getElementById("section_artwork_detailss");

const artworkDetailsClass = new ArtworkDetailsClass();
