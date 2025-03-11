class ChooseCreateLanyard {
  constructor() {
    // Add click event listeners to each material box
    for (let i = 0; i < box_material_information.length; i++) {
      box_material_information[i].addEventListener("click", function () {
        chooseCreateLanyard.selectItem(i);
      });
    }

    // Initialize all sections to be hidden, except the first one
    const sections = [
      box_information2,
      box_information2_lanyard_type,
      box_information2_width,
      box_information2_side_printed,
      box_information2_clips,
      box_information2_attachment,
      box_information2_accessories,
      box_information2_color_quantity,
      box_information2_artwork_manual,
      box_information2_artwork,
      box_information2_background,
      box_information2_text,
      box_information2_image,
    ];

    sections.forEach((section) => {
      for (var i = 0; i < section.length; i++) {
        section[i].style.display = "none";
      }
      section[0].style.display = "flex";
    });

    // Add click event listeners for all navigation arrows
    const navigationArrows = [
      { arrows: arros_material_information, method: "changeSliderMaterial" },
      { arrows: arrows_information_lanyard_type, method: "changeSliderLanyardType" },
      { arrows: arrows_information_width, method: "changeSliderWidth" },
      { arrows: arrows_information_side_printed, method: "changeSliderSidePrinted" },
      { arrows: arrows_information_clips, method: "changeSliderClips" },
      { arrows: arrows_information_attachment, method: "changeSliderAttachment" },
      { arrows: arrows_information_accessories, method: "changeSliderAccessories" },
      { arrows: arrows_information_color_quantity, method: "changeSliderColorQuantity" },
      { arrows: arrows_information_artwork_manual, method: "changeSliderArtworkManual" },
      { arrows: arrows_information_artwork, method: "changeSliderArtwork" },
      { arrows: arrows_information_background, method: "changeSliderBackground" },
      { arrows: arrows_information_text, method: "changeSliderText" },
      { arrows: arrows_information_image, method: "changeSliderImage" },
    ];

    navigationArrows.forEach(({ arrows, method }) => {
      arrows[0].addEventListener("click", () => chooseCreateLanyard[method]("left"));
      arrows[1].addEventListener("click", () => chooseCreateLanyard[method]("right"));
    });
  }

  // Generic function to handle slider changes
  changeSlider(section, direction) {
    var index = 0;

    for (var i = 0; i < section.length; i++) {
      if (section[i].style.display == "flex") {
        index = i;
      }
    }

    if (direction == "right") {
      index = (index == section.length - 1) ? 0 : index + 1;
    } else {
      index = (index == 0) ? section.length - 1 : index - 1;
    }

    for (var i = 0; i < section.length; i++) {
      section[i].style.display = "none";
    }
    section[index].style.display = "flex";
  }

  // Slider-specific methods
  changeSliderMaterial(direction) {
    this.changeSlider(box_information2, direction);
  }

  changeSliderLanyardType(direction) {
    this.changeSlider(box_information2_lanyard_type, direction);
  }

  changeSliderWidth(direction) {
    this.changeSlider(box_information2_width, direction);
  }

  changeSliderSidePrinted(direction) {
    this.changeSlider(box_information2_side_printed, direction);
  }

  changeSliderClips(direction) {
    this.changeSlider(box_information2_clips, direction);
  }

  changeSliderAttachment(direction) {
    this.changeSlider(box_information2_attachment, direction);
  }

  changeSliderAccessories(direction) {
    this.changeSlider(box_information2_accessories, direction);
  }

  changeSliderColorQuantity(direction) {
    this.changeSlider(box_information2_color_quantity, direction);
  }

  changeSliderArtworkManual(direction) {
    this.changeSlider(box_information2_artwork_manual, direction);
  }

  changeSliderArtwork(direction) {
    this.changeSlider(box_information2_artwork, direction);
  }

  changeSliderBackground(direction) {
    this.changeSlider(box_information2_background, direction);
  }

  changeSliderText(direction) {
    this.changeSlider(box_information2_text, direction);
  }

  changeSliderImage(direction) {
    this.changeSlider(box_information2_image, direction);
  }

  // Highlight the selected item and reset the rest
  selectItem(index) {
    for (var i = 0; i < box_container_information.length; i++) {
      box_container_information[i].style.display = "none";
      box_material_information[i].style.background = "rgba(0, 0, 0, 0.5)";
      box_material_information[i].querySelector("h3").style.color = "white";
    }

    box_container_information[index].style.display = "block";
    box_material_information[index].style.background = "rgba(255, 255, 255, 0.7)";
    box_material_information[index].querySelector("h3").style.color = "black";
  }
}



// Select DOM elements
const box_information2 = document.querySelectorAll(".box_information2");
const arros_material_information = document.querySelectorAll(".arros_material_information");

const box_information2_lanyard_type = document.querySelectorAll(".box_information2_lanyard_type");
const arrows_information_lanyard_type = document.querySelectorAll(".arrows_information_lanyard_type");

const box_information2_width = document.querySelectorAll(".box_information2_width");
const arrows_information_width = document.querySelectorAll(".arrows_information_width");

const box_information2_side_printed = document.querySelectorAll(".box_information2_side_printed");
const arrows_information_side_printed = document.querySelectorAll(".arrows_information_side_printed");

const box_information2_clips = document.querySelectorAll(".box_information2_clips");
const arrows_information_clips = document.querySelectorAll(".arrows_information_clips");

const box_information2_attachment = document.querySelectorAll(".box_information2_attachment");
const arrows_information_attachment = document.querySelectorAll(".arrows_information_attachment");

const box_information2_accessories = document.querySelectorAll(".box_information2_accessories");
const arrows_information_accessories = document.querySelectorAll(".arrows_information_accessories");

const box_information2_color_quantity = document.querySelectorAll(".box_information2_color_quantity");
const arrows_information_color_quantity = document.querySelectorAll(".arrows_information_color_quantity");

const box_information2_artwork_manual = document.querySelectorAll(".box_information2_artwork_manual");
const arrows_information_artwork_manual = document.querySelectorAll(".arrows_information_artwork_manual");

const box_information2_artwork = document.querySelectorAll(".box_information2_artwork");
const arrows_information_artwork = document.querySelectorAll(".arrows_information_artwork");

const box_information2_background = document.querySelectorAll(".box_information2_background");
const arrows_information_background = document.querySelectorAll(".arrows_information_background");

const box_information2_text = document.querySelectorAll(".box_information2_text");
const arrows_information_text = document.querySelectorAll(".arrows_information_text");

const box_information2_image = document.querySelectorAll(".box_information2_image");
const arrows_information_image = document.querySelectorAll(".arrows_information_image");

const box_container_information = document.querySelectorAll(".box_container_information");
const box_material_information = document.querySelectorAll(".box_material_information");

// Instantiate the ChooseCreateLanyard class
const chooseCreateLanyard = new ChooseCreateLanyard();
