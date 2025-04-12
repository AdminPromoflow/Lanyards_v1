class PreviewTemplate {
  constructor() {

  }
  togglePreviewTemplateClass(action){
    previewTemplateClass.style.display = action;
  }
}

const previewTemplateClass = document.getElementById("preview-template-class");
const previewTemplate = new PreviewTemplate();
