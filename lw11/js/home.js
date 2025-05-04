// инициализируем все слайдеры на странице
let sliderElements = document.querySelectorAll('.slider');
for (let sliderElement of sliderElements) {
    new Slider(sliderElement);
}

// добавляем кнопки ращвертывания текста там, где необходимо
let articles = document.querySelectorAll('.article');
for (let article of articles) {
    let content = article.querySelector('.article__text');
    if (content.scrollHeight > config.articleText.lineHeight * config.articleText.hiddenTextNumRows) {
        let opener = document.createElement("button");
        opener.classList.add("article__more-button");
        opener.innerText = config.articleText.showText;

        opener.addEventListener("click", () => {
            if (!opener.classList.contains("active")) {
                opener.classList.add("active");
                opener.innerText = config.articleText.hideText;
                content.classList.add("opened");
            } else {
                opener.classList.remove("active");
                opener.innerText = config.articleText.showText;
                content.classList.remove("opened");
            }
        });

        content.after(opener);
    }
}

// открываем изображение в виде слайдера в модальном окне
function zoomImage(event) {
    let slider = document.createElement("div");
    slider.classList.add("slider");
    slider.classList.add("modal-slider");
    
    let images = event.currentTarget.parentNode.querySelectorAll(".slider__item");
    for (let image of images) {
        let modalImage = document.createElement("img");
        modalImage.src = image.src;
        modalImage.classList.add("slider__item");
        modalImage.classList.add("modal-slider__item");
        slider.appendChild(modalImage);
    }

    let sliderButtonLeft = document.createElement("img");
    sliderButtonLeft.src = config.slider.toggleButtonImage;
    sliderButtonLeft.classList.add("slider__button");
    sliderButtonLeft.classList.add("slider__button_left");
    slider.appendChild(sliderButtonLeft);

    let sliderButtonRight = document.createElement("img");
    sliderButtonRight.src = config.slider.toggleButtonImage;
    sliderButtonRight.classList.add("slider__button");
    sliderButtonRight.classList.add("slider__button_right");
    slider.appendChild(sliderButtonRight);

    let sliderLabel = document.createElement("span");
    sliderLabel.classList.add("slider__label");
    sliderLabel.classList.add("modal-slider__label");

    let sliderLabelCurrent = document.createElement("span");
    sliderLabelCurrent.classList.add("slider__label_current");
    sliderLabel.append(sliderLabelCurrent);

    let sliderLabelSeparator = document.createElement("span");
    sliderLabelSeparator.innerText = config.slider.zoomedImageSliderSeparator;
    sliderLabel.append(sliderLabelSeparator);

    let sliderLabelLength = document.createElement("span");
    sliderLabelLength.classList.add("slider__label_length");
    sliderLabel.append(sliderLabelLength);

    slider.appendChild(sliderLabel);

    new Modal(slider);
    new Slider(slider, event.currentTarget);
}