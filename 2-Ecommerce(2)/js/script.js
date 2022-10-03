
const mainImage = document.getElementById("main-image");
const images = document.querySelectorAll(".product-image");

images.forEach((image) => {
    image.addEventListener("click", (event) => {
        mainImage.src = event.target.src;

        document
            .querySelector(".product-image-active")
            .classList.remove("product-image-active");

        event.target.classList.add("product-image-active");
    });
});

const descButton = document.getElementById('desc-button');
descButton.classList.add('focused');

function showSpecs() {
    const specification = document.getElementById('specifications');
    specification.style.display = "block";

    const description = document.getElementById('description');
    description.style.display = "none";

    const specButton = document.getElementById('spec-button');
    specButton.classList.add('focused');

    const descButton = document.getElementById('desc-button');
    descButton.classList.remove('focused');
}

function showDescription() {
    const specification = document.getElementById('specifications');
    specification.style.display = "none";

    const description = document.getElementById('description');
    description.style.display = "block";

    const specButton = document.getElementById('spec-button');
    specButton.classList.remove('focused');

    const descButton = document.getElementById('desc-button');
    descButton.classList.add('focused');
}

function gotoCheckout() {
    window.location.href = "checkout.html";
}