class Home {
    constructor() {
        this._customizeLanyardCreated = false;
        this.isScrolling = false;
        this.velocity = 0;
        this.previousY = 0;

        this.init();
    }

    init() {
        this.setupScrollListener();
    }

    setupScrollListener() {
        window.addEventListener("scroll", () => {
            if (!this.isScrolling) {
                this.isScrolling = true;
                requestAnimationFrame(() => this.handleScroll());
            }
        });
    }

    handleScroll() {
        const currentY = window.scrollY;
        const deltaY = currentY - this.previousY;

        // Agregar aceleración
        this.velocity += deltaY * 0.05;
        // Aplicar desaceleración gradual
        this.velocity *= 0.0;

        window.scrollBy(0, this.velocity);

        this.previousY = currentY;
        this.isScrolling = false;
    }

    setupCustomizeLanyardListener() {

         // Make an AJAX request to fetch all materials.
         this.createCustomizeLanyard();
         material.makeAjaxRequestGetAllMaterials();
         alert('ha2');

         customizeLanyard.openCustomizeLanyard(true);
         customizeLanyard.setStateVisibilityPanelCustomeLanyard (true);
    }
    getCustomizeLanyardCreated() {
        return this._customizeLanyardCreated;
    }

    setCustomizeLanyardCreated(value) {
        if (typeof value === "boolean") {
            this._customizeLanyardCreated = value;
        } else {
            console.warn("customizeLanyardCreated must be a boolean value.");
        }
    }
    createCustomizeLanyard() {
        const customizeLanyard = document.getElementById("customize-lanyard");

        if (customizeLanyard) {
            fetch("../../controller/assets/data/lanyards/customize-lanyard-content.php")
                .then(response => response.text())
                .then(html => {
                    customizeLanyard.innerHTML = html;
                })
                .catch(error => console.error("Error loading customize-lanyard:", error));
        }
    }

}

// Instancia de la clase
const homeClass = new Home();
