class AttachmentPreviewClass {
  constructor() {
    this.previewAttachmentClass = document.getElementById("preview-attachment-class");


    this.containerAttachmentOneEnd = document.getElementById("container-attachment-one-end");
    this.containerAttachmentTwoEnd = document.getElementById("container-attachment-two-end");




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
    //this.previewAttachmentClass.style.display = action;
    this.activateTemplate();
  }

  activateTemplate() {
    const type = oneTwoEndsClass.getTypeLanyardSelected(); // Get the selected lanyard type
    const width = widthClass.getWidthSelected(); // Get the selected width
    const attachment = attachmentClass.getAttachmentSelected(); // Get the selected attachment mode

  //  this.cleanStyle(); // Clear any existing styles before applying new ones

    // Apply styles based on lanyard type and attachment mode

    if (attachment == "none" || attachment == "None") {
      alert("1");
      this.containerAttachmentOneEnd.style.display = "none";
      this.containerAttachmentTwoEnd.style.display = "none";
    }
    else {
      if (type === "one-end") {
        alert("2");

        this.containerAttachmentOneEnd.style.display = "block";
        this.containerAttachmentTwoEnd.style.display = "none";

      }
      else if (type === "two-end") {
        alert("3");

        this.containerAttachmentOneEnd.style.display = "none";
        this.containerAttachmentTwoEnd.style.display = "block";

      }
    }


    /*if (type === "one-end") {
      if (attachment === "none" || attachment === "None") {
        this.containerAttachmentOneEnd.style.display = "none";
        this.containerAttachmentTwoEnd.style.display = "none";
      //  this.applyNoAttachmentStyles(width); // Apply no-attachment styles
      }
      else {
        this.containerAttachmentOneEnd.style.display = "block";
        this.containerAttachmentTwoEnd.style.display = "none";

        //  this.applyWithAttachmentStyles(width); // Apply with-attachment styles
      }
    } else if (type === "two-end") {
      this.containerAttachmentOneEnd.style.display = "none";
      this.containerAttachmentTwoEnd.style.display = "block";
      //this.applyTwoEndStyles(width); // Apply two-end styles
    }*/
  }



}

const attachmentPreviewClass = new AttachmentPreviewClass();
