class Slider {
  constructor() {
    this.currentSlide = 0;
    this.isHovering = false;
    this.prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    sliderLong.addEventListener("mouseenter", () => { this.isHovering = true; });
    sliderLong.addEventListener("mouseleave", () => { this.isHovering = false; });
    sliderLong.addEventListener("focusin", () => { this.isHovering = true; });
    sliderLong.addEventListener("focusout", () => { this.isHovering = false; });

    buttonSlider.forEach((button, index) => {
      button.addEventListener("click", () => this.show(index));
    });

    arrow_slider.addEventListener("click", () => {
      document.getElementById("accessories_home")?.scrollIntoView({
        behavior: this.prefersReducedMotion ? "auto" : "smooth",
        block: "start"
      });
    });

    this.show(0);

    if (!this.prefersReducedMotion) {
      this.interval = window.setInterval(() => {
        if (!this.isHovering && !document.hidden) {
          this.show((this.currentSlide + 1) % buttonSlider.length);
        }
      }, 6500);
    }
  }

  show(index) {
    this.currentSlide = index;
    sliderLong.style.transform = `translateX(-${index * 25}%)`;

    buttonSlider.forEach((button, buttonIndex) => {
      const isActive = buttonIndex === index;
      button.classList.toggle("is-active", isActive);
      button.setAttribute("aria-pressed", String(isActive));
    });
  }

  nextSlide(index) {
    this.show(index);
  }
}

const sliderLong = document.getElementById("sliderLong");
const arrow_slider = document.getElementById("arrow_slider");
const buttonSlider = document.querySelectorAll(".buttonSlider");
const sliderClass = new Slider();
