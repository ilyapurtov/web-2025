class Slider {

    constructor(element, currentItem = null) {
        this.element = element;
        this.items = element.querySelectorAll('.slider__item');
        this.labelCurrent = element.querySelector('.slider__label_current');
        this.labelLength = element.querySelector('.slider__label_length');
        this.length = this.items.length;

        this.current = 0;
        if (currentItem != null) { 
            for (let i = 0; i < this.length; i++) {
                if (this.items[i].src == currentItem.src) {
                    this.current = i;
                    break;
                }
            }
        }

        if (this.length == 1) {
            this.hideInterface();
        } else {
            element.querySelector('.slider__button_left').addEventListener("click", () => {this.prev()});
            element.querySelector('.slider__button_right').addEventListener("click", () => {this.next()});
        }

        this.update();
    }

    next() {
        if (this.current < this.length - 1)
            this.current++;
        else
            this.current = 0;
        this.update();
    }

    prev() {
        if (this.current > 0)
            this.current--;
        else
            this.current = this.length - 1;
        this.update();
    }

    update() {
        for (let i = 0; i < this.length; i++) {
            if (i == this.current)
                this.items[i].style.display = '';
            else
                this.items[i].style.display = 'none';
        }
        this.labelCurrent.innerText = this.current + 1;
        this.labelLength.innerText = this.length;
    }

    hideInterface() {
        this.element.querySelector(".slider__label").style.display = "none";
        this.element.querySelector(".slider__button_left").style.display = "none";
        this.element.querySelector(".slider__button_right").style.display = "none";
    }

    addItem(item, setCurrent = false) {
        if (this.length != 0) {
            this.items[this.length - 1].after(item);
        } else {
            this.element.prepend(item);
        }
        
        this.items = this.element.querySelectorAll('.slider__item');
        this.length = this.items.length;

        if (setCurrent)
            this.current = this.length - 1;

        this.update();
    }

    isEmpty() {
        return this.length == 0;
    }
}