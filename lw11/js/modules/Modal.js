class Modal {
    constructor(contentDOM) {
        this.modal = document.createElement("div");
        this.modal.classList.add("modal");
        this.modal.tabIndex = 0;
        this.modal.addEventListener("keydown", (event) => {
            if (event.key == "Escape")
                this.destroy();
        });

        let modalContent = document.createElement("div");
        modalContent.classList.add("modal__content");
        modalContent.style.animation = "modal-show 0.5s";
        this.modal.appendChild(modalContent);

        let modalClose = document.createElement("img");
        modalClose.setAttribute("src", "/lw11/img/icons/cross.svg");
        modalClose.classList.add("modal__close");
        modalClose.addEventListener("click", () => this.destroy());
        modalContent.appendChild(modalClose);

        modalContent.appendChild(contentDOM);
        document.body.appendChild(this.modal);
        this.modal.focus();
    }

    destroy() {
        this.modal.remove();
    }
}