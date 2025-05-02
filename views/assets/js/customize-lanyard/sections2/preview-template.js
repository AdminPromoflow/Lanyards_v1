class PreviewTemplate {
  constructor() {
    // Define the elements for preview, manual, and artwork containers, along with their child elements
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

          this.artworkElements = {
            left_artwork2: document.getElementById("left-super-lanyard-artwork2"),
            right_artwork2: document.getElementById("right-super-lanyard-artwork2"),
            center_artwork2: document.getElementById("center-super-lanyard-artwork2")
          };
        });

    // Store the main preview container element
    this.previewContainer = document.getElementById("preview-template-class");
  }

  getElements() {
    return this.elements;
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

  // Activates the appropriate template based on the selected lanyard type, width, and attachment mode
  activateTemplate() {
    const type = oneTwoEndsClass.getTypeLanyardSelected(); // Retrieve the selected lanyard type
    const width = widthClass.getWidthSelected(); // Retrieve the selected width
    const attachment = attachmentClass.getAttachmentSelected(); // Retrieve the selected attachment mode

    this.cleanStyle(); // Clear any existing inline styles or classes
    this.cleanStyleManual();

    // Apply new styles based on the lanyard configuration
    if (type === "one-end") {
      if (attachment === "none" || attachment === "None") {
        this.applyNoAttachmentStyles(width); // Apply styles for lanyards without attachments
      } else {
        this.applyWithAttachmentStyles(width); // Apply styles for lanyards with attachments
      }
    } else if (type === "two-end") {
      this.applyTwoEndStyles(width); // Apply styles for two-ended lanyards
    }
  }

  // Removes any inline styles and resets classes for the preview elements
  cleanStyle() {
    const el = this.elements;

    Object.entries(el).forEach(([key, element]) => {
      if (element) {
        element.removeAttribute("style");

        if (["left", "right", "center"].includes(key)) {
          // Retain only the background-colour class
          element.className = "background-colour";
        } else {
          // Remove all CSS classes
          element.className = "";
        }
      }
    });
    backgroundClass.setBackgroundColourToLanyards();


  }

  // Clears styles and classes for the manual elements
  cleanStyleManual() {
    const elManual = this.manualElements;

    Object.entries(elManual).forEach(([key, element]) => {
      if (element) {
        element.removeAttribute("style");

        if (["left", "right", "center"].includes(key)) {
          // Retain only the background-colour class
          element.className = "background-colour";
        } else {
          // Remove all CSS classes
          element.className = "";
        }
      }
    });
  }


/*  cleanStyleArtwork() {
    const elArtwork = this.artworkElements;

    Object.entries(elArtwork).forEach(([key, element]) => {
      if (element) {
        element.removeAttribute("style");

        if (["left", "right", "center"].includes(key)) {
          // Retain only the background-colour class
          element.className = "background-colour";
        } else {
          // Remove all CSS classes
          element.className = "";
        }
      }
    });
  }*/

  // Apply styles for the "no-attachment" case based on width
  applyNoAttachmentStyles(width) {
    switch (width) {
      case "10mm":
        this.applyClassToGroup("left-super-lanyard-one-end-10mm", "right-super-lanyard-one-end-10mm", "", "top_left_clip-one-end-10mm", "top_right_clip-one-end-10mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-10mm-manual", "right-super-lanyard-one-end-10mm-manual", "center-super-lanyard-one-end-10mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-10mm-artwork", "right-super-lanyard-one-end-10mm-artwork", "center-super-lanyard-one-end-10mm-artwork");
        break;
      case "15mm":
        this.applyClassToGroup("left-super-lanyard-one-end-15mm", "right-super-lanyard-one-end-15mm", "", "top_left_clip-one-end-15mm", "top_right_clip-one-end-15mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-15mm-manual", "right-super-lanyard-one-end-15mm-manual", "center-super-lanyard-one-end-15mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-15mm-artwork", "right-super-lanyard-one-end-15mm-artwork", "center-super-lanyard-one-end-15mm-artwork");
        break;
      case "20mm":
        this.applyClassToGroup("left-super-lanyard-one-end-20mm", "right-super-lanyard-one-end-20mm", "", "top_left_clip-one-end-20mm", "top_right_clip-one-end-20mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-20mm-manual", "right-super-lanyard-one-end-20mm-manual", "center-super-lanyard-one-end-20mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-20mm-artwork", "right-super-lanyard-one-end-20mm-artwork", "center-super-lanyard-one-end-20mm-artwork");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-one-end-25mm", "right-super-lanyard-one-end-25mm", "", "top_left_clip-one-end-25mm", "top_right_clip-one-end-25mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-25mm-manual", "right-super-lanyard-one-end-25mm-manual", "center-super-lanyard-one-end-25mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-25mm-artwork", "right-super-lanyard-one-end-25mm-artwork", "center-super-lanyard-one-end-25mm-artwork");
        break;
      case "30mm":
        this.applyClassToGroup("left-super-lanyard-one-end-30mm", "right-super-lanyard-one-end-30mm", "", "top_left_clip-one-end-30mm", "top_right_clip-one-end-30mm");
        this.applyClassToManualGroup("left-super-lanyard-one-end-30mm-manual", "right-super-lanyard-one-end-30mm-manual", "center-super-lanyard-one-end-30mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-30mm-artwork", "right-super-lanyard-one-end-30mm-artwork", "center-super-lanyard-one-end-30mm-artwork");
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
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-10mm-attachment-artwork", "right-super-lanyard-one-end-10mm-attachment-artwork", "center-super-lanyard-one-end-10mm-attachment-artwork");
        break;
      case "15mm":
        this.applyClassToGroup("left-super-lanyard-one-end-15mm-attachment", "right-super-lanyard-one-end-15mm-attachment", "center-super-lanyard-one-end-15mm-attachment", "top_left_clip-one-end-15mm-attachment", "top_right_clip-one-end-15mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-15mm-attachment-manual", "right-super-lanyard-one-end-15mm-attachment-manual", "center-super-lanyard-one-end-15mm-attachment-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-15mm-attachment-artwork", "right-super-lanyard-one-end-15mm-attachment-artwork", "center-super-lanyard-one-end-15mm-attachment-artwork");
        break;
      case "20mm":
        this.applyClassToGroup("left-super-lanyard-one-end-20mm-attachment", "right-super-lanyard-one-end-20mm-attachment", "center-super-lanyard-one-end-20mm-attachment", "top_left_clip-one-end-20mm-attachment", "top_right_clip-one-end-20mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-20mm-attachment-manual", "right-super-lanyard-one-end-20mm-attachment-manual", "center-super-lanyard-one-end-20mm-attachment-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-20mm-attachment-artwork", "right-super-lanyard-one-end-20mm-attachment-artwork", "center-super-lanyard-one-end-20mm-attachment-artwork");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-one-end-25mm-attachment", "right-super-lanyard-one-end-25mm-attachment", "center-super-lanyard-one-end-25mm-attachment", "top_left_clip-one-end-25mm-attachment", "top_right_clip-one-end-25mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-25mm-attachment-manual", "right-super-lanyard-one-end-25mm-attachment-manual", "center-super-lanyard-one-end-25mm-attachment-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-one-end-25mm-attachment-artwork", "right-super-lanyard-one-end-25mm-attachment-artwork", "center-super-lanyard-one-end-25mm-attachment-artwork");
        break;
      case "30mm":
        this.applyClassToGroup("left-super-lanyard-one-end-30mm-attachment", "right-super-lanyard-one-end-30mm-attachment", "center-super-lanyard-one-end-30mm-attachment", "top_left_clip-one-end-30mm-attachment", "top_right_clip-one-end-30mm-attachment");
        this.applyClassToManualGroup("left-super-lanyard-one-end-30mm-attachment-manual", "right-super-lanyard-one-end-30mm-attachment-manual", "center-super-lanyard-one-end-30mm-attachment-manual");
        //this.applyClassToArtworkGroup("left-super-lanyard-one-end-30mm-attachment-artwork", "right-super-lanyard-one-end-30mm-attachment-artwork", "center-super-lanyard-one-end-30mm-attachment-artwork");
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
        this.applyClassToArtworkGroup("left-super-lanyard-two-end-10mm-artwork", "right-super-lanyard-two-end-10mm-artwork", "center-super-lanyard-two-end-10mm-artwork");
        break;
      case "15mm":
        this.applyClassToGroup("left-super-lanyard-two-end-15mm", "right-super-lanyard-two-end-15mm", "", "top_left_clip-two-end-15mm", "top_right_clip-two-end-15mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-15mm-manual", "right-super-lanyard-two-end-15mm-manual", "center-super-lanyard-two-end-15mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-two-end-15mm-artwork", "right-super-lanyard-two-end-15mm-artwork", "center-super-lanyard-two-end-15mm-artwork");
        break;
      case "20mm":
        this.applyClassToGroup("left-super-lanyard-two-end-20mm", "right-super-lanyard-two-end-20mm", "", "top_left_clip-two-end-20mm", "top_right_clip-two-end-20mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-20mm-manual", "right-super-lanyard-two-end-20mm-manual", "center-super-lanyard-two-end-20mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-two-end-20mm-artwork", "right-super-lanyard-two-end-20mm-artwork", "center-super-lanyard-two-end-20mm-artwork");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-two-end-25mm", "right-super-lanyard-two-end-25mm", "", "top_left_clip-two-end-25mm", "top_right_clip-two-end-25mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-25mm-manual", "right-super-lanyard-two-end-25mm-manual", "center-super-lanyard-two-end-25mm-manual");
        this.applyClassToArtworkGroup("left-super-lanyard-two-end-25mm-artwork", "right-super-lanyard-two-end-25mm-artwork", "center-super-lanyard-two-end-25mm-artwork");
        break;
      case "30mm":
        this.applyClassToGroup("left-super-lanyard-two-end-30mm", "right-super-lanyard-two-end-30mm", "", "top_left_clip-two-end-30mm", "top_right_clip-two-end-30mm");
        this.applyClassToManualGroup("left-super-lanyard-two-end-30mm-manual", "right-super-lanyard-two-end-30mm-manual", "center-super-lanyard-two-end-30mm-manual");
        this.applyClassToArtworkManualGroup("left-super-lanyard-two-end-30mm-artwork", "right-super-lanyard-two-end-30mm-artwork", "center-super-lanyard-two-end-30mm-artwork");
        break;
      default:
        console.warn("Unrecognised width in 'two-end' mode:", width);
    }

    console.log(`Styles applied: two-end - ${width}`);
  }

  // Helper method to apply CSS classes to the main lanyard parts (left, right, centre, and clips)
  applyClassToGroup(leftClass = "", rightClass = "", centerClass = "", topLeftClip = "", topRightClip = "") {
    const el = this.elements;

    // Apply CSS classes if specified
    if (leftClass) el.left.classList.add(leftClass);
    if (rightClass) el.right.classList.add(rightClass);
    if (centerClass) el.center.classList.add(centerClass);
    if (topLeftClip) el.top_left_clip.classList.add(topLeftClip);
    if (topRightClip) el.top_right_clip.classList.add(topRightClip);
  }

  // Helper method to apply CSS classes to the manual preview lanyard parts
  applyClassToManualGroup(leftClass = "", rightClass = "", centerClass = "") {
    const el = this.manualElements;

    if (leftClass) el.left_manual.classList.add(leftClass);
    if (rightClass) el.right_manual.classList.add(rightClass);
    if (centerClass) el.center_manual.classList.add(centerClass);
  }

  applyClassToArtworkGroup(leftClass = "", rightClass = "", centerClass = "") {
    const el = this.artworkElements;

    if (leftClass) el.left_artwork2.classList.add(leftClass);
    if (rightClass) el.right_artwork2.classList.add(rightClass);
    if (centerClass) el.center_artwork2.classList.add(centerClass);
  }
}

const previewTemplate = new PreviewTemplate();
