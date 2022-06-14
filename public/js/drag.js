document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const elementForDropzone = inputElement.closest(".drop-zone");

    elementForDropzone.addEventListener("click", (e) => {
        inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(elementForDropzone, inputElement.files[0]);
        }
    });

    elementForDropzone.addEventListener("dragover", (e) => {
        e.preventDefault();
        elementForDropzone.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        elementForDropzone.addEventListener(type, (e) => {
            elementForDropzone.classList.remove("drop-zone--over");
        });
    });

    elementForDropzone.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(elementForDropzone, e.dataTransfer.files[0]);
        }

        elementForDropzone.classList.remove("drop-zone--over");
    });
});

function updateThumbnail(dropZoneElement, file) {
    let thumbnail = dropZoneElement.querySelector(".drop-zone__thumb");

    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }
    if (!thumbnail) {
        thumbnail = document.createElement("div");
        thumbnail.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnail);
    }

    thumbnail.dataset.label = file.name;

    if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnail.style.backgroundImage = `url('${reader.result}')`;
        };
    } else {
        thumbnail.style.backgroundImage = null;
    }
}