// Scroll To Top
const ScrollToTop = () => {
    const scrollUp = document.getElementById("scrollUp");
    window.onscroll = () => {
        if (scrollY > 250) {
            scrollUp.classList.add('scrollActive');
        } else {
            scrollUp.classList.remove('scrollActive');
        }
    }
}
ScrollToTop();