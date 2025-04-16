class PreviewTemplate {
  constructor() {
    // Define the elements for preview, manual, and artwork containers and their child elements
    this.elements = {
      preview: {
        left: document.getElementById("left-super-lanyard"),
        right: document.getElementById("right-super-lanyard"),
        center: document.getElementById("center-super-lanyard"),
        container: document.getElementById("super-lanyard"),
      },
      manual: {
        left: document.getElementById("left-super-lanyard-manual"),
        right: document.getElementById("right-super-lanyard-manual"),
        center: document.getElementById("center-super-lanyard-manual"),
        container: document.getElementById("super-lanyard-manual"),
      },
      artwork: {
        left: document.getElementById("left-super-lanyard-artwork"),
        right: document.getElementById("right-super-lanyard-artwork"),
        center: document.getElementById("center-super-lanyard-artwork"),
        container: document.getElementById("super-lanyard-artwork"),
      }
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
  activateTemplate(context = "preview") {
    const type = oneTwoEndsClass.getTypeLanyardSelected(); // Get the selected lanyard type
    const width = widthClass.getWidthSelected(); // Get the selected width
    const attachment = attachmentClass.getAttachmentSelected(); // Get the selected attachment mode

    this.cleanStyle(context); // Clear any existing styles before applying new ones

    // Apply styles based on lanyard type and attachment mode
    if (type === "one-end") {
      if (attachment === "none" || attachment === "None") {
        this.applyNoAttachmentStyles(width, context); // Apply no-attachment styles
      } else {
        this.applyWithAttachmentStyles(width, context); // Apply with-attachment styles
      }
    } else if (type === "two-end") {
      this.applyTwoEndStyles(width, context); // Apply two-end styles
    }
  }

  // Removes inline styles and classes from the specified context (preview, manual, or artwork)
  cleanStyle(context = "preview") {
    const group = this.elements[context]; // Get the relevant group of elements based on context
    if (!group) return;

    // Remove inline styles from each element in the group
    Object.values(group).forEach(el => {
      if (el) el.removeAttribute("style");
    });

    // If context is 'preview', also remove all CSS classes from the left, right, and centre elements
    if (context === "preview") {
      if (group.left) group.left.className = "";
      if (group.right) group.right.className = "";
      if (group.center) group.center.className = "";
    }
  }

  // Apply styles for the "no-attachment" case based on width
  applyNoAttachmentStyles(width, context) {
    const group = this.elements[context];
    if (!group) return;

    // Add appropriate classes based on the width
    switch (width) {
      case "10mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-10mm", "right-super-lanyard-one-end-10mm", "");
        break;
      case "15mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-15mm", "right-super-lanyard-one-end-15mm", "");
        break;
      case "20mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-20mm", "right-super-lanyard-one-end-20mm", "");
        break;
      case "25mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-25mm", "right-super-lanyard-one-end-25mm", "");
        break;
      case "30mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-30mm", "right-super-lanyard-one-end-30mm", "");
        break;
      default:
        console.warn("Unrecognised width in 'no-attachment' mode:", width);
    }

    console.log(`Styles applied: no-attachment - ${width} - context: ${context}`);
  }

  // Apply styles for the "with-attachment" case based on width
  applyWithAttachmentStyles(width, context) {
    const group = this.elements[context];
    if (!group) return;

    // Add appropriate classes based on the width
    switch (width) {
      case "10mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-10mm-attachment", "right-super-lanyard-one-end-10mm-attachment", "center-super-lanyard-one-end-10mm-attachment");
        break;
      case "15mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-15mm-attachment", "right-super-lanyard-one-end-15mm-attachment", "center-super-lanyard-one-end-15mm-attachment");
        break;
      case "20mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-20mm-attachment", "right-super-lanyard-one-end-20mm-attachment", "center-super-lanyard-one-end-20mm-attachment");
        break;
      case "25mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-25mm-attachment", "right-super-lanyard-one-end-25mm-attachment", "center-super-lanyard-one-end-25mm-attachment");
        break;
      case "30mm":
        this.applyClassToGroup(group, "left-super-lanyard-one-end-30mm-attachment", "right-super-lanyard-one-end-30mm-attachment", "center-super-lanyard-one-end-30mm-attachment");
        break;
      default:
        console.warn("Unrecognised width in 'with-attachment' mode:", width);
    }

    console.log(`Styles applied: with-attachment - ${width} - context: ${context}`);
  }

  // Apply styles for the "two-end" case based on width
  applyTwoEndStyles(width, context) {
    const group = this.elements[context];
    if (!group) return;

    // Add appropriate classes for both left and right elements based on width
    switch (width) {
      case "10mm":
        this.applyClassToGroup(group, "left-super-lanyard-two-end-10mm", "right-super-lanyard-two-end-10mm", "");
        break;
      case "15mm":
        this.applyClassToGroup(group, "left-super-lanyard-two-end-15mm", "right-super-lanyard-two-end-15mm", "");
        break;
      case "20mm":
        this.applyClassToGroup(group, "left-super-lanyard-two-end-20mm", "right-super-lanyard-two-end-20mm", "");
        break;
      case "25mm":
        this.applyClassToGroup(group, "left-super-lanyard-two-end-25mm", "right-super-lanyard-two-end-25mm", "");
        break;
      case "30mm":
        this.applyClassToGroup(group, "left-super-lanyard-two-end-30mm", "right-super-lanyard-two-end-30mm", "");
        break;
      default:
        console.warn("Unrecognised width in 'two-end' mode:", width);
    }

    console.log(`Styles applied: two-end - ${width} - context: ${context}`);
  }

  // Helper function to add CSS classes to left, right, and centre elements
  applyClassToGroup(group, leftClass = "", rightClass = "", centerClass = "") {
    // Add classes to left, right, and centre if provided
    if (leftClass) group.left.classList.add(leftClass);
    if (rightClass) group.right.classList.add(rightClass);
    if (centerClass) group.center.classList.add(centerClass);
  }
}
const previewTemplate = new PreviewTemplate();
