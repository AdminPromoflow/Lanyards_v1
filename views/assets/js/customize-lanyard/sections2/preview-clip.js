class PreviewClip {
  constructor() {
    // Main container for the clip preview section
    this.previewClip = document.getElementById("preview-clip-class");

    // References to the individual clip containers
    this.centerClip = document.getElementById("center_clip");
    this.leftClip = document.getElementById("left_clip");
    this.rightClip = document.getElementById("right_clip");
  }

  // Show or hide the preview section
  togglePreviewClipClass(action) {
    this.previewClip.style.display = action;
  }

  // Main method to display selected clip based on type and width
  showPreviewSelectedClip() {
    const type = oneTwoEndsClass.getTypeLanyardSelected();
    const width = widthClass.getWidthSelected();
    const attachment = attachmentClass.getAttachmentSelected();

    this.updateClipImagesSrc();  // Update the image sources
    this.cleanStyle();           // Remove all styles and reset classes


    // Apply appropriate layout based on the lanyard type
    if (type === "one-end") {
      if (attachment != "none" || attachment != "None") {
        alert(attachment);
         this.applyOneEndAttachmentStyles(width);
      }
      else {
        alert(attachment);
        this.applyOneEndStyles(width);
      }
    } else if (type === "two-end") {
      this.applyTwoEndStyles(width);
    }
  }

  // Update <img> tags in center, left, and right clips with the selected clip image
  updateClipImagesSrc() {
    const clipSelected = clipClass.getClipSelected();
    const newSrc = "../../views/assets/img/global/customize-lanyard/sections2/clips/one-end/" + clipSelected + ".png";

    this.centerClip.querySelector("img").src = newSrc;
    this.leftClip.querySelector("img").src = newSrc;
    this.rightClip.querySelector("img").src = newSrc;
  }

  // Apply styles for "one-end" layout based on the selected width
  applyOneEndStyles(width) {
    if (!this.centerClip) return;

    // Hide left and right clips, show center
    this.leftClip.style.display = "none";
    this.rightClip.style.display = "none";
    this.centerClip.style.display = "block";

    // Add specific class for center clip depending on width
    switch (width) {
      case "10mm":
        this.centerClip.classList.add("clip_one_end_10mm");
        break;
      case "15mm":
        this.centerClip.classList.add("clip_one_end_15mm");
        break;
      case "20mm":
        this.centerClip.classList.add("clip_one_end_20mm");
        break;
      case "25mm":
        this.centerClip.classList.add("clip_one_end_25mm");
        break;
      case "30mm":
        this.centerClip.classList.add("clip_one_end_30mm");
        break;
      default:
        console.warn("Unrecognized width:", width);
    }
  }



  applyOneEndAttachmentStyles(width) {
    if (!this.centerClip) return;

    // Hide left and right clips, show center
    this.leftClip.style.display = "none";
    this.rightClip.style.display = "none";
    this.centerClip.style.display = "block";

    // Add specific class for center clip depending on width
    switch (width) {
      case "10mm":
        this.centerClip.classList.add("clip_one_end_attachment_10mm");
        break;
      case "15mm":
        this.centerClip.classList.add("clip_one_end_attachment_15mm");
        break;
      case "20mm":
        this.centerClip.classList.add("clip_one_end_attachment_20mm");
        break;
      case "25mm":
        this.centerClip.classList.add("clip_one_end_attachment_25mm");
        break;
      case "30mm":
        this.centerClip.classList.add("clip_one_end_attachment_30mm");
        break;
      default:
        console.warn("Unrecognized width:", width);
    }
  }





  // Apply styles for "two-end" layout based on the selected width
  applyTwoEndStyles(width) {
    if (!this.leftClip || !this.rightClip) return;

    // Show left and right clips, hide center
    this.leftClip.style.display = "block";
    this.rightClip.style.display = "block";
    this.centerClip.style.display = "none";

    // Add specific classes for left and right clips depending on width
    switch (width) {
      case "10mm":
        this.leftClip.classList.add("clip_two_ends_10mm_left");
        this.rightClip.classList.add("clip_two_ends_10mm_right");
        break;
      case "15mm":
        this.leftClip.classList.add("clip_two_ends_15mm_left");
        this.rightClip.classList.add("clip_two_ends_15mm_right");
        break;
      case "20mm":
        this.leftClip.classList.add("clip_two_ends_20mm_left");
        this.rightClip.classList.add("clip_two_ends_20mm_right");
        break;
      case "25mm":
        this.leftClip.classList.add("clip_two_ends_25mm_left");
        this.rightClip.classList.add("clip_two_ends_25mm_right");
        break;
      case "30mm":
        this.leftClip.classList.add("clip_two_ends_30mm_left");
        this.rightClip.classList.add("clip_two_ends_30mm_right");
        break;
      default:
        console.warn("Unrecognized width:", width);
    }
  }

  // Reset styles and classes to default values
  cleanStyle() {
    // Reset center clip style and class
    if (this.centerClip) {
      this.centerClip.removeAttribute("style");
      this.centerClip.className = "clip"; // Keeps the necessary class for CSS styles
    }

    // Reset left and right clip styles and classes
    const sideClips = [this.leftClip, this.rightClip];
    sideClips.forEach(el => {
      if (el) {
        el.removeAttribute("style");
        el.className = "clips"; // Keeps the necessary class for CSS styles
      }
    });
  }
}

// Instantiate the PreviewClip class
const previewClip = new PreviewClip();
