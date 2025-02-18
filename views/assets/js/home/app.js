
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
        material.setMaterialSelected(material_for_select[i].innerText);
        //material_for_select
        homeClass.openLanyardFromScratch();


      })
    }




    for (let i = 0; i < open_from_scratch.length; i++) {
      open_from_scratch[i].addEventListener("click", function(){
        homeClass.openLanyardFromScratch();


      })
    }



    for (let i = 0; i < open_from_best_seller.length; i++) {
      open_from_best_seller[i].addEventListener("click", function(){
        homeClass.openLanyardFromBestSeller();


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
      optionSelected: material.getMaterialSelected(),
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





  openLanyardFromBestSeller(){
    priceClass.setAmountSelected(1000);
    material.updatePriceMaterial();
    widthClass.updatePriceWidth();

    const url = "../../controller/lanyard/material.php";
    const data = {
      action: "setMaterialSelected",
      optionSelected: "Dye Sub polyester",
      amountSelected: priceClass.getAmountSelected()
    };





    material.setMaterialSelected("Dye Sub polyester");
    // Show the selected material.
    material.showSelectedMaterial();

    // Show the selected preview material.
    previewMaterial.showSelectedPreviewtMaterial(material.getMaterialSelected());

    // Update material prices.
    material.updatePriceMaterial();

    material.makeAjaxRequestSetMaterialSelected(url, data);

    customizeLanyard.openCustomizeLanyard(true);

    customizeLanyard.setStateVisibilityPanelCustomeLanyard (true);


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

    customizeLanyard.currentSectionOpen = 8;
    previewMaterial.showMaterialPreview("none");
    customizeLanyard.showPreview(true);
    customizeLanyard.openArtWorkManual();
  }
}
const open_from_scratch = document.querySelectorAll(".open_from_scratch");

const open_from_best_seller = document.querySelectorAll(".open_from_best_seller");

const open_from_scratch_in_home = document.querySelectorAll(".open_from_scratch_in_home");

const material_for_select = document.querySelectorAll(".material_for_select");

const homeClass = new Home();
