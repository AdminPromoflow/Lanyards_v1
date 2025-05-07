class Checkout {
  constructor(){
    //
    subcontainer_boxes_preview_checkout.style.display = "flex";
    arrow_preview_checkout.style.transform = "rotate(0deg)";


    preview_checkout.addEventListener('click', function() {
      subcontainer_boxes_preview_checkout.style.display =
        (subcontainer_boxes_preview_checkout.style.display === 'none' || subcontainer_boxes_preview_checkout.style.display === '')
        ? 'flex'
        : 'none';

      const isRotated = arrow_preview_checkout.style.transform === 'rotate(-90deg)';
      arrow_preview_checkout.style.transform = isRotated ? 'rotate(0deg)' : 'rotate(-90deg)';
    });


    this.updateItems();


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

  buy_cart_material.innerHTML =  material.getMaterialSelected();
  buy_cart_lanyard_type.innerHTML =  oneTwoEndsClass.getTypeLanyardSelected();
  buy_cart_width.innerHTML =  widthClass.getWidthSelected();
  buy_cart_side_printed.innerHTML =  sidePrintedClass.getSidePrintedSelected();
  buy_cart_clips.innerHTML =  clipClass.getClipSelected();
  buy_cart_attachment.innerHTML =  attachmentClass.getAttachmentSelected();
  buy_cart_accessories.innerHTML =  accessoriesClass.getAccessoriesSelected();
  buy_cart_colour_quantity.innerHTML =  colourClass.getColourSelected();
}
}

// Captura todos los elementos con la clase "preview_checkout"
const preview_checkout = document.getElementById('preview_checkout');

// Captura todos los elementos con la clase "subcontainer_boxes_preview_checkout"
const subcontainer_boxes_preview_checkout = document.getElementById('subcontainer_boxes_preview_checkout');

const arrow_preview_checkout = document.getElementById('arrow_preview_checkout');

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
