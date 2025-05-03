class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "block";
  }

  togglePreviewTemplateArtworkClass(action) {
    previewTemplateArtworkSection.style.display = action;
  }

  addArtworkImage(side, image, height, width) {
    const sizeApproval = this.confirmImageMeasurements(height, width);

    if (sizeApproval) {
      const targetElement = side === "left"
        ? leftSuperLanyardTemplateArtwork
        : side === "right"
        ? rightSuperLanyardTemplateArtwork
        : null;

      if (targetElement) {
        targetElement.innerHTML = `<img src="${image.src}" alt="">`;
      }
    } else {
      alert("Please re-upload the image.");
    }
  }

  confirmImageMeasurements(height, width) {
    if (artworkManualClass.getArtworkManual() !== "artwork") return true;

    const widthSelected = widthClass.getWidthSelected();

    const requiredSizes = {
      "10mm": { height: 42520, width: 945 },
      "15mm": { height: 42520, width: 1417 },
      "20mm": { height: 42520, width: 1890 },
      "25mm": { height: 42520, width: 2362 },
      "30mm": { height: 42520, width: 2835 },
    };

    const requiredSize = requiredSizes[widthSelected];

    if (requiredSize) {
      if (height === requiredSize.height && width === requiredSize.width) {
        return true;
      } else {
        alert(`The lanyard artwork image must measure ${requiredSize.height} pixels high by ${requiredSize.width} pixels wide.`);
      }
    }

    // Clear the image sections if the size is incorrect
    leftSuperLanyardTemplateArtwork.innerHTML = "";
    rightSuperLanyardTemplateArtwork.innerHTML = "";

    return false;
  }
}

const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
const leftSuperLanyardTemplateArtwork = document.getElementById("left-super-lanyard-template-artwork");
const rightSuperLanyardTemplateArtwork = document.getElementById("right-super-lanyard-template-artwork");
const centerSuperLanyardTemplateArtwork = document.getElementById("center-super-lanyard-template-artwork");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
