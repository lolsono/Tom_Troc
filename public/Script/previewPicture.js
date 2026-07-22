document.addEventListener("DOMContentLoaded", () => {

    const container = document.getElementById("previewBook");
    const input = document.getElementById("filesPictures");
    const preview = document.getElementById("previewImage");
    const label = document.getElementById("labelImage");

    const defaultImage = "public/img/no-image.png";

    if (preview.getAttribute("src") === defaultImage) {
        preview.style.visibility = "hidden";
        preview.style.height = "200px";
        container.style.alignItems = "center";
        label.textContent = "Ajouter une image";
    } else {
        label.textContent = "Modifier l'image";
    }

    input.addEventListener("change", function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        preview.src = URL.createObjectURL(file);
        preview.style.visibility = "visible";
        preview.style.height = "300px";
        container.style.alignItems = "flex-end";
        label.textContent = "Modifier l'image";

    });

});