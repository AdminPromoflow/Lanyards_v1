class AttachmentPreviewClass {
  constructor() {
    this.previewAttachmentClass = document.getElementById("preview-attachment-class");
  }

  showSelectedPreviewTemplate() {
    const attachmentSelected = attachmentClass.getAttachmentSelected();
    const standar = document.querySelectorAll(".standar");
    const attachment = document.querySelectorAll(".attachment");
    const attachmentThing = document.querySelectorAll(".attachmentThing");

    const showElements = (elements, display) => {
      elements.forEach(el => el.style.display = display);
    };

    const setAttachmentImage = (src) => {
      attachmentThing.forEach(el => {
        el.style.display = "block";
        el.innerHTML = `<img class="imgattachment" src="${src}" alt="">`;
      });
    };

    switch (attachmentSelected) {
      case "None":
        showElements(standar, "block");
        showElements(attachment, "none");
        showElements(attachmentThing, "none");
        break;

      case "Black":
        showElements(standar, "none");
        showElements(attachment, "block");
        setAttachmentImage("../../views/assets/img/global/customize-lanyard/sections/attachment/quick-release-black.png");
        break;

      case "Plastic colour":
        showElements(standar, "none");
        showElements(attachment, "block");
        setAttachmentImage("../../views/assets/img/global/customize-lanyard/sections/attachment/quick-release-plastics-colour.png");
        break;

      case "Metal":
        showElements(standar, "none");
        showElements(attachment, "block");
        setAttachmentImage("../../views/assets/img/global/customize-lanyard/sections/attachment/quick-release-metal.png");
        break;
    }
  }
  togglePreviewAttachmentClass(action){
    this.previewAttachmentClass.style.display = action;
  }
}

const attachmentPreviewClass = new AttachmentPreviewClass();
