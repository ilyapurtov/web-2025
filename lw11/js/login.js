// проверка input на валидность
function checkInput(inputElement) {
    let valid = true;
    switch (inputElement.type) {
        case "email":
            valid = (inputElement.value.trim() != "") & inputElement.checkValidity();
            break;
        case "password":
            valid = inputElement.value.length >= config.form.minPasswordLength;
            break;
    }

    if (!valid) {
        inputElement.classList.add("invalid");
    } else {
        inputElement.classList.remove("invalid");
    }
    return valid;
}

// проверка данных перед отправкой формы
function submitForm(event) {
    let inputs = document.querySelectorAll('.form__input');
    let formValid = true;
    for (let input of inputs) {
        if (!checkInput(input)) {
            formValid = false;
        }
    }
    if(!formValid)
        event.preventDefault();
}

// функция показа/скрытия пароля
function togglePassword(button) {
    if (button.getAttribute("src") == config.form.hidePasswordIcon) {
        button.src = config.form.showPasswordIcon;
        document.getElementById("password").type = "text";
    }        
    else {
        button.src = config.form.hidePasswordIcon;
        document.getElementById("password").type = "password";
    }
}