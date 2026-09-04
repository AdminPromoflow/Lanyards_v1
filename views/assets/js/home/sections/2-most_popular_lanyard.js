class MostPopularLanyard {
  constructor() {
    // Select all clickable information boxes
    this.infoBoxes = document.querySelectorAll('.box_information_most_popular_lanyard');
    // Select all display boxes that will be shown/hidden
    this.displayBoxes = document.querySelectorAll('.box_display_most_popular_lanyard');
  }

  init() {
    // Add click event listeners to each information box
    this.infoBoxes.forEach((box, index) => {
      box.setAttribute('role', 'button');
      box.setAttribute('tabindex', '0');
      box.addEventListener('click', () => {
        this.showDisplayBox(index);
        this.highlightBox(box);
      });
      box.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
          event.preventDefault();
          this.showDisplayBox(index);
          this.highlightBox(box);
        }
      });
    });

    // Make the first box selected and displayed by default
    if (this.infoBoxes.length > 0) {
      this.showDisplayBox(0); // Show the first display box
      this.highlightBox(this.infoBoxes[0]); // Highlight the first info box
    }
  }

  showDisplayBox(index) {
    // Show only the clicked item's corresponding display box
    this.displayBoxes.forEach((box, i) => {
      box.style.display = i === index ? 'flex' : 'none';
    });
  }

  highlightBox(selectedBox) {
    this.infoBoxes.forEach((box) => {
      box.classList.remove('is-active');
      box.setAttribute('aria-pressed', 'false');
    });

    selectedBox.classList.add('is-active');
    selectedBox.setAttribute('aria-pressed', 'true');
  }
}

// Instantiate the class and initialize event listeners
const mostPopularLanyard = new MostPopularLanyard();
mostPopularLanyard.init();
