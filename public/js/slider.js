class Slider {
  constructor(sliderElement) {
    this.sliderElement = sliderElement;
    this.images = this.sliderElement.querySelectorAll('.slider__slide');
    this.circles = this.sliderElement.querySelectorAll('.slider__circle');
    this.leftButton = this.sliderElement.querySelector('.slider__control--left');
    this.rightButton = this.sliderElement.querySelector('.slider__control--right');
    this.currentIndex = 0;

    this.leftButton.addEventListener('click', () => {
      const newIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
      this.changeSlide(newIndex);
    });

    this.rightButton.addEventListener('click', () => {
      const newIndex = (this.currentIndex + 1) % this.images.length;
      this.changeSlide(newIndex);
    });

    this.circles.forEach((circle, index) => {
      circle.addEventListener('click', () => {
        this.changeSlide(index);
      });
    });
  }

  changeSlide(newIndex) {
    this.images[this.currentIndex].classList.remove('slider__slide--active');
    this.circles[this.currentIndex].classList.remove('slider__circle--active');

    this.currentIndex = newIndex;

    this.images[this.currentIndex].classList.add('slider__slide--active');
    this.circles[this.currentIndex].classList.add('slider__circle--active');
  }
}

document.querySelectorAll('.slider').forEach((sliderElement) => {
  new Slider(sliderElement);
});
