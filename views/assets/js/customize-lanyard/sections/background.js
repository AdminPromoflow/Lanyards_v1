// Class to manage background color settings for an application interface.
class BackgroundClass {
  constructor() {
    // Initialize default background colors for both options
    this.setBackgroundColourSelectedFirstOption("#ffffff");
    this.setBackgroundColourSelectedSecondOption("#ffffff");

    // DOM elements for background color selection and container sections
    const option_background_colour = document.querySelectorAll(".option_background_colour");
    const containers_boxes_background = document.querySelectorAll(".containers_boxes_background");

    // Show the first background container by default
    containers_boxes_background[0].style.display = "flex";

    // Add event listeners to background color option buttons
    for (let i = 0; i < option_background_colour.length; i++) {
      option_background_colour[i].addEventListener("click", () => {
        backgroundClass.activateContainerBackground(i);
        if (i === 0) {
          backgroundClass.changeBackgroundColourSelectedFirstOption();
        } else if (i === 1) {
          backgroundClass.changeBackgroundColourSelectedSecondOption();
        }
      });
    }

    // List of Pantone color options
    const pantoneColors = [
      { pantone: "White", html: "#FFFFFF" },
      { pantone: "Black", html: "#2D2926" },
      { pantone: "425", html: "#585C5F" },
      { pantone: "Cool Gray 6", html: "#A8AAAB" },
      { pantone: "Yellow", html: "#FCE300" },
      { pantone: "809", html: "#E4E400" },
      { pantone: "1235", html: "#FFBF29" },
      { pantone: "1355", html: "#FFCA84" },
      { pantone: "142", html: "#F9C26D" },
      { pantone: "Orange 021", html: "#FE5000" },
      { pantone: "Bright Orange", html: "#FF7F2A" },
      { pantone: "485", html: "#DA291C" },
      { pantone: "1795", html: "#D93600" },
      { pantone: "186", html: "#E4002B" },
      { pantone: "Red 032", html: "#EF3340" },
      { pantone: "201", html: "#920021" },
      { pantone: "193", html: "#BF003D" },
      { pantone: "208", html: "#930032" },
      { pantone: "212", html: "#FF5C8A" },
      { pantone: "226", html: "#FF006E" },
      { pantone: "249", html: "#80004F" },
      { pantone: "252", html: "#FF66CC" },
      { pantone: "Purple", html: "#BB29BB" },
      { pantone: "2607", html: "#8700BF" },
      { pantone: "281", html: "#002147" },
      { pantone: "Reflex Blue", html: "#001489" },
      { pantone: "293", html: "#0033A0" },
      { pantone: "289", html: "#001B3A" },
      { pantone: "3015", html: "#005387" },
      { pantone: "Process Blue", html: "#0084D1" },
      { pantone: "3302", html: "#005258" },
      { pantone: "3278", html: "#008C93" },
      { pantone: "348", html: "#00A370" },
      { pantone: "354", html: "#00B35A" },
      { pantone: "361", html: "#00BF26" },
      { pantone: "7481", html: "#1AB87A" },
      { pantone: "382", html: "#AEDD00" },
      { pantone: "478", html: "#6B3300" },
      { pantone: "471", html: "#E6CF6B" }
    ];

    // Dynamically generate Pantone color selection elements
    for (let i = 0; i < pantoneColors.length; i++) {
      containers_boxes_background[0].innerHTML +=
        `<div class="pantoneColours" style="background-color:${pantoneColors[i].html};"
          onclick="backgroundClass.handleClickBackgroundColour('${pantoneColors[i].html}', ${i})">
          <h3>${pantoneColors[i].pantone}</h3>
        </div>`;
    }

    // Save references to all Pantone color elements
    this.pantoneColours = document.querySelectorAll(".pantoneColours");
    this.pantoneColours[0].style.border = "3px solid blue"; // Highlight first color by default

    // Handle custom color picker input
    const optionColourBackground = document.getElementById("optionColourBackground");
    optionColourBackground.addEventListener('change', function () {
      const customPicker = this.value;
      backgroundClass.setBackgroundColourSelectedSecondOption(customPicker);
      backgroundClass.changeBackgroundColourSelectedSecondOption();
    });
  }

  // Show only the selected background container
  activateContainerBackground(containerIndex) {
    const backgroundContainers = document.querySelectorAll(".containers_boxes_background");
    backgroundContainers.forEach(container => container.style.display = "none");

    if (backgroundContainers[containerIndex]) {
      backgroundContainers[containerIndex].style.display = "flex";
    }
  }

  // Set and get first selected background color
  setBackgroundColourSelectedFirstOption(value) {
    this.backgroundColourSelectedFirstOption = value;
    this.setBackground(value);
  }

  getBackgroundColourSelectedFirstOption() {
    return this.backgroundColourSelectedFirstOption;
  }

  // Set and get second selected background color
  setBackgroundColourSelectedSecondOption(value) {
    this.backgroundColourSelectedSecondOption = value;
    this.setBackground(value);
  }

  getBackgroundColourSelectedSecondOption() {
    return this.backgroundColourSelectedSecondOption;
  }

  // Called when a Pantone color is selected
  handleClickBackgroundColour(colour, i) {
    this.setBackgroundColourSelectedFirstOption(colour);
    this.changeBackgroundColourSelectedFirstOption();
    this.selectColorBoxOfFirstOption(i);
  }

  // Visually highlight selected Pantone box
  selectColorBoxOfFirstOption(indexSelected) {
    this.pantoneColours.forEach(box => box.style.border = "3px solid transparent");
    this.pantoneColours[indexSelected].style.border = "3px solid blue";
  }

  // Apply first background color to all background elements
  changeBackgroundColourSelectedFirstOption() {
    const colour = this.getBackgroundColourSelectedFirstOption();
    this.setBackground(colour);

    const backgroundElements = document.querySelectorAll(".background-colour");
    backgroundElements.forEach(elem => elem.style.background = colour);
  }

  // Apply second background color to all background elements
  changeBackgroundColourSelectedSecondOption() {
    const colour = this.getBackgroundColourSelectedSecondOption();
    this.setBackground(colour);

    const backgroundElements = document.querySelectorAll(".background-colour");
    backgroundElements.forEach(elem => elem.style.background = colour);
  }

  // Adjusts visibility of background color section based on material selection
  refreshBackgroundColour() {
    const screenPrintBackgroundColour = document.querySelectorAll(".screen_print_background_colour");
    const selectedMaterial = material.getMaterialSelected();

    if (["Tubular", "Ribbed Polyester", "RPET Polyester"].includes(selectedMaterial)) {
      screenPrintBackgroundColour.forEach(elem => elem.style.display = "block");
    } else if (["Dye Sub polyester", "Dye Sub RPET"].includes(selectedMaterial)) {
      screenPrintBackgroundColour.forEach(elem => elem.style.display = "none");

      this.setBackgroundColourSelectedFirstOption("#ffffff");
      this.pantoneColours[0].style.border = "3px solid blue";
      this.changeBackgroundColourSelectedFirstOption();
    }
  }

  // Apply current background color to lanyard elements
  setBackgroundColourToLanyards() {
    const backgroundColour = document.querySelectorAll(".background-colour");
    backgroundColour.forEach(elem => elem.style.background = this.getBackground());
  }

  // Getter and setter for shared background state
  getBackground() {
    return this.background;
  }

  setBackground(value) {
    this.background = value;
  }
}

// Instantiate and make available globally
const backgroundClass = new BackgroundClass();
