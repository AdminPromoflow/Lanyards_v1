
// Función para manejar el scroll suave y respuesta rápida
        let isScrolling = false;
        let velocity = 0;
        let previousY = 0;

        function handleScroll() {
        if (!isScrolling) {
          requestAnimationFrame(() => {
            const currentY = window.scrollY;
            const deltaY = currentY - previousY;

            // Agregar aceleración
            velocity += deltaY * 0.05;
            // Aplicar desaceleración gradual
            velocity *= 0.0;

            window.scrollBy(0, velocity);

            previousY = currentY;
            isScrolling = false;
          });
        }
        }
class Home {
  constructor() {
    for (let i = 0; i < openCustomizeLanyardFromMaterials.length; i++) {
      openCustomizeLanyardFromMaterials[i].addEventListener("click", function(){
        this.openLanyardFromScratch();


      })
    }




    for (let i = 0; i < open_from_scratch.length; i++) {
      open_from_scratch[i].addEventListener("click", function(){
        this.openLanyardFromScratch();


      })
    }

  }
  openLanyardFromScratch(){
    priceClass.setAmountSelected(1000);
    material.updatePriceMaterial();
    widthClass.updatePriceWidth();

    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "setMaterialSelected",
      optionSelected: "Tubular",
      amountSelected: priceClass.getAmountSelected()
    };





    material.setMaterialSelected("Tubular");
    // Show the selected material.
    material.showSelectedMaterial();

    // Show the selected preview material.
    previewMaterial.showSelectedPreviewtMaterial(material.getMaterialSelected());

    // Update material prices.
    material.updatePriceMaterial();

    material.makeAjaxRequestSetMaterialSelected(url, data);

    customizeLanyard.openCustomizeLanyard(true);

    customizeLanyard.setStateVisibilityPanelCustomeLanyard (true);
  }
}
const open_from_scratch = document.querySelectorAll("open_from_scratch");
const openCustomizeLanyardFromMaterials = document.querySelectorAll(".openCustomizeLanyardFromMaterials");

const home = new Home();
