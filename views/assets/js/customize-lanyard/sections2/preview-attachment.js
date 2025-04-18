class AttachmentPreviewClass {
  constructor() {
    this.previewAttachmentClass = document.getElementById("preview-attachment-class");

    this.containerAttachmentOneEnd = document.getElementById("container-attachment-one-end");
    this.containerAttachmentTwoEnd = document.getElementById("container-attachment-two-end");

    this.attachmentOneEnd = document.getElementById("attachment-one-end");
    this.attachmentTwoEndLeft = document.getElementById("attachment-two-end-left");
    this.attachmentTwoEndRight = document.getElementById("attachment-two-end-right");
  }







  togglePreviewAttachmentClass(action){
    this.previewAttachmentClass.style.display = action;
    this.activateTemplate();
  }

  activateTemplate() {
    const type = oneTwoEndsClass.getTypeLanyardSelected(); // Get the selected lanyard type
    const width = widthClass.getWidthSelected(); // Get the selected width
    const attachment = attachmentClass.getAttachmentSelected(); // Get the selected attachment mode

    this.updateClipImagesSrc();
    this.cleanStyle(); // Clear any existing styles before applying new ones

    // Apply styles based on lanyard type and attachment mode

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
    const newSrc = "../../views/assets/img/global/customize-lanyard/sections2/preview-attachment/" + attachmentSelected + ".png";

    if (attachmentSelected != "none" && attachmentSelected != "None") {
      this.attachmentOneEnd.querySelector("img").src = newSrc;
      this.attachmentTwoEndLeft.querySelector("img").src = newSrc;
      this.attachmentTwoEndRight.querySelector("img").src = newSrc;
    }
  }
  cleanStyle() {
    // Clean styles and class names for specific elements
    const elementsToClean = [
      this.attachmentOneEnd,
      this.attachmentTwoEndLeft,
      this.attachmentTwoEndRight
    ];

    elementsToClean.forEach(element => {
      if (element) {
        element.removeAttribute("style"); // Remove inline styles
        element.className = "";            // Remove all classes
      }
    });
  }

  applyStyles(width) {
    // Reset all class assignments for this mode
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
        console.warn("Unrecognised width in 'two-end' mode:", width);
    }

    console.log(`Styles applied: two-end - ${width}`);
  }
  applyClassToGroup(attachmentOneEnd = "", attachmentTwoEndLeft = "", attachmentTwoEndRight = "") {
    const el = [
      this.attachmentOneEnd,
      this.attachmentTwoEndLeft,
      this.attachmentTwoEndRight
    ];

    // Añadir clases a los elementos si los parámetros no están vacíos
    if (attachmentOneEnd) el[0].classList.add(attachmentOneEnd);
    if (attachmentTwoEndLeft) el[1].classList.add(attachmentTwoEndLeft);
    if (attachmentTwoEndRight) el[2].classList.add(attachmentTwoEndRight);
  }








}

const attachmentPreviewClass = new AttachmentPreviewClass();
