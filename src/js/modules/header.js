export const init = () => {
    const headerButton = document.querySelector(".header__button");
    const headerMenu = document.querySelector(".header__list");
    let menuOpened = false;
    const menuToggle = () => {
        menuOpened = !menuOpened;
        headerButton.classList.toggle("open");
        headerMenu.classList.toggle("open");
    };

    headerButton.onclick = menuToggle;

    window.onclick = (e) => {
        if (e.target.classList.contains("header__list-close") || e.target.classList.contains("header__link")) {
            menuToggle();
        }
        if (menuOpened && !e.composedPath().includes(headerButton) && !e.composedPath().includes(headerMenu)){
            menuToggle();
        }
    };
}