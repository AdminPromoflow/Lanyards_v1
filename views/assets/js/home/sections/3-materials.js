// Class MaterialHome
class MaterialHome {
  constructor() {
    // Event listener to hide containerTextMaterials when closeMaterial is clicked
  /*  for (let i = 0; i < closeMaterial.length; i++) {
      closeMaterial[i].addEventListener("click", function(){
      //  containerTextMaterials[i].style.display = "none";
      })
    }*/

    for (let i = 0; i < openCustomizeLanyardFromMaterials.length; i++) {
      openCustomizeLanyardFromMaterials[i].addEventListener("click", function(){




        homeClss.setupCustomizeLanyardListener();
  /*
        const url = "../../controller/lanyard/material.php";
        const data = {
          action: "setMaterialSelected",
          optionSelected: materialForSelect[i].textContent,
          amountSelected: priceClass.getAmountSelected()
        };

        priceClass.setAmountSelected(1000);

        material.setMaterialSelected(materialForSelect[i].textContent);
        // Show the selected material.
        material.showSelectedMaterial();

        // Show the selected preview material.
        previewMaterial.showSelectedPreviewtMaterial(material.getMaterialSelected());

        // Update material prices.
        material.updatePriceMaterial();

        material.makeAjaxRequestSetMaterialSelected(url, data);
*/


      })
    }


    // Event listener to display containerTextMaterials when itemMaterial is clicked
    for (let i = 0; i < itemMaterial.length; i++) {
      containerTextMaterials[i].style.display = "none"; // Oculta todos los divs inicialmente
      itemMaterial[i].addEventListener("mouseover", function () {
        containerTextMaterials[i].style.display = "flex";
        containerTextMaterialsOn = i;
        materialHome.hideOtherContainerTextMaterials(i);
      });
    }
    for (let i = 0; i < itemMaterial.length; i++) {
      containerTextMaterials[i].style.display = "none"; // Oculta todos los divs inicialmente
      itemMaterial[i].addEventListener("click", function () {
        containerTextMaterials[i].style.display = "flex";
        containerTextMaterialsOn = i;
        materialHome.hideOtherContainerTextMaterials(i);
      });
    }

    // Activa el div en la posición 0 al inicio
    if (containerTextMaterials.length > 0) {
      containerTextMaterials[0].style.display = "flex";
      containerTextMaterialsOn = 0;
    }


    // Event listener to hide containerTextMaterials when clicking outside
  //  document.addEventListener('click', this.outContainerTextMaterials);
  }

  // Method to hide other containerTextMaterials
  hideOtherContainerTextMaterials(){
    for (let i = 0; i < containerTextMaterials.length; i++) {
      if (i != containerTextMaterialsOn) {
        containerTextMaterials[i].style.display = "none";
      }
    }
  }

}

// Selecting elements from the DOM
const itemMaterial = document.querySelectorAll(".itemMaterial");
const containerTextMaterials = document.querySelectorAll(".containerTextMaterials");
//const closeMaterial = document.querySelectorAll(".closeMaterial");
const buttonMaterialsBox = document.querySelectorAll(".buttonMaterialsBox");
const openCustomizeLanyardFromMaterials = document.querySelectorAll(".openCustomizeLanyardFromMaterials");
const materialForSelect = document.querySelectorAll(".material-for-select");
const documento = document.documentElement;


var containerTextMaterialsOn = 0;

// Creating an instance of the MaterialHome class
const materialHome = new MaterialHome();
