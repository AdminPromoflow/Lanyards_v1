class PreviewTemplateArtworkClass {
  constructor() {
    previewTemplateArtworkSection.style.display = "block";
  }

  togglePreviewTemplateArtworkClass(action) {
    previewTemplateArtworkSection.style.display = action;
  }

  addArtworkImage(side, image) {
    const sizeApproval = this.confirmImageMessures();

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

  confirmImageMessures() {
    if (artworkManualClass.getArtworkManual() !== "artwork") return true;

    const height = artworkClass.getHeightImage();
    const width = artworkClass.getWidthImage();
    const widthSelected = widthClass.getWidthSelected();

    const requiredSizes = {
      "10mm": { height: 42520, width: 945 },
      "15mm": { height: 42520, width: 1417 },
      "20mm": { height: 42520, width: 1890 },
      "25mm": { height: 42520, width: 2362 },
      "30mm": { height: 42520, width: 2835 },
    };

    const required = requiredSizes[widthSelected];

    if (required) {
      if (height === required.height && width === required.width) {
        return true;
      } else {
        alert(`The lanyard artwork image must measure ${required.height} pixels high by ${required.width} pixels wide.`);
      }
    }

    // Limpiar los lados si no es válido
    leftSuperLanyardTemplateArtwork.innerHTML = "";
    rightSuperLanyardTemplateArtwork.innerHTML = "";

    return false;
  }
}
