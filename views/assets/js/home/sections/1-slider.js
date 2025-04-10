// Define a class called "Slider"
class Slider {
  constructor() {
    this.isHovering = false;
    // Detectar cuando el mouse está dentro del contenedor
        sliderLong.addEventListener('mouseenter', () => {
            sliderClass.setIsHovering(true);
        });

        // Detectar cuando el mouse sale del contenedor
        sliderLong.addEventListener('mouseleave', () => {
          sliderClass.setIsHovering(false);
        });


        buttonSliderContainer.addEventListener('mouseenter', () => {
            sliderClass.setIsHovering(true);
        });

        // Detectar cuando el mouse sale del contenedor
        buttonSliderContainer.addEventListener('mouseleave', () => {
          sliderClass.setIsHovering(false);
        });

    // Initialize the slider position and button colors
    sliderLong.style.left = "0%";
    buttonSlider[0].style.background = "#7B3378";

    // Add click event listeners to the slider buttons
    for (let i = 0; i < buttonSlider.length; i++) {
      buttonSlider[i].addEventListener("click", function () {
        sliderClass.nextSlide(i);
      });
    }

    arrow_slider.addEventListener("click", function () {
      const arrow_slider = document.getElementById('arrow_slider');
      const dad_customizelanyard = document.getElementById('dad-customize-lanyard');




    const targetPosition = arrow_slider.offsetTop - dad_customizelanyard.offsetTop;

   dad_customizelanyard.scrollTo({
       top: targetPosition,
       behavior: 'smooth',
   });
    });


  }

  getIsHovering() {
    return this.isHovering;
  }
  setIsHovering(isHovering) {
    this.isHovering = isHovering;
  }
  // Method to move to the next slide based on the current slide
  nextSlide(currentSlide) {
    if (currentSlide == 1) {
      // Transition to the second slide
      sliderClass.toSlide("-100%", "white", "#E66503", "white", "white");
    } else if (currentSlide == 2) {
      // Transition to the third slide
      sliderClass.toSlide("-200%", "white", "white", "#BC9B5A", "white");
    } else if (currentSlide == 3) {
      // Transition to the fourth slide
      sliderClass.toSlide("-300%", "white", "white", "white", "#4B6E33");
    } else if (currentSlide == 0) {
      // Transition back to the first slide
      sliderClass.toSlide("0%", "#7B3378", "white", "white", "white");
    }
  }

  // Method to update the slide position and button colors
  toSlide(left, zero, one, two, three) {
    sliderLong.style.left = left;
    buttonSlider[0].style.background = zero;
    buttonSlider[1].style.background = one;
    buttonSlider[2].style.background = two;
    buttonSlider[3].style.background = three;
  }

  // Method to get the current slide
  getSlide() {
    let isHovering = sliderClass.getIsHovering();
    const text = sliderLong.style.left;
    const numbers = text.match(/\d+/);
    const number = parseInt(numbers[0], 10) / 100;

    // Determine the current slide index and move to the next slide
    const currentSlide = (number < 3) ? number + 1 : 0;
    if (!isHovering) {
      sliderClass.nextSlide(currentSlide);
    }
  }
}

// Initialize variables and DOM elements
var currentSlide = 0;
var sliderLong = document.getElementById("sliderLong");
var buttonSliderContainer = document.getElementById("buttonSliderContainer");
var arrow_slider = document.getElementById("arrow_slider");
const buttonSlider = document.querySelectorAll('.buttonSlider');

// Create an instance of the Slider class
const sliderClass = new Slider();

// Set an interval to automatically switch slides every 4 seconds
setInterval(sliderClass.getSlide, 4000);
