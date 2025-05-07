class Checkout {
  constructor(){
    //this.updateItems();


    previewCheckout.addEventListener('click', function() {
      // Alternar visibilidad
      subcontainerBoxes.style.display =
        (subcontainerBoxes.style.display === 'none' || subcontainerBoxes.style.display === '')
        ? 'flex'
        : 'none';

      // Alternar rotación de flecha
      const isRotated = arrowPreviewCheckout.style.transform === 'rotate(90deg)';
      arrowPreviewCheckout.style.transform = isRotated ? 'rotate(0deg)' : 'rotate(90deg)';
      arrowPreviewCheckout.style.transition = 'transform 0.3s ease';
    });


  }
updateItems(){


/*checkoutMaterial.innerHTML = "Material: " + material.getMaterialSelected(oneTwoEndsClass.getTypeLanyardSelected());
checkoutLanyardLype.innerHTML = "Lanyard type: " + oneTwoEndsClass.getTypeLanyardSelected();
checkoutWidth.innerHTML = "Width: " + widthClass.getWidthSelected();
checkoutSidePrinted.innerHTML = "Side printed: " + sidePrintedClass.getSidePrintedSelected();
checkoutClips.innerHTML = "Clips: " + clipClass.getClipSelected();
checkoutAttachment.innerHTML = "Attachment: " + attachmentClass.getAttachmentSelected();
checkoutColourQuantity.innerHTML = "Colour Quantity: " + colourClass.getColourSelected();
checkoutArtworkManual.innerHTML = "Artwork - Manual: " + artworkManualClass.getArtworkManual();*/
}
}

// Captura todos los elementos con la clase "preview_checkout"
const previewCheckoutElements = document.getElementsByClassName('preview_checkout');

// Captura todos los elementos con la clase "subcontainer_boxes_preview_checkout"
const subcontainerBoxes = document.getElementsByClassName('subcontainer_boxes_preview_checkout');

const arrowPreviewCheckout = document.getElementById('arrow_preview_checkout');

// Material
const material = document.getElementById('buy_cart_material');
const priceMaterial = document.getElementById('price_buy_cart_material');

// Lanyard type
const lanyardType = document.getElementById('buy_cart_lanyard_type');
const priceLanyardType = document.getElementById('price_buy_cart_lanyard_type');

// Width
const width = document.getElementById('buy_cart_width');
const priceWidth = document.getElementById('price_buy_cart_width');

// Side Printed
const sidePrinted = document.getElementById('buy_cart_side_printed');
const priceSidePrinted = document.getElementById('price_buy_cart_side_printed');

// Clips
const clips = document.getElementById('buy_cart_clips');
const priceClips = document.getElementById('price_buy_cart_clips');

// Attachment
const attachment = document.getElementById('buy_cart_attachment');
const priceAttachment = document.getElementById('price_buy_cart_attachment');

// Accessories
const accessories = document.getElementById('buy_cart_accessories');
const priceAccessories = document.getElementById('price_buy_cart_accessories');

// Colour quantity
const colourQuantity = document.getElementById('buy_cart_colour_quantity');
const priceColourQuantity = document.getElementById('price_buy_cart_colour_quantity');

const checkout = new Checkout();
