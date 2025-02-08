class Home {
    constructor() {
        console.log("Home class initialized");
        this.isScrolling = false;
        this.velocity = 0;
        this.previousY = 0;

        this.init();
    }

    init() {
        console.log("Home initialized.");
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
      const url2 = "../../controller/lanyard/material.php";
         const data2 = {
           action: "getMaterials"
         };
         // Make an AJAX request to fetch all materials.
         material.makeAjaxRequestGetAllMaterials(url2, data2);
      customizeLanyard.openCustomizeLanyard(true);

      customizeLanyard.setStateVisibilityPanelCustomeLanyard (true);
    }
}

// Instancia de la clase
const home = new Home();
