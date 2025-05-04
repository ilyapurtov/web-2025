// слайдер
let slider = new Slider(document.querySelector(".image-preview__slider"));

// кнопка "поделиться"
let submitButton = document.getElementById("submit-button");

// текст публикации
let articleText = document.getElementById("article-text");

// открыть диалоговое окно с загрузкой файла
function uploadClicked() {
    document.getElementById("upload-image").click();
}

// отобразить загруженное изображение в слайдере
function displayImage(inputElement) {
    let file = inputElement.files[0];
    let imageURL = URL.createObjectURL(file);

    let newImage = document.createElement("img");
    newImage.src = imageURL;
    newImage.classList.add("slider__item");
    slider.addItem(newImage, true);

    slider.element.style.display = "block";
    inputElement.value = null;

    newImage.onload = () => {
        URL.revokeObjectURL(imageURL);
        checkForm();
    };
}

// проверить элементы формы и определить состояние кнопки "Поделиться"
function checkForm() {
    if (articleText.value != "" && !slider.isEmpty()) {
        submitButton.removeAttribute("disabled");
    } else {
        submitButton.setAttribute("disabled", "");
    }
}

// отправка формы
document.getElementById("create-form").addEventListener("submit", (e) => {
    e.preventDefault();

    let data = {content: articleText.value, images: []};
    for (let item of slider.items) {
        data.images.push(item.src);
    }
    console.log(data);
})