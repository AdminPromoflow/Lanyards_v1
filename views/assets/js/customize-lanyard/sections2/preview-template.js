class PreviewTemplate {
  constructor() {
    // Define the elements for preview, manual, and artwork containers and their child elements
    document.addEventListener("DOMContentLoaded", () => {
          this.elements = {
            left: document.getElementById("left-super-lanyard"),
            right: document.getElementById("right-super-lanyard"),
            center: document.getElementById("center-super-lanyard"),
            container: document.getElementById("super-lanyard"),
            top_left_clip: document.getElementById("top_left_clip"),
            top_right_clip: document.getElementById("top_right_clip")
          };

          this.manualElements = {
            left_manual: document.getElementById("left-super-lanyard-manual"),
            right_manual: document.getElementById("right-super-lanyard-manual"),
            center_manual: document.getElementById("center-super-lanyard-manual")
          };
        });


    // Store the main preview container element
    this.previewContainer = document.getElementById("preview-template-class");
  }

  // Toggles the visibility of the preview container
  togglePreviewTemplateClass(action) {

    this.previewContainer.style.display = action;
    if (action == "block") {
      this.activateTemplate();
    }

    previewClip.togglePreviewClipClass(action);
    attachmentPreviewClass.togglePreviewAttachmentClass(action);

    var artworkManualSelected = artworkManualClass.getArtworkManual();

    if (artworkManualSelected == "manual") {
      previewManual.togglePreviewManualClass(action);
      //previewArtwork.togglePreviewManualClass("none");

    }
    else if (artworkManualSelected == "artwork") {
      //previewArtwork.togglePreviewManualClass(action);
      previewManual.togglePreviewManualClass("none");

    }

  }

  // Activates the appropriate template based on selected lanyard type, width, and attachment mode
  activateTemplate() {
    const type = oneTwoEndsClass.getTypeLanyardSelected(); // Get the selected lanyard type
    const width = widthClass.getWidthSelected(); // Get the selected width
    const attachment = attachmentClass.getAttachmentSelected(); // Get the selected attachment mode

    this.cleanStyle(); // Clear any existing styles before applying new ones
    this.cleanStyleManual();
    // Apply styles based on lanyard type and attachment mode
    if (type === "one-end") {
      if (attachment === "none" || attachment === "None") {
        this.applyNoAttachmentStyles(width); // Apply no-attachment styles
      } else {
        this.applyWithAttachmentStyles(width); // Apply with-attachment styles
      }
    } else if (type === "two-end") {
      this.applyTwoEndStyles(width); // Apply two-end styles
    }
  }

  // Removes inline styles and classes from the specified context (preview, manual, or artwork)
  cleanStyle() {
    const el = this.elements;

    Object.entries(el).forEach(([key, element]) => {
      if (element) {
        element.removeAttribute("style");

        if (["left", "right", "center"].includes(key)) {
          // Conservar solo la clase 'background-colour'
          element.className = "background-colour";
        } else {
          // Eliminar todas las clases
          element.className = "";
        }
      }
    });
  }
  cleanStyleManual() {
    const elManual = this.manualElements;

    Object.values(elManual).forEach(element => {
      if (element) {
        element.removeAttribute("style");
        element.className = "";
      }
    });
  }





  // Apply styles for the "no-attachment" case based on width
  applyNoAttachmentStyles(width) {
    switch (width) {
      case "10mm":
        this.applyClassToGroup("left-super-lanyard-one-end-10mm", "right-super-lanyard-one-end-10mm", "", "top_left_clip-one-end-10mm", "top_right_clip-one-end-10mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-10mm-manual", "right-super-lanyard-one-end-10mm-manual", "center-super-lanyard-one-end-10mm-manual");
        break;
      case "15mm":
        this.applyClassToGroup("left-super-lanyard-one-end-15mm", "right-super-lanyard-one-end-15mm", "", "top_left_clip-one-end-15mm", "top_right_clip-one-end-15mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-15mm-manual", "right-super-lanyard-one-end-15mm-manual", "center-super-lanyard-one-end-15mm-manual");
        break;
      case "20mm":
        this.applyClassToGroup("left-super-lanyard-one-end-20mm", "right-super-lanyard-one-end-20mm", "", "top_left_clip-one-end-20mm", "top_right_clip-one-end-20mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-20mm-manual", "right-super-lanyard-one-end-20mm-manual", "center-super-lanyard-one-end-20mm-manual");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-one-end-25mm", "right-super-lanyard-one-end-25mm", "", "top_left_clip-one-end-25mm", "top_right_clip-one-end-25mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-25mm-manual", "right-super-lanyard-one-end-25mm-manual", "center-super-lanyard-one-end-25mm-manual");
        break;
      case "30mm":
        this.applyClassToGroup("left-super-lanyard-one-end-30mm", "right-super-lanyard-one-end-30mm", "", "top_left_clip-one-end-30mm", "top_right_clip-one-end-30mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-30mm-manual", "right-super-lanyard-one-end-30mm-manual", "center-super-lanyard-one-end-30mm-manual");
        break;
      default:
        console.warn("Unrecognised width in 'no-attachment' mode:", width);
    }

    console.log(`Styles applied: no-attachment - ${width}`);
  }


  // Apply styles for the "with-attachment" case based on width
  applyWithAttachmentStyles(width) {
    switch (width) {
      case "10mm":
        this.applyClassToGroup("left-super-lanyard-one-end-10mm-attachment", "right-super-lanyard-one-end-10mm-attachment", "center-super-lanyard-one-end-10mm-attachment", "top_left_clip-one-end-10mm-attachment", "top_right_clip-one-end-10mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-10mm-attachment-manual", "right-super-lanyard-one-end-10mm-attachment-manual", "center-super-lanyard-one-end-10mm-attachment-manual");
        break;
      case "15mm":
        this.applyClassToGroup("left-super-lanyard-one-end-15mm-attachment", "right-super-lanyard-one-end-15mm-attachment", "center-super-lanyard-one-end-15mm-attachment", "top_left_clip-one-end-15mm-attachment", "top_right_clip-one-end-15mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-15mm-attachment-manual", "right-super-lanyard-one-end-15mm-attachment-manual", "center-super-lanyard-one-end-15mm-attachment-manual");
        break;
      case "20mm":
        this.applyClassToGroup("left-super-lanyard-one-end-20mm-attachment", "right-super-lanyard-one-end-20mm-attachment", "center-super-lanyard-one-end-20mm-attachment", "top_left_clip-one-end-20mm-attachment", "top_right_clip-one-end-20mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-20mm-attachment-manual", "right-super-lanyard-one-end-20mm-attachment-manual", "center-super-lanyard-one-end-20mm-attachment-manual");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-one-end-25mm-attachment", "right-super-lanyard-one-end-25mm-attachment", "center-super-lanyard-one-end-25mm-attachment", "top_left_clip-one-end-25mm-attachment", "top_right_clip-one-end-25mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-25mm-attachment-manual", "right-super-lanyard-one-end-25mm-attachment-manual", "center-super-lanyard-one-end-25mm-attachment-manual");
        break;
      case "30mm":
        this.applyClassToGroup("left-super-lanyard-one-end-30mm-attachment", "right-super-lanyard-one-end-30mm-attachment", "center-super-lanyard-one-end-30mm-attachment", "top_left_clip-one-end-30mm-attachment", "top_right_clip-one-end-30mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-30mm-attachment-manual", "right-super-lanyard-one-end-30mm-attachment-manual", "center-super-lanyard-one-end-30mm-attachment-manual");
        break;
      default:
        console.warn("Unrecognised width in 'with-attachment' mode:", width);
    }

    console.log(`Styles applied: with-attachment - ${width}`);
  }


  // Apply styles for the "two-end" case based on width
  applyTwoEndStyles(width) {
    switch (width) {
      case "10mm":
        this.applyClassToGroup("left-super-lanyard-two-end-10mm", "right-super-lanyard-two-end-10mm", "", "top_left_clip-two-end-10mm", "top_right_clip-two-end-10mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-10mm-manual", "right-super-lanyard-two-end-10mm-manual", "center-super-lanyard-two-end-10mm-manual");
        break;
      case "15mm":
        this.applyClassToGroup("left-super-lanyard-two-end-15mm", "right-super-lanyard-two-end-15mm", "", "top_left_clip-two-end-15mm", "top_right_clip-two-end-15mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-15mm-manual", "right-super-lanyard-two-end-15mm-manual", "center-super-lanyard-two-end-15mm-manual");
        break;
      case "20mm":
        this.applyClassToGroup("left-super-lanyard-two-end-20mm", "right-super-lanyard-two-end-20mm", "", "top_left_clip-two-end-20mm", "top_right_clip-two-end-20mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-20mm-manual", "right-super-lanyard-two-end-20mm-manual", "center-super-lanyard-two-end-20mm-manual");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-two-end-25mm", "right-super-lanyard-two-end-25mm", "", "top_left_clip-two-end-25mm", "top_right_clip-two-end-25mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-25mm-manual", "right-super-lanyard-two-end-25mm-manual", "center-super-lanyard-two-end-25mm-manual");
        break;
      case "30mm":
        this.applyClassToGroup("left-super-lanyard-two-end-30mm", "right-super-lanyard-two-end-30mm", "", "top_left_clip-two-end-30mm", "top_right_clip-two-end-30mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-30mm-manual", "right-super-lanyard-two-end-30mm-manual", "center-super-lanyard-two-end-30mm-manual");
        break;
      default:
        console.warn("Unrecognised width in 'two-end' mode:", width);
    }

    console.log(`Styles applied: two-end - ${width}`);
  }


  // Helper function to add CSS classes to left, right, and centre elements
  applyClassToGroup(leftClass = "", rightClass = "", centerClass = "", topLeftClip = "", topRightClip = "") {
    const el = this.elements;

    // Add classes to left, right, center, top-left, and top-right if provided
    if (leftClass) el.left.classList.add(leftClass);
    if (rightClass) el.right.classList.add(rightClass);
    if (centerClass) el.center.classList.add(centerClass);
    if (topLeftClip) el.top_left_clip.classList.add(topLeftClip);
    if (topRightClip) el.top_right_clip.classList.add(topRightClip);
  }
  applyClassToManualGroup(leftClass = "", rightClass = "", centerClass = "") {
    const el = this.manualElements;


    if (leftClass) el.left_manual.classList.add(leftClass);
    if (rightClass) el.right_manual.classList.add(rightClass);
    if (centerClass) el.center_manual.classList.add(centerClass);
  }

}
const previewTemplate = new PreviewTemplate();
