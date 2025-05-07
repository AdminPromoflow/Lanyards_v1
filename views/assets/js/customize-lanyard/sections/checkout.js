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

const buy_cart_material = document.getElementById('buy_cart_material');
const price_buy_cart_material = document.getElementById('price_buy_cart_material');

const buy_cart_lanyard_type = document.getElementById('buy_cart_lanyard_type');
const price_buy_cart_lanyard_type = document.getElementById('price_buy_cart_lanyard_type');

const buy_cart_width = document.getElementById('buy_cart_width');
const price_buy_cart_width = document.getElementById('price_buy_cart_width');

const buy_cart_side_printed = document.getElementById('buy_cart_side_printed');
const price_buy_cart_side_printed = document.getElementById('price_buy_cart_side_printed');

const buy_cart_clips = document.getElementById('buy_cart_clips');
const price_buy_cart_clips = document.getElementById('price_buy_cart_clips');

const buy_cart_attachment = document.getElementById('buy_cart_attachment');
const price_buy_cart_attachment = document.getElementById('price_buy_cart_attachment');

const buy_cart_accessories = document.getElementById('buy_cart_accessories');
const price_buy_cart_accessories = document.getElementById('price_buy_cart_accessories');

const buy_cart_colour_quantity = document.getElementById('buy_cart_colour_quantity');
const price_buy_cart_colour_quantity = document.getElementById('price_buy_cart_colour_quantity');


const checkout = new Checkout();
