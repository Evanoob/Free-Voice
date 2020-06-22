const navBurger = () => {

    const btnResponsive = document.querySelector(".burger");
    const nav = document.querySelector(".nav-links");

    btnResponsive.addEventListener('click', () => {
        btnResponsive.classList.toggle("active");
        nav.classList.toggle("nav-active")
    });
    }
    
   navBurger();






