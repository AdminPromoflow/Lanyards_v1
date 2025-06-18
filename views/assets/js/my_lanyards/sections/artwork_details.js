class ArtworkDetailsClass {
  constructor() {


  }

  showSection(action){
    section_artwork_details.style.display = action;
  }

}


const section_artwork_details = document.getElementById("section_artwork_details");

const artworkDetailsClass = new ArtworkDetailsClass();
