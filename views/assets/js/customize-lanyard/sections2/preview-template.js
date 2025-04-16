class PreviewTemplate {
  constructor() {
    // Define the elements for preview, manual, and artwork containers and their child elements
    this.elements = {
        left: document.getElementById("left-super-lanyard"),
        right: document.getElementById("right-super-lanyard"),
        center: document.getElementById("center-super-lanyard"),
        container: document.getElementById("super-lanyard"),

    };

    // Store the main preview container element
    this.previewContainer = document.getElementById("preview-template-class");
  }

  // Toggles the visibility of the preview container
  togglePreviewTemplateClass(action) {

    this.previewContainer.style.display = action;
    if (action == "block") {
      this.activateTemplate();
    }
  }

  // Activates the appropriate template based on selected lanyard type, width, and attachment mode
  activateTemplate() {
    const type = oneTwoEndsClass.getTypeLanyardSelected(); // Get the selected lanyard type
    const width = widthClass.getWidthSelected(); // Get the selected width
    const attachment = attachmentClass.getAttachmentSelected(); // Get the selected attachment mode

    this.cleanStyle(); // Clear any existing styles before applying new ones

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

    // Remove inline styles from each element in the group
    Object.values(el).forEach(element => {
      if (element) {
        element.removeAttribute("style");
        element.className = "";
      }
    });

  }

  // Apply styles for the "no-attachment" case based on width
  applyNoAttachmentStyles(width) {


    // Add appropriate classes based on the width
    switch (width) {
      case "10mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-10mm", "right-super-lanyard-one-end-10mm", "");
        break;
      case "15mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-15mm", "right-super-lanyard-one-end-15mm", "");
        break;
      case "20mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-20mm", "right-super-lanyard-one-end-20mm", "");
        break;
      case "25mm":
        this.applyClassToGroup("left-super-lanyard-one-end-25mm", "right-super-lanyard-one-end-25mm", "");
        break;
      case "30mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-30mm", "right-super-lanyard-one-end-30mm", "");
        break;
      default:
        console.warn("Unrecognised width in 'no-attachment' mode:", width);
    }

    console.log(`Styles applied: no-attachment - ${width} `);
  }

  // Apply styles for the "with-attachment" case based on width
  applyWithAttachmentStyles(width) {


    // Add appropriate classes based on the width
    switch (width) {
      case "10mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-10mm-attachment", "right-super-lanyard-one-end-10mm-attachment", "center-super-lanyard-one-end-10mm-attachment");
        break;
      case "15mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-15mm-attachment", "right-super-lanyard-one-end-15mm-attachment", "center-super-lanyard-one-end-15mm-attachment");
        break;
      case "20mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-20mm-attachment", "right-super-lanyard-one-end-20mm-attachment", "center-super-lanyard-one-end-20mm-attachment");
        break;
      case "25mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-25mm-attachment", "right-super-lanyard-one-end-25mm-attachment", "center-super-lanyard-one-end-25mm-attachment");
        break;
      case "30mm":
        this.applyClassToGroup( "left-super-lanyard-one-end-30mm-attachment", "right-super-lanyard-one-end-30mm-attachment", "center-super-lanyard-one-end-30mm-attachment");
        break;
      default:
        console.warn("Unrecognised width in 'with-attachment' mode:", width);
    }

    console.log(`Styles applied: with-attachment - ${width} `);
  }

  // Apply styles for the "two-end" case based on width
  applyTwoEndStyles(width) {


    // Add appropriate classes for both left and right elements based on width
    switch (width) {
      case "10mm":
        this.applyClassToGroup( "left-super-lanyard-two-end-10mm", "right-super-lanyard-two-end-10mm", "");
        break;
      case "15mm":
        this.applyClassToGroup( "left-super-lanyard-two-end-15mm", "right-super-lanyard-two-end-15mm", "");
        break;
      case "20mm":
        this.applyClassToGroup( "left-super-lanyard-two-end-20mm", "right-super-lanyard-two-end-20mm", "");
        break;
      case "25mm":
        this.applyClassToGroup( "left-super-lanyard-two-end-25mm", "right-super-lanyard-two-end-25mm", "");
        break;
      case "30mm":
        this.applyClassToGroup( "left-super-lanyard-two-end-30mm", "right-super-lanyard-two-end-30mm", "");
        break;
      default:
        console.warn("Unrecognised width in 'two-end' mode:", width);
    }

    console.log(`Styles applied: two-end - ${width}`);
  }

  // Helper function to add CSS classes to left, right, and centre elements
  applyClassToGroup(leftClass = "", rightClass = "", centerClass = "") {
    const el = this.elements;
    // Add classes to left, right, and centre if provided
    if (leftClass) el.left.classList.add(leftClass);
    if (rightClass) el.right.classList.add(rightClass);
    if (centerClass) el.center.classList.add(centerClass);
  }
}
const previewTemplate = new PreviewTemplate();
