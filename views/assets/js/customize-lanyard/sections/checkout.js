class Checkout {

  constructor(){

    this.productName = "";
    this.description = "";
    this.pricePerUnit = "";
    this.amount = "";
    this.total = "";
    this.linkPdf = "";

    this.productDetails =  {};



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

    add_to_cart_from_buy_cart.addEventListener("click", function(){


        chargingClass.hideShowchargin(true);



      checkoutClass.obtainProduct();
      checkoutClass.obtainDescription();
      checkoutClass.obtainPricePerUnit();
      checkoutClass.obtainAmount();
      checkoutClass.obtainTotal();
      checkoutClass.obtainProductDetails();
      chargingClass.hideShowchargin(true);
      checkoutClass.makeAjaxRequestCreateJob();

    })

  }

  obtainProductDetails(){
    if (artworkManualClass.getArtworkManual() == "manual") {
      const checkoutData = {
        text: checkoutClass.obtainText(),
        image: checkoutClass.obtainImage()
      };

      checkoutClass.setProductDetails(checkoutData)
    }
    else if (artworkManualClass.getArtworkManual() == "artwork") {
      const artworkData = {
          artworkLeft: artworkClass.getArtworkLeft(),
          artworkRight: artworkClass.getArtworkRight()
        };

      checkoutClass.setProductDetails(artworkData)
    }
  }



  obtainProduct(){
    this.setProduct("Custom Lanyard");
  }

  obtainDescription(){
    const description = {
      material: {
        type: material.getMaterialSelected(),
        additional_price: priceClass.getPricePerMaterialWithAmount()
      },
      lanyard_type: {
        type: oneTwoEndsClass.getTypeLanyardSelected(),
        additional_price: priceClass.getPriceLanyardType()
      },
      width: {
        value: widthClass.getWidthSelected(),
        additional_price: priceClass.getPriceWidth()
      },
      side_printed: {
        side: sidePrintedClass.getSidePrintedSelected(),
        additional_price: priceClass.getPriceSidePrinted()
      },
      colour_quantity: {
        type: colourClass.getColourSelected(),
        additional_price: priceClass.getPriceColour()
      },
      clip: {
        type: clipClass.getClipSelected(),
        additional_price: priceClass.getPriceClip()
      },
      attachment: {
        type: attachmentClass.getAttachmentSelected(),
        additional_price: priceClass.getPriceAttachment()
      },
      accessories: {
        type: accessoriesClass.getAccessoriesSelected(),
        additional_price: priceClass.getPriceAccessory()
      },
      background: {
        type: backgroundClass.getBackground(),
        additional_price: "0"
      }
    };
    this.setDescription(description);
  }

  obtainPricePerUnit(){
    var pricePerUnit = priceClass.getPricePerMaterialWithAmount() +
                priceClass.getPriceLanyardType() +
                priceClass.getPriceWidth() +
                priceClass.getPriceSidePrinted() +
                priceClass.getPriceColour() +
                priceClass.getPriceClip() +
                priceClass.getPriceAttachment() +
                priceClass.getPriceAccessory()
                ;

    this.setPricePerUnit(pricePerUnit);
  }

  obtainAmount(){
    const amount = priceClass.getAmountSelected();
    this.setAmount(amount);
  }

  obtainTotal(){
    var pricePerUnit = priceClass.getPricePerMaterialWithAmount() +
                priceClass.getPriceLanyardType() +
                priceClass.getPriceWidth() +
                priceClass.getPriceSidePrinted() +
                priceClass.getPriceColour() +
                priceClass.getPriceClip() +
                priceClass.getPriceAccessory() +
                priceClass.getPriceAttachment()

                ;

    const amount = priceClass.getAmountSelected();

    var total = pricePerUnit * amount;

    this.setTotal(total);

  }

  obtainImage() {
    const imageData = {
      timesImage: imageClass.getTimesImage(),
      imageSize: imageClass.getImageSize(),
      spaceBetweenImage: imageClass.getSpaceBetweenImage(),
      imageRotation: imageClass.getImageRotation(),
      spaceAlongLanyard: imageClass.getSpaceAlongLanyard(),
      linkImage: imageClass.getLinkImage(),
      imagePosition: imageClass.getImagePosition()
    };

    return imageData;
  }

  obtainText() {
    const textData = {
      contentText: textClass.getContentText(),
      timesText: textClass.getTimesText(),
      spaceBetweenText: textClass.getSpaceBetweenText(),
      spaceAlongLanyard: textClass.getSpaceAlongLanyard(),
      colourText: textClass.getColourText(),
      fontFamilyText: textClass.getFontFamilyText(),
      sizeText: textClass.getSizeText(),
      boldText: textClass.getBoldText(),
      italicText: textClass.getItalicText(),
      underlineText: textClass.getUnderlineText(),
      textPosition: textClass.getTextPosition()
    };

    return textData;
  }

  makeAjaxRequestCreateJob() {
    //alert(JSON.stringify(this.getProductDetails()));
    const url = "../../controller/lanyard/job.php";
    const data = {
      action: "createJob",
      product: this.getProduct(),
      artworkOrManual: artworkManualClass.getArtworkManual(),
      description: this.getDescription(),
      price_per_unit: this.getPricePerUnit(),
      amount: this.getAmount(),
      total: this.getTotal(),
      productDetails: this.getProductDetails(),
      address1: providedInformation.getAddress1(),
      address2: providedInformation.getAddress2(),
      newColour: backgroundClass.getNewColour()
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error("Network error.");
      })
      .then(data => {
      //  alert(data);


      chargingClass.hideShowchargin(false);

      data = JSON.parse(data);

        if (data["status"]) {
          alert(data["message"]);


          window.location.href = "../../views/shopping_cart/index.php";
        }

        else {

        }

      })
      .catch(error => {
        alert("Error, please try again");
        chargingClass.hideShowchargin(false);

      });
  }

  getProduct() {
    return this.productName;
  }

  setProduct(newName) {
    this.productName = newName;
  }

  getProductDetails() {
    return this.productDetails;
  }

  setProductDetails(productDetails) {
    this.productDetails = productDetails;
  }




  getDescription() {
    return this.description;
  }

  setDescription(newDescription) {
    this.description = newDescription;
  }

  getPricePerUnit() {
    return this.pricePerUnit;
  }

  setPricePerUnit(newPrice) {
    this.pricePerUnit = newPrice;
  }

  getAmount() {
    return this.amount;
  }

  setAmount(newAmount) {
    this.amount = newAmount;
  }

  getTotal() {
    return this.total;
  }

  setTotal(newTotal) {
    this.total = newTotal;
  }

  getLinkPdf() {
    return this.linkPdf;
  }

  setLinkPdf(newLink) {
    this.linkPdf = newLink;
  }

  updateItems() {
    this.showHideBottons("flex");

    buy_cart_material.innerHTML = material.getMaterialSelected();
    buy_cart_lanyard_type.innerHTML = oneTwoEndsClass.getTypeLanyardSelected();
    buy_cart_width.innerHTML = widthClass.getWidthSelected();
    buy_cart_side_printed.innerHTML = sidePrintedClass.getSidePrintedSelected();
    buy_cart_clips.innerHTML = clipClass.getClipSelected();
    buy_cart_attachment.innerHTML = attachmentClass.getAttachmentSelected();
    buy_cart_accessories.innerHTML = accessoriesClass.getAccessoriesSelected();
    buy_cart_colour_quantity.innerHTML = colourClass.getColourSelected();

    price_buy_cart_material.innerHTML = "+£" + priceClass.getPricePerMaterialWithAmount().toFixed(2) + " per unit";
    price_buy_cart_lanyard_type.innerHTML = "+£" + priceClass.getPriceLanyardType().toFixed(2) + " per unit";
    price_buy_cart_width.innerHTML = "+£" + priceClass.getPriceWidth().toFixed(2) + " per unit";
    price_buy_cart_side_printed.innerHTML = "+£" + priceClass.getPriceSidePrinted().toFixed(2) + " per unit";
    price_buy_cart_clips.innerHTML = "+£" + priceClass.getPriceClip().toFixed(2) + " per unit";
    price_buy_cart_attachment.innerHTML = "+£" + priceClass.getPriceAttachment().toFixed(2) + " per unit";
    price_buy_cart_accessories.innerHTML = "+£" + priceClass.getPriceAccessory().toFixed(2) + " per unit";
    price_buy_cart_colour_quantity.innerHTML = "+£" + priceClass.getPriceColour().toFixed(2) + " per unit";

    var total = priceClass.getPricePerMaterialWithAmount() +
                priceClass.getPriceLanyardType() +
                priceClass.getPriceWidth() +
                priceClass.getPriceSidePrinted() +
                priceClass.getPriceClip() +
                priceClass.getPriceAttachment() +
                priceClass.getPriceAccessory() +
                priceClass.getPriceColour();

    price_buy_cart_price_per_unit.innerHTML = "+£" + total.toFixed(2) + " per unit";

    amount_buy_cart.innerHTML = priceClass.getAmountSelected() + " units";
    price_buy_cart_price_per_unit_2.innerHTML = "£" + total.toFixed(2);
    price_buy_cart_subtotal.innerHTML = "£" + (priceClass.getAmountSelected() * total).toFixed(2);
  }


  showHideBottons(action){
    const container_button_boxes_checkout = document.getElementById('container_button_boxes_checkout');
    container_button_boxes_checkout.style.display = action;
  }

}

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



// Captura todos los elementos con la clase "preview_checkout"
const preview_checkout = document.getElementById('preview_checkout');

// Captura todos los elementos con la clase "subcontainer_boxes_preview_checkout"
const subcontainer_boxes_preview_checkout = document.getElementById('subcontainer_boxes_preview_checkout');

const arrow_preview_checkout = document.getElementById('arrow_preview_checkout');

const add_to_cart_from_buy_cart = document.getElementById("add_to_cart_from_buy_cart");

const checkoutClass = new Checkout();
