class PreviewProvidedInformation {
  constructor() {
    preview_provided_information_box_2.style.display = "none";
    preview_provided_information_box[1].style.height = "80%";

  }
  showProvidedInformationPreview(action){
    const previewProvidedInformationContainer = document.getElementById("preview-provided-information-container");
    previewProvidedInformationContainer.style.display = action;
  }
  showMapProvidedInformationPreview(action){
    var height = "80%";
    if (action) {
      preview_provided_information_box_2.style.display = "block";
      height = "40%";
    }
    else {
      preview_provided_information_box_2.style.display = "none";
      height = "80%";
    }

    for (var i = 0; i < preview_provided_information_box.length; i++) {
      preview_provided_information_box[i].style.height = height;
    }
  }

}
const preview_provided_information_box = document.querySelectorAll(".preview_provided_information_box");
const preview_provided_information_box_2 = document.getElementById("preview_provided_information_box_2");
const previewProvidedInformation = new PreviewProvidedInformation();
