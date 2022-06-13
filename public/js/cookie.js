const cookieContainer = document.querySelector('.cookie-container');
const cookieButton = document.querySelector('.cookie-btn');

cookieButton.addEventListener("click", () => {
    cookieContainer.classList.remove("active");
    localStorage.setItem("cookieBannerConfirmed", "true");
});

setTimeout(() => {
    if (!localStorage.getItem("cookieBannerConfirmed")) {
        cookieContainer.classList.add("active");
    }
}, 2000);