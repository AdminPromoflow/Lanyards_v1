class TextClass {
  constructor() {
    // Select UI elements
    this.repeatTextBox = document.querySelectorAll(".repeat-text-box");
    this.colourTextSelect = document.getElementById("colour-text-select");
    this.colourTextSelectContainer = document.getElementById("colour-text-select-container");
    this.labelRepeatText = document.getElementById("label-repeat-text");
    this.typeTextSelect = document.getElementById("type-text-select");
    this.typeTextSelectContainer = document.getElementById("type-text-select-container");
    this.textInput = document.getElementById("textInput");
    this.stylingTextBox = document.querySelectorAll(".styling-text-box");
    this.sizeTextBox = document.querySelectorAll(".size-text-box");
    this.spaceBetweenTextBox = document.querySelectorAll(".space-between-text-box");

    // Initialize properties
    this.repeatText = 1;
    this.contentText = "";
    this.colourText = "#000000";
    this.fontSizeText = "16px";
    this.boldText = false;
    this.italicText = false;
    this.underlineText = false;
    this.sizeText = "medium";
    this.spacingBetweenText = "normal";

    // Hide color selection container
    this.colourTextSelectContainer.style.display = "none";

    // Set initial label text
    this.updateRepeatTextLabel();

    // Set event listeners
    this.setupRepeatTextEvents();
    this.setupColourSelectionEvents();
    this.setupFontSelectionEvents();
    this.setupTextInputEvent();
    this.setupTextStylingEvents();
    this.setupTextSizeEvents();
    this.setupTextSpacingEvents();
  }

  // Update repeat text label
  updateRepeatTextLabel() {
    this.labelRepeatText.textContent = `Repeat text ${this.getRepeatText()} times`;
  }

  // Set up events for repeating text
  setupRepeatTextEvents() {
    this.repeatTextBox.forEach((box) => {
      box.addEventListener("click", () => {
        const h3Element = box.querySelector("h3").innerHTML;
        this.setRepeatText(h3Element === "+" ? this.getRepeatText() + 1 : this.getRepeatText() - 1);
        this.updateRepeatTextLabel();
      });
    });
  }

  // Set up events for color selection
  setupColourSelectionEvents() {
    this.colourTextSelect.addEventListener("click", () => {
      this.colourTextSelectContainer.style.display = this.colourTextSelectContainer.style.display === "block" ? "none" : "block";
    });

    document.addEventListener("click", (event) => {
      if (!this.colourTextSelectContainer.contains(event.target) && !this.colourTextSelect.contains(event.target)) {
        this.colourTextSelectContainer.style.display = "none";
      }
    });

    const pantoneColors = [
      { pantone: "White", html: "#FFFFFF" },
      { pantone: "Black", html: "#2D2926" },
      { pantone: "Red 032", html: "#EF3340" },
      { pantone: "Reflex Blue", html: "#001489" },
      { pantone: "Process Blue", html: "#0084D1" },
      { pantone: "Yellow", html: "#FCE300" }
    ];

    pantoneColors.forEach((color) => {
      this.colourTextSelectContainer.innerHTML += `
        <div class="colour-text-select-boxes" style="background-color:${color.html};"
          onclick="textClass.handleClickText('${color.pantone}', '${color.html}')">
          <h3 class="name-colour-text-selected">${color.pantone}</h3>
        </div>`;
    });
  }

  // Set up events for font selection
  setupFontSelectionEvents() {
    this.typeTextSelect.addEventListener("click", (event) => {
      this.typeTextSelectContainer.style.display = this.typeTextSelectContainer.style.display === "block" ? "none" : "block";
      event.stopPropagation();
    });

    document.addEventListener("click", (event) => {
      if (!this.typeTextSelectContainer.contains(event.target) && !this.typeTextSelect.contains(event.target)) {
        this.typeTextSelectContainer.style.display = "none";
      }
    });

    const fontStyles = [
      { fontName: "Arial", fontFamily: "Arial, sans-serif" },
      { fontName: "Verdana", fontFamily: "Verdana, sans-serif" },
      { fontName: "Courier New", fontFamily: "Courier New, monospace" }
    ];

    fontStyles.forEach((font) => {
      this.typeTextSelectContainer.innerHTML += `
        <div class="type-text-select-boxes" onclick="textClass.handleClickTypeText('${font.fontName}', '${font.fontFamily}')">
          <h3 class="name-colour-text-selected">${font.fontName}</h3>
        </div>`;
    });
  }

  // Set up event for text input
  setupTextInputEvent() {
    this.textInput.addEventListener("input", () => {
      previewTextClass.addModifyText(this.textInput.value);
    });
  }

  // Set up events for text styling
  setupTextStylingEvents() {
    this.stylingTextBox.forEach((box, index) => {
      box.addEventListener("click", () => {
        box.style.border = box.style.border === "2px solid white" ? "2px solid transparent" : "2px solid white";
        if (index === 0) previewTextClass.changeBold(box.style.border === "2px solid white");
        if (index === 1) previewTextClass.changeItalic(box.style.border === "2px solid white");
        if (index === 2) previewTextClass.changeUnderline(box.style.border === "2px solid white");
      });
    });
  }

  // Set up events for text size change
  setupTextSizeEvents() {
    this.sizeTextBox.forEach((box, index) => {
      box.addEventListener("click", () => {
        previewTextClass.changeFontSize(index !== 0);
      });
    });
  }

  // Set up events for text spacing
  setupTextSpacingEvents() {
    this.spaceBetweenTextBox.forEach((box, index) => {
      box.addEventListener("click", () => {
        previewTextClass.changeSpaceBetweenText(index !== 0);
      });
    });
  }

  // Getter and Setter Methods
  getContentText() { return this.contentText; }
  setContentText(value) { this.contentText = value; }

  getRepeatText() { return this.repeatText; }
  setRepeatText(value) { this.repeatText = value; }

  getColourText() { return this.colourText; }
  setColourText(value) { this.colourText = value; }

  getFontSizeText() { return this.fontSizeText; }
  setFontSizeText(value) { this.fontSizeText = value; }

  getBoldText() { return this.boldText; }
  setBoldText(value) { this.boldText = value; }

  getItalicText() { return this.italicText; }
  setItalicText(value) { this.italicText = value; }

  getUnderlineText() { return this.underlineText; }
  setUnderlineText(value) { this.underlineText = value; }

  getSizeText() { return this.sizeText; }
  setSizeText(value) { this.sizeText = value; }

  getSpacingBetweenText() { return this.spacingBetweenText; }
  setSpacingBetweenText(value) { this.spacingBetweenText = value; }

  // Handle Click Events
  handleClickText(name, colour) {
    previewTextClass.changeColour(colour);
    this.colourTextSelect.style.background = colour;
    this.colourTextSelect.querySelector("h3").innerHTML = name;
    this.colourTextSelectContainer.style.display = "none";
  }

  handleClickTypeText(name, fontFamily) {
    this.typeTextSelect.style.fontFamily = fontFamily;
    this.typeTextSelect.querySelector("h3").innerHTML = name;
    this.typeTextSelectContainer.style.display = "none";
    previewTextClass.changeFontFamily(fontFamily);
  }
}

// Create an instance of the TextClass
const textClass = new TextClass();
