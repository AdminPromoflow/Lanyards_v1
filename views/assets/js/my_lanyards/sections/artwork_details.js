class ArtworkDetailsClass {
  constructor() {
    back_to_my_lanyards.addEventListener("click", function(){
      myLanyardsClass.showSection("flex");
      artworkDetailsClass.showSection("none");


    })

  }

  showSection(action){
    section_artwork_details.style.display = action;
  }

}


const section_artwork_details = document.getElementById("section_artwork_details");
const back_to_my_lanyards = document.getElementById("back_to_my_lanyards");

const artworkDetailsClass = new ArtworkDetailsClass();
