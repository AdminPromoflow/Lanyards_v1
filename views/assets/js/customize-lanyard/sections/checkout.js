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




  }
  updateItems(){
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

    const price_buy_cart_price_per_unit = document.getElementById('price_buy_cart_price_per_unit');


    const price_buy_cart_subtotal = document.getElementById('price_buy_cart_subtotal');
    const amount_buy_cart = document.getElementById('amount_buy_cart');
    const price_buy_cart_price_per_unit_2 = document.getElementById('price_buy_cart_price_per_unit_2');



    buy_cart_material.innerHTML =  material.getMaterialSelected();
    buy_cart_lanyard_type.innerHTML =  oneTwoEndsClass.getTypeLanyardSelected();
    buy_cart_width.innerHTML =  widthClass.getWidthSelected();
    buy_cart_side_printed.innerHTML =  sidePrintedClass.getSidePrintedSelected();
    buy_cart_clips.innerHTML =  clipClass.getClipSelected();
    buy_cart_attachment.innerHTML =  attachmentClass.getAttachmentSelected();
    buy_cart_accessories.innerHTML =  accessoriesClass.getAccessoriesSelected();
    buy_cart_colour_quantity.innerHTML =  colourClass.getColourSelected();


    price_buy_cart_material.innerHTML = "+£" + priceClass.getPricePerMaterialWithAmount() + "per unit";
    price_buy_cart_lanyard_type.innerHTML = "+£" + priceClass.getPriceLanyardType() + "per unit";
    price_buy_cart_width.innerHTML = "+£" + priceClass.getPriceWidth() + "per unit";
    price_buy_cart_side_printed.innerHTML = "+£" + priceClass.getPriceSidePrinted() + "per unit";
    price_buy_cart_clips.innerHTML = "+£" + priceClass.getPriceClip() + "per unit";
    price_buy_cart_attachment.innerHTML = "+£" + priceClass.getPriceAttachment() + "per unit";
    price_buy_cart_accessories.innerHTML = "+£" + priceClass.getPriceAccessory() + "per unit";
    price_buy_cart_colour_quantity.innerHTML = "+£" + priceClass.getPriceColour() + "per unit";

    var total = priceClass.getPricePerMaterialWithAmount() +
                priceClass.getPriceLanyardType() +
                priceClass.getPriceWidth() +
                priceClass.getPriceSidePrinted() +
                priceClass.getPriceClip() +
                priceClass.getPriceAttachment() +
                priceClass.getPriceAccessory() +
                priceClass.getPriceColour();

    price_buy_cart_price_per_unit.innerHTML = "+£" + total;

    amount_buy_cart.innerHTML = priceClass.getAmountSelected() + " units x";
    price_buy_cart_price_per_unit_2.innerHTML = "£" + total + "     = ";
    price_buy_cart_subtotal.innerHTML = "£" + (priceClass.getAmountSelected() * total);

  }

}

// Captura todos los elementos con la clase "preview_checkout"
const preview_checkout = document.getElementById('preview_checkout');

// Captura todos los elementos con la clase "subcontainer_boxes_preview_checkout"
const subcontainer_boxes_preview_checkout = document.getElementById('subcontainer_boxes_preview_checkout');

const arrow_preview_checkout = document.getElementById('arrow_preview_checkout');


const checkoutClass = new Checkout();
