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
      const targetElement =
        side === "left"
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
    if (artworkManualClass.getArtworkManual() != "artwork" || artworkClass.getSRCImage() == "") return false;

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

    const expected = requiredSizes[widthSelected];

    if (expected) {
      if (height === expected.height && width === expected.width) {
        return true;
      } else {
        alert(
          `The lanyard artwork image must measure ${expected.height} pixels high by ${expected.width} pixels wide.`
        );
      }
    }

    leftSuperLanyardTemplateArtwork.innerHTML = "";
    rightSuperLanyardTemplateArtwork.innerHTML = "";

    return true;
  }
}

const previewTemplateArtworkSection = document.getElementById("preview-template-artwork-section");
const leftSuperLanyardTemplateArtwork = document.getElementById("left-super-lanyard-template-artwork");
const rightSuperLanyardTemplateArtwork = document.getElementById("right-super-lanyard-template-artwork");
const centerSuperLanyardTemplateArtwork = document.getElementById("center-super-lanyard-template-artwork");

const previewTemplateArtworkClass = new PreviewTemplateArtworkClass();
