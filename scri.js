class OtroElemento extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: "open" });
        this.shadowRoot.innerHTML = `
        <style>
            p {
                color: black;
                font-size: 20px;
                text-align: center;
                margin-top: 20px;
                font-weight: bold;
            }
        </style>
        <p>PARA OBTENER MÁS INFORMACIÓN CLICKEA LAS IMÁGENES</p>
        `;
    }
}
customElements.define("mi-elemento", OtroElemento);


class MiComponente extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: "open" });

        const texto = this.getAttribute("texto") || "Texto por defecto";
        this.shadowRoot.innerHTML = `
        <style>
            p {
                color: black;
                font-size: 18px;
                text-align: center;
                margin-top: 10px;
                font-weight: bold;
            }
        </style>
        <p>${texto}</p>
        `;
    }
}
customElements.define("mi-componente", MiComponente);




document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("sunset").addEventListener("click", function() {
        alert("Sunset Park El Salvador: Un parque de diversiones con una vista espectacular al océano.");
    });

    document.getElementById("binaes").addEventListener("dblclick", function() {
        alert("BINAES: La Biblioteca Nacional de El Salvador, un espacio cultural y de aprendizaje moderno.");
    });
});
