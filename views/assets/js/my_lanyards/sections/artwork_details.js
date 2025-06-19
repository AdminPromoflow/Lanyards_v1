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
  manageLanyardDataJob(data){
    //alert(JSON.stringify(data));
    const  my_lanyards_left_side = document.getElementById('my_lanyards_left_side');
    const  my_lanyards_right_side = document.getElementById('my_lanyards_right_side');

    const descriptionObj = JSON.parse(data.description);

    if (descriptionObj.width.value == "10mm") {
      my_lanyards_left_side.style.height = "0.48cm";
      my_lanyards_right_side.style.height = "0.48cm";
    }
    else if (descriptionObj.width.value == "15mm") {
      my_lanyards_left_side.style.height = "0.72cm";
      my_lanyards_right_side.style.height = "0.72cm";
    }
    else if (descriptionObj.width.value == "20mm") {
      my_lanyards_left_side.style.height = "0.96cm";
      my_lanyards_right_side.style.height = "0.96cm";
    }
    else if (descriptionObj.width.value == "25mm") {
      my_lanyards_left_side.style.height = "1.2cm";
      my_lanyards_right_side.style.height = "1.2cm";
    }
    else if (descriptionObj.width.value == "30mm") {
      my_lanyards_left_side.style.height = "1.44cm";
      my_lanyards_right_side.style.height = "1.44cm";
    }
  }
  manageLanyardArtwork(artwork){
    alert(JSON.stringify(artwork));
  }
  manageLanyardText(text){

  }
  manageLanyardImage(image){

  }

}


const section_artwork_details = document.getElementById("section_artwork_details");
const back_to_my_lanyards = document.getElementById("back_to_my_lanyards");

const artworkDetailsClass = new ArtworkDetailsClass();
