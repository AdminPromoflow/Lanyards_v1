class AttachmentPreviewClass {
  constructor() {
    this.previewAttachmentClass = document.getElementById("preview-attachment-class");

    this.containerAttachmentOneEnd = document.getElementById("container-attachment-one-end");
    this.containerAttachmentTwoEnd = document.getElementById("container-attachment-two-end");

    this.attachmentOneEnd = document.getElementById("attachment-one-end");
    this.attachmentTwoEndLeft = document.getElementById("attachment-two-end");
    this.attachmentTwoEndRight = document.getElementById("attachment-two-end");
  }

  togglePreviewAttachmentClass(action) {
    this.previewAttachmentClass.style.display = action;
    this.activateTemplate();
  }

  activateTemplate() {
    const type = oneTwoEndsClass.getTypeLanyardSelected();
    const width = widthClass.getWidthSelected();
    const attachment = attachmentClass.getAttachmentSelected();

    this.updateClipImagesSrc();
    this.cleanStyle();

    if (attachment === "none" || attachment === "None") {
      this.setAttachmentContainersDisplay("none", "none");
    } else {
      if (type === "one-end") {
        this.setAttachmentContainersDisplay("block", "none");
      } else if (type === "two-end") {
        this.setAttachmentContainersDisplay("none", "block");
      }
    }
  }

  setAttachmentContainersDisplay(oneEndDisplay, twoEndDisplay) {
    this.containerAttachmentOneEnd.style.display = oneEndDisplay;
    this.containerAttachmentTwoEnd.style.display = twoEndDisplay;
  }

  updateClipImagesSrc() {
    var attachmentSelected = attachmentClass.getAttachmentSelected();
    if (attachmentSelected == "Plastic colour") {
      attachmentSelected = "Plastic_colour";
    }
    else if (attachmentSelected == "Black") {
      attachmentSelected = "Black";

    }

    const newSrc = "../../views/assets/img/global/customize-lanyard/sections2/preview-attachment/" + attachmentSelected + ".png";

    if (attachmentSelected != "none" && attachmentSelected != "None") {
      alert(newSrc);
      this.attachmentOneEnd.querySelector("img").src = newSrc;
      this.attachmentTwoEndLeft.querySelector("img").src = newSrc;
      this.attachmentTwoEndRight.querySelector("img").src = newSrc;
    }
  }

  cleanStyle() {
    const elementsToClean = [
      this.attachmentOneEnd,
      this.attachmentTwoEndLeft,
      this.attachmentTwoEndRight
    ];

    elementsToClean.forEach(element => {
      if (element) {
        element.removeAttribute("style");
        element.className = "";  // Clears all classes
      }
    });
  }

  applyStyles(width) {
    switch (width) {
      case "10mm":
        this.applyClassToGroup("attachment-one-end-10mm", "", "");
        break;
      case "15mm":
        this.applyClassToGroup("attachment-one-end-15mm", "", "");
        break;
      case "20mm":
        this.applyClassToGroup("attachment-one-end-20mm", "", "");
        break;
      case "25mm":
        this.applyClassToGroup("attachment-one-end-25mm", "", "");
        break;
      case "30mm":
        this.applyClassToGroup("attachment-one-end-30mm", "", "");
        break;
      default:
        console.warn("Unrecognised width in 'one-end' mode:", width);
    }

    console.log(`Styles applied: one-end - ${width}`);
  }

  applyClassToGroup(attachmentOneEnd = "", attachmentTwoEndLeft = "", attachmentTwoEndRight = "") {
    if (attachmentOneEnd) {
      this.attachmentOneEnd.classList.add(attachmentOneEnd);  // Adds the class, does not replace it
    }
    if (attachmentTwoEndLeft) {
      this.attachmentTwoEndLeft.classList.add(attachmentTwoEndLeft);
    }
    if (attachmentTwoEndRight) {
      this.attachmentTwoEndRight.classList.add(attachmentTwoEndRight);
    }
  }
}

const attachmentPreviewClass = new AttachmentPreviewClass();
