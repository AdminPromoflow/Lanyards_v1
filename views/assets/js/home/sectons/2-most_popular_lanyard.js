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
      box.addEventListener('click', () => {
        this.showDisplayBox(index);
        this.highlightBox(box);
      });
    });
  }

  showDisplayBox(index) {
    // Show only the clicked item's corresponding display box
    this.displayBoxes.forEach((box, i) => {
      box.style.display = i === index ? 'flex' : 'none';
    });
  }

  highlightBox(selectedBox) {
    // Reset styles for all boxes
    this.infoBoxes.forEach((box) => {
      box.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // Original background
      const h3 = box.querySelector('h3');
      if (h3) h3.style.color = 'white'; // Reset h3 color
    });

    // Apply new styles to the selected box
    selectedBox.style.backgroundColor = 'rgba(240, 240, 240, 0.7)';
    const selectedH3 = selectedBox.querySelector('h3');
    if (selectedH3) selectedH3.style.color = 'black';
  }
}

// Instantiate the class and initialize event listeners
const mostPopularLanyard = new MostPopularLanyard();
mostPopularLanyard.init();
