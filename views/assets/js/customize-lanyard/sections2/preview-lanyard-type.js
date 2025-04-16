class PreviewLanyardType {
  constructor() {

  }
  showSelectedPreviewTemplate(){

  }


  showTypeLanyardPreview(action){
    previewLanyardTypeContainer.style.display = action;
  }
}

const previewLanyardTypeContainer = document.getElementById("preview-lanyard-type-container");





const previewLanyardType = new PreviewLanyardType();
