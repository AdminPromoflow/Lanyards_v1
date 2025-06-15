class CustomizeLanyard {

  constructor() {
    this.jsonLanyards = "";
    this.currentSectionOpen = 0;
    this.actionNextOrPrevious = "";
    this.currentSectionOpenArtwork = 0;

    this.initializeEventListeners();
    this.showCurrentSection(this.currentSectionOpen);
    this.changePreviewNextSection();

    material.makeAjaxRequestGetAllMaterials();
  }

  cleanValues() {
    this.currentSectionOpen = 0;
    this.currentSectionOpenArtwork = 0;

    previewTemplate.togglePreviewTemplateClass("none");
    previewAccessoriesClass.showAccessoriesPreview("none");
    previewLanyardType.showTypeLanyardPreview("none");
    previewArtworkManualClass.showArtworkManualPreview("none");
    previewMaterial.showMaterialPreview("none");
    previewColourClass.showColourPreview("none");
    artworkPreviewClass.showHidePreviewArtwork(false);
    classPreviewLogin.showLoginPreview("none");
    previewProvidedInformation.showProvidedInformationPreview('none');
    previewCheckout.showPreviewCheckout("none");
    checkoutClass.showHideBottons("none");
  }

  getLanyardsActive() {
    const lanyardType = oneTwoEndsClass.getTypeLanyardSelected();
    const width = widthClass.getWidthSelected();
    const attachment = attachmentClass.getAttachmentSelected();

    let className = '';

    if (lanyardType === 'one-end') {
      if (attachment === 'none') {
        className = `.draw-os-${width}`;
      } else {
        className = `.draw-os-wa-${width}`;
      }
    } else if (lanyardType === 'two-end') {
      className = `.draw-ts-${width}`;
    }

    return document.querySelectorAll(className);
  }

  initializeEventListeners() {
    const closeCustomizeLanyard = document.getElementById("close-customize-lanyard");
    const preview = document.getElementById("preview");
    const next = document.getElementById("next");
    const back_preview_checkout = document.getElementById("back_preview_checkout");

    if (closeCustomizeLanyard) {
      closeCustomizeLanyard.addEventListener("click", () => {
        this.openCustomizeLanyard(false);
        this.cleanValues();
      });
    }

    if (preview) {
      preview.addEventListener("click", () => this.handlePreviewClick());
    }

    if (back_preview_checkout) {
      back_preview_checkout.addEventListener("click", () => this.handlePreviewClick());
    }

    if (next) {
      next.addEventListener("click", () => this.handleNextClick());
    }
  }

  handlePreviewClick() {
    if (this.currentSectionOpen > 0) {
      this.currentSectionOpen--;
      this.actionNextOrPrevious = "preview";
      this.changePreviewNextSection();
    }
  }

  handleNextClick() {
    this.currentSectionOpen++;
    this.actionNextOrPrevious = "next";
    this.changePreviewNextSection();
  }

  getCurrentSectionOpen() {
    return this.currentSectionOpen;
  }

  setCurrentSectionOpen(newSection) {
    this.currentSectionOpen = newSection;
  }

  getCurrentSectionOpenArtwork() {
    return this.currentSectionOpenArtwork;
  }

  setCurrentSectionOpenArtwork(newSection) {
    this.currentSectionOpenArtwork = newSection;
  }

  setJsonLanyards(value) {
    this.jsonLanyards = value;
  }

  getJsonLanyards() {
    return this.jsonLanyards;
  }

  showCurrentSection(currentSection) {
    const sections = document.querySelectorAll(".section");
    sections.forEach((section, index) => {
      section.style.display = index === currentSection ? "block" : "none";
    });
  }

  openCustomizeLanyard(action) {
    const panel = document.getElementById("customize-lanyard");
    if (panel) {
      panel.style.display = action ? "block" : "none";
    }
  }

  // Métodos openX y changePreviewNextSection deben mantenerse iguales salvo que quieras otra lógica específica corregida

  setStateVisibilityPanelCustomeLanyard(value) {
    stateVisibilityPanelCustomeLanyard = value;
  }

  getStateVisibilityPanelCustomeLanyard() {
    return stateVisibilityPanelCustomeLanyard;
  }

  showNext(active) {
    next.style.display = active ? "block" : "none";
  }

  showPreview(active) {
    preview.style.display = active ? "block" : "none";
  }
}

var sections = document.querySelectorAll(".section");
var preview = document.getElementById("preview");
var next = document.getElementById("next");
var stateVisibilityPanelCustomeLanyard = false;

const customizeLanyard = new CustomizeLanyard();
