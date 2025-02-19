// Function to handle smooth scrolling with acceleration and deceleration
let velocity = 0; // Stores the scrolling speed
let previousY = window.scrollY; // Keeps track of the last scroll position

function handleScroll() {
    requestAnimationFrame(() => {
        const currentY = window.scrollY; // Get current scroll position
        const deltaY = currentY - previousY; // Calculate scroll difference

        // Apply acceleration to the scroll movement
        velocity += deltaY * 0.05;
        // Apply gradual deceleration
        velocity *= 0.9;

        window.scrollBy(0, velocity); // Move the page according to velocity
        previousY = currentY; // Update previous position
    });
}

// Add event listener to detect scrolling and trigger the smooth effect
window.addEventListener("scroll", handleScroll);

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
                element.addEventListener("click", () => {
                    material.setMaterialSelected(material_for_select[index].innerText);
                    homeClass.openLanyard();
                    customizeLanyard.openMaterial();

                });
            });
        }

        if (open_from_scratch.length > 0) {
            open_from_scratch.forEach(element => {
                element.addEventListener("click", () => {
                  //  customizeLanyard.setCurrentSectionOpen(0);
                    homeClass.openLanyard();
                    customizeLanyard.openMaterial();

                });
            });
        }

        if (open_from_best_seller.length > 0) {
            open_from_best_seller.forEach(element => {
                element.addEventListener("click", () => {
                    material.setMaterialSelected("Dye Sub polyester");
                  //  customizeLanyard.setCurrentSectionOpen(8);
                    homeClass.openLanyardFromBestSeller();
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
                    customizeLanyard.openArtWorkManual();
                });
            });
        }
    }

    /**
     * Opens the lanyard customization process with default settings.
     */
    openLanyard() {
        // Set default amount and update material prices
        priceClass.setAmountSelected(1000);

        material.refreshMaterial();
        oneTwoEndsClass.refreshLanyardType();
        widthClass.refreshWidth();




        // Open the customization panel
        customizeLanyard.openCustomizeLanyard(true);
        customizeLanyard.setCurrentSectionOpen(0);
        customizeLanyard.setStateVisibilityPanelCustomeLanyard(true);
    }

    /**
     * Opens the customization process with pre-configured "Best Seller" settings.
     */
    openLanyardFromBestSeller(){
        // Set default amount and update material prices
        priceClass.setAmountSelected(1000);

        material.refreshMaterial();
        oneTwoEndsClass.refreshLanyardType();
        widthClass.refreshWidth();


        // Open the customization panel
        customizeLanyard.openCustomizeLanyard(true);
        customizeLanyard.setCurrentSectionOpen(8);
        customizeLanyard.setStateVisibilityPanelCustomeLanyard(true);

    }
}

// Selectors for buttons and material options
const open_from_scratch = document.querySelectorAll(".open_from_scratch");
const open_from_best_seller = document.querySelectorAll(".open_from_best_seller");
const open_from_scratch_in_home = document.querySelectorAll(".open_from_scratch_in_home");
const material_for_select = document.querySelectorAll(".material_for_select");

// Initialize Home class
const homeClass = new Home();
