class CustomizeLanyard {
  constructor() {
    this.jsonLanyards = "";
    this.currentSectionOpen = 0;
    this.actionNextOrPrevious = "";
    this.currentSectionOpenArtwork = 0;

    // Suponiendo que closeCustomizeLanyard, preview y next están definidos en el contexto global
    this.initializeEventListeners();
    this.showCurrentSection(this.currentSectionOpen);
    this.changePreviewNextSection();
  //  this.getLanyardsActive();

  // Make an AJAX request to fetch all materials.
  material.makeAjaxRequestGetAllMaterials();
  }
  cleanValues(){
    this.currentSectionOpen = 0;
    this.currentSectionOpenArtwork = 0;
  }


  getLanyardsActive(){
    var lanyardActive;

    var lanyardType = oneTwoEndsClass.getTypeLanyardSelected();
    var width = widthClass.getWidthSelected();
    var attachment = attachmentClass.getAttachmentSelected();

    if (lanyardType == 'one-end' && width == '10mm' && attachment == 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-10mm');

    }

    else if (lanyardType == 'one-end' && width == '15mm' && attachment == 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-15mm');

    }
    else if (lanyardType == 'one-end' && width == '20mm' && attachment == 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-20mm');

    }
    else if (lanyardType == 'one-end' && width == '25mm' && attachment == 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-25mm');

    }
    else if (lanyardType == 'one-end' && width == '30mm' && attachment == 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-30mm');

    }

    else if (lanyardType == 'two-end' && width == '10mm') {
      lanyardActive = document.querySelectorAll('.draw-ts-10mm');

    }
    else if (lanyardType == 'two-end' && width == '15mm') {
      lanyardActive = document.querySelectorAll('.draw-ts-15mm');

    }
    else if (lanyardType == 'two-end' && width == '20mm') {
      lanyardActive = document.querySelectorAll('.draw-ts-20mm');

    }
    else if (lanyardType == 'two-end' && width == '25mm') {
      lanyardActive = document.querySelectorAll('.draw-ts-25mm');

    }
    else if (lanyardType == 'two-end' && width == '30mm') {
      lanyardActive = document.querySelectorAll('.draw-ts-30mm');

    }
    else if (lanyardType == 'one-end' && width == '10mm' && attachment != 'none') {
     lanyardActive = document.querySelectorAll('.draw-os-wa-10mm');

    }

    else if (lanyardType == 'one-end' && width == '15mm' && attachment != 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-wa-15mm');

    }
    else if (lanyardType == 'one-end' && width == '20mm' && attachment != 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-wa-20mm');

    }
    else if (lanyardType == 'one-end' && width == '25mm' && attachment != 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-wa-25mm');

    }
    else if (lanyardType == 'one-end' && width == '30mm' && attachment != 'none') {
      lanyardActive = document.querySelectorAll('.draw-os-wa-30mm');

    }

    return lanyardActive;
  }


