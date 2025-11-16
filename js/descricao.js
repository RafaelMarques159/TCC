document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-text").forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const cardText = this.parentElement;
            const curto = cardText.querySelector(".texto-curto");
            const completo = cardText.querySelector(".texto-completo");

            if (completo.classList.contains("d-none")) {
                // Expandir
                completo.classList.remove("d-none");
                curto.classList.add("d-none");
                this.textContent = "Ver menos";
            } else {
                // Recolher
                completo.classList.add("d-none");
                curto.classList.remove("d-none");
                this.textContent = "Ver mais";
            }
        });
    });
});
