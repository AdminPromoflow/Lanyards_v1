class Home {
    constructor() {

        this.initEventListeners(); // Initialize event listeners on page load

    }

    /**
     * Initializes event listeners for buttons that open lanyard customization.
     */
    initEventListeners() {
        // Check if elements exist before adding event listeners
        if (open_from_scratch_in_home.length > 0) {
            open_from_scratch_in_home.forEach((element, index) => {
                element.addEventListener("click", async () => {
                  //  chargingClass.hideShowchargin(true);
                    material.setMaterialSelected(material_for_select[index].innerText);
                    if (!await homeClass.openLanyard()) return;
                    customizeLanyard.openMaterial();
                    //chargingClass.hideShowchargin(false);
                });
            });
        }

        if (open_from_scratch.length > 0) {
            open_from_scratch.forEach(element => {
                element.addEventListener("click", async () => {
                  //  chargingClass.hideShowchargin(true);
                    if (!await homeClass.openLanyard()) return;
                    customizeLanyard.openMaterial();
                  //  chargingClass.hideShowchargin(false);
                });
            });
        }

        if (open_from_best_seller.length > 0) {
            open_from_best_seller.forEach(element => {
                element.addEventListener("click", async () => {
                    material.setMaterialSelected("Dye Sub polyester");
                  //  customizeLanyard.setCurrentSectionOpen(8);
                    if (!await homeClass.openLanyardFromBestSeller()) return;
                    // Show an alert with predefined lanyard options
                    alert(
                        "We have set up the most popular lanyard options:\n\n" +
                        "-----------------------------------\n" +
                        "Material: Dye-sublimation\n" +
                        "Type of lanyard: Single ended\n" +
                        "Width: 20mm\n" +
                        "Colour: Full\n" +
                        "-----------------------------------\n" +
                        "You can continue adding the design inside the lanyard.\n\n" +
                        "Remember, you can always change these options by clicking on Preview."
                    );
                  //  chargingClass.hideShowchargin(true);
                    customizeLanyard.openArtWorkManual();
                  //  chargingClass.hideShowchargin(false);
                });
            });
        }
    }

    /**
     * Opens the lanyard customization process with default settings.
     */
    async openLanyard() {
        if (!await this.customizerDataIsReady()) return false;

        // Set default amount and update material prices

        priceClass.setAmountSelected(1000);
        widthClass.setWidthSelected("10mm");



        material.refreshMaterial();
        oneTwoEndsClass.refreshLanyardType();
        widthClass.refreshWidth();
        sidePrintedClass.refreshSidePrintedData();
        colourClass.refreshColourQuantity();
        clipClass.refreshClip();
        artworkManualClass.refreshArtkworkManual();
        backgroundClass.refreshBackgroundColour();
        attachmentClass.refreshAttachment();
        previewTemplate.activateTemplate();
        previewManual.refreshTextLanyard();
        previewManual.refreshImageLanyard();

        if (menuClass.getActiveSession()) {
          providedInformation.getAddresses();
        }


        // Open the customization panel
        customizeLanyard.openCustomizeLanyard(true);
        customizeLanyard.setCurrentSectionOpen(0);
        customizeLanyard.setStateVisibilityPanelCustomeLanyard(true);

        return true;










    }

    /**
     * Opens the customization process with pre-configured "Best Seller" settings.
     */

    async openLanyardFromBestSeller(){
        if (!await this.customizerDataIsReady()) return false;

        // Set default amount and update material prices
        this.setOriginValuesBestSeller();
        priceClass.setAmountSelected(1000);

        material.refreshMaterial();
        oneTwoEndsClass.refreshLanyardType();
        widthClass.refreshWidth();
        sidePrintedClass.refreshSidePrintedData()
        colourClass.refreshColourQuantity();
        clipClass.refreshClip();
        artworkManualClass.refreshArtkworkManual();
        backgroundClass.refreshBackgroundColour();

        attachmentClass.refreshAttachment();
        previewTemplate.activateTemplate();
        previewManual.refreshTextLanyard();
        previewManual.refreshImageLanyard();

        if (menuClass.getActiveSession()) {
          providedInformation.getAddresses();
        }



        // Open the customization panel
        customizeLanyard.openCustomizeLanyard(true);
        customizeLanyard.setCurrentSectionOpen(8);
        customizeLanyard.setStateVisibilityPanelCustomeLanyard(true);

        return true;

    }

    async customizerDataIsReady() {
        let lanyards = customizeLanyard.getJsonLanyards();
        if (!Array.isArray(lanyards) || lanyards.length === 0) {
            chargingClass.hideShowchargin(true);
            try {
                await material.makeAjaxRequestGetAllMaterials();
            } finally {
                chargingClass.hideShowchargin(false);
            }
            lanyards = customizeLanyard.getJsonLanyards();
        }
        if (!Array.isArray(lanyards) || lanyards.length === 0) {
            alert("The customiser is temporarily unavailable. Please try again shortly or send us an enquiry below.");
            return false;
        }
        return true;
    }


    setOriginValuesBestSeller() {


        material.setMaterialSelected("Dye Sub polyester");
        oneTwoEndsClass.setTypeLanyardSelected("one-end");
        widthClass.setWidthSelected("20mm");
        sidePrintedClass.setSidePrintedSelected("two-side");
        colourClass.setColourSelected("two-colour");
        clipClass.setClipSelected("dog_clip");

    }

}

// Selectors for buttons and material options
const open_from_scratch = document.querySelectorAll(".open_from_scratch");
const open_from_best_seller = document.querySelectorAll(".open_from_best_seller");
const open_from_scratch_in_home = document.querySelectorAll(".open_from_scratch_in_home");
const material_for_select = document.querySelectorAll(".material_for_select");

// Initialize Home class
const homeClass = new Home();