  initializeEventListeners() {
    const closeCustomizeLanyard = document.getElementById("close-customize-lanyard");
    const preview = document.getElementById("preview");
    const next = document.getElementById("next");

    if (closeCustomizeLanyard) {
      closeCustomizeLanyard.addEventListener("click", () => {
        this.openCustomizeLanyard(false);
        this.cleanValues();
      });
    }

    if (preview) {
      preview.addEventListener("click", () => this.handlePreviewClick());
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
    const customizeLanyardPanel = document.getElementById("customize-lanyard");
    if (customizeLanyardPanel) {
      customizeLanyardPanel.style.display = action ? "block" : "none";
    }
  }

  changePreviewNextSection() {


   if (this.currentSectionOpen == 0) {//Material

     this.openMaterial();
   }
   else if (this.currentSectionOpen == 1) { // Lanyard type
     this.openLanyardType();
   }
   else if (this.currentSectionOpen == 2) { // Width
     this.openWidth();
   }
   else if (this.currentSectionOpen == 3) { // SidePrinted
     this.openSidePrinted();
   }
   else if (this.currentSectionOpen == 4) { // Clip
     this.openClips();
   }
   else if (this.currentSectionOpen == 5) {// Attachment
     this.openAttachment();
   }
   else if (this.currentSectionOpen == 6) {// Attachment
     this.openAccessories();
   }
   else if (this.currentSectionOpen == 7) {//Colour Quantity
     this.openColourQuantity();
   }
   else if (this.currentSectionOpen == 8) {//Artwork - Manual

     this.openArtWorkManual();
     this.setCurrentSectionOpenArtwork(0);

   }

   else if (this.currentSectionOpen == 9) {

     if (artworkManualClass.getArtworkManual() == "manual"){
       this.openBackgroundColour();
    }
    else {
      if (this.getCurrentSectionOpenArtwork() == 0) {
        if (this.actionNextOrPrevious == "next") {
          this.setCurrentSectionOpenArtwork(1);
          this.openBackgroundColour();
          this.setCurrentSectionOpen(8);
        }
        else if (this.actionNextOrPrevious == "preview") {

        }

      }
       else if (this.getCurrentSectionOpenArtwork() == 1){
         if (this.actionNextOrPrevious == "next") {
           this.setCurrentSectionOpen(16);
            this.openArtwork();
         }
         else if(this.actionNextOrPrevious == "preview"){
         }

      }

    }
   }

   else if (this.currentSectionOpen == 10) {

     if (artworkManualClass.getArtworkManual() == "manual"){
       //this.openArtWorkManual();
       //artworkManualClass.containerBoxesArtworkManual()
        this.openText();
      //  artworkManualClass.containerBoxesArtworkManual();

    }
    else {

      this.openArtworkFinal();
    }
   }

   else if (this.currentSectionOpen == 11) {

     if (artworkManualClass.getArtworkManual() == "manual"){
       //this.openText();
    this.openImage();
  //  artworkManualClass.containerBoxesArtworkManual();
    }
    else {


        this.setCurrentSectionOpen(16);
        this.openArtwork();

    }
   }

   else if (this.currentSectionOpen == 12) {

       //this.openText();
    this.openArtworkFinal();
  //  artworkManualClass.containerBoxesArtworkManual();
   }
   else if (this.currentSectionOpen == 13) {
     if (!menuClass.getActiveSession()) {
       this.openLogin();
     }
     else if (menuClass.getActiveSession() && this.actionNextOrPrevious == "preview") {
      this.setCurrentSectionOpen(12);
      this.openArtworkFinal();
     }
     else if (!menuClass.getActiveSession() && this.actionNextOrPrevious == "preview") {
       this.setCurrentSectionOpen(9);
       this.openArtwork();
     }
     else {
       this.setCurrentSectionOpen(14);
       this.openProvidedInformation();
     }

    }
   else if (this.currentSectionOpen == 14) {
     this.openProvidedInformation();

   }
   else if (this.currentSectionOpen == 15) {

     if (artworkManualClass.getArtworkManual() == "manual"){
       //this.openText();
    this.openCheckout();
  //  artworkManualClass.containerBoxesArtworkManual();
    }
    else {
      if (this.actionNextOrPrevious == "preview") {
        //this.setCurrentSectionOpenArtwork(1);
        this.setCurrentSectionOpen(9);

        this.openBackgroundColour();
      }
      if (this.actionNextOrPrevious == "next") {
        this.setCurrentSectionOpen(15);
        this.openCheckout();
      }
    }
   }
   else if (this.currentSectionOpen == 16) {
     if (menuClass.getActiveSession() && this.actionNextOrPrevious == "preview") {
       this.setCurrentSectionOpen(8);
       this.openArtWorkManual();
     }

   }
   else if (this.currentSectionOpen == 17) {
     if (artworkManualClass.getArtworkManual() == "manual"){
    }
    else {
      this.setCurrentSectionOpen(12);
      this.openArtworkFinal();
    }
   }
  }

  // Métodos adicionales según sea necesario
   openMaterial(){
     previewTemplate.togglePreviewTemplateClass("none");



     previewAccessoriesClass.showAccessoriesPreview("none");

     previewMaterial.showMaterialPreview("flex");
     previewLanyardType.showTypeLanyardPreview("none");
     previewArtworkManualClass.showArtworkManualPreview("none");
     this.showCurrentSection(this.currentSectionOpen);
     this.showPreview(false);
   }
   openLanyardType(){
     previewTemplate.togglePreviewTemplateClass("block");



     previewAccessoriesClass.showAccessoriesPreview("flex");
     previewMaterial.showMaterialPreview("none");

     this.showCurrentSection(this.currentSectionOpen);
     this.showPreview(true);

     previewLanyardType.showSelectedPreviewTemplate();
     previewLanyardType.showTypeLanyardPreview("flex");
   }
   openWidth(){
     previewTemplate.togglePreviewTemplateClass("block");

     this.showCurrentSection(this.currentSectionOpen);
   }
   openSidePrinted(){
     previewTemplate.togglePreviewTemplateClass("block");

     this.showCurrentSection(this.currentSectionOpen);
   }
   openClips(){
     previewTemplate.togglePreviewTemplateClass("block");

     this.showCurrentSection(this.currentSectionOpen);
   }
   openAttachment(){
     previewTemplate.togglePreviewTemplateClass("block");


     previewLanyardType.showTypeLanyardPreview("flex");
     previewLanyardType.showSelectedPreviewTemplate();
     previewColourClass.showColourPreview("none");
     previewAccessoriesClass.showAccessoriesPreview("none");
     previewAccessoriesClass.showAccessoriesPreview("flex");

     this.showCurrentSection(this.currentSectionOpen);
   }
   openAccessories(){
     previewTemplate.togglePreviewTemplateClass("block");



     this.showCurrentSection(this.currentSectionOpen);
     previewLanyardType.showTypeLanyardPreview("flex");
     previewColourClass.showColourPreview("none");

     previewAccessoriesClass.showAccessoriesPreview("flex");
   }
   openColourQuantity(){
     previewTemplate.togglePreviewTemplateClass("none");


     previewArtworkManualClass.showArtworkManualPreview("none");
     previewLanyardType.showTypeLanyardPreview("none");
     previewAccessoriesClass.showAccessoriesPreview("none");

     previewColourClass.showColourPreview("flex");
     previewColourClass.showSelectedPreviewtColour();
     this.showCurrentSection(this.currentSectionOpen);
   }
   openArtWorkManual(){
     previewTemplate.togglePreviewTemplateClass("none");


     previewAccessoriesClass.showAccessoriesPreview("none");

     previewColourClass.showColourPreview("none");

     previewMaterial.showMaterialPreview("none");
     previewArtworkManualClass.showArtworkManualPreview("flex");
     previewLanyardType.showTypeLanyardPreview("none");
     artworkPreviewClass.showHidePreviewArtwork(false);
     this.showCurrentSection(this.currentSectionOpen);
     this.showPreview(true);

   }
  openBackgroundColour() {
    previewTemplate.togglePreviewTemplateClass("block");


    previewAccessoriesClass.showAccessoriesPreview("flex");
    artworkPreviewClass.showHidePreviewArtwork(false);

    previewArtworkManualClass.showArtworkManualPreview("none");
    previewLanyardType.showTypeLanyardPreview("flex");
    this.showCurrentSection(this.currentSectionOpen);
  }
  openText(){
    previewTemplate.togglePreviewTemplateClass("block");

    previewLanyardType.showTypeLanyardPreview("flex");
    previewArtworkManualClass.showArtworkManualPreview("none");
    this.showCurrentSection(this.currentSectionOpen);
  }
  openImage(){
    previewTemplate.togglePreviewTemplateClass("block");


    previewLanyardType.showTypeLanyardPreview("flex");
    previewArtworkManualClass.showArtworkManualPreview("none");
    this.showCurrentSection(this.currentSectionOpen);
  }

  openArtwork(){
    previewTemplate.togglePreviewTemplateClass("none");

    artworkClass.showHideArtwork(true);
    artworkPreviewClass.showHidePreviewArtwork(true);
    previewLanyardType.showTypeLanyardPreview("none");
    previewArtworkManualClass.showArtworkManualPreview("none");
    this.showCurrentSection(this.currentSectionOpen);
  }

  openArtworkFinal(){

    artworkClassFinal.updateItems();
    previewTemplate.togglePreviewTemplateClass("block");
    previewAccessoriesClass.showAccessoriesPreview("flex");
    artworkPreviewClass.showHidePreviewArtwork(false);
    previewLanyardType.showTypeLanyardPreview("flex");
    classPreviewLogin.showLoginPreview("none");
    previewProvidedInformation.showProvidedInformationPreview('none');
    this.showCurrentSection(this.currentSectionOpen);
  //  classRegister.openRegister(false);
  }

  openLogin(){
    previewTemplate.togglePreviewTemplateClass("none");
    previewAccessoriesClass.showAccessoriesPreview("none");
    classPreviewLogin.showLoginPreview("flex");
    previewLanyardType.showTypeLanyardPreview("none");
    previewProvidedInformation.showProvidedInformationPreview('none');
    this.showCurrentSection(this.currentSectionOpen);
  }

  openProvidedInformation(){
    previewTemplate.togglePreviewTemplateClass("none");
    classPreviewLogin.showLoginPreview("none");
    previewCheckout.showPreviewCheckout("none");
    previewProvidedInformation.showProvidedInformationPreview('flex');
    previewLanyardType.showTypeLanyardPreview("none");
    this.showCurrentSection(this.currentSectionOpen);
    this.showNext(true);
  }
  openCheckout(){
    previewTemplate.togglePreviewTemplateClass("block");

    this.showNext(false);
    previewLanyardType.showTypeLanyardPreview("none");
    previewProvidedInformation.showProvidedInformationPreview('none');
    this.showCurrentSection(this.currentSectionOpen);
    previewLanyardType.showTypeLanyardPreview("flex");
  }
  setStateVisibilityPanelCustomeLanyard(value) {
    stateVisibilityPanelCustomeLanyard = value;
  }

  getStateVisibilityPanelCustomeLanyard() {
    return stateVisibilityPanelCustomeLanyard;
  }

  showNext(active){
      if (active) {
          next.style.display = "block";
      }
      else {
      next.style.display = "none";
      }
  }

  showPreview(active){
    if (active) {
        preview.style.display = "block";
    }
    else {
        preview.style.display = "none";
    }
  }
}

var sections = document.querySelectorAll(".section");
var preview = document.getElementById("preview");
var next = document.getElementById("next");
var stateVisibilityPanelCustomeLanyard = false;



const customizeLanyard = new CustomizeLanyard();
